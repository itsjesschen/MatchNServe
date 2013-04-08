window.onload = init;

var projectlistid = new Array();
var counter = 1;

function init(){
    populateProjectOptions();//dynamically add in admins from db
}
function populateProjectOptions(){ //gets all the admins from db and lists them based on the required orgID [TODO: HOW TO INCLUDE ORGID?]

    //USED BY ANITA 
    $.ajax({//populate causes
        type:"GET",
        url:"createorg/getCauses", 
        data:{
            table : "causes"
        }
    }).done(function(html){
        var obj = jQuery.parseJSON(html);
        $options = $("#project-creation-causes-dropdown").find('ul.dropdown-menu'); 
        for(var i= 0; i < obj.length; i++){
            $options.append("<input type='radio' class='skillSelector'  name='cause[]' value=" +obj[i].causeid + ">"+obj[i].description+"</br>"); 
        }
    });
}
    
function validateName()
{
	var name = document.getElementById('name').value;
	var errorName = document.getElementById('nameError');
	if(name.length < 1)
	{
		  errorName.style.visibility = "visible";
	}	
}
function validateAddress()
{
	var address = document.getElementById('address').value;
	var errorAddress = document.getElementById('addressError');
	if(address.length < 1)
	{
		errorAddress.style.visibility = "visible";
	}
}
function validateZipcode()
{
	var zipcode = document.getElementById('zipcode').value;
	var errorZipcode = document.getElementById('zipcodeError');
	var num_regex = /^\d+$/; // numeric digits only
	if(!zipcode.match(num_regex) || zipcode.length != 5)
	{
		errorZipcode.style.visibility = "visible";
	}
}
function validatePhone()
{
	var phone = document.getElementById('phone').value; 
	var errorPhone = document.getElementById('phoneError');
	var num_regex = /^\d+$/; // numeric digits only
	if(!phone.match(num_regex))
	{
		errorPhone.style.visibility = "visible";
	}
}
function validateWebsite()
{
	var website = document.getElementById('website').value;
	var errorWebsite = document.getElementById('websiteError');
	if(website.length <1)
	{
		errorWebsite.style.visibility = "visible";
	}
}
function validateMission()
{
	var mission = document.getElementById('mission').value;
	var errorMission = document.getElementById('missionError');
	if(mission.length <1)
	{
		errorMission.style.visibility = "visible";
	}
}
