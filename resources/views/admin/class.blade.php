@extends('layout.base')

@section('title')
    Danh sách lớp học
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
    <div class="col-9">
        <h3 class="text-primary">Quản lý lớp học</h3>
        <a href="{{ route('admin.classform') }}" class="btn btn-primary mt-3 mb-3">Thêm lớp học</a>
        <table class="table table-striped align-middle">
            <thead>
                <tr class=" table-dark">
                    <th scope="col">Mã lớp học</th>
                    <th scope="col">Tên lớp học</th>
                    <th scope="col">Số thành viên</th>
                    <th scope="col">Học phần</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $item)
                <tr>
                    <th scope="row">{{$item->class_id}}</th>
                    <td>{{$item->class_name}}</td>
                    <td>{{$item->number_of_members}}</td>
                    <td>{{$item->subject_name}}</td>
                    <td class="text-center">
                        <a href="/admin/updateclass/{{$item->class_id}}" class="btn btn-primary ms-1">Sửa</a>
                        <a href="/admin/deleteclass/{{$item->class_id}}" class="btn btn-danger ms-1">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">Cảnh báo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @error('error')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        @if ($errors->has('error'))
            var myModal = new bootstrap.Modal(document.getElementById('errorModal'), {
                keyboard: false
            });
            myModal.show();
        @endif
    });
</script>
@endsection