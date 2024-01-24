@extends('layouts.layout')
@section('content')
<div class="container-lg mt-4">
    @php $locale = session()->get('locale') @endphp
    <div class="card">
        <div class="card-header d-inline-flex">
            <div class="col-6 text-start">
                <h1>@lang('lang.text_filedirectory')</h1>
            </div>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <a class="btn btn-primary" href="{{ route('files.create') }}" role="button">@lang('lang.text_add')</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr class="table-info">
                        <th scope="col">@lang('lang.text_type')</th>
                        <th scope="col">@lang('lang.text_title')</th>
                        <th scope="col">@lang('lang.text_author')</th>
                        <th scope="col">@lang('lang.text_size')</th>
                        <th scope="col">@lang('lang.text_date')</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($files as $file)
                    <tr>
                        <td>
                        @if(in_array($file->type, ['doc', 'docx', 'DOCX', 'DOC']))
                            <img src="{{ asset('images/doc.png') }}" alt="type doc" class="custom-image">
                        @elseif(in_array($file->type, ['zip', 'ZIP']))
                            <img src="{{ asset('images/zip.png') }}" alt="type png" class="custom-image">
                        @elseif(in_array($file->type, ['pdf', 'PDF']))
                            <img src="{{ asset('images/pdf.png') }}" alt="type pdf" class="custom-image">
                        @endif
                        </td>
                        @if($locale == 'fr')
                            <td>{{ $file->fr_title }}</td>
                        @else
                            <td>{{ $file->en_title }}</td>
                        @endif
                        <td>{{ $file->name }}</td>
                        <td>{{ round($file->size / 1024,2) }} @lang('lang.text_kbyte')</td>
                        <td>{{ $file->created_at }}</td>
                        @if(intval(Auth::user()->id) == $file->user_id)
                        <td>
                            <a class="btn btn-warning" href="{{ route('files.edit', $file->id)}}" role="button">@lang('lang.text_edit')</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">@lang('lang.text_delete')</button>
                            <a class="btn btn-success" href="{{ route('files.download', $file->id) }}" role="button">@lang('lang.text_download')</a>

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
                                    <form method="post" action="{{ route('files.delete', $file->id) }}">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="@lang('lang.text_yes')" class="btn btn-danger">
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
                        <td scope="row" colspan="6" class="text-center">@lang('lang.text_noinfo')</td>
                    </tr>            
                    @endforelse
                </tbody>        
            </table>
            {{ $files }}
        </div>
    </div>
</div>


@endsection