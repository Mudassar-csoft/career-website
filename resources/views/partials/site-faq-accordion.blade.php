@php
    $faqItems = collect($faqItems ?? [])->values();
    $accordionId = $accordionId ?? 'site-faq-accordion-'.\Illuminate\Support\Str::random(8);
    $withAos = $withAos ?? false;
@endphp

@if ($faqItems->isEmpty())
    <div class="faq-empty">No frequently asked questions are available yet.</div>
@else
    <div class="accordion" id="{{ $accordionId }}">
        @foreach ($faqItems as $faq)
            @php
                $itemBaseId = $accordionId.'-'.$loop->index;
                $isOpen = $loop->first;
            @endphp
            <div
                class="accordion-item @if ($withAos) aos-init aos-animate @endif"
                @if ($withAos)
                    data-aos="fade-up"
                    data-aos-duration="{{ 1000 + ($loop->index * 100) }}"
                    data-aos-anchor-placement="top-bottom"
                @endif
            >
                <h2 class="accordion-header" id="{{ $itemBaseId }}-heading">
                    <button
                        class="accordion-button @if (! $isOpen) collapsed @endif"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#{{ $itemBaseId }}-collapse"
                        aria-expanded="{{ $isOpen ? 'true' : 'false' }}"
                        aria-controls="{{ $itemBaseId }}-collapse"
                    >
                        {{ $faq->question }}
                    </button>
                </h2>
                <div
                    id="{{ $itemBaseId }}-collapse"
                    class="accordion-collapse collapse @if ($isOpen) show @endif"
                    aria-labelledby="{{ $itemBaseId }}-heading"
                    data-bs-parent="#{{ $accordionId }}"
                >
                    <div class="accordion-body">
                        <p>{!! nl2br(e($faq->answer)) !!}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
