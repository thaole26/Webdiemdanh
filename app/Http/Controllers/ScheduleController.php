<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function getAll()
    {
        $username = session('user')->username;
            $user = DB::table('users')->where('username', $username)->first();

            if ($user->type_of_user == 'GV') {
                $schedules = DB::table('schedule')
                    ->join('classroom', 'schedule.class_id', '=', 'classroom.class_id')
                    ->join('subject', 'classroom.subject_id', '=', 'subject.subject_id')
                    ->join('users', 'schedule.user_id', '=', 'users.user_id')
                    ->where('schedule.user_id', '=', $user->user_id)
                    ->select(
                        'schedule.*',
                        'classroom.*',
                        'subject.*',
                    )
                    ->get();
                return view('schedule',compact('user', 'schedules'));
            }
            if ($user->type_of_user == 'SV') {
                $schedules = DB::table('schedule')
                    ->join('classroom', 'schedule.class_id', '=', 'classroom.class_id')
                    ->join('subject', 'classroom.subject_id', '=', 'subject.subject_id')
                    ->join('study_session', 'study_session.schedule_id', '=', 'schedule.schedule_id')
                    ->join('attendance', 'study_session.study_session_id', '=', 'attendance.study_session_id')
                    ->join('users as attendance_user', 'attendance.user_id', '=', 'attendance_user.user_id')
                    ->join('users as schedule_user', 'schedule.user_id', '=', 'schedule_user.user_id')
                    ->where('attendance.user_id', '=', $user->user_id)
                    ->select(
                        'classroom.class_name',
                        'subject.*',
                        'schedule_user.full_name',
                        'schedule.*'
                    )
                    ->distinct()
                    ->get();
                return view('schedule',compact('user', 'schedules'));
            }
        // $schedules = DB::table("schedule")->get();
        // return view('error.404');
    }

    public function getScheduleByID(string $schedule_id)
    {
        $username = session('user')->username;
        $user = DB::table('users')->where('username', $username)->first();

        $schedule = DB::table("schedule")
            ->join('classroom', 'schedule.class_id', '=', 'classroom.class_id')
            ->join('subject', 'classroom.subject_id', '=', 'subject.subject_id')
            ->join('users', 'schedule.user_id', '=', 'users.user_id')
            ->select(
                'schedule.*',
                'classroom.*',
                'subject.*',
                'users.*',
            )
            ->where('schedule_id', $schedule_id)
            ->get();

        $study_sessions_student = DB::table('study_session')
            ->join('attendance', 'study_session.study_session_id', '=', 'attendance.study_session_id')
            ->join('users', 'attendance.user_id', '=', 'users.user_id')
            ->where('schedule_id', $schedule_id)
            ->where('attendance.user_id', '=', $user->user_id)
            ->get();
        
        $study_sessions_teacher = DB::table('study_session')
            ->where('schedule_id', $schedule_id)
            ->get();
        return view('studySession', compact('user', 'schedule', 'study_sessions_teacher', 'study_sessions_student'));
    }
}
