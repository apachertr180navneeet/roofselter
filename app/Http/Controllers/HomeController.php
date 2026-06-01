<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Industry;
use App\Models\Service;
use App\Models\Slider;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //This method will show Our website Landing page
    public function index(){
        $sliders = Slider::where('status',1)->get();
        $services = Service::where('status',1)->latest()->get();
        $abouts = About::where('status',1)->limit(1)->get();

        $testimonials = Testimonial::where('status',1)->get();
        $team_members = TeamMember::where('status',1)->get();
        $industries = Industry::where('status',1)->get();
        $projects = Blog::with('category')->where('status', 1)->get();
        $projects_categories = $projects
        ->map(function ($project) {
            return optional($project->category)->category_name;
        })->filter()->unique()->values();

        return view('frontend.index',compact('sliders','services','abouts','testimonials','team_members','industries','projects','projects_categories'));
    }

}
