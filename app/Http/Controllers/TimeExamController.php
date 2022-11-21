<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cate;
use App\Models\quiz;
use App\Models\Exam;
use App\Models\TimeExam;
use App\Models\User;
use App\Models\ListTimeExam;
use App\Models\ExamRandom;

class TimeExamController extends Controller
{
    public function add(){
        $cate = new Cate();
        $cate = Cate::all();
        $axam = new Exam();
        $exam = Exam::all();
        $exam = $exam->toArray();
        $exam = array_group_by($exam, "id_sub");
        $axam = new User();
        $teach = User::where('is_admin','=',2)->get();
        return view('admin.timeexam.add', compact(['exam','teach','cate']));
    }
    public function addPost(Request $request){
        //dd($request->all());

        $id_teach = implode(',',$request->id_teach);
        $id_exam = implode(',',$request->id_exam);
        $data = new TimeExam();
        $data->id_teach = $id_teach;
        $data->id_exam =  $id_exam;
        $data->name =  $request->name;
        $data->time_start =  $request->time_start;
        $data->acount_exam =  $request->acount_exam;
        $data->save();
        if($request->has('acount_exam')){
            //shuffle đảo loạn mảng
            foreach ($request->id_exam as $key => $value) {
                $exam = Exam::find($value);
                $exam1 = explode(',',$exam->id_quiz);

                for ($i=0; $i < $request->acount_exam; $i++) {
                    $ExamRandom = new ExamRandom();
                    $ExamRandom->id_time_exam = $data->id;
                    $ExamRandom->id_exam =  $value;
                    $exam11 = $this->random_array($exam1);
                    $ExamRandom->id_item_exam = implode(',', $exam11);
                    $ExamRandom->save();
                }
            }
        }
        return back();
    }
    public function list(){
        $pro = new TimeExam();
        $pro = TimeExam::all();
        return view('admin.timeexam.index', compact(['pro']));
    }
    public function delete($id)
    {
        TimeExam::find($id)->delete();
       return redirect()->back()->with('massage', 'success');
    }
    public function addStudent($id){

        $timeExam = new TimeExam();
        $timeExam = TimeExam::find($id);
        $exam = explode(',', $timeExam->id_exam);
        // dd($exam);
        $cate = TimeExam::all();
        $student = User::where('is_admin','=',0)->get();
        return view('admin.timeexam.addStudent', compact(['student','id','timeExam','exam','cate']));
    }
    public function addStudentPost(Request $request){
        $id_student = implode(',',$request->id_student);
        $data = new ListTimeExam();
        $data->id_student = $id_student;
        $data->id_exam =  $request->id_exam;
        $data->id_time_exam =  $request->id_time_exam;
        $data->save();
        return back();
    }
    public function listLink($id){
        $timeExam = TimeExam::find($id);
        $ListTimeExam = ExamRandom::where('id_time_exam','=',$id)->get();
        return view('admin.timeexam.listLink', compact(['ListTimeExam','id','timeExam']));
    }
    public function linkExamRun(){

    }
    public function random_array($array) {
        $random_array = array();
        // array start by index 0
        $countArray = count($array) - 1;

        // while my array is not empty I build a random value
        while (count($array) != 0) {
            //mt_rand return a random number between two value
            $randomValue = mt_rand(0, $countArray);
            $random_array[] = $array[$randomValue];

            // If my count of my tab is 4 and mt_rand give me the last element,
            // array_splice will not unset the last item
            if(($randomValue + 1) == count($array)) {
                array_splice($array, $randomValue, ($randomValue - $countArray + 1));
            } else {
                array_splice($array, $randomValue, ($randomValue - $countArray));
            }

            $countArray--;
        }

        return $random_array;
    }
}
