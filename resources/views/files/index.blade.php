@extends('layouts.layout')
@section('content')
<div class="container-lg mt-4">

    <div class="card">
        <div class="card-header d-inline-flex">
            <div class="col-6 text-start">
                <h1>Files Directory</h1>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <a class="btn btn-primary" href="{{ route('files.create') }}" role="button">Ajouter</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr class="table-info">
                        <th scope="col">Title</th>
                        <th scope="col">Type</th>
                        <th scope="col">Size</th>
                        <th scope="col">Date</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($files as $file)
                    <tr>
                        <td>{{ $file->en_title }}</td>
                        <td>
                        @if(in_array($file->type, ['doc', 'docx']))
                            <img src="{{ asset('images/doc.png') }}" alt="type doc" class="custom-image">
                        @elseif($file->type == 'zip')
                            <img src="{{ asset('images/zip.png') }}" alt="type png" class="custom-image">
                        @elseif($file->type == 'pdf')
                            <img src="{{ asset('images/pdf.png') }}" alt="type pdf" class="custom-image">
                        @endif                            
                        </td>
                        <td>{{  round($file->size / 1024,2) }} kb</td>
                        <td>{{ $file->created_at }}</td>
                        @if(intval(Auth::user()->id) == $file->user_id)
                        <td>
                            <a class="btn btn-warning" href="{{ route('files.edit', $file->id)}}" role="button">Modifier</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Effacer</button>
                            <a class="btn btn-success" href="{{ route('files.download', $file->id) }}" role="button">Télécharger</a>

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
                                    <form method="post" action="{{ route('files.delete', $file->id) }}">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Effacer" class="btn btn-danger">
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>                            

                        </td>
                        @else
                        <td></td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td scope="row" colspan="6" class="text-center">Aucune fichier disponible!</td>
                    </tr>            
                    @endforelse
                </tbody>        
            </table>
            {{ $files }}
        </div>
    </div>
</div>


@endsection