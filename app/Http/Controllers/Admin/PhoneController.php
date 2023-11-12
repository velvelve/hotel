<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Phones\Create;
use App\Http\Requests\Admin\Phones\Edit;
use App\Models\Hotel;
use App\Models\Phone;
use Exception;
use Illuminate\Support\Facades\Log;

class PhoneController extends Controller
{
    public function index()
    {
        return view('admin.phone.index', [
            'phones' => Phone::all(),
        ]);
    }

    public function create()
    {
        return view('admin.phone.create', [
            'hotels' => Hotel::all(),
        ]);
    }

    public function store(Create $request)
    {

        $phone = new Phone($request->validated());
        if ($phone->save()) {
            return redirect()->route('admin.phones.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function edit(Phone $phone)
    {
        return view('admin.phone.edit', [
            'phone' => $phone,
            'hotels' => Hotel::all(),
        ]);
    }

    public function update(Edit $request, Phone $phone)
    {
        $validated = $request->validated();

        $phone = $phone->fill($validated);
        if ($phone->save()) {
            return redirect()->route('admin.phones.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function destroy(Phone $phone)
    {
        try {
            $phone->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
