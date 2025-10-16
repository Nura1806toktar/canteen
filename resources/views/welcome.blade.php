@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <h3 class="mb-4">🍽 Асхана ақпараттық жүйесі</h3>

        <div class="row text-center mb-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white shadow-sm">
                    <div class="card-body">
                        <h2>{{ $productsCount }}</h2>
                        <p>Өнімдер</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success text-white shadow-sm">
                    <div class="card-body">
                        <h2>{{ $dishesCount }}</h2>
                        <p>Тағамдар</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning text-white shadow-sm">
                    <div class="card-body">
                        <h2>{{ $ordersCount }}</h2>
                        <p>Тапсырыстар</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-danger text-white shadow-sm">
                    <div class="card-body">
                        <h2>{{ $employeesCount }}</h2>
                        <p>Қызметкерлер</p>
                    </div>
                </div>
            </div>
        </div>

        @if($headChef)
            <div class="alert alert-info shadow-sm">
                <h5>👨‍🍳 Бас повар: {{ $headChef->name }}</h5>
                <p>Лауазымы: {{ $headChef->position ?? 'Бас повар' }}</p>
                <p>Айлық: {{ number_format($headChef->salary ?? 0, 0, ',', ' ') }} ₸</p>
            </div>
        @endif

        <div class="card shadow-sm mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">🧾 Соңғы тапсырыстар</h5>
                <a href="{{ route('orders.index') }}" class="btn btn-sm btn-primary">Барлық тапсырыстар</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Күні</th>
                        <th>Қызметкер</th>
                        <th>Сома (₸)</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($lastOrders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->order_date }}</td>
                            <td>{{ $order->employee?->name ?? '—' }}</td>
                            <td>{{ number_format($order->total, 2, ',', ' ') }}</td>
                            <td><a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">Көру</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">Тапсырыстар жоқ</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
