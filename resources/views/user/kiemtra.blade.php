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
    <button id="button-start" onclick="clickStart()">Bắt đầu thi</button>
    <div id="main-form">
        <div class="row justify-content-center " >
            <div>Thời gian bắt đầu thi:</div>
            <form action="{{ route('diemso') }}" method="post" enctype="multipart/form-data" role="form" id="myForm">
              @csrf
              <input style="display: none" type="number" id="timee" name="time" value="{{$time}}">
              <input style="display: none" type="datetime-local" id="time_start" name="time_start" value="{{$time_start}}">
              <input type="hidden" name="id_sub" value="{{$id_sub}}">
              <input type="hidden" name="id_exam" value="{{$idExam}}">
              <input type="hidden" name="id_random_exam" value="{{$id_random_exam}}">
              <input type="hidden" name="id_time_exam" value="{{$idTimeExam}}">

               @foreach ($arrQuiz as $keyq => $da)
               @foreach($quizAll as $key => $qu)
               @if($da == $qu->id)
               {{-- <p id="demo"></p> --}}
                    <div>
                        <p><strong>Câu: {{$keyq +1}}</strong> {{$qu->cauhoi}}</p>
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
    </div>
   </center>
   <script>
    document.getElementById("main-form").style.display = "none";
    function clickStart(){

        let k = document.getElementById('timee').value;

        let time_start = document.getElementById('time_start').value;

        const time_startttt = new Date(time_start);

        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var dateTime = date+' '+time;
        if(time_startttt - today <= 0){
            document.getElementById("main-form").style.display = "block";
            document.getElementById("button-start").style.display = "none";
            setTimeout(function(){ document.getElementById("myForm").submit(); }, 60000);// bỏ k vào
        }
        else{
            alert("Chưa tới giờ thi vui vòng đợi");
        }

   }
   </script>
@endsection
