@php($campuses = config('campus_locations', []))

@if ($campuses !== [])
    <section class="location-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Our Campuses</h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="location-list">
                        @foreach ($campuses as $campus)
                            <div
                                class="location-card @if ($loop->first) active @endif"
                                data-map="{{ $campus['map'] }}"
                                role="button"
                                tabindex="0"
                                aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                            >
                                <div class="location-icon">
                                    <img src="{{ asset('assets/images/icon24.svg') }}" alt="">
                                </div>
                                <div class="location-info">
                                    <h5>Career Institute - {{ $campus['name'] }}</h5>
                                    <p>{{ $campus['address'] }}</p>
                                    <span>{{ $campus['phone'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="map-wrapper">
                        <iframe id="locationMap" src="{{ $campuses[0]['map'] }}" title="Career Institute campus map" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@once
    @push('scripts')
        <script>
            document.addEventListener('click', function (event) {
                var card = event.target.closest('.location-card');

                if (!card) {
                    return;
                }

                document.querySelectorAll('.location-card').forEach(function (item) {
                    item.classList.remove('active');
                    item.setAttribute('aria-pressed', 'false');
                });

                card.classList.add('active');
                card.setAttribute('aria-pressed', 'true');
                document.getElementById('locationMap').src = card.dataset.map;
            });
        </script>
    @endpush
@endonce
