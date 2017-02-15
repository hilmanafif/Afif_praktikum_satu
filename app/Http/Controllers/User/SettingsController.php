<?php

namespace App\Http\Controllers\User;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\UserMeta;

class SettingsController extends Controller
{
    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    /**
     * View current user's settings
     *
     * @return \Illuminate\Http\Response
     */
    public function settings(Request $request)
    {
        $user = $request->user();

        if ($user) {
            return view('user.settings')
            ->with('user', $user);
        }

        return back()->withErrors(['Could not find user']);
    }

    /**
     * Update the user
     *
     * @param  UpdateAccountRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request)
    {
        if ($this->service->update(Auth::id(), $request->all())) {
            return back()->with('message', 'Settings updated successfully');
        }

        return back()->withErrors(['Could not update user']);
    }

    public function updatemeta($id, Request $request)
    {
        $usermeta = UserMeta::findOrFail($id);
        $usermeta->update($request->all());
        return back()->with('message', 'User data updated successfully');
    }


}
