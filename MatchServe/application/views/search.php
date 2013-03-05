<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" charset="utf-8">
    <title>Match and Serve - Search</title>
    <meta name="viewport" content="width=device-width">
    <?php echo Asset::container('bootstrap')->styles();?>
    <?php echo Asset::scripts();?>
    <?php echo Asset::container('search')->scripts();?>
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

                <!--             <p>(Filters...to be added if time allowed)</p> -->
            </ul>
        </div>
        <div id="search-results">        
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