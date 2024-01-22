@extends('layouts.layout')
@section('content')
<div class="container-lg mt-4">
    <div class="card">
        <div class="card-header d-inline-flex">
            <div class="col-6 text-start">
                <h1>Forum</h1>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <a class="btn btn-primary" href="{{ route('article.create') }}" role="button">Ajouter</a>
            </div>        
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr class="table-info">
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Date</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $article)
                    <tr>
                        <td>{{ $article->en_title }}</td>
                        <td>{{ $article->name }}</td>
                        <td>{{ $article->created_at }}</td>
                        @if(intval(Auth::user()->id) == $article->user_id)
                        <td><a class="btn btn-info" href="{{ route('article.show', $article->id)}}" role="button">Détails</a></td>
                        @else
                        <td></td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td scope="row" colspan="6" class="text-center">Aucune article disponible!</td>
                    </tr>            
                    @endforelse
                </tbody>        
            </table>
            {{ $articles }}
        </div>
    </div>
</div>
@endsection