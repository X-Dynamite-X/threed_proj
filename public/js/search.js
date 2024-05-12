$(document).ready(function() {
    $('.search').on('input', function() {
        var query = $(this).val().trim();;

        $.ajax({
            type: "GET",
            url: "/search",
            data: { search: query },
            success: function (data) {
                console.log(data);
                $(".contacts_search").empty(); // Clear existing contacts

                for (let index = 0; index < data.length; index++) {
                    var user = data[index];
                    console.log(query.length);
                    console.log(query);

                    if (user.id != user_id && query.length !=0) {
                        var contact = `
                    <li>
                        <label for="send_req${user.id}" style="width: 100%;">
                                <div class="d-flex bd-highlight" style="width: 100%">
                                    <div class="img_cont">
                                        <img src="/image/avatars/${user.user_avatar}" class="rounded-circle user_img" />
                                        <span class="online_icon"></span>
                                    </div>
                                    <div class="user_info">
                                        <span>${user.name}</span>
                                        <p>${user.name} is online</p>
                                    </div>
                                </div>
                                <form action="${create_ConversationController}/${user_id}/${user.id}" method="POST">
                                <input type="hidden" name="_token" value="${csrf_token}" autocomplete="off">
                                    <input type="hidden" name="user1_id" value="${user_id}">
                                    <input type="hidden" name="user2_id" value="${user.id}">
                                    <button type="submit" id="send_req${user.id}" class="send_req"></button>
                                </form>
                        </label>
                    </li>
                    `;
                        $(".contacts_search").append(contact);
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    });
});
