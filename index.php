<?php
include 'functions.php';
if (empty($_SESSION['login']))
	header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="favicon.ico" />
	<link rel="icon" href="favicon.ico" />

	<title>SPK-AHP</title>
	<link href="assets/css/baru-bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/general.css" rel="stylesheet" />
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/highcharts.js"></script>
	<script src="assets/js/highcharts-3d.js"></script>
	<script src="assets/js/exporting.js"></script>
</head>

<body>
	<nav style="background-color: #981A40;" class="navbar navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" style="color: white;" href="?">SPK-AHP</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<?php if ($_SESSION['level'] == 'admin') : ?>
						<li><a href="?m=user"><span class="glyphicon glyphicon-user"></span> User</a></li>
					<?php endif ?>
					<li><a href="?m=alternatif"><span class="glyphicon glyphicon-th"></span> Alternatif</a></li>
					<li><a href="?m=kriteria"><span class="glyphicon glyphicon-th-large"></span> Kriteria</a></li>
					<li><a href="?m=sub"><span class="glyphicon glyphicon-th-list"></span> Subkriteria</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Nilai Bobot<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="?m=rel_kriteria"><span class="glyphicon glyphicon-th-large"></span> Nilai bobot kriteria</a></li>
							<li><a href="?m=rel_sub"><span class="glyphicon glyphicon-user"></span> Nilai bobot subkriteria</a></li>
							<li><a href="?m=rel_alternatif"><span class="glyphicon glyphicon-user"></span> Nilai bobot alternatif</a></li>
						</ul>
					</li>
					<li><a href="?m=hitung"><span class="glyphicon glyphicon-calendar"></span> Perhitungan</a></li>
					<li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
				<div class="navbar-text"></div>
			</div>
			<!--/.nav-collapse -->
		</div>
	</nav>

	<div class="container">
		<?php
		if (file_exists($mod . '.php'))
			include $mod . '.php';
		else
			include 'home.php';
		?>
	</div>
	<footer style="background-color: #981A40;" class="footer bg-primary">
		<div class="container text-center">
			<p>Copyright &copy; <?= date('Y') ?> </p>
		</div>
	</footer>
	<script type="text/javascript">
		$('.form-control').attr('autocomplete', 'off');
	</script>
</body>

</html>