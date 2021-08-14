@extends('layouts.base')

@section('title', 'Homepage')

@section('content')
    <div class="content flex flex-col my-10">
        <div class="header flex flex-row">
            <div class="sidebar flex flex-col border bg-white rounded-xl px-4 p-4 h-64 mr-6">
                @foreach ($categories as $category)
                    <a href="{{ route((strtolower($category->name) . '-page')) }}">
                        <h2>{{ $category->name }}</h2>
                    </a>
                @endforeach
            </div>
            <img class="sales-promotion rounded-xl flex-grow"
                 src="{{ asset('images/salesPromotions/salesPromotion.png') }}" alt="Sales Promotion">
        </div>
        <div class="best-sellers flex flex-col">
            @foreach ($bestSellers as $category => $products)
                <div class="best-seller-banner mt-10 p-4 text-white">
                    <h2>Best Seller {{$category}}</h2>
                </div>
                <div class="best-seller-products flex flex-row justify-center bg-white">
                    @foreach ($products as $product)
                        <div class="flex flex-col border product p-6">
                            <img class="product-image text-center"
                                 src="{{ asset('images/'. \App\Http\Enums\CategoryName::plural($category).'/'. $category.'.jpg') }}"
                                 alt="Product Image">
                            <p class="my-4">{{ $product->name }}</p>
                            <p class="mb-4">{{ number_format($product->price, thousands_separator: ".") }} vnd</p>
                            <div class="flex flex-row">
                                @for ($i=$product->rates_value; $i>0; $i--)
                                    <i class="rating-star fas fa-star"></i>
                                @endfor
                                @for ($i=5-$product->rates_value; $i>0; $i--)
                                    <i class="fas fa-star text-gray-200"></i>
                                @endfor
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
