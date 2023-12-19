@extends('layouts.app')
@section('content')
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h2>Nueva cita</h2>
            </div>
            <div class="col-md-3">
                <div class="float-right">
                    <a href="{{ route('appointment.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </div>
            <br>
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-error" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('novelty.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="speciality">Observación:</label>
                        <textarea type="text" name="observation" class="form-control" id="observation" rows="3"></textarea>
                        <input type="text" class="form-control" id="appointment_id" name="appointment_id"
                            value="{{ $appointment_store }}" hidden>
                        <input type="text" class="form-control" id="user_id" name="user_id"
                            value="{{ Auth::user()->id }}" hidden>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
