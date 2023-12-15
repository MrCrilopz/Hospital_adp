@extends('layouts.app')
@section('content')
<div class="container">
  <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>appointments List</h2>
        </div>
        <div class="col-md-6">
            <div class="float-right">
                <a href="{{ route('appointment.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add new appointment</a>
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
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th width="5%">#</th>
            <th>Task Name</th>
            <th width="10%"><center>Task Status</center></th>
            <th width="14%"><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($appointments as $appointment)
              <tr>
              <th>{{ $appointment->id }}</th>
              <td>{{ $appointment->title }}</td>
              <td><center>{{ $appointment->status }}</center></td>
              <td>
                <div class="action_btn">
                  <div class="action_btn">
                    <a href="{{ route('appointment.edit', $appointment->id)}}" class="btn btn-warning">Edit</a>
                  </div>
                  <div class="action_btn margin-left-10">
                    <form action="{{ route('appointment.destroy', $appointment->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                  </div>
                </div>
              </td>
            </tr>
          @empty
              <tr>
              <td colspan="4"><center>No data found</center></td>
            </tr>
          @endforelse
        </tbody>
      </table>
        </div>
    </div>
</div>
@endsection