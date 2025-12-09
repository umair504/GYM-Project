@extends('layouts.app')

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

    .add-plan-btn {
        background-color: #27ae60;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 500;
        margin-bottom: 30px;
        transition: 0.3s;
        text-decoration: none;
    }

    .add-plan-btn:hover {
        background-color: #219150;
    }

    .alert-success {
        border-radius: 8px;
        padding: 12px 20px;
        margin-bottom: 20px;
        background-color: #27ae60;
        color: white;
        font-weight: 500;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 900px;
        text-align: center;
    }

    /* Card Container */
    .table-card {
        width: 100%;
        max-width: 1200px;
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead {
        background-color: #f8f9fa;
    }

    thead th {
        padding: 14px;
        font-weight: 600;
        color: #333;
    }

    tbody td {
        padding: 14px;
        vertical-align: middle;
        color: #444;
    }

    tbody tr:hover {
        background-color: #f3f7fc;
        transition: 0.2s ease-in-out;
    }

    /* Actions */
    .btn-primary, .btn-danger {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 500;
        border: none;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #2980b9;
        color: white;
    }

    .btn-primary:hover {
        background-color: #1f6391;
    }

    .btn-danger {
        background-color: #c0392b;
        color: white;
    }

    .btn-danger:hover {
        background-color: #922b21;
    }

    .status-badge {
        padding: 6px 12px;
        border-radius: 8px;
        color: white;
        font-size: 0.85rem;
        font-weight: 600;
    }

    .bg-active {
        background-color: #27ae60;
    }

    .bg-inactive {
        background-color: #c0392b;
    }

    .text-center {
        text-align: center;
    }
</style>

<div class="page-container">

    <h2 class="page-title">Membership Plans</h2>

    <a href="{{ route('admin.membership-plans.create') }}" class="add-plan-btn">
        + Add New Plan
    </a>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-card">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Duration</th>
                        <th>Features</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($plans as $plan)
                    <tr>
                        <td>{{ $plan->display_order }}</td>
                        <td>{{ $plan->name }}</td>
                        <td>${{ number_format($plan->price, 2) }}</td>
                        <td>{{ $plan->duration }}</td>

                        <td>
                            @php $features = $plan->features_array; @endphp

                            @if(!empty($features))
                                <ul style="padding-left: 20px; margin:0;">
                                    @foreach(array_slice($features, 0, 2) as $feature)
                                        <li>{{ $feature }}</li>
                                    @endforeach
                                    @if(count($features) > 2)
                                        <li>+{{ count($features) - 2 }} more</li>
                                    @endif
                                </ul>
                            @else
                                <span class="text-muted">No features</span>
                            @endif
                        </td>

                        <td>
                            <span class="status-badge {{ $plan->is_active ? 'bg-active' : 'bg-inactive' }}">
                                {{ $plan->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>

                        <td class="text-center">
                            <div style="display:flex; gap:8px; justify-content:center;">
                                <a href="{{ route('admin.membership-plans.edit', $plan) }}" class="btn-primary">
                                    Edit
                                </a>

                                <form action="{{ route('admin.membership-plans.destroy', $plan) }}" 
                                      method="POST"
                                      onsubmit="return confirm('Delete this plan?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted" style="padding:25px;">
                            No membership plans found.
                            <a href="{{ route('admin.membership-plans.create') }}">Create one</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection
