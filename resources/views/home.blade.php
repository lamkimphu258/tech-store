@extends('layouts.base')

@section('title', 'Homepage')

@section('content')
    <div class="content flex flex-col">
        <div class="header flex flex-row">
            <div class="sidebar flex flex-col border bg-white rounded-xl px-4 p-4 h-64 mr-6">
                @foreach ($categories as $category)
                    <a href="{{ route('products-by-category-page', ['categoryName'=>$category->name, 'page' => 1]) }}">
                        <h2>{{ ucwords(\App\Http\Enums\Categories\CategoryName::plural($category->name)) }}</h2>
                    </a>
                @endforeach
            </div>
            <img class="sales-promotion rounded-xl flex-grow"
                 src="{{ asset('images/salesPromotions/salesPromotion.png') }}" alt="Sales Promotion">
        </div>
        <div class="best-sellers flex flex-col">
            @foreach ($bestSellers as $categoryName => $products)
                <div class="best-seller-banner mt-10 p-4 text-white">
                    <h2>Best Seller {{ ucwords(\App\Http\Enums\Categories\CategoryName::plural($categoryName)) }}</h2>
                </div>
                @include('components.products-row')
            @endforeach
        </div>
    </div>
@endsection
