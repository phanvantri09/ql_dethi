<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Cate;
use App\Models\quiz;
use App\Models\User;
use App\Models\ListTimeExam;
use App\Models\ExamRandom;
use App\Models\TimeExam;
use App\Models\Result;
use App\Models\Chapter;
use Illuminate\Support\Facades\Auth;

class examController extends Controller
{
    public function deleteQz($id){
        Exam::find($id)->delete();
        $data = Exam::all();
        return view('admin.exam.index', compact('data'))->with('status', 'Delete Success');
    }

    public function list(){
        $data = new Exam();
        $data = Exam::all();
        return view('admin.exam.index', compact('data'));
    }
    public function add(){
        $cate = new Cate();
        $cate= Cate::all();
        return view('admin.exam.add', compact('cate'));
    }
    public function addPost(Request $request){
        $data = new Exam();
        $data->id_sub = $request->id_sub;
        $data->id_teach= $request->id_teach;
        $data->content = $request->content;
        $data->time = $request->time;
        $data->name = $request->name;
        $data->save();
        return back();
    }
    public function addQz(Exam $id){
        // cate
        //id được chọn
        $id_sub = $id->id_sub;
        // dd($id_sub);
        $qzDB = explode(",",$id->id_quiz);
        //láy các item được chọn
        $DBCho= array();
        foreach ($qzDB as $item) {

            $arr = new quiz();
            $arr = quiz::find($item);
            array_push($DBCho , $arr);
        }
        $qz = quiz::where('id_cate','=',$id->id_sub)->orderBy('id_chapter')->get();
        // dd($qz);
        $qzall = quiz::all();
        $qzallarr= array();
        // láy tất cả id để đi so sánh
        foreach ($qz as $key => $item) {
            array_push($qzallarr , $item->id);
        }
        // láy id các câu không dc chọn
        $qzDBdff = array_diff( $qzallarr , $qzDB );
        //láy các items không được chọn
        $DBNo = array();
        foreach ($qzDBdff as $item) {
            $arr = new quiz();
            $arr = quiz::find($item);
            array_push($DBNo , $arr);
        }
        $chapter = Chapter::where('id_cate',$id_sub)->get();
        // dd(count($chapter));
        return view('admin.exam.addQz',compact(['DBCho','DBNo','id','chapter']));
        //
    }
    public function addQzPost(Request $request){
        // dd($request);
        $qz = new Exam();
        $qz = Exam::find($request->id);
        // id của DB
        $qzDB = explode(",",$qz->id_quiz);

        if(!empty($request->qz)){
            $qzdata = implode(',',$request->qz);
            $dataMain = array();
            if($qz->id_quiz != $qzdata){
                // láy id bị xóa
                $qzDBdff = array_diff($qzDB, $request->qz);
                //láy id cập nhật
                $qzRQdff = array_diff($request->qz, $qzDB);
                //láy giống nhau
                $qzIntersect = array_intersect($request->qz,$qzDB);
                if(!empty($qzIntersect))
                {
                    foreach ($qzIntersect as  $item) {
                        array_push($dataMain , $item);
                    }
                }
                if(!empty($qzRQdff))
                {
                    foreach ($qzRQdff as  $item) {
                        array_push($dataMain , $item);
                    }
                }
                //dd($dataMain);
                //nào trùng thì delete
                // hiện tịa 1 2 3
                // push lên 1 4 5
                // 1 có
                // 2 3 k có delete
                // 4 5 mới nên cập nhật vào
                // chỉ láy cái giống để xóa
                // insert thêm cái mới.
            }

            $qqqq = implode(",",$dataMain);
            $qz->id_quiz =$qqqq;
        }else{
            // dd(null);
            $qz->id_quiz ="";
        }
        $qz->save();

        // dd(explode(",",$qz));
        return back();
        //
    }

    public function readmore(){
        $id = Auth::id();
        if(!$id){
            return route('login');
        }
        $view = User::find($id);
        $timeExam = TimeExam::all();
        $cate = Cate::all();
        $exam = Exam::all();
        $ExamRandom = ExamRandom::where('id_time_exam','=',$id)->get();
        $ListStudenExam = ListTimeExam::where('id_student','LIKE',"%".$id."%")->get();
        $teacher = User::where( 'is_admin', '=' , 2 )->get();
        return view('user.detailexam', compact(['view','ListStudenExam','id','timeExam','cate','exam','teacher']));

    }


    public function kiemtra($idExam, $idTimeExam){
        $id = Auth::id();
        if(!$id){
            return route('login');
        }
        $exam = Exam::find($idExam);
        $time = $exam->time * 60 * 1000;
        $id_sub = $exam->id_sub;
        $timeExam = TimeExam::find($idTimeExam);
        $time_start = $timeExam->time_start;
        $time_end = $timeExam->time_end;
        $accountExam = $timeExam->acount_exam;

        $examMainList =  ExamRandom::where('id_exam','=',$idExam)->where('id_time_exam','=',$idTimeExam)->get()->toArray();
        $listStudent = ListTimeExam::where('id_exam','=',$idExam)->where('id_time_exam','=',$idTimeExam)->first();
        $arrliststudent = explode(',',$listStudent->id_student);
        $key = array_search($id, $arrliststudent) + 1;
        $choeseExamRandom = $examMainList[array_rand($examMainList)];
        $quizAll = quiz::all();

        $examRandom = ExamRandom::find($choeseExamRandom['id']);

        $id_random_exam = $examRandom->id;
        $arrQuiz = explode(',',$examRandom->id_item_exam) ;

        return view('user.kiemtra', compact('time_end','time_start','time','arrQuiz','quizAll','id_sub','idExam','id_random_exam','idTimeExam'));

    }

    public function diemso(Request $request ){
        $id = Auth::id();
        if(!$id){
            return route('login');
        }
        $data = $request->all();
        $ExamRandom = ExamRandom::find($request->id_random_exam);
        $qz =  explode(',',$ExamRandom->id_item_exam);
        $allQz = quiz::all();

        $arrFi = array();
        foreach($allQz as  $quall){
            foreach($qz as  $qu){
                if($quall->id == $qu){
                    array_push($arrFi, $quall);
                }
            }
        }
        $countsie = count($arrFi);
        $count = 0;
        $countfeal =0;
        foreach($arrFi as $quall){
                $m = 'cauhoi'.$quall->id;
                if(isset($data[$m]) && $quall->traloi == $data[$m]){
                    $count++;
                }
                else{
                    $countfeal++;
            }
        }
        $point = $count*(10/$countsie);
        //  dd([$point]);
        $result =  new Result();
        $result->id_sub = $request->id_sub;
        $result->id_exam = $request->id_exam;
        $result->id_random_exam = $request->id_random_exam;
        $result->id_time_exam = $request->id_time_exam;
        $result->result = $point;
        $result->id_user = $id;
        $result->save();
        return view('user.result', compact('countsie','point','count', 'countfeal'));

    }
    public function diemso1(Request $request, $id_khoahoc){
        //  dd($request->all());
        $khoahoc = Course::find($id_khoahoc);
        $quiz = quiz::where('id_product','=',$id_khoahoc)->where('id_video','=',$request->id_video)->get();
        // dd($quiz);
        $data = $request->all();
        // dd($data['cauhoi'.$k]);
        $len = count($data) - 1;
        $lenqu = count($quiz);
        // dd($lenqu);
        $count = 0;
        $countfeal =0;
        foreach($quiz as $key => $qu){
            $m = 'cauhoi'.$qu->id;
            if(isset($data[$m]) && $qu->traloi == $data[$m]){
                $count++;
            }
            else{
                $countfeal++;
            }
        }
        $kq = ($count/$lenqu)*100;
        if ($kq == 0 && $countfeal == $lenqu) {
            $mes = "Bạn nên học thêm vì kết quả của bạn là 0";
            return view('user.pages.course.ketqua', compact(['khoahoc','mes']));
        }
        $mes = "Số điểm bạn đạt được là : ".$count."/".$lenqu.' tương đương '.$kq.'% chúc mừng bạn.' ;
        return view('user.pages.course.ketqua', compact(['khoahoc','mes']));
    }

    public function Exam(){
        $data = new Exam();
        $data = Exam::all();
        return view('user.master', compact('data'));
    }
}
