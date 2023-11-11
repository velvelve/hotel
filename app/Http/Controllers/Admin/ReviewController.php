<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Reviews\Create;
use App\Http\Requests\Admin\Reviews\Edit;
use App\Models\Hotel;
use App\Models\Review;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function index()
    {
        return view('admin.review.index', [
            'reviews' => Review::all(),
        ]);
    }

    public function create()
    {
        return view('admin.review.create', [
            'users' => User::all(),
            'hotels' => Hotel::all(),
        ]);
    }

    public function store(Create $request)
    {

        $review = new Review($request->validated());
        if ($review->save()) {
            return redirect()->route('admin.reviews.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function edit(Review $review)
    {
        return view('admin.review.edit', [
            'review' => $review,
            'users' => User::all(),
            'hotels' => Hotel::all(),
        ]);
    }

    public function update(Edit $request, Review $review)
    {
        $validated = $request->validated();

        $review = $review->fill($validated);
        if ($review->save()) {
            return redirect()->route('admin.reviews.index')->with('success', __('Record was saved successfully'));
        }
        return back()->with('error', __('We can not save item, please try again'));
    }

    public function destroy(Review $review)
    {
        try {
            $review->delete();
            return response()->json('ok');
        } catch (Exception $e) {
            Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
