
@extends('layouts.pos')

@section('title', 'Edit User')

@section('content')
<section class="panel">
    <div class="eyebrow">User Management</div>
    <h1>Edit User Account</h1>
    <p>Update the user's account information.</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Please correct the following errors:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('users.update', $user->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username', $user->username) }}"
                required
            >
            @error('username')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="{{ old('full_name', $user->name) }}"
                required
            >
            @error('full_name')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $user->email) }}"
                required
            >
            @error('email')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select id="role" name="role">
                @foreach (['Cashier', 'Manager', 'Inventory Staff', 'Administrator'] as $role)
                    <option value="{{ $role }}"
                        {{ old('role', $user->role) === $role ? 'selected' : '' }}>
                        {{ $role }}
                    </option>
                @endforeach
            </select>
            @error('role')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="avatar">Profile Picture</label>

            @if ($user->avatar)
                <div style="margin-bottom: 15px;">
                    <img
                        src="{{ asset('storage/' . $user->avatar) }}"
                        alt="Current Avatar"
                        width="120"
                        height="120"
                        style="object-fit: cover; border-radius: 50%;"
                    >
                </div>
            @endif

            <input
                type="file"
                id="avatar"
                name="avatar"
                accept="image/*"
            >

            @error('avatar')
                <small class="error">{{ $message }}</small>
            @enderror

            <small>Accepted images only. Maximum file size: 2 MB.</small>
        </div>

        <button type="submit">Update User</button>
        <a href="{{ route('users.index') }}">Cancel</a>
    </form>
</section>
@endsection
