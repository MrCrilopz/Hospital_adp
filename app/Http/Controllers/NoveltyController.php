<?php

namespace App\Http\Controllers;

use App\Models\Novelty;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class NoveltyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('novelty.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function create($appointment)
    {
        $appointment_store = $appointment;
        return view('novelty.add', compact('appointment_store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->input();
        $userid = $request['user_id'];
        $id = $request['appointment_id'];
        $noveltyStatus = Novelty::create($input);

        if ($noveltyStatus) {
            $message = 'Novelty successfully added';
            $type = 'success';
        } else {
            $message = 'Oops, something went wrong. Novelty not saved';
            $type = 'error';
        }

        $novelties = Novelty::where(['appointment_id' => $id])->get();
        $users = User::where(['id' => $userid])->get();
        return view('novelty.list', ['novelties' => $novelties, 'appointment' => $id, 'users' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Novelty  $novelty
     * @return \Illuminate\Http\Response
     */
    public function show(Novelty $novelty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Novelty  $novelty
     * @return \Illuminate\Http\Response
     */
    public function edit(Novelty $novelty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Novelty  $novelty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Novelty $novelty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Novelty  $novelty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Novelty $novelty)
    {
        //
    }
}
