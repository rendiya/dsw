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
<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
     
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
				<p align="center"><strong>This is data sensor warehousing.</strong> You can monitoring weather and temperature in your city</p>
            </div>
		</div>
        
        <div class="row">
			
			<div class="panel">
			<h4 class="panel"></i>Kab. Sleman Temperature Rate Chart</h3>
			</div>
			<div id="graph" class="panel-graph" style="position:relative;">
			<!--
			get data from API
			-->
			  <?php
              $json = file_get_contents('http://api.grupi.org/db/temp');
              $obj = json_decode($json);
              ?>
              <script type="text/javascript">
              $(document).ready(function(){
                var day_data = <?php echo $json; ?>; //ambil dari api.grupi.org/db/sensor
                Morris.Line({
                element: 'graph',
                data: day_data,
                xkey: ['date'],
                ykeys: ['sensor'],
                labels: ['sensor','date'],
                resize: true
                });
                });
              </script>
			</div>
		</div>
	<footer class="row">
<div class="large-12 columns">
<hr>
<div class="row">
<div class="large-6 columns">
<p>© Copyright no one at all. Go to town.</p>
</div>
<div class="large-6 columns">
<ul class="inline-list right">
<li><a href="#">Section 1</a></li>
<li><a href="#">Section 2</a></li>
<li><a href="#">Section 3</a></li>
<li><a href="#">Section 4</a></li>
</ul>
</div>
</div>
</div>
</footer>			
    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
</body>

</html>
