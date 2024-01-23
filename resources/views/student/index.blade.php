@extends('layouts.layout')
@section('content')
<div class="container-lg mt-4">
    <div class="card">
        <div class="card-header d-inline-flex">
            <div class="col-6 text-start">
                <h1>@lang('lang.text_students_index')</h1>
            </div>        
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr class="table-info">
                        <th scope="col">#</th>
                        <th scope="col">@lang('lang.text_name')</th>
                        <th scope="col">@lang('lang.text_email')</th>
                        <th scope="col">@lang('lang.text_birth')</th>
                        <th scope="col">@lang('lang.text_city')</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                    <tr>
                        <th scope="row">{{ $student->id }}</th>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->date_birth }}</td>
                        <td>{{ $student->city_name }}</td>
                        @if(intval(Auth::user()->id) == $student->user_id)
                        <td><a class="btn btn-info" href="{{ route('student.show', $student->id)}}" role="button">@lang('lang.text_detail')</a></td>
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
            {{ $students }}
        </div>
    </div>
</div>
@endsection