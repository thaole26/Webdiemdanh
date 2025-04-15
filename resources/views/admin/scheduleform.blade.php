@extends('layout.base')

@section('title')
    Thêm môn học
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
        <h2 class="text-dart mb-3">Thêm lịch học</h2>
        <form action="{{route('admin.addschedule')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="scheduleIdInput" class="form-label">Mã lịch học</label>
                <input type="text" class="form-control" id="scheduleIdInput" name="schedule_id" required>
                @error('schedule_id')
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="startTimeInput" class="form-label">Giờ bắt đầu</label>
                <input type="text" class="form-control" id="startTimeInput" name="start_time" required>
            </div>
            <div class="mb-3">
                <label for="endTimeInput" class="form-label">Giờ kết thúc</label>
                <input type="text" class="form-control" id="endTimeInput" name="end_time" required>
            </div>
            <div class="mb-3">
                <label for="startDayInput" class="form-label">Ngày bắt đầu</label>
                <input type="date" class="form-control" id="startDayInput" name="start_day" required>
            </div>
            <div class="mb-3">
                <label for="endDayInput" class="form-label">Ngày kết thúc</label>
                <input type="date" class="form-control" id="endDayInput" name="end_day" required>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name='user_id'>
                    <option selected>Chọn giảng viên</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name='class_id'>
                    <option selected>Chọn lớp học</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
    <div class="col-2"></div>
</div>
@endsection