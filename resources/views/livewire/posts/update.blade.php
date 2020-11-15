<div>
    @can('update',$post)
        <x-jet-dropdown-link class="flex my-1 items-center justify-between px-3"
                             href="{{ route('profile.show') }}">
            <span class="text-lg">{{ __('Edit') }}</span>
            <svg class="h-6 w-6 text-indigo-500 ml-2" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round">
                <polyline points="3 6 5 6 21 6"/>
                <path
                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
            </svg>
        </x-jet-dropdown-link>
    @endcan
</div>
