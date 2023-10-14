<!-- Make Dynamic -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [
    {
        "@type": "ListItem",
        "position": 1,
        "name": "Find Shop",
        "item": "{{ $websettings['cms_url'] }}/shops"
    },{
        "@type": "ListItem",
        "position": 2,
        "name": "Management Committee",
        "item": "{{ $websettings['cms_url'] }}/management-committee"
    },{
        "@type": "ListItem",
        "position": 3,
        "name": "Notice",
        "item": "{{ $websettings['cms_url'] }}/notice"
    },{
        "@type": "ListItem",
        "position": 4,
        "name": "Blogs",
        "item": "{{ $websettings['cms_url'] }}/blogs"
    }]
}
</script>