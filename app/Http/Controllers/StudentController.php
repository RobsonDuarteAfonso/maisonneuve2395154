<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('student.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $newStudent = Student::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_birth' => $request->date_birth,
            'city_id' => $request->city_id
        ]);

        return redirect(route('student.show', $newStudent->id))->withSuccess('Étudiant enregistré!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $city = City::find($student->city_id);

        return view('student.show', compact('student','city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $cities = City::all();

        return view('student.edit', compact('student','cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_birth' => $request->date_birth,
            'city_id' => $request->city_id
        ]);

        return redirect(route('student.show', $student->id))->withSuccess('Étudiant mis a jour!');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect(route('student.index'))->withSuccess('Étudiant effacé!');
    }
}
