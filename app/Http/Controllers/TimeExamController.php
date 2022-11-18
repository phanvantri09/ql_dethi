<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cate;
use App\Models\quiz;
use App\Models\Exam;
use App\Models\TimeExam;
use App\Models\User;
use App\Models\ListTimeExam;

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
        $data->save();

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
}
