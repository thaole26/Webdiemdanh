@extends('layout.base')

@section('title')
    Trang chủ
@endsection

@section('content')
<div class="row">
    <div class="col-3">
        @include('blocks.sidebar')
    </div>
    <div class="col-9">
        <h3 class="text-primary">Thông tin người dùng</h3>
        <div class="mb-3">
            <div class="row">
                <div class="col-6"><ul class="list-group list-group-flush">
                    <li class="border-0 list-group-item">Mã số: <span class="text-black fw-bold">{{$user->username}}</span></li>
                    <li class="border-0 list-group-item">Họ Tên: <span class="text-black fw-bold">{{$user->full_name}}</span></li>
                    <li class="border-0 list-group-item">Ngày sinh: <span class="text-black fw-bold">{{ \Carbon\Carbon::parse($user->date_of_birth)->format('d/m/Y') }}</span></li>
                    <li class="border-0 list-group-item">Vai trò: <span class="text-black fw-bold">
                    @if ($user->type_of_user == 'GV')
                        Giảng viên
                    @else 
                        Sinh viên
                    @endif
                    </span></li>
                </ul>
                </div>
                <div class="col-6">
                    <img class="border" width="150" src="{{asset('assets/img/')}}/{{$user->avatar}}" alt="{{$user->avatar}}">
                </div>
            </div>
        </div>
        <hr class="border border-primary border-3 opacity-75">
        <h3 class="text-primary">Danh sách lớp dạy học</h3>
        <table class="table align-middle table-striped">
            @if ($user->type_of_user == 'GV')
            {{-- Xử lý cho giảng viên --}}
            <thead>
                <tr class="table-secondary">
                    <th scope="col">Học phần</th>
                    <th scope="col">Tên lớp</th>
                    <th scope="col">Số lượng sinh viên</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($schedules as $schedule)
                <tr>
                    <td>{{$schedule->subject_name}}</td>
                    <td>{{$schedule->class_name}}</td>
                    <td>{{$schedule->number_of_members}}</td>
                    <td>
                        <a href="/schedule/{{$schedule->schedule_id}}" class="btn btn-primary">Quản lý</a>
                    </td>
                </tr>
                @endforeach
            @else 
                {{-- Xử lý cho sinh viên --}}
                <thead>
                    <tr class="table-secondary">
                        <th scope="col">Học phần</th>
                        <th scope="col">Tên lớp</th>
                        <th scope="col">Tên giảng viên</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($schedules as $schedule)
                <tr>
                    <td>{{$schedule->subject_name}}</td>
                    <td>{{$schedule->class_name}}</td>
                    <td>{{$schedule->full_name}}</td>
                    <td>
                        <a href="/schedule/{{$schedule->schedule_id}}" class="btn btn-primary">Tham gia</a>
                    </td>
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection 