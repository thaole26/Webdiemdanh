<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function getAll()
    {
        $classes = DB::table('classroom')
            ->join('subject', 'classroom.subject_id', '=', 'subject.subject_id')
            ->select(
                'classroom.*',
                'subject.subject_name'
            )
            ->get();
        return view("admin.class", compact('classes'));
    }
    public function getClassByID(string $class_id)
    {
        $class = DB::table('classroom')
            ->where('class_id', $class_id)
            ->first();
        $subjects = DB::table('subject')
            ->get();
        return view("admin.update_classform", compact('class', 'subjects'));
    }

    public function classform()
    {
        $subjects = DB::table('subject')
            ->get();
        return view('admin.classform', compact('subjects'));
    }
    public function addclass(Request $request)
    {
        $clasExists = DB::table('classroom')
            ->where('class_name', $request->input('class_name'))
            ->where('subject_id', $request->input('subject_id'))
            ->exists();

        if ($clasExists) {
            return redirect()->back()->withErrors(['class_name' => 'Lớp học đã có môn học này!'])->withInput();
        }
        DB::table('classroom')->insert([
            'class_name' => $request->input('class_name'),
            'number_of_members' => 0,
            'subject_id' => $request->input('subject_id'),
            'created_at' => now(), // Thêm thời gian tạo
            'updated_at' => now(), // Thêm thời gian cập nhật
        ]);
        return redirect()->route('admin.class');
    }

    public function updateclass(Request $request)
    {
        DB::table('classroom')
            ->where('class_id', $request->input('class_id'))
            ->update([
                'class_name' => $request->input('class_name'),
                'subject_id' => $request->input('subject_id'),
                'updated_at' => now(), // Thêm thời gian cập nhật
            ]);
            // dd($request->input('class_id'));
        return redirect()->route('admin.class');
    }

    public function deleteClass($class_id)
    {
        $checkExists = DB::table('schedule')
            ->where('schedule.class_id', $class_id)
            ->exists();
        // dd($checkExists);
        if ($checkExists) {
            return redirect()->route('admin.class')
                ->withErrors(['error' => 'Không thể xóa lớp học này vì vẫn có lịch học liên quan.'])
                ->withInput();
        } else {
            DB::table('classroom')->where('class_id', $class_id)->delete();
            return redirect()->route('admin.class');
        }
    }
}
