<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Clinic;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function create()
    {
        $clinics = Clinic::get();
        $user = new User;
        return view('profile.create', [
            'clinics' => $clinics,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => [
                'required',
                "unique:users,username,$request->username"
            ],
        ],[
            'required'=> 'This field (:attribute) is required'
        ]);
        $request->except('password');
        $request->merge([
            'password' => Hash::make($request->post('password')),
            'type' => 'doctor',
        ]);

        User::create($request->all());

        return redirect()->route('doctorsTable')
            ->with('success','تم إضافة طبيب جديد');
    }
    /**
     * Display the user's profile form.
     */
    public function edit($id): View
    {
        $clinics = Clinic::get();
        return view('profile.edit', [
            'user' => User::findOrFail($id),
            'clinics' => $clinics,
        ]);
    }

    /**
     * Update the user's profile information.
     */
        public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->except('password');
        if($request->post('password') != null){
            $request->merge([
                'password' => Hash::make($request->post('password'))
            ]);
            $user->update($request->all());
            return Redirect::route('doctorsTable')->with('status', 'تم تحديث بيانات الطبيب');
        }
        $user->update($request->except('password'));
        return Redirect::route('doctorsTable')->with('status', 'تم تحديث بيانات الطبيب');

    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
