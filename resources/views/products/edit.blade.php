@extends('layouts.app')
@section('content')
    <div class="flex justify-center m-10 ">
        <form class=" w-full max-w-sm shadow-lg border-gray-700 p-10 " action="{{route('products.update',['product'=>$product])}}"
              method="post">
            @csrf
            @method('put')
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Product Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input name="name"
                           class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                           id="inline-full-name" type="text" value="{{$product->name}}">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Details
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input name="details"
                           class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                           id="inline-full-name" type="text" value="{{$product->details}}">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Quantity
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input name="quantity"
                           class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                           id="inline-password" type="number" value="{{$product->quantity}}">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Price
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input name="price"
                           class="bg-gray-100 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                           id="inline-password" type="number" value="{{$product->price}}">
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button
                        class="shadow bg-green-500 hover:bg-green-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        type="submit">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
