<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        if (session()->has('user')){
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
                return view('home',compact('user', 'schedules'));
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
                        'subject.subject_name',
                        'schedule_user.full_name',
                        // 'study_session.schedule_id',
                        // 'schedule_user.full_name',
                        'schedule.*'
                    )
                    ->distinct()
                    ->get();
                return view('home',compact('user', 'schedules'));
            }
        }
        else {
            return redirect()->route('login');
        }
    }

    
}
