$(document).ready(function() {
getaccess();

});

function getaccess() {
    $("#access_list").load("ajax_accessto.php");
    $("#you_access").load("ajax_accessto.php?from=1");
//    alert(1);
}

function openAddUser() {
    $("#addUser").modal();
    $("#twitteraccount").focus();
}

function addaccess() {
    name=$("#twitteraccount").val();
    $("#twitteraccount").val('');
    $.ajax({
      url: "ajax_addaccess.php",
        data: {name: name},
      success: function(){
        $(this).addClass("done");
          getaccess();

      }
    });
    $("#addUser").modal('hide');

}

function revokeaccess(idlink) {

    $.ajax({
          url: "ajax_addaccess.php",
            data: {revoke: idlink},
          success: function(){
            $(this).addClass("done");
              getaccess();

          }
        });
//        $("#addUser").modal('hide');

}