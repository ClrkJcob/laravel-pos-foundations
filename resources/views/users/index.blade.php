
@extends('layouts.app')

@section('title', 'User Accounts')

@section('content')
<section class="panel">
    <div class="eyebrow">System Access</div>
    <h1>User Accounts</h1>
    <p>Manage your POS users and their assigned roles.</p>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <p>
        <a href="{{ route('users.create') }}" class="btn">
            + Create User
        </a>
    </p>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>
                            @if ($user->avatar)
                                <img
                                    src="{{ asset('storage/' . $user->avatar) }}"
                                    alt="{{ $user->name }}"
                                    width="50"
                                    height="50"
                                    style="object-fit: cover; border-radius: 50%;"
                                >
                            @else
                                <img
                                    src="https://placehold.co/50x50?text=User"
                                    alt="Placeholder avatar"
                                    width="50"
                                    height="50"
                                    style="object-fit: cover; border-radius: 50%;"
                                >
                            @endif
                        </td>
                        <td>{{ $user->user_code }}</td>
                        <td>{{ $user->username ?? 'Not set' }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <span class="status {{ strtolower($user->status) }}">
                                {{ $user->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}">
                                Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">No user accounts found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
