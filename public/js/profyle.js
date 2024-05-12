$(document).on('click', '.send_edit_profile', function() {
    var id = $(this).data("id");
    var form = $("#update_profile" + id);
    var formData = new FormData(form[0]);
    $.ajax({
        type: 'POST',
        url: form.attr("action"),
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
            console.log(data);
            $("#username_profilr").text(data.name);
            $("#email_profilr").text(data.email);
            $('#edit_user_avatar').attr('src', "/image/avatars/" + data.user_avatar);
            $('#user_avatar').attr('src', "/image/avatars/" + data.user_avatar);
            $("#edit_profile_model").modal("hide");
            console.log("done");
        },
        error: function(data) {
            console.log("Error while sending data");
            alert("Error while sending data");
        },
    });
});
function previewImage(input) {
    var file = input.files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#background_preview_image').attr('src', e.target.result);
        };
        reader.readAsDataURL(file);
    }
}
