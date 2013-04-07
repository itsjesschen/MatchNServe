window.onload = init;

var projectlistid = new Array();
var previouslistid = new Array();
var counter = 1;
var temp1 = new Date();
var curDate = Date.parse(temp1);
var otherDate;

function init(){
    getOrgProjects();//adds in all the projects to the projects page on load
    populateProjectOptions();//dynamically add in admins from db
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
        $previousOptions = $("#previousprojectlist");
        for(var i= 0; i < obj.length; i++){
            //if the end date has not passed, show it on left side of upcoming
            var temp2 = obj[i].endtime;
            otherDate = Date.parse(temp2);
            if((curDate - otherDate) < 1)
            {
                //add the current projectID into the list of projects
                projectlistid[i] = obj[i].projectid;
                $options.append("<li><a href='#project" + obj[i].projectid + "' data-toggle='tab'> \
                    <div class='calendar' >\
                        <div id='month'>" + getMonth(obj[i].starttime) + "</div>\
                        <div id='date'>" + obj[i].starttime.slice(8,10) + "</div>\
                    </div>\
                    <div class='infosection'>\
                        <div id='projecttitle'>" + obj[i].projectname + "</div>\
                        <div id='orgname'>" + obj[i].orgname + "</div>\
                        <div id='times'>" + getTime(obj[i].starttime) + " - " + getTime(obj[i].endtime) + "</div>\
                        <div class='progress progress-info' id='progressbar'><div class='bar' style='width: 80%'></div></div>\
                    </div></a>\
                </li>");
            }
            else
            {
                //add the current projectID into the list of previous projects
                previousprojectlist[i] = obj[i].projectid;
                $previousOptions.append("<li><a href='#project" + obj[i].projectid + "' data-toggle='tab'> \
                    <div class='calendar' >\
                        <div id='month'>" + getMonth(obj[i].starttime) + "</div>\
                        <div id='date'>" + obj[i].starttime.slice(8,10) + "</div>\
                    </div>\
                    <div class='infosection'>\
                        <div id='projecttitle'>" + obj[i].projectname + "</div>\
                        <div id='orgname'>" + obj[i].orgname + "</div>\
                        <div id='times'>" + getTime(obj[i].starttime) + " - " + getTime(obj[i].endtime) + "</div>\
                        <div class='progress progress-info' id='progressbar'><div class='bar' style='width: 80%'></div></div>\
                    </div></a>\
                </li>");
            }
        }

        //add right hand side stuff
        $options2 = $("#extendedprojectlist");
        $previousOptions2 = $("previousextendedprojectlist");
        for(var i= 0; i < obj.length; i++){
            //if the end date has not passed, add the project to the list
            var temp2 = obj[i].endtime;
            otherDate = Date.parse(temp2);
            if((curDate - otherDate) < 1)
            {
                //see if requirements is null
                var req = obj[i].requirements;
                if(!req)
                {
                    req = 'There are no requirements for this project.';
                }
                $options2.append("\
                    <div class='tab-pane' id='project" + obj[i].projectid + "'>\
                        <div class='tabbable tabs-left' id='rightsideinfo'>\
                            <ul class='nav nav-tabs' id='buttonlist'>\
                                <li class='active'><a href='#moreinfo" + obj[i].projectid + "' data-toggle='tab'><?php echo HTML::image(\"img/CalendarGray.png\") ?></br>More Info</a></li>\
                                <li><a href='#schedule" + obj[i].projectid + "' data-toggle='tab'><?php echo HTML::image(\"img/CalendarGray.png\") ?></br>Schedule</a></li>\
                                <li><a href='#deleteproject" + obj[i].projectid + "' data-toggle='tab'><?php echo HTML::image(\"img/DeleteGray.png\") ?></br>Delete Project</a></li>\
                                <li><a href='#pendingvolunteers" + obj[i].projectid + "' data-toggle='tab'><?php echo HTML::image(\"img/PendingGray.png\") ?></br>Pending</a></li>\
                                <li><a href='#checkinvolunteers" + obj[i].projectid + "' data-toggle='tab'><?php echo HTML::image(\"img/CheckInGray.png\") ?></br>Check-In</a></li>\
                            </ul>\
                            <div class='tab-content'>\
                                <div class='tab-pane active' id='moreinfo" + obj[i].projectid + "'> \
                                    <p> <b>Project Name:</b> " + obj[i].projectname + "</p>\
                                    <p> <b>Details:</b> " + obj[i].details + "</p>\
                                    <p> <b>Headline:</b> " + obj[i].headline + "</p>\
                                    <p> <b>Address:</b> " + obj[i].address + "</p>\
                                    <p> <b>Start Time:</b> " + obj[i].starttime + "</p>\
                                    <p> <b>End Time:</b> " + obj[i].endtime + "</p>\
                                    <p> <b>Total Spots:</b> " + obj[i].spots + "</p>\
                                    <p> <b>Requirements:</b> " + req + "</p>\
                                </div>\
                                <div class='tab-pane' id='schedule" + obj[i].projectid + "'></div>\
                                <div class='tab-pane' id='deleteproject" + obj[i].projectid + "'>Are you sure you want to <a href='#' onclick='deleteProject(\"" + obj[i].projectid + "\")'>delete</a> this project?</div>\
                                <div class='tab-pane' id='pendingvolunteers" + obj[i].projectid + "'></div>\
                                <div class='tab-pane' id='checkinvolunteers" + obj[i].projectid + "'></div>\
                            </div>\
                        </div>\
                    </div>"
                );
            }
            else
            {
                //see if requirements is null
                var req = obj[i].requirements;
                if(!req)
                {
                    req = 'There are no requirements for this project.';
                }
                $previousOptions2.append("\
                    <div class='tab-pane' id='project" + obj[i].projectid + "'>\
                        <div class='tabbable tabs-left' id='rightsideinfo'>\
                            <ul class='nav nav-tabs' id='buttonlist'>\
                                <li class='active'><a href='#moreinfo" + obj[i].projectid + "' data-toggle='tab'><?php echo HTML::image(\"img/CalendarGray.png\") ?></br>More Info</a></li>\
                                <li><a href='#schedule" + obj[i].projectid + "' data-toggle='tab'><?php echo HTML::image(\"img/CalendarGray.png\") ?></br>Schedule</a></li>\
                                <li><a href='#deleteproject" + obj[i].projectid + "' data-toggle='tab'><?php echo HTML::image(\"img/DeleteGray.png\") ?></br>Delete Project</a></li>\
                            </ul>\
                            <div class='tab-content'>\
                                <div class='tab-pane active' id='moreinfo" + obj[i].projectid + "'> \
                                    <p> <b>Project Name:</b> " + obj[i].projectname + "</p>\
                                    <p> <b>Details:</b> " + obj[i].details + "</p>\
                                    <p> <b>Headline:</b> " + obj[i].headline + "</p>\
                                    <p> <b>Address:</b> " + obj[i].address + "</p>\
                                    <p> <b>Start Time:</b> " + obj[i].starttime + "</p>\
                                    <p> <b>End Time:</b> " + obj[i].endtime + "</p>\
                                    <p> <b>Total Spots:</b> " + obj[i].spots + "</p>\
                                    <p> <b>Requirements:</b> " + req + "</p>\
                                </div>\
                                <div class='tab-pane' id='schedule" + obj[i].projectid + "'></div>\
                                <div class='tab-pane' id='deleteproject" + obj[i].projectid + "'>Are you sure you want to <a href='#' onclick='deleteProject(\"" + obj[i].projectid + "\")'>delete</a> this project?</div>\
                            </div>\
                        </div>\
                    </div>"
                );
            }
        }
    });
    setTimeout(function(){getSchedule()},100);;//populates both schedule and pending tabs for projects
}

function getSchedule(){
$.ajax({
        type:"GET",
        url:"upcomingprojectsorg/getSchedule", 
        data:{
            table : "userproject"
        }
    }).done(function(html){
        var obj = jQuery.parseJSON(html);
        for(var i= 0; i < projectlistid.length; i++)
        {
            counter = 1;
            for(var j = 0; j < obj.length; j++)
            {
                if(projectlistid[i] == obj[j].projectid)
                {
                    if(obj[j].approved == "1")
                    {
                        $options4 = $("#schedule" + obj[j].projectid);
                        $options4.append("<p>" + counter + ". "+  obj[j].firstname + " " + obj[j].lastname + "</p>\ ");
                        counter++;
                    }
                    else
                    {
                        $options5 = $("#pendingvolunteers" + obj[j].projectid);
                        $options5.append("<p>Are you sure you want to <a href='#' onclick='approveUser(\"" + obj[j].userid + "\",\"" + obj[j].projectid + "\")'>approve </a> " +  obj[j].firstname + " " + obj[j].lastname + " ?</p>\ ");
                    }
                }
            }
        }
    });
}

function approveUser(userID, projectID) {
  $.get('upcomingprojectsorg/approveUser?user=' + userID + '&project=' + projectID, function(response) {
    window.location.reload();
  });
}

function deleteProject(projectID) {
  $.get('upcomingprojectsorg/deleteProject?project=' + projectID, function(response) {
    window.location.reload();
  });
}

function getTime(dbdate){
    var time = dbdate.slice(11,20);
    return time;
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