

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        
        <meta charset="UTF-8">
        <title>WEATHER API</title>
    </head>
    <style>
        #para1 {
            text-align: center;
            color: red;

        }
    </style>
    <body>
        <meta http-equiv="refresh" content="45">
        <?php

        function handleError($errno, $errstr, $error_file, $error_line) {
            //  echo "<b>Error:</b> [$errno] $errstr - $error_file:$error_line";
            echo "<br />";
            //echo "Terminating PHP Script";
            include 'html2.html';
            include 'html2.html';
            include ' images.html';

           // die();
        }

        //set error handler
        set_error_handler("handleError");

        // try{
       
        /*$query = @unserialize (file_get_contents('http://ip-api.com/php/'));
        if ($query && $query['status'] == 'success') {
            echo 'HELLO, ' . $query['city'] . '!';
           }*/

        

        $jsonfile = file_get_contents("https://api.openweathermap.org/data/2.5/weather?appid=fdfa126ad685ec8b628d3c6ace6d0127&q=australia");
        $jsondata = json_decode($jsonfile);

        $t = $jsondata->main->temp;
        $m = $jsondata->weather[0]->main;
        $p=$jsondata->main->pressure;
        $h=$jsondata->main->humidity;
        // $error = 'Always throw this error';
        // throw new Exception($error);
        // Cod
        // e following an exception is not executed.
        //echo 'Never executed';
        // }catch (Exception $e) {
        // echo 'Caught exception: ',  $e->getMessage(), "\n";
        //}    
        $c = $t - 273.15;
        echo "The present temperature is $c <br> ";        
        echo "The present humidity is $h <br>";
        echo "The present pressure is $p <br>";
        echo "The present climate is $m <br>";
        
      echo "<br>";
      echo "<br>";
      echo "<br>";
      
        if ($m=="Snow"||$m=="Mist"||$m=="Fog"||$m=="Smoke" ) 
        {      
            include 'html2.html';
        }
        else if($m=="Clear Sky"||$m=="Scattered clouds"||$m=="Clouds"||$m=="Clear")
        {
            include 'html3.html';
        }
        else if($m=="Few clouds"||$m=="Broken clouds"||$m=="Shower rain"||$m=="Thunderstorm"||$m=="Rain")
        {
            include 'images.html';
        }
        
        
        ?>
    </body>
   
    </html>
