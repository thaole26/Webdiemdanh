<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudySessionController extends Controller
{
    public function getStudySessionByID(string $schedule_id, string $study_session_id) {
        $studySession = DB::table("study_session")
        // ->join('attendance', 'study_session.study_session_id', '=', 'attendance.study_session_id')
        ->join('schedule', 'study_session.schedule_id', '=', 'schedule.schedule_id')
        ->join('classroom', 'schedule.class_id', '=', 'classroom.class_id')
        ->join('subject', 'classroom.subject_id', '=', 'subject.subject_id')
        ->join('users', 'schedule.user_id', '=', 'users.user_id')
        ->select(
                'study_session.*',
                // 'attendance.*',
                'subject.subject_name',
                'classroom.class_name',
                'classroom.number_of_members',
                'users.*',
            )
            ->where('study_session.study_session_id', $study_session_id)
            ->where('study_session.schedule_id', $schedule_id)
            ->get() ;
        // dd($studySession);
        $students = DB::table('attendance')
            ->join('study_session', 'study_session.study_session_id', '=', 'attendance.study_session_id')
            ->join('users', 'attendance.user_id', '=', 'users.user_id')
            ->where('attendance.study_session_id', $study_session_id)
            ->select(
                'attendance.*',
                'users.*',
            )
            ->get() ;
        // $attendanceRecord = DB::table('attendance')
        $sessionNumber = DB::table('study_session')
        ->join('schedule', 'study_session.schedule_id', '=', 'schedule.schedule_id')
        ->join('classroom', 'schedule.class_id', '=', 'classroom.class_id')
        ->join('subject', 'classroom.subject_id', '=', 'subject.subject_id')
        ->where('schedule.schedule_id', $schedule_id)
        ->where('study_session.study_session_id', '<=', $study_session_id)
        ->orderBy('study_session.study_session_id')
        ->count();
        // dd($sessionNumber);
        return view('attendance', compact('studySession', 'students', 'sessionNumber'));
    }
}
