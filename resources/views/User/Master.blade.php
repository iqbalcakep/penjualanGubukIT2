<!DOCTYPE HTML>
<html>
	<head>
		<title>Penjualan Online</title>

		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">		
		<link href="https://fonts.googleapis.com/css?family=Istok+Web" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/magnific-popup.css">

		<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	</head>

	<body>
		<!-- Wrapper -->
		<section class="head" id="header">
			<div class="wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
                                <header class="header">
                                        <div class="inner">
                                            <!-- Logo -->
                                            <a href="#menu"class="nav-bars">
                                                <img src="assets/images/nav_icon.svg" class="img-responsive" alt="Collapsable Navbar">
                                            </a>
                                            <a href="index.html" class="logo">
                                                <span class="symbol">
                                                    <img src="assets/images/logo2.png" alt="Title" />
                                                </span>
                                                <span class="title">HAI {{$nama}} <br>(<span id="saldo_user">{{ "Rp " . number_format($saldo,2,',','.') }}</span>)</span>
                                            </a>
                                        </div>
                            </header>
							<!-- Menu -->
							<nav id="menu">
								<h2>Menu</h2>
								<ul>
									<li><a href="user">Home</a></li>
									<li><a href="deposit">Deposit Saldo</a></li>
									<li><a href="log_out">Log Out</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Main -->

        <section class="main-body" style="margin-bottom:10%;">
            <div class="container">
                @yield('main')
            </div>
        </section>

		<section class="footer">		
			<footer>
				<div class="container">
					<div class="row">
						<div class="col-sm-8 col-xs-9">
							<p class="right-color">&copy; Copyright 2019. All rights reserved by Iqbalcakep</a></p>
						</div>
						<div class="col-sm-4 col-xs-3" align="right">
							<a href="#" id="back-to-top" class="top text-right" >TOP <i class="fa fa-angle-up" aria-hidden="true"></i> </a>
						</div>
					</div>
				</div>											
			</footer>
		</section>
	<!-- END MAIN -->

	<!-- Scripts -->

    <script src="assets/js/jquery-3.1.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>

	<script src="assets/js/script.js"></script>
	
	<!-- SCRIPT CHECKOUT -->

    @yield('script');
    
	<!--  ===== Scroll to Top ====  -->
	    <script>
			if ($('#back-to-top').length) {
			    $('#back-to-top').on('click', function (e) {
			        e.preventDefault();
			        $('html,body').animate({
			            scrollTop: 0
			        }, 700);
			    });
			}
		</script>
    <!--  ===== END Scroll to Top ====  -->		
	</body>
</html>