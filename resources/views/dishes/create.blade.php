@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Жаңа тағам қосу</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('dishes.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Атауы</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Санат</label>
                    <select name="category_id" class="form-select" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Баға</label>
                    <input type="number" step="0.01" name="price" class="form-control" required>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-success">Сақтау</button>
                </div>
            </form>
        </div>
    </div>
@endsection
