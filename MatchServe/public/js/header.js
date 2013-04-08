function confirmAction()
{
	var response;
     /* $.get('../../../public/header/header', function(response) {
      	alert("weee");
        response = $.parseJSON(response); 
        alert("Response is" + response);
        });*/
    $.ajax({
        type:"get",
        url:"header/header",
       }).done(function(html) {
       console.log("In here");
        });   
	alert("booyah!");
}