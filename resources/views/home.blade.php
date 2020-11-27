<x-app-layout>
    <div class="container ">
        <div class=" row">

            <div class="col-lg-2 order-2 order-lg-1">...</div>
            <div class="col-lg-8 order-1 order-lg-2">

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
                            <div class="share-text-box ">
                                <textarea name="share" class="share-text-field" aria-disabled="true"
                                          placeholder="Say Something"
                                          data-toggle="modal" data-target="#textbox" id="email"></textarea>
                                <button class="btn-share">share</button>
                            </div>
                        </div>
                        <!-- share content box end -->

                        <!-- Modal start -->
                        <div class="modal fade " id="textbox" aria-labelledby="textbox">


                            <livewire:posts.create wire:key="create"/>

                        </div>
                        <!-- Modal end -->
                    </div>

                </div>

                <livewire:posts.index/>
            </div>
            <div class="col-lg-2 order-3">...</div>
        </div>
    </div>
</x-app-layout>

