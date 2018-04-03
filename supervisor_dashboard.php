<!DOCTYPE html>
<html>
<head>
<title>Supervisor Appointment Management System|</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">


</head>
<body>		
<div class="col-sm-12">
	<div class="row">
		<div class="col-sm-3 side_nav_supervisor bg-secondary">
			<h3 class="supervisor_heading">SUPERVISOR</h3>
			<hr class="horizontal_line">
			<br>
			<ul class="supervisor_menu">
				<li class="supervisor_menu_list"><a href="supervisor_home_page.php" class="supervisor_menu_link "><i class="fa fa-list" aria-hidden="true"></i> APPOINTMENT LIST</a></li>
				<li class="supervisor_menu_list"><a href="supervisor_dashboard.php" class="supervisor_menu_link supervisor_menu_link_active"><i class="fa fa-user" aria-hidden="true"></i> DASHBOARD</a></li>
				<li class="supervisor_menu_list"><a href="supervisor_messages.php" class="supervisor_menu_link"><i class="fa fa-envelope" aria-hidden="true"></i>MESSAGES</a></li>
				
			</ul>

		</div>
		<div class="col-sm-9 body_supervisor">
			<a href="#" class="log_out">Log Out</a>
			<br>
			<br>
			<br>
			<br>
			<div class="col-sm-12 supervisor_schedule">
				<table class="table">
					<h3>APPOINTMENT SCHEDULE</h3>
				  <thead>
				    <tr>
				      <th scope="col">DAYS</th>
				      <th scope="col">TIME</th>
				      <th scope="col">MAXIMUM NUMBER OF STUDENTS PER DAY</th>
				      <th scope="col">SET</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row"><?php $sunday="sunday";echo $sunday; ?></th>
				      <td><select><option>not available</option>
				      			<option>9-11am</option>
				      			<option>12-2pm</option>
				      			<option>3-5pm</option>
				      				</select></td>
				      <td><input type="number" ></td>
				      <td><input type="submit" class="button_for_appoint" value="submit"></td>
				    </tr>
				    <tr>
				      <th scope="row"><?php  $monday = "monday "; echo $monday ;?></th>
				      <td><select><option>not available</option>
				      			<option>9-11am</option>
				      			<option>12-2pm</option>
				      			<option>3-5pm</option>
				      				</select></td>
				      <td><input type="number" ></td>
				      <td><input type="submit" class="button_for_appoint" value="submit"></td>
				    </tr>
				    <tr>
				      <th scope="row"><?php  $tuesday = "tuesday "; echo $tuesday; ?></th>
				      <td><select><option>not available</option>
				      			<option>9-11am</option>
				      			<option>12-2pm</option>
				      			<option>3-5pm</option>
				      				</select></td>
				      <td><input type="number" ></td>
				      <td><input type="submit" class="button_for_appoint" value="submit"></td>
				    </tr>
				     <tr>
				      <th scope="row"><?php $wednesday="wednesday"; echo $wednesday; ?></th>
				      <td><select><option>not available</option>
				      			<option>9-11am</option>
				      			<option>12-2pm</option>
				      			<option>3-5pm</option>
				      				</select></td>
				      <td><input type="number" ></td>
				      <td><input type="submit" class="button_for_appoint" value="submit"></td>
				    </tr>
				     <tr>
				      <th scope="row"><?php $thursday="thursday"; echo $thursday; ?></th>
				      <td><select><option>not available</option>
				      			<option>9-11am</option>
				      			<option>12-2pm</option>
				      			<option>3-5pm</option>
				      				</select></td>
				      <td><input type="number" ></td>
				      <td><input type="submit" class="button_for_appoint" value="submit"></td>
				    </tr>
				     <tr>
				      <th scope="row"><?php $friday="friday"; echo $friday; ?></th>
				      <td><select><option>not available</option>
				      			<option>9-11am</option>
				      			<option>12-2pm</option>
				      			<option>3-5pm</option>
				      				</select></td>
				      <td><input type="number" ></td>
				      <td><input type="submit" class="button_for_appoint" value="submit"></td>
				    </tr>
				     <tr>
				      <th scope="row"><?php $saturday="saturday"; echo $saturday; ?></th>
				      <td><select><option>not available</option>
				      			<option>9-11am</option>
				      			<option>12-2pm</option>
				      			<option>3-5pm</option>
				      				</select></td>
				      <td><input type="number" ></td>
				      <td><input type="submit" class="button_for_appoint" value="submit"></td>
				    </tr>
				  </tbody>
				</table>
				
			</div>
		
			
			
		</div>
		
		

	

	</div>
</div>











<script src="assets/js/vendor/jquery-slim.min.js"></script>
<script>window.jQuery </script>
<script src="assets/js/vendor/popper.min.js"></script>
<script src="js/jquery-1.11.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="assets/js/vendor/holder.min.js"></script>
</body>
</html>