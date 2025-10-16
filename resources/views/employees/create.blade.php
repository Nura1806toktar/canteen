@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Жаңа қызметкер қосу</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('employees.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Аты-жөні</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Лауазымы</label>
                    <input type="text" name="position" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Жалақы (₸)</label>
                    <input type="number" step="0.01" name="salary" class="form-control">
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-success">Сақтау</button>
                </div>
            </form>
        </div>
    </div>
@endsection
