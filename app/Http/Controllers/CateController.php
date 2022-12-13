<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Cate;
use App\Models\Chapter;
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
        dd($request->all());
        $request->validate([
            'name' => ['required', 'unique:category', 'max:255'],

        ]);

        $cate = new Cate();

        $cate->name = $request['name'];

        $cate->save();
        $chapter =  new Chapter();
        $arrrr = $request->chapter;

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
    public function addC($id_cate){
        return view('admin.chapter.Add', compact('id_cate'));
    }
    public function addCPost(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => ['required'],

        ]);
        $chap = new Chapter;
        $chap->name = $request['name'];
        $chap->id_cate = $request['id_cate'];
        $chap->save();
        return back()->with('status', 'thành công');
    }
    public function editC($id){
        $chap = Chapter::find($id);
        return view('admin.chapter.Edit', compact('chap'));
    }
    public function editCPost(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => ['required'],
        ]);
        $chap = Chapter::find($request->id);
        $chap->name = $request['name'];
        $chap->save();
        return back()->with('status', 'thành công');
    }
    public function listC($id_cate){
        $chap = Chapter::where('id_cate',$id_cate)->get();
        return view('admin.chapter.Index', compact('chap'));
    }
    public function deleteC($id){
        Chapter::find($id)->delete();
        return redirect()->back()->with('status', 'Delete Success');
    }

}
