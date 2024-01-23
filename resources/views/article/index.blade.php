@extends('layouts.layout')
@section('content')
<div class="container-lg mt-4">
    @php $locale = session()->get('locale') @endphp
    <div class="card">
        <div class="card-header d-inline-flex">
            <div class="col-6 text-start">
                <h1>@lang('lang.text_forum')</h1>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <a class="btn btn-primary" href="{{ route('article.create') }}" role="button">@lang('lang.text_add')</a>
            </div>        
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr class="table-info">
                        <th scope="col">@lang('lang.text_title')</th>
                        <th scope="col">@lang('lang.text_author')</th>
                        <th scope="col">@lang('lang.text_date')</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $article)
                    <tr>
                        @if($locale == 'fr')
                            <td>{{ $article->fr_title }}</td>
                        @else
                            <td>{{ $article->en_title }}</td>
                        @endif
                        <td>{{ $article->name }}</td>
                        <td>{{ $article->created_at }}</td>
                        @if(intval(Auth::user()->id) == $article->user_id)
                        <td><a class="btn btn-info" href="{{ route('article.show', $article->id)}}" role="button">@lang('lang.text_detail')</a></td>
                        @else
                        <td></td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td scope="row" colspan="6" class="text-center">@lang('lang.text_noinfo')</td>
                    </tr>            
                    @endforelse
                </tbody>        
            </table>
            {{ $articles }}
        </div>
    </div>
</div>
@endsection