<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalAccountRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PersonAccountController extends Controller
{
    public function personalForm()
    {
        return view('personalAccount', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * @param PersonalAccountRequest $request
     * @param User $user
     */
    public function update(PersonalAccountRequest $request, User $user)
    {
        if (Hash::check($request->password_old, $request->user()->password)) {
            $user->updateUser($request);
        } else {
            $errors['password_old'] = __('page.error_pass');
            return redirect()->back()->withErrors($errors);
        }

        return redirect(route('home'));
    }
}
