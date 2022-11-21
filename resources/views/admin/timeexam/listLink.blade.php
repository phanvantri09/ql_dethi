@extends('admin.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Datatable</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Time Exam</h4>
                    </div>
                    <div class="card-body">
                    @if(session()->has('status'))

                        <div class="alert alert-success">
                            {{ session()->get('status') }}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Stt</th>
                                        <th>Môn</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ListTimeExam as $key => $pro)
                                    <tr>
                                        <td>Đề {{$key+1}}</td>
                                        <td>{{$timeExam ->name}}</td>
                                        <td><input type="text" value="{{ route('linkExamRun', ['id'=>$id,'id_exam_random'=>$pro->id]) }}" id="InputLink{{$key}}"></td>
                                        <td style="margin-right: 10px;">
                                            <div class="d-flex">
                                                <button class="btn btn-sm" style="margin-right: 10px;" onclick="copyLink{{$key}}()">Copy link</button>
                                            {{-- <a href="{{route('delete.Time',$pro->id)}}">
                                                <button style="margin-right: 10px;" type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </a>
                                            <a href="{{route('add.list.student',$pro->id)}}">
                                                <button style="margin-right: 10px;" type="submit" class="btn btn-danger btn-sm">Add student</button>
                                            </a> --}}
                                            </div>
                                        </td>
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
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
