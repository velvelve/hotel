<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NotificationPreferences\Create;
use App\Http\Requests\Admin\NotificationPreferences\Edit;
use App\Models\NotificationPreference;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NotificationPreferenceController extends Controller
{
    public function index()
    {
        return view('admin.notification-preference.index', [
            'preferences' => NotificationPreference::all(),
        ]);
    }

    public function create()
    {
        $noNotificationPrefsUsers = User::whereNull('notification_preference_id')->get();
        if ($noNotificationPrefsUsers !== null && $noNotificationPrefsUsers->count() > 0) {
            return view('admin.notification-preference.create', [
                'users' => $noNotificationPrefsUsers,
            ]);
        } else {
            return redirect()->route('admin.notification-preference.index')->with('error', __('No users without notification prefernces'));
        }
    }

    public function store(Create $request)
    {
        try {
            return DB::transaction(function () use ($request) {
                $notificationPreference = NotificationPreference::create($request->validated());

                User::where('id', $request->input('user_id'))
                    ->update(['notification_preference_id' => $notificationPreference->id]);
                return redirect()->route('admin.notification-preference.index')->with('success', __('Record was saved successfully'));
            }, 2);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit(NotificationPreference $notificationPreference)
    {
        $user = User::where('notification_preference_id', $notificationPreference->id)->first();
        return view('admin.notification-preference.edit', [
            'user' => $user,
            'preference' => $notificationPreference,
        ]);
    }

    public function update(Edit $request, NotificationPreference $notificationPreference)
    {
        $notificationPreference->discounts = $request->has('discounts');
        $notificationPreference->special_offers = $request->has('special_offers');
        $notificationPreference->bonus_earnings = $request->has('bonus_earnings');
        $notificationPreference->feedback_responses = $request->has('feedback_responses');
        if ($notificationPreference->save()) {
            return redirect()->route('admin.notification-preference.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function destroy(NotificationPreference $notificationPreference)
    {
        try {
            User::where('notification_preference_id', $notificationPreference->id)->update(['notification_preference_id' => null]);
            $notificationPreference->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
