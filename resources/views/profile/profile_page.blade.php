@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile/edit_profile.css') }}">

@endsection("css")
@section('chat')
    <div class="user_profile">
        <div class="content">
            <div class="user_full_name">
                <div class="img_user_name">
                    <div class="background_img_user">
                        {{-- <img src="{{ user . userprofile . profile_picture_background . url }}" alt="" class="background_img"> --}}
                            <img  id="user_avatar" src="{{ asset('image/avatars/'.$user->user_avatar) }}" alt="" class="background_img">
                        </div>
                    </div>
                    <div class="user_inf_name">
                        <div class="user_name">
                            <label for="">User name: </label>
                            <h2 id="username_profilr">{{ $user->name }}</h2>
                        </div>
                        <div class="email_user">
                            <label for="">Email: </label>
                            <h2 id="email_profilr">{{ $user->email }}</h2>
                        </div>
                        <button type="button" class="edit_profile_btn" data-bs-toggle="modal" data-bs-target="#edit_profile">
                            Edit
                        </button>

                    </div>
                </div>
            </div>
        </div>
        @include("profile.edit_profile")
        @section("js")
        <script src="{{ asset('js/profyle.js') }}"></script>
        @endsection
    @endsection("chat")
