<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard | Career Website')</title>
    <style>
        :root {
            --dash-bg: #f4f7f9;
            --dash-sidebar-from: #009DB8;
            --dash-sidebar-to: #03C587;
            --dash-border: #232f42;
            --dash-text: #1d2b36;
            --dash-muted: rgba(255, 255, 255, 0.75);
            --dash-accent: #ffffff;
            --dash-header-h: 84px;
        }
        * { box-sizing: border-box; }
        html, body {
            margin: 0;
            height: 100%;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
            background: var(--dash-bg);
            color: var(--dash-text);
        }
        .dash-wrapper {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        .dash-sidebar {
            width: 260px;
            flex-shrink: 0;
            background: linear-gradient(180deg, var(--dash-sidebar-from) 0%, var(--dash-sidebar-to) 100%);
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            transition: width .2s ease;
        }
        .dash-wrapper.dash-collapsed .dash-sidebar {
            width: 0;
            overflow: hidden;
        }
        .dash-sidebar-header {
            height: var(--dash-header-h);
            padding: 0 18px 0 20px;
            background: linear-gradient(135deg, #eefcf8 0%, #e3f6f2 100%);
            display: flex;
            align-items: center;
            justify-content: flex-start;
            position: sticky;
            top: 0;
            z-index: 2;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            border-bottom: 3px solid;
            border-image: linear-gradient(90deg, var(--dash-sidebar-from), var(--dash-sidebar-to)) 1;
        }
        .dash-logo {
            display: block;
        }
        .dash-logo img {
            display: block;
            width: 170px;
            max-width: 100%;
            height: auto;
        }
        .dash-nav {
            list-style: none;
            margin: 0;
            padding: 8px;
            flex: 1;
        }
        .dash-nav li { margin-bottom: 2px; }
        .dash-nav a {
            display: block;
            padding: 10px 12px;
            border-radius: 6px;
            color: var(--dash-muted);
            text-decoration: none;
            font-size: 14px;
            transition: background .15s, color .15s;
        }
        .dash-nav a:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
        }
        .dash-nav a.active {
            background: rgba(255, 255, 255, 0.95);
            color: #03917a;
            font-weight: 600;
        }
        .dash-nav-toggle {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 12px;
            border-radius: 6px;
            border: 0;
            background: none;
            color: var(--dash-muted);
            font-size: 14px;
            font-family: inherit;
            cursor: pointer;
            transition: background .15s, color .15s;
        }
        .dash-nav-toggle:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
        }
        .dash-nav-dropdown.open .dash-nav-toggle {
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
        }
        .dash-nav-chevron {
            transition: transform .15s;
            flex-shrink: 0;
        }
        .dash-nav-dropdown.open .dash-nav-chevron {
            transform: rotate(180deg);
        }
        .dash-nav-submenu {
            list-style: none;
            margin: 2px 0 0;
            padding: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height .2s ease;
        }
        .dash-nav-dropdown.open .dash-nav-submenu {
            max-height: 200px;
        }
        .dash-nav-submenu a {
            padding: 9px 12px 9px 30px;
            font-size: 13px;
        }
        .dash-main {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }
        .dash-topbar {
            height: var(--dash-header-h);
            padding: 0 24px;
            background: #fff;
            border-bottom: 1px solid #e2e8ef;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
        }
        .dash-topbar-left,
        .dash-topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .dash-topbar .dash-current {
            font-size: 14px;
            color: #5b6b78;
        }
        .dash-topbar a.dash-open-live {
            font-size: 13px;
            color: #03917a;
            text-decoration: none;
            font-weight: 600;
            white-space: nowrap;
        }
        .dash-icon-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 8px;
            border: 0;
            background: #f4f7f9;
            color: #4b5b66;
            cursor: pointer;
            flex-shrink: 0;
            transition: background .15s, color .15s;
        }
        .dash-icon-btn:hover {
            background: #e3f6f2;
            color: #03917a;
        }
        .dash-search {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #f4f7f9;
            border-radius: 999px;
            padding: 9px 16px;
            min-width: 280px;
            transition: box-shadow .15s;
        }
        .dash-search:focus-within {
            box-shadow: 0 0 0 2px rgba(3, 197, 135, 0.35);
        }
        .dash-search svg {
            color: #7c8a94;
            flex-shrink: 0;
        }
        .dash-search input {
            border: 0;
            background: transparent;
            outline: none;
            font-size: 14px;
            color: var(--dash-text);
            width: 100%;
            font-family: inherit;
        }
        .dash-search input::placeholder {
            color: #9aa7b0;
        }
        @media (max-width: 640px) {
            .dash-search { min-width: 140px; }
        }
        .dash-content-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }
        .dash-frame-holder {
            flex: 1;
            background: #fff;
        }
        .dash-frame-holder iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }
        .dash-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px;
        }
        .dash-panel h2 {
            margin: 0 0 8px;
            font-size: 22px;
            color: var(--dash-text);
        }
        .dash-panel p {
            margin: 0;
            color: #7c8a94;
            font-size: 14px;
        }
        .dash-soon-badge {
            display: inline-block;
            margin-bottom: 14px;
            padding: 4px 12px;
            border-radius: 999px;
            background: linear-gradient(90deg, var(--dash-sidebar-from) 0%, var(--dash-sidebar-to) 100%);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .05em;
            text-transform: uppercase;
        }

        /* Profile dropdown */
        .dash-profile {
            position: relative;
        }
        .dash-profile-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            background: none;
            border: 0;
            cursor: pointer;
            padding: 6px 8px;
            border-radius: 8px;
            font-family: inherit;
        }
        .dash-profile-btn:hover {
            background: #f4f7f9;
        }
        .dash-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--dash-sidebar-from) 0%, var(--dash-sidebar-to) 100%);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 15px;
            letter-spacing: .02em;
            flex-shrink: 0;
            border: 2px solid #fff;
            box-shadow: 0 2px 6px rgba(3, 197, 135, 0.35);
            transition: transform .15s, box-shadow .15s;
        }
        .dash-profile-btn:hover .dash-avatar {
            transform: scale(1.06);
            box-shadow: 0 4px 10px rgba(3, 197, 135, 0.45);
        }
        .dash-profile-name {
            font-size: 14px;
            color: var(--dash-text);
            font-weight: 600;
        }
        .dash-chevron {
            color: #7c8a94;
            transition: transform .15s;
        }
        .dash-profile.open .dash-chevron {
            transform: rotate(180deg);
        }
        .dash-profile-menu {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.14);
            min-width: 190px;
            padding: 6px;
            display: none;
            z-index: 20;
        }
        .dash-profile.open .dash-profile-menu {
            display: block;
        }
        .dash-profile-menu a {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 9px 12px;
            border-radius: 6px;
            font-size: 14px;
            color: var(--dash-text);
            text-decoration: none;
        }
        .dash-profile-menu a:hover,
        .dash-profile-menu form button:hover {
            background: #f4f7f9;
        }
        .dash-menu-divider {
            height: 1px;
            background: #eef1f4;
            margin: 6px 4px;
        }
        .dash-menu-danger {
            color: #e11d48 !important;
        }

        /* Analytics */
        .dash-analytics {
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .dash-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }
        .dash-card {
            background: #fff;
            border-radius: 12px;
            padding: 18px;
            display: flex;
            align-items: flex-start;
            gap: 14px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }
        .dash-card-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            flex-shrink: 0;
        }
        .dash-icon-teal { background: linear-gradient(135deg, var(--dash-sidebar-from), var(--dash-sidebar-to)); }
        .dash-icon-blue { background: #3b82f6; }
        .dash-icon-amber { background: #f59e0b; }
        .dash-icon-rose { background: #f43f5e; }
        .dash-card-body {
            display: flex;
            flex-direction: column;
            gap: 4px;
            min-width: 0;
        }
        .dash-card-label {
            font-size: 12px;
            color: #7c8a94;
            text-transform: uppercase;
            letter-spacing: .04em;
            font-weight: 600;
        }
        .dash-card-value {
            font-size: 24px;
            font-weight: 700;
            color: var(--dash-text);
        }
        .dash-card-trend {
            font-size: 12px;
            font-weight: 600;
        }
        .dash-trend-up { color: #03917a; }
        .dash-trend-down { color: #e11d48; }
        .dash-trend-flat { color: #7c8a94; font-weight: 500; }

        .dash-charts {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
        .dash-chart-box {
            background: #fff;
            border-radius: 12px;
            padding: 18px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }
        .dash-chart-box h3 {
            margin: 0 0 14px;
            font-size: 15px;
            color: var(--dash-text);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .dash-chart-note {
            font-size: 11px;
            color: #7c8a94;
            font-weight: 500;
        }
        .dash-chart-box .chart-canvas-wrap {
            position: relative;
            height: 240px;
        }

        .dash-table-box {
            background: #fff;
            border-radius: 12px;
            padding: 18px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }
        .dash-table-box h3 {
            margin: 0 0 14px;
            font-size: 15px;
            color: var(--dash-text);
        }
        .dash-table-scroll {
            overflow-x: auto;
        }
        .dash-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }
        .dash-table th {
            text-align: left;
            padding: 10px 12px;
            color: #7c8a94;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: .04em;
            border-bottom: 1px solid #eef1f4;
            white-space: nowrap;
        }
        .dash-table td {
            padding: 12px;
            border-bottom: 1px solid #eef1f4;
            color: var(--dash-text);
            white-space: nowrap;
        }
        .dash-table tr:last-child td {
            border-bottom: none;
        }
        .dash-badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 600;
        }
        .dash-badge-green { background: #e5f8f2; color: #03917a; }
        .dash-badge-amber { background: #fef3e0; color: #b7791f; }
        .dash-badge-red { background: #fde8e8; color: #c53030; }

        /* Page header + buttons */
        .dash-page {
            padding: 24px;
        }
        .dash-page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            gap: 12px;
            flex-wrap: wrap;
        }
        .dash-page-header h2 {
            margin: 0;
            font-size: 18px;
            color: var(--dash-text);
        }
        .dash-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 10px 18px;
            border-radius: 8px;
            border: 0;
            background: linear-gradient(90deg, var(--dash-sidebar-from) 0%, var(--dash-sidebar-to) 100%);
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            font-family: inherit;
        }
        .dash-btn:hover {
            opacity: .92;
        }
        .dash-btn-secondary {
            background: #f4f7f9;
            color: var(--dash-text);
        }
        .dash-btn-danger {
            background: #fde8e8;
            color: #c53030;
        }
        .dash-status {
            margin-bottom: 18px;
            padding: 12px 16px;
            border-radius: 8px;
            background: #e5f8f2;
            color: #03917a;
            font-size: 13px;
            font-weight: 600;
        }
        .dash-empty {
            padding: 40px;
            text-align: center;
            color: #7c8a94;
            font-size: 14px;
        }
        .dash-thumb {
            width: 44px;
            height: 44px;
            border-radius: 8px;
            object-fit: cover;
            background: #eef1f4;
        }

        /* Forms */
        .dash-form-box {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            max-width: 760px;
        }
        .dash-form-group {
            margin-bottom: 20px;
        }
        .dash-form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        @media (max-width: 640px) {
            .dash-form-row { grid-template-columns: 1fr; }
        }
        .dash-form-group label {
            display: block;
            margin-bottom: 6px;
            font-size: 13px;
            font-weight: 600;
            color: var(--dash-text);
        }
        .dash-form-group input[type="text"],
        .dash-form-group input[type="date"],
        .dash-form-group input[type="number"],
        .dash-form-group input[type="file"],
        .dash-form-group select,
        .dash-form-group textarea {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #e2e8ef;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            color: var(--dash-text);
            outline: none;
            transition: border-color .15s, box-shadow .15s;
        }
        .dash-form-group input[type="text"]:focus,
        .dash-form-group input[type="date"]:focus,
        .dash-form-group input[type="number"]:focus,
        .dash-form-group select:focus,
        .dash-form-group textarea:focus {
            border-color: var(--dash-sidebar-to);
            box-shadow: 0 0 0 3px rgba(3, 197, 135, 0.15);
        }
        .dash-form-hint {
            margin: 6px 0 0;
            font-size: 12px;
            color: #7c8a94;
        }
        .dash-form-error {
            margin: 6px 0 0;
            font-size: 12px;
            color: #c53030;
        }
        .dash-type-row {
            display: flex;
            gap: 8px;
        }
        .dash-type-row select {
            flex: 1;
        }
        .dash-icon-btn-add {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border-radius: 8px;
            border: 0;
            background: linear-gradient(135deg, var(--dash-sidebar-from), var(--dash-sidebar-to));
            color: #fff;
            font-size: 20px;
            line-height: 1;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .dash-image-preview {
            margin-top: 10px;
            width: 140px;
            height: 100px;
            border-radius: 8px;
            object-fit: cover;
            display: none;
            border: 1px solid #e2e8ef;
        }
        .dash-form-group input[type="file"][aria-invalid="true"] {
            border-color: #c53030;
            box-shadow: 0 0 0 3px rgba(197, 48, 48, 0.12);
        }

        /* Modal */
        .dash-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 22, 32, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 50;
        }
        .dash-modal-overlay.open {
            display: flex;
        }
        .dash-modal {
            background: #fff;
            border-radius: 12px;
            padding: 24px;
            width: 100%;
            max-width: 360px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
        }
        .dash-modal h3 {
            margin: 0 0 16px;
            font-size: 16px;
            color: var(--dash-text);
        }
        .dash-modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            margin-top: 18px;
        }
        .dash-modal-error {
            margin: 8px 0 0;
            font-size: 12px;
            color: #c53030;
            display: none;
        }
        .dash-modal-lg {
            max-width: 560px;
            max-height: 88vh;
            overflow-y: auto;
        }

        /* Subscribers: selection + chips */
        .dash-selection-bar {
            position: sticky;
            bottom: 20px;
            display: none;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 16px;
            padding: 14px 20px;
            background: #1d2b36;
            border-radius: 12px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
            color: #fff;
            flex-wrap: wrap;
        }
        .dash-selection-bar.show {
            display: flex;
        }
        .dash-selection-count {
            font-size: 13px;
            font-weight: 600;
        }
        .dash-selection-actions {
            display: flex;
            gap: 8px;
        }
        .dash-chip-list {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 10px;
            max-height: 140px;
            overflow-y: auto;
            padding: 4px;
            border: 1px solid #e2e8ef;
            border-radius: 8px;
            min-height: 44px;
        }
        .dash-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 10px;
            border-radius: 999px;
            background: #e5f8f2;
            color: #03917a;
            font-size: 12px;
            font-weight: 600;
        }
        .dash-chip button {
            border: 0;
            background: none;
            color: inherit;
            cursor: pointer;
            font-size: 14px;
            line-height: 1;
            padding: 0;
        }
        .dash-add-recipient-row {
            display: flex;
            gap: 8px;
        }
        .dash-add-recipient-row input {
            flex: 1;
        }
        .dash-recipient-note {
            margin-top: 6px;
            font-size: 12px;
            color: #7c8a94;
        }

        @media (max-width: 1200px) {
            .dash-cards { grid-template-columns: repeat(2, 1fr); }
            .dash-charts { grid-template-columns: 1fr; }
        }
        @media (max-width: 576px) {
            .dash-cards { grid-template-columns: 1fr; }
        }
        @media (max-width: 768px) {
            .dash-wrapper { flex-direction: column; }
            .dash-sidebar { width: 100%; max-height: 40vh; }
        }

        /* Themed scrollbars */
        .dash-sidebar {
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.6) transparent;
        }
        .dash-sidebar::-webkit-scrollbar {
            width: 8px;
        }
        .dash-sidebar::-webkit-scrollbar-track {
            background: transparent;
        }
        .dash-sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.5);
            border-radius: 8px;
        }
        .dash-sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.8);
        }

        html {
            scrollbar-width: thin;
            scrollbar-color: #03C587 #eaf5f3;
        }
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #eaf5f3;
        }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, var(--dash-sidebar-from) 0%, var(--dash-sidebar-to) 100%);
            border-radius: 8px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #007e94 0%, #02a06d 100%);
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="dash-wrapper">
        <aside class="dash-sidebar">
            <div class="dash-sidebar-header">
                <a href="{{ route('dashboard.index') }}" class="dash-logo">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="Career Logo">
                </a>
            </div>
            <ul class="dash-nav">
                @foreach ($screens as $screen)
                    <li>
                        @if ($screen['type'] === 'dropdown')
                            @php
                                $isOpen = collect($screen['children'])->contains(fn ($child) => request()->routeIs($child['route']));
                            @endphp
                            <div class="dash-nav-dropdown @if($isOpen) open @endif">
                                <button type="button" class="dash-nav-toggle">
                                    <span>{{ $screen['label'] }}</span>
                                    <svg class="dash-nav-chevron" width="10" height="6" viewBox="0 0 10 6" fill="none">
                                        <path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                                <ul class="dash-nav-submenu">
                                    @foreach ($screen['children'] as $child)
                                        <li>
                                            <a href="{{ $child['uri'] }}" class="@if(request()->routeIs($child['route'])) active @endif">{{ $child['label'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <a href="{{ $screen['type'] === 'home' ? route('dashboard.index') : route('dashboard.show', $screen['key']) }}"
                               data-type="{{ $screen['type'] }}"
                               data-src="{{ $screen['uri'] }}"
                               data-label="{{ $screen['label'] }}"
                               class="dash-nav-link @if($screen['key'] === $active) active @endif">
                                {{ $screen['label'] }}
                            </a>
                        @endif
                    </li>
                @endforeach
            </ul>
        </aside>

        <div class="dash-main">
            <div class="dash-topbar">
                <div class="dash-topbar-left">
                    <button type="button" class="dash-icon-btn" id="dash-sidebar-toggle" aria-label="Toggle full screen">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                            <path d="M2 4.5h14M2 9h14M2 13.5h14" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                        </svg>
                    </button>
                    <div class="dash-search">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <circle cx="7" cy="7" r="5.25" stroke="currentColor" stroke-width="1.5"/>
                            <path d="m14 14-3-3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                        </svg>
                        <input type="text" placeholder="Search...">
                    </div>
                </div>
                <div class="dash-topbar-right">
                    @yield('topbar-actions')
                    <div class="dash-profile" id="dash-profile">
                        <button type="button" class="dash-profile-btn" id="dash-profile-btn">
                            <span class="dash-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</span>
                            <span class="dash-profile-name">{{ auth()->user()->name ?? 'Admin' }}</span>
                            <svg class="dash-chevron" width="10" height="6" viewBox="0 0 10 6" fill="none">
                                <path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        <div class="dash-profile-menu" id="dash-profile-menu">
                            <a href="{{ route('dashboard.profile') }}">View Profile</a>
                            <a href="{{ route('dashboard.settings') }}">Settings</a>
                            <div class="dash-menu-divider"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dash-menu-danger" style="width:100%;text-align:left;background:none;border:0;padding:9px 12px;border-radius:6px;font-size:14px;font-family:inherit;cursor:pointer;display:flex;align-items:center;gap:8px;">Sign Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dash-content-area">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        (function () {
            var profile = document.getElementById('dash-profile');
            var btn = document.getElementById('dash-profile-btn');

            if (btn && profile) {
                btn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    profile.classList.toggle('open');
                });

                document.addEventListener('click', function (e) {
                    if (!profile.contains(e.target)) {
                        profile.classList.remove('open');
                    }
                });
            }

            document.querySelectorAll('.dash-nav-toggle').forEach(function (toggle) {
                toggle.addEventListener('click', function () {
                    toggle.closest('.dash-nav-dropdown').classList.toggle('open');
                });
            });

            var wrapper = document.querySelector('.dash-wrapper');
            var sidebarToggle = document.getElementById('dash-sidebar-toggle');

            if (sidebarToggle && wrapper) {
                sidebarToggle.addEventListener('click', function () {
                    wrapper.classList.toggle('dash-collapsed');
                    setTimeout(function () {
                        if (typeof resizeDashCharts === 'function') {
                            resizeDashCharts();
                        }
                    }, 220);
                });
            }
        })();

        (function () {
            function getFileErrorElement(input) {
                var group = input.closest('.dash-form-group');

                if (!group) {
                    return null;
                }

                var key = input.id || input.name;
                var errorEl = group.querySelector('.dash-client-file-error[data-file-input="' + key + '"]');

                if (!errorEl) {
                    errorEl = document.createElement('p');
                    errorEl.className = 'dash-form-error dash-client-file-error';
                    errorEl.dataset.fileInput = key;
                    errorEl.style.display = 'none';
                    input.insertAdjacentElement('afterend', errorEl);
                }

                return errorEl;
            }

            function clearFileValidation(input, errorEl) {
                input.setCustomValidity('');
                input.removeAttribute('aria-invalid');

                if (errorEl) {
                    errorEl.textContent = '';
                    errorEl.style.display = 'none';
                }
            }

            function showFileValidationError(input, errorEl, message) {
                input.value = '';
                input.setCustomValidity(message);
                input.setAttribute('aria-invalid', 'true');

                if (errorEl) {
                    errorEl.textContent = message;
                    errorEl.style.display = 'block';
                }

                input.reportValidity();
            }

            function validateImageDimensions(input, errorEl, file, width, height) {
                input.dataset.imageDimensionsValidating = 'true';
                input.setCustomValidity('Checking image dimensions.');

                var image = new Image();
                var objectUrl = URL.createObjectURL(file);

                image.onload = function () {
                    URL.revokeObjectURL(objectUrl);
                    delete input.dataset.imageDimensionsValidating;

                    if (image.naturalWidth === width && image.naturalHeight === height) {
                        input.dataset.imageDimensionsValid = 'true';
                        clearFileValidation(input, errorEl);
                        return;
                    }

                    delete input.dataset.imageDimensionsValid;
                    showFileValidationError(input, errorEl, file.name + ' must be exactly ' + width + 'x' + height + ' pixels.');
                };

                image.onerror = function () {
                    URL.revokeObjectURL(objectUrl);
                    delete input.dataset.imageDimensionsValidating;
                    delete input.dataset.imageDimensionsValid;
                    showFileValidationError(input, errorEl, 'Unable to read the dimensions of ' + file.name + '.');
                };

                image.src = objectUrl;
            }

            function validateFileInput(input) {
                var files = Array.prototype.slice.call(input.files || []);
                var maxSizeKb = parseInt(input.dataset.maxSizeKb || '0', 10);
                var requiredWidth = parseInt(input.dataset.requiredWidth || '0', 10);
                var requiredHeight = parseInt(input.dataset.requiredHeight || '0', 10);
                var allowedExtensions = (input.dataset.allowedExtensions || '')
                    .split(',')
                    .map(function (extension) {
                        return extension.trim().toLowerCase();
                    })
                    .filter(Boolean);
                var errorEl = getFileErrorElement(input);

                clearFileValidation(input, errorEl);

                if (!files.length) {
                    return true;
                }

                for (var index = 0; index < files.length; index++) {
                    var file = files[index];
                    var extension = '';
                    var lastDotIndex = file.name.lastIndexOf('.');
                    var message = '';

                    if (lastDotIndex !== -1) {
                        extension = file.name.slice(lastDotIndex + 1).toLowerCase();
                    }

                    if (allowedExtensions.length && allowedExtensions.indexOf(extension) === -1) {
                        message = file.name + ' must use one of these extensions: ' + allowedExtensions.map(function (item) {
                            return '.' + item;
                        }).join(', ') + '.';
                    } else if (maxSizeKb > 0 && file.size > maxSizeKb * 1024) {
                        message = file.name + ' must be ' + maxSizeKb + ' KB or smaller.';
                    }

                    if (!message) {
                        continue;
                    }

                    delete input.dataset.imageDimensionsValid;
                    showFileValidationError(input, errorEl, message);
                    return false;
                }

                if (requiredWidth > 0 && requiredHeight > 0) {
                    if (input.dataset.imageDimensionsValidating === 'true') {
                        return false;
                    }

                    if (input.dataset.imageDimensionsValid !== 'true') {
                        validateImageDimensions(input, errorEl, files[0], requiredWidth, requiredHeight);
                        return false;
                    }
                }

                return true;
            }

            document.querySelectorAll('input[type="file"][data-dashboard-image-upload]').forEach(function (input) {
                input.addEventListener('change', function () {
                    validateFileInput(input);
                });

                if (!input.form || input.form.hasAttribute('data-dashboard-file-validation-bound')) {
                    return;
                }

                input.form.addEventListener('submit', function (event) {
                    var isValid = true;

                    input.form.querySelectorAll('input[type="file"][data-dashboard-image-upload]').forEach(function (fileInput) {
                        isValid = validateFileInput(fileInput) && isValid;
                    });

                    if (!isValid) {
                        event.preventDefault();
                    }
                });

                input.form.setAttribute('data-dashboard-file-validation-bound', 'true');
            });
        })();
    </script>

    @stack('scripts')
</body>
</html>
