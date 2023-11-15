<?php

namespace App\Http\Controllers\Auth;

use App\Enums\Booking\Status;
use App\Http\Controllers\Controller;
use App\Models\User;
use DateTimeImmutable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $user = User::find(auth()->user()->id);
        $bookingsBooked = $user->bookings()->where('status', Status::BOOKED)->get();
        $bookingsConfirmed = $user->bookings()->where('status', Status::CONFIRMED)->get();
        $bookingsCancelled = $user->bookings()->where('status', Status::CANCELLED)->get();
        $notifications = $user->notifications()->get()->first();

        return view('auth.profile', ['bookingsBooked' => $bookingsBooked, 'bookingsConfirmed' => $bookingsConfirmed,
            'bookingsCancelled' => $bookingsCancelled, 'notifications' => $notifications]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @throws \Exception
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'middle_name' => ['sometimes', 'nullable', 'min:3'],
            'phone' => ['sometimes', 'nullable', 'regex:/^((\+7)+([0-9]){10})$/'],
            'country' => ['sometimes', 'nullable', 'min:3'],
            'city' => ['sometimes', 'nullable', 'min:3'],
            'date_of_birth' => ['sometimes', 'nullable', 'date'],
            'gender' => ['sometimes', 'nullable'],
        ]);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'phone' => $request->phone,
            'country' => $request->country,
            'city' => $request->city,
            'date_of_birth' => (new DateTimeImmutable($request->date_of_birth))->format('Y-m-d'),
            'gender' => $request->gender,
            'updated_at' => now()
        ]);

        $oldEmail = $user->email;
        if (!empty($request->email)) {
            if ($oldEmail !== $request->email) {
                $user->email = $request->email;
                $user->email_verified_at = null;
                $user->save();
                $user->sendEmailVerificationNotification();
            }
        }

        return redirect()->back()->with('profile', 'Данные изменены!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
