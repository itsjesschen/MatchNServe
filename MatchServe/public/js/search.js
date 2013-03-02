window.onload = init;

function init(){
    populateSearchOptions();//dynamically add in causes and skills
    initSearch();// init ajax search

    $('.dropdown-menu').on('click','input', function(){ //init filter click handlers
        if ( $(this).hasClass("filtered")){
            // console.log("unchecked");
            deleteFilter(this);
        }else{
            // console.log("checked");
            addFilter(this);
        }
    });
}

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
    //window.location = "http://localhost/MatchServe/MatchServe/public/search/query/";
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
            $(".filtered[value= '"+item.name+"']").attr("checked",false).removeClass("filtered");//if filter calls this, uncheck dropdown option
        }
    }
    else if ($(item).is('input')){

        if(item.name === "searchterm" || item.name === "zipcode"){
           console.log($(".badge."+item.name+"").remove());//if there is a filter, delete. else dont care
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
        if($filter.children('.distance').length > 0){
            deleteFilter($filter.children('.distance')[0]);
        }
        $filter.prepend("<a class='badge distance' onclick='deleteFilter(this)' name = '"+option.value+"'> &lt" + option.value + " miles &times</a>");
    }else if (option.name === "searchterm" || option.name === "zipcode"){
        $("#filters-row ul.filterlist").append("<a class='badge "+option.name+"' onclick='deleteFilter(this)' name = '"+option.value +"'>" + option.value + " &times</a>");
    }
    else{
        $("#filters-row ul.filterlist").append("<a class='badge' onclick='deleteFilter(this)' name = '"+option.value +"'>" + option.value + " &times</a>");
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
        var obj = jQuery.parseJSON(html);
        $options = $("#search-specifiers-container").find('ul.dropdown-menu').slice(1,2); //chooses causes column
        for(var i= 0; i < obj.length; i++){
             $options.append("<input type='checkbox' class='searchFilters'  name='skill[]' value=" +obj[i].description+ ">"+obj[i].description+"<br>");
        }
        // $options.insertAfter($searchcol);
        preventDropdownToggle();
    });

    $.ajax({//populate causes
        type:"GET",
        url:"search/initoptions",
        data:{
            table : "causes"
        }
    }).done(function(html){
        var obj = jQuery.parseJSON(html);
        $options = $("#search-specifiers-container").find('ul.dropdown-menu').slice(2,3); //chooses causes column
        for(var i= 0; i < obj.length; i++){
             $options.append("<input type='checkbox' class='searchFilters'  name='cause[]' value=" +obj[i].description+ ">"+obj[i].description+"<br>");
        }
        // $options.insertAfter($searchcol);
        preventDropdownToggle();
    });
}

function initSearch(){
    var populateData = function(formData, jqForm, options){
             // //delete existing filters
             // var $filters = $("#filters-row");
             // $filters.html("");
             // //skip first two? search term and zip
             // for(var i = 2; i < formData.length ; i++ ){
             //    //add to filter row
             //    if(formData[i].name === "distance"){
             //        $filters.append("<a class = 'badge' onclick='deleteFilter(this) value = "+ formData[i].value + "> &lt" + formData[i].value + " miles &times</a>");
             //        continue;
             //    }
             //    $filters.append("<a class = 'badge' onclick='deleteFilter(this)'>" + formData[i].value + " &times</a");
             // }
            return true;
    }
    var options = { 
        url: 'search/getprojects', 
        beforeSubmit: populateData,
        success: function(html) {
            // console.log(html);
            var obj = jQuery.parseJSON(html);
            $searchcol = $("#search-results");
            if(obj.length == 0){
                $searchcol.html("Sorry, no search results. Please try another term :)");
                return;
            }       
            var myOptions = {
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var Emap = document.createElement("div");
            Emap.setAttribute("id","map");
            $searchcol.append(Emap);

            var map = new google.maps.Map(document.getElementById("map"), myOptions);
            var searchlist = document.createElement("ul");
            searchlist.className = "search-result-list";
            $searchcol.append(searchlist);
            // $searchcol.append("<ul class = 'search-result-list'>");
            for(var i= 0; i < obj.length; i++){
                // var searchTerm = $('#search-term').val();
                var geocoder = new google.maps.Geocoder();
                var param1 = {
                    'address': obj[i].location
                };
                                
                geocoder.geocode(param1, function(results, status) {
                    var latlng = results[0].geometry.location;
                    map.setCenter(latlng);
                    var marker = new google.maps.Marker({
                        position: results[0].geometry.location,
                        animation: google.maps.Animation.DROP,
                    });    
                marker.setMap(map);
                    
                    //put the coordinates in the input text boxes at the bottom of the page
                });
                searchlist.innerHTML += "<li class='search-item'>\
                    <div class='accordion' id='accordion" +i+"'>\
                        <div class='accordion-group'>\
                            <div class='accordion-heading'>\
                                <a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion" +i+"' href='#collapse" +i+"'>\
                                    <img class='causeImage iconCause' src='img/icon.JPG'/> \
                                    <div class='leftHandSideStuff'>\
                                        <p class='projectPosition'>" +obj[i].name +"</p> \
                                        <p class='projectOrg'>" +obj[i].cause +"</p> \
                                        <p class='projectHeadline'>" +obj[i].headline +"</p> \
                                        <p class='reqsMsg requirementsWarning'>This project contains requirements</p> \
                                    </div> \
                                    <div class='rightHandSideStuff'> \
                                        <p class='projectDistance'><i class='icon-road'></i>" +obj[i].location+ "</p> \
                                        <p class='projectTime'><i class='icon-time'></i>"+obj[i].time+"</p> \
                                        <p class='projectDate'><i class='icon-calendar'></i>"+obj[i].date+"</p> \
                                        <button class='btn btn-success' type='button' class='signUpButton'>Sign Up</button> \
                                    </div> \
                                </a> \
                            </div> \
                            <div id='collapse" +i+"' class='accordion-body collapse'> \
                                <div class='accordion-inner'> \
                                    <p class='projectDescription'>\
                                        <span class='projectDescriptionTitle'>PROJECT DESCRIPTION</span><br> \
                                        "+ obj[i].details+" </p> \
                                    <div class='additionalInfoBox'> \
                                        <p class='accordionTitle'>ADDRESS</p> \
                                        <p class='projectLocation'>1200 Pennsylvania Ave SE, Washington, District of Columbia, 20003</p> \
                                        <p class='accordionTitle'>POSTED BY</p> \
                                        <p class='projectContact'>Anita Singh</p> \
                                        <p class='accordionTitle'>SKILLS NEEDED</p> \
                                        <p class='projectSkills'>"+obj[i].skills+"</p> \
                                        <p class='accordionTitle'>ASSOCIATED CAUSES</p> \
                                        <p class='projectCause'>" +obj[i].cause+"</p> \
                                        <p class='accordionTitle'>REQUIREMENTS NEEDED</p> \
                                        <p class='projectReqs'>Drivers License Needed</p> \
                                    </div> \
                                </div> \
                            </div> \
                        </div>    \
                    </div> \
                </li>";
            }
            // $searchcol.append("</ul>");
        } 
    };

    $('#searchForm').ajaxForm(options); 
    //will validate later
}

function searchFieldDisplay(item){
    if(item.value == item.defaultValue ){//} || item.value =="search for"){
        item.value = "";
    }
}

// function initMap() {
//     var points = {
//         vegas: [36.05178307933835, -115.17840751953122]
//     };
        
//     var myOptions = {
//         zoom: 6,
//         center: new google.maps.LatLng(points["vegas"][0], points["vegas"][1]),
//         mapTypeId: google.maps.MapTypeId.ROADMAP
//     };

//     var map = new google.maps.Map(document.getElementById("map"), myOptions);
// }
    
//     $('#search').click(function() {
//         var searchTerm = $('#search-term').val();
//         var geocoder = new google.maps.Geocoder();
//         var param1 = {
//             'address': searchTerm
//         };
                
//         geocoder.geocode(param1, function(results, status) {
//             var latlng = results[0].geometry.location;
//             map.setCenter(latlng);
            
//             var marker = new google.maps.Marker({
//                 position: results[0].geometry.location
//             });
            
//             marker.setMap(map);
            
//             //put the coordinates in the input text boxes at the bottom of the page
//             $('#lat').val(latlng.lat());
//             $('#lng').val(latlng.lng());
//         });
//     });        
// };