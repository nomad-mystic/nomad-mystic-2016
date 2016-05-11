<?php
/**
 * Created by PhpStorm.
 * User: endof
 * Date: 4/14/2016
 * Time: 1:56 AM
 */


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Working with APIs</title>
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="lib/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<section>
	<div class="container">
		<h1 class="text-center">Check the Weather in Your City Here.</h1>
		<div class="row">
			<article>
				<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
					<div class="btn-group center-block">
						<label for="city_input">Search for the city of your choice.</label>
						<input type="text" name="city" id="city_input"
						       class="form-control" value=""
						       title="This is for entering the city of your choice" required="required" >

						<label for="state_input">Please Enter Your State</label>
						<input type="text" name="state_input" id="state_input" maxlength="2" class="form-control">

						<button type="button" class="btn btn-default city_search_submit">Click to See Data</button>
						<div class="error"></div>
					</div>
				</div>
			</article>
			<article class="information_box">
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
					<div class="row">
						<div class="col-xs-12 col-sm-12">
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
									<img src="images/clientView/clear.png" class="img-responsive weather_icon" alt="Image">
								</div>
								<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
									<p class="city_info"></p>
									<h2 class="weather">Weather</h2>
									<h2 class="degrees">24&deg;</h2>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<h2 class="humidity">Humidity:</h2>
									<h2 class="wind_speed">Wind Speed:</h2>
									<h2 class="precip_today_string">Precipitation</h2>
									<h2 class="feelslike_c">Feels like this in Celsius:</h2>
									<h2 class="dewpoint">Dewpoint:</h2>
									<h2 class="visibility">Visibility:</h2>
									<h2 class="last_update">Last Update:</h2>
								</div>
							</div><!--end row-->
						</div><!--end col-->
					</div><!--end row-->
				</div><!--end col-->
			</article>
		</div>
	</div><!--container-->
</section>
<section>
	<div class="results"></div>
</section>

<script src="lib/jquery.min.js"></script>
<script src="lib/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
