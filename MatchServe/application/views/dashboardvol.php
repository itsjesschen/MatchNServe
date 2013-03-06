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

  <script>
    function showQuickSearchForm() {
      $('#quickSearch_form').css('visibility', 'visible');
      $('#quickSearch_performFullSearch').attr('onclick', 'performFullSearch()');
    }
    
    $(document).ready(function() {
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
            <div id="quickSearch_selects">
            </div>
          </form>
        </div>
        <div id="quickSearch_submitButtons">
            <div class="quickSearchButtons" style="margin-bottom: 5px;" id="quickSearch_performQuickSearch">Quick Search</div>
            <div class="quickSearchButtons" id="quickSearch_performFullSearch" onclick="showQuickSearchForm()">Full Search</div>
        </div>
    </div>
  </div>

  <div class="subDashboard">
  </div>

  <div class="workspace">
    <div class="tab-content">
      <div class="tab-pane active" id="upcoming">
        <?php echo render('upcomingprojectsorg'); ?>
      </div>
    </div>
    <div id="#search-results">
      
    </div>
  </div>

  <div class="footer">
    <?php echo render('elements.footer'); ?>
  </div>
</body>
</html>
<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHjf2qKi514z9BBaY5ubhMqTMsMsPa07c&sensor=false&v=3&libraries=geometry">
</script>