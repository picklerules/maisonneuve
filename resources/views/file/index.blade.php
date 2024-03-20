@extends('layouts.app')
@section('title', 'Files Repository')
@section('content')

<div class="container mt-4">
    <h2>Files Repository</h2>
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
                <td>
                @php
                    $titles = json_decode($file->title, true);
                @endphp
                @foreach ($titles as $lang => $title)
                    <div>{{ strtoupper($lang) }}: {{ $title }}</div>
                @endforeach
                </td>
                <td>{{ $file->user->name }}</td>
                <td>{{ $file->created_at->format('d/m/Y') }}</td>
                <td>
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
