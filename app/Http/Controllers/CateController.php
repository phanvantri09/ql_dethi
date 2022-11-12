<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Cate;
use Illuminate\Http\Request;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $cate = Cate::all();
        return view('admin.category.index',compact('cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = User::all();
        return view('admin.category.Add', compact("user"));
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
            'name' => ['required', 'unique:category', 'max:255'],
            'id_sub'=> ['required', 'unique:category', 'max:255'],

        ]);
 
        $cate = new Cate();
      
        $cate->name = $request['name'];
        $cate->id_sub = $request['id_sub'];
        $cate->save();
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
        $cate  =  Cate::find($id);
        return view('admin.category.Show', compact('cate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate  =  Cate::find($id);
        return view('admin.category.Edit', compact('cate'));
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
            'name' => ['required', 'unique:category', 'max:255'],

        ]);

        $cate  =  Cate::find($id);
        $cate->name = $request['name'];
        $cate->save();
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
        Cate::find($id)->delete();
        return redirect()->back()->with('status', 'Delete Success');
    }
}
