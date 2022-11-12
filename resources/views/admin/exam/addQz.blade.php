@extends('admin.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <form action="{{ route('add.qz.exam.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$id->id}}">
            @if(!empty($DBCho[0]))
            <h3>Đã chọn trước:</h1> <br>
                @foreach ($DBCho as $item)
                    <input type="checkbox" name="qz[]" value="{{$item->id}}" checked >
                    <label for="vehicle1"> {{$item->cauhoi}}</label><br>
                @endforeach
            @else
                <h3>Chưa thêm câu hỏi nào:</h1> <br>
            @endif
            @if(!empty($DBNo[0]))
                <h3>Cập nhật thêm ở đây:</h1> <br>
                @foreach ($DBNo as $item)
                    <input type="checkbox" name="qz[]" value="{{$item->id}}"  >
                    <label for="vehicle1"> {{$item->cauhoi}}</label><br>
                @endforeach
                @else
                <h3>Không có câu hỏi có sẵn:</h1> <br>
            @endif
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
@endsection
