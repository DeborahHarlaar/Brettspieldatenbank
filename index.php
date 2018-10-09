<?php
	
	$link = mysqli_connect("shareddb-i.hosting.stackcp.net", "brettspiele-33358f86", "qoij0i3hlh", "brettspiele-33358f86");

?>

<!DOCTYPE HTML>
<!--
	Traveler by freehtml5.co
	Twitter: http://twitter.com/fh5co
	URL: http://freehtml5.co
-->
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Brettspieldatenbank</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="gtco-loader">
	</div>
	
	<div id="page">
		<!-- <div class="page-inner"> -->
		<nav class="gtco-nav" role="navigation">
			<div class="gtco-container">
				
				<div class="row">
					<div class="col-sm-4 col-xs-12">
						<div id="gtco-logo"><a href="index.html">Brettspieldatenbank <em>.</em></a></div>
					</div>
					<div class="col-xs-8 text-right menu-1">
						<ul>
							<li><a href="#gtco-header">Unsere Spiele</a></li>
							<li><a href="#gtco-features">So funktioniert's</a></li>
							<li><a href="#gtco-counter">Unsere Statistik</a></li>
							<li><a href="#gtco-footer">Kontakt</a></li>
						</ul>	
					</div>
				</div>
				
			</div>
		</nav>
	
		<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/img_bg_2.jpg)">
			<div class="overlay"></div>
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-left">
						

						<div class="row row-mt-15em">
							<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
								<h1>Du suchst ein neues Spiel für Deinen Spieleabend?</h1>	
							</div>
							<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
								<div class="form-wrap">
									<div class="tab">
										
										<div class="tab-content">
											<div class="tab-content-inner active" data-content="signup">
												<h3>Finde ein Spiel</h3>
												<form action="#games" method="post">
													<div class="row form-group">
														<div class="col-md-12">
															<label for="genre">Genre</label>
															<select name="genre" id="genre" class="form-control">
																<option>Kooperativ</option>
																<option>Kinderspiel</option>
																<option>Partyspiel</option>
																<option>Kartenspiel</option>
																<option>Brettspiel</option>
															</select>
														</div>
													</div>
													<div class="row form-group">
														<div class="col-md-12">
															<label for="spielerzahl">Spielerzahl</label>
															<input type="number" name="spielerzahl" id="spielerzahl" class="form-control" required></input>
														</div>
													</div>

													<div class="row form-group">
														<div class="col-md-12">
															<label for="alter">Alter</label>
															<input type="number" name="alter" id="alter" class="form-control" required></input>
														</div>
													</div>

													<div class="row form-group">
														<div class="col-md-12">
															<input type="submit" class="btn btn-primary btn-block" value="Submit" name="submit"></input>
														</div>
													</div>
												</form>	
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
								
						
					</div>
				</div>
			</div>
		</header>
		
			<div class="gtco-section">
				<div class="gtco-container">
					<div class="row">
						<div id="games" class="col-md-8 col-md-offset-2 text-center gtco-heading">
							<h2>Unsere Spiele</h2>
							<p>Wer kennt es nicht? Ein Spieleabend steht an und ihr wollt nicht schon wieder die selben drei Spiele spielen?! Dann gebt oben eure Daten ein</p>
						</div>
					</div>
					<div class="row">

	<!--Here I need PHP-->
	<?php
		if (isset($_POST['submit'])) {

			$selectedGames = "SELECT * FROM brettspieldatenbank WHERE genre = '".mysqli_real_escape_string($link, $_POST["genre"])."' AND `spielerzahl (min)` <= '".mysqli_real_escape_string($link, $_POST["spielerzahl"])."' AND `spielerzahl (max)` >= '".mysqli_real_escape_string($link, $_POST["spielerzahl"])."' AND `alter` <= '".mysqli_real_escape_string($link, $_POST["alter"])."'";
			$result = mysqli_query($link, $selectedGames) or die(mysqli_error($link));
			//check if result is empty
			if (mysqli_num_rows($result)==0){
				echo '<div class="col-lg-4 col-md-4 col-sm-6">
							<a href="#gtco-header" class="fh5co-card-item">
								<figure>
									<div class="overlay"><i class="ti-plus"></i></div>
									<img src="images/alex-rodriguez-santibanez-257452-unsplash.jpg" alt="Failes" class="img-responsive">
								</figure>
								<div class="fh5co-text">
									<h2>Kein Ergebnis</h2>
									<p>Leider gab es für deine Suche kein Ergebnis!</p>
									<p><span class="btn btn-primary">Neue Suche</span></p>
								</div>
							</a>
						</div>';
			}else{
				//gibt jedes Ergebnis einmal
				while ($row = mysqli_fetch_array($result)) {
					echo '<div class="col-lg-4 col-md-4 col-sm-6">
							<a href="images/beispielbilder/'.$row["bild"].'.jpg" class="fh5co-card-item image-popup">
								<figure>
									<div class="overlay"><i class="ti-plus"></i></div>
									<img src="images/beispielbilder/'.$row["bild"].'.jpg" alt="Image" class="img-responsive">
								</figure>
								<div class="fh5co-text">
									<h2>'.$row["name"].'</h2>
									<p>Für '.$row["spielerzahl (min)"].' bis '.$row["spielerzahl (max)"].' Spieler</p>
									<p><span class="btn btn-primary">'.$row["dauer"].' Minuten</span></p>
								</div>
							</a>
						</div>';
				}
			}
		}
	?>


					</div>
				</div>
			</div>
	
		<div id="gtco-features">
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
						<h2>So funktioniert's</h2>
						<p>Hier findest du einen Überblick über unsere beliebtesten Spiele. Sobald du das Formular abgeschickt hast, werden hier deine Empfehlungen angezeigt.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i>1</i>
							</span>
							<h3>Gebt eure Daten ein</h3>
							<p>Gebt in dem Formular ein, wieviele Spieler ihr seid, aus welcher Kategorie euch interessiert, wie lange das Spiel dauern soll (in Minuten) und wie alt der jüngste Spieler ist. </p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i>2</i>
							</span>
							<h3>Ergebnisse</h3>
							<p>Schaut euch die Ergebnisse an, die zu euren Angaben passen. Es ist was dabei, was euch interessiert? Dann nichts wie los!</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<span class="icon">
								<i>3</i>
							</span>
							<h3>Keine interessanten Ergebnisse?</h3>
							<p>Die angezeigten Ergebnisse interessieren euch nicht? Dann sucht mit den selben Parametern neu, es werden unterschiedliche Ergebnisse angezeigt, oder passt eure Parameter an.</p>
						</div>
					</div>
					

				</div>
			</div>
		</div>

		<div id="gtco-counter" class="gtco-section">
			<div class="gtco-container">

				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
						<h2>Unsere Statistik</h2>
						<p>Hier siehst du, wie viele Spiele es Momentan in unserer Datenbank gibt. Du bist der Meinung, wir sollten eins hinzufügen? Dann kontaktier uns doch.</p>
					</div>
				</div>

				<div class="row">
					
					<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
						<div class="feature-center">
							<span class="counter js-counter" data-from="0" data-to="8" data-speed="5000" data-refresh-interval="50">1</span>
							<span class="counter-label">Kinderspiele</span>

						</div>
					</div>
					<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
						<div class="feature-center">
							<span class="counter js-counter" data-from="0" data-to="15" data-speed="5000" data-refresh-interval="50">1</span>
							<span class="counter-label">Kooperative Spiele</span>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
						<div class="feature-center">
							<span class="counter js-counter" data-from="0" data-to="11" data-speed="5000" data-refresh-interval="50">1</span>
							<span class="counter-label">Solospiele</span>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
						<div class="feature-center">
							<span class="counter js-counter" data-from="0" data-to="22" data-speed="5000" data-refresh-interval="50">1</span>
							<span class="counter-label">Partyspiele</span>
						</div>
					</div>
						
				</div>
			</div>
		</div>

		<footer id="gtco-footer" role="contentinfo">
			<div class="gtco-container">

				<div class="row copyright">
					<div class="col-md-12">
						<p class="pull-left">
							<small class="block">&copy; 2018 Deborah Harlaar. All Rights Reserved.</small> 
							<small class="block">Kontaktiere mich: <a href="mailto:debbi@harlaar.de">debbi@harlar.de</a></small>
							<small class="block">Designed by <a href="https://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small>
						</p>

					</div>
				</div>

			</div>
		</footer>
		<!-- </div> -->

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	
	<!-- Datepicker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	

	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

