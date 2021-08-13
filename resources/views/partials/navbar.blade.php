<navbar class="flex flex-row text-white items-center justify-between py-3">
    <div class="navbar-brand flex flex-row ml-2 justify-center items-center">
        <i class="fas fa-store mr-3 text-4xl"></i>
        <a href="{{ route('homepage') }}">
            <h1>Tech Store</h1>
        </a>
    </div>
    <div class="bg-white flex items-center rounded-full shadow-xl search">
        <input class="rounded-l-full w-full py-4 px-6 text-gray-700 leading-tight focus:outline-none" id="search"
               type="text" placeholder="Which product are you looking for">
        <div>
            <button class="px-4">
                <i class="fas fa-search fa-2x text-black"></i>
            </button>
        </div>
    </div>
    <div class="flex flex-row items-center">
        <a href="{{ route('shopping-cart-page') }}" class="shopping-cart flex flex-row items-center border p-2 mr-2">
            <i class="fas fa-shopping-cart fa-2x mr-2"></i>
            <h2>Shopping Cart</h2>
        </a>
        <a href="{{ route('my-order-page') }}">
            <h2 class="mr-2">My Order</h2>
        </a>
    </div>
</navbar>
