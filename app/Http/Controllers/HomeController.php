<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutCategory;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Industry;
use App\Models\Service;
use App\Models\Slider;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\WhyChooseUs;
use App\Models\BeforeAfterImage;
use App\Models\Certification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
        $why_choose_us = WhyChooseUs::where('status',1)->orderBy('sort_order')->get();
        $before_after_images = BeforeAfterImage::where('status',1)->orderBy('sort_order')->get();
        $certifications = Certification::where('status',1)->orderBy('sort_order')->get();

        return view('frontend.index', compact(
            'sliders','services','abouts','testimonials','team_members',
            'industries','projects','projects_categories','why_choose_us',
            'before_after_images','certifications'
        ));
    }

    public function about()
    {
        $abouts = About::with('category')->where('status', 1)->get();
        $aboutCategories = AboutCategory::where('status', 1)->get();
        $team_members = TeamMember::where('status', 1)->get();
        $testimonials = Testimonial::where('status', 1)->get();
        return view('frontend.about', compact('abouts', 'aboutCategories', 'team_members', 'testimonials'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function blog()
    {
        $blogs = Blog::with('category')->where('status', 1)->latest()->paginate(9);
        $categories = BlogCategory::where('status', 1)->get();
        return view('frontend.blog', compact('blogs', 'categories'));
    }

    public function blog_details($slug)
    {
        $blog = Blog::with('category', 'galleryImages')->where('slug', $slug)->where('status', 1)->firstOrFail();
        $recentPosts = Blog::where('status', 1)->where('id', '!=', $blog->id)->latest()->limit(3)->get();
        return view('frontend.blog-details', compact('blog', 'recentPosts'));
    }

    public function serviceDetail($slug)
    {
        $service = Service::with(['category', 'subcategory', 'faqs', 'benefits', 'features', 'essentials'])
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();
        $relatedServices = Service::where('status', 1)
            ->where('id', '!=', $service->id)
            ->where(function($q) use ($service) {
                if ($service->category_id) {
                    $q->where('category_id', $service->category_id);
                }
            })
            ->limit(4)
            ->get();
        return view('frontend.service-detail', compact('service', 'relatedServices'));
    }
}
