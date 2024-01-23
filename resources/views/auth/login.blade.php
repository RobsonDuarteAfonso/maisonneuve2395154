@extends('layouts.layout')
@section('content')
<div class="container-lg mt-4">
    <form action="{{ route('authentication') }}" method="post">
        @csrf

        <div class="card">
            
            <div class="card-header d-inline-flex">
                <div class="col-6 text-start">
                    <h1>@lang('lang.text_login')</h1>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <a class="btn btn-outline-secondary" href="{{ route('home.index') }}" role="button">@lang('lang.text_return')</a>
                </div>            
            </div>

            <div class="card-body">

                <div class="mb-3">
                    <label for="email" class="form-label">@lang('lang.text_username')</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    @if($errors->has('email'))
                        <span class="text-danger">{{$errors->first('email')}}</span>
                    @endif                    
                </div>

                <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">@lang('lang.text_password')</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @if($errors->has('password'))
                        <span class="text-danger">{{$errors->first('password')}}</span>
                    @endif
                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-success" type="submit">@lang('lang.text_send')</button>
            </div>
            
        </div>
    </form>
</div>
@endsection