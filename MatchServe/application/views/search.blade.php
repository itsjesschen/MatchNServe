<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Match and Serve - Search</title>
        <meta name="viewport" content="width=device-width">
        <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script> 
        <?php echo Asset::scripts(); ?>     
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
                width: 100%;
                list-style: none;
                margin: 0;
                padding: 0;
                -webkit-padding-start: 0;
                -webkit-margin-before: 0;
                -webkit-margin-after: 0;
            }
            
            #search-specifiers-container ul li {
                display: inline-block;
                min-width: 20%;
                border: 1px solid black;
                margin: 0;
                padding: 0;
                background: rgb(181,0,0);
                color: white;
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
                <input id="search-query" type="text" value="search for" onfocus="focusedText(this)" onblur="blurText(this)" />
                <a id="zip-code-show-link" href="javascript:showZipCode()">change zip code</a>
                <input id="zip-code" type="text" value="zip code" onfocus="focusedText(this)" onblur="blurText(this)" />
                <input type="submit" value="Search"/>
<!--                 <input type="submit" value="Search" onclick="validateSearchFields()"/> -->
            </div>
            <br>
            <div id="search-specifiers-container">
                <ul>
                    <form>
                    <li class="search-category" onmouseover="distanceHover(this)" onmouseout="distanceOff(this)">DISTANCE<br>
                            <input type="radio" name="distance" value="1"> &lt 1 mile<br>
                            <input type="radio" name="distance" value="3"> &lt 3 miles<br>
                            <input type="radio" name="distance" value="5"> &lt 5 miles<br>
                            <input type="radio" name="distance" value="10">&lt 10 miles<br>
                            <input type="radio" name="distance" value="all">all distances
                    </li>
                    <li class="search-category" >SKILLS</li>
                    <li class="search-category" >CAUSES</li>
                    <li class="search-category" >AVAILABILITY
                        <p>Weekday</p>
                            <input type='checkbox' name='time[]' value="day-mornings">Mornings<br>
                            <input type='checkbox' name='time[]' value="day-afternoons">Afternoons<br>
                            <input type='checkbox' name='time[]' value="day-evenings">Evenings<br>
                        <p>Weekend</p>
                            <input type='checkbox' name='time[]' value="end-mornings">Mornings<br>
                            <input type='checkbox' name='time[]' value="end-afternoons">Afternoons<br>
                            <input type='checkbox' name='time[]' value="end-evenings">Evenings
                        </ul>
                    </li>

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