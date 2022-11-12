@extends('admin.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)"> Product</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Add  Product</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(session()->has('massage'))

                        <div class="alert alert-success">
                            {{ session()->get('massage') }}
                        </div>
                        @endif
                        <div class="email-box ms-0 ms-sm-0 ms-sm-0">
                           
                            <div class="basic-form">


                                <form action="{{route('Quiz.update', $id->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="toolbar mb-4" role="toolbar">
                                    </div>

                                   
                                    <div class="compose-content">
                                        
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Câu hỏi</label>
                                            <div class="col-lg-6">
                                             
                                                 <input type="hidden" name="id"   value="{{$id->id}}">
                                                <input type="text" name="cauhoi" class="form-control" value="{{$id->cauhoi}}"  required="">
                                            </div>
                                        </div>
                                      
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Câu trả lời 1 </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="c1" value="{{$id->c1}}" id="validationCustom10"  required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Câu trả lời 2 </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="c2" value="{{$id->c2}}" id="validationCustom10"  required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Câu trả lời 3 </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="c3" value="{{$id->c3}} " id="validationCustom10"  required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Câu trả lời 4 </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="c4" value="{{$id->c4}}" id="validationCustom10"  required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Đáp án đúng </label>
                                            <div class="col-lg-6">
                                                <select class="default-select  form-control wide" name="traloi">
                                                    <option value="{{$id->traloi}}" required="">Đáp án {{$id->traloi}}</option>
                                                    <option value="1" required="">Đáp án 1</option>
                                                    <option value="2" required="">Đáp án 2</option>
                                                    <option value="3" required="">Đáp án 3</option>
                                                    <option value="4" required="">Đáp án 4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-start mt-4 mb-3">
                                        <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span class="me-2"><i class="fa fa-paper-plane"></i></span>Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection