<?php 

   if (isset($_POST["search"])) {

        $city = $_POST["city"];
       if(empty($city)){
        echo "Enter a city name";
       }else {
          $api = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=078dd884f6ef26c9ec3645eb54560cdf";
          $api_key = "078dd884f6ef26c9ec3645eb54560cdf";
          $api_data = file_get_contents($api);
          
          $new_weather = json_decode($api_data, true);
          $description = $new_weather ["weather"][0]["description"];
          $degree = $new_weather["main"]["temp"] - 273;
          $country = $new_weather["sys"]["country"];

       }
   }

?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header-tag">
            <h1>Weather Forecast</h1>
        </div>
        <form action="index.php" method="post">
            <div class="input">
            <input type="text" name="city">
            </div>
            <div class="hero">
                <?php echo "<p>This is the weather report for <span>$city , $country<span/> <p/>" ?>
            </div>
            <div class="desp">
                <?php echo "<p>$description <p/>"?>
            </div>
            <div class="desp">
                <?php echo "<p>$degree degree Celcius</p>" ?>
            </div>
            <div class="btn">
            <button type="submit" name="search" value="search">Enter your City</button>
            </div>
        </form>
    </div>
</body>
</html>

