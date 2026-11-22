@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="hero">
    <div class="eyebrow">Point of Sale · Dashboard</div>
    <h1>Welcome to the POS Management System</h1>
    <p>This starter application organizes customer and user account pages in a simple Laravel MVC structure. Use the navigation above to explore the four pages.</p>
    <div class="cards">
        <div class="card"><h2>Customer Accounts</h2><p>View the sample customer directory.</p><a href="{{ route('customers.index') }}">Open customers →</a></div>
        <div class="card"><h2>User Accounts</h2><p>View system users and their roles.</p><a href="{{ route('users.index') }}">Open users →</a></div>
        <div class="card"><h2>About</h2><p>Learn about this practice POS application.</p><a href="{{ route('about') }}">About this project →</a></div>
    </div>
</section>
@endsection
