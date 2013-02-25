window.onload = init;

function init(){
    populateAdmin();//dynamically add in admins from db
}

//code which allows the dropdown to remain open when selecting sub items from it
function preventDropdownToggle() {
  $('.dropdown-menu').click(function (e) {
    e.stopPropagation();
  });
}

function populateAdmin(){ //gets all the admins from db and lists them based on the required orgID [TODO: HOW TO INCLUDE ORGID?]
    $.ajax({//populate admins
        type:"GET",
        url:"projectcreation/getAdmin", 
        data:{
            table : "admins"
        }
    }).done(function(html){
        var obj = jQuery.parseJSON(html);
        console.log(obj);
        $options = $("#projectcreation-specifiers-container").find('select'); 
        for(var i= 0; i < obj.length; i++){
             $options.append("<option name='admin[]' value='" +obj[i].name + "''>"+obj[i].name +"</option>");
        }
        
        // $options.insertAfter($searchcol);
        preventDropdownToggle();
    });

}
