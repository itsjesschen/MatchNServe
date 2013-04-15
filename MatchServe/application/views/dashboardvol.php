<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Match & Serve | Dashboard Page</title>
  
  <!--SUPER IMPORTANT: MAKE SURE TO COPY AND PASTE THIS IN EVERY HEADER SO ALL THE INCLUDES CAN TAKE EFFECT IN THE PAGE-->
  <?php echo Asset::container('bootstrap')->styles();?>
  <?php echo Asset::styles();?>
  <?php echo Asset::scripts();?>
  <script src="http://malsup.github.com/jquery.form.js"></script>
  
  <style>
  /*If adding css, please designate which file it belongs to by wrapping it in a comment block*/

  /*search.php START*/

  .leftHandSideStuff{
    position:relative;
    float:left;
    width:320px;
    height:75px;
  }
  .rightHandSideStuff{
    position:relative;
    float:right;
    overflow:none;
    width:650px;
    height:75px;
    /*        margin-top:-8px;*/
  }
  #content{
    height:400px;
  }
  .iconCause{
    float:left;
    width:75px;
    height:75px;
  }
  .projectPosition{
    font-size: 25px;
    margin-left:10px;
    padding:0;
    text-transform: uppercase;
    color:#111111;
  }
  .projectOrg{
    font-size:14px;
    font-style: italic;
    margin-left:10px;
    padding:0;
    color:#111111;
  }
  .projectHeadline{
    font-size: 10px;
    margin-left:10px;
    color:#111111;
  }
  .requirementsWarning{
    margin-left:10px;
    color:#111111;
  }
  .rightHandSideStuff i{
    vertical-align:middle;
  }
  .projectDistance,
  .projectTime,
  .projectDate{
    font-size: .8em;
    line-height:1.4em;
    color:#111111;
  }

  .projectDescription{
    height:100%;
    width:50%;
    display:inline-block;
    overflow: auto;
    background-color: #eeeeee;
    margin-left:-15px;
  }
  .projectDescriptionTitle{
    width:100%;
    height:18px;
    font-size:.9em;
    font-color:#111111;
    background-color: #cccccc;
  }
  .additionalInfoBox{
    float:right;
    width:50%;
    padding:0;
  }
  .projectLocation, 
  .projectContact,
  .projectSkills,
  .projectCause,
  .projectReqs{
  }
  .accordionTitle{
    font-size:14px;
    font-color:#111111;
    background-color: #cccccc;
  }
  .dropdownTitle{
    margin-top:5px;
    font-size: 14px;
  }
  #quickSearch{
    visibility: hidden;
    margin-left: 250px;
    margin-top: 5px;
  }
  #quickSearch_form{
  }
  #quickSearch_selects{
    margin-left: 15px;
  }
  #rightsideinfo{
    width:690px;
  }

  /* end css from form login*/
  </style>

  <script>

  var skills = null;
  var checkin = null;

  var Months = new Array();
  Months['01'] = 'Jan';
  Months['02'] = 'Feb';
  Months['03'] = 'Mar';
  Months['04'] = 'Apr';
  Months['05'] = 'May';
  Months['06'] = 'Jun';
  Months['07'] = 'Jul';
  Months['08'] = 'Aug';
  Months['09'] = 'Sep';
  Months['10'] = 'Oct';
  Months['11'] = 'Nov';
  Months['12'] = 'Dec';

  function showQuickSearchForm() {
    $('#quickSearch_form').css('visibility', 'visible');
    $('#quickSearch_performFullSearch').attr('onclick', 'performFullSearch()');
  }

  $(document).ready(function() {

    $('#projectlist').append('<?php echo HTML::image('img/ajax-loader.gif'); ?>');
    
    $.get('dashboardvol/getrecentprojects', function(response) {
      console.log("Upcoming Projects:" + response);
      response = $.parseJSON(response);
          // Change the first upcoming project:
          var r = null;
          var plist = document.getElementById('projectlist');
          for(var i = 0; i < response.length; i++) {
            r = response[i];
            
            // Create the list element
            var li = document.createElement('li');
            if(i == 0) {li.setAttribute('class', 'active')};
            // Create the link
            var link = document.createElement('a');
            link.setAttribute('href','#project'+r.ProjectID);
            link.setAttribute('data-toggle', 'tab');
            // Calendar
            var calendar = document.createElement('div');
            calendar.setAttribute('class', 'calendar');
            // Month
            var month = document.createElement('div');
            month.setAttribute('id', 'month');
            var MonthString = r.StartTime;
              // Strip off other stuff
              MonthString = MonthString.substr(5,2);
              MonthString = Months[MonthString];
              month.innerHTML = MonthString;
            // Day
            var day = document.createElement('div');
            day.setAttribute('id','date');
            var DayString = r.StartTime;
            DayString = DayString.substr(8,2);
            day.innerHTML = DayString;
              // Attach Month and Day to Calendar
              calendar.appendChild(month);
              calendar.appendChild(day);
            // infosection
            var infosection = document.createElement('div');
            infosection.setAttribute('class', 'infosection');
            // project title
            var projecttitle = document.createElement('div');
            projecttitle.setAttribute('id', 'projecttitle');
            projecttitle.innerHTML = r.ProjectName;
            // orgname
            var orgname = document.createElement('div');
            orgname.setAttribute('id', 'orgname');
            orgname.innerHTML = r.orgname;
            // timeline
            var timeline = document.createElement('div');
            timeline.setAttribute('id', 'timeline');
            var StartTime = r.StartTime;
            StartTime = StartTime.substr(11,5);
            var EndTime = r.EndTime;
            EndTime = EndTime.substr(11,5);
            timeline.innerHTML = StartTime + ' - ' + EndTime;
              // Add title and timeline to infosection
              infosection.appendChild(projecttitle);
              infosection.appendChild(orgname);
              infosection.appendChild(timeline);
              
            // append everything to link
            link.appendChild(calendar);
            link.appendChild(infosection);
            
            //append link to li
            li.appendChild(link);
            
            //append li to ul
            plist.appendChild(li);
            
            //--------------------
            
            // get the skills for this project id
            $.ajax({
              type:"GET",
              url: 'dashboardvol/getskills?projectid='+r.ProjectID,
              async: false,
              success: function(response) {
                skills = eval(response);
              },
              dataType: 'json'
            });
            
            var skillsString = '';
            for(var j = 0; j < skills.length; j++) {
              skillsString += skills[j].Description;
              if(skills.length > 1)
                skillsString += ', ';
              //alert(skillsString);
            }
            
            // Now populate the check-in
            $.ajax({
              type: 'GET',
              url: 'dashboardvol/getcheckins?project='+r.ProjectID,
              async: false,
              success: function(response) {
                //alert(repsonse);
                checkin = eval(response);
              },
              dataType: 'json'
            });
            
            var checkinString = '';
            for(var j = 0; j < checkin.length; j++) {
              checkinString += checkin[j].Name;
              if(checkin.length > 1)
                checkinString += ', ';
              //alert(checkinString);
            }

            var startdate = new Date(Date.parse(r.StartTime ));
            var startday=startdate.toLocaleDateString();
            var starttime=startdate.toLocaleTimeString();
            var enddate = new Date(Date.parse(r.EndTime));
            var endday=enddate.toLocaleDateString();
            var endtime=enddate.toLocaleTimeString();
            // Now take care of the tab content
            if(i == 0) {
              $('.tab-content-special').append('<div class="tab-pane active" id="project'+r.ProjectID+'">'+
                '<div style="width: 700px" class="tabbable tabs-left" id="rightsideinfo">'+
                '<ul class="nav nav-tabs">'+
                '<li class="active"><a href="#moreinfo" data-toggle="tab"><?php echo HTML::image("img/PendingGray.png") ?></br>More Info</a></li>'+
                '<li><a href="#roster" data-toggle="tab"><?php echo HTML::image("img/User.png") ?></br>Roster</a></li>'+
                '<li><a href="#deleteproject" data-toggle="tab"><?php echo HTML::image("img/DeleteGray.png") ?></br>Delete Project</a></li>'+
                '</ul>'+
                //'</div>' +
                '<div id="content" class="tab-content">'+
                '<div class="tab-pane active" id="moreinfo">' + 
                '<p> <b>Project Name: </b>' + r.ProjectName + '</p>' +
                '<p> <b>Details: </b>' + r.Details + '</p>' +
                '<p> <b>Headline: </b>' + r.Headline + '</p>' +
                '<p> <b>Address: </b>' + r.Address + '</p>' +
                '<p> <b>Start Time: </b>' + startday +' at ' +starttime +'</p>' +
                '<p> <b>End Time: </b>'+ endday +' at ' +endtime + '</p>' +
                '<p> <b>Total Spots: </b>' + r.Spots + '</p>' +
                '<p> <b>Requirements: </b>' + r.Requirements + '</p>' +
                '<p> <b>Skills Needed: </b>' + skillsString + '</p>' + 
                '</div>' + 
                '<div class="tab-pane" id="roster">' + checkinString + '</div>'+
                '<div class="tab-pane" id="deleteproject">Are you sure you want to <a href="#" onclick="deleteProject(\''+r.ProjectID+'\')">delete</a> this project?</div>'+
                '</div>');
            }
            else{
              $('.tab-content-special').append('<div class="tab-pane active" id="project'+r.ProjectID+'">'+
                '<div style="width: 700px" class="tabbable tabs-left" id="rightsideinfo">'+
                '<ul class="nav nav-tabs">'+
                '<li class="active"><a href="#moreinfo'+i+'" data-toggle="tab"><?php echo HTML::image("img/PendingGray.png") ?></br>More Info</a></li>'+
                '<li><a href="#roster'+i+'" data-toggle="tab"><?php echo HTML::image("img/User.png") ?></br>Roster</a></li>'+
                '<li><a href="#deleteproject'+i+'" data-toggle="tab"><?php echo HTML::image("img/DeleteGray.png") ?></br>Delete Project</a></li>'+
                '</ul>'+
                            //'</div>'+
                            '<div id="content" class="tab-content">'+
                            '<div class="tab-pane active" id="moreinfo'+i+'">'+
                            '<p> <b>Project Name: </b>' + r.ProjectName + '</p>' +
                            '<p> <b>Details: </b>' + r.Details + '</p>' +
                            '<p> <b>Headline: </b>' + r.Headline + '</p>' +
                            '<p> <b>Address: </b>' + r.Address + '</p>' +
                            '<p> <b>Start Time: </b>' + startday +' at ' +starttime +'</p>' +
                            '<p> <b>End Time: </b>'+ endday +' at ' +endtime + '</p>' +
                            '<p> <b>Total Spots: </b>' + r.Spots + '</p>' +
                            '<p> <b>Requirements: </b>' + r.Requirements + '</p>' +
                            '<p> <b>Skills Needed: </b>' + skillsString + '</p>' + 
                            '</div>' + 
                            '<div class="tab-pane" id="roster'+i+'">' + checkinString + '</div>'+
                            '<div class="tab-pane" id="deleteproject'+i+'">Are you sure you want to <a href="#" onclick="deleteProject(\''+r.ProjectID+'\')">delete</a> this project?</div>'+
                            '</div>');
            }
        }
        
        $('#projectlist:first-child').children("img").remove();
    });
    
      $.ajax({//populate skills
        type:"GET",
        url:"dashboardvol/initoptions",
        data:{
          table : "skills"
        }
      }).done(function(html){
          var obj = jQuery.parseJSON(html); //converts reponse to a JS object
          console.log(obj);
          //alert(JSON.stringify(obj));
          var select = document.createElement('select');
          select.setAttribute('id', 'selects_skills');
          select.setAttribute('name', 'skill');
          for(var i= 0; i < obj.length; i++){ //goes through the response object
              //alert("this is in the loop on iteration " + i);
              var option = document.createElement('option');
              option.innerText = obj[i].description;
              option.Value = obj[i].skillid;
              select.appendChild(option); 
            }
            document.getElementById('quickSearch_selects').appendChild(select);
            document.getElementById('quickSearch_selects').appendChild(document.createElement('br'));
          });
      
      $.ajax({//populate causes
        type:"GET",
        url:"dashboardvol/initoptions",
        data:{
          table : "causes"
        }
      }).done(function(html){
          var obj = jQuery.parseJSON(html); //converts reponse to a JS object
          console.log(obj);
          //alert(JSON.stringify(obj));
          var select = document.createElement('select');
          select.setAttribute('id', 'selects_causes');
          select.setAttribute('name', 'cause');
          for(var i= 0; i < obj.length; i++){ //goes through the response object
              //alert("this is in the loop on iteration " + i);
              var option = document.createElement('option');
              option.innerText = obj[i].description;
              option.Value = obj[i].skillid;
              select.appendChild(option); 
            }
            document.getElementById('quickSearch_selects').appendChild(select);
          });
    });

function deleteProject(projectID) {
  $.get('dashboardvol/deleteProject?project='+projectID, function(response) {
    window.location.reload();
  });
}

function performFullSearch() {
      // var populateData = function(formData, jqForm, options){
      //         return true;
      // }

      var options = { 
        url: 'dashboardvol/getprojects', 
          // beforeSubmit: populateData,
          success: function(html) {
            var obj = jQuery.parseJSON(html);
            $searchcol = $("#search-results");
            if(obj.length == 0){
              $searchcol.html("Sorry, no search results. Please try another term :)");
              return;
            }       
              $searchcol.html('');//clears results 
              //adds map
              var Emap = document.createElement("div");
              Emap.setAttribute("id","map");
              $searchcol.append(Emap);

              var searchlist = document.createElement("ul");
              searchlist.className = "search-result-list";
              $searchcol.append(searchlist);

              for(var i= 0; i < obj.length; i++){
                var curResult = obj[i];
                  listResults(searchlist, curResult, i); //lists results in results div
                }

              // if ($searchcol.find("p.projectPosition").length === 0){ // 
              //     $searchcol.html("Sorry, there are no projects that are " + $('input[name="distance"]:checked')[0].nextSibling.nodeValue + " away from you. Projects are available at greater distances :)");
              // }
            } 
          };

          $.ajax({
            type: "GET",
            url: "dashboardvol/getprojects",
            success: function(html) {
              var obj = jQuery.parseJSON(html);
              $searchcol = $("#search-results");
              if(obj.length == 0){
                $searchcol.html("Sorry, no search results. Please try another term :)");
                return;
              }       
              $searchcol.html('');//clears results 
              //adds map
              var Emap = document.createElement("div");
              Emap.setAttribute("id","map");
              $searchcol.append(Emap);

              var searchlist = document.createElement("ul");
              searchlist.className = "search-result-list";
              $searchcol.append(searchlist);

              for(var i= 0; i < obj.length; i++){
                var curResult = obj[i];
                  listResults(searchlist, curResult, i); //lists results in results div
                }

              // if ($searchcol.find("p.projectPosition").length === 0){ // 
              //     $searchcol.html("Sorry, there are no projects that are " + $('input[name="distance"]:checked')[0].nextSibling.nodeValue + " away from you. Projects are available at greater distances :)");
              // }
            },
            data: $('#searchForm').serialize()
          });
      //will validate later
    }

    function listResults(resultList, result, resultidx){
      var resultLocation = result.location

      //inits map & geocoder object
      var geocoder = new google.maps.Geocoder();  
      var myOptions = {
        zoom: 9,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var map = new google.maps.Map(document.getElementById("map"), myOptions);

      var curDistance = $('input[name="distance"]:checked').val();//gets current distance element
      var param = {//adds address of search result to parameters
        'address': resultLocation
      };

      //plots result on map if within distance
      geocoder.geocode(param, function(results, status) {
       var resultLatLng = results[0].geometry.location;

          if(!curDistance || curDistance === "all"){//if they do have distance defined
            curDistance = Number.MAX_VALUE;
          }
          var curLocLatLng = new google.maps.LatLng(34.0522, -118.2428);//finds LOS ANGELES lat long to base search off of or zipcode inputted 
          map.setCenter(curLocLatLng); 
          var actualDistance = calculateDistance(curLocLatLng, resultLatLng);//calculates distance between the two
          if (actualDistance < curDistance ){//if within distance
            var marker = new google.maps.Marker({
              position: resultLatLng,
              animation: google.maps.Animation.DROP,
            });    
            marker.setMap(map); 

              //initialize event with right data
              eventArray[0].searchList = resultList;//.initCustomEvent( "plotData",true,true, details);
              eventArray[0].curResult = result;
              eventArray[0].i = resultidx;
              window.dispatchEvent(eventArray[0]);
            }                  
          });
}
function calculateDistance(loc1, loc2)
{
  try
  {
          var distance = google.maps.geometry.spherical.computeDistanceBetween (loc1, loc2)/1609.34; //calculates distance in meters
          return distance; //meters to miles conversion
        }
        catch (error)
        {
          alert(error);
        }
      }
      </script>

      <style>
      .projectList{
        width:200px;
      }
      body{
        margin: 0 auto;
      }

      ul {
        float: left;
      }
      </style>

    </head>

    <!--BEGINNING OF BODY-->
    <body>

      <div class="header">
        <?php echo render('elements.header'); ?>
      </div>

      <div class="dashboard">
        <div id="quickSearch">
          <p>Quick Preferences</p>
          <div id="quickSearch_form">
            <form id="searchForm" action= <?php echo URL::to('dashboardvol/getprojects'); ?> method="get">
              <div id="quickSearch_checkboxes">
                <input type="checkbox" name="time_of_week" value="Weekdays">&nbsp; Weekdays<br>
                <input type="checkbox" name="time_of_week" value="Weeknights">&nbsp; Weeknights<br>
                <input type="checkbox" name="time_of_week" value="Weekends">&nbsp; Weekends
              </div>
              <div id="quickSearch_selects"></div>
            </form>
          </div>
          <div id="quickSearch_submitButtons">
            <div class="quickSearchButtons" style="margin-bottom: 5px;" id="quickSearch_performQuickSearch">Save</div>
            <div class="quickSearchButtons" id="quickSearch_performFullSearch">Search</div>
          </div>
        </div>
      </div>

      <div class="subDashboard">
      </div>

      <div class="workspace">
        <?php echo render('upcomingprojectsorg'); ?>
        <div id="#search-results"></div>
      </div>

      <div class="footer">
        <?php echo render('elements.footer'); ?>
      </div>
    </body>
    </html>
    <script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHjf2qKi514z9BBaY5ubhMqTMsMsPa07c&sensor=false&v=3&libraries=geometry">
    </script>