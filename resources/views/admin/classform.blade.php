@extends('layout.base')

@section('title')
    Thêm lớp học
@endsection

@section('content')
<div class="row">
    <div class="col-3">
        <h3 class="text-dark mb-3">Danh mục quản lý</h3>
        <div class="list-group mb-3">
            <a href="/admin/" class="list-group-item list-group-item-action">
                Quản lý môn học
            </a>
            <a href="/admin/class/" class="list-group-item list-group-item-action active" aria-current="true">Quản lý lớp học</a>
            <a href="/admin/schedule/" class="list-group-item list-group-item-action">Quản lý lịch dạy học</a>
            <a href="#" class="list-group-item list-group-item-action">Quản lý người dùng</a>
        </div>
        <div class="text-center">
            <a href="/auth/logout/" class="btn btn-outline-danger w-100">Đăng xuất</a>
        </div>
    </div>
    <div class="col-2"></div>
    <div class="col-5">
        <h2 class="text-dart mb-3">Thêm lớp học</h2>
        <form action="{{route('admin.addclass')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="classNameInput" class="form-label">Tên lớp học</label>
                <input type="text" class="form-control" id="classNameInput" name="class_name" required>
                @error('class_name')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name='subject_id'>
                    <option selected>Chọn môn học</option>
                    @foreach ($subjects as $item)
                    <option value="{{$item->subject_id}}">{{$item->subject_name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
    <div class="col-2"></div>
</div>
@endsection