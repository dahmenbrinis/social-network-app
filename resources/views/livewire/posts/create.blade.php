<form wire:submit.prevent="save" class="modal-dialog">
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
                       placeholder="Post Title" wire:model.lazy="title">
            </div>
            <textarea class="w-full h-24 resize-y border p-3  my-2 "
                      placeholder="Say Something" wire:model.lazy="body">
                        </textarea>
        </div>

        <div class="modal-footer">

            <label class="cursor-pointer mr-4 px-2 hover:text-red-500">
                <svg class="w-7 h-7 font-extrabold text-2xl" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"/>
                </svg>
                <input type='file' wire:model="images" class="hidden" multiple/>
            </label>

            <button wire:click="save" type="submit" data-dismiss="modal" class="post-share-btn px-5 ">post
            </button>
        </div>
    </div>
</form>


