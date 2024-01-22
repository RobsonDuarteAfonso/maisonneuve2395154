<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::select(
            'users.id',
            'users.name as name',
            'users.email as email',
            'students.date_birth as date_birth',
            'cities.name as city_name',
            'students.user_id as user_id'
        )
        ->join('users', 'users.id','=','user_id')
        ->join('cities', 'cities.id','=','city_id')
        ->paginate(5);

        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $cities = City::all();
    //     return view('student.create', compact('cities'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
       
    //     $newStudent = Student::create([
    //         'name' => $request->name,
    //         'address' => $request->address,
    //         'phone' => $request->phone,
    //         'email' => $request->email,
    //         'date_birth' => $request->date_birth,
    //         'city_id' => $request->city_id
    //     ]);

    //     return redirect(route('student.show', $newStudent->id))->withSuccess('Étudiant enregistré!');
    // }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $userId = Auth::id();

        if ($student->user_id != $userId) {
            return redirect(route('student.index'))->withErrors("Vous n'êtes pas autorisé à accéder à cet élève.");
        }

        $user = User::find($student->user_id);
        $city = City::find($student->city_id);

        return view('student.show', compact('student','city','user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $userId = Auth::id();

        if ($student->user_id != $userId) {
            return redirect(route('student.index'))->withErrors("Vous n'êtes pas autorisé à modifier cet élève.");
        }

        $user = User::find($student->user_id);
        $cities = City::all();

        return view('student.edit', compact('student','cities','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'address' => 'min:6|max:255',
            'phone' => 'min:9|max:45',
            'date_birth' => 'required',
            'city_id' => 'required',
        ]);

        $student->update([
            'address' => $request->address,
            'phone' => $request->phone,
            'date_birth' => $request->date_birth,
            'city_id' => $request->city_id
        ]);

        return redirect(route('student.show', $student->user_id))->withSuccess('Étudiant mis a jour!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $user = User::find($student->user_id);
        $student->delete();
        $user->delete();

        return redirect(route('student.index'))->withSuccess('Étudiant effacé!');
    }
}
