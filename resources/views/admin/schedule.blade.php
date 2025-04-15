@extends('layout.base')

@section('title')
    Danh sách lịch học
@endsection

@section('content')
<div class="row">
    <div class="col-3">
        <h3 class="text-dark mb-3">Danh mục quản lý</h3>
        <div class="list-group mb-3">
            <a href="/admin/" class="list-group-item list-group-item-action">
                Quản lý môn học
            </a>
            <a href="/admin/class/" class="list-group-item list-group-item-action">Quản lý lớp học</a>
            <a href="/admin/schedule/" class="list-group-item list-group-item-action active" aria-current="true">Quản lý lịch dạy học</a>
            <a href="#" class="list-group-item list-group-item-action">Quản lý người dùng</a>
        </div>
        <div class="text-center">
            <a href="/auth/logout/" class="btn btn-outline-danger w-100">Đăng xuất</a>
        </div>
    </div>
    <div class="col-9">
        <h3 class="text-primary">Quản lý lịch học</h3>
        {{-- <a href="{{ route('admin.scheduleform') }}" class="btn btn-primary mt-3 mb-3">Thêm lịch học</a> --}}
        <table class="table table-striped align-middle">
            <thead>
                <tr class=" table-dark">
                    <th scope="col">Mã lịch học</th>
                    <th scope="col">Thời gian bắt đầu</th>
                    <th scope="col">Thời gian kết thúc</th>
                    <th scope="col">Ngày bắt đầu</th>
                    <th scope="col">Ngày kết thúc</th>
                    <th scope="col">Tổng số buổi</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $item)
                <tr>
                    <th scope="row">{{$item->schedule_id}}</th>
                    <td>{{$item->start_time}}</td>
                    <td>{{$item->end_time}}</td>
                    <td>{{$item->start_day}}</td>
                    <td>{{$item->end_day}}</td>
                    <td>{{$item->number_of_sessions}}</td>
                    <td class="text-center">
                        <a href="/admin/updateschedule/{{$item->schedule_id}}" class="btn btn-primary ms-1">Sửa</a>
                        <a href="/admin/deleteschedule/{{$item->schedule_id}}" class="btn btn-danger ms-1">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
