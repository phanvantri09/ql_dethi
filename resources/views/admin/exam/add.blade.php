@extends('admin.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)"> Exam</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Add </a></li>
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


                                <form action="{{route('add.exam')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="toolbar mb-4" role="toolbar">
                                    </div>
                                    <input type="hidden" name="id_teach" value="{{Auth::user()->id}}" class="form-control"  required="">
                                    <div class="compose-content">
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Tên</label>
                                            <div class="col-lg-6">
                                                <input type="text" name="name" class="form-control"  required="">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label"> Nội dung</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="content" id="validationCustom10"  required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Thời gian làm</label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" name="time" id="validationCustom10"  required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Môn</label>
                                            <div class="col-lg-6">
                                                <select class="default-select  form-control wide" name="id_sub">
                                                    @foreach ($cate as $cate)
                                                    <option value="{{ $cate -> id}}">{{ $cate->name}}</option>
                                                    @endforeach
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
