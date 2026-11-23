
@extends('layouts.pos')

@section('title', 'Create User')

@section('content')
<section class="panel">
    <div class="eyebrow">User Management</div>
    <h1>Create User Account</h1>
    <p>Enter the details for the new POS user.</p>

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

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username') }}"
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
                value="{{ old('full_name') }}"
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
                value="{{ old('email') }}"
                required
            >
            @error('email')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select id="role" name="role">
                <option value="Cashier" {{ old('role', 'Cashier') === 'Cashier' ? 'selected' : '' }}>Cashier</option>
                <option value="Manager" {{ old('role') === 'Manager' ? 'selected' : '' }}>Manager</option>
                <option value="Inventory Staff" {{ old('role') === 'Inventory Staff' ? 'selected' : '' }}>Inventory Staff</option>
                <option value="Administrator" {{ old('role') === 'Administrator' ? 'selected' : '' }}>Administrator</option>
            </select>
            @error('role')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit">Save User</button>
        <a href="{{ route('users.index') }}">Cancel</a>
    </form>
</section>
@endsection
