@extends('layouts.app')
@section('content')
    <div class=" flex flex-wrap ">
       @forelse($products as $product)
           <div class=" mx-5 mb-10 w-1/4 max-w-sm rounded overflow-hidden shadow-lg">
               <img class="w-full h-64 object-center object-cover" src="/img/image{{$product->id%3+1}}.jpg" alt="Sunset in the mountains">
               <div class="px-6 py-4 bg-white">
                   <div class="font-bold text-2xl mb-2">{{$product->name}}</div>
                   <p class="text-gray-700 text-base">
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                   </p>
                   <br>
                   <div class="font-bold text-lg mb-2">Price : <span class="text-gray-600">{{$product->price}}  DA </span></div>
                   <div class="font-bold text-lg mb-2">Quantity : <span class="text-gray-600">{{$product->quantity}} </span></div>
               </div>
               <div class="flex px-6 pt-4 pb-2">
                   <a href="{{route('products.edit',['product'=>$product])}}" class="inline-flex w-1/2 mx-5 bg-white hover:bg-gray-200  text-gray-800 cursor-pointer rounded-full px-3 py-1 text-md font-bold mr-2 mb-2"><span class="pl-9">Edit</span></a>
                   <a class="inline-flex w-1/2 mx-5 hover:bg-red-400 bg-red-500 text-white cursor-pointer rounded-full px-3 py-1 text-md font-bold mr-2 mb-2"
                     onclick="document.getElementById('delete-product{{$product->id}}').submit();"><span class="pl-8"> Remove</span></a>
                   <form id="delete-product{{$product->id}}" action="{{route('products.destroy',['product'=>$product])}}" method="POST" class="hidden">@csrf @method('delete')</form>
               </div>
           </div>
       @empty
        No Products Available !!! .
       @endforelse
    </div>
@endsection
