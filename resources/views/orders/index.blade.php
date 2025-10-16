@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Тапсырыстар тізімі</h5>
            <a href="{{ route('orders.create') }}" class="btn btn-primary btn-sm">+ Жаңа тапсырыс</a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Күні</th>
                    <th>Қызметкер</th>
                    <th>Жалпы сома (₸)</th>
                    <th>Әрекет</th>
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>{{ $order->employee?->name ?? '—' }}</td>
                        <td>{{ number_format($order->total, 2, ',', ' ') }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">Көру</a>
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Жоюға сенімдісіз бе?')" class="btn btn-danger btn-sm">Жою</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Тапсырыстар табылмады</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-end">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
