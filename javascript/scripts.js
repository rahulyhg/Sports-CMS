window.onload = function()
{ 
    document.getElementById("input-confirm-password").onchange = passwordMatches;
    document.getElementById("input-email").onchange = isEmailTaken;
}

function passwordMatches()
{
    var password = document.getElementById("input-password").value;
    var confirmPassword = document.getElementById("input-confirm-password").value;
  
    if(confirmPassword != password)
    {
        document.getElementById("input-confirm-password").setCustomValidity("Passwords do not match");
    }
    else
    {
    	document.getElementById("input-confirm-password").setCustomValidity(""); 
    }
}

function isEmailTaken()
{
    var email = $("#input-email").val();

	$.ajax
	({
		url: "./isEmailTaken.php",
        type: "POST",
        dataType: "text",
        data: {email: email},
        success: function(data) 
        {
            if(data == "true")
            {
            	document.getElementById("input-email").setCustomValidity("An account with this email already exists");
            }
            else
            {
                document.getElementById("input-email").setCustomValidity("");
            }
        }
    });
}

function showRegisterModal()
{
	document.querySelector(".register-modal-background").style.display = "flex";
}

function hideRegisterModal()
{
	document.querySelector(".register-modal-background").style.display = "none";
}

