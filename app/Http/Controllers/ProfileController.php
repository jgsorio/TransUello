<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ProfileRequest;
use Facade\FlareClient\Http\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit() : View
    {
        return view('profile.edit');
    }

    public function update(ProfileRequest $request) : Response
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    public function password(PasswordRequest $request) : Response
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Password successfully updated.'));
    }
}
