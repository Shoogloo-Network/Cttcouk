@php
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
@endphp
<url>
    <loc>https://www.cheaptraintickets.co.uk/</loc>
    <lastmod>2024-08-09T11:06:31+00:00</lastmod>
    <priority>1.00</priority>
</url>
@foreach ($sitemaps as $post)
    <url>
        <loc>{{ url('/') }}/{{ $post->slug }}</loc>
        <lastmod>{{ $post->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
@endforeach

@php echo '</urlset>'; @endphp
