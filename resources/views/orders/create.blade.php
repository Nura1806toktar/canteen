@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><h5>Жаңа тапсырыс</h5></div>
        <div class="card-body">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Қызметкер</label>
                    <select name="employee_id" class="form-select" required>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}">{{ $emp->name }} ({{ $emp->position }})</option>
                        @endforeach
                    </select>
                </div>

                <table class="table table-bordered" id="order-table">
                    <thead>
                    <tr>
                        <th>Тағам</th>
                        <th>Саны</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <select name="dish_id[]" class="form-select" required>
                                @foreach($dishes as $dish)
                                    <option value="{{ $dish->id }}">{{ $dish->name }} ({{ $dish->price }} ₸)</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" name="quantity[]" value="1" min="1" class="form-control"></td>
                        <td><button type="button" class="btn btn-danger btn-sm remove-row">X</button></td>
                    </tr>
                    </tbody>
                </table>

                <button type="button" id="add-row" class="btn btn-secondary btn-sm mb-3">+ тағам қосу</button>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-success">Сақтау</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('add-row').addEventListener('click', function() {
            let row = document.querySelector('#order-table tbody tr').cloneNode(true);
            document.querySelector('#order-table tbody').appendChild(row);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-row')) {
                e.target.closest('tr').remove();
            }
        });
    </script>
@endsection
