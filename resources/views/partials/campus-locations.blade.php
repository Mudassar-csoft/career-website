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
                                data-name="Career Institute - {{ $campus['name'] }}"
                                data-address="{{ $campus['address'] }}"
                                data-map-link="{{ str_replace('&output=embed', '', $campus['map']) }}"
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
                        <div class="map-info-card">
                            <strong id="locationMapName">Career Institute - {{ $campuses[0]['name'] }}</strong>
                            <span id="locationMapAddress">{{ $campuses[0]['address'] }}</span>
                            <a id="locationMapLink" href="{{ str_replace('&output=embed', '', $campuses[0]['map']) }}" target="_blank" rel="noopener noreferrer">Open in Google Maps</a>
                        </div>
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
                document.getElementById('locationMapName').textContent = card.dataset.name;
                document.getElementById('locationMapAddress').textContent = card.dataset.address;
                document.getElementById('locationMapLink').href = card.dataset.mapLink;
            });
        </script>
    @endpush
@endonce
