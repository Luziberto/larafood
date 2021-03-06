<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Profile;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    public function plans(Profile $profile)
    {
        if (!$profile) {
            return redirect()->back();
        }

        $plans = $profile->plans()->get();

        return view('admin.pages.profiles.plans.index', [
            'profile' => $profile,
            'plans' => $plans
        ]);

    }

    public function plansAvailable (Profile $profile) {
        if (!$profile) {
            redirect()->back();
        }
        $plans = $profile->plansAvailable()->get();

        return view('admin.pages.profiles.plans.create', [
            'profile' => $profile,
            'plans' => $plans
        ]);
    }


    public function attachPlansProfile (Request $request, Profile $profile) {
        $plans = $request->plans;
        if (!$plans){
            return redirect()->back()->with('error', 'É necessário selecionar ao menos 1 plano');
        }
        foreach ($plans as $plan){
            $profile->plans()->attach($plan);
        }
        return redirect()->route('profiles.plans', $profile->id)->with('message', 'Plano associada com sucesso');
    }

    public function detachPlansProfile (Profile $profile, Plan $plan) {
        if (!$profile || !$plan)  {
            return redirect()->back();
        }
        $profile->plans()->detach($plan->id);
        return redirect()->route('profiles.plans', $profile->id)->with('message', 'Plano desassociada com sucesso');
    }

    public function search (Request $request, Profile $profile) {
        $plans = $profile->searchPlans($profile->plans(), $request->filter)->paginate(1);

        return view('admin.pages.profiles.plans.index', [
            'profile' => $profile,
            'plans' => $plans
        ]);
    }

    public function searchPlansAvailable (Request $request, Profile $profile) {
        $plans = $profile->searchPlans($profile->plansAvailable(), $request->filter)->paginate(1);

        return view('admin.pages.profiles.plans.create', [
            'profile' => $profile,
            'plans' => $plans
        ]);
    }
}
