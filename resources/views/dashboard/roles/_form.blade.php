@csrf

<div class="dash-form-group">
    <label for="role-name">Role Name</label>
    <input type="text" id="role-name" name="name" value="{{ old('name', $role->name) }}" required>
    @error('name')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

@php
    $selectedPermissions = collect(old('permissions', $role->permissions->pluck('id')->all()))
        ->map(fn ($id) => (int) $id)
        ->all();
@endphp
<div class="dash-form-group">
    <label>Permissions</label>
    <p class="dash-form-hint">Choose exactly what this role is allowed to view and do in each module.</p>
    <div class="dash-permission-matrix">
        @foreach ($permissionGroups as $module => $permissions)
            <div class="dash-permission-group">
                <h4>{{ config("permissions.$module.label", ucfirst($module)) }}</h4>
                <div class="dash-permission-options">
                    @foreach ($permissions as $permission)
                        <label class="dash-permission-checkbox">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" @checked(in_array($permission->id, $selectedPermissions))>
                            {{ $permission->name }}
                        </label>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    @error('permissions')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>
