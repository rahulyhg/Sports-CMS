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

    for(var currentSlide = 0; currentSlide < slideshow.length; currentSlide++) 
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

function showUploadMatchRows()
{ 
    var matchInputNumber = document.getElementById("match-field-input").value;
  
    if(matchInputNumber == "")
    {
        window.alert("Please type a number (greater than 1) before clicking");
    }
  
    if(matchInputNumber < 1 && matchInputNumber != "")
    {
        window.alert("Match input number cannot be less than 1");
    }
  
    var matchRows = document.getElementById("match-field-input").value;
  
    var table = document.getElementById("match-input-table");

    if(table.rows.length !== 0)
    {
        for (var deleteCycle = table.rows.length-1; deleteCycle >= 0; deleteCycle--)
        {
            table.deleteRow(deleteCycle);
        }
    }
    
    for(var insertCycle = 0; insertCycle < matchRows; insertCycle++)
    {
        var table = document.getElementById("match-input-table");
      
          var row = table.insertRow(0);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3  = row.insertCell(2);
        var cell4  = row.insertCell(3);
        var cell5  =  row.insertCell(4);
       
      
      var insertCell1 = document.createElement("input");
        insertCell1.setAttribute('type','text');
        insertCell1.setAttribute('class','match-field-input');
        insertCell1.onkeyup="checkForm()";
        insertCell1.placeholder = "Winner";
        cell1.appendChild(insertCell1);

        var insertCell2 = document.createElement("button");
        insertCell2.innerHTML = "Search";
        insertCell2.setAttribute('class','search-button');
        cell2.appendChild(insertCell2);

        var insertCell3 = document.createElement("input");
        insertCell3.setAttribute('type','text');
        insertCell3.setAttribute('class','match-field-input');
        insertCell3.placeholder = "Loser";
        insertCell3.onkeyup="checkForm()";
        cell3.appendChild(insertCell3);

        var insertCell4 = document.createElement("button");
        insertCell4.innerHTML = "Search";
        insertCell4.setAttribute('class','search-button');
        cell4.appendChild(insertCell4);

        var insertCell5 = document.createElement("button");
        insertCell5.innerHTML = "Delete";
        insertCell5.setAttribute('class','delete-button');
        
        cell5.appendChild(insertCell5);
      insertCell5.onclick = function() {deleteRow(this);};
      
      
     
}
   /*var addButton = document.createElement("BUTTON");
  
  addButton.innerHTML = "Add More Rows";
  addButton.setAttribute('class','add-button');
  
  document.body.appendChild(addButton);*/
  document.getElementById("add-button").style.display = "block";
  document. getElementById("match-final-submit").style.display = "block";
}
function deleteRow(selectedRow)
{
  var findRow= selectedRow.parentNode.parentNode.rowIndex;
  document.getElementById("match-input-table").deleteRow(findRow);
   
}
function addMoreRows()
{
  
   var table = document.getElementById("match-input-table");
      
          var row = table.insertRow(0);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3  = row.insertCell(2);
        var cell4  = row.insertCell(3);
        var cell5  =  row.insertCell(4);
       
      
      var insertCell1 = document.createElement("input");
        insertCell1.setAttribute('type','text');
        insertCell1.setAttribute('class','match-field-input');
        insertCell1.onkeyup="checkForm()";
        insertCell1.placeholder = "Winner";
        cell1.appendChild(insertCell1);

        var insertCell2 = document.createElement("button");
        insertCell2.innerHTML = "Search";
        insertCell2.setAttribute('class','search-button');
        cell2.appendChild(insertCell2);

        var insertCell3 = document.createElement("input");
        insertCell3.setAttribute('type','text');
        insertCell3.setAttribute('class','match-field-input');
        insertCell3.placeholder = "Loser";
        insertCell3.onkeyup="checkForm()";
        cell3.appendChild(insertCell3);

        var insertCell4 = document.createElement("button");
        insertCell4.innerHTML = "Search";
        insertCell4.setAttribute('class','search-button');
        cell4.appendChild(insertCell4);

        var insertCell5 = document.createElement("button");
        insertCell5.innerHTML = "Delete";
        insertCell5.setAttribute('class','delete-button');
        
        cell5.appendChild(insertCell5);
      insertCell5.onclick = function() {deleteRow(this);};
  
     
}