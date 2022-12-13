@extends('admin.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)"> Danh Mục</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Sửa Danh Mục</a></li>
            </ol>
        </div>

        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="email-box ms-0 ms-sm-0 ms-sm-0">
                            <div class="p-0">
                                <a href="email-compose.html" class="btn btn-primary ">Sửa Chương</a>
                            </div>
                            <div class="toolbar mb-4" role="toolbar">
                            </div>
                            @if(session()->has('massage'))

                        <div class="alert alert-success">
                            {{ session()->get('massage') }}
                        </div>
                        @endif
                            @if (Session::has('status'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <strong>Success !</strong> {{ session('status') }}
                                </div>
                            @endif
                            <div class="compose-content">
                                <form action="{{route('editCPost')}}" method="POST">
                                @csrf
                                    <div class="mb-3">
                                        <input type="hidden" value="{{$chap->id}}" name="id" class="form-control bg-transparent" placeholder=" Tên Danh Mục">
                                        <input type="text" value="{{$chap->name}}" name="name" class="form-control bg-transparent" placeholder=" Tên Danh Mục">
                                    </div>

                                    <div class="text-start mt-4 mb-3">
                                    <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span class="me-2"><i class="fa fa-paper-plane"></i></span>Cập nhật</button>
                                </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
