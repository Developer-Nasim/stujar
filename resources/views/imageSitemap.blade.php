{{-- <?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?> --}}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">   
        @foreach ($images as $image)
            <url>
                <loc>{{url($image->name)}}</loc>
                <image:image>
                    <image:loc>{{asset('images/uploads/large/'.$image->file)}}</image:loc>
                    <image:caption>{{$image->caption}}</image:caption>
                    <image:title>{{$image->description }}</image:title>
                </image:image>
            </url>
        @endforeach
</urlset>