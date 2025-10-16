<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishCategory;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function index()
    {
        $dishes = Dish::with('category')->paginate(10);
        return view('dishes.index', compact('dishes'));
    }

    public function create()
    {
        $categories = DishCategory::all();
        return view('dishes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
        ]);

        Dish::create($request->all());
        return redirect()->route('dishes.index')->with('success', 'Тағам сәтті қосылды!');
    }

    public function edit(Dish $dish)
    {
        $categories = DishCategory::all();
        return view('dishes.edit', compact('dish', 'categories'));
    }

    public function update(Request $request, Dish $dish)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
        ]);

        $dish->update($request->all());
        return redirect()->route('dishes.index')->with('success', 'Тағам жаңартылды!');
    }

    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('dishes.index')->with('success', 'Тағам жойылды!');
    }
}
