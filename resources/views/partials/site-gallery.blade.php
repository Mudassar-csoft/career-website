@php
    $galleryCategories = collect($siteGalleryCategories ?? [])->values();
    $galleryInstanceId = 'site-gallery-'.\Illuminate\Support\Str::random(8);
    $moreGalleryUrl = $moreGalleryUrl ?? route('gallery');
    $showMoreButton = $showMoreButton ?? true;
    $gallerySlides = $galleryCategories->mapWithKeys(function ($category) {
        return [
            $category->slug => $category->images
                ->map(fn ($image) => asset('storage/'.$image->image))
                ->values()
                ->all(),
        ];
    })->all();
@endphp

@once
    @push('styles')
        <style>
            .site-gallery-empty,
            .site-gallery-panel-empty {
                padding: 40px 24px;
                border-radius: 24px;
                background: #f7fbfb;
                color: #4a5d69;
                text-align: center;
                font-size: 16px;
                line-height: 1.6;
            }
            .site-gallery-panel-empty {
                grid-column: 1 / -1;
                min-height: 220px;
                display: flex;
                align-items: center;
                justify-content: center;
            }
        </style>
    @endpush
@endonce

<section class="gallery-bar" id="site-gallery">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="900">
                <h2>Gallery</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-10">
                @if ($galleryCategories->isEmpty())
                    <div class="site-gallery-empty">No gallery categories are available yet.</div>
                @else
                    <div class="gallery-section js-site-gallery" data-gallery-wrapper="{{ $galleryInstanceId }}">
                        <ul class="gallery-tabs">
                            @foreach ($galleryCategories as $category)
                                <li
                                    class="@if ($loop->first) active @endif"
                                    data-tab="{{ $galleryInstanceId }}-{{ $category->slug }}"
                                    data-aos="fade-up"
                                    data-aos-duration="{{ 600 + ($loop->index * 100) }}"
                                >
                                    {{ $category->name }}
                                </li>
                            @endforeach
                        </ul>
                        <div class="gallery-content">
                            @foreach ($galleryCategories as $category)
                                <div class="gallery-panel @if ($loop->first) active @endif" id="{{ $galleryInstanceId }}-{{ $category->slug }}">
                                    @forelse ($category->images->take(8)->values() as $imageIndex => $image)
                                        <div class="gallery-item" data-aos="flip-left" data-aos-duration="{{ 900 + ($imageIndex * 100) }}">
                                            <img
                                                src="{{ asset('storage/'.$image->image) }}"
                                                alt="{{ $category->name }}"
                                                loading="lazy"
                                                onerror="this.src='{{ asset('assets/images/img14.png') }}'; this.onerror=null;"
                                            >
                                            <div class="detial">
                                                <h3>{{ $category->name }}</h3>
                                                <button type="button" class="view-btn" data-gallery="{{ $category->slug }}" data-index="{{ $imageIndex }}">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="site-gallery-panel-empty">No photos available in this category yet.</div>
                                    @endforelse
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @if ($showMoreButton)
                        <div class="btn-area">
                            <a href="{{ $moreGalleryUrl }}" class="btn more-btn">More Gallery</a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        $(function () {
            const wrapperId = @json($galleryInstanceId);
            const galleries = @json($gallerySlides);
            const $section = $('[data-gallery-wrapper="' + wrapperId + '"]');

            if (!$section.length) {
                return;
            }

            $section.find('.gallery-tabs li').on('click', function () {
                const tab = $(this).data('tab');

                $section.find('.gallery-tabs li').removeClass('active');
                $(this).addClass('active');
                $section.find('.gallery-panel').removeClass('active');
                $('#' + tab).addClass('active');
            });

            if (!window.Swiper) {
                return;
            }

            if (!window.siteGalleryPopupSwiper) {
                window.siteGalleryPopupSwiper = new Swiper('.popupSlider', {
                    loop: false,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                });
            }

            const popupSwiper = window.siteGalleryPopupSwiper;

            $section.find('.view-btn').on('click', function () {
                const galleryName = $(this).data('gallery');
                const index = Number($(this).data('index'));
                const images = galleries[galleryName] || [];

                if (!images.length) {
                    return;
                }

                popupSwiper.removeAllSlides();

                images.forEach(function (imageUrl) {
                    popupSwiper.appendSlide(
                        '<div class="swiper-slide">' +
                        '<img src="' + imageUrl + '">' +
                        '</div>'
                    );
                });

                popupSwiper.update();
                popupSwiper.slideTo(index, 0);

                const modal = new bootstrap.Modal(document.getElementById('galleryModal'));
                modal.show();
            });
        });
    </script>
@endpush
