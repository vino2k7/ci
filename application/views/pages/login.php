<?php if(isset($error)) { echo $error; } ?>
<form name="login" id="login" method="POST" action="" />	
<table width="100%">
<tr>
<td>Username:</td>
<td><input type="text" name="uname" id="uname" value="" /></td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="pword" id="pword" value="" /></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" id="submit" value="Login" /></td>
</tr>
</table>
</form>