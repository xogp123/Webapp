<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Grade Store</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>



<!--
		# Ex 4 :
		# Check the existence of each parameter using the PHP function 'isset'.
		# Check the blankness of an element in $_POST by comparing it to the empty string.
		# (can also use the element itself as a Boolean test!)
		# if (){
		-->
		<?php
		if ( (!isset($_POST["name"])||$_POST["name"] == "")||
					(!isset($_POST["id"])||$_POST["id"] == "")||
						 (processCheckbox($_POST["course"]) == "")||
							(!isset($_POST["cred_num"])||$_POST["cred_num"] == "")) { ?>
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. <a href="http://localhost/gradestore/gradestore.html">Try again?</a></p>


		<?php }
		elseif (!preg_match('/^[a-z][a-z]$/',$_POST["name"])) { ?>
			<h1>Sorry</h1>
			<p>You didn't fill out name completely. <a href="http://localhost/gradestore/gradestore.html">Try again?</a></p>


		<?php }
		elseif (!preg_match('/^[4|5][0-9]{15}$/',$_POST["cred_num"])) { ?>
			<h1>Sorry</h1>
			<p>You didn't fill out credit number completely. <a href="http://localhost/gradestore/gradestore.html">Try again?</a></p>

		<?php }
		 else { ?>

		<!-- Ex 4 :
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't fill out the form completely. Try again?</p>
		-->

		<?php
		# Ex 5 :
		# Check if the name is composed of alphabets, dash(-), ora single white space.
		# } elseif () {
		?>

		<!-- Ex 5 :
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't provide a valid name. Try again?</p>
		-->

		<?php
		# Ex 5 :
		# Check if the credit card number is composed of exactly 16 digits.
		# Check if the Visa card starts with 4 and MasterCard starts with 5.
		# } elseif () {
		?>

		<!-- Ex 5 :
			Display the below error message :
			<h1>Sorry</h1>
			<p>You didn't provide a valid credit card number. Try again?</p>
		-->

		<?php
		# if all the validation and check are passed
		# } else {
		?>
    <?php
		print_r($_POST["grade"]);
		?>
		<h1>Thanks, looser!</h1>
		<p>Your information has been recorded.</p>

		<!-- Ex 2: display submitted data -->
		<ul>
			<?php $username = $_POST["name"];
			$userid = $_POST["id"];
			$courses = $_POST["course"];
			$grade = $_POST["grade"];
			$cred_num = $_POST["cred_num"];
			$cc = $_POST["cc"];
			?>

			<li>Name: <?= $username ?></li>
			<li>ID: <?= $userid ?></li>
			<!-- use the 'processCheckbox' function to display selected courses -->
			<li>Course: <?= processCheckbox($courses) ?></li>
			<li>Grade: <?= $grade ?></li>
			<li>Credit: <?= $cred_num ?> (<?= $cc ?>)</li>
		</ul>

		<!-- Ex 3 :
			<p>Here are all the loosers who have submitted here:</p> -->
			<p>Here are all the loosers who have submitted here:</p>
		<?php
			$filename = "losers.txt";
			$losers = array($username, $userid, $cred_num, $cc);
			$loser = implode(";",$losers);
			file_put_contents($filename, $loser."\n", FILE_APPEND);
			/* Ex 3:
			 * Save the submitted data to the file 'loosers.txt' in the format of : "name;id;cardnumber;cardtype".
			 * For example, "Scott Lee;20110115238;4300523877775238;visa"
			 */
			 $text = file_get_contents($filename);
		?>

		<!-- Ex 3: Show the complete contents of "loosers.txt".
			 Place the file contents into an HTML <pre> element to preserve whitespace -->

			 <pre><?= $text ?></pre>

		 <?php } ?>

		<?php
			/* Ex 2:
			 * Assume that the argument to this function is array of names for the checkboxes ("cse326", "cse107", "cse603", "cin870")
			 *
			 * The function checks whether the checkbox is selected or not and
			 * collects all the selected checkboxes into a single string with comma separation.
			 * For example, "cse326, cse603, cin870"
			 */
			function processCheckbox($names){
					return implode(", ", $names);
			 }
		?>

	</body>
</html>
