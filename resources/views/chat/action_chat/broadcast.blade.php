<div class="d-flex justify-content-end mb-4">
    <div class="msg_cotainer_send">
        <p class="text_message">{{ $message->message_text }} </p>


            {{-- إذا كان الإنشاء اليوم --}}
            <span class="msg_time_send">{{ $message->created_at->format('H:i') }} today </span>

    </div>
    <div class="img_cont_msg ">
        <img src="{{ asset('image/avatars/' . $message->sender->user_avatar) }}"
            class="rounded-circle user_img_msg" />
    </div>
</div>
