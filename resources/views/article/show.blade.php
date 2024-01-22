@extends('layouts.layout')
@section('content')
<div class="container-lg mt-4">
    <form method="post">
        @csrf

        <div class="card">
            
            <div class="card-header d-inline-flex">
                <div class="col-6 text-start">
                    <h1>Détail de l'article</h1>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-secondary" href="{{ route('article.index') }}" role="button">Returner</a>
                </div>            
            </div>

            <div class="card-body row g-3">

                <div class="card col-md-6">
                    <div class="card-header">
                        <h3>English</h3>
                    </div>
                    <div class="mb-3">
                        <p class="fw-bold">Title<p>
                        <p>{{ $article->en_title }}</p>
                    </div>

                    <div class="mb-3">
                        <p class="fw-bold">Text<p>
                        <p>{{ $article->en_text }}</p>
                    </div>
                </div>
                <div class="card col-md-6">
                    <div class="card-header">
                        <h3>French</h3>
                    </div>
                    <div class="mb-3">
                        <p class="fw-bold">Title<p>
                        <p>{{ $article->fr_title }}</p>
                    </div>

                    <div class="mb-3">
                        <p class="fw-bold">Text<p>
                        <p>{{ $article->fr_text }}</p>
                    </div>
                </div>

            </div>

            <div class="card-footer d-inline-flex">
                <div class="col-12">
                    <a href="{{ route('article.edit', $article->id)}}" class="btn btn-warning">Modifier</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Effacer</button>
                </div>
            </div>
            
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer la donnée</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       Etes-vous sûr de efffacer la donnée?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
        <form method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Effacer" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection