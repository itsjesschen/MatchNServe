<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Match and Serve - Search</title>
        <meta name="viewport" content="width=device-width">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
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
                display: none;
                text-align: center;
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
        
        <script>
            function showZipCode() {
                $('#zip-code').show('fast');
                $('#zip-code-show-link').html("hide zip code");
                $('#zip-code-show-link').attr("href","javascript:hideZipCode()");
            }
            
            function hideZipCode() {
                $('#zip-code').hide('fast');
                $('#zip-code-show-link').html("change zip code");
                $('#zip-code-show-link').attr("href","javascript:showZipCode()");
            }
            
            function validateSearchFields() {
                showSearchSpecifiers();
            }
            
            function showSearchSpecifiers() {
                $('#search-specifiers-container').show('slow');
            }
            
            function focusedText(item) {
                item.style.color = "#000";
            }
            
            function blurText(item) {
                item.style.color = "#888";
            }
        </script>
    </head>
    <body>
        <div id="wrapper">
            <div id="search-container">
                <input id="search-query" type="text" value="search for" onfocus="focusedText(this)" onblur="blurText(this)" />
                <a id="zip-code-show-link" href="javascript:showZipCode()">change zip code</a>
                <input id="zip-code" type="text" value="zip code" onfocus="focusedText(this)" onblur="blurText(this)" />
                <input type="button" value="Search" onclick="validateSearchFields()"/>
            </div>
            <br>
            <div id="search-specifiers-container">
                <ul>
                    <li>DISTANCE</li>
                    <li>SKILLS</li>
                    <li>CAUSES</li>
                    <li>AVAILABILITY</li>
                </ul>
            </div>
            <div id="search-content">
                <div id="filters-row">a</div>
                <div id="search-results">a</div>
            </div>
        </div>
    </body>
</html>