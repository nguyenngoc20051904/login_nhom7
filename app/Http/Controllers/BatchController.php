<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Batch;
use Illuminate\View\View;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batches = Batch::all();
        return view('batches.index')->with('batches', $batches);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::pluck('name', 'id');
        return view('batches.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // Lưu thông tin khóa học vào bảng batches
        Batch::create($data);

        return redirect('batches')->with('success', 'Khoá học đã được thêm thành công');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $batches = Batch::find($id);
        return view('batches.show')->with('batches', $batches);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $batches = Batch::find($id);
        $courses = Course::all(); // Fetch all courses for the dropdown

        return view('batches.edit')->with('batches', $batches)->with('courses', $courses);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|integer|exists:courses,id',
            'start_date' => 'required|date',
            'fee' => 'required|numeric',
        ]);

        $batch = Batch::find($id);
        $batch->update($request->all());

        return redirect()->route('batches.index')->with('success', 'Batch updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Batch::destroy($id);
        return redirect('batches')->with('flash_message', 'Đã xoá sinh viên!');
    }
}
