@extends('layouts.layout')
@section('content')
<div class="container-lg mt-4">
    <form method="POST">
        @csrf
        @method('put')
        <div class="card">
            
            <div class="card-header d-inline-flex">
                <div class="col-6 text-start">
                    <h1>Modifier File</h1>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-secondary" href="{{ route('files.index') }}" role="button">Returner</a>
                </div>            
            </div>

            <div class="card-body row g-3">

                <div class="mb-3">
                    <label for="en_title" class="form-label">Title English</label>
                    <input type="text" class="form-control" id="en_title" name="en_title" value="{{ $file->en_title }}">
                    @if($errors->has('en_title'))
                        <span class="text-danger">{{$errors->first('en_title')}}</span>
                    @endif                        
                </div>
                <div class="mb-3">
                    <label for="fr_title" class="form-label">Title French</label>
                    <input type="text" class="form-control" id="fr_title" name="fr_title" value="{{ $file->fr_title }}">
                    @if($errors->has('fr_title'))
                        <span class="text-danger">{{$errors->first('fr_title')}}</span>
                    @endif
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
            
        </div>
    </form>
</div>
@endsection
