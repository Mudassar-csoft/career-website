@extends('dashboard.layout')

@php
    $current = $screens->firstWhere('key', $active);
@endphp

@section('title', ($current['label'] ?? 'Dashboard').' | Dashboard')

@section('topbar-actions')
    <a class="dash-open-live"
       id="dash-open-live"
       href="{{ $current['uri'] ?? '#' }}"
       target="_blank"
       rel="noopener"
       style="{{ ($current['type'] ?? '') !== 'page' ? 'visibility:hidden' : '' }}">
        Open live page &rarr;
    </a>
@endsection

@section('content')
    <div class="dash-frame-holder" id="dash-frame-holder" style="{{ ($current['type'] ?? '') !== 'page' ? 'display:none' : '' }}">
        <iframe id="dash-frame" src="{{ ($current['type'] ?? '') === 'page' ? $current['uri'] : '' }}" title="Page preview"></iframe>
    </div>

    <div class="dash-analytics" id="dash-welcome" style="{{ ($current['type'] ?? '') !== 'home' ? 'display:none' : '' }}">
        <div class="dash-cards">
            <div class="dash-card">
                <div class="dash-card-icon dash-icon-teal">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M17 20a5 5 0 0 0-10 0M12 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
                <div class="dash-card-body">
                    <span class="dash-card-label">Total Students</span>
                    <span class="dash-card-value">3,482</span>
                    <span class="dash-card-trend dash-trend-up">▲ 12.4% this month</span>
                </div>
            </div>
            <div class="dash-card">
                <div class="dash-card-icon dash-icon-blue">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20M4 4.5A2.5 2.5 0 0 1 6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
                <div class="dash-card-body">
                    <span class="dash-card-label">Active Courses</span>
                    <span class="dash-card-value">28</span>
                    <span class="dash-card-trend dash-trend-up">▲ 3 new this month</span>
                </div>
            </div>
            <div class="dash-card">
                <div class="dash-card-icon dash-icon-amber">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><rect x="3" y="4" width="18" height="18" rx="2" stroke="#fff" stroke-width="2"/><path d="M16 2v4M8 2v4M3 10h18" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg>
                </div>
                <div class="dash-card-body">
                    <span class="dash-card-label">Upcoming Events</span>
                    <span class="dash-card-value">6</span>
                    <span class="dash-card-trend dash-trend-flat">Next: Aug 12, 2026</span>
                </div>
            </div>
            <div class="dash-card">
                <div class="dash-card-icon dash-icon-rose">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"><path d="M4 4h16v16H4z" stroke="#fff" stroke-width="2" stroke-linejoin="round"/><path d="m4 5 8 7 8-7" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
                <div class="dash-card-body">
                    <span class="dash-card-label">Newsletter Subscribers</span>
                    <span class="dash-card-value">1,205</span>
                    <span class="dash-card-trend dash-trend-down">▼ 1.8% this month</span>
                </div>
            </div>
        </div>

        <div class="dash-charts">
            <div class="dash-chart-box">
                <h3>Website Visits <span class="dash-chart-note">Last 6 months</span></h3>
                <div class="chart-canvas-wrap">
                    <canvas id="dash-chart-visits"></canvas>
                </div>
            </div>
            <div class="dash-chart-box">
                <h3>Enrollments by Category</h3>
                <div class="chart-canvas-wrap">
                    <canvas id="dash-chart-categories"></canvas>
                </div>
            </div>
        </div>

        <div class="dash-table-box">
            <h3>Recent Enrollments</h3>
            <div class="dash-table-scroll">
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ayesha Khan</td>
                            <td>IT Certification</td>
                            <td>Jul 28, 2026</td>
                            <td><span class="dash-badge dash-badge-green">Confirmed</span></td>
                        </tr>
                        <tr>
                            <td>Bilal Ahmed</td>
                            <td>Study Abroad Prep</td>
                            <td>Jul 27, 2026</td>
                            <td><span class="dash-badge dash-badge-amber">Pending</span></td>
                        </tr>
                        <tr>
                            <td>Sara Malik</td>
                            <td>PSI Exam Training</td>
                            <td>Jul 25, 2026</td>
                            <td><span class="dash-badge dash-badge-green">Confirmed</span></td>
                        </tr>
                        <tr>
                            <td>Usman Tariq</td>
                            <td>Coworking Membership</td>
                            <td>Jul 24, 2026</td>
                            <td><span class="dash-badge dash-badge-red">Cancelled</span></td>
                        </tr>
                        <tr>
                            <td>Hina Raza</td>
                            <td>Ambassador Program</td>
                            <td>Jul 22, 2026</td>
                            <td><span class="dash-badge dash-badge-green">Confirmed</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="dash-panel" id="dash-soon" style="{{ ($current['type'] ?? '') !== 'soon' ? 'display:none' : '' }}">
        <span class="dash-soon-badge">Coming soon</span>
        <h2 id="dash-soon-label">{{ ($current['type'] ?? '') === 'soon' ? $current['label'] : '' }}</h2>
        <p>This section hasn't been built yet.</p>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4"></script>
<script>
    var dashCharts = {};

    function initDashCharts() {
        if (!window.Chart || dashCharts.initialized) {
            return;
        }
        dashCharts.initialized = true;

        var visitsEl = document.getElementById('dash-chart-visits');
        if (visitsEl) {
            dashCharts.visits = new Chart(visitsEl, {
                type: 'line',
                data: {
                    labels: ['Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug'],
                    datasets: [{
                        label: 'Visits',
                        data: [4200, 4800, 5100, 6300, 7100, 6800],
                        borderColor: '#03C587',
                        backgroundColor: 'rgba(3, 197, 135, 0.12)',
                        tension: 0.35,
                        fill: true,
                        pointRadius: 3,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } },
                },
            });
        }

        var categoriesEl = document.getElementById('dash-chart-categories');
        if (categoriesEl) {
            dashCharts.categories = new Chart(categoriesEl, {
                type: 'doughnut',
                data: {
                    labels: ['IT Certifications', 'Study Abroad', 'Coworking', 'Job Placement', 'Other'],
                    datasets: [{
                        data: [38, 24, 14, 16, 8],
                        backgroundColor: ['#009DB8', '#03C587', '#3b82f6', '#f59e0b', '#f43f5e'],
                        borderWidth: 0,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { position: 'bottom', labels: { boxWidth: 10, font: { size: 11 } } } },
                },
            });
        }
    }

    function resizeDashCharts() {
        if (dashCharts.visits) dashCharts.visits.resize();
        if (dashCharts.categories) dashCharts.categories.resize();
    }

    document.addEventListener('DOMContentLoaded', function () {
        var welcome = document.getElementById('dash-welcome');
        if (welcome && welcome.style.display !== 'none') {
            initDashCharts();
        }
    });

    document.querySelectorAll('.dash-nav-link').forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelectorAll('.dash-nav-link').forEach(function (l) {
                l.classList.remove('active');
            });
            link.classList.add('active');

            var type = link.getAttribute('data-type');
            var src = link.getAttribute('data-src');
            var label = link.getAttribute('data-label');

            var frameHolder = document.getElementById('dash-frame-holder');
            var welcome = document.getElementById('dash-welcome');
            var soon = document.getElementById('dash-soon');
            var openLive = document.getElementById('dash-open-live');

            frameHolder.style.display = 'none';
            welcome.style.display = 'none';
            soon.style.display = 'none';

            if (type === 'page') {
                document.getElementById('dash-frame').src = src;
                frameHolder.style.display = '';
                openLive.style.visibility = 'visible';
                openLive.setAttribute('href', src);
            } else if (type === 'home') {
                welcome.style.display = '';
                openLive.style.visibility = 'hidden';
                initDashCharts();
                resizeDashCharts();
            } else {
                document.getElementById('dash-soon-label').textContent = label;
                soon.style.display = '';
                openLive.style.visibility = 'hidden';
            }

            window.history.pushState({}, '', link.getAttribute('href'));
        });
    });
</script>
@endpush
