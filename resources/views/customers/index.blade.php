
@extends('layouts.app')

@section('title', 'Customer Accounts')

@section('content')
<section class="panel">
    <div class="eyebrow">Account directory</div>
    <h1>Customer Accounts</h1>
    <p>Manage your POS customer records.</p>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <p>
        <a href="{{ route('customers.create') }}" class="btn">
            + Create Customer
        </a>
    </p>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{ $customer->customer_code }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>
                            <span class="status {{ strtolower($customer->status) }}">
                                {{ $customer->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('customers.edit', $customer->id) }}">
                                Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No customers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
