<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Dish;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('employee')->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $dishes = Dish::all();
        $employees = Employee::all();
        return view('orders.create', compact('dishes', 'employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'dish_id' => 'required|array',
            'quantity' => 'required|array',
        ]);

        DB::transaction(function () use ($request) {
            $order = Order::create([
                'employee_id' => $request->employee_id,
                'order_date' => now(),
                'total' => 0,
            ]);

            $total = 0;
            foreach ($request->dish_id as $index => $dish_id) {
                $dish = Dish::find($dish_id);
                $qty = $request->quantity[$index];
                $price = $dish->price;
                $subtotal = $price * $qty;

                OrderItem::create([
                    'order_id' => $order->id,
                    'dish_id' => $dish_id,
                    'quantity' => $qty,
                    'price' => $price,
                    'total' => $subtotal,
                ]);

                $total += $subtotal;
            }

            $order->update(['total' => $total]);
        });

        return redirect()->route('orders.index')->with('success', 'Тапсырыс сәтті қосылды!');



    }
    public function show(Order $order)
    {
        $order->load('items.dish', 'employee');
        return view('orders.show', compact('order'));
    }
}
