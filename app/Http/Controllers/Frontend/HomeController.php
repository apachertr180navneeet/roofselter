<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Blog;
use App\Models\Industry;
use App\Models\IndustryFaq;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceFaq;
use App\Models\Slider;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\ProjectImage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::where('status',1)->get();
        $services = Service::where('status',1)->latest()->get();
        $abouts = About::where('status', 1)->limit(1)->get();
        $testimonials = Testimonial::where('status',1)->get();
        $team_members = TeamMember::where('status',1)->get();
        $industries = Industry::where('status',1)->get();
        $projects = Blog::where('status', 1)->latest()->limit(4)->get();
        $faqs = Faq::where('status',1)->get();
        $galleryImages = Gallery::where('status', 1)->orderBy('sort_order')->limit(6)->get();

        return view('frontend.index', compact(
            'sliders','services','abouts','testimonials','team_members',
            'industries','projects','faqs','galleryImages'
        ));
    }

    public function about()
    {
        $abouts = About::where('status', 1)->get();
        $team_members = TeamMember::where('status', 1)->get();
        $testimonials = Testimonial::where('status', 1)->get();
        $faqs = Faq::where('status', 1)->get();
        return view('frontend.about', compact('abouts', 'team_members', 'testimonials', 'faqs'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function blog()
    {
        $blogs = Blog::where('status', 1)->latest()->paginate(9);
        return view('frontend.blog', compact('blogs'));
    }

    public function blog_details($slug)
    {
        $blog = Blog::with('galleryImages')->where('slug', $slug)->where('status', 1)->firstOrFail();
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

    public function faq()
    {
        $faqs = Faq::where('status', 1)->get();
        return view('frontend.faq', compact('faqs'));
    }

    public function pricing()
    {
        $services = Service::with('category')
            ->where('status', 1)
            ->latest()
            ->get();
        $testimonials = Testimonial::where('status', 1)->get();
        return view('frontend.pricing', compact('services', 'testimonials'));
    }

    public function gallery()
    {
        $projectImages = ProjectImage::with('blog')
            ->orderBy('sort_order')
            ->get();
        $projects = Blog::with('galleryImages')
            ->where('status', 1)
            ->whereHas('galleryImages')
            ->get();
        $galleryImages = Gallery::where('status', 1)->orderBy('sort_order')->get();
        return view('frontend.gallery', compact('projectImages', 'projects', 'galleryImages'));
    }

    public function services()
    {
        $services = Service::with('category')
            ->where('status', 1)
            ->latest()
            ->get();
        $categories = $services->pluck('category.title')->filter()->unique();
        return view('frontend.services', compact('services', 'categories'));
    }

    public function team()
    {
        $team_members = TeamMember::where('status', 1)->get();
        return view('frontend.team', compact('team_members'));
    }

    public function testimonials()
    {
        $testimonials = Testimonial::where('status', 1)->get();
        return view('frontend.testimonials', compact('testimonials'));
    }
}
