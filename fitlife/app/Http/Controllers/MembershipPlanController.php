<?php

namespace App\Http\Controllers;

use App\Models\MembershipPlan;
use Illuminate\Http\Request;

class MembershipPlanController extends Controller
{
    // Frontend: Display all membership plans
    public function index()
    {
        $plans = MembershipPlan::active()->ordered()->get();
        return view('membership', compact('plans'));
    }

    // Admin: List all plans for management
    public function adminIndex()
    {
        $plans = MembershipPlan::ordered()->get();
        return view('admin.membership-plans.index', compact('plans'));
    }

    // Admin: Show create form
    public function create()
    {
        return view('admin.membership-plans.create');
    }

    // Admin: Store new plan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string|max:50',
            'description' => 'nullable|string',
            'features' => 'required|string', // Simple string validation
            'color_class' => 'nullable|string|max:50',
            'is_active' => 'boolean',
            'display_order' => 'integer'
        ]);

        MembershipPlan::create($validated);

        return redirect()->route('admin.membership-plans.index')
            ->with('success', 'Membership plan created successfully.');
    }

    // Admin: Show edit form
    public function edit(MembershipPlan $membershipPlan)
    {
        return view('admin.membership-plans.edit', compact('membershipPlan'));
    }

    // Admin: Update plan
    public function update(Request $request, MembershipPlan $membershipPlan)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|string|max:50',
            'description' => 'nullable|string',
            'features' => 'required|string',
            'color_class' => 'nullable|string|max:50',
            'is_active' => 'boolean',
            'display_order' => 'integer'
        ]);

        $membershipPlan->update($validated);

        return redirect()->route('admin.membership-plans.index')
            ->with('success', 'Membership plan updated successfully.');
    }

    // Admin: Delete plan
    public function destroy(MembershipPlan $membershipPlan)
    {
        $membershipPlan->delete();

        return redirect()->route('admin.membership-plans.index')
            ->with('success', 'Membership plan deleted successfully.');
    }

    // Frontend: Show single plan details
    public function show($slug)
    {
        $plan = MembershipPlan::where('slug', $slug)->active()->firstOrFail();
        return view('membership-plan-details', compact('plan'));
    }
}