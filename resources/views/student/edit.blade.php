@extends('layouts.layout')
@section('content')
<div class="container-lg mt-4">
    <form method="post">
        @csrf
        @method('put')
        <div class="card">
            
            <div class="card-header d-inline-flex">
                <div class="col-6 text-start">
                    <h1>Modifier un Étudiant</h1>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-secondary" href="{{ route('student.index') }}" role="button">Returner</a>
                </div>            
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Courriel</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $student->address }}">
                    @if($errors->has('address'))
                        <span class="text-danger">{{$errors->first('address')}}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $student->phone }}">
                    @if($errors->has('phone'))
                        <span class="text-danger">{{$errors->first('phone')}}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="date_birth" class="form-label">Date de Naissance</label>
                    <input type="date_birth" class="form-control" id="date_birth" name="date_birth" value="{{ $student->date_birth }}">
                    @if($errors->has('date_birth'))
                        <span class="text-danger">{{$errors->first('date_birth')}}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="city_id" class="form-label">Ville</label>
                    <select class="form-select" id="city_id" name="city_id">
                        <option value="">Sélectionner</option>
                        @foreach($cities as $city )
                            <option value="{{ $city->id }}" {{ $student->city_id === $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('city_id'))
                        <span class="text-danger">{{$errors->first('city_id')}}</span>
                    @endif
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-warning" type="submit">Modifier</button>
            </div>
            
        </div>
    </form>
</div>
@endsection