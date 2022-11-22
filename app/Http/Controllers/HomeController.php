<?php

namespace App\Http\Controllers;
use App\Models\Cate;
use App\Models\Exam;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Cate::all();
         $exam = Exam::all();
        return view('user.home', compact('category', 'exam'));
    }
}
