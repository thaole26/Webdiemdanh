<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Admin_ScheduleController extends Controller
{
    public function getAll() {
        $schedules = DB::table('schedule')
            ->get();
        return view("admin.schedule", compact('schedules'));
    }
    
    public function addschedule(Request $request){
        $scheduleIdExists = DB::table('schedule')->where('schedule_id', $request->input('schedule_id'))->exists();

        if ($scheduleIdExists) {
            return redirect()->back()->withErrors(['schedule_id' => 'Mã môn học đã tồn tại!'])->withInput();
        }
        DB::table('schedule')->insert([
            'schedule_id' => $request->input('schedule_id'),
            'start_time' => $request->input('start_time'),
            'descriptions' => $request->input('description'),
            'created_at' => now(), // Thêm thời gian tạo
            'updated_at' => now(), // Thêm thời gian cập nhật
        ]);
        return redirect()->route('admin.dashboard');
    }
}
