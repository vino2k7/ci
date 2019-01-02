<h1>Welcome <?php echo $this->session->userdata('Username');?></h1>
<?php echo $this->session->flashdata('msg_success');?>
<a href="<?php echo base_url();?>Pages/logout" style="float:right;">Logout</a>
<?php foreach($res as $row) 
{
?>
<form name="profile" id="profile" method="POST" action="<?php echo base_url(); ?>Pages/update" />
<table width="100%">
<tr>
<td>First name:</td>
<td><input type="text" name="fname" id="fname" value="<?php echo $row->fname; ?>" /></td>
</tr>
<tr>
<td>Last name:</td>
<td><input type="text" name="lname" id="lname" value="<?php echo $row->lname;?>" /> </td>
</tr>
<tr>
<td>User name:</td>
<td><input type="text" name="uname" id="uname" value="<?php echo $row->user_name; ?>" /> </td>
</tr>
<tr>
<td>Password:</td>
<td><input type="password" name="pword" id="pword" value="<?php echo $row->pword; ?>" /> </td>
</tr>
<tr>
<td>Email:</td>
<td><input type="text" name="email" id="email" value="<?php echo $row->email; ?>" /> </td>
</tr>
<tr>
<td>Mobile:</td>
<td><input type="text" name="mob" id="mob" value="<?php echo $row->mobile; ?>" /> </td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="upd" id="upd" value="Update" /> </td>
</tr>
</table>
</form>
<?php } ?>