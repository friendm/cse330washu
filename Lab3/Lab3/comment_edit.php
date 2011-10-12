<?php
$temp_commName = $_GET['val1'];
$temp_comment = $_GET['val2'];
$identS = $_GET['val3'];
?>

<html>
<head>
<title>Derp News</title>
<link rel="stylesheet" type="text/css" href="css/global.css" />
</head>
<body>


<div id="header">
<div id="logo"><a href="index.php"><h1>Derp News</h1></a></div>

<a href="login.html">Login</a>
<a href="scripts/logout.php">Logout</a>
<a href="register.html">Register</a>

</div>
<div id="wrapper">

<!-- New Story -->


<div class="new_storybox">

<?php
echo "
<form name=\"input\" action=\"scripts/comment_edit.php?val1=$temp_commName&val2=$temp_comment&val3=$identS\" method=\"post\">
";
?>
				<table align="center">
					  <tr>
 					   <td><label for="name">Comment Title:</label></td>
 					   <td align="left"><input type="text" name="new_title" id="title" value="<?php echo $temp_commName;  ?>"></td>
 					 </tr>
 					 <tr>
 					 	<td><label for="message">Comment:</label></td>
 					 	<td><textarea rows="15" cols="60" wrap="physical" name="new_content"><?php echo $temp_comment;  ?></textarea></td>
 					 </tr>
					<tr>
                                           <td><label for="na">Password (secure!):</label></td>
                                           <td align="left"><input type="password" name="password" id="title"></td>
                                         </tr>
				</table>
				<input type="submit" value="Edit Comment" />
			</form>

</div>








</div>


</body>
</html>
