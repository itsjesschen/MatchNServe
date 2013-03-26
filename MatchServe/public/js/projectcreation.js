window.onload = init;

function init(){
    populateProjectOptions();//dynamically add in admins from db
    getOrgProjects();//adds in all the projects to the projects page on load
}

//code which allows the dropdown to remain open when selecting sub items from it
function preventDropdownToggle() {
  $('.dropdown-menu').click(function (e) {
    e.stopPropagation();
  });
}

//loads up all the projects from the DB and places them on the left side of dashboardorg
function getOrgProjects(){
$.ajax({//populate projects
        type:"GET",
        url:"upcomingprojectsorg/getProjects", 
        data:{
            table : "projects"
        }
    }).done(function(html){
        var obj = jQuery.parseJSON(html);
        console.log(obj);
        $options = $("#projectlist");
        for(var i= 0; i < obj.length; i++){
            var curResult = obj[i];
            $options.append("<li><a href='#project" + i + "' data-toggle='tab'> \
                <div class='calendar' >\
                    <div id='month'>" + getMonth(curResult.starttime) + "</div>\
                    <div id='date'>" + curResult.starttime.slice(8,10) + "</div>\
                </div>\
                <div class='infosection'>\
                    <div id='projecttitle'>" + curResult.projectname + "</div>\
                    <div id='orgname'>" + curResult.orgname + "</div>\
                    <div class='progress progress-info' id='progressbar'><div class='bar' style='width: 80%'></div></div>\
                </div></a>\
            </li>");
        }

        //add right hand side stuff
        $options2 = $("#extendedprojectlist");
        for(var i= 0; i < obj.length; i++){
            var curResult = obj[i];
            $options2.append("\
                <div class='tab-pane' id='project" + i + "'>\
                    <div class='tabbable tabs-left' id='rightsideinfo'>\
                        <ul class='nav nav-tabs'>\
                            <li class='active'><a href='#schedule' data-toggle='tab'><?php echo HTML::image('img/CalendarGray.png') ?></br>Schedule</a></li>\
                            <li><a href='#messages' data-toggle='tab'><?php echo HTML::image('img/MessageGray.png') ?></br>Messages</a></li>\
                            <li><a href='#deleteproject' data-toggle='tab'><?php echo HTML::image('img/DeleteGray.png') ?></br>Delete Project</a></li>\
                            <li><a href='#pendingvolunteers' data-toggle='tab'><?php echo HTML::image('img/PendingGray.png') ?></br>Pending</a></li>\
                            <li><a href='#checkinvolunteers' data-toggle='tab'><?php echo HTML::image('img/CheckInGray.png') ?></br>Check-In</a></li>\
                        </ul>\
                        <div class='tab-content'>\
                            <div class='tab-pane active' id='schedule'>Schedule1</div>\
                            <div class='tab-pane' id='messages'>Messages1</div>\
                            <div class='tab-pane' id='deleteproject'>Delete Project1</div>\
                            <div class='tab-pane' id='pendingvolunteers'>Pending1</div>\
                            <div class='tab-pane' id='checkinvolunteers'>Check-In1</div>\
                        </div>\
                    </div>\
                </div>"
            );
        }
    });
}

function getMonth(dbdate){
    var dateNum = dbdate.slice(5,7);
    var result;
    //set the month based on the returned value
    switch(dateNum)
    {
        case '01':
          result = "JAN";
          break;
        case '02':
          result = "FEB";
          break;
        case '03':
          result = "MAR";
          break;
        case '04':
          result = "APR";
          break;
        case '05':
          result = "MAY";
          break;
        case '06':
          result = "JUN";
          break;
        case '07':
          result = "JUL";
          break;
        case '08':
          result = "AUG";
          break;
        case '09':
          result = "SEP";
          break;
        case '10':
          result = "OCT";
          break;
        case '11':
          result = "NOV";
          break;
        case '12':
          result = "DEC";
          break;
        default:
          result = "Error";
    }
    return result;
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
