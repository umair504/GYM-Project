@extends('layouts.app')

@section('title', 'Thank You')

@section('content')
<div class="container thankyou-page">
    <h1>🎉 Thank You for Your Purchase!</h1>
    <p>Your order has been placed successfully. You’ll receive a confirmation email shortly.</p>
    <a href="{{ route('home') }}" class="btn">Back to Home</a>
</div>

<style>
.thankyou-page {
    text-align: center;
    margin: 80px auto;
    max-width: 600px;
}
.thankyou-page h1 {
    color: #27ae60;
    margin-bottom: 20px;
}
.thankyou-page .btn {
    padding: 10px 20px;
    background: #27ae60;
    color: white;
    border-radius: 6px;
    text-decoration: none;
}
.thankyou-page .btn:hover {
    background: #219150;
}
</style>
@endsection
