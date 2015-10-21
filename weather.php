<!doctype html>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
  <script src="morris.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.js"></script>
  <script src="lib/example.js"></script>
  <link rel="stylesheet" href="lib/example.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css">
  <link href="css/plugins/morris.css" rel="stylesheet">

<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Sensor Warehousing</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>

  </head>
  <body>
  <?php include '../coba/test.php' ?>
<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="#">Data Sensor Warehousing</a></h1>
    </li>
     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Right Nav Section -->
    <ul class="right">
	  <li class="divider"></li>
      <li class="active"><a href="../coba/index.php">
	  <img src="../coba/img/temp.png" >
	  Temp. Rate
	  </a>
	  </li>
	  <li class="divider"></li>
	  <li class="active"><a href="../coba/weather.php">
	  <img src="../coba/img/weather.png">
	  Weather Forecasting
	  </a>
	  </li>
	  
    </ul>

    <!-- Left Nav Section -->
  </section>
</nav>    
		<div class="row">
			
            <div class="panel">
            </div>
		</div>
		<div class="row">
		<div class="large-6 columns">
		<p align="center"><strong><?php echo $kota;?></strong>
		<br>
		Date : <?php echo date("d-m-Y"); ?>
		<br>
		<?php
			switch ($cuaca) {
				case "Berawan":
					echo '<img src="../coba/img/Berawan.gif"/><br>berawan';
					break;
				case "Cerah":
					echo '<img src="../coba/img/Cerah.gif"/><br>Cerah';
					break;
				case "Cerah Berawan":
					echo '<img src="../coba/img/Cerah_Berawan.gif"/><br>Cerah Berawan';
					break;
				default:
					echo '<img src="../coba/img/Hujan_Ringan.gif"/><br>Hujan Ringan';
				}
				?>
				<br>
				Suhu : <?php echo $suhumin;echo" Celcius-";echo $suhumax;echo" Celcius"; ?>
				</p>
		</div>
		<div class="large-6 columns">
		<p align="center"><strong><?php echo $kota2;?></strong>
		<br>
		Date : <?php
		$datetime = new DateTime('tomorrow');
		echo $datetime->format('d-m-Y');
		?>
		<br>
		<?php
			switch ($cuaca2) {
				case "Berawan":
					echo '<img src="../coba/img/Berawan.gif"/><br>berawan';
					break;
				case "Cerah":
					echo '<img src="../coba/img/Cerah.gif"/><br>Cerah';
					break;
				case "Cerah Berawan":
					echo '<img src="../coba/img/Cerah_Berawan.gif"/><br>Cerah Berawan';
					break;
				default:
					echo '<img src="../coba/img/Hujan_Ringan.gif"/><br>Hujan Ringan';
				}
				?>
				<br>
				Suhu : <?php echo $suhumin2;echo" Celcius-";echo $suhumax2;echo" Celcius"; ?>
				</p>
					
		</div>
		</div>
		
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
