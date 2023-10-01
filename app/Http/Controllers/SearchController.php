<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        //временный статичный массив, пока отсутствует БД
        $freeRooms=[
            [
            'name'=>'standart',
            'image' => 'https://siriushotels.ru/pr_img/500_1918100371/20230421/79734237/1.jpg',
            'description' => fake()->text(200),
            'price' => 2000
            ],
            [
                'name'=>'superior',
                'image' => 'https://siriushotels.ru/pr_img/500_1918100371/20230421/79734237/1.jpg',
                'description' => fake()->text(200),
                'price' => 3000
            ],
            [
                'name'=>'premium',
                'image' => 'https://siriushotels.ru/pr_img/500_1918100371/20230421/79734237/1.jpg',
                'description' => fake()->text(200),
                'price' => 5000
            ],
        ];

        return view('search.rooms',['roomsList'=>$freeRooms]);
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
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
