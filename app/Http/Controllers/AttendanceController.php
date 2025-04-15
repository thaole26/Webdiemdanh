<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function showAttendance()
    {
        $students = DB::table('users')
            ->where('type_of_user', 'SV')
            ->get();
        $attendance = DB::table('attendance')
            ->get();
        return view('attendance', compact('students', 'attendance'));
    }

    public function update(Request $request)
    {
        $userId = $request->input('user_id');
        $status = $request->input('status');
        $sessionId = $request->input('session_id');
        $note = $request->input('note');

        // $studySession = DB::table('study_session')
        //     ->join('schedule', 'schedule.schedule_id', "=", 'study_session.schedule_id')
        //     ->where('study_session_id', '=', $sessionId)
        //     ->select(
        //         'schedule.*',
        //     );

        $attendance = DB::table('attendance')
            ->where('user_id', $userId)
            ->where('study_session_id', $sessionId)
            ->first();
        if ($attendance->attendance_time) {
            DB::table('attendance')
                ->where('user_id', $userId)
                ->where('study_session_id', $sessionId)
                ->update([
                    'status' => $status,
                    'change_attendance_time' => now(),
                    'note' => $note
                ]);
        } else {
            // Nếu cột attendance_time chưa có dữ liệu, cập nhật cột này lần đầu tiên
            DB::table('attendance')
            ->updateOrInsert(
                ['user_id' => $userId, 'study_session_id' => $sessionId],
                ['status' => $status, 'attendance_time' => now(), 'note' => $note],
            );
        }
            

        return response()->json(['success' => true]);
    }
}
