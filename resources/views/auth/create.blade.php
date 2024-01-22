@extends('layouts.layout')
@section('content')
<div class="container-lg mt-4">
    <form method="post">
        @csrf

        <div class="card">
            
            <div class="card-header d-inline-flex">
                <div class="col-6 text-start">
                    <h1>Registration</h1>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-secondary" href="{{ route('student.index') }}" role="button">Returner</a>
                </div>            
            </div>

            <div class="card-body row g-3">

                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                </div>

                <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
                    @if($errors->has('address'))
                        <span class="text-danger">{{$errors->first('address')}}</span>
                    @endif                    
                </div>                

                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    @if($errors->has('email'))
                        <span class="text-danger">{{$errors->first('email')}}</span>
                    @endif                    
                </div>

                <div class="mb-3 col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                    @if($errors->has('phone'))
                        <span class="text-danger">{{$errors->first('phone')}}</span>
                    @endif                    
                </div>                

                <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @if($errors->has('password'))
                        <span class="text-danger">{{$errors->first('password')}}</span>
                    @endif
                </div>

                <div class="mb-3 col-md-6">
                    <label for="date_birth" class="form-label">Birthday</label>
                    <input type="date" class="form-control" id="date_birth" name="date_birth" value="{{ old('date_birth') }}">
                    @if($errors->has('date_birth'))
                        <span class="text-danger">{{$errors->first('date_birth')}}</span>
                    @endif                    
                </div>
                
                <div class="mb-3 col-md-6">
                    <label for="city_id" class="form-label">City</label>
                    <select class="form-select" id="city_id" name="city_id">
                        <option value="">Sélectionner</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('city_id'))
                        <span class="text-danger">{{$errors->first('city_id')}}</span>
                    @endif                    
                </div>                

            </div>

            <div class="card-footer">
                <button class="btn btn-success" type="submit">Create</button>
            </div>
            
        </div>
    </form>
</div>
@endsection