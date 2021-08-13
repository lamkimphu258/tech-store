@extends('layouts.base')

@section('title', 'Homepage')

@section('content')
    <div class="sidebar flex flex-col border bg-white rounded-xl px-4 p-4 h-64">
        @foreach ($categories as $category)
            <a href="{{ route((strtolower($category->name) . '-page')) }}">
                <h2>{{ $category->name }}</h2>
            </a>
        @endforeach
    </div>
@endsection
