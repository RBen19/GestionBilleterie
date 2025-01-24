<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenements= Evenement::paginate(2);
        return view('evenement',compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addEvenement');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $evenement = new Evenement();
        $validated = $request->validate([
            "libelle"=>"required",
            "description"=>"required",
            "date"=>"required",
            "lieu"=>"required",
            "prix"=>"required",
        ]);
        $evenement->libelle = $request['libelle'];
        $evenement->description = $request['description'];
        $evenement->prix = $request['prix'];
        $evenement->date = $request['date'];
        $evenement->lieu = $request['lieu'];
        try {
            $evenement->save();
            return redirect('evenement')->with("success","Evenement ajouter avec succes");
        }catch (\Exception $e){
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Evenement::destroy($id);
        return redirect('evenement')->with("deleteSuccessfuly","Evenement supprimer avec succes");
    }
}
