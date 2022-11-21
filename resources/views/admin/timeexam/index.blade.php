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
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pro as $key => $pro)
                                    <tr>

                                        <td>{{$key}}</td>
                                        <td>{{$pro ->name}}</td>
                                        <td style="margin-right: 10px;">
                                            <div class="d-flex">
                                            <a href="{{route('listLink',$pro->id)}}" >
                                                <button style="margin-right: 10px;" type="submit" class="btn btn-danger btn-sm">Danh sách link</button>
                                            </a>
                                            <a href="{{route('delete.Time',$pro->id)}}">
                                                <button style="margin-right: 10px;" type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </a>
                                            <a href="{{route('add.list.student',$pro->id)}}">
                                                <button style="margin-right: 10px;" type="submit" class="btn btn-danger btn-sm">Add student</button>
                                            </a>
                                            </div>
                                        </td>
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
