@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Тапсырыс №{{ $order->id }}</h5>
            <a href="{{ route('orders.index') }}" class="btn btn-secondary btn-sm">← Артқа</a>
        </div>

        <div class="card-body">
            <p><strong>Күні:</strong> {{ $order->order_date }}</p>
            <p><strong>Қызметкер:</strong> {{ $order->employee?->name ?? '—' }}</p>
            <p><strong>Жалпы сома:</strong> {{ number_format($order->total, 2, ',', ' ') }} ₸</p>

            <h6 class="mt-4">Тапсырыс құрамындағы тағамдар:</h6>
            <table class="table table-bordered mt-2">
                <thead>
                <tr>
                    <th>Тағам</th>
                    <th>Саны</th>
                    <th>Бағасы (₸)</th>
                    <th>Жалпы (₸)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->dish->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price, 2, ',', ' ') }}</td>
                        <td>{{ number_format($item->total, 2, ',', ' ') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
