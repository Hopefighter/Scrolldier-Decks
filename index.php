<?php 

	//error_reporting(~0);
	//ini_set('display_errors', 1);
	
	
	//databases
	require_once("controllers/pdo.php");
	require_once("controllers/accountController.php");
	require_once("controllers/deckController.php");
	require_once("controllers/scrollController.php");
        require_once("controllers/settingsController.php");
	
	//pages
	require_once("controllers/pagehandler.php");
	
	require_once("controllers/structure.php");
	require_once("controllers/texthandler.php");
	
	
	if (!session_start()) {
		session_start();
	}
	
	$deck = new Deck();
	$base = new Structure();
	$formating = new TextHandler();
	$account = new AccountController();
	$ScrollController = new ScrollController();
    $SettingsController = new settingsController();
    $twitch = $SettingsController->getSettingsByType(2);
	
	
	
	$account->page_setup($base);
	//logout
	if ($base->get_var(0) == "logout") {
		$account->logout();
		header('location: /');
	}

	//login
	if (isset($_COOKIE['remember_user'])) {
		if (!isset($_SESSION['ign'])) {
			if($account->login($_COOKIE['scrolldier_username'], $_COOKIE['scrolldier_token'], true, true)){
				$_GET['success'] = "You were automatically logged in as ".$_SESSION['ign'];
			}
		}
	}
	
	if (isset($_POST['login']) && $_POST['login_form'] == "login_form") {
		$remember = isset($_POST['save_pw']) ? true : false;
		
		if ($account->login($_POST['username'], $_POST['password'], $remember, false)) {
			$_GET['success'] = "Login Successful";
		} else {
			$_GET['error'] = "Wrong password or username";
		}
	}
	
	
	if ($base->get_restriction()) {
		if (isset($_SESSION['rank']) && ($_SESSION['rank'] < $base->get_grade())) {
			
		} else {
			header("location: /forbidden");
		}
	}
		
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Agne Ødegaard" />
	<meta name="description" content="Scrolldier is a fansite for the game Scrolls by Mojang, You can find thousends of decks here and many tools to help you enjoy the Scrolls experience." />
	<meta name="application-name" content="Scrolldier" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Apple Device: App-->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	
	<!-- Apple Device: Remove Status bar-->
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	
	<!--	Getting page title-->
	<title><?php echo($base->get_title()); ?></title>
	
	<!--Main css-->
	<link rel="stylesheet" href="/css/main.css" />
	
	<!--Favicon-->
	<!--[if IE]>
		<link rel="shortcut icon" href="/img/ico/iconX32.ico">
	<![endif]-->
	<link rel="icon" href="/img/ico/iconX96.png" />
	
	<!--Font Awesome-->
	<link rel="stylesheet" href="/css/font-awesome.min.css" />
	
	
	<!-- Apple Device: Home Screen icon-->
	<link rel="apple-touch-icon" sizes="76x76" href="/img/apple/iconX76_bg.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="/img/apple/iconX120_bg.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="/img/apple/iconX152_bg.png" />
	
	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!--Chart.js-->
	<script src="/js/min/chart-min.js"></script>
    <script src="/js/min/chartstackedbar-min.js"></script>
	
	<!--jQuery-1.11.1.min-->
	<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
	<script src="/js/min/jquery.js"></script>
	
	<!--Typeahead-->
	<script src="/js/min/typeahead-min.js" type="text/javascript"></script>
	
	<!--Blur-->
	<!--<script src="/js/min/blur.min.js" type="text/javascript"></script>-->
</head>
	<body>
		
<!--	Menu	-->		

<div class="container">
	<div class="nav-bar nav-bar-fixed">
        <div id="pull" class="pull">
            <div class="bar"></div>
        </div>
        <ul class="container" id="nav-bar-ul">
        	<ul class="left">
           <li class="head"></li>
           <?php //fetching each page to display on the menu
           	foreach ($base->pagestructure as $key => $value) {
           		if (isset($value['menu']) && $value['menu'] == true) {
           			if ("/".$base->get_var(0) == $key) {
           				echo("<li class='active'><a href='".$key."'>".$value['name']."</a></li>");
           			} else {
           				echo("<li><a class='' href='".$key."'>".$value['name']."</a></li>");
           			}
           			
           		}
           	} ?>
           </ul>
           <ul class="right">
            <?php if (!isset($_SESSION['ign'])) { ?>
            	<li><a class='' href='#login_box' id="login_btn">Login</a></li>
            	<li><a class='' href='#login_box' id="registarte_btn">Register</a></li>
            <?php } else { ?>	
            	<?php if ($_SESSION['rank'] < 3) {
            		echo("<li><a class='' href='/admin'><i class='icon-".$_SESSION['rank']." small'></i></a></li>");
            	} ?>
            	<li><a class='' href='/user/<?= $_SESSION['ign'] ?>'><?= $_SESSION['ign'] ?></a></li>
            	<li><a class='' href='/logout'>Logout</a></li>
            <?php } ?>
           </ul>
        </ul>
    </div>
</div>
<!--	end Menu	-->	
	
<!-- Login Box-->	
	<div class="tag clearfix hidden" id="login_box">
		<div class="container">
			<form method="post" action="">
				<div class="row">
				<div class="col-8 col-offset-2 col-tab-10 col-tab-offset-1 col-phone-12">
					<div class="form-element">
						<h2><i class="fa fa-unlock"></i> Login to Scrolldier <small class="right hand" id="close_login"><i class="fa fa-times"></i></small></h2>
					</div>
					<div class="col-6">
						<div class="form-element">
							<label for="username">In Game Name</label>
							<input id="username" type="text" name="username" value="" placeholder="In Game Name"/>
						</div>
					</div>
					<div class="col-6">
						<div class="form-element">
							<label for="password">Password</label>
							<input id="password" type="password" name="password" value="" placeholder="Password" />
						</div>
					</div>
					<div class="col-6">
						<div class="form-element">
							<label>
								<input type="checkbox" name="save_pw" value="save" /> Remember me <small>Using Cookies</small>
							</label>
						</div>
					</div>
					<div class="col-6">
						<div class="form-element">
							<label>
								<small><a href="/terms" target="_blank">Terms & Conditions</a></small>
							</label>
						</div>
					</div>
					<div class="col-12">
						<div class="form-element">
							<button type="submit" class="btn" name="login"><i class="fa fa-check"></i> Login</button>
							<input type="hidden" name="login_form" value="login_form" />
							<button type="" class="btn right success" id="reg_box_btn" name="">Register</button>
						</div>
					</div>
					
				</div>
			</div>
			</form>
		</div>
	</div>
<!-- end Login Box-->
<!-- Register Box-->	
	<div class="tag clearfix hidden" id="reg_box">
		<div class="container">
			<div class="row">
				<div class="col-8 col-offset-2 col-tab-10 col-tab-offset-1 col-phone-12">
					<div class="form-element">
						<h2><i class="fa fa-lock"></i> Register on Scrolldier <small class="right hand" id="close_reg"><i class="fa fa-times"></i></small></h2>
					</div>
					<div class="col-6">
						<div class="form-element">
							<label for="username">In Game Name</label>
							<input id="username" type="text" name="" value="" placeholder="In Game Name"/>
						</div>
					</div>
					<div class="col-6">
						<div class="form-element">
							<label for="password">Password</label>
							<input id="password" type="password" name="" value="" placeholder="Password" />
						</div>
					</div>
					<div class="col-6">
						<div class="form-element">
							<label for="mail">E-mail</label>
							<input id="mail" type="text" name="" value="" placeholder="E-mail"/>
						</div>
					</div>
					<div class="col-6">
						<div class="form-element">
							<label for="password">Password Again</label>
							<input id="password" type="password" name="" value="" placeholder="Password Agian" />
						</div>
					</div>
					<div class="col-12">
						<div class="form-element">
							<label>
								<input type="checkbox" name="save_pw" value="save" /> I accept the 
								<a href="/terms" target="_blank">Terms & Conditions</a>
							</label>
						</div>
					</div>
					<div class="col-12">
						<div class="form-element">
							<button type="submit" class="btn success" name="" id="">Register</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- end Register Box-->		
	
<!--	Content	-->
		<?php include($base->get_content()); ?>
<!--	end content	-->

		
<!--// if ($base->get_footer()) {-->
<!--	Footer of the page	-->
		<div class="container clearfix">
			<div class="row">
				<div class="col-12 align-center">
					<div class="col-4 col-tab-12">
						<div class="col-12 tag" id="authserverstatus"></div>
					</div>
					<div class="col-4 col-tab-6 col-phone-12" id="">
						<div class="col-12 tag" id="scrollsingame"></div>
					</div>
					<div class="col-4 col-tab-6 col-phone-12" id="">
						<div class="col-12 tag" id="scrollstoday"></div>
					</div>
				</div>
			</div>
		</div>
<!--	end Footer	-->		
<!-- // }-->

<!-- Dialog box -->
<?php if (isset($_GET['error'])) { ?>
	<div class="container dialog" id="errorcontainer">
		<div class="row ">
			<div class="col-12 tag error">
				<div class="left"><p id="errorMessage"><?=$_GET['error']?></p></div>
				<div class="close"><p id="errorCloseBtn">&times;</p></div>
			</div>
		</div>
	</div>
<?php } ?>
<?php if (isset($_GET['success'])) { ?>
	<div class="container dialog" id="successcontainer">
		<div class="row">
			<div class="col-12 tag success">
				<div class="left"><p id="successMessage"><?=$_GET['success']?></p></div>
				<div class="close"><p id="successCloseBtn">&times;</p></div>
			</div>
		</div>
	</div>
<?php } ?>	

	<div class="container hidden dialog" id="specialmessagecontainer">
		<div class="row">
			<div class="col-12">
				<div id="specialmessage" class="col-12 tag"></div>
			</div>
		</div>
	</div>
<!--end Dialog Box-->
<!--Main Javascript-->
<script src="/js/min/main-min.js" type="text/javascript"></script>	
	</body>
</html>