@extends('user.master')
 @section('content')
<div>

    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Liên Hệ</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Khóa Học</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Liên Hệ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
   <center >
    <div id="button-start" ">Điểm thi của bạn là : <b style="color: red">{{$point}} - Tính theo thang điểm 10</b></div>
    <div id="button-start" ">Số câu đúng : <b style="color: green">{{$count}}/{{$countsie}}</b></div>
    <div id="button-start" ">Số câu sai : <b style="color: yellow">{{$countfeal}}/{{$countsie}}</b></div>
    <h1>Cảm ơn bạn đã tham gia thi. <br> Điểm của bạn đã được lưu lại.</h1>
   </center>

@endsection
