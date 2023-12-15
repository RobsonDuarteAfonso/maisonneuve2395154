@extends('layouts.layout')
@section('content')
<div class="container-lg mt-4">
    <div class="card">
        <div class="card-header d-inline-flex">
            <div class="col-6 text-start">
                <h1>Liste des Étudiants</h1>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <a class="btn btn-primary" href="{{ route('student.create') }}" role="button">Ajouter</a>
            </div>            
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr class="table-info">
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Courriel</th>
                        <th scope="col">Phone</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                    <tr>
                        <th scope="row">{{ $student->id }}</th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td><a class="btn btn-info" href="{{ route('student.show', $student->id) }}" role="button">Détails</a></td>
                    </tr>
                    @empty
                    <tr>
                        <td scope="row" colspan="5" class="text-center">Aucune information sur les étudiants disponible!</td>
                    </tr>            
                    @endforelse
                </tbody>        
            </table>
        </div>
    </div>
</div>
@endsection