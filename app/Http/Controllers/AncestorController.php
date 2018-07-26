<?php

namespace App\Http\Controllers;

use App\Ancestor;
use App\Student;
use Illuminate\Http\Request;

class AncestorController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       $ancestors = Ancestor::all();

       return $this->jsonOK($ancestors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
                  $validatedData = $this->validate($request, [
                    'name' => 'required|alpha',
                    'surname' => 'required|alpha',
                    'age' => 'required|numeric',
                    'email' => 'email|unique:ancestors'
                ]);
  
            }
        catch(\Exception $e) {

            return $this->jsonError("Validation failed", 400);
        }

        $ancestor = Ancestor::create($request->all());

        $ancestor->fresh();

        return $this->jsonOK($ancestor);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $ancestor = Ancestor::with('students')->get()->find($id);

        if (!$ancestor) {
            
            return $this->json404();
        }

        return $this->jsonOK($ancestor); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //Add a student to ancestor

    public function add($ancestorId, $studentId) {

        $validatedAncestor = Ancestor::find($ancestorId);
        
        $validatedStudent = Student::find($studentId);


        if (!$validatedAncestor || !$validatedStudent) {
            
            return $this->json404();
        }

        $validatedAncestor->students()->attach($studentId);

        return $this->jsonOK($validatedAncestor);

    }
}
