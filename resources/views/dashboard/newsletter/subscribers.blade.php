@extends('dashboard.layout')

@section('title', 'All Subscribers | Dashboard')

@section('topbar-actions')
    <a href="{{ route('dashboard.newsletter.messages') }}" class="dash-btn dash-btn-secondary">View Messages</a>
@endsection

@section('content')
    <div class="dash-page">
        @if (session('status'))
            <div class="dash-status">{{ session('status') }}</div>
        @endif

        <div class="dash-page-header">
            <h2>All Subscribers</h2>
        </div>

        <div class="dash-table-box">
            @if ($subscribers->isEmpty())
                <div class="dash-empty">No subscribers yet. They'll appear here once visitors submit a form on the site.</div>
            @else
                <div class="dash-table-scroll">
                    <table class="dash-table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all"></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Source</th>
                                <th>Date Added</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscribers as $subscriber)
                                <tr>
                                    <td>
                                        <input type="checkbox"
                                               class="subscriber-checkbox"
                                               data-name="{{ $subscriber->name ?? '' }}"
                                               data-email="{{ $subscriber->email ?? '' }}"
                                               data-phone="{{ $subscriber->phone ?? '' }}">
                                    </td>
                                    <td>{{ $subscriber->name ?? '—' }}</td>
                                    <td>{{ $subscriber->email ?? '—' }}</td>
                                    <td>{{ $subscriber->phone ?? '—' }}</td>
                                    <td>{{ $subscriber->source ?? '—' }}</td>
                                    <td>{{ $subscriber->created_at->format('M d, Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <div class="dash-selection-bar" id="selection-bar">
            <span class="dash-selection-count" id="selection-count">0 selected</span>
            <div class="dash-selection-actions">
                <button type="button" class="dash-btn dash-btn-secondary" id="send-sms-btn">Send SMS</button>
                <button type="button" class="dash-btn" id="send-email-btn">Send Email</button>
            </div>
        </div>
    </div>

    <div class="dash-modal-overlay" id="compose-modal">
        <div class="dash-modal dash-modal-lg">
            <h3 id="compose-modal-title">Send Email</h3>

            <form action="{{ route('dashboard.newsletter.send') }}" method="POST" id="compose-form">
                @csrf
                <input type="hidden" name="channel" id="compose-channel" value="email">
                <div id="compose-recipient-inputs"></div>

                <div class="dash-form-group">
                    <label for="compose-title">Title</label>
                    <input type="text" id="compose-title" name="title" required>
                </div>

                <div class="dash-form-group">
                    <label for="compose-body">Message</label>
                    <textarea id="compose-body" name="body" rows="6" required></textarea>
                </div>

                <div class="dash-form-group" style="margin-bottom:0;">
                    <label id="compose-recipients-label">Recipients (<span id="compose-recipient-count">0</span>)</label>
                    <div class="dash-chip-list" id="compose-chip-list"></div>
                    <div class="dash-add-recipient-row">
                        <input type="text" id="compose-add-input" placeholder="Add a custom email">
                        <button type="button" class="dash-btn dash-btn-secondary" id="compose-add-btn">Add</button>
                    </div>
                    <p class="dash-recipient-note" id="compose-skip-note" style="display:none;"></p>
                </div>

                <div class="dash-modal-actions">
                    <button type="button" class="dash-btn dash-btn-secondary" id="compose-cancel">Cancel</button>
                    <button type="submit" class="dash-btn" id="compose-submit">Send</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    var selectAll = document.getElementById('select-all');
    var checkboxes = function () {
        return Array.prototype.slice.call(document.querySelectorAll('.subscriber-checkbox'));
    };
    var selectionBar = document.getElementById('selection-bar');
    var selectionCount = document.getElementById('selection-count');

    function updateSelectionBar() {
        var selected = checkboxes().filter(function (cb) { return cb.checked; });
        selectionCount.textContent = selected.length + ' selected';
        selectionBar.classList.toggle('show', selected.length > 0);
    }

    if (selectAll) {
        selectAll.addEventListener('change', function () {
            checkboxes().forEach(function (cb) { cb.checked = selectAll.checked; });
            updateSelectionBar();
        });
    }

    document.addEventListener('change', function (e) {
        if (e.target.classList && e.target.classList.contains('subscriber-checkbox')) {
            updateSelectionBar();
        }
    });

    var recipients = [];
    var currentChannel = 'email';

    var modal = document.getElementById('compose-modal');
    var modalTitle = document.getElementById('compose-modal-title');
    var channelInput = document.getElementById('compose-channel');
    var chipList = document.getElementById('compose-chip-list');
    var recipientCount = document.getElementById('compose-recipient-count');
    var recipientInputsHolder = document.getElementById('compose-recipient-inputs');
    var skipNote = document.getElementById('compose-skip-note');
    var addInput = document.getElementById('compose-add-input');
    var addBtn = document.getElementById('compose-add-btn');
    var form = document.getElementById('compose-form');

    function renderChips() {
        chipList.innerHTML = '';
        recipientInputsHolder.innerHTML = '';

        recipients.forEach(function (value, index) {
            var chip = document.createElement('span');
            chip.className = 'dash-chip';
            chip.innerHTML = '<span></span><button type="button" aria-label="Remove">&times;</button>';
            chip.querySelector('span').textContent = value;
            chip.querySelector('button').addEventListener('click', function () {
                recipients.splice(index, 1);
                renderChips();
            });
            chipList.appendChild(chip);

            var hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = 'recipients[]';
            hidden.value = value;
            recipientInputsHolder.appendChild(hidden);
        });

        recipientCount.textContent = recipients.length;
    }

    function openCompose(channel, selectedSubscribers) {
        currentChannel = channel;
        channelInput.value = channel;
        modalTitle.textContent = channel === 'email' ? 'Send Email' : 'Send SMS';
        addInput.placeholder = channel === 'email' ? 'Add a custom email' : 'Add a custom phone number';

        var field = channel === 'email' ? 'email' : 'phone';
        var withValue = selectedSubscribers.filter(function (s) { return s[field]; });
        var skipped = selectedSubscribers.length - withValue.length;

        recipients = withValue.map(function (s) { return s[field]; });
        renderChips();

        if (skipped > 0) {
            skipNote.style.display = 'block';
            skipNote.textContent = skipped + ' selected subscriber(s) skipped — no ' + field + ' on file.';
        } else {
            skipNote.style.display = 'none';
        }

        form.reset();
        channelInput.value = channel;
        renderChips();
        modal.classList.add('open');
    }

    function getSelectedSubscribers() {
        return checkboxes().filter(function (cb) { return cb.checked; }).map(function (cb) {
            return { name: cb.dataset.name, email: cb.dataset.email, phone: cb.dataset.phone };
        });
    }

    document.getElementById('send-email-btn').addEventListener('click', function () {
        openCompose('email', getSelectedSubscribers());
    });
    document.getElementById('send-sms-btn').addEventListener('click', function () {
        openCompose('sms', getSelectedSubscribers());
    });

    document.getElementById('compose-cancel').addEventListener('click', function () {
        modal.classList.remove('open');
    });
    modal.addEventListener('click', function (e) {
        if (e.target === modal) {
            modal.classList.remove('open');
        }
    });

    addBtn.addEventListener('click', function () {
        var value = addInput.value.trim();
        if (!value) {
            return;
        }
        if (recipients.indexOf(value) === -1) {
            recipients.push(value);
            renderChips();
        }
        addInput.value = '';
    });

    form.addEventListener('submit', function (e) {
        if (recipients.length === 0) {
            e.preventDefault();
            alert('Add at least one recipient.');
        }
    });
</script>
@endpush
