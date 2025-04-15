@extends('layout.base')

@section('title')
    Danh sách buổi học
@endsection

@section('css')
    <style>
        #my-qr-reader {
            padding: 20px !important;
            border: 1.5px solid #b2b2b2 !important;
            border-radius: 8px;
        }
        
        #my-qr-reader img[alt="Info icon"] {
            display: none;
        }
        
        #my-qr-reader img[alt="Camera based scan"] {
            width: 100px !important;
            height: 100px !important;
        }
        
        button {
            padding: 10px 20px;
            border: 1px solid #b2b2b2;
            outline: none;
            border-radius: 0.25em;
            color: white;
            font-size: 15px;
            cursor: pointer;
            margin-top: 15px;
            margin-bottom: 10px;
            background-color: #008000ad;
            transition: 0.3s background-color;
        }
        
        button:hover {
            background-color: #008000;
        }
        
        #html5-qrcode-anchor-scan-type-change {
            text-decoration: none !important;
            color: #1d9bf0;
        }
    </style>
@endsection

@section('content')
<div class="m-3">
    <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a class="link-underline link-underline-opacity-0" href="/">Trang chủ</a></li>
			<li class="breadcrumb-item"><a class="link-underline link-underline-opacity-0" href="/schedule/">Lịch dạy học</a></li>
			<li class="breadcrumb-item active" aria-current="page">Danh sách buổi học</li>
		</ol>
	</nav>
    <div class="row">
        <div class="col-4">
            <h3 class="text-center border-bottom p-3">Thông tin lớp học</h3>
            <ul class="list-group list-group-flush">
                <li class="border-0 list-group-item">Học phần: <span class="text-dark fw-bold">{{$schedule[0]->subject_name}}</span></li>
                <li class="border-0 list-group-item">Lớp: <span class="text-dark fw-bold">{{$schedule[0]->class_name}}</span></li>
                <li class="border-0 list-group-item">Giảng viên: <span class="text-dark fw-bold">{{$schedule[0]->full_name}}</span></li>
                <li class="border-0 list-group-item">Bắt đầu từ ngày <span class="text-dark fw-bold">{{ \Carbon\Carbon::parse($schedule[0]->start_day)->format('d/m/Y') }}</span> đến ngày <span class="text-dark fw-bold">{{ \Carbon\Carbon::parse($schedule[0]->end_day)->format('d/m/Y') }}</span></li>
                <li class="border-0 list-group-item">Giờ bắt đầu buổi học: <span class="text-dark fw-bold">{{$schedule[0]->start_time}}</span></li>
                <li class="border-0 list-group-item">Giờ kết thúc buổi học: <span class="text-dark fw-bold">{{$schedule[0]->end_time}}</span></li>
                <li class="border-0 list-group-item">Tổng số buổi học: <span class="text-dark fw-bold">{{$schedule[0]->number_of_sessions}}</span></li>
                <li class="border-0 list-group-item">Tổng số sinh viên: <span class="text-dark fw-bold">{{$schedule[0]->number_of_members}}</span></li>
            </ul>
        </div>
        <div class="col-8">
            <h3 class="text-center">Danh sách buổi học</h3>
            <table class="table align-middle table-striped">
                @if ($user->type_of_user == 'GV')
                <thead>
                    <tr class="table-primary">
                        <th scope="col">Buổi dạy học</th>
                        <th scope="col">Ngày dạy học</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Số phòng</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($study_sessions_teacher as $session)
                    <tr>
                        <td>Buổi {{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($session->frametime)->isoFormat('dddd, D/M/YYYY') }}</td>
                        <td>{{$session->study_address}}</td>
                        <td>{{$session->room_name}}</td>
                        <td>
                            <a href="/schedule/{{$session->schedule_id}}/{{$session->study_session_id}}/" class="btn btn-primary">Quản lý</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @else
                <thead>
                    <tr class="table-primary">
                        <th scope="col">Buổi học</th>
                        <th scope="col">Ngày học</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Số phòng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($study_sessions_student as $session)
                    <tr>
                        <td>Buổi {{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($session->frametime)->isoFormat('dddd, D/M/YYYY') }}</td>
                        <td>{{$session->study_address}}</td>
                        <td>{{$session->room_name}}</td>
                        {{-- <td>{{$session->status}}</td> --}}

                        @if ($session->status == '0')
                            <td class="text-success">Đúng giờ</td>
                        @elseif ($session->status == '1')
                            <td class="text-danger">Vắng mặt</td>
                        @elseif ($session->status == '2')
                            <td class="text-warning">Đi trễ</td>
                        @else
                            <td class="text-secondary">Chưa điểm danh</td>
                        @endif

                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#QRCodeModal" data-study-session="{{$session->study_session_id}}" data-user-id="{{$user->user_id}}">Điểm danh QR Code</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
        </div>
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
                <div id="my-qr-reader"></div>
                {{-- <div class="d-flex justify-content-center align-items-center border p-3">
                    <div id="qrcode"></div>
                </div> --}}
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    var btnStudySession = -1
    var btnUserId = -1
    $('button[data-bs-toggle="modal"]').click(function() {
        btnStudySession = $(this).data('study-session');
        btnUserId = $(this).data('user-id');
        });

    function updateStatus(sessionId, userId, status) {
        if (btnStudySession != sessionId) {
            alert('Điểm danh không thành công. Kiểm tra QR Code')
            return
        }
        else{
            $.ajax({
                url: "{{ route('attendance.update') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_id: userId,
                    status: status,
                    session_id: sessionId
                },
                success: function(response) {
                    if (response.success) {
                        console.log('Attendance updated successfully');
                        alert("Điểm danh thành công");
                    }
                    else {
                        console.error('Failed to update attendance');
                        alert('Điểm danh không thành công')
                    }
                }
            });
        }
    }
    
    function domReady(fn) {
        if (
            document.readyState === "complete" ||
            document.readyState === "interactive"
        ) {
            setTimeout(fn, 1000);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }
    
    domReady(function () {
    
        // If found you qr code
        function onScanSuccess(decodeText, decodeResult) {
            //decodeText = schedule:SCHE001, studySession:1
            var input = decodeText.toString();
            var parts = input.split(", ");
            var userId = btnUserId;
            var studySessionPart = parts.find(part => part.startsWith("studySession:"));
            var studySessionId = studySessionPart.split(":")[1];
            // alert("You Qr is : " + decodeText, decodeResult);
            updateStatus(studySessionId, userId, "0");
        }
    
        let htmlscanner = new Html5QrcodeScanner(
            "my-qr-reader",
            { fps: 10, qrbos: 250 }
        );
        htmlscanner.render(onScanSuccess);
    });
</script>
@endsection