@php
    $faqItems = collect($faqItems ?? $siteFaqItems ?? [])->take($limit ?? 3)->values();
    $sectionClass = trim(($sectionClass ?? 'faq-area').' '.($sectionExtraClass ?? ''));
    $accordionId = $accordionId ?? 'site-faq-section-'.\Illuminate\Support\Str::random(8);
    $withAos = $withAos ?? false;
@endphp

@once
    @push('styles')
        <style>
            .faq-empty {
                padding: 28px;
                border-radius: 18px;
                background: #f7fbfb;
                color: #667682;
                text-align: center;
                font-size: 16px;
                line-height: 1.6;
            }
        </style>
    @endpush
@endonce

<section class="{{ $sectionClass }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3
                    @if ($withAos)
                        data-aos="fade-up"
                        data-aos-duration="800"
                        data-aos-anchor-placement="top-bottom"
                    @endif
                >
                    Do You Need Help?
                </h3>
                <h6
                    @if ($withAos)
                        data-aos="fade-up"
                        data-aos-duration="900"
                        data-aos-anchor-placement="top-bottom"
                    @endif
                >
                    Frequently Asked <span>Questions</span>
                </h6>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="faq-bar">
                    @include('partials.site-faq-accordion', [
                        'faqItems' => $faqItems,
                        'accordionId' => $accordionId,
                        'withAos' => $withAos,
                    ])
                </div>
            </div>
        </div>
    </div>
</section>
