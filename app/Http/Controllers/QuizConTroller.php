<?php

namespace App\Http\Controllers;

use App\Models\Cate;
use App\Models\Cates;
use App\Models\quiz;
use Illuminate\Http\Request;

class QuizConTroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pro = quiz::all();
       return view('admin.quiz.index', compact('pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $cate = Cate::all();
       return view('admin.quiz.add',compact("cate"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'cauhoi' => 'required',
            'c1' => 'required',
            'c2' => 'required',
            'c3' => 'required',
            'c4' => 'required',
            'traloi' => 'required',
            'id_cate' => 'required'
        ]);
        $pro = new quiz();
        $pro->cauhoi = $request->get('cauhoi');
        $pro->c1 = $request->get('c1');
        $pro->c2 = $request->get('c2');
        $pro->c3 = $request->get('c3');
        $pro->c4 = $request->get('c4');
        $pro->traloi = $request->get('traloi');
        $pro->id_cate = $request->get('id_cate');
        
        $pro->save();
        return redirect()->back()->with('massage', 'success');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {
        $id= quiz::find($id);
        return view('admin.quiz.edit', compact('id'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cauhoi' => 'required',
            'c1' => 'required',
            'c2' => 'required',
            'c3' => 'required',
            'c4' => 'required',
            'traloi' => 'required'
        ]);
        $pro = quiz::find($request->id);
       
        $pro->cauhoi = $request->get('cauhoi');
        $pro->c1 = $request->get('c1');
        $pro->c2 = $request->get('c2');
        $pro->c3 = $request->get('c3');
        $pro->c4 = $request->get('c4');
        $pro->traloi = $request->get('traloi');
        
        $pro->save();
        return redirect()->back()->with('massage', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       quiz::find($id)->delete();
       return redirect()->back()->with('massage', 'success');
    }
}
