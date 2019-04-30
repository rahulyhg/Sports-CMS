var slideIndex = 0;

window.onload = function()
{ 
    document.getElementById("input-confirm-password").onchange = passwordMatches;
    document.getElementById("input-email").onchange = isEmailTaken;
    document.getElementById("player-tab").click();
    rotateSlideshow();
}

function passwordMatches()
{
    var password = document.getElementById("input-password").value;
    var confirmPassword = document.getElementById("input-confirm-password").value;

    if(password && confirmPassword != null)
    {
    	if(confirmPassword != password)
    	{
        	document.getElementById("input-confirm-password").setCustomValidity("Passwords do not match");
    	}
   		else
    	{
    		document.getElementById("input-confirm-password").setCustomValidity(""); 
    	}
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
    hideDropdownMenu();
}

function hideRegisterModal()
{
	document.querySelector(".register-modal-background").style.display = "none";
}

function showDropdownMenu()
{
    document.querySelector(".dropdown-menu").style.display = "inline-block";
    document.querySelector(".nav-sign-in-button").style.backgroundColor = "var(--secondary-color)";
}

function hideDropdownMenu()
{
    document.querySelector(".dropdown-menu").style.display = "none";
    document.querySelector(".nav-sign-in-button").style.backgroundColor = "var(--primary-color)";
}

function toggleDropdownMenu()
{
    if($(".dropdown-menu").css("display") === "none")
    {
        showDropdownMenu();
    }
    else
    {
        hideDropdownMenu();
    }
}

function rotateSlideshow() 
{
    var slideshow = document.getElementsByClassName("slideshow-image");

    for (var currentSlide = 0; currentSlide < slideshow.length; currentSlide++) 
    {
        slideshow[currentSlide].style.opacity = "0.0";
    }

    slideIndex++;

    if(slideIndex > slideshow.length) 
    {
        slideIndex = 1;
    }

    slideshow[slideIndex - 1].style.opacity = "1.0";

    setTimeout(rotateSlideshow, 6500);
}

function switchTab(tab, content) 
{
    var tabSelections = document.getElementsByClassName("tab-selection");
    var tabContent = document.getElementsByClassName("tab-content");

    for (var currentTab = 0; currentTab < tabContent.length; currentTab++) 
    {
      tabContent[currentTab].style.display = "none";
    }

    for (currentTab = 0; currentTab < tabSelections.length; currentTab++) 
    {
      tabSelections[currentTab].style.backgroundColor = "";
    }

    selectedContent = document.getElementById(content);
    selectedContent.style.display = "block";
}












