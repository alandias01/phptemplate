<div class="menu_top_div">
<ul id="menu_top" >
	
	
	<li ><a href="index.php?page=economy" >Category 1</a>
	
		<ul>
			<li><a href=#>1</a> </li>
			<li><a href=#>2</a> </li>
			
		</ul>
	</li>
	
	<li><a href="index.php?page=government" >Category 2</a>
	
		<ul>
			<li><a href="#">1</a> </li>
			<li><a href="#">2</a></li> 
			
		</ul>
	</li>
	

	
	
	<li><a href="index.php?page=help" >Help</a>
		<ul>
			<li><a href="#">Quick tutorial</a> </li>
			<li><a href="#">Manual</a> </li>
			<li><a href="#">About us</a> </li>
						
		</ul>
	</li>
	
		
	
	<li>
	<?php  //If you are logged in, this will show a logout button, else a login button
	
		if(isset($_SESSION['email']))
		{
			echo "<a href=model/process.php?logout=y>Log out</a>";
		}
		else{echo"<a href=index.php?page=sponsors >Login</a>";}
	?>
		
	
	</li>
	
	
</ul>
<div style="clear: both"></div>

</div> 