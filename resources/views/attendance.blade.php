@extends('layout.base')

@section('title')
    Điểm danh sinh viên
@endsection

@section('css')

@endsection

@section('content')
    <div class="m-3">
        <h3 class="text-primary">Thông tin điểm danh</h3>
        <ul class="list-group list-group-flush">
            <li class="border-0 list-group-item">Học phần: <span class="text-dark fw-bold">{{$studySession[0]->subject_name}}</span></li>
            <li class="border-0 list-group-item">Lớp: <span class="text-dark fw-bold">{{$studySession[0]->class_name}}</span></li>
            <li class="border-0 list-group-item">Giảng viên: <span class="text-dark fw-bold">{{$studySession[0]->full_name}}</span></li>
            <li class="border-0 list-group-item">Buổi học số: <span class="text-dark fw-bold">{{$sessionNumber}}</span></li>
            <li class="border-0 list-group-item">Sỉ số: <span class="text-danger fw-bold">00</span> / <span class="text-dark fw-bold">{{$studySession[0]->number_of_members}}</span></li>
        </ul>
    </div>
    <hr class="border border-primary border-3 opacity-75">
    <div class="m-3">
        <div class="d-flex  align-items-center">
            <h4 class="m-0 text-danger">Tiện ích mở rộng:</h4>
            <div class="ms-3 me-3">
                <button type="button" class="btn btn-primary">Import file</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#QRCodeModal">Show QR Code</button>
            </div>
        </div>
    </div>

    <div class="mb-3">
        <table class="table table-bordered border-dark table-striped align-middle">
            <thead>
                <tr class="table-primary text-center">
                    <th scope="col" rowspan="2" class="align-middle">Mã SV</th>
                    <th scope="col" rowspan="2" class="align-middle">Tên SV</th>
                    <th scope="col" colspan="3">Điểm danh</th>
                    <th scope="col" rowspan="2" class="align-middle">Ghi chú</th>
                </tr>
                <tr class="table-primary text-center">
                    <th scope="col">Có mặt</th>
                    <th scope="col">Vắng</th>
                    <th scope="col">Đi trễ</th>
                </tr>
            </thead>
            <tbody>
                @if ($students->isEmpty())
                    <tr class="text-center align-middle">
                        <td colspan="6">Không có danh sách sinh viên</td>
                    </tr>
                @else
                @foreach ($students as $user)
                    
                    @if ($user->type_of_user == 'SV')
                    @php
                        $attendanceRecord = $students->firstWhere('user_id', $user->user_id);
                    @endphp
                    <tr class="text-center align-middle">
                        <th scope="row">{{$user->username}}</th>
                        <td>{{$user->full_name}}</td>
                        <td>
                            <input type="radio" name="attendance_{{$user->username}}" value="0" id="" {{$attendanceRecord->status == '0' ? 'checked' : ''}} data-user-id="{{$user->user_id}}" data-session-id="{{ $attendanceRecord->study_session_id }}">
                        </td>
                        <td>
                            <input type="radio" name="attendance_{{$user->username}}" value="1" id="" {{$attendanceRecord->status == '1' ? 'checked' : ''}} data-user-id="{{$user->user_id}}" data-session-id="{{ $attendanceRecord->study_session_id }}">
                        </td>
                        <td>
                            <input type="radio" name="attendance_{{$user->username}}" value="2" id="" {{$attendanceRecord->status == '2' ? 'checked' : ''}} data-user-id="{{$user->user_id}}" data-session-id="{{ $attendanceRecord->study_session_id }}">
                        </td>
                        <td class="w-25">
                            <input type="text" name="note_{{$user->username}}" id="note_{{$user->user_id}}" class="w-100" value="{{ $attendanceRecord->note }}" data-username="{{$user->username}}" data-user-id="{{$user->user_id}}" data-session-id="{{ $attendanceRecord->study_session_id }}">
                        </td>
                    </tr>
                    @endif
                @endforeach
                @endif
                
            </tbody>
        </table>
    </div>
    <!-- QR Code Modal -->
    <div class="modal fade" id="QRCodeModal" tabindex="-1" aria-labelledby="QRCodeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="QRCodeModalLabel">Scan QR Code</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center align-items-center border p-3">
                    <div id="qrcode"></div>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('js')
{{-- Ajax để thay đổi thông tin điểm danh trực tiếp trên web --}}
<script>
    function updateStatus(sessionId, userId, status, note) {
        $.ajax({
                url: "{{ route('attendance.update') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_id: userId,
                    status: status,
                    session_id: sessionId,
                    note: note,
                },
                success: function(response) {
                    if (response.success) {
                        console.log('Attendance updated successfully');
                        // alert("Điểm danh thành công");
                    }
                    else {
                        console.error('Failed to update attendance');
                        // alert('Điểm danh không thành công. Kiểm tra QR Code')
                    }
                }
            });
    }
    $(document).ready(function() {
        $('input[type="radio"]').change(function() {
            var userId = $(this).data('user-id');
            var status = $(this).val();
            var sessionId = $(this).data('session-id');
            var note = $('#note_' + userId).val();
            // console.log(userId)
            // console.log(sessionId)
            // console.log(status)
            // console.log(note)
            updateStatus(sessionId, userId, status, note);
        });
        $('input[id^="note_"]').on('change', function() {
            var userId = $(this).data('user-id');
            var sessionId = $(this).data('session-id');
            var username = $(this).data('username');
            var status = $('input[name="attendance_' + username + '"]:checked').val();
            var note = $(this).val();
            // console.log(userId)
            // console.log(sessionId)
            // console.log(status)
            // console.log(note)
            updateStatus(sessionId, userId, status, note);
        });
    });
</script>

{{-- Tạo QR code dựa theo mã buổi học --}}
<script>
    var qrCode = "schedule:{{$studySession[0]->schedule_id}}, studySession:{{$studySession[0]->study_session_id}}";
    console.log('Mã QR:', qrCode)
    // Create QR code
    var qrcode = new QRCode(document.getElementById("qrcode"), {
        text: qrCode,
        width: 200,
        height: 200,
    });
</script>
@endsection