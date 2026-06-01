<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url><loc>{{ url('/') }}</loc><priority>1.0</priority></url>
    <url><loc>{{ route('home.about-us') }}</loc><priority>0.8</priority></url>
    <url><loc>{{ route('home.contact-us') }}</loc><priority>0.8</priority></url>
    <url><loc>{{ route('home.blog') }}</loc><priority>0.7</priority></url>
    <url><loc>{{ route('home.become-a-partner') }}</loc><priority>0.5</priority></url>
    @foreach($services as $s)
    <url><loc>{{ route('home.service-detail', $s->slug) }}</loc><lastmod>{{ $s->updated_at->format('Y-m-d') }}</lastmod><priority>0.6</priority></url>
    @endforeach
    @foreach($projects as $p)
    <url><loc>{{ route('home.blog-details', $p->slug) }}</loc><lastmod>{{ $p->updated_at->format('Y-m-d') }}</lastmod><priority>0.6</priority></url>
    @endforeach
</urlset>
