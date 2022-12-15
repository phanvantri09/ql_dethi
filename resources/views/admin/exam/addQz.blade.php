@extends('admin.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <form action="{{ route('add.qz.exam.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$id->id}}">
            @if(!empty($DBCho[0]))
            <h3>Đã chọn trước:</h3> <br>
            @else
                <h3 style="color: red">Chưa thêm câu hỏi nào!!!!!</h3> <br>
            @endif
            @foreach ($chapter as $cha)
            @if(!empty($DBCho[0]))
                <h5>Chương: {{$cha->name}}</h5>
                @foreach ($DBCho as $item)
                    @if ($cha->id == $item->id_chapter)
                        <input type="checkbox" name="qz[]" value="{{$item->id}}" checked >
                        <label for="vehicle1"> {{$item->cauhoi}}</label><br>
                    @endif
                @endforeach
            @endif
            @endforeach
            @if(!empty($DBNo[0]))
            <br>
                <h3>Cập nhật thêm ở đây:</h3> <br>
            @else
                <h3>Không có câu hỏi có sẵn:</h1> <br>
            @endif
            @foreach ($chapter as $cha)
            @if(!empty($DBNo[0]))
                <h5>Chương: {{$cha->name}}</h5>
                @foreach ($DBNo as $item)
                    @if ($cha->id == $item->id_chapter)
                        <input type="checkbox" name="qz[]" value="{{$item->id}}"  >
                        <label for="vehicle1"> {{$item->cauhoi}}</label><br>
                    @endif
                @endforeach
            @endif
            @endforeach

            <input type="submit" value="Submit">
        </form>
    </div>
</div>
@endsection
