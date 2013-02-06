<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" charset="utf-8">
        <title>Match and Serve - Search</title>
        <meta name="viewport" content="width=device-width">
        <?php echo Asset::container('search')->scripts(); ?>   
        <?php echo Asset::container('bootstrap')->styles();?>
        <?php echo Asset::scripts();?>
        <?php echo Asset::styles();?>

        <!--SCRIPT TO INITIALIZE THE DOC-->
    </head>

    <body>
        <div class="header">
        <?php echo render('elements.header'); ?>
        </div>

        <div class="dashboard">
            <form id="searchForm" action= <?php echo URL::to('search/getprojects'); ?> method="get">
                <div id="search-container">
                    <form class="navbar-form">
                        <input id="search-query" type="text" name="searchterm" class="zipCodeField" value="search for" onclick="value= ''" onfocus="focusedText(this)" onblur="blurText(this)"/>
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
                <div id="filters-row">a</div>
                <div id="search-results">a</div>
            </div>
        </div>

    <div class="footer">
        <?php echo render('elements.footer'); ?>
    </div>
</body>
</html>