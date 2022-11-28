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
                                        <th>Tên</th>
                                        <th>Điểm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($arr as $key => $pro)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            @foreach ($arrStudent as $st)
                                                @if ($st->id == $pro->id_user)
                                                    {{$st->name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            {{$pro->result}}
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
