<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use Illuminate\Http\Request;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emp = Candidat::all();
        return response()->json($emp, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:candidats',
            'password' => 'required|string|min:8',
        ]);
    
        // Create a new Candidat record
        $emp = Candidat::create($validatedData);
    
        return response()->json($emp, 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $emp = Candidat::find($id);
        return  response()->json($emp, 201);
    }
    public function update(Request $request, string $id)
    {
        $emp = Candidat::find($id);
        $emp->update($request->all());
        return  response()->json($emp, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emp = Candidat::find($id);

        if ($emp==null){ 
            return response()->json(['message'=>'Candidat est introuvable'],404);        
            } 
        $emp->delete();
        return  response()->json();
    }
}