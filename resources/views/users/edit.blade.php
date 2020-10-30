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
                    Edit Page
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                      action="{{ route('user.update',['user'=>$user]) }}">
                    @csrf
                    @method('put')
                    <div class="flex flex-wrap">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Name') }}:
                        </label>

                        <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                               name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name"
                               autofocus>

                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>


                    <div class="flex flex-wrap">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('E-Mail Address') }}:
                        </label>

                        <input id="email" type="email"
                               class="form-input w-full @error('email') border-red-500 @enderror" name="email"
                               value="{{ old('email') ?? $user->email }}" required autocomplete="email">

                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="flex flex-wrap">
                        <label for="gender" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Sex') }}:
                        </label>

                        <select name="gender" id="gender"
                                class="form-select w-full @error('name')  border-red-500 @enderror">
                            <option value="0"
                                    class="{{(old('gender') == 0? 'selected':'') ?? $user->gender == 0? 'selected':''  }}">
                                male
                            </option>
                            <option value="1"
                                    class="{{(old('gender') == 1? 'selected':'') ?? $user->gender == 1? 'selected':''  }}">
                                female
                            </option>
                        </select>

                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="flex flex-wrap">
                        <label for="date_of_birth" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Date of birth') }}:
                        </label>

                        <input id="date_of_birth" type="date"
                               class="form-date w-full @error('date_of_birth')  border-red-500 @enderror"
                               name="date_birth" value="{{ old('date_of_birth')?? $user->date_birth }}" required
                               autocomplete="Date of birth" autofocus>

                        @error('date_of_birth')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="flex flex-wrap">
                        <button type="submit"
                                class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Save') }}
                        </button>

                    </div>
                </form>
            </section>
        </div>
    </main>
@endsection
