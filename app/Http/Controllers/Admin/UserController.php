<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\Create;
use App\Http\Requests\Admin\Users\Edit;
use App\Models\NotificationPreference;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index', [
            'users' => User::all(),
        ]);
    }

    public function create()
    {
        return view('admin.user.create', [
            'roles' => Role::all(),
        ]);
    }

    public function store(Create $request)
    {

        $sameEmailUser = User::where('email', $request->input('email'))->first();
        if ($sameEmailUser !== null) {
            return redirect()->route('admin.users.index')->with('error', __('User with that email already exists'));
        }
        $samePhoneUser = User::where('phone', $request->input('phone'))->first();
        if ($samePhoneUser !== null) {
            return redirect()->route('admin.users.index')->with('error', __('User with that phone already exists'));
        }
        $discounts = $request->has('discounts');
        $special_offers = $request->has('special_offers');
        $bonus_earnings = $request->has('bonus_earnings');
        $feedback_responses = $request->has('feedback_responses');
        $pref = NotificationPreference::create([
            'discounts' => $discounts,
            'special_offers' => $special_offers,
            'bonus_earnings' => $bonus_earnings,
            'feedback_responses' => $feedback_responses,
        ]);
        $user = new User($request->validated());
        $user->notification_preference_id = $pref->id;
        if ($user->save()) {
            return redirect()->route('admin.users.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    public function update(Edit $request, User $user)
    {
        $validated = $request->validated();
        $adminRoleId = Role::where('constant', Role::$ADMIN_ROLE_CONST)->first()->id;
        $requestRoleId = (int) $request->input('role_id');
        if (Auth::user()->id === $user->id && $requestRoleId !== $adminRoleId) {
            return redirect()->route('admin.users.index')->with('error', __('Can not change admin to non-admin'));
        }
        if ($user->email !== $request->input('email')) {
            $sameEmailUser = User::where('email', $request->input('email'))->first();
            if ($sameEmailUser !== null) {
                return redirect()->route('admin.users.index')->with('error', __('User with that email already exists'));
            }
        }
        if ($user->phone !== $request->input('phone')) {
            $samePhoneUser = User::where('phone', $request->input('phone'))->first();
            if ($samePhoneUser !== null) {
                return redirect()->route('admin.users.index')->with('error', __('User with that phone already exists'));
            }
        }
        $oldPassword = $request->input('oldpassword');
        if (Hash::check($oldPassword, $user->password)) {
            $discounts = $request->has('discounts');
            $special_offers = $request->has('special_offers');
            $bonus_earnings = $request->has('bonus_earnings');
            $feedback_responses = $request->has('feedback_responses');
            if ($validated['password'] == null) {
                $validated['password'] = $user->password;
            }
            if ($validated['date_of_birth'] !== null) {
                $dateOfBith = Carbon::parse($validated['date_of_birth']);
                $validated['date_of_birth'] = $dateOfBith->toISOString();
            }
            if ($validated['email_verified_at'] !== null) {
                $dateOfEmailVerefication = Carbon::parse($validated['email_verified_at']);
                $validated['email_verified_at'] = $dateOfEmailVerefication->toISOString();
            }
            $user = $user->fill($validated);
            $prefData = [
                'discounts' => $discounts,
                'special_offers' => $special_offers,
                'bonus_earnings' => $bonus_earnings,
                'feedback_responses' => $feedback_responses,
            ];
            if ($user->notification_preference_id === null) {
                $pref = NotificationPreference::create($prefData);
                $user->notification_preference_id = $pref->id;
            } else {
                $pref = NotificationPreference::where('id', $user->notification_preference_id)->first();
                $pref->fill($prefData);
                $pref->save();
            }
            if ($user->save()) {
                return redirect()->route('admin.users.index')->with('success', __('Record was saved successfully'));
            }
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function destroy(User $user)
    {
        try {
            if ($user->notificationPreference !== null) {
                $user->notificationPreference->delete();
            }
            $user->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
