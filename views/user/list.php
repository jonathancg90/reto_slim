<html>
<head>
	<title></title>
</head>
<body>

	<?php if(isset($flash['message'])): ?>
		<p><?php echo $flash['message'] ?></p>	
	<?php endif; ?>
	<hr>
	<table>
		<tr>
			<th>Email</th>
			<th>Name</th>
			<th>Last Name</th>
		</tr>
		<?php foreach($users as $user) { ?>
		<tr>
			<td><?=$user["email"]?></td>
			<td><?=$user["name"]?></td>
			<td><?=$user["last_name"]?></td>
		</tr>
		<?php } ?>
	</table>
	
<?php ?>
</body>
</html>