@extends('layouts.app')
@section('title')
    @lang('lang.repository_title')
@endsection
@section('content')

<div class="container mt-4">
    <h2 class="text-center mt-4 mb-4 p-3 shadow rounded bg-light">@lang('Repertory')</h2>
    <div class="text-center mt-4 mb-5">
        <a href="{{ route('file.create') }}" class="btn btn-outline-primary">@lang('lang.publish_file')</a>
    </div> 
    <table class="table">
        <thead>
            <tr>
                <th scope="col">@lang('Title')</th>
                <th scope="col">@lang('Posted by')</th>
                <th scope="col">@lang('Date Posted')</th>
                <th scope="col">@lang('Actions')</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($files as $file)
            <tr>
                <td>{{ $file->title ? $file->title[app()->getLocale()]?? $file->title['en'] : '' }}</td>
                <td>{{ $file->user->name }}</td>
                <td>{{ $file->created_at->format('d/m/Y') }}</td>
                <td>
                <a href="{{ Storage::url($file->file_path) }}"" class="btn btn-primary">@lang('Download')</a>
                    @if(auth()->id() == $file->user_id)
                        <a href="{{ route('file.edit', $file->id) }}" class="btn btn-secondary">@lang('Edit')</a>
                        <form action="{{ route('file.delete', $file->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">@lang('Delete')</button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty

            <tr>
                <td colspan="4">@lang('lang.no_files_text')</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $files }}
    </div>
</div>
@endsection
