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
   <center>
    <div class="row justify-content-center">
        <h2>       </h2>
        <p></p>
        <form action="" method="post" enctype="multipart/form-data" role="form">
          @csrf
     
          
           @foreach ($data as $key => $da)
           @foreach($cauhoi as $key => $qu)
           @if($da == $qu->id)
  
       

           <p id="demo"></p>
                <div>
                    <p><strong>Câu: {{$key +1}}</strong> {{$qu->cauhoi}}</p>
                    <div class="custom-control custom-checkbox mb-3">
                        <strong>a.</strong>
                        <input type="radio" class="custom-control-input" value="1" id="" name="cauhoi{{$qu->id}}">
                        <label class="custom-control-label" for="customCheck">{{$qu->c1}}</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <strong>b.</strong>
                        <input type="radio" class="custom-control-input" value="2"  name="cauhoi{{$qu->id}}">
                        <label class="custom-control-label" for="customCheck">{{$qu->c2}}</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <strong>c.</strong>
                        <input type="radio" class="custom-control-input" value="3" name="cauhoi{{$qu->id}}">
                        <label class="custom-control-label" for="customCheck">{{$qu->c3}}</label>
                    </div>
                    <div class="custom-control custom-checkbox mb-3">
                        <strong>d.</strong>
                        <input type="radio" class="custom-control-input" value="4"  name="cauhoi{{$qu->id}}">
                        <label class="custom-control-label" for="customCheck">{{$qu->c4}}</label>
                    </div>
                    <br>
                    @endif
                @endforeach
                @endforeach
                 <input type="submit" value="Nộp Bài">
        </form>
       </div>
   </center>
@endsection
