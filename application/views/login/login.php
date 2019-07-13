<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
<title> Halaman Login Admin </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Login Admin Website OKIF FT-UH"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?= base_url('assets/login/css/style.css') ?>" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Cormorant+SC:300,400,500,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>

<body>
	<div class="padding-all">
		<div class="header">
			<h1>Halaman Login Admin</h1>
		</div>

		<div class="design-w3l">
			<div class="mail-form-agile">
				<form action="<?= site_url('login/cekLogin') ?>" method="POST">
					<input type="text" name="username" placeholder="Username..." required>
					<input type="password"  name="password" class="padding" placeholder="Password..." required=""/>
					<input type="submit" value="Masuk" style="background: #105ac9;">
					<br/>
					<h4 style="color: orange;">
                            <?php
                                $info = $this->session->flashdata('info');
                                if(!empty($info)){
                                            echo $info;
                                }
                            ?>
                    </h4>
				</form>
			</div>
		  <div class="clear"> </div>
		</div>
		
		<div class="footer">
		<p>OKIF FT-UH | Design by  <a href="https://w3layouts.com/" >  w3layouts </a></p>
		</div>
	</div>
</body>
</html>