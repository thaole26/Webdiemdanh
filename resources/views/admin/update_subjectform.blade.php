@extends('layout.base')

@section('title')
    Thêm môn học
@endsection

@section('content')
<div class="row">
    <div class="col-3">@include('blocks.sidebar_admin')</div>
    <div class="col-2"></div>
    <div class="col-5">
        <h2 class="text-dart mb-3">Thêm môn học</h2>
        <form action="{{route('admin.updatesubject')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="subjectIdInput" class="form-label">Mã môn học</label>
                <input type="text" class="form-control" id="subjectIdInput" name="subject_id" value="{{$subject->subject_id}}" readonly>
            </div>
            <div class="mb-3">
                <label for="subjectNameInput" class="form-label">Tên môn học</label>
                <input type="text" class="form-control" id="subjectNameInput" name="subject_name" value="{{$subject->subject_name}}">
            </div>
            <div class="mb-3">
                <label for="formControlTextarea" class="form-label">Mô tả</label>
                <textarea class="form-control" id="formControlTextarea" rows="3" name="description" value="{{$subject->descriptions}}"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
    <div class="col-2"></div>
</div>
@endsection