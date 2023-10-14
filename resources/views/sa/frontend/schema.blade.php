<!-- website schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "url": "{{ $websettings['cms_url'] ?? 'https://www.crenotive.com' }}/",
        "logo": "{{ $websettings['cms_url'] ?? 'https://www.crenotive.com' }}/images/logo.png"
    }
    </script>
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "url": "{{ $websettings['cms_url'] ?? 'https://www.crenotive.com'}}/",
        "potentialAction": {
        "@type": "SearchAction",
        "target": {
            "@type": "EntryPoint",
            "urlTemplate": "{{ $websettings['cms_url'] ?? 'https://www.crenotive.com' }}/search?q={search_term_string}"
        },
        "query-input": "required name=search_term_string"
        }
    }
    </script>