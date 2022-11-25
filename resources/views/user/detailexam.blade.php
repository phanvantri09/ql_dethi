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
        <form  >
          
     
          
              <h1>   {{$view ->name }} </h1>
              <span> <a class="btn btn-primary py-3 px-5 mt-2" href="{{ route('kiemtra', ['id'=>$view->id]) }}"> Học ngay</a></span>


            </form>
                </div>
        </form>
       </div>
   </center>
@endsection
