@extends('admin.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)"> Quiz</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Add Quiz</a></li>
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


                                <form action="{{route('add.list.student.post')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="toolbar mb-4" role="toolbar">
                                    </div>

                                    <input type="hidden" name="id_time_exam" class="form-control" value="{{$id_time_exam}}" required="">
                                    <div class="compose-content">
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Chọn Đề </label>
                                            <div class="col-lg-6">
                                                <input style="border: none" type="text" value="{{$examMain->name}}" >
                                                <input type="hidden" name="id_exam" value="{{$examMain->id}}" >
                                                {{-- <select class="default-select  form-control wide" name="id_exam">

                                                @foreach ($exam as $ex)
                                                @foreach ($cate as $ca)
                                                @if ($ex == $ca->id)
                                                <option value="{{$ex}}">{{$ca->name}}</option>
                                                @endif
                                                @endforeach
                                                @endforeach
                                                </select> --}}
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Thêm học sinh vào đề thi</label>
                                            <div class="col-lg-6">
                                                @if (isset($arrayhave) && isset($arrayhave))
                                                @foreach ($arrayno as $item)
                                                <input type="checkbox" name="id_student[]" value="{{$item->id}}" >
                                                <label style="margin-right: 5px" for="scales">{{$item->name}}</label>
                                                @endforeach
                                                @foreach ($arrayhave as $item)
                                                <input checked type="checkbox" name="id_student[]" value="{{$item->id}}" >
                                                <label style="margin-right: 5px" for="scales">{{$item->name}}</label>
                                                @endforeach
                                                @else
                                                @foreach ($student as $item)
                                                <input  type="checkbox" name="id_student[]" value="{{$item->id}}" >
                                                <label style="margin-right: 5px" for="scales">{{$item->name}}</label>
                                                @endforeach
                                                @endif
                                                </div>
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
