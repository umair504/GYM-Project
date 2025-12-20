<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MembershipPlan;
use Illuminate\Http\Request;

class MembershipPlanApiController extends Controller
{
    public function index()
    {
        return response()->json(MembershipPlan::all(), 200);
    }

    public function show($slug)
    {
        return response()->json(
            MembershipPlan::where('slug', $slug)->firstOrFail(),
            200
        );
    }

    public function store(Request $request)
    {
        $plan = MembershipPlan::create($request->all());
        return response()->json($plan, 201);
    }

    public function update(Request $request, $id)
    {
        $plan = MembershipPlan::findOrFail($id);
        $plan->update($request->all());

        return response()->json($plan, 200);
    }

    public function destroy($id)
    {
        MembershipPlan::findOrFail($id)->delete();
        return response()->json(['message' => 'Plan deleted'], 200);
    }
}
