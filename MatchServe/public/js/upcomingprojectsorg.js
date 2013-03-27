window.onload = init;

function init(){
    alert("test");
    getOrgProjects();// init ajax to populate left sidebar
} 


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
    });
          /*  $projectCardlist = $("#projectlist");

            for(var i= 0; i < obj.length; i++){
                var curResult = obj[i];
                addProjectCard(projectCardlist, curResult, i); //lists results in results div
            }*/
}

function addProjectCard(projectCardlist, results, i)
{
/*    <li class="active"><a href="#project1" data-toggle="tab">
                <div class="calendar">
                    <div id="month">MAR</div>
                    <div id="date">25</div>
                </div>
                <div class="infosection">
                    <div id="projecttitle">Web Developer</div>
                    <div id="orgname">Downtown Womens Center</div>
                    <div id="timeline">10:00am - 2:00pm</div>
                    <div class="progress progress-info" id="progressbar"><div class="bar" style="width: 80%"></div></div>
                </div></a>
            </li>



    projectCardlist.innerHTML += "<li class='active'>\
        <a href='" results.project.ProjectID "' data-toggle='tab'>\
                            <div class='calendar'>\
                            <div id="month">MAR</div>
                            <div id="date">25</div>
                        </div>
                        <div class="infosection">
                            <div id="results.project.Name">Web Developer</div>
                            <div id="results.organization.Name">Downtown Womens Center</div>
                            <div id="timeline">10:00am - 2:00pm</div>
                            <div class="progress progress-info" id="progressbar"><div class="bar" style="width: 80%"></div></div>
                        </div></a>
                    </li>


                <div class='accordion-heading'>\
                    <a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion" +i+"' href='#collapse" +i+"'>\
                        <img class='causeImage iconCause' src='img/icon.JPG'/> \
                        <div class='leftHandSideStuff'>\
                            <p class='projectPosition'>" +curResult.name +"</p> \
                            <p class='projectOrg'>" +curResult.cause +"</p> \
                            <p class='projectHeadline'>" +curResult.headline +"</p> \
                            <p class='reqsMsg requirementsWarning'>This project contains requirements</p> \
                        </div> \
                        <div class='rightHandSideStuff'> \
                            <p class='projectDistance'><i class='icon-road'></i>" +curResult.location+ "</p> \
                            <p class='projectTime'><i class='icon-time'></i>"+curResult.time+"</p> \
                            <p class='projectDate'><i class='icon-calendar'></i>"+curResult.date+"</p> \
                            <button class='btn btn-success' type='button' class='signUpButton'>Sign Up</button> \
                        </div> \
                    </a> \
                </div> \
                <div id='collapse" +i+"' class='accordion-body collapse'> \
                    <div class='accordion-inner'> \
                        <p class='projectDescription'>\
                            <span class='projectDescriptionTitle'>PROJECT DESCRIPTION</span><br> \
                            "+ curResult.details+" </p> \
                        <div class='additionalInfoBox'> \
                            <p class='accordionTitle'>ADDRESS</p> \
                            <p class='projectLocation'>1200 Pennsylvania Ave SE, Washington, District of Columbia, 20003</p> \
                            <p class='accordionTitle'>POSTED BY</p> \
                            <p class='projectContact'>Anita Singh</p> \
                            <p class='accordionTitle'>SKILLS NEEDED</p> \
                            <p class='projectSkills'>"+curResult.skills+"</p> \
                            <p class='accordionTitle'>ASSOCIATED CAUSES</p> \
                            <p class='projectCause'>" +curResult.cause+"</p> \
                            <p class='accordionTitle'>REQUIREMENTS NEEDED</p> \
                            <p class='projectReqs'>Drivers License Needed</p> \
                        </div> \
                    </div> \
                </div> \
            </div>    \
        </div> \
    </li>";
}, false);
*/}