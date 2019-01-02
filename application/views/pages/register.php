<br/>
<span style="color:red;"><?php echo $this->session->flashdata('msg_exists_err');?></span>
<form name="register" id="register" method="POST" action="" />
<table width="100%">
<tr>
<td>First name:</td>
<td><input type="text" name="fname" id="fname" value="" /></td>
</tr>
<tr>
<td>Last name:</td>
<td><input type="text" name="lname" id="lname" value="" /> </td>
</tr>
<tr>
<td>User name:</td>
<td><input type="text" name="uname" id="uname" value="" /> </td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="pword" id="pword" value="" /> </td>
</tr>
<tr>
<td>Email:</td>
<td><input type="text" name="email" id="email" value="" /> </td>
</tr>
<tr>
<td>Mobile:</td>
<td><input type="text" name="mob" id="mob" value="" /> </td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="reg" id="reg" value="Register" /> </td>
</tr>
</table>
