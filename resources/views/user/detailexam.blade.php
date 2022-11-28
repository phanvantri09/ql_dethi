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
            <h1>{{$view ->name }} </h1>
              <span>
                {{-- <a class="btn btn-primary py-3 px-5 mt-2" href="{{ route('kiemtra', ['id'=>$view->id]) }}"> Danh sách thi của bạn</a></span> --}}
              <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 1110px">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Môn thi</th>
                            <th>Nội dung</th>
                            <th>Thời gian</th>
                            <th>Giáo viên xem thi</th>
                            <th>Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ListStudenExam as $key => $pro)
                        <tr>
                            <td>{{$key+1}}</td>
                                @foreach ($exam as $item)
                                    @if ($item->id == $pro->id_exam)
                                        @foreach ($cate as $ca)
                                            @if ($ca->id == $item->id_sub)
                                                <td>
                                                    {{$ca->name}}
                                                </td>
                                            @endif
                                        @endforeach
                                        <td>
                                            {{$item->content}}
                                        </td>
                                    @endif
                                @endforeach

                                @foreach ($timeExam as $item)
                                    @if ($item->id == $pro->id_exam)
                                    <td>
                                    {{$item->time_start}}
                                    </td>

                                    <td>
                                        @foreach (explode(',',$item->id_teach) as $k)
                                            @foreach ($teacher as $te)
                                                @if ($te->id == $k)
                                                    {{$te->name}} <br>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </td>
                                    @endif
                                @endforeach

                            <td><input style="display: none" type="text" value="{{ route('kiemtra', ['idExam'=>$pro->id_exam,'idTimeExam'=>$pro->id_time_exam]) }}"  id="InputLink{{$key}}"><div class="d-flex">
                                <button class="btn btn-sm" style="margin-right: 10px;" onclick="copyLink{{$key}}()">Copy link</button>
                            {{-- <a href="{{route('delete.Time',$pro->id)}}">
                                <button style="margin-right: 10px;" type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </a>
                            <a href="{{route('add.list.student',$pro->id)}}">
                                <button style="margin-right: 10px;" type="submit" class="btn btn-danger btn-sm">Add student</button>
                            </a> --}}
                            </div></td>

                            <script>
                                function copyLink{{$key}}() {
                                  // Get the text field
                                  var copyText{{$key}} = document.getElementById("InputLink{{$key}}");

                                  // Select the text field
                                  copyText{{$key}}.select();
                                  copyText{{$key}}.setSelectionRange(0, 99999); // For mobile devices

                                  // Copy the text inside the text field
                                  navigator.clipboard.writeText(copyText{{$key}}.value);

                                  // Alert the copied text
                                  alert("Sao chép link thành công: " + copyText{{$key}}.value);
                                }
                            </script>
                            @endforeach
                        </tr>

                    </tbody>
                </table>
        </div>
            </div>
        </form>
       </div>
   </center>
@endsection
