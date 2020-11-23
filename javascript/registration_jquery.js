$(document).ready(function () {

    var form = document.getElementById("form");

    //-------------------------------------------------------------EMAIL SETTING--------------------------------------------------------------------
    if (document.getElementById("email").className != "fillField") {
        $("#email").keyup(function () {
            document.getElementById("errorEmail").innerHTML = "";
            var email = document.getElementById('email').value;
            console.log("voici l'email : " + email);

            $.ajax({
                url: 'index.php?page=registration&email=' + email,
                type: 'GET',
                datatype: 'xml',
                success: function (xml) {
                    $(xml).find('user').each(function () {
                        //look for the user with his email
                        if ($(this).find("email").text() == email) {
                            document.getElementById("email").className = "errorField";
                            document.getElementById("errorEmail").className = "errors";
                            document.getElementById("errorEmail").innerHTML += "- Email already exists<br>";
                        } else {
                            document.getElementById("email").className = "validFieldRegistration";
                            document.getElementById("errorEmail").className = "noDisplay";
                        }
                        UpdateUser();
                    })
                },
                error: function (xhr, status, error) {
                }
            })
        });
    }

    //---------------------------------------------------------------------USERNAME SETTING------------------------------------------------------------------
    if (document.getElementById("username").className != "fillField") {
        $("#username").keyup(function () {
            document.getElementById("errorUsername").innerHTML = "";

            var username = document.getElementById('username').value;
            $.getJSON('index.php?page=registration&username=' + username, function (data) {
                $.each(data, function (key, value) {
                    if (value === username) {
                        document.getElementById("username").className = "errorField";
                        document.getElementById("errorUsername").className = "errors";
                        document.getElementById("errorUsername").innerHTML += "- Username already exists<br>";
                    } else {
                        document.getElementById("username").className = "validFieldRegistration";
                        document.getElementById("errorUsername").className = "noDisplay";
                    }
                    UpdateUser();
                });

            });
        });
    }

    $("#cpassword").keyup(function () {
        if (document.getElementById("password").value === document.getElementById("cpassword").value) {
            document.getElementById("cpassword").className = "";
        } else {
            document.getElementById("submit").disabled = true;
            document.getElementById("cpassword").className = "errorField";
        }
    });

    $("#updateButton").click(function () {

        var email = document.getElementById('email').value;
        $.ajax({
            url: 'index.php?page=registration&mail=' + email,
            type: 'GET',
            datatype: 'xml',
            success: function (xml) {
                $(xml).find('user').each(function () {
                    //look for the user with his email
                    if ($(this).find("email").text() == email) {
                        document.getElementById("name").value = $(this).find("name").text();
                        document.getElementById("surname").value = $(this).find("surname").text();
                        document.getElementById("username").value = $(this).find("username").text();
                        document.getElementById("email").value = $(this).find("email").text();
                        document.getElementById("phone").value = $(this).find("phone").text();
                        document.getElementById("password").value = $(this).find("password").text();
                        document.getElementById("cpassword").value = $(this).find("password").text();
                        if($(this).find("genre").text() == "male"){
                            $("#male").prop("checked", true);
                        }else{ 
                            $("#female").prop("checked", true);
                        }
                        document.getElementById("username").className = 'fillField';
                        document.getElementById("email").className = 'fillField';
                        document.getElementById("username").setAttribute('readonly', '');
                        document.getElementById("email").setAttribute('readonly', '');

                        document.getElementById("submit").value = "UpdateValidate";
                        document.getElementById("submit").firstChild.data = "Update";

                        document.getElementById("errorUsername").className = "noDisplay";
                        email = document.getElementById("errorEmail").className = "noDisplay"   ;                    
                    }
                })
            },
            error: function (xhr, status, error) {
            }
        })
    });  

});
    
    //print the button to update user when email and username are already in the DB
    function UpdateUser() {
        var username = document.getElementById("errorUsername").className;
        var email = document.getElementById("errorEmail").className;

        if (username == "errors" && email == "errors") {
            document.getElementById("updateButton").className = "button";
            document.getElementById("icone_login").className = "";
            document.getElementById("icone_email").className = "";
        } else {
            document.getElementById("updateButton").className = "noDisplay";
            document.getElementById("icone_email").className = "noDisplay";
            document.getElementById("icone_login").className = "noDisplay";
        }

    }

    function recaptchaCallback() {
        $('#submit').removeAttr('disabled');
    };
    