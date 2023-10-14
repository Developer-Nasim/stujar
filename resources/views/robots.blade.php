<?php
	$data = App\Models\SiteSetting::first();
?>

{{$data->robots_txt}}

Sitemap: http://bcscomputercity.org/sitemap.xml