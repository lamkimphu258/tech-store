@extends('layouts.base')

@section('title', ucwords($categoryName))

@section('content')
    <div class="filter">
        <form
            action=""
            method="GET"
            class="flex flex-row justify-end items-center mb-6">
            <label for="sort" class="mr-2">Sort by:</label>
            <input type="hidden" name="category" value="{{ $categoryName }}">
            <input type="hidden" name="page" value="{{ $page }}">
            <select name="sort" class="mr-6 p-2 bg-white" onchange="this.form.submit()">
                <option value=""></option>
                <option value="newest-date">Newest To Oldest</option>
                <option value="oldest-date">Oldest To Newest</option>
                <option value="highest-price">Highest To Lowest Price</option>
                <option value="lowest-price">Lowest To Highest Price</option>
            </select>
        </form>
    </div>
    @include('components.products-row')
    <div class="pagination mt-6">
        {{ $products->links('components.custom-pagination') }}
    </div>
@endsection
