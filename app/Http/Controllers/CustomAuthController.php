<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\City;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('auth.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'min:2 | max:45',
            'email' => 'email | max:255 | required | unique:users',
            'password' => 'min:6 | max:20',
            'address' => 'min:6 | max:255',
            'phone' => 'min:9 | max:45',
            'date_birth' => 'required',
            'city_id' => 'required',
        ]);

        DB::beginTransaction();

        try {        
            
            $user = new User;
            $user->fill($request->all()); 
            $user->password = Hash::make($request->password);
            $user->save();
            
            if (!$user->save()) {
                throw new \Exception('User registration was not possible.');
            }

            $createdId = $user->id;

            $student = new Student;
            $student->address = $request->address;
            $student->phone = $request->phone;
            $student->date_birth = $request->date_birth;
            $student->city_id = $request->city_id;
            $student->user_id = $createdId;

            if (!$student->save()) {
                throw new \Exception('User registration was not possible.');
            }

            DB::commit();

            return redirect(route('login'))->withSuccess('Registration completed successfully');

        } catch (\Throwable $e) {

            DB::rollBack();

            throw new \Exception($e->getMessage());
        }
    }


    public function authentication(Request $request){
        
        $request->validate([
            'email' => 'email|required|exists:users',
            'password' => 'min:6 | max:20',
        ]);
        
        $credentials = $request->only('email', 'password');

        
        if(!Auth::validate($credentials)):
            return redirect(route('login'))->withErrors(trans('auth.password'))->withInput();
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return redirect()->intended(route('home.index'));

    }

    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
