@extends('layout.base')

@section('title')
    Bảng điều khiển
@endsection

@section('content')
<div class="row">
    <div class="col-3">
        @include('blocks.sidebar_admin')
    </div>
    <div class="col-9">
        <h3 class="text-primary">Quản lý môn học</h3>
        <a href="{{ route('admin.subjectform') }}" class="btn btn-primary mt-3 mb-3">Thêm môn học</a>
        <table class="table table-striped align-middle">
            <thead>
                <tr class=" table-dark">
                    <th scope="col">Mã môn học</th>
                    <th scope="col">Tên môn học</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $item)
                <tr>
                    <th scope="row">{{$item->subject_id}}</th>
                    <td>{{$item->subject_name}}</td>
                    <td>{{$item->descriptions}}</td>
                    <td class="text-center">
                        <a href="/admin/updatesubject/{{$item->subject_id}}" class="btn btn-primary ms-1">Sửa</a>
                        <a href="/admin/deletesubject/{{$item->subject_id}}" class="btn btn-danger ms-1">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
