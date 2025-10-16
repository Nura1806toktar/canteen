@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Тағамдар тізімі</h2>
        <a href="{{ route('dishes.create') }}" class="btn btn-primary">+ Тағам қосу</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Атауы</th>
            <th>Санат</th>
            <th>Баға (₸)</th>
            <th class="text-end">Әрекеттер</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dishes as $dish)
            <tr>
                <td>{{ $dish->id }}</td>
                <td>{{ $dish->name }}</td>
                <td>{{ $dish->category->name ?? '-' }}</td>
                <td>{{ $dish->price }}</td>
                <td class="text-end">
                    <a href="{{ route('dishes.edit', $dish) }}" class="btn btn-sm btn-warning">Өңдеу</a>
                    <form action="{{ route('dishes.destroy', $dish) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Жоюға сенімдісің бе?')">Жою</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-3">{{ $dishes->links() }}</div>
@endsection
