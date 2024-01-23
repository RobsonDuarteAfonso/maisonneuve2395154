@extends('layouts.layout')
@section('content')
<div class="container-lg mt-4">
    <form method="post">
        @csrf

        <div class="card">
            
            <div class="card-header d-inline-flex">
                <div class="col-6 text-start">
                    <h1>@lang('lang.text_article_show')</h1>
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
                            <p class="fw-bold">@lang('lang.text_title')<p>
                            <p>{{ $article->en_title }}</p>
                        </div>

                        <div class="mb-3">
                            <p class="fw-bold">@lang('lang.text_body')<p>
                            <p>{{ $article->en_text }}</p>
                        </div>
                    </div>
                </div>
                <div class="card col-md-6">
                    <div class="card-header bg-primary text-light">
                        <h3>@lang('lang.text_french')</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <p class="fw-bold">@lang('lang.text_title')<p>
                            <p>{{ $article->fr_title }}</p>
                        </div>

                        <div class="mb-3">
                            <p class="fw-bold">@lang('lang.text_body')<p>
                            <p>{{ $article->fr_text }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer d-inline-flex">
                <div class="col-12">
                    <a href="{{ route('article.edit', $article->id)}}" class="btn btn-warning">@lang('lang.text_edit')</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">@lang('lang.text_delete')</button>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.text_modal_delete')</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">@lang('lang.text_modal_quest')</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.text_no')</button>
        <form method="post">
            @csrf
            @method('delete')
            <input type="submit" value="@lang('lang.text_yes')" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection