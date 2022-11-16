<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Cate;
use App\Models\quiz;
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
        $qzDB = explode(",",$id->id_quiz);
        //láy các item được chọn
        $DBCho= array();
        foreach ($qzDB as $item) {

            $arr = new quiz();
            $arr = quiz::find($item);
            array_push($DBCho , $arr);
        }
        $qz = quiz::where('id_cate','=',$id->id_sub)->get();
        $qzall = quiz::all();
        $qzallarr= array();
        // láy tất cả id để đi so sánh
        foreach ($qzall as $key => $item) {
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
        // dd($DBNo);
        return view('admin.exam.addQz',compact(['DBCho','DBNo','id']));
        //
    }
    public function addQzPost(Request $request){
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
            //dd($dataMain);
            $dataMain = implode(',',$dataMain);
            $qz->id_quiz =$dataMain;
            $qz->save();
            return back();
        }else{
            // dd(null);
            $qz->id_quiz ="";
            $qz->save();
        }
        // dd(explode(",",$qz));
        return back();
        //
    }
}
