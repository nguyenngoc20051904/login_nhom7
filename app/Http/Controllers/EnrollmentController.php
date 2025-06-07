<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Enrollment;
use Illuminate\View\View;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::all();
        return view('enrollments.index')->with('enrollments', $enrollments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $batches = Batch::pluck('name', 'id');
        $students = Student::pluck('name', 'id');
        return view('enrollments.create', compact('batches', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'enroll_no' => 'required|string|max:255',
            'batch_id' => 'required|integer|exists:batches,id',
            'student_id' => 'required|integer|exists:students,id',
            'join_date' => 'required|date',
        ]);

        // Fetch the fee from the batches table based on the selected batch_id
        $batch = Batch::find($request->batch_id);
        if (!$batch) {
            return redirect()->back()->withErrors(['batch_id' => 'Invalid batch selected.']);
        }

        // Create a new enrollment with the fee from the batch
        Enrollment::create([
            'enroll_no' => $request->enroll_no,
            'batch_id' => $request->batch_id,
            'student_id' => $request->student_id,
            'join_date' => $request->join_date,
            'fee' => $batch->fee, // Automatically set the fee from the batch
        ]);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully');
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $enrollments = Enrollment::find($id);
        return view('enrollments.show')->with('enrollments', $enrollments);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $enrollments = Enrollment::findOrFail($id); // Tốt hơn dùng findOrFail để báo lỗi nếu không tìm thấy
        $batches = Batch::pluck('name', 'id');
        $students = Student::pluck('name', 'id');

        return view('enrollments.edit', compact('enrollments', 'batches', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'enroll_no' => 'required|string|max:255',
            'batch_id' => 'required|integer|exists:batches,id',
            'student_id' => 'required|integer|exists:students,id',
            'join_date' => 'required|date',
            'fee' => 'required|numeric'
        ]);

        $enrollments = Enrollment::findOrFail($id);
        $enrollments->update($request->all());

        return redirect()->route('enrollments.index')->with('flash_message', 'Thông tin khoá học đã được cập nhật!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Enrollment::destroy($id);
        return redirect('enrollments')->with('flash_message', 'Đã xoá khoá học!');
    }
}
