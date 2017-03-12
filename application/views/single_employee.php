
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Single Employee</title>
</head>
<body>
	<h3 style="text-align: center; border-bottom: 1px solid #ccc; padding-bottom: 20px;">Employee Info</h3>
	<table align="center">
		<tr>
			<td style="padding: 6px 10px;">Name</td>
			<td style="padding: 6px 10px;">: <?php echo $single_employee_info->full_name; ?></td>
		</tr>
		<tr>
			<td style="padding: 6px 10px;">Email</td>
			<td style="padding: 6px 10px;">: <?php echo $single_employee_info->email; ?></td>
		</tr>
		<tr>
			<td style="padding: 6px 10px;">Designation</td>
			<td style="padding: 6px 10px;">: <?php echo $single_employee_info->designation; ?></td>
		</tr>
		<tr>
			<td style="padding: 6px 10px;">Status</td>
			<td style="padding: 6px 10px;">: <?php echo $single_employee_info->designation==1 ? 'Active' : 'Inactive'; ?></td>
		</tr>
		<tr>
			<td style="padding: 6px 10px;">Profile Image</td>
			<td style="padding: 6px 10px;"> <img src="<?php echo base_url().$single_employee_info->prof_img; ?>" alt="" style="width: 100px; height: 100px;"</td>
		</tr>
	</table>
</body>
</html>