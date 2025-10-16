@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Өнімдер тізімі</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary">+ Өнім қосу</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Атауы</th>
            <th>Санат</th>
            <th>Баға (₸)</th>
            <th>Қойма</th>
            <th class="text-end">Әрекеттер</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name ?? '-' }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock_quantity }} {{ $product->unit }}</td>
                <td class="text-end">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Өңдеу</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Жоюға сенімдісің бе?')">Жою</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $products->links() }}
    </div>
@endsection
