@php
    $campuses = [
        ['name' => 'Career Institute Kohinoor Branch', 'map' => 'https://share.google/remEwZNrJH1upmSZK'],
        ['name' => 'Career Institute Jinnah Colony Branch', 'map' => 'https://share.google/xo2Z2d57o5BntvBqf'],
        ['name' => 'Career Institute Millat Chowk Branch', 'map' => 'https://share.google/3eB25jVPiXV7VxQkb'],
        ['name' => 'Career Institute Satiana Road Branch', 'map' => 'https://share.google/0tSk37FUgewSOVGDD'],
        ['name' => 'Career Institute Sargodha Branch', 'map' => 'https://share.google/9yLX2BGX7mZQGriVn'],
        ['name' => 'Career Institute Sahiwal Branch', 'map' => 'https://share.google/bDTkBud76AJewWp2U'],
    ];
@endphp

<section class="location-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Our Campuses</h2>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="location-list">
                    @foreach ($campuses as $campus)
                        <a class="location-card {{ $loop->first ? 'active' : '' }}"
                            href="{{ $campus['map'] }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Open {{ $campus['name'] }} in Google Maps">
                            <div class="location-icon">
                                <img src="{{ asset('assets/images/icon24.svg') }}" alt="Location pin">
                            </div>
                            <div class="location-info">
                                <h5>{{ $campus['name'] }}</h5>
                                <p>Open this branch location in Google Maps.</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
