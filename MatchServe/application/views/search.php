<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" charset="utf-8">
    <title>Match and Serve - Search</title>
    <meta name="viewport" content="width=device-width">
    <?php echo Asset::scripts();?>
    <?php echo Asset::container('search')->scripts();?>
    <?php echo Asset::container('bootstrap')->styles();?>
    <?php echo Asset::styles();?>

    <style>
    .leftHandSideStuff{
        float:left;
        width:700px;
        height:75px;
    }
    #causeImage{
/*        width:100%;
        height:100%;*/
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
    .search-item{
        list-style:none;
    }
    .projectPosition{
        float:left;
        width:600px;
        height:30px;
        font-size: 25px;
        margin-left:10px;
        padding:0;
        text-transform: uppercase;
        color:#111111;
    }
    .projectOrg{
        float:left;
        width:600px;
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
        width:600px;
        height:15px;
        font-size: 10px;
        margin-top:-4px;
        margin-left:10px;
        color:#111111;

    }
    .requirementsWarning{
        float:left;
        width:600px;
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
    #signUpButton{
        margin-top:2px;
    }
    .reqsMsg{
        font-size: 8px;
        color:red;
    }
    .projectDescription{
        display: inline-block;
        width:460px;
        height:200px;
        overflow: auto;
    }
    .projectDescriptionTitle{
        height:20px;
        width:460px;
        font-size:20px;
    }
    .additionalInfoBox{
        display: inline-block;
        float:right;
        width:475px;
        height:220px;
        margin-top:-20px;
        margin-right:5px;
        padding:0;
    }
    .projectLocation{
        width:475px;
        height:35px;
        margin-left:10px;
    }
    .projectContact{
        width:475px;
        height:35px;
        margin-left:10px;
    }
    .projectSkills,
    .projectCause,
    .projectReqs{
        width:475px;
        height:50px;
        margin-left:10px;
    }

    </style>
</head>

<body>
    <div class="header">
        <?php echo render('elements.header'); ?>
    </div>

    <div class="dashboard">
        <form id="searchForm" action= <?php echo URL::to('search/getprojects'); ?> method="get">
            <div id="search-container">
                <form class="navbar-form">
                    <input id="search-query" type="text" name="searchterm" class="zipCodeField" value="<?php if($search_term != null){echo $search_term;} else {echo "search for";}?>" onclick="value= ''" onfocus="focusedText(this)" onblur="blurText(this)"/>
                    <a id="zip-code-show-link" href="javascript:showZipCode()">change zip code</a>
                    <input id="zip-code" type="text" name="zipcode" value="zip code" onfocus="focusedText(this)" onblur="blurText(this)" />
                    <button type="submit" class="btn" >Search</button>
                </form>
            </div>
        </form>
    </div>
    <div class="subDashboard">
        <form id="searchForm" action= <?php echo URL::to('search/getprojects'); ?> method="get">
            <div id="search-specifiers-container">
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <a class="search-category dropdown-toggle" data-toggle="dropdown" href="#">DISTANCE
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
                    <!-- </div> -->
                    <li class="dropdown">
                        <a class="search-category dropdown-toggle" data-toggle="dropdown" href="#">SKILLS
                            <span class="caret"></span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a class="search-category dropdown-toggle" data-toggle="dropdown" href="#">CAUSES
                            <span class="caret"></span>
                        </a>
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
    </div>

    <div class="workspace">
        <div id="search-content">
            <div id="filters-row">
            </div>
            <div id="search-results">
                
            </div>
        </div>
    </div>

    <div class="footer">
        <?php echo render('elements.footer'); ?>
    </div>
</body>
</html>