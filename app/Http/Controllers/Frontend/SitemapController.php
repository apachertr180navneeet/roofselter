<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Service;
use App\Http\Controllers\Controller;

class SitemapController extends Controller
{
    public function index()
    {
        $services = Service::where('status', 1)->select('slug', 'updated_at')->get();
        $projects = Blog::where('status', 1)->select('slug', 'updated_at')->get();

        return response()->view('sitemap', compact('services', 'projects'))->header('Content-Type', 'text/xml');
    }
}
