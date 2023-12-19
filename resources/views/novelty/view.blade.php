@extends('layouts.app')
@section('content')
<div class="container">
  <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>appointment Details</h2>
        </div>
        <div class="col-md-6">
            <div class="float-right">
                <a href="{{ route('appointment.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <br>
        <div class="col-md-12">
            <br><br>
            <div class="appointment-title">
                <strong>Title: </strong> {{ $appointment->speciality }}
            </div>
            <br>
            <div class="appointment-description">
                <strong>Description: </strong> {{ $appointment->user_id }}
            </div>
            <br>
            <div class="appointment-description">
                <strong>Status: </strong> {{ $appointment->id }}
            </div>
        </div>
    </div>
</div>
@endsection