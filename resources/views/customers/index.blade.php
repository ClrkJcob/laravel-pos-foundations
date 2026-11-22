@extends('layouts.app')

@section('title', 'Customer Accounts')

@section('content')
<section class="panel">
    <div class="eyebrow">Account directory</div>
    <h1>Customer Accounts</h1>
    <p>Sample customer records for the POS application.</p>
    <div class="table-wrap">
        <table>
            <thead><tr><th>Customer ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Status</th></tr></thead>
            <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer['id'] }}</td><td>{{ $customer['name'] }}</td><td>{{ $customer['email'] }}</td><td>{{ $customer['phone'] }}</td>
                    <td><span class="status {{ strtolower($customer['status']) }}">{{ $customer['status'] }}</span></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
