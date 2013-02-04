<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Match and Serve - Search</title>
        <meta name="viewport" content="width=device-width">
        <?php echo Asset::scripts(); ?>   
        <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script> 
        <?php echo HTML::style('bootstrap/css/bootstrap.css'); ?> 
        <?php echo HTML::style('bootstrap/css/bootstrap-responsive.css'); ?> 
        {{ HTML::style('laravel/css/style.css') }}
        <style>
            body {
                margin: 0;
                padding: 0;
            }
            
            #search-container {
                text-align: center;
            }
        
            #search-query {
                width: 20%;
                color: #888;
            }
            
            #zip-code {
                display: none;
                color: #888;
            }
            
            #search-specifiers-container {
                text-align: center;
                position: absolute;
                display: block;
                width: 100%;
                z-index: 1;
            }
            
            #search-specifiers-container ul {
/*                width: 100%;*/
                list-style: none;
                margin: 0;
                padding: 0;
                -webkit-padding-start: 0;
                -webkit-margin-before: 0;
                -webkit-margin-after: 0;
            }
            #search-specifiers-container .caret{
                border-top-color: rgb(181,0,0);
                border-bottom-color: rgb(181,0,0);
            }

            #search-specifiers-container li {
                display: inline-block;
                min-width: 20%;
                margin: 0;
                padding: 0;
/*                color: rgb(181,0,0);
                font-size: 1.5em;
                font-family: "century gothic";
                padding-top: 5px;
                padding-bottom: 5px;
                -webkit-transition: 1s all ease-out;*/
            }
            .search-category{
                display:inline-block;
                float:left;
                border:none;
                color: rgb(181,0,0);
                font-size: 1.5em;
                font-family: "century gothic";
                padding-top: 5px;
                padding-bottom: 5px;
                -webkit-transition: 1s all ease-out;
            }
            
            #search-content {
                background: rgb(224,224,224);
                border: 1px solid black;
                padding: 15px;
            }
            
            #search-results {
                border: 1px solid black;
                padding: 10px;
                background: white;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <form id="searchForm" action= <?php echo URL::to('search/getprojects'); ?> method="get">
            <div id="search-container">
                <input id="search-query" type="text" name="searchterm" value="search for" onfocus="focusedText(this)" onblur="blurText(this)" />
                <a id="zip-code-show-link" href="javascript:showZipCode()">change zip code</a>
                <input id="zip-code" type="text" name="zipcode" value="zip code" onfocus="focusedText(this)" onblur="blurText(this)" />
                <input type="submit" value="Search"/>
<!--                 <input type="submit" value="Search" onclick="validateSearchFields()"/> -->
            </div>
            <br>
            <div id="search-specifiers-container">
                <!-- <a class="search-category btn dropdown-toggle" data-toggle="dropdown" onmouseover="distanceHover(this)" onmouseout="distanceOff(this)">DISTANCE<br> -->
                <ul class="nav nav-pills">
                    <div class="dropdown">
                        <li class="search-category dropdown-toggle" data-toggle="dropdown" >DISTANCE
                            <span class="caret"></span>
                        </li>
                        <ul class = "dropdown-menu">
                            <input type="radio" name="distance" value="1"> &lt 1 mile<br>
                            <input type="radio" name="distance" value="3"> &lt 3 miles<br>
                            <input type="radio" name="distance" value="5"> &lt 5 miles<br>
                            <input type="radio" name="distance" value="10">&lt 10 miles<br>
                            <input type="radio" name="distance" value="all">all distances
                        </ul>
                    </div>
                    <div class="dropdown">
                        <li class="search-category dropdown-toggle" data-toggle="dropdown" >SKILLS
                            <span class="caret"></span>
                        </li>
                    </div>
                    <div class="dropdown">
                        <li class="search-category dropdown-toggle" data-toggle="dropdown" >CAUSES
                            <span class="caret"></span>
                        </li>
                    </div>
                    <div class="dropdown">
                        <li class="search-category dropdown-toggle" data-toggle="dropdown" >AVAILABILITY
                            <span class="caret"></span>
                        </li>
                        <ul class = "dropdown-menu">
                            <p>Weekday</p>
                                <input type='checkbox' name='time[]' value="day-mornings">Mornings<br>
                                <input type='checkbox' name='time[]' value="day-afternoons">Afternoons<br>
                                <input type='checkbox' name='time[]' value="day-evenings">Evenings<br>
                            <p>Weekend</p>
                                <input type='checkbox' name='time[]' value="end-mornings">Mornings<br>
                                <input type='checkbox' name='time[]' value="end-afternoons">Afternoons<br>
                                <input type='checkbox' name='time[]' value="end-evenings">Evenings
                        </ul>
                    </div>
                </ul>
            </div>
            </form>
            <br><br>
            <div id="search-content">
                <div id="filters-row">a</div>
                <div id="search-results">a</div>
            </div>
        </div>
    </body>
</html>