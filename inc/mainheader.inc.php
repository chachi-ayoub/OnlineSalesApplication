<div class="homepageheader">
			<div class="signinButton loginButton">
				<div class="uiloginbutton signinButton loginButton" style="margin-right: 40px;">
					<?php
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="../logout.php">LOG OUT</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #fff;" href="../signin.php">SIGN IN</a>';
						}
					 ?>

				</div>
				<div class="uiloginbutton signinButton loginButton" style="">
					<?php
						if ($user!="") {
							echo '<a style="text-decoration: none; color: #fff;" href="../profile.php?uid='.$user.'">Hi '.$uname_db.'</a>';
						}
						else {
							echo '<a style="text-decoration: none; color: #fff;" href="../login.php">USER LOG IN</a>';
						}
					 ?>
				</div>
				<?php
				if (!$user) {
				echo '<div class="uiloginbutton signinButton loginButton back-button" >';
							echo '<a style="text-decoration: none; color: black;" href="../admin/logout.php">ADMIN LOG IN</a>';
				echo '</div>';}
				?>
			</div>
			<div style="float: left; margin: 5px 0px 0px 23px;">
				<a href="../index.php">
					<img style=" height: 70px; margin-top:2px;" src="../image/logo.png">
				</a>
			</div>
			</div>
