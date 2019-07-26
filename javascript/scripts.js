var slideIndex = 0;

window.onload = function()
{ 
    document.getElementById("input-confirm-password").onchange = passwordMatches;
    document.getElementById("input-email").onchange = isEmailTaken;
    document.getElementById("player-tab").click();
    rotateSlideshow();
    document.getElementById("reset-input-confirm-password").onchange = resetPasswordMatches;
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

function resetPasswordMatches()
{
    var password = document.getElementById("reset-input-password").value;
    var confirmPassword = document.getElementById("reset-input-confirm-password").value;

    if(password && confirmPassword != null)
    {
        if(confirmPassword != password)
        {
            document.getElementById("reset-input-confirm-password").setCustomValidity("Passwords do not match");
        }
        else
        {
            document.getElementById("reset-input-confirm-password").setCustomValidity(""); 
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

function showPasswordModal()
{
    document.querySelector(".password-modal-background").style.display = "flex";
    hideDropdownMenu();
}

function hidePasswordModal()
{
    document.querySelector(".password-modal-background").style.display = "none";
}

function showResetModal()
{
    document.querySelector(".reset-modal-background").style.display = "flex";
    hideDropdownMenu();
}

function hideResetModal()
{
    document.querySelector(".reset-modal-background").style.display = "none";
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

function showNotificationModal(header, message)
{
    document.querySelector("#notification-header-text").innerHTML=header;
    document.querySelector("#notification-modal-text").innerHTML=message;

    document.querySelector(".notification-modal-background").style.display = "flex";
}

function hideNotificationModal()
{
    document.querySelector(".notification-modal-background").style.display = "none";
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

function resetPassword()
{
    var emailSentText = document.getElementById("email-sent");
    var emailField = $("#password-input-email").val();

    if(emailField != "")
    {
        emailSentText.style.visibility = "visible";

        $.ajax
        ({
            url: "./forgotPassword.php",
            type: "POST",
            dataType: "text",
            data: { resetPassword: emailField },
            success: function(data) 
            { }
        });
    }
}


/**
 * -------------------------------------------------------------*
 * 		Begin Match Upload Section								*
 * 																*
 * -------------------------------------------------------------*
 */

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
        insertCell1.setAttribute('class','match-field-input winner-loser-field winner-field');
        insertCell1.setAttribute('name','winner-name[]');
        insertCell1.setAttribute('pattern', '[a-zA-Z ]{1,45}');
        insertCell1.setAttribute('title', 'Winner name must be within 1-45 characters');
        insertCell1.onkeyup="checkForm()";
        insertCell1.placeholder = "Winner";
        cell1.appendChild(insertCell1);

        //adds a hidden cell to contain ids of winners
        var hiddenInput1 = document.createElement("input");
        hiddenInput1.setAttribute('type','hidden');
        hiddenInput1.setAttribute('name','winner-id[]');
        cell1.appendChild(hiddenInput1);

        var insertCell2 = document.createElement("button");
        insertCell2.innerHTML = "Search";
        insertCell2.setAttribute('class','search-button');
        cell2.appendChild(insertCell2);

        var insertCell3 = document.createElement("input");
        insertCell3.setAttribute('type','text');
        insertCell3.setAttribute('class','match-field-input winner-loser-field loser-field');
        insertCell3.setAttribute('name','loser-name[]');
        insertCell3.setAttribute('pattern', '[a-zA-Z ]{1,45}');
        insertCell3.setAttribute('title', 'Loser name must be within 1-45 characters');
        insertCell3.placeholder = "Loser";
        insertCell3.onkeyup="checkForm()";
        cell3.appendChild(insertCell3);
        
        //adds a hidden cell to contain ids of losers
        var hiddenInput2 = document.createElement("input");
        hiddenInput2.setAttribute('type','hidden');
        hiddenInput2.setAttribute('name','loser-id[]');
        cell3.appendChild(hiddenInput2);

        var insertCell4 = document.createElement("button");
        insertCell4.innerHTML = "Search";
        insertCell4.setAttribute('class','search-button');
        cell4.appendChild(insertCell4);

        var insertCell5 = document.createElement("button");
        insertCell5.innerHTML = "Delete";
        insertCell5.setAttribute('class','delete-button');
        
        cell5.appendChild(insertCell5);
      insertCell5.onclick = function() {deleteRow(this);
	};
	
	setupMatchAutoComplete();
  setupMatchErrorChecking();
      
      
     
}
   /*var addButton = document.createElement("BUTTON");
  
  addButton.innerHTML = "Add More Rows";
  addButton.setAttribute('class','add-button');
  
  document.body.appendChild(addButton);*/
  if(matchInputNumber != 0)
  {
  document.getElementById("add-button").style.display = "block";
  document. getElementById("match-final-submit").style.display = "block";
  }
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
        insertCell1.setAttribute('class','match-field-input winner-loser-field winner-field');
        insertCell1.setAttribute('name','winner-name[]');
        insertCell1.setAttribute('pattern', '[a-zA-Z ]{1,45}');
        insertCell1.setAttribute('title', 'Winner name must be within 1-45 characters');
        insertCell1.onkeyup="checkForm()";
        insertCell1.placeholder = "Winner";
        cell1.appendChild(insertCell1);
        
        //adds a hidden cell to contain ids of winners
        var hiddenInput1 = document.createElement("input");
        hiddenInput1.setAttribute('type','hidden');
        hiddenInput1.setAttribute('name','winner-id[]');
        cell1.appendChild(hiddenInput1);

        var insertCell2 = document.createElement("button");
        insertCell2.innerHTML = "Search";
        insertCell2.setAttribute('class','search-button');
        cell2.appendChild(insertCell2);

        var insertCell3 = document.createElement("input");
        insertCell3.setAttribute('type','text');
        insertCell3.setAttribute('class','match-field-input winner-loser-field loser-field');
        insertCell3.setAttribute('name','loser-name[]');
        insertCell1.setAttribute('pattern', '[a-zA-Z ]{1,45}');
        insertCell1.setAttribute('title', 'Loser name must be within 1-45 characters');
        insertCell3.placeholder = "Loser";
        insertCell3.onkeyup="checkForm()";
        cell3.appendChild(insertCell3);
        
        //adds a hidden cell to contain ids of losers
        var hiddenInput2 = document.createElement("input");
        hiddenInput2.setAttribute('type','hidden');
        hiddenInput2.setAttribute('name','loser-id[]');
        cell3.appendChild(hiddenInput2);

        var insertCell4 = document.createElement("button");
        insertCell4.innerHTML = "Search";
        insertCell4.setAttribute('class','search-button');
        cell4.appendChild(insertCell4);

        var insertCell5 = document.createElement("button");
        insertCell5.innerHTML = "Delete";
        insertCell5.setAttribute('class','delete-button');
        
        cell5.appendChild(insertCell5);
      insertCell5.onclick = function() {deleteRow(this);
	};
	
	setupMatchAutoComplete();
  setupMatchErrorChecking();
}



/**
 * on page load funcion.
 * A number of items need to be setup on page load. 
 * They are described in line. 
 */
$( function() {
    uploadEventChangeStates();	//gets states based on country
    setupMatchAutoComplete();	//gets players based on state
    
    //set the max event date to today
	let now = new Date();
	var nowString = now.toISOString().substring(0,10);
	$("#event-date").attr({
		"max" : nowString
	});
});

/**
 * ajax query for event upload page to fill in state box based upon user
 * selection from country box.
 * 
 * Relies on getStatesByCountry.php for data. 
 * 
 * Triggers by change in country-id and on page load
 */
 
 //event listener for change of country
$("#country-id").change(uploadEventChangeStates);
 
function uploadEventChangeStates()
{
    var country = $("#country-id").val();
    
    //clear the options
    $("#state-name").empty();
    
    //run ajax
    $.ajax
    ({
        url: "./get-states-by-country-ID.php",
        type: "POST",
        dataType: "text",
        data: {countryID: country},
        success: function(data) 
        {
            //parse the returned data
            var jsonData = JSON.parse(data);
            
            //add a new option to state-name for each returned state.
            $.each(jsonData, function(index, value)
            {
                $("#state-name").append($("<option>",{
                    value: value["state_id"],
                    text: value["name"]
                }));
            });
        }
    });
}


/**
 * 
 * sets up auto complete for winner/loser boxes. Gets a list of players
 * based upon 'state' selected'.
 * 
 * Triggered by change in state-name, on page load and when number of 
 * matches changes.
 */
$("#state-name").change(setupMatchAutoComplete);

function setupMatchAutoComplete()
{
    var state = $("#state-name").val();     //note that this will need to change to state not country

    $( ".winner-loser-field" ).autocomplete({
        source: 
        function( request, response ) 
        {
            // Fetch data
            $.ajax({
                url: "./get-player-by-state.php",
                type: 'POST',
                dataType: "json",
                data: 
                {
                    name: request.term,
                    state: state
                },
                success: function( data ) 
                {
                    response( data );
                }
            });
        },
        select: function(event,ui)
        {
            //the next elemtent in line will be the hidden cell to contain id
            //fill this with the id. 
            //name cell will be automatically filled in 
            $(this).next().val(ui.item.id);
            
            //when an item is selected it is assumed that no error exists, remove the error class
            $(this).removeClass("upload-page-error-on-submit");
        }
    });

}

/**
 * Sets hidden id field for winners/losers to "" on a user key press,
 * removes any validitiy set when a change is made to winner/losers.
 * 
 * This function needs to be executed every time there is a change in the
 * number of matches.
 */
function setupMatchErrorChecking(){
  $( ".winner-loser-field").keyup(function(e){
    //user has used keyboard to change winner/loser field
    //The winner/loser hidden field needs to be made blank
    $(this).next().val("");
  });
  
  $( ".winner-loser-field").change(function(e){
	 //a field has been changed. Clear any validity message that has been set for all fields. they will be retested once submit is pressed
	 $( ".winner-loser-field").each(function (){
		this.setCustomValidity('');
	 });
  });
}


/**
 * Form validity checking.
 * 
 * Most validity checking is done with HTML5. However, we also need to
 * check validity of winners/losers. This is done by making use of the
 * above funciton setupMatchErrorChecking, then checks to ensure a player
 * has been selected rather than just typed in and that winner != loser.
 * 
 * If there is an error the submit of form is stopped and a HTML5 validity
 * error message is shown to the user. 
 */
$("#event-upload-form").submit(function(){
  
  var rtn = true;
  
  //first check the date is not in the future
  
  
  var winnerID;
  
  $( ".winner-loser-field").each(function (){
    
    if ( $(this).is(".winner-field") )
    {
      //save the winner field for comparrison when we get to loser field
      winnerID = $(this).next().val();
    }
    
    //check if id is set, if id is not set then user has not selected a player and has just entered the information by hand, possibly causing errors.
    if ($(this).next().val() == "")
    {
      //val not set
      this.setCustomValidity('You must select the player from the list.');
      if  (rtn == true)
      {
		  //first error reported so show the error
		this.reportValidity();
	  }
	  rtn = false;
    }
    else
    {
		if (! ($(this).is(".winner-field")) )
		{
			//check if winner id = loser id
			if ( winnerID == $(this).next().val() )
			{
			  this.setCustomValidity('Winner and loser can not be the same player');
			  if  (rtn == true)
			  {
				//first error reported so show the error.
				this.reportValidity();
			  }
			  rtn = false;
			}
			else
			{
				//no error for this item
			  this.setCustomValidity('');
			}
		}
		else
		{
			//no error for this item
			this.setCustomValidity('');
		}
    }
    
    
    
  });
  
  return rtn;
  
});
