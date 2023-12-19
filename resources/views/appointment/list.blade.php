@extends('layouts.app')
@section('content')
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h2>Citas agendadas</h2>
            </div>
            <div class="col-md-3">
                @forelse ($appointments as $appointment)
                    @foreach ($users as $user)
                        @if ($user->id == $appointment->id)
                            @if ($user->role == 'paciente')
                                <div class="float-right">

                                </div>
                            @else
                                <div class="float-right">
                                    <a href="{{ route('appointment.create') }}" class="btn btn-primary"><i
                                            class="fa fa-plus"></i> Crear nueva cita</a>
                                </div>
                            @endif
                        @endif
                    @endforeach
                @empty
                    @if (Auth::user()->role == 'admin')
                        <div class="float-right">
                            <a href="{{ route('appointment.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                                Crear nueva cita</a>
                        </div>
                    @endif
                @endforelse
            </div>
            <br>
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">#</th>
                            <th>Paciente</th>
                            <th>Especialidad</th>
                            <th width="10%">
                                <center>Fecha</center>
                            </th>
                            <th width="14%">
                                <center>Acciones</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($appointments as $appointment)
                            <tr>
                                <th>{{ $appointment->id }}</th>
                                @foreach ($users as $user)
                                    @if ($user->id == $appointment->user_id)
                                        <td>{{ $user->name }}</td>
                                    @else
                                        
                                    @endif
                                @endforeach
                                <td>{{ $appointment->speciality }}</td>
                                <td>{{ $appointment->date }}</td>
                                <td>
                                    <div class="action_btn d-inline">
                                        <a href="{{ route('appointment.edit', $appointment->id) }}"
                                            class="btn btn-warning">Novedades</a><br>
                                        <form action="{{ route('appointment.destroy', $appointment->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Borrar cita</button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <center>No hay citas creadas</center>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
