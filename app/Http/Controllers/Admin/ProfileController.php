<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function index () {
        $profiles = Profile::latest()->paginate();

        return view('admin.pages.profiles.index', [
            'profiles' => $profiles
        ]);
    }

    public function create () {
        return view('admin.pages.profiles.create');
    }

    public function store (StoreUpdateProfile $request) {
        Profile::create($request->all());
        return redirect()->route('profiles.index');
    }

    public function show (Profile $profile) {

        if (!$profile) {
            return redirect()->back();
        }

        return view ('admin.pages.profiles.show', [
            'profile' => $profile
        ]);
    }

    public function destroy (Profile $profile) {

        if (!$profile) {
            return redirect()->back();
        }

//        if ($profile->details->count() > 0) {
//            return redirect()->back()->with('error', 'Existem detalhes vinculado a esse profileo, portanto não é possivel deletar-lo');
//        }

        $profile->delete();
        return redirect()->route('profiles.index');
    }

    public function search (Request $request) {
        $profiles = Profile::search($request->filter);

        return view('admin.pages.profiles.index', [
            'profiles' => $profiles
        ]);
    }

    public function edit (Profile $profile) {
        if (!$profile) {
            return redirect()->back();
        }

        return view ('admin.pages.profiles.edit', [
            'profile' => $profile
        ]);
    }

    public function update(StoreUpdateProfile $request, Profile $profile)
    {
        if (!$profile)
            return redirect()->back();

        $profile->update($request->all());

        return redirect()->route('profiles.index');
    }
}
