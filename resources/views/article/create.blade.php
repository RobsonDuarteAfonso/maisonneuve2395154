@extends('layouts.layout')
@section('content')
<div class="container-lg mt-4">
    <form method="post">
        @csrf

        <div class="card">
            
            <div class="card-header d-inline-flex">
                <div class="col-6 text-start">
                    <h1>Create Article</h1>
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
                        <label for="en_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="en_title" name="en_title">
                        @if($errors->has('en_title'))
                            <span class="text-danger">{{$errors->first('en_title')}}</span>
                        @endif                        
                    </div>

                    <div class="mb-3">
                        <label for="en_text" class="form-label">Text</label>
                        <textarea class="form-control" name="en_text" id="en_text" cols="30" rows="10"></textarea>
                        @if($errors->has('en_text'))
                            <span class="text-danger">{{$errors->first('en_text')}}</span>
                        @endif
                    </div>
                </div>
                <div class="card col-md-6">
                    <div class="card-header">
                        <h3>French</h3>
                    </div>
                    <div class="mb-3">
                        <label for="fr_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="fr_title" name="fr_title">
                        @if($errors->has('fr_title'))
                            <span class="text-danger">{{$errors->first('fr_title')}}</span>
                        @endif
                    </div>
                    
                    <div class="mb-3">
                        <label for="fr_text" class="form-label">Text</label>
                        <textarea class="form-control" name="fr_text" id="fr_text" cols="30" rows="10"></textarea>
                        @if($errors->has('fr_text'))
                            <span class="text-danger">{{$errors->first('fr_text')}}</span>
                        @endif
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
            
        </div>
    </form>
</div>
@endsection