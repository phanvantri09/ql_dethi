@extends('admin.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Danh Sách User</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User</h4>
                    </div>
                    <div class="card-body">
                        @if (session()->has('status'))
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
                                        <th>Email</th>
                                        <th>Quyền</th>
                                        <th>Check Quyền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pro as $key => $p)
                                    <tr>

                                        <td>{{ $key }}</td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->email }}</td>
                                        <td>


                                            @if ($p->is_admin == 0)
                                            Students
                                            @endif
                                            @if ($p->is_admin == 2)
                                            Teacher
                                            @endif
                                            @if ($p->is_admin == 1)
                                            Admin
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                                <a href="">

                                                    <button type="submit" class="btn btn-danger btn-sm">Sửa</button>

                                                </a> ||

                                                <form method="post" action="{{ route('User1.destroy', $p->id) }}">
                                                    @method('delete')
                                                    @csrf

                                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>


                                                </form>

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