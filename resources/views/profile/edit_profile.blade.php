
<div class="modal fade" id="edit_profile" tabindex="-1" aria-labelledby="edit_profileLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="edit_profile"  data-bs-theme="dark">
                <div class="content">
                    <div class="form">
                        <p data-bs-dismiss="modal" class="close" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-x-lg" viewBox="0 0 16 16">
                                <path
                                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                            </svg>
                        </p>
                        <center>
                            <h2> Edit profile</h2>
                        </center>
                        <form method="post" enctype="multipart/form-data" id="update_profile{{ $user->id}}"
                            action="{{ route('update_profil', ['user_id' => $user->id]) }}" enctype="multepart/form-data">
                            @csrf
                            @method("put")
                           <div class="profileimg_and_backgrundimg">
                                <label for="background_input_img">
                                    <div class="background_img_user">
                                        <img id="background_preview_image"
                                            src='{{ asset('image/avatars/'.$user->user_avatar) }}' alt=""
                                            class="background_img">
                                        <input type="file" id="background_input_img" name="image" onchange="previewImage(this)">
                                    </div>
                                </label>
                            </div>
                            <div class="inputBox">
                                <input type="text" name="e_name" required="required" value="{{ $user->name }}" />
                                <span>Username</span>
                                <i></i>
                            </div>
                            <div class="inputBox">
                                <input type="email" name="e_email" required="required" value="{{ $user->email }}" />
                                <span>Email</span>
                                <i></i>
                            </div>
                            <div class="inputBox">
                                <input type="button" class="send_edit_profile" data-id="{{Auth()->user()->id}}" value="save">
                                {{-- <button class="send_edit_profile" type="submit">

                                </button> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
