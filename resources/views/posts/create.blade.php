<form action="{{route('post.store')}}" method="post">
    @csrf
    <div class="bg-white p-6 mb-12 rounded-lg shadow-lg ">
        <div class="w-1/3">
            <x-jet-label for="title" class="text-lg" value="{{ __('title') }}"/>
            <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title"
                         :value="old('title')" required autofocus autocomplete="name"/>
        </div>
        <div class="mt-4 ">
            <x-jet-label for="body" class="text-lg" value="{{ __('body') }}"/>
            <textarea id="body"
                      class=" form-input resize-y rounded-md shadow-sm block h-24 mt-1 w-full "
                      type="body" name="body" value="old('body')" required></textarea>
        </div>
        <div class="flex items-center justify-end mt-4 ">
            <x-jet-button class="ml-4 ">
                {{ __('Post Now') }}
            </x-jet-button>

        </div>
    </div>
</form>
