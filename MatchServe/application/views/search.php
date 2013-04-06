<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" charset="utf-8">
    <title>Match and Serve - Search</title>
    <meta name="viewport" content="width=device-width">
    <?php echo Asset::container('bootstrap')->styles();?>
    <?php echo Asset::scripts();?>
    <?php echo Asset::container('search')->scripts();?>
    <?php echo Asset::container('login')->scripts();?>
    <?php echo Asset::styles();?> 

    <style>
    /*If adding css, please designate which file it belongs to by wrapping it in a comment block*/

    /*search.php START*/

    body {
        margin: 0;
        padding: 0;
    }

    #wrapper{
        width:100%;
        height:auto;
        text-align:center;
        left:50%;
        position:absolute;
        width:1000px;
        min-height:700px;
        margin-left:-500px;
        overflow:hidden;
        padding:10px 0;
    }

    #search-container {
        width:500px;
        text-align: center;
        margin-left: 40px;
        position:absolute;
        margin-top:-42px;
        padding:3px 0 10px;
        background-color:transparent;
        height:40px;
          /*V1 original, don't delete
            margin-top:-35px;
            background-color:#F5A9A9;
            height:45px;*/
            /*    margin-top:19px;*/
    }
    /*HEADER*/
    #search-query {
        width: 30%;
        color: #888;
    }
    #zip-code {
        display: none;
        width: 25%;
    }
    #SearchBttn{
        width:20%;
    }
    #zip-code-show-link{
        width:20%;
        color:#FFFFFF;
    }
    #search-query, 
    #zip-code{
        margin-top:10px;
    }
    /* END HEADER*/
    /*RESULTS*/
    #search-specifiers-container{
        margin-left:-155px;
        margin-top:15px;
        z-index:1;
        color:#EEEEEE;
        width:1000px;
        height:40px;
        padding:5px;
        float:left;
    }
    #filters-row{
        border-bottom:1px solid #EEEEEE;
        height:20px;
    }
    /*    border-bottom:1px solid #EEEEEE;*/
    #map{ 
        height: 300px;
        width:300px;
        float:right;
        margin: 0 10px;
        display:inline-block;
    }
    .search-result-list{
        width:610px;
        height:460px;
        margin:10px;
        overflow: auto;
    }
    #search-specifiers-container a, a:visited{
        color: rgb(181,0,0);
        text-decoration:none;
    }
    #search-specifiers-container li, .dropdown-menu{
        width:200px;
    }   
    #search-specifiers-container .caret{
        border-top-color: rgb(181,0,0);
        border-bottom-color: rgb(181,0,0);
    }

    .search-category{
        display:inline-block;
        border:none;
        font-size: 1.5em;
        font-family: "century gothic";
        padding-top: 5px;
        padding-bottom: 5px;
    }

    #search-content {
        width:1000px;
        margin:0 auto;
        background-color:#FFFFFF;
    }

    #search-results li{
        width:570px;
        background-color:#FFFFFF;
    }
    div p {
        margin:0;
        padding:0;
    }
    #searchForm .subDashboard{
        float:left;
        width:1000px;
        height:40px;
        background-color:transparent;
    }

    #search-specifiers-container .searchFilters{
        padding:5px;
        margin:5px;
    }

    #searchForm{
        margin:0;
        margin-top:-15px;
        margin-left:250px;
        padding:0;
        height:10px;
        width:1000px;
    }
    a.badge:hover {
        background-color:rgb(181,0,0);
    }
    .header .navbar-inverse .navbar-innner{
        background-color: #333333;
        height:20px;
    }
    .dropdown-menu{
        color:#111111;
    }
    .signUpButton{
        margin-top:2px;
    }
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
        width:150px;
        height:75px;
/*        margin-top:-8px;*/
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
    #search-results .accordion
    {
        width:580px;/*remove when bootstrap is fixed*/
    }
    #search-results .accordion-toggle{
        width:560px;/*remove when bootstrap is fixed*/
    }

    .reqsMsg{
        position:absolute;
        bottom:0;
        font-size: 8px;
        color:red;
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
        display: inline-block;
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

/* 

signup css 

*/
.container-login {width: 960px; margin: 0 auto; overflow: hidden;}

#content {  float: left; width: 100%;}

.post { margin: 0 auto; padding-bottom: 50px; float: left; width: 960px; }

.btn-sign {
    width:460px;
    margin-bottom:20px;
    margin:0 auto;
    padding:20px;
    border-radius:5px;
    background: -moz-linear-gradient(center top, #00c6ff, #018eb6);
    background: -webkit-gradient(linear, left top, left bottom, from(#00c6ff), to(#018eb6));
    background:  -o-linear-gradient(top, #00c6ff, #018eb6);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#00c6ff', EndColorStr='#018eb6');
    text-align:center;
    font-size:36px;
    color:#fff;
    text-transform:uppercase;
}

.btn-sign a { color:#fff; text-shadow:0 1px 2px #161616; }

#mask {
    display: none;
    background: #000; 
    position: fixed; left: 0; top: 0; 
    z-index: 10;
    width: 100%; height: 100%;
    opacity: 0.8;
    z-index: 999;
}

.login-popup{
    display:none;
    background: #333;
    padding: 10px;  
    border: 2px solid #ddd;
    float: left;
    font-size: 1.2em;
    position: fixed;
    top: 50%; left: 50%;
    z-index: 99999;
    box-shadow: 0px 0px 20px #999;
    -moz-box-shadow: 0px 0px 20px #999; /* Firefox */
    -webkit-box-shadow: 0px 0px 20px #999; /* Safari, Chrome */
    border-radius:3px 3px 3px 3px;
    -moz-border-radius: 3px; /* Firefox */
    -webkit-border-radius: 3px; /* Safari, Chrome */
}

img.btn_close {
    float: right; 
    margin: -28px -28px 28px 28px;
}

.button { 
    background: -moz-linear-gradient(center top, #f3f3f3, #dddddd);
    background: -webkit-gradient(linear, left top, left bottom, from(#f3f3f3), to(#dddddd));
    background:  -o-linear-gradient(top, #f3f3f3, #dddddd);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#f3f3f3', EndColorStr='#dddddd');
    border-color:#000; 
    border-width:1px;
    border-radius:4px 4px 4px 4px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    color:#333;
    cursor:pointer;
    display:inline-block;
    padding:6px 6px 4px;
    margin-top:10px;
    float:right;
    font:12px; 
}

.button:hover { background:#ddd; }
/*end css*/
/* css for form from login */
        form {
        color:gray;
        }
        .infoBoxLeft-login {
            float :left;
            margin-top:20px;
        }
        .stuffInside-login{
            margin-left: 20px;
        }
        .infoBoxRight-login{
            float:right;
            margin-top: 225px;
        }
        #newUser {
        visibility: collapse;
        }
        #bottomLinks {
        font-size:14px;
        }
        .link{
        color:grey;
        font-weight:bold;
        text-decoration:underline;
        }
        #submit
        {
            color:white;
            font-weight:bold;
            padding:10px;
            border:none;
            cursor: pointer;
            background-color:#1BC700;
        }
        #fbbtn {
            width:250px;
            height:40px;
        }
        .fb-icon{
            margin:0 auto;
            padding: 0 50px;
        }
        .error {
            color:red;
            visibility: collapse;
        }
    .loader{/* ajax loader*/
        width: 300px;
        padding: 10px;
        margin : 0 auto;
    }

/* end css from form login*/
    </style>

    <?php if($zip_code != null){
        echo 
        "<script>
        $(document).ready(function(){
            showZipCode();
            populateSearchOptions();
        });
</script>"
;
}?>

</head>
<!-- onclick="value= '<?php if($zip_code != null){echo $zip_code;} else {echo "";}?>'"  -->
<body>
    <div class="header">
        <div id = "cookie" name =<?php echo Cookie::get('name'); ?> ></div>
        <?php echo render('elements.header'); ?>
    </div>
    <form id="searchForm" action= <?php echo URL::to('search/getprojects'); ?> method="get"> 
        <div id="search-container" class="dashboard">
            <input id="search-query" type="text" maxlength="30"name="searchterm" value="search for" defaultValue = "search for" onclick="searchFieldDisplay(this)" onfocus="focusedText(this)" onblur="blurText(this)"/>
            <input id="zip-code" type="text" name="zipcode" 
            value="<?php if($zip_code != null){echo $zip_code;} else {echo "zip code";}?>" 
            onclick="searchFieldDisplay(this)" 
            onfocus="focusedText(this)" maxlength="5" defaultValue = "zip code" onblur="blurText(this)" />
            <button type="submit" id="SearchBttn" class="btn" >Search</button>
            <a id="zip-code-show-link" href="javascript:showZipCode()">change zip code</a>
        </div>
        <div id="search-specifiers-container">
            <ul class="nav nav-pills">
                <li class="dropdown">
                    <a class="search-category dropdown-toggle" data-toggle="dropdown" href="#"> DISTANCE
                        <span class="caret"></span>
                    </a>
                    <ul class = "dropdown-menu">
                        <input type="radio" class="searchFilters" name="distance" value="1"> &lt 1 mile<br>
                        <input type="radio" class="searchFilters" name="distance" value="3"> &lt 3 miles<br>
                        <input type="radio" class="searchFilters" name="distance" value="5"> &lt 5 miles<br>
                        <input type="radio" class="searchFilters" name="distance" value="10">&lt 10 miles<br>
                        <input type="radio" class="searchFilters" name="distance" value="all">all distances
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="search-category dropdown-toggle" data-toggle="dropdown" href="#">SKILLS
                        <span class="caret"></span>
                    </a>
                    <ul class = "dropdown-menu">
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="search-category dropdown-toggle" data-toggle="dropdown" href="#">CAUSES
                        <span class="caret"></span>
                    </a>
                    <ul class = "dropdown-menu">
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="search-category dropdown-toggle" data-toggle="dropdown" href="#">AVAILABILITY
                        <span class="caret"></span>
                    </a>
                    <ul class = "dropdown-menu">
                        <p class="dropdownTitle" class="searchFilters"><strong>WEEKDAYS</strong></p>
                        <input type='checkbox' class="searchFilters" name='time[]' value="day-mornings">   Mornings<br>
                        <input type='checkbox' class="searchFilters" name='time[]' value="day-afternoons">   Afternoons<br>
                        <input type='checkbox' class="searchFilters" name='time[]' value="day-evenings">   Evenings<br>
                        <p class="dropdownTitle" class="searchFilters"><strong>WEEKENDS</strong></p>
                        <input type='checkbox' class="searchFilters" name='time[]' value="end-mornings">   Mornings<br>
                        <input type='checkbox' class="searchFilters" name='time[]' value="end-afternoons">   Afternoons<br>
                        <input type='checkbox' class="searchFilters" name='time[]' value="end-evenings">   Evenings
                    </ul>
                </li><!--end of dropdown-->
            </ul>
        </div>
    </form>
    <div id="search-content" class="workspace">
        <div id="filters-row">
            <ul class = "filterlist">
            </ul>
        </div>
        <div id="search-results">        
        </div>
    </div>
<!-- signup-->
<div class="container-login">
    <div id="content">     
        <div id="login-box" class="login-popup">
            <a href="#" class="close"><img src="img/close_pop.png" class="btn_close" title="Close Window" alt="Close" /></a> 
            <div id = "signUpConfirmation-container"></div>  
            <div name="leftBox" class="infoBoxLeft-login">
                <div class="stuffInside-login">
                <div class = "prompt">Please login or signup to join an opportunity</div>
                <form id="login-form">
                    <table>
                        <tr id="name">
                            <p>USERNAME :</p>
                            <label class='error' id='nameError'></label>
                            <input type="text" class="formElementSpacing" name="userName" id='username' onblur="validateName()">
                        </tr>
                        <tr id="password">
                            <p>PASSWORD:</p>
                            <div id="passwordInput">
                                 <label class='error' id='pass1Error'></label>
                                <input type="password" class="formElementSpacing" name="password" id='password1' onblur="validatePassword()">
                            </div>
                        </tr>
                    </table>
                    <table  id="newUser" >
                        <tr><td>RE-TYPE PASSWORD:</td></tr>
                        <tr><td>
                            <input type="password" class="formElementSpacing" name="newPassword" id='password2'onblur="validateConfirmPassword()"></td>
                            <td><label class='error' id='pass2Error'></label></td>
                        </tr>
                        <tr><td>EMAIL ADDRESS:</td></tr>
                        <tr><td>
                            <input type="text" class="formElementSpacing" name="newEmail" id='email' onblur="validateEmail()"></td>
                            <td><label class='error' id='emailError'></label></td>
                        </tr>
                    </table>
                    
                    <table id="bottomLinks">    
                        <div class="prompt" id="bottomText" >Don't have an account yet? Create an account 
                            <a class="link" href="javascript:newUser()" >here</a>
                        </div>
                                
                        <tr><td id="forgotPassword" class="prompt">Forgot your password? Click 
                            <a class="link" href="javascript:forgotPassword()"> here</a>
                        </td></tr>
                                
                        <tr><td>
                            <input type="submit" class="button" id="submit" name="submit" value="LOGIN" />
                        </td></tr>
                    </table>
                </form>
                </div>
            </div>
<!-- 
            <div class="infoBoxMiddle">
                <?php echo HTML::image('img/orDivider.png', 'Divder') ?>
                </a>
            </div>
            
            <div name = "rightBox" class="infoBoxRight-login">    
                <div class="fb-icon">       
                <a style="padding-left:20px" href="<?php echo URL::to('user/facebooklogin') ?>">
                    <img id='fbbtn' src='img/login-facebook.png'/>
                    </a>
                </div>
            </div> -->

        </div><!-- end id popup-->
    </div> 
</div>
<!-- end of signup-->


    <div class="footer">
        <?php echo render('elements.footer'); ?>
    </div>

</body>
</html>
<script type="text/javascript"   
src="https://maps.googleapis.com/maps/api/js?&sensor=false&v=3&libraries=geometry">
</script>