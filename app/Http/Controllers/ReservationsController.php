<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Reservations;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations= Reservations::paginate(2);
        return view('reservation',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reservation  = new Reservations();
        $evenements = Evenement::all();
        return view('addEditReservation', compact('reservation','evenements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);
        try {
          //  Reservations::create($validated);

             $reservation  =  new Reservations();
             $reservation->name = $request['name'];
             $reservation->evenement_id = $request['evenement_id'];
             $reservation->save();

            return to_route('reservations.index')->with('success', 'Reservation created!');
        }catch (\Exception $exception){
           \Illuminate\Log\log()->error($exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservations $reservations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservations $reservations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservations $reservations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservations $reservations)
    {
        //
    }
}
