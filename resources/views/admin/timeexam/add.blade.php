@extends('admin.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)"> Time Exam</a></li>
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
                                <form action="{{route('add.Time.post')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="toolbar mb-4" role="toolbar">
                                    </div>
                                    <div class="compose-content">
                                        <div class="mb-3 row">
                                            <label class="col-sm-4 col-form-label">Giáo viên coi thi</label>
                                            <div class="col-lg-6">
                                                @foreach ($teach as $item)
                                                <input type="checkbox" name="id_teach[]" value="{{$item->id}}" >
                                                <label style="margin-right: 5px" for="scales">{{$item->name}}</label>
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-4 col-form-label">Tên đợt thi</label>
                                            <div class="col-lg-6">
                                                <input type="text" name="name" class="form-control" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-4 col-form-label">Chọn đề thi</label>
                                            <div class="col-lg-6">
                                                @foreach ($exam  as $key => $ex)
                                                @foreach ($cate as $ca)
                                                @if ($ca->id == $key)
                                                <label class="col-5"  style="margin-right: 5px" for="scales"><b>{{$ca->name}} :</b></label>

                                                @foreach ($ex as $e)
                                                <div class="col-7">

                                                    <input type="checkbox" name="id_exam[]" value="{{$e['id']}}" >
                                                <label style="margin-right: 5px" for="scales">{{$e['name']}}</label>
                                                </div>
                                                <br>
                                                @endforeach
                                                <br>
                                                @endif
                                                @endforeach
                                                @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-4 col-form-label">Thời gian bắt đầu thi.</label>
                                            <div class="col-lg-6">
                                                <input id="party"  class="form-control" type="datetime-local" name="time_start" required=""/>
                                                {{-- <input type="date" class="form-control" name="time_start"  required=""> --}}
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-4 col-form-label">Thời gian kết thúc không được vào thi nữa.</label>
                                            <div class="col-lg-6">
                                                <input id="party"  class="form-control" type="datetime-local" name="time_end" required=""/>
                                                {{-- <input type="date" class="form-control" name="time_start"  required=""> --}}
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-4 col-form-label">Số lượng chia đề</label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" name="acount_exam" required="">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-start mt-4 mb-3">
                                        <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span class="me-2"><i class="fa fa-paper-plane"></i></span>Tạo kỳ thi</button>
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
