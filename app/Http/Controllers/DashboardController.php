<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Dish;
use App\Models\Order;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $dishesCount = Dish::count();
        $ordersCount = Order::count();
        $employeesCount = Employee::count();

        $lastOrders = Order::with('employee')->latest()->take(5)->get();
        $headChef = Employee::where('name', 'Жандостов Жеңіс')->first();

        return view('welcome', compact(
            'productsCount',
            'dishesCount',
            'ordersCount',
            'employeesCount',
            'lastOrders',
            'headChef'
        ));
    }
}
