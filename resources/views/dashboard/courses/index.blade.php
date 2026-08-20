@extends('dashboard.layout')

@section('title', 'All Courses | Dashboard')

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
    <style>
        .courses-table-wrap .dt-container {
            font-size: 13px;
        }
        .courses-table-wrap .dt-layout-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 16px;
            flex-wrap: wrap;
        }
        .courses-table-wrap .dt-length label,
        .courses-table-wrap .dt-search label {
            font-size: 13px;
            color: #5b6b78;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .courses-table-wrap .dt-input,
        .courses-table-wrap .dt-length select {
            border: 1px solid #e2e8ef;
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 13px;
            color: #1d2b36;
            background: #fff;
            min-height: 40px;
        }
        .courses-table-wrap .dt-input:focus,
        .courses-table-wrap .dt-length select:focus {
            outline: none;
            border-color: #03C587;
            box-shadow: 0 0 0 3px rgba(3, 197, 135, 0.15);
        }
        .courses-table-wrap .dt-search input {
            min-width: 260px;
        }
        .courses-table-wrap table.dataTable thead th {
            border-bottom: 1px solid #eef1f4;
            color: #7c8a94;
            font-weight: 600;
            font-size: 11px;
            letter-spacing: .04em;
            text-transform: uppercase;
            padding: 10px 12px;
            white-space: nowrap;
        }
        .courses-table-wrap table.dataTable tbody td {
            padding: 12px;
            border-bottom: 1px solid #eef1f4;
            vertical-align: middle;
            white-space: nowrap;
        }
        .courses-table-wrap table.dataTable.no-footer {
            border-bottom: 0;
        }
        .courses-table-wrap .dt-info {
            color: #5b6b78;
            font-size: 13px;
        }
        .courses-table-wrap .dt-paging {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }
        .courses-table-wrap .dt-paging .dt-paging-button {
            border: 1px solid #e2e8ef !important;
            border-radius: 8px !important;
            background: #fff !important;
            color: #1d2b36 !important;
            padding: 8px 12px !important;
            margin: 0 !important;
            min-width: 40px;
        }
        .courses-table-wrap .dt-paging .dt-paging-button.current,
        .courses-table-wrap .dt-paging .dt-paging-button:hover {
            border-color: transparent !important;
            background: linear-gradient(90deg, #009DB8 0%, #03C587 100%) !important;
            color: #fff !important;
        }
        .courses-table-wrap .dt-paging .dt-paging-button.disabled {
            opacity: .5;
            cursor: not-allowed;
        }
        .courses-table-wrap .dt-processing {
            border: 0;
            border-radius: 10px;
            padding: 12px 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }
        @media (max-width: 768px) {
            .courses-table-wrap .dt-search input {
                min-width: 180px;
            }
        }
    </style>
@endpush

@section('topbar-actions')
    @can('courses.create')
        <a href="{{ route('dashboard.courses.create') }}" class="dash-btn">+ Create Course</a>
    @endcan
@endsection

@section('content')
    <div class="dash-page">
        @if (session('status'))
            <div class="dash-status">{{ session('status') }}</div>
        @endif

        <div class="dash-page-header">
            <h2>All Courses</h2>
        </div>

        <div class="dash-table-box courses-table-wrap">
            <div class="dash-table-scroll">
                <table class="dash-table" id="courses-table" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Mode</th>
                            <th>Duration</th>
                            <th>Certificate</th>
                            <th>Featured</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script>
        (function () {
            var tableEl = document.getElementById('courses-table');

            if (!tableEl || typeof window.DataTable === 'undefined') {
                return;
            }

            new DataTable(tableEl, {
                processing: true,
                serverSide: true,
                ajax: '{{ route('dashboard.courses.data') }}',
                pageLength: 10,
                searchDelay: 350,
                order: [[1, 'asc']],
                columns: [
                    { data: 'image_html', name: 'courses.image', orderable: false, searchable: false },
                    { data: 'title_html', name: 'courses.title' },
                    { data: 'category_name', name: 'course_categories.name' },
                    { data: 'mode_name', name: 'course_modes.name' },
                    { data: 'duration_label', name: 'courses.duration_weeks' },
                    { data: 'certificate_badge', name: 'courses.has_certificate', orderable: false, searchable: false },
                    { data: 'featured_badge', name: 'courses.is_featured', orderable: false, searchable: false },
                    { data: 'actions_html', name: 'courses.id', orderable: false, searchable: false }
                ],
                columnDefs: [
                    { targets: [0, 5, 6, 7], className: 'dt-body-nowrap' }
                ],
                language: {
                    search: 'Search:',
                    lengthMenu: 'Show _MENU_ courses',
                    emptyTable: 'No courses found.',
                    zeroRecords: 'No matching courses found.',
                    processing: 'Loading courses...'
                }
            });
        })();
    </script>
@endpush
