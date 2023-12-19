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
                <form action="{{ route('appointment.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="speciality">Especialidad:</label>
                        <input type="text" name="speciality" class="form-control" id="speciality" />
                    </div>
                    <div class="form-group mb-2">
                        <label for="title">Fecha:</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="form-group mb-2">
                        <label for="status">Seleccione al paciente</label>
                        <select class="form-control" id="paciente" name="paciente">
                            @foreach ($users as $user)
                                @if (Auth::user()->role == 'paciente')
                                    @if ($user->id == Auth::user()->id)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                @else
                                    @if ($user->role == 'paciente')
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 5cdb635b1decd8a5efa001eed74e474bc2cd564b
