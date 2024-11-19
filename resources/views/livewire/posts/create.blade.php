<form wire:submit="save" class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Share Your Mood</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body  ">
            <div class="flex">
                <input class="  border px-3 py-2 my-2 "
                       placeholder="Post Title" wire:model.blur="title">
            </div>
            <textarea class="w-full h-24 resize-y border p-3  my-2 "
                      placeholder="Say Something" wire:model.blur="body">
                        </textarea>
        </div>

        <div class="modal-footer">
            <label class="cursor-pointer mr-4 px-2 hover:text-red-500">
                <svg class="w-7 h-7 font-extrabold text-2xl" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"/>
                </svg>
                <input type='file' wire:model.live="images" class="hidden" multiple/>
            </label>

            <button wire:click="save" wire:loading.remove wire:target="images" type="submit" data-dismiss="modal"
                    class="post-share-btn px-5 ">post
            </button>
            <button wire:loading wire:target="images" type="button" class="post-share-btn px-5 " disabled>
                <svg class="animate-spin h-3 w-3 mx-2 text-white " xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>
        </div>
    </div>
</form>


