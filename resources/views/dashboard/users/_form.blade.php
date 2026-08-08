@csrf

<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="user-name">Name</label>
        <input type="text" id="user-name" name="name" value="{{ old('name', $user->name) }}" required>
        @error('name')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="dash-form-group">
        <label for="user-email">Email</label>
        <input type="email" id="user-email" name="email" value="{{ old('email', $user->email) }}" required>
        @error('email')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="user-password">{{ $user->exists ? 'New Password' : 'Password' }}</label>
        <input type="password" id="user-password" name="password" autocomplete="new-password" @if(! $user->exists) required @endif>
        @if ($user->exists)
            <p class="dash-form-hint">Leave blank to keep the current password.</p>
        @endif
        @error('password')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="dash-form-group">
        <label for="user-password-confirmation">Confirm Password</label>
        <input type="password" id="user-password-confirmation" name="password_confirmation" autocomplete="new-password">
    </div>
</div>

<div class="dash-form-group">
    <label for="user-role">Role</label>
    <select id="user-role" name="role_id" required>
        <option value="">Select a role</option>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}" @selected(old('role_id', $user->role_id) == $role->id)>{{ $role->name }}</option>
        @endforeach
    </select>
    @error('role_id')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>
