@extends('layouts.layout')
@section('content')
<div class="container-lg mt-4">
    <form method="post">
        @csrf

        <div class="card">
            
            <div class="card-header d-inline-flex">
                <div class="col-6 text-start">
                    <h1>Créer un Étudiant</h1>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-secondary" href="{{ route('student.index') }}" role="button">Returner</a>
                </div>            
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Courriel</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="mb-3">
                    <label for="date_birth" class="form-label">Date de Naissance</label>
                    <input type="date_birth" class="form-control" id="date_birth" name="date_birth">
                </div>

                <div class="mb-3">
                    <label for="city_id" class="form-label">Ville</label>
                    <select class="form-select" id="city_id" name="city_id">
                        <option selected>Sélectionner</option>
                        @foreach($cities as $city )
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-success" type="submit">Sauvegarder</button>
            </div>
            
        </div>
    </form>
</div>
@endsection