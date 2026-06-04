<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentAdminController extends Controller
{
    public function index()
    {
        $appointments = Appointment::latest()->get();
        return view('admin.appointments.index', compact('appointments'));
    }

    public function count()
    {
        $count = Appointment::where('status', Appointment::STATUS_PENDING)->count();
        return response()->json(['count' => $count]);
    }

    public function updateStatus(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = $request->status;
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment status updated successfully!');
    }

    public function destroy($id)
    {
        Appointment::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
