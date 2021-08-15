@extends('layouts.base')

@section('title', ucwords($categoryName))

@section('content')
    @include('components.products-row')
    <div class="pagination mt-6">
        {{ $products->links('components.custom-pagination') }}
    </div>
@endsection
