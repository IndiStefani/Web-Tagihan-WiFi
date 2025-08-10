@php
    $readonly = $mode === 'show' ? 'readonly' : '';
    $disabled = $mode === 'show' ? 'disabled' : '';
@endphp

<div class="form-group">
    <label for="name">Nama</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" {{ $readonly }}>
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}"
        {{ $readonly }}>
</div>

<div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}"
        {{ $readonly }}>
</div>

@if ($mode === 'edit')
    <div class="form-group">
        <label for="roles">Peran</label>
        {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'dropdown']) !!}
    </div>
@elseif($mode === 'show')
    <div class="form-group">
        <label for="roles">Peran</label>
        <input type="text" class="form-control" value="{{ implode(', ', $user->getRoleNames()->toArray()) }}"
            readonly>
    </div>
@endif
