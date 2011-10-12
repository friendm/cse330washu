<?php
$passing = $_GET['var1'];
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
<form name=\"input\" action=\"scripts/comment_add.php?var1=$passing\" method=\"post\">
";
?>
				<table align="center">
					  <tr>
 					   <td><label for="name">Comment Title:</label></td>
 					   <td align="left"><input type="text" name="title" id="title"></td>
 					 </tr>
 					 <tr>
 					 	<td><label for="message">Comment:</label></td>
 					 	<td><textarea rows="15" cols="60" wrap="physical" name="content"></textarea></td>
 					 </tr>
					<tr>
                                           <td><label for="na">Password (secure!):</label></td>
                                           <td align="left"><input type="password" name="password" id="title"></td>
                                         </tr>
				</table>
				<input type="submit" value="Post Comment" />
			</form>

</div>








</div>


</body>
</html>
