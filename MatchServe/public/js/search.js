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
             $options.append("<input type='checkbox' class='searchFilters'  name='cause[]' value=" +obj[i].description+ ">"+obj[i].description+"<br>");
        }
         $options.append("</ul>");
         //since the request is done asynchronously, we need to recall this function, which binds the clicks to the sub items
         preventDropdownToggle();
    });

    var options = { 
        url: 'search/getprojects', 
        success: function(html) {
            $filtersrow = $("filters-row").html();
            // console.log(html);
        } 
    };

    $('#searchForm').ajaxForm(options); 
    //will validate later
}