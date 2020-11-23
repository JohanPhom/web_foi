$(document).ready(function () {

    var cookie = document.cookie;
    var start = cookie.indexOf("Joox_username");

    if(start != -1){
        cookie = cookie.substr(start+14, cookie.length);
        var end = cookie.indexOf(";");

        if(end == -1){
            cookie = cookie.substr(0, cookie.length);
        }else{
            cookie = cookie.substr(0, end);
        }
        document.getElementById("username").value = cookie;
    }

    $("#submit_login").click(function () {

        var check = $('#remember_user:checkbox:checked').length;
        
        if(check == 1){

            var username = $("#username").val();
            var password = $("#password").val();

            $.ajax({
                url: 'index.php?page=login&username=' + username,
                type: 'GET',
                datatype: 'xml',
                success: function (xml) {
                    $(xml).find('user').each(function () {
                        //look for the user with his username
                        if ($(this).find("password").text() == password && password != '') {   
                            document.cookie = "Joox_username="+username+";path=/";
                        }
                    })
                },
                error: function (xhr, status, error) {
                }
            })
        }
    
    });

});