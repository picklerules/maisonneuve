@extends('layouts.app')

@section('title', 'Files Repository')

@section('content')
<div class="container mt-4">
    <h2>Files Repository</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">User</th>
                <th scope="col">Date Posted</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($files as $file)
            <tr>
                <td>
                    @php
                        $title = json_decode($file->title, true);
                    @endphp
                    {{ $title[app()->getLocale()] ?? $title['en'] }}
                </td>
                <td>{{ $file->user->name }}</td>
                <td>{{ $file->created_at->format('d/m/Y') }}</td>
                <td>
                    <a class="btn btn-primary">Download</a>
                    @if(auth()->id() == $file->user_id)
                        <a href="{{ route('file.edit', $file->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('file.delete', $file->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty

            <tr>
                <td colspan="4">No files have been shared yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $files }}
    </div>
</div>
@endsection
