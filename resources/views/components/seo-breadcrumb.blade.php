@php
    $routeName = request()->route()?->getName();
    $labels = [
        'about' => 'About Us',
        'ambassador-program' => 'Ambassador Program',
        'blogs' => 'Blogs',
        'category' => 'Category',
        'contact-us' => 'Contact Us',
        'courses-certifications' => 'Courses & Certifications',
        'coworking-space' => 'Coworking Space',
        'event-detail' => 'Event Details',
        'events' => 'Events',
        'faqs' => 'FAQs',
        'gallery' => 'Gallery',
        'how-to-pay' => 'How to Pay',
        'job-placement' => 'Job Placement',
        'kryterion' => 'Kryterion',
        'news' => 'News',
        'pearson-vue' => 'Pearson VUE',
        'psi-exam' => 'PSI Exam',
        'stories' => 'Stories',
        'study-abroad' => 'Study Abroad',
        'verifications' => 'Verifications',
    ];
    $parents = [
        'blog-detail' => ['name' => 'Blogs', 'url' => route('blogs')],
        'course-detail' => ['name' => 'Courses & Certifications', 'url' => route('courses-certifications')],
        'news-detail' => ['name' => 'News', 'url' => route('news')],
        'events.show' => ['name' => 'Events', 'url' => route('events')],
        'events.upload-fee' => ['name' => 'Events', 'url' => route('events')],
    ];
    $resources = [
        'blog-detail' => request()->route('blog'),
        'course-detail' => request()->route('course'),
        'news-detail' => request()->route('news'),
        'events.show' => request()->route('event'),
    ];
    $resource = $resources[$routeName] ?? null;
    $currentTitle = $resource?->title
        ?? ($routeName === 'events.upload-fee' ? 'Upload Payment Receipt' : null)
        ?? $labels[$routeName]
        ?? \Illuminate\Support\Str::headline((string) request()->segment(count(request()->segments())));
    $items = [['name' => 'Home', 'url' => route('home')]];

    if (isset($parents[$routeName])) {
        $items[] = $parents[$routeName];
    }

    $items[] = ['name' => $currentTitle, 'url' => url()->current()];
    $schemaItems = collect($items)->values()->map(fn ($item, $index) => [
        '@type' => 'ListItem',
        'position' => $index + 1,
        'name' => $item['name'],
        'item' => $item['url'],
    ]);
@endphp

<nav class="seo-breadcrumb" aria-label="Breadcrumb">
    <div class="container">
        <ol>
            @foreach ($items as $item)
                <li @if ($loop->last) aria-current="page" @endif>
                    @if ($loop->last)
                        <span>{{ $item['name'] }}</span>
                    @else
                        <a href="{{ $item['url'] }}">{{ $item['name'] }}</a>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
</nav>
<script type="application/ld+json">@json(['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => $schemaItems])</script>
