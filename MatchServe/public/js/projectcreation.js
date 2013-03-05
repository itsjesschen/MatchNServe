window.onload = init;

function init(){
    populateProjectOptions();//dynamically add in admins from db
}

//code which allows the dropdown to remain open when selecting sub items from it
function preventDropdownToggle() {
  $('.dropdown-menu').click(function (e) {
    e.stopPropagation();
  });
}


$(function() {
    //Adds date and TIMEPICKER zomgwtfbbq
    $( "#projectStartTime" ).datetimepicker({
    controlType: 'select',
    stepMinute: 30,
    dateFormat: "yy-mm-dd",
    timeFormat: 'HH:mm:ss',
    });
    $( "#projectEndTime" ).datetimepicker({
    controlType: 'select',
    stepMinute: 30,
    dateFormat: "yy-mm-dd",
    timeFormat: 'HH:mm:ss',
    });
});

function fieldDisplay(item){
    if(item.value == item.defaultValue ){//} || item.value =="search for"){
        item.value = "";
    }
}

function focusedText(item) {
    item.style.color = "#000";
}
            
function blurText(item) {
    item.style.color = "#888";
}

function populateProjectOptions(){ //gets all the admins from db and lists them based on the required orgID [TODO: HOW TO INCLUDE ORGID?]
    $.ajax({//populate admins
        type:"GET",
        url:"projectcreation/getAdmins", 
        data:{
            table : "admins"
        }
    }).done(function(html){
        var obj = jQuery.parseJSON(html);
        $options = $("#project-creation-admin-dropdown").find('ul.dropdown-menu'); 
        for(var i= 0; i < obj.length; i++){
            $options.append("<input type='radio' class='adminSelector'  name='admin' value=" + obj[i].userid + ">" + obj[i].name + "</br>"); //inserting into first dropdown
        }
    });
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
    $.ajax({//populate skills
        type:"GET",
        url:"projectcreation/getSkills",
        data:{
            table : "skills"
        }
    }).done(function(html){
        var obj = jQuery.parseJSON(html);
        $options = $("#project-creation-skills-dropdown").find('ul.dropdown-menu');
        for(var i= 0; i < obj.length; i++){
            $options.append("<input type='checkbox' class='skillSelector'  name='skill[]' value=" + obj[i].skillid + " > " + obj[i].description + " </br> "); //inserting into second dropdown
        }
        preventDropdownToggle();
    });

    $.ajax({//populate projectGoodFor
        type:"GET",
        url:"projectcreation/getProjectGoodFors",
        data:{
            table : "projectgoodfor"
        }
    }).done(function(html){
        var obj = jQuery.parseJSON(html);
        $options = $("#project-creation-pgf-dropdown").find('ul.dropdown-menu');
        for(var i= 0; i < obj.length; i++){
            $options.append("<input type='checkbox' class='goodForSelector'  name='pgf[]' value=" + obj[i].pgf_id + ">" + obj[i].description + "</br>"); //inserting into third dropdown
        }
        preventDropdownToggle();
    });
}
