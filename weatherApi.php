<?php

    $weather = "";
    $error = "";

    if (array_key_exists('city', $_GET)) {
        
        $urlContents = @file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&appid=9302103d2f0a3381a5b89add4b253cb7");
        
        
        $weatherArray = json_decode($urlContents, true);

        if ($weatherArray) {

            $weather = "The weather in ".$_GET["city"]." is currently '".$weatherArray['weather'][0]['description']."'.";

            $tempInCelcius = intval($weatherArray['main']['temp'] -273);

            $weather .= " The temperature is ".$tempInCelcius."&deg;C and the wind speed is ".$weatherArray['wind']['speed'].".";

        } else {

            $error = "Could not find city - please try again.";

        }
        
        /*if (
            $weatherArray = json_decode($urlContents = @file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&appid=9302103d2f0a3381a5b89add4b253cb7"), true)
        ) {
            
            $weatherArray = json_decode($urlContents, true);

                $weather = "The weather in ".$_GET["city"]." is currently '".$weatherArray['weather'][0]['description']."'.";

                $tempInCelcius = intval($weatherArray['main']['temp'] -273);

                $weather .= " The temperature is ".$tempInCelcius."&deg;C and the wind speed is ".$weatherArray['wind']['speed'].".";
            
        } else {
            
            $error = "Could not find city - please try again.";
            
        }*/
        
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <title>Weather Scraper</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Hello, world!</title>
    
    <style type="text/css">
      
        html{
            background:url(background.jpg) no-repeat center
                center fixed;
            -webkit-background-size:cover;
            -moz-background-size:cover;
            -o-background-size:cover;
            background-size:cover;
        }
        
        body{
            
            background:none;
            
        }
        
        .container{
            text-align:center;
            margin-top:100px;
            width:450px;
        }
        
        input{
            margin:20px;
        }
        
        #weather{
            margin-top:15px;
        }
        
      
    </style>
      
  </head>
  <body>
      
    <div class="container">
        
        <h1>What's the weather?</h1>
        
        <form>

          <div class="form-group">
            <label for="email">Enter the name of a city.</label>
            <input type="text" class="form-control" id="city" placeholder="Eg. London, Tokyo" name="city" value = "<?php
        
        if (array_key_exists('city', $_GET)) {
        
            echo $_GET['city'];
            
        }
            
        ?> ">
              
          </div>

          <button type="submit" class="btn btn-primary" id="submit">Submit</button>

        </form>
        
        <div id="weather"><?php
            
            if ($weather) {
                
                echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
                
            } else if ($error) {
                
                echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                
            }
            
        ?></div>
        
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
      
    
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      

  </body>
</html>