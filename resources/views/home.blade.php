@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header id="header"
                    class="font-semibold bg-gray-100 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                <a href="" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-8 rounded">
                    New Post
                </a>
            </header>

            <div class="w-full p-6">

            </div>
        </section>
    </div>
</main>
@endsection
