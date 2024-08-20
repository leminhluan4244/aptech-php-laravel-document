<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $students = Student::search($search);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $classes = Classes::all();
        return view('students.create', compact('classes'));
    }

    public function store(Request $request)
    {

        $rules = [
            'student_name' => 'required|string|max:100',
            'birth_date' => 'required|date',
            'gender' => 'required|in:Nam,Nữ',
            'class_id' => 'required|exists:classes,class_id',
        ];

        $customMessage = [
            'student_name.required' => 'Tên sinh viên là bắt buộc.',
            'student_name.string' => 'Tên sinh viên phải là chuỗi.',
            'student_name.max' => 'Tên sinh viên không được quá 100 ký tự.',
            'birth_date.required' => 'Ngày sinh là bắt buộc.',
            'birth_date.date' => 'Ngày sinh là sai định dạng tháng/ngày/năm.',
            'gender.required' => 'Giới tính là bắt buộc.',
            'gender.in' => 'Giới tính là nam hoặc nữ.',
            'class_id.required' =>  'Chọn lớp là bắt buộc.',
            'class_id.exists' =>  'Lớp bạn chọn không tồn tại trong dữ liệu lớp học.',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessage);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $student = Student::create($request->all());

        return redirect()->route('students.index')->with('success', 'Sinh viên đã được thêm thành công');
    }

    public function edit(Request $request)
    {
        $classes = Classes::all();
        $student = Student::find($request->student_id);
        return view('students.edit', compact('student', 'classes'));
    }

    public function update(Request $request, Student $student)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required',
            'student_name' => 'required|string|max:100',
            'birth_date' => 'required|date',
            'gender' => 'required|in:Nam,Nữ',
            'class_id' => 'required|exists:classes,class_id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $student->where('student_id', intval($request->student_id))->update([
            "student_name" => $request->student_name,
            "birth_date" => Carbon::parse($request->birth_date)->format('Y-m-d'),
            "gender" => $request->gender,
            "class_id" => intval($request->class_id),
        ]);

        return redirect()->route('students.index')->with('success', 'Thông tin sinh viên đã được cập nhật');
    }

    public function delete(Student $student)
    {
        return view('students.delete', compact('student'));
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Sinh viên đã được xóa thành công');
    }
}
