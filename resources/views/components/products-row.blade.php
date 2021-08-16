<div class="products-row flex flex-row flex-wrap justify-start bg-white">
    @foreach ($products as $product)
        <div class="flex flex-col border product p-6">
            <img class="product-image text-center"
                 src="{{ secure_asset('images/'. strtolower(\App\Http\Enums\CategoryName::plural($categoryName)).'/'. strtolower($categoryName) .'.jpg') }}"
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
