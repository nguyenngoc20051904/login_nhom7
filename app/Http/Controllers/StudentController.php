<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\View\View;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::all();
        return view('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'address' => 'required',
        'mobile' => 'required',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // kiểm tra file ảnh
    ]);

    $student = new Student;
    $student->name = $request->name;
    $student->address = $request->address;
    $student->mobile = $request->mobile;

    if ($request->hasFile('avatar')) {
        $file = $request->file('avatar');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $student->avatar = 'uploads/' . $filename; // lưu đường dẫn vào database
    }

    $student->save();

    return redirect('students')->with('success', 'Thêm sinh viên thành công!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id):View
    {
        $students = Student::find($id);
        return view('students.show')->with('students', $students);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id):View
    {
        $student = Student::find($id);
        return view('students.edit')->with('students', $student);
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'address' => 'required',
        'mobile' => 'required',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $student = Student::findOrFail($id);
    $student->name = $request->name;
    $student->address = $request->address;
    $student->mobile = $request->mobile;

    if ($request->hasFile('avatar')) {
        $file = $request->file('avatar');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $student->avatar = 'uploads/' . $filename;
    }

    $student->save();

    return redirect()->route('students.index')->with('success', 'Cập nhật sinh viên thành công!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):RedirectResponse
    {
        Student::destroy($id);
        return redirect('students')->with('flash_message', 'Đã xoá sinh viên!');  
    }
}
