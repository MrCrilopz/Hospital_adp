@extends('layouts.app')
@section('content')
    <div class="container">
        <br>
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h2>Novedades</h2>
            </div>
            <div class="col-md-3">
                @if (Auth::user()->role == 'paciente')
                    <div class="float-right">
                        <a href="{{ route('novelty.create', $appointment) }}" class="btn btn-primary"><i
                                class="fa fa-plus"></i>
                            Registrat nueva novedad</a>
                            <a href="{{  url('/appointment') }}" class="btn btn-secondary"><i
                                class="fa fa-plus"></i>
                            Volver</a>
                    </div>
                @endif
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
                            <th>Observación</th>
                            <th>Cita relacionada</th>
                            <th width="14%">
                                <center>Acciones</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($novelties as $novelty)
                            <tr>
                                <th>{{ $novelty->id }}</th>
                                <td>{{ $novelty->observation }}</td>
                                <td>{{ $appointment }}</td>
                                <td>
                                    <div class="action_btn d-inline">
                                        {{-- <a href="{{ route('appointment.edit', $appointment->id) }}"
                                            class="btn btn-warning">Editar</a> --}}
                                        <form action="{{ route('novelty.destroy', $novelty->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Borrar novedad</button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
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
