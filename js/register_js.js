$(document).ready(function() {

    $("#register_button").click(function ()
    {
        var emailAddress = $("#email").val();
        var username = $("#username").val();
        var password1 = $("#password").val();
        var password2 = $("#retyped_password").val();
        var errorM = "";
       var isValid = true;
        if (username === "")
        {
            isValid = false;
            errorM += "- Username is required!\n";
        } else if (username.length < 6 && username !== "")
        {
            isValid = false;
            errorM += "- Username should be longer than 6"
        }

        else
        {  
            $("#username").next().text("");
        }


        if (emailAddress === "")
        {
            isValid = false;
            errorM += "- Email address is required!\n";
        } 
        else if (emailAddress !== "" && validateEmail(emailAddress) === false)
        {
            isValid = false;
            errorM += "- Your email address is invalid!\n";
        } else
        {
            $("#email_address").next().text("");
        }


        if (password1 === "")
        {
            isValid = false;
            errorM += "- Password is required!\n";
        } else if (password1.length < 6 && password1 !== "")
        {
            isValid = false;
            errorM += "- Password length is less than 6!\n";

        } 
        else
        {
            $("#password1").next().text("");
        }


        if (password2 === "")
        {
            isValid = false;
            errorM += "- Re-enter your password!\n";
        }
        else if (password1 !== password2)
        {
            isValid = false;
                        errorM += "- Passwords didn't match!\n";

        } else
        {
            $("#password2").next().text("");
        }
       
        if (isValid)
        {
            $("#register-form").submit();

        }
        else
        {
            alert(errorM);
        }
    });

});

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
