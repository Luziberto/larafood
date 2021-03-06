<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetailPlan;
use App\Models\Plan;
use App\Models\DetailPlan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{
    protected $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }

    public function index(Plan $plan)
    {
        if (!$plan) {
            return redirect()->back();
        }

        $details = $plan->details()->get();
//        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create (Plan $plan) {
        if (!$plan) {
            redirect()->back();
        }
        return view('admin.pages.plans.details.create', [
            'plan' => $plan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (StoreUpdateDetailPlan $request, Plan $plan) {
        $plan->details()->create($request->all());
        return redirect()->route('details.plan.index', $plan->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan, DetailPlan $detail)
    {
        if (!$detail || !$plan) {
            redirect()->back();
        }

        return view('admin.pages.plans.details.show', [
            'plan' => $plan,
            'detail' => $detail
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan, DetailPlan $detail)
    {
        if (!$detail) {
            redirect()->back();
        }
        return view('admin.pages.plans.details.edit', [
            'detail' => $detail,
            'plan' => $plan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateDetailPlan $request, Plan $plan, DetailPlan $detail)
    {

        if (!$detail)
            return redirect()->back();

        $detail->update($request->all());

        return redirect()->route('details.plan.index', $detail->plan()->first()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan, DetailPlan $detail)
    {
        if (!$detail || !$plan)
            redirect()->back();

        $detail->delete();

        return redirect()->route('details.plan.index', $plan->id)->with('message', 'Registro deletado com sucesso.');
    }
}
