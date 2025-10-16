@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Қызметкерлер тізімі</h2>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">+ Қызметкер қосу</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Аты-жөні</th>
            <th>Лауазымы</th>
            <th>Жалақы (₸)</th>
            <th class="text-end">Әрекеттер</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->id }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->position }}</td>
                <td>{{ $employee->salary ?? '-' }}</td>
                <td class="text-end">
                    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-sm btn-warning">Өңдеу</a>
                    <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Жоюға сенімдісің бе?')">Жою</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-3">{{ $employees->links() }}</div>
@endsection
