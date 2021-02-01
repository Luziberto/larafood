<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdatePlan;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index () {
        $plans = $this->repository->latest()->paginate();

        return view('admin.pages.plans.index', [
            'plans' => $plans
        ]);
    }

    public function create () {
        return view('admin.pages.plans.create');
    }

    public function store (StoreUpdatePlan $request) {
        $this->repository->create($request->all());
        return redirect()->route('plans.index');
    }

    public function show ($id) {
        $plan = $this->repository->find($id);
//        $plan = $this->repository->where('id', $id)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view ('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    public function destroy ($id) {
        $plan = $this->repository->where('id', $id)->first();

        if (!$plan) {
            return redirect()->back();
        }
        $plan->delete();
        return redirect()->route('plans.index');
    }

    public function search (Request $request) {
        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', [
            'plans' => $plans
        ]);
    }

    public function edit ($id) {
        $plan = $this->repository->where('id', $id)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view ('admin.pages.plans.edit', [
            'plan' => $plan
        ]);
    }

    public function update(StoreUpdatePlan $request, $id)
    {
        $plan = $this->repository->where('id', $id)->first();

        if (!$plan)
            return redirect()->back();

        $plan->update($request->all());

        return redirect()->route('plans.index');
    }
}
