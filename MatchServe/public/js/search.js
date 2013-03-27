window.onload = init;


var eventArray = new Array();
var resultsArray = [];
var locationsFound =0 ;
var searchVars = {
    eventArray : new Array(),
    resultsArray: [],
    locationsFound : 0
}
function init(){
    populateSearchOptions();//dynamically add in causes and skills
    initSearch();// init ajax search

    $('.dropdown-menu').on('click','input', function(){ //init filter click handlers
        if ( $(this).hasClass("filtered")){ //maps filter to element it points to
            deleteFilter(this);
        }else{
            addFilter(this);
        }
    });
    initSearchResultListener();
}

//code which allows the dropdown to remain open when selecting sub items from it
function preventDropdownToggle() {
  $('.dropdown-menu').click(function (e) {
    e.stopPropagation();
  });
}

function showZipCode() {//animation to show zipcode
    $('#zip-code').show('fast');
    $('#zip-code-show-link').html("hide zip code");
    $('#zip-code-show-link').attr("href","javascript:hideZipCode()");
}
            
function hideZipCode() {//animation to hid zipcode
    $('#zip-code').hide('fast');
    $('#zip-code-show-link').html("change zip code");
    $('#zip-code-show-link').attr("href","javascript:showZipCode()");
}
            
function validateSearchFields() {
    showSearchSpecifiers();
}
            
function showSearchSpecifiers() {
    $('#search-specifiers-container').show('slow');
}
            
function focusedText(item) {
    item.style.color = "#000";
}
            
function blurText(item) {
    item.style.color = "#888";
    if(item.value == ""){
        item.value = item.defaultValue;
        deleteFilter(item);
    }else{
        if($(item).hasClass("filtered")){
            deleteFilter(item);//if there is an item
        }
        addFilter(item);
    }
}

function validateSearchFields() {
    //TODO VALIDATE
    search();
}
function search(){
    //options from distance
    $distance = $("#search-specifiers-container").find('li.search-category').slice(0,1); //chooses skills column
    //options from skills
    $skills = {

    }
    //options from causes
    $causes ={

    }
    //options from time
    $time ={

    }
}

function deleteFilter(item){
    $item = $(item);
    if($item.is('A') ){
        //if filter calls this, remove filter
        item.parentNode.removeChild(item);

        if($item.hasClass("searchterm")){//if it's a search term filter
            var search = document.getElementById('search-query');
            search.value = search.defaultValue;//clear search term field
            $(search).removeClass("filtered");
        }else if($item.hasClass("zipcode")){//if it's a zipcode filter 
            var zip = document.getElementById('zip-code');//clear zip code field
            zip.value = zip.defaultValue;//clear search term field
            $(zip).removeClass("filtered");
        }else { //if it's a regular filter
            //if it's a skill
            $(".filtered[value= '"+item.name+"']").attr("checked",false).removeClass("filtered");//if filter calls this, uncheck dropdown option
            //if it's a cause
        }
    }
    else if ($(item).is('input')){

        if(item.name === "searchterm" || item.name === "zipcode"){
           $(".badge."+item.name+"").remove();//if there is a filter, delete. else dont care
           if(item.value === item.defaultValue){//if there's no new search term, delete filter class
                $(item).removeClass("filtered");
           }
        }else{
            $(".badge[name='"+item.value+"']").remove();//if drop down option calls this, remove filter
            //uncheck dropdown
            $(item).removeClass("filtered").attr("checked",false);
        }
    }
}
function addFilter(option){
    if(option.name === "distance"){
        var $filter = $("#filters-row ul.filterlist");
        if($filter.children('.distance').length > 0){// if there is already a distance filter, delete
            deleteFilter($filter.children('.distance')[0]);
        }
        $filter.prepend("<a class='badge distance' onclick='deleteFilter(this)' name = '"+option.value+"'> &lt" + option.value + " miles &times</a>");//add/replace new distance filter
    }else if (option.name === "searchterm" || option.name === "zipcode"){ //if it's a zipcode or search term ( text item )
        $("#filters-row ul.filterlist").append("<a class='badge "+option.name+"' onclick='deleteFilter(this)' name = '"+option.value +"'>" + option.value + " &times</a>");
    }
    else{// if it's a checkbox
        $("#filters-row ul.filterlist").append("<a class='badge "+option.name.substr(0,5)+"' onclick='deleteFilter(this)' name = '"+option.value +"'>" + option.nextSibling.nodeValue + " &times</a>");
    }
    $(option).addClass("filtered");//on("click", deleteFilter(this));//prop("onclick", 'deleteFilter(this)');
}
function populateSearchOptions(){//so that we dont have to hardcode skills & causes if they change
    $.ajax({//populate skills
        type:"GET",
        url:"search/initoptions",
        data:{
            table : "skills"
        }
    }).done(function(html){
        var obj = jQuery.parseJSON(html); //converts reponse to a JS object
        $options = $("#search-specifiers-container").find('ul.dropdown-menu').slice(1,2); //chooses skills column
        for(var i= 0; i < obj.length; i++){ //goes through the response object 
             $options.append("<input type='checkbox' class='searchFilters'  name='skill[]' value=" +obj[i].skillid+ ">"+obj[i].description+"<br>");//inserts cause 
        }
        preventDropdownToggle();//stays open on click
    });

    $.ajax({//populate causes
        type:"GET",
        url:"search/initoptions",
        data:{
            table : "causes"
        }
    }).done(function(html){
        var obj = jQuery.parseJSON(html); //converts reponse to a JS object
        $options = $("#search-specifiers-container").find('ul.dropdown-menu').slice(2,3); //chooses causes column
        for(var i= 0; i < obj.length; i++){
             $options.append("<input type='checkbox' class='searchFilters'  name='cause[]' value=" +obj[i].causeid+ ">"+obj[i].description+"<br>");//inserts cause 
        }
        preventDropdownToggle();//stays open on click
    });
   
}
function findZip(){

    //find zip location if there
    var zip = document.getElementById("zip-code");
    if(zip.value !== zip.defaultValue){
        var param = {//adds address of search result to parameters
            'address': zip.value
        };
        var geocoder = new google.maps.Geocoder();  
        geocoder.geocode(param, function(results, status) {
        try{
            searchVars.userLoc = results[0].geometry.location;
        }catch(err){
            // console.log('results');
        } 
    });}else{
        searchVars.userLoc = new google.maps.LatLng(34.0522, -118.2428);//finds LOS ANGELES lat long to base search off of or zipcode inputted 
    }

    
}
function initSearch(){
    var options = { 
        url: 'search/getprojects', 
        beforeSubmit: findZip,
        success: function(html) {
            var obj = jQuery.parseJSON(html);
            $searchcol = $("#search-results");
            if(obj.length == 0){
                $searchcol.html("Sorry, no search results. Please try another term :)");
                return;
            }       
            $searchcol.html('');//clears results 

            // var map = new google.maps.Map(document.getElementById("map"), myOptions);
            resultsArray.length = 0;//clears the array
            resultsArray.length = obj.length;//sets array to object's length
            locationsFound = 0; //clears number found
            for(var i= 0; i < obj.length; i++){
                resultsArray[i] = obj[i];
                var curResult = obj[i];
                findDistance(curResult, i); //lists results in results div
            }

            // if ($searchcol.find("p.projectPosition").length === 0){ // 
            //     $searchcol.html("Sorry, there are no projects that are " + $('input[name="distance"]:checked')[0].nextSibling.nodeValue + " away from you. Projects are available at greater distances :)");
            // }
        } 
    };

    $('#searchForm').ajaxForm(options); 
    //will validate later
}

function findDistance( result, resultidx){
    var resultLocation = result.location

    //inits map & geocoder object
    var geocoder = new google.maps.Geocoder();  

    var curDistance = $('input[name="distance"]:checked').val();//gets current distance element
    var param = {//adds address of search result to parameters
            'address': resultLocation
    };
    
    //plots result on map if within distance
    geocoder.geocode(param, function(results, status) {
        try{
            locationsFound++;
            var resultLatLng = results[0].geometry.location;
            var curLocLatLng = searchVars.userLoc;//new google.maps.LatLng(34.0522, -118.2428);//finds LOS ANGELES lat long to base search off of or zipcode inputted 
            var actualDistance = calculateDistance(curLocLatLng, resultLatLng);//calculates distance between the two
            //add distance to object
            resultsArray[resultidx].distance = actualDistance;
            resultsArray[resultidx].LatLng = resultLatLng;
            //once all the results are returned
            if(locationsFound === resultsArray.length){
                window.dispatchEvent(eventArray[0]);
            }  
        }catch(err){
            // console.log('results');
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

function searchFieldDisplay(item){
    if(item.value == item.defaultValue ){//} || item.value =="search for"){
        item.value = "";
    }
}
function initSearchResultListener(){
    //creates plotData event
    eventArray[0]= new CustomEvent("plotAllData");

    //adds function that listens to it
    window.addEventListener ("plotAllData", function(e){ // will be called if result falls within distance
        //iniitalizes map & center
        $searchcol = $("#search-results");
        var Emap = document.createElement("div");
        Emap.setAttribute("id","map");
        $searchcol.append(Emap);
        var myOptions = {
            zoom: 9,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map"), myOptions);
        var curDistance = $('input[name="distance"]:checked').val();//gets current distance element
        var curLocLatLng = searchVars.userLoc;//new google.maps.LatLng(34.0522, -118.2428);//finds LOS ANGELES lat long to base search off of or zipcode inputted 
        map.setCenter(curLocLatLng); 
        if(!curDistance || curDistance === "all"){//if they do have distance defined
            curDistance = Number.MAX_VALUE;
        }

        //sorts by distance
        resultsArray.sort(function(a, b){
            if(a.distance == null){
                return 1;
            }
            if(b.distance == null){//a is not null
                 return -1;
            }
            return a.distance-b.distance //both not null
        });

        var searchlist = document.createElement("ul");
        searchlist.className = "search-result-list";
        $searchcol.append(searchlist);

        //loop through results and see which one is close enough
        for( var i = 0; i < resultsArray.length; i ++){
            var opportunity = resultsArray[i];
            if (opportunity.distance && opportunity.distance < curDistance ){//if within distance
                var marker = new google.maps.Marker({
                position: opportunity.LatLng,
                animation: google.maps.Animation.DROP,
            });    
            marker.setMap(map); 
            //prints out results on page
                    searchlist.innerHTML += "<li class='search-item'>\
                        <div class='accordion' id='accordion" +i+"'>\
                            <div class='accordion-group'>\
                                <div class='accordion-heading'>\
                                    <a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion" +i+"' href='#collapse" +i+"'>\
                                        <img class='causeImage iconCause' src='img/icon.JPG'/> \
                                        <div class='leftHandSideStuff'>\
                                            <p class='projectPosition'>" +opportunity.name +"</p> \
                                            <p class='projectOrg'>" +opportunity.cause +"</p> \
                                            <p class='projectHeadline'>" +opportunity.headline +"</p> \
                                        </div> \
                                        <div class='rightHandSideStuff'> \
                                            <p class='projectDistance'><i class='icon-road'></i>" +Math.round(opportunity.distance*10)/10+ " miles</p> \
                                            <p class='projectTime'><i class='icon-time'></i>"+opportunity.starttime+"</p> \
                                            <p class='projectDate'><i class='icon-calendar'></i>"+opportunity.endtime+"</p> \
                                            <button class='btn btn-success' onClick=signup("+i+") type='button' class='signUpButton'>Sign Up</button> \
                                        </div> \
                                    </a> \
                                </div> \
                                <div id='collapse" +i+"' class='accordion-body collapse'> \
                                    <div class='accordion-inner'> \
                                        <p class='projectDescription'>\
                                            <span class='projectDescriptionTitle'>PROJECT DESCRIPTION</span><br> \
                                            "+ opportunity.details+" </p> \
                                        <div class='additionalInfoBox'> \
                                            <p class='accordionTitle'>ADDRESS</p> \
                                            <p class='projectLocation'>1200 Pennsylvania Ave SE, Washington, District of Columbia, 20003</p> \
                                            <p class='accordionTitle'>POSTED BY</p> \
                                            <p class='projectContact'>Anita Singh</p> \
                                            <p class='accordionTitle'>SKILLS NEEDED</p> \
                                            <p class='projectSkills'>"+opportunity.skills+"</p> \
                                            <p class='accordionTitle'>ASSOCIATED CAUSES</p> \
                                            <p class='projectCause'>" +opportunity.cause+"</p> \
                                        </div> \
                                    </div> \
                                </div> \
                            </div>    \
                        </div> \
                    </li>";
                }
            }
        }, false);
}//end eventlistener

function signup(id){
    var project = resultsArray[id];
    document.createElement("div");
   // console.log(document.cookie);
    var user = document.getElementById("cookie").getAttribute("name");
    console.log(user);
        if(!user){
              alert("Please sign in to do that");           
        }else{
          //console.log("Signing up for project # "+project.pid+"under name: "+user);
           $.ajax({
                type:"POST",
                url:"search/signup",
                data:{
                    uID : user,
                    pID : project.pid
                }
            }).done(function(html) {
                console.log(html);
                if (html !== 0){
                    alert("Signed up Successfully");
                }else{
                    alert("Error Signing Up");
                }
            });
            //if requirements are needed
                   //check for requirements
            //else
                   //show confirmation page and sign up. Send to db that project now has user
            //redirect to signin page
        }
}

//removed requirements stuff 
 //<p class='reqsMsg requirementsWarning'>This project contains requirements</p> \
                                            // <p class='accordionTitle'>REQUIREMENTS NEEDED</p> \
                                            // <p class='projectReqs'>Drivers License Needed</p> \