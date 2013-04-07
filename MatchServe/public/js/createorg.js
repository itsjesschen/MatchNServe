window.onload = init;

var projectlistid = new Array();
var counter = 1;

function init(){
    populateProjectOptions();//dynamically add in admins from db
}
function populateProjectOptions(){ //gets all the admins from db and lists them based on the required orgID [TODO: HOW TO INCLUDE ORGID?]

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
}