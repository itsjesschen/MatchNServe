window.onload = populateSearchOptions;

//code which allows the dropdown to remain open when selecting sub items from it
function preventDropdownToggle() {
  $('.dropdown-menu').click(function (e) {
    e.stopPropagation();
  });
}

function showZipCode() {
    $('#zip-code').show('fast');
    $('#zip-code-show-link').html("hide zip code");
    $('#zip-code-show-link').attr("href","javascript:hideZipCode()");
}
            
function hideZipCode() {
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

    $.ajax({//populate causes
        type:"GET",
        url:"search/findprojects",
        data:{
            table : "causes"
        }
    }).done(function(html){
        console.log(html);
        var obj = jQuery.parseJSON(html);
        $searchcol = $("#search-specifiers-container").find('a.search-category').slice(2,3); //chooses skills column
        console.log($searchcol);
        $searchcol.append("<br>");
        for(var i= 0; i < obj.length; i++){
            // console.log(obj[i].description);
            $searchcol.append("<input type='checkbox' class='searchFilters' name='vehicle' value=" +obj[i].description+ ">"+obj[i].description+"<br>");
        }
    });
    //window.location = "http://localhost/MatchServe/MatchServe/public/search/query/";
}
function distanceHover(x) {
    //I dont hate your stuff pierre...it's that my front-end makes it hard for this to work atm lol
    // x.style.height = '200px';
    // $(x).append();
}

function distanceOff(x) {
    // x.style.height = "auto";
}

function populateSearchOptions(){//so that we dont have to hardcode skills & causes if they change
    $.ajax({//populate skills
        type:"GET",
        url:"search/initoptions",
        async: true,
        data:{
            table : "skills"
        }
    }).done(function(html){
        var obj = jQuery.parseJSON(html);
        $searchcol = $("#search-specifiers-container").find('a.search-category').slice(1,2); //chooses skills column
        $options = $("<ul class = 'dropdown-menu'>");
        $options.insertAfter($searchcol);
        for(var i= 0; i < obj.length; i++){
             $options.append("<input type='checkbox' class='searchFilters'  name='skill[]' value=" +obj[i].description+ ">"+obj[i].description+"<br>");
            // $("<input type='checkbox' name='cause[]' value=" +obj[i].description+ ">"+obj[i].description+"<br>").insertAfter($searchcol);
        }
        $options.append("</ul>");
        //since the request is done asynchronously, we need to recall this function, which binds the clicks to the sub items
        preventDropdownToggle();
    });

    $.ajax({//populate causes
        type:"GET",
        url:"search/initoptions",
        async: true,
        data:{
            table : "causes"
        }
    }).done(function(html){
        var obj = jQuery.parseJSON(html);
        $searchcol = $("#search-specifiers-container").find('a.search-category').slice(2,3); //chooses skills column
        $options = $("<ul class = 'dropdown-menu'>");
        $options.insertAfter($searchcol);
        for(var i= 0; i < obj.length; i++){
             $options.append("<input type='checkbox' class='searchFilters'  name='cause[]' value=" +obj[i].causeid+ ">"+obj[i].description+"<br>");
        }
         $options.append("</ul>");
         //since the request is done asynchronously, we need to recall this function, which binds the clicks to the sub items
         preventDropdownToggle();
    });

    var options = { 
        url: 'search/getprojects', 
        success: function(html) {
        console.log(html);
        var obj = jQuery.parseJSON(html);
        console.log(obj);
        $searchcol = $("#search-results");

        if(obj.length == 0){
        $searchcol.html("Sorry, no search results. Please try another term :)");
            return;
        }        
        $searchcol.html("<ul class = 'search-result-list'>");
        for(var i= 0; i < obj.length; i++){

        $searchcol.append("<li class='search-item'>\
            <div class='accordion' id='accordion" +obj[i].projectid+"'>\
                <div class='accordion-group'>\
                    <div class='accordion-heading'>\
                        <a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion" +obj[i].projectid+"' href='#collapse" +obj[i].projectid+"'>\
                            <div class='leftHandSideStuff'>\
                                <img class='causeImage iconCause' src='img/icon.JPG'/> \
                                <span class='projectPosition'>" +obj[i].name +"</span> \
                                <span class='projectOrg'>" +obj[i].cause +"</span> \
                                <span class='projectHeadline'>" +obj[i].headline +"</span> \
                                <span class='reqsMsg requirementsWarning'>This project contains requirements</span> \
                            </div> \
                            <div class='rightHandSideStuff'> \
                                <p class='projectDistance'><i class='icon-road'></i>" +obj[i].location+ "</p> \
                                <p class='projectTime'><i class='icon-time'></i>"+obj[i].date+"</p> \
                                <p class='projectDate'><i class='icon-calendar'></i>"+obj[i].date+"</p> \
                                <button class='btn btn-success' type='button' id='signUpButton'>Sign Up</button> \
                            </div> \
                        </a> \
                    </div> \
                    <div id='collapse" +obj[i].projectid+"' class='accordion-body collapse'> \
                        <div class='accordion-inner'> \
                            <p class='projectDescriptionTitle'></p> \
                            <p class='projectDescription'>"+ obj[i].details+"</p> \
                            <div class='additionalInfoBox'> \
                                <p class='projectLocation'>1200 Pennsylvania Ave SE, Washington, District of Columbia, 20003</p> \
                                <p class='projectContact'>Anita Singh</p> \
                                <p class='projectSkills'>"+obj[i].skills+"</p> \
                                <p class='projectCause'>" +obj[i].cause+"</p> \
                                <p class='projectReqs'>Drivers License Needed</p> \
                            </div> \
                        </div> \
                    </div> \
                </div>    \
            </div> \
            </li>");

        }
        $searchcol.append("</ul>");
          // $filtersrow = $("filters-row").html();
            // console.log(html);
        } 
    };

    $('#searchForm').ajaxForm(options); 
    //will validate later
}