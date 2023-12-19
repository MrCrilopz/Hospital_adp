<?php

namespace App\Http\Controllers;

use App\Models\Novelty;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $users = User::paginate();
        $userRole = Auth::user()->role;
        if ($userRole == 'admin') {
            $appointments = Appointment::paginate();
        } else {
            $appointments = Appointment::where(['user_id' => $userId])->get();
        }
        return view('appointment.list', ['appointments' => $appointments, 'users' => $users]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Auth::user()->all();
        return view('appointment.add', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointmentStatus = Appointment::create([
            'date' => $request->date('date'),
            'speciality' => $request->string('speciality'),
            'user_id' => $request->integer('paciente')
        ]);

        if ($appointmentStatus) {
            $message = 'Appointment successfully added';
            $type = 'success';
        } else {
            $message = 'Oops, something went wrong. Appointment not saved';
            $type = 'error';
        }

        return redirect('appointment')->with($type, $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userId = Auth::user()->id;
        $appointment = Appointment::where(['user_id' => $userId, 'id' => $id])->first();
        if (!$appointment) {
            return redirect('appointment')->with('error', 'Appointment not found');
        }
        return view('appointment.view', ['appointment' => $appointment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $novelties = Novelty::where(['appointment_id' => $id])->get();
        $users = Auth::user()->all();
        if (!$novelties) {
            return view('novelty.list', ['novelties' => $novelties, 'appointment' => $id, 'users' => $users]);
            /* return view('appointment.edit', ['appointment' => $appointment]); */
        } else {
            return view('novelty.list', ['novelties' => $novelties, 'appointment' => $id, 'users' => $users]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userId = Auth::user()->id;
        $appointment = Appointment::find($id);
        if (!$appointment) {
            return redirect('appointment')->with('error', 'Appointment not found.');
        }
        $input = $request->input();
        $input['user_id'] = $userId;
        $appointmentStatus = $appointment->update($input);
        if ($appointmentStatus) {
            return redirect('appointment')->with('success', 'Appointment successfully updated.');
        } else {
            return redirect('appointment')->with('error', 'Oops something went wrong. Appointment not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userId = Auth::user()->id;
        $appointment = Appointment::where(['user_id' => $userId, 'id' => $id])->first();
        $respStatus = $respMsg = '';
        if (!$appointment) {
            $respStatus = 'error';
            $respMsg = 'Appointment not found';
        }
        $appointmentDelStatus = $appointment->delete();
        if ($appointmentDelStatus) {
            $respStatus = 'success';
            $respMsg = 'Appointment deleted successfully';
        } else {
            $respStatus = 'error';
            $respMsg = 'Oops something went wrong. Appointment not deleted successfully';
        }
        return redirect('appointment')->with($respStatus, $respMsg);
    }
}