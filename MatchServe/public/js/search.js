window.onload = populateSearchOptions;



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

    //window.location = "http://localhost/MatchServe/MatchServe/public/search/query/";
}

function distanceHover(x) {
    x.style.height = '200px';
    $(x).append();
}

function distanceOff(x) {
    x.style.height = "auto";
}

function populateSearchOptions(){//so that we dont have to hardcode skills & causes if they change
    

    $(function() {
        $( "#distance-slider" ).slider({
          range: "max",
          min: 1,
          max: 10,
          value: 2,
          slide: function( event, ui ) {
            $( "#amount" ).val( ui.value );
          }
        });
        $( "#amount" ).val( $( "#distance-slider" ).slider( "value" ) );
      });

    //populate skills
    $.ajax({//populate causes
        type:"GET",
        url:"search/initoptions",
        async: true,
        data:{
            table : "skills"
        }
    }).done(function(html){
        var obj = jQuery.parseJSON(html);
        $searchcol = $("#search-specifiers-container").find('li').slice(1,2); //chooses skills column
        // console.log($searchcol);
        $searchcol.append("<br>");
        for(var i= 0; i < obj.length; i++){
            // console.log(obj[i].description);
            $searchcol.append("<input type='checkbox' name='vehicle' value=" +obj[i].description+ ">"+obj[i].description+"<br>");
        }
    });

    $.ajax({//populate causes
        type:"GET",
        url:"search/initoptions",
        async: true,
        data:{
            table : "causes"
        }
    }).done(function(html){
        console.log(html);
        var obj = jQuery.parseJSON(html);
        $searchcol = $("#search-specifiers-container").find('li').slice(2,3); //chooses skills column
        console.log($searchcol);
        $searchcol.append("<br>");
        for(var i= 0; i < obj.length; i++){
            // console.log(obj[i].description);
            $searchcol.append("<input type='checkbox' name='vehicle' value=" +obj[i].description+ ">"+obj[i].description+"<br>");
        }
    });
}