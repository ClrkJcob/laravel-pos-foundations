@extends('layouts.app')

@section('title', 'About')

@section('content')
<section class="panel">
    <div class="eyebrow">About the application</div>
    <h1>A simple Laravel POS foundation</h1>
    <p>This project is a foundational Point of Sale (POS) interface created for IT0049 – Web System Technologies. It demonstrates Laravel routing, controller responsibilities, Blade templating, and the use of temporary static PHP arrays to display account records.</p>
    <h2>How it is organized</h2>
    <p><strong>Routes</strong> map URLs to controller methods. <strong>Controllers</strong> prepare the page response and sample data. <strong>Blade views</strong> render the interface and loop through account records.</p>
    <p>The customer and user listings currently use sample in-memory data. No live customer records or authentication are connected.</p>
</section>
@endsection
