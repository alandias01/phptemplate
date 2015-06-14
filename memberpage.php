<div class="ui-widget">
Welcome member	

<input type="submit" class="submit button" name="logoutbutton" onClick="location.href='index.php?logout=y'" value="Log out">
<?php


if (!isset ($_SESSION['email']) && isset($_POST['loginemail'])) {
	
	$user->login($_POST['loginemail'],$_POST['loginpass']);
}

else if (!isset ($_SESSION['email']) && isset($_POST['regemail'])) {
	
	$user->register($_POST['regemail'],$_POST['regpass'],$_POST['regfname'],$_POST['reglname'],$_POST['regschool'],$_POST['regstate']);
}

//$user->register($email, $pass, "alan", "dias", "", "");


#$mc = new MembershipControls();
#$mc->update();



if (isset ($_SESSION['email'])) {
	
	if(!isset($user->member->email)){		
		$user->loaduser($_SESSION['email']);
		}
	
	echo "<br>";
	echo $user->member->email;
	
	echo "<br>";
	echo $user->member->firstname;
	
	echo "<br>";
	echo $user->display_all_users();

}
?>
	</div>


























