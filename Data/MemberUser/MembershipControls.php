<?php

	
class MembershipControls
{

function login(){?>	

	<table  class="form-login" border=0 title="Login">
	
		<td>
			<form action="index.php?login=y" method="POST">
			
			Email<br><input type="text" name="loginemail" ><br>
			Password<br><input type="password" name="loginpass" ><br><br>	
			<input type="submit" value="Login" name="sub"> 			
			
			</form>
		</td>
	
	</table>
<?php } 

function register(){
?>	
<form action="index.php?register=y" method="POST" class="form-registration">
	<table  border=0 title="Registration" width="500">
		<tr>
		
		<td>
			*Email address<br>
			<input type="text"	name="regemail">
			<br><br>
			
			Password:<br>
			<input type="text"	name="regpassword">
			<br><br>
		</td>
		
		<td>
			First name:<br>
			<input type="text"	name="regfname">
			<br><br>
			
			Last name:<br>
			<input type="text"	name="reglname">
			<br><br>
		</td>
		
		<td>
			School:<br>
			<input type="text"	name="regschool">
			<br><br>
			
			State: <br>
			<input type="text"	name="regstate">
			<?php #include("model/states.php"); ?>
			<br><br>
		</td>
		
		<td>
			<input type="submit" value="Register" name="sub">
		
		</td>
		
		
		
		</tr>
	</table>
</form>

<?php } 

function update(){ ?>
	

<script type="text/javascript">
	//This sets the stored value for state, gender, relationship
	$(function(){
	$("#state option[value='<?php echo $user->member->state; ?>']").attr('selected', 'selected');	
	$(".form-update select[name='gender'] option[value='<?php echo $user->member->gender;?>']").attr('selected', 'selected');	
	$(".form-update select[name='relationship'] option[value='<?php echo $user->member->relationship;?>']").attr('selected', 'selected');
	
	});
</script>

<div class="form-update">
	<form action="model/process.php?update=account" method="post">
	
		<table width="100%" border=1>
			<tr>
				<td>*Email address</td>
				<td><input type="text"	name="email" value="<?php echo $user->member->email; ?>"></td>
			</tr>
			
			<tr>		
				<td>Password:</td>
				<td><input type="password"	name="password" value="<?php echo $user->member->password; ?>"></td>
			</tr>		
					
			<tr>
				<td>First name:</td>
				<td><input type="text"	name="fname" value="<?php echo $user->member->firstname;  ?>"></td>
			</tr>	
			
			<tr>
				<td>Last name:</td>
				<td><input type="text"	name="lname" value="<?php echo $user->member->lastname; ?>"></td>
			</tr>			
			
			<tr>
				<td>Gender:</td>
				<td>
					<select name="gender" id="gender">
					<option value="male">male</option>
					<option value="female">female</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td>Relationship status:</td>
				<td>
					<select name="relationship" id="relationship">
					<option value="single">single</option>
					<option value="committed">committed</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td>Birthday</td>
				<td><input type="text"	name="birthday" value="<?php echo $user->member->birthday;  ?>"></td>
			</tr>
					
			<tr>
				<td>School:</td>
				<td><input type="text"	name="school" value="<?php echo $user->member->school; ?>"></td>
			</tr>
			
			<tr>
				<td>State:</td>
				<td><?php #include("model/states.php");?></td>
			</tr>
			
			<tr>
				<td><input type="submit" value="Update" name="sub"></td>
				<td></td>
			</tr>		
						
		
		</table>
	</form>
</div>
	
	
<?php } 


function idxform_page_locater(){ ?>
	
<div class="idx-page-locater">   
	<?php  
	echo "<a href=index.php>Home</a>";
	
	if(isset($_GET['page']))
		{
			echo "><a href=index.php?page=".$_GET['page'].">".$_GET['page']."</a>";
			
			if(isset($_GET['subpage']))
				{
					echo "><a href=index.php?page=".$_GET['page']."&subpage=".$_GET['subpage'].">".$_GET['subpage']."</a>";
				}
				
		}
		
	?>
	</div>
	<br />

	
<?php } 


function idxform_grid($data){
		
	echo "<table>";
	while($row=mysql_fetch_array($data))
	{
		
		echo "<tr><td>".$row[0]."</td>";
		echo "<td>".$row[3]."</td>";
		echo "<td>".$row[1]."</td>";
		echo "<td>".$row[2]."</td></tr>";
	}
	echo "</table>";
	
}

}
?>




