Pusher.logToConsole = true;

const pusher = new Pusher("0593f400f770b8b42f63", {
    cluster: "mt1",
});

const encodedConversationId = encodeURIComponent(conversation_id);
const channel = pusher.subscribe(`conversation${conversation_id}`);

var isSending = false;

function sendMessage() {
    if (isSending) {
        return;
    }

    var form = $("#chatForm");
    var formData = form.serialize();
    isSending = true;
    $.ajax({
        url: `/chat/${conversation_id}/broadcast/messages`,
        type: form.attr("method"),
        socket_id: pusher.connection.socket_id,
        data: formData,
        success: function (response) {
            console.log("success");
            console.log(response);
            console.log("send");
            $(".message_spase >").last().after(response);
            $("#message_text").val("");
            $(document).scrollTop($(document).height());
        },
        error: function (response) {
            console.log(response);
            console.log("Error sending data");
            alert("Error sending data");
        },
        complete: function () {
            isSending = false;
        },
    })
}


function handleKeyPress(event) {
    if (event.key === "Enter") {
        sendMessage();
    }
}


$(document).on("click", ".send_btn_input", function () {
    sendMessage();
});


channel.bind("chatuser", function (data) {
    console.log(data);

    console.log('res');

    if (user_id != data.sender_user_id) {
        console.log(data);
        console.log('res');
        $.ajax({
            url: `/chat/${conversation_id}/receive/messages`,
            method: 'POST',
            data: {
                _token: csrf_token,
                // message_text: data.message_text,
                encodedConversationId: data.encodedConversationId,
            },
            success: function (res) {
                $(".message_spase >").last().after(res);
                $(document).scrollTop($(document).height());
            },
            error: function (error) {
                console.log('Error:', error);
            }
        });
    }
});
