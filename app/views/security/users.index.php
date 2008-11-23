<?php
$icondata[0] = array('security/users/add', 'Add a new user', 'plus.gif' );
$icondata[1] = array('security/groups', 'Manage groups', 'group.gif' );
$icondata[2] = array('security/permissions', 'Change group permissions', 'key2.gif');
$this->load->view('parts/iconbar', $icondata);
?>

<p>Here is a list of the existing users, including those that authenticate via LDAP. Click on a username to edit the user, or click the Delete icon link to delete them.</p>

<?php
if($users != 0){
?>

<table class="list" width="100%" cellpadding="0" cellspacing="0" border="0">
	<col /><col /><col />
	<thead>
	<tr class="heading">
		<td class="h" title="Username">Username</td>
		<td class="h" title="Name">Display name</td>
		<td class="h" title="Name">Group</td>
		<td class="h" title="Lastlogin">Last login</td>
		<td class="h" title="Type">Type</td>
		<td class="h" title="X">&nbsp;</td>
	</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($users as $user) {
	?>
	<!-- <tr class="tr<?php echo ($i & 1) ?>">-->
	<tr class="<?php echo ($i & 1); echo ($user->enabled == 0) ? ' disabled' : NULL; ?>">
		<td class="t"><?php echo anchor('security/users/edit/'.$user->user_id, $user->username) ?></td>
		<td class="m"><?php echo $user->displayname ?>&nbsp;</td>
		<td class="m"><?php echo $user->groupname ?>&nbsp;</td>
		<td class="m"><?php echo mysqlhuman($user->lastlogin, "d/m/Y H:i") ?>&nbsp;</td>
		<td class="m"><?php echo ($user->ldap == 1) ? 'LDAP' : 'Local'; ?></td>
		<td class="d"><?php $this->load->view('parts/delete', array('url' => 'security/users/delete/'.$user->user_id)); ?></td>
	</tr>
	<?php $i++; } ?>
	</tbody>
</table>

<?php
} else {
?>

<p>No users currently exist!</p>

<?php
}
?>