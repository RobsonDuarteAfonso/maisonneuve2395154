@extends('layouts.layout')
@section('content')
<div class="container-lg mt-4">
    <form method="post">
        @csrf
        @method('put')
        <div class="card">
            
            <div class="card-header d-inline-flex">
                <div class="col-6 text-start">
                    <h1>@lang('lang.text_article_edit')</h1>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-secondary" href="{{ route('article.index') }}" role="button">@lang('lang.text_return')</a>
                </div>            
            </div>

            <div class="card-body row g-3">

                <div class="card col-md-6">
                    <div class="card-header bg-danger text-light">
                        <h3>@lang('lang.text_english')</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="en_title" class="form-label">@lang('lang.text_title')</label>
                            <input type="text" class="form-control" id="en_title" name="en_title" value="{{ $article->en_title }}">
                            @if($errors->has('en_title'))
                                <span class="text-danger">{{$errors->first('en_title')}}</span>
                            @endif                        
                        </div>

                        <div class="mb-3">
                            <label for="en_text" class="form-label">@lang('lang.text_body')</label>
                            <textarea class="form-control" name="en_text" id="en_text" cols="30" rows="10">{{ $article->en_text }}</textarea>
                            @if($errors->has('en_text'))
                                <span class="text-danger">{{$errors->first('en_text')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card col-md-6">
                    <div class="card-header bg-primary text-light">
                        <h3>@lang('lang.text_french')</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="fr_title" class="form-label">@lang('lang.text_title')</label>
                            <input type="text" class="form-control" id="fr_title" name="fr_title"  value="{{ $article->fr_title }}">
                            @if($errors->has('fr_title'))
                                <span class="text-danger">{{$errors->first('fr_title')}}</span>
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <label for="fr_text" class="form-label">@lang('lang.text_body')</label>
                            <textarea class="form-control" name="fr_text" id="fr_text" cols="30" rows="10">{{ $article->en_text }}</textarea>
                            @if($errors->has('fr_text'))
                                <span class="text-danger">{{$errors->first('fr_text')}}</span>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-success" type="submit">@lang('lang.text_save')</button>
            </div>
            
        </div>
    </form>
</div>
@endsection