@extends('admin.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)"> Quiz</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Add Quiz</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(session()->has('massage'))

                        <div class="alert alert-success">
                            {{ session()->get('massage') }}
                        </div>
                        @endif
                        <div class="email-box ms-0 ms-sm-0 ms-sm-0">

                            <div class="basic-form">


                                <form action="{{route('Quiz.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="toolbar mb-4" role="toolbar">
                                    </div>

                                    <input type="hidden" name="views" class="form-control" value="0" required="">
                                    <div class="compose-content">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Câu hỏi</label>
                                            <div class="col-lg-6">


                                                <input type="text" name="cauhoi" class="form-control" required="">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Câu trả lời 1 </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="c1" id="validationCustom10" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Câu trả lời 2 </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="c2" id="validationCustom10" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Câu trả lời 3 </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="c3" id="validationCustom10" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Câu trả lời 4 </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="c4" id="validationCustom10" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Đáp án đúng </label>
                                            <div class="col-lg-6">
                                                <select class="default-select  form-control wide" name="traloi">
                                                    <option value="1" required="">Đáp án 1</option>
                                                    <option value="2" required="">Đáp án 2</option>
                                                    <option value="3" required="">Đáp án 3</option>
                                                    <option value="4" required="">Đáp án 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-12 row">
                                            <label class="col-sm-3 col-form-label">Chọn môn học </label>
                                            <div class="col-lg-6">
                                                <select class="default-select  form-control wide" id="area" name="id_cate">
                                                    @foreach ($cate as $cate)
                                                    <option value="{{ $cate -> id}}">{{ $cate->name}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-12 row">
                                            <label class="col-sm-3 col-form-label">Chọn chương</label>
                                            <div class="col-lg-6" >
                                                @foreach ($cateeee as $ca)
                                                <select class="default-select  form-control wide" style="display: none;"

                                                id='select-{{$ca->id}}'
                                                 name="id_chapter">
                                                    @foreach ($chap as $item)
                                                        @if ($item->id_cate == $ca->id)
                                                        <option value="{{ $item->id}}">{{ $item->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-start mt-4 mb-3">
                                        <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span class="me-2"><i class="fa fa-paper-plane"></i></span>Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        const log = console.log;
        const areaSelect = document.querySelector(`[id="area"]`);

        areaSelect.addEventListener(`change`, (e) => {
            var lenghttt = document.getElementById("area").length;
        // log(`e.target`, e.target);
        // document.getElementById("eeeee").innerHTML = "<option>A1</option>";

        const select = e.target;
        const value = select.value;
        const desc = select.options[select.selectedIndex].text;

        let selectElement = document.getElementById('area');
        let optionNames = [...selectElement.options].map(o => o.value);
        optionNames.forEach(element => {
            if(element == value){
                let name = 'select-' + value;
                document.getElementById(name).style.display = "flex";
            }else{
                let name = 'select-' + element;
                document.getElementById(name).style.display = "none";
            }
            log(`option desc`, element);
        });
        });

    </script>
    @endsection
