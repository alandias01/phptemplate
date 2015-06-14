
<div  class="ui-widget">Welcome visitor</div>


<br />
<button id="form-login-button" class="">Login</button>
<button id="form-registration-button">Register</button>
<?php

echo $_POST['logoutbutton'];
$mc = new MembershipControls();

$mc->login();
$mc->register();

?>
	


























