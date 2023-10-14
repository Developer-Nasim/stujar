<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>http://bcscomputercity.org/</loc>
        <lastmod>2023-06-25T23:14:17+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>http://bcscomputercity.org/events</loc>
		<lastmod>2023-06-25T23:14:17+00:00</lastmod>
		<priority>0.80</priority>
    </url>
    @foreach ($contents as $content)
        <url>
            <loc>{{url($content->pagelink)}}</loc>
            <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($content->updated_at)) }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @if (!empty($events))
        @foreach ($events as $event)
            <url>
                <loc>{{url($event->slug)}}</loc>
                <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($event->updated_at)) }}</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.8</priority>
            </url>
        @endforeach
    @endif
</urlset>