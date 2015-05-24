<!DOCTYPE html>
<!--
Beyond the traditional Kuppi to a new level of equality in education

Site developed and updated by UOM CSE 2013 Batch W.A. Anuradha Wickramarachchi!
-->
<html>
    <head>
        <title>University Academic Archive</title>
        <link type="text/css" rel="stylesheet" href="css-styles/style.css"/>
        <!--  -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <!--  -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="jslib/main.js"></script>
        <script src="jslib/search.js"></script>
    </head>
    <body>
    <br/>
    <div class="container" >
        <!-- Normal page layout -->
        <div class="col-sm-8 well">
            <div class="page-header text-center"><h1>University Academic Archive</h1></div>
            <br/>
            <div>
                <img class="img-responsive" src="images/logo.png" alt="Engineering">
            </div>
            <br/>
            <!-- Search bar for searching academic stuff -->
            <form id="search"  class="form-inline" role="form" onsubmit="return false;">
                <div class="form-group">
                    <div class="col-sm-8">
                        <input id="key" type="text" class="form-control" placeholder="Search using keywords" name="key" 
                            maxlength = "45" required>
                    </div>
                </div>
                <button  type="submit" class="btn btn-info" >Search</button>
            </form>
            <!-- Page Layout generation -->
            <br/>
            <div id="make">
                <!-- AUTO GENERATED -->
            </div>
            <!-- End of page layout generation -->
        </div>
        <!-- end of normal poge layout -->
        <!-- Side bar layout -->
        <div class="col-sm-4" >
            <div class="well">
                <div class="page-header text-center"><h1 class="trans">_</h1></div>
                <br/>
                <div>
                    <img class="img-responsive" src="images/feedback.png">
                </div>
                <br/>
                    <p class="text-justify">
                        We highly appreciate your feedback for the continuity of our page and its content. 
                        Also you are more than welcome to add links to the archive which will later be added to the site
                        after being reviewed.
                    </p>
                    <br/>
                    <br/>
                    <br/>
                    <p>
                        Click the below icons to proceed :)
                    </p>  
                
                    <br/>
                    <br/>
                <div id="para">
                    <p class="text-center">
                        <a href="feedback/"  type="button" class="btn btn-info btn-block">Feedback</a>
                        <br/>
                        <a type="button" class="btn btn-info btn-block" onclick="alert('This will be available soon')">Upload a link</a>
                    </p>
                </div>
            </div>
            <div class="text-center">
                <footer>&copy Aca-Archive 2015</footer> 
                <br/>
            </div>
        </div>
    </div>    
    </body>
</html>
