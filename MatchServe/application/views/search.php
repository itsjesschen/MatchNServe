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
        #search-content{
            height:100px;
        }
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
        /*    border-bottom:1px solid #EEEEEE;*/
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
    #filters-row{
        border-bottom:1px solid #EEEEEE;
        height:20px;
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
        height:510px;
        margin:0 auto;
        background-color:#FFFFFF;
    }

    #search-results {
        height:490px;
        width:1000px;
        overflow:auto;
        background-color:#FFFFFF;
    }

    #search-results li{
        width:965px;
        background-color:#FFFFFF;
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
        float:left;
        width:60%;
        height:75px;
    }
    .rightHandSideStuff{
        float:left;
        width:250px;
        height:75px;
        margin-top:-8px;
    }
    .iconCause{
        float:left;
        width:75px;
        height:75px;
    }
    .projectPosition{
        float:left;
        width:inherit;
        height:30px;
        font-size: 25px;
        margin-left:10px;
        padding:0;
        text-transform: uppercase;
        color:#111111;
    }
    .projectOrg{
        float:left;
        width:75%;
        height:20px;
        font-size:14px;
        font-style: italic;
        margin-top:-8px;
        margin-left:10px;
        padding:0;
        color:#111111;
    }
    .projectHeadline{
        float:left;
        width:75%;
        height:15px;
        font-size: 10px;
        margin-top:-4px;
        margin-left:10px;
        color:#111111;
    }
    .requirementsWarning{
        float:left;
        width:75%;
        height:10px;
        margin-left:10px;
        margin-top:1px;
        color:#111111;
    }
    .projectDistance,
    .projectTime,
    .projectDate{
        height:15px;
        font-size: 12px;
        margin:2px;
        color:#111111;
    }

    .reqsMsg{
        font-size: 8px;
        color:red;
    }
    .projectDescription{
        display: inline-block;
        width:425px;
        height:200px;
        margin-left:-12px;
        overflow: auto;
        background-color: #eeeeee;
    }
    .projectDescriptionTitle{
        height:18px;
        width:425px;
        font-size:14px;
        font-color:#111111;
        background-color: #cccccc;
        margin-left:-12px;
        margin-top:3px;
    }
    .additionalInfoBox{
        display: inline-block;
        float:right;
        width:425px;
        height:220px;
        margin-top:-20px;
        margin-right:5px;
        margin-left:-20px;
        padding:0;
    }
    .projectLocation, 
    .projectContact,
    .projectSkills,
    .projectCause,
    .projectReqs{
        width:475px;
        height:28px;
        margin-left:-60px;
        margin-top:-10px;
    }
    .accordionTitle{
        margin-top:-7px;
        height:18px;
        width:450px;
        margin-left:-60px;
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