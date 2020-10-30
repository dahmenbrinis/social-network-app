@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">

            @if (session('status'))
                <div
                    class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4"
                    role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Change Password
                </header>
                @if(session()->has('feedback'))
                    <div
                        class="w-11/12 rounded-b-lg shadow-md mt-2 mx-auto space-y-6 sm:px-10 sm:space-y-8 bg-green-500 text-white font-semibold text-center py-5">
                        {{session()->get('feedback')}}
                    </div>
                @endif
                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                      action="{{ route('update_password',['user'=>auth()->user()]) }}">
                    @csrf
                    @method('patch')
                    <div class="flex flex-wrap">
                        <label for="old_password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Current Password') }}:
                        </label>

                        <input id="old_password" type="password"
                               class="form-input w-full @error('email') border-red-500 @enderror" name="old_password"
                               required autocomplete="Current Password" autofocus>

                        @error('old_password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('New Password') }}:
                        </label>

                        <input id="password" type="password"
                               class="form-input w-full @error('password') border-red-500 @enderror" name="password"
                               required autocomplete="new-password">

                        @error('password')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Confirm Password') }}:
                        </label>

                        <input id="password-confirm" type="password" class="form-input w-full"
                               name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="flex flex-wrap pb-8 sm:pb-10">
                        <button type="submit"
                                class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </main>
@endsection
