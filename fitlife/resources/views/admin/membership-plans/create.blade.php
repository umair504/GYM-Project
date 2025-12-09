@extends('layouts.app')

@section('title', 'Create Membership Plan')

@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f6f9;
        color: #333;
    }

    .page-container {
        margin-top: 50px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    h2.page-title {
        color: #27ae60;
        font-weight: 700;
        margin-bottom: 20px;
        text-align: center;
    }

    .back-btn {
        background-color: #7f8c8d;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 6px;
        font-weight: 500;
        text-decoration: none;
        transition: 0.3s;
    }

    .back-btn:hover {
        background-color: #636e72;
    }

    .form-card {
        width: 100%;
        max-width: 900px;
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 6px;
    }

    .form-control, .form-select, textarea {
        border-radius: 6px;
        padding: 10px 12px;
        font-size: 0.95rem;
    }

    .form-check-label {
        font-weight: 500;
        margin-left: 8px;
    }

    .btn-success {
        background-color: #27ae60;
        color: white;
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: 500;
        border: none;
        transition: 0.3s;
    }

    .btn-success:hover {
        background-color: #219150;
    }

    .text-danger {
        font-size: 0.85rem;
        margin-top: 4px;
    }

    .row > .col-md-6, .row > .col-12 {
        margin-bottom: 20px;
    }

    @media(max-width: 768px) {
        .form-card {
            padding: 20px;
        }
    }
</style>

<div class="page-container">

    <h2 class="page-title">Create New Membership Plan</h2>

    <a href="{{ route('admin.membership-plans.index') }}" class="back-btn mb-3">
        <i class="fas fa-arrow-left"></i> Back to List
    </a>

    <div class="form-card">
        <form action="{{ route('admin.membership-plans.store') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-6">
                    <label for="name" class="form-label">Plan Name *</label>
                    <input type="text" class="form-control" id="name" name="name" 
                           value="{{ old('name') }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="price" class="form-label">Monthly Price ($) *</label>
                    <input type="number" step="0.01" class="form-control" id="price" 
                           name="price" value="{{ old('price') }}" required>
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="duration" class="form-label">Duration *</label>
                    <select class="form-select" id="duration" name="duration" required>
                        <option value="monthly" {{ old('duration') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                        <option value="quarterly" {{ old('duration') == 'quarterly' ? 'selected' : '' }}>Quarterly</option>
                        <option value="yearly" {{ old('duration') == 'yearly' ? 'selected' : '' }}>Yearly</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="color_class" class="form-label">Color Theme</label>
                    <select class="form-select" id="color_class" name="color_class">
                        <option value="">Default</option>
                        <option value="bronze" {{ old('color_class') == 'bronze' ? 'selected' : '' }}>Bronze</option>
                        <option value="silver" {{ old('color_class') == 'silver' ? 'selected' : '' }}>Silver</option>
                        <option value="gold" {{ old('color_class') == 'gold' ? 'selected' : '' }}>Gold</option>
                        <option value="platinum" {{ old('color_class') == 'platinum' ? 'selected' : '' }}>Platinum</option>
                        <option value="diamond" {{ old('color_class') == 'diamond' ? 'selected' : '' }}>Diamond</option>
                        <option value="vip" {{ old('color_class') == 'vip' ? 'selected' : '' }}>VIP</option>
                        <option value="elite" {{ old('color_class') == 'elite' ? 'selected' : '' }}>Elite</option>
                        <option value="diamond-elite" {{ old('color_class') == 'diamond-elite' ? 'selected' : '' }}>Diamond Elite</option>
                    </select>
                </div>

                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="2">{{ old('description') }}</textarea>
                </div>

                <div class="col-12">
                    <label for="features" class="form-label">Features *</label>
                    <small class="text-muted d-block mb-2">Enter each feature on a new line</small>
                    <textarea class="form-control" id="features" name="features" 
                              rows="5" placeholder="Basic Gym Access&#10;Locker Facility&#10;24/7 Access" required>{{ old('features') }}</textarea>
                    @error('features')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="display_order" class="form-label">Display Order</label>
                    <input type="number" class="form-control" id="display_order" 
                           name="display_order" value="{{ old('display_order', 0) }}">
                </div>

                <div class="col-md-6">
                    <div class="form-check form-switch mt-4">
                        <input class="form-check-input" type="checkbox" 
                               id="is_active" name="is_active" value="1" 
                               {{ old('is_active', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                </div>

            </div>

            <div class="mt-4 text-center">
                <button type="submit" class="btn-success">
                    <i class="fas fa-save"></i> Create Plan
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
