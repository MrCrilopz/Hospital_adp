<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $appointments = Appointment::where(['id' => $userId])->get();
        return view('appointment.list', ['appointments' => $appointments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('appointment.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $input = $request->input();
        $input['user_id'] = $userId;
        $appointmentStatus = appointment::create($input);

        if ($appointmentStatus) {
            $message = 'appointment successfully added';
            $type = 'success';
        } else {
            $message = 'Oops, something went wrong. appointment not saved';
            $type = 'error';
        }

        return redirect('appointment')->with($type, $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        $userId = Auth::user()->id;
        $appointment = appointment::where(['user_id' => $userId, 'id' => $id])->first();
        if (!$appointment) {
            return redirect('appointment')->with('error', 'appointment not found');
        }
        return view('appointment.view', ['appointment' => $appointment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        $userId = Auth::user()->id;
        $appointment = appointment::where(['user_id' => $userId, 'id' => $id])->first();
        if ($appointment) {
            return view('appointment.edit', ['appointment' => $appointment]);
        } else {
            return redirect('appointment')->with('error', 'appointment not found');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        $userId = Auth::user()->id;
        $appointment = appointment::find($id);
        if (!$appointment) {
            return redirect('appointment')->with('error', 'appointment not found.');
        }
        $input = $request->input();
        $input['user_id'] = $userId;
        $appointmentStatus = $appointment->update($input);
        if ($appointmentStatus) {
            return redirect('appointment')->with('success', 'appointment successfully updated.');
        } else {
            return redirect('appointment')->with('error', 'Oops something went wrong. appointment not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        $userId = Auth::user()->id;
        $appointment = appointment::where(['user_id' => $userId, 'id' => $id])->first();
        $respStatus = $respMsg = '';
        if (!$appointment) {
            $respStatus = 'error';
            $respMsg = 'appointment not found';
        }
        $appointmentDelStatus = $appointment->delete();
        if ($appointmentDelStatus) {
            $respStatus = 'success';
            $respMsg = 'appointment deleted successfully';
        } else {
            $respStatus = 'error';
            $respMsg = 'Oops something went wrong. appointment not deleted successfully';
        }
        return redirect('appointment')->with($respStatus, $respMsg);
    }
}
