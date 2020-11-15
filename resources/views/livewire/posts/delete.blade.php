<div>
    @can('delete',$post)
        <x-jet-dropdown-link
            class="flex my-1 items-center justify-between px-3 hover:bg-red-100"
            href="#"
            wire:click="delete">
            <span class="text-lg">{{ __('Remove') }}</span>
            <svg class="h-6 w-6 text-red-500" viewBox="0 0 24 24"
                 stroke-width="2"
                 stroke="currentColor" fill="none" stroke-linecap="round"
                 stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z"/>
                <path
                    d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"/>
                <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"/>
                <line x1="16" y1="5" x2="19" y2="8"/>
            </svg>
        </x-jet-dropdown-link>
    @endcan
</div>
