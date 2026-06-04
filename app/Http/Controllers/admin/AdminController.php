<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\Appointment;
use App\Models\QuoteRequest;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Testimonial;

class AdminController extends Controller
{
    //This method will show index page for Admin
    public function index(){
        $stats = [
            'total_inquiries'      => Contact::count(),
            'new_inquiries'        => Contact::where('is_read', 0)->count(),
            'total_appointments'   => Appointment::count(),
            'pending_appointments' => Appointment::where('status', Appointment::STATUS_PENDING)->count(),
            'total_quotes'         => QuoteRequest::count(),
            'new_quotes'           => QuoteRequest::where('status', QuoteRequest::STATUS_NEW)->count(),
            'total_projects'       => Blog::count(),
            'total_services'       => Service::count(),
            'total_testimonials'   => Testimonial::count(),
        ];

        // Also fetch last 5 entries for recent inquiries and appointments
        $recent_inquiries = Contact::latest()->limit(5)->get();
        $recent_appointments = Appointment::latest()->limit(5)->get();

        return view('admin.index', compact('stats', 'recent_inquiries', 'recent_appointments'));
    }
}
