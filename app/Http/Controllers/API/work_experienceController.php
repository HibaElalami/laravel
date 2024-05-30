<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Work_experience;
use Illuminate\Http\Request;

class work_experienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Work_experience = Work_experience::all();
        return response()->json($Work_experience, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employer' => 'required|string',
            'jobtitre' => 'required|string',
            'startdate' => 'required|string',
            'enddate' => 'required|string',
            'localisation' => 'nullable|string',
            'description' => 'nullable|string',
            'c_v_s_id' => 'required|integer', // Assuming cv_id is an integer
        ]);
    
        // Create a new Work instance and save it to the database
        $work = Work_experience::create($validatedData);
    
        return response()->json($work, 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $emp = Work_experience::find($id);
        return  response()->json($emp, 201);
    }
    public function update(Request $request, string $id)
    {
        $emp = Work_experience::find($id);
        $emp->update($request->all());
        return  response()->json($emp, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emp = Work_experience::find($id);

        if ($emp==null){ 
            return response()->json(['message'=>'Employer est introuvable'],404);        
            } 
        $emp->delete();
        return  response()->json();
    }
}
