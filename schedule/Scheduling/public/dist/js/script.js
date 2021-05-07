/**
 * Created by miltone on 8/16/16.
 */
$(function() {
    //Open Model for Image
    $(".view_image").click(function() {
        var title = $(this).attr("title");
        var url = $(this).attr("url");
        var type = $(this).attr("type");
        var width = $(this).attr("W");
        var height = $(this).attr("H");
        var model = $("#myModal");
        model.find(".modal-content").css({
            height: (parseInt(height) + 120) + "px",
            width: (parseInt(width) + 5) + "px"
        });
        model.find("#model_header").html(title);
        model.find("#model_header").show();
        var object = '<object data="{FileName}" type="' + type + '" width="' + width + 'px" height="' + height + 'px">';
        object += 'If you are unable to view file, you can download from <a href="{FileName}">here</a>';
        object += '</object>';
        object = object.replace(/{FileName}/g, url);
        model.find("#modal_body").css({
            height: height + "px",
            width: width + "px",
            padding: 0
        });
        model.find("#modal_body").html(object);
        model.find("#model_footer").show();
        model.modal();
    });
    $(".remove_delete").confirm({
        title: "Confirm Deletion",
        content: "Are you sure you want to remove selected data ? ",
        confirmButton: 'YES',
        cancelButton: 'NO',
        confirmButtonClass: 'btn-success',
        cancelButtonClass: 'btn-success'
    });
});
function display_online_user(json, url) {
    if (json.count_user > 0) {
        /* var text = '
             <a href="profile.html" class="pull-left">
             <img alt="image" class="img-circle" src="img/a7.jpg">
             </a>
             <div class="media-body">
             <small class="pull-right">46h ago</small>
         <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
         <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
         </div>
         <li class="divider"></li>'*/
        var text = '<li><strong>Online Users</strong></li><li class="divider"></li>';
        for (var i = 0; i < json.users.length; i++) {
            var obj = json.users[i];
            text += '<li><div class="dropdown-messages-box">';
            text += '<a style="padding: 0px; padding-right: 10px;" href="' + url + 'index.php/common/online?id=' + obj.id + '" class="pull-left"> <img alt="image" class="img-circle" src="' + url + '/uploads/photo/student/' + obj.profile + '"></a>';
            text += '<div class="media-body"><a href="' + url + 'index.php/common/online?id=' + obj.id + '" style="color: inherit; text-align: left; display: block; padding: 0px;"><strong>' + obj.name + '</strong><br/>' + obj.groupname + '</a></div>';
            text += '</div></li> <li class="divider"></li>';
        }
        $("#online_user_count").show();
        $("#list_online_user").css('display', '');
        $("#online_user_count").html(json.count_user);
        $("#list_online_user").html(text);
    }
    if (json.new_message > 0) {
        $("#new_message_count").show();
        $("#new_message_count").html(json.new_message + ' ');
    } else {
        $("#new_message_count").hide();
    }
}