<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function getAll()
    {
        $subjects = DB::table('subject')
            ->get();
        return view("admin.dashboard", compact('subjects'));
    }

    public function getSubjectByID(string $subject_id)
    {
        $subject = DB::table('subject')
            ->where('subject_id', $subject_id)
            ->first();
        return view("admin.update_subjectform", compact('subject'));
    }

    public function subjectform()
    {
        return view('admin.subjectform');
    }

    public function addsubject(Request $request)
    {
        $subjectIdExists = DB::table('subject')->where('subject_id', $request->input('subject_id'))->exists();

        if ($subjectIdExists) {
            return redirect()->back()->withErrors(['subject_id' => 'Mã môn học đã tồn tại!'])->withInput();
        }
        DB::table('subject')->insert([
            'subject_id' => $request->input('subject_id'),
            'subject_name' => $request->input('subject_name'),
            'descriptions' => $request->input('description'),
            'created_at' => now(), // Thêm thời gian tạo
            'updated_at' => now(), // Thêm thời gian cập nhật
        ]);
        return redirect()->route('admin.dashboard');
    }

    public function updatesubject(Request $request)
    {
        DB::table('subject')
            ->where('subject_id', $request->input('subject_id'))
            ->update([
                'subject_name' => $request->input('subject_name'),
                'descriptions' => $request->input('description'),
                'updated_at' => now(), // Thêm thời gian cập nhật
            ]);
        return redirect()->route('admin.dashboard');
    }
    public function deletesubject(string $subject_id) {
        DB::table('subject')->where('subject_id', $subject_id)->delete();
        return redirect()->route('admin.dashboard');
    }
}
