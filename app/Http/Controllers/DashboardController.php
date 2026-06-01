<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $appointments = Appointment::where('email', $user->email)->latest()->get();
        $inquiries = Contact::where('email', $user->email)->latest()->get();
        return view('auth.frontend.dashboard', compact('user', 'appointments', 'inquiries'));
    }
}
