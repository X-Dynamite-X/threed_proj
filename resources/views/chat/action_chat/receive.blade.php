<div class="d-flex justify-content-start mb-4">
    <div class="img_cont_msg">

        <img src="{{ asset('image/avatars/' .$receive_user->user_avatar) }}" class="rounded-circle user_img_msg" />
    </div>
    <div class="msg_cotainer">
        {{$message->message_text}}

        <br>

        <span class="msg_time">{{ $message->created_at->format('H:i') }} today</span>
    </div>
</div>
