@extends('layouts.app')

@section('title', 'User Accounts')

@section('content')
<section class="panel">
    <div class="eyebrow">System access</div>
    <h1>User Accounts</h1>
    <p>Sample system users and their assigned roles.</p>
    <div class="table-wrap">
        <table>
            <thead><tr><th>User ID</th><th>Name</th><th>Email</th><th>Role</th><th>Status</th></tr></thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user['id'] }}</td><td>{{ $user['name'] }}</td><td>{{ $user['email'] }}</td><td>{{ $user['role'] }}</td>
                    <td><span class="status {{ strtolower($user['status']) }}">{{ $user['status'] }}</span></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
