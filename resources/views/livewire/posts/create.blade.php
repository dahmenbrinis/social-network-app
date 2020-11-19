<div class="card card-small">
    <div class="share-box-inner">
        <!-- profile picture end -->
        <div class="profile-thumb">
            <a href="{{route('userProfile.show',['userProfile'=>Auth::id()])}}">
                <figure class="profile-thumb-middle">
                    <img src="{{Auth::user()->profile_photo_url}}">
                </figure>
            </a>
        </div>
        <!-- profile picture end -->

        <!-- share content box start -->
        <div class="share-content-box w-100">
            <div class="share-text-box">
                <textarea name="share" class="share-text-field" aria-disabled="true" placeholder="Say Something"
                          data-toggle="modal" data-target="#textbox" id="email"></textarea>
                <button class="btn-share">share</button>
            </div>
        </div>
        <!-- share content box end -->

        <!-- Modal start -->
        <div class="modal fade" id="textbox" aria-labelledby="textbox" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Share Your Mood</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body custom-scroll ps">
                        <div class="flex">
                            <input class=" custom-scroll border px-3 py-2 my-2 "
                                   placeholder="Post Title" wire:model.defer="title">
                        </div>
                        <textarea class="share-field-big custom-scroll ps"
                                  placeholder="Say Something" wire:model.defer="body">
                        </textarea>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="save" type="button" data-dismiss="modal" class="post-share-btn">post
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
    </div>
</div>

