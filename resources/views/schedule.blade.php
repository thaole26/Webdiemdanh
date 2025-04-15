@extends('layout.base')

@section('title')
    @if ($user->type_of_user == 'GV')
        Lịch dạy học
    @else 
        Lịch học
    @endif
@endsection

@section('content')
@if ($user->type_of_user == 'GV')
    {{-- Xử lý cho giảng viên --}}
<h2 class="text-primary text-center">Danh sách lớp dạy học</h2>
<table class="table align-middle table-striped">
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
    </tbody>
</table>
@else 
{{-- Xử lý cho sinh viên --}}
<h3 class="text-primary">Danh sách lịch học</h3>
<table class="table align-middle table-striped">
    <thead>
        <tr class="table-secondary">
            <th scope="col">Mã học phần</th>
            <th scope="col">Học phần</th>
            <th scope="col">Tên lớp</th>
            <th scope="col">Tên giảng viên</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
    @foreach ($schedules as $schedule)
        <tr>
            <td>{{$schedule->subject_id}}</td>
            <td>{{$schedule->subject_name}}</td>
            <td>{{$schedule->class_name}}</td>
            <td>{{$schedule->full_name}}</td>
            <td>
                <a href="/schedule/{{$schedule->schedule_id}}" class="btn btn-primary">Tham gia</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif

@endsection