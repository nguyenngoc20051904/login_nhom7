<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Payment;
use Illuminate\View\View;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $payments = Payment::all();
        return view('payments.index')->with('payments', $payments);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all enrollments with their fees
        $enrollments = Enrollment::pluck('enroll_no', 'id');
        $fees = Enrollment::pluck('fee', 'id');

        return view('payments.create', compact('enrollments', 'fees'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'enrollment_id' => 'required|integer|exists:enrollments,id',
            'paid_date' => 'required|date',
        ]);

        // Fetch the fee from the enrollments table based on the selected enrollment_id
        $enrollment = Enrollment::find($request->enrollment_id);
        if (!$enrollment) {
            return redirect()->back()->withErrors(['enrollment_id' => 'Invalid enrollment selected.']);
        }

        // Create a new payment with the fee as the amount
        Payment::create([
            'enrollment_id' => $request->enrollment_id,
            'paid_date' => $request->paid_date,
            'amount' => $enrollment->fee, // Set amount to the enrollment's fee
        ]);

        return redirect()->route('payments.index')->with('success', 'Payment created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $payments = Payment::find($id);
        return view('payments.show')->with('payments', $payments);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $enrollments = Enrollment::pluck('enroll_no', 'id');

        $payments = Payment::find($id);
        return view('payments.edit', compact('payments', 'enrollments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $payments = Payment::find($id);
        $input = $request->all();
        $payments->update($input);
        return redirect('payments')->with('flash_message', 'Payments cập nhật!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Payment::destroy($id);
        return redirect('payments')->with('flash_message', 'Payment Deleted!');
    }
}
