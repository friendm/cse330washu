<html>
<head>
<title>Derp News</title>
<link rel="stylesheet" type="text/css" href="css/global.css" />
</head>
<body>


<div id="header">
<div id="logo"><a href="index.php"><h3>Derp News</h3></a>
<p><a href="funny.php">Funny</a>  -
<a href="tech.php">Tech</a> -
<a href="wtf.php">WTF</a> -
<a href="politics.php">Politics</a> -
<a href="programming.php">Programming</a>
</p>
</div>

<a href="login.html">Login</a>
<a href="scripts/logout.php">Logout</a>
<a href="register.html">Register</a>
<br>
<?php
session_start();
$temp_user = $_SESSION['userid'];
if (empty($_SESSION['userid'])){
	$temp_user = "Guest";
}
echo "Welcome, $temp_user";
?>


</div>
<div id="wrapper">

<!-- New Story Button -->
<p>Add a <a href="newstory.html"> <span class="normallink">New Story</span></a></p>

<!-- Storybox Element -->
<?php
include 'scripts/story_lister_programming.php';
echo "<strong>Derp News. Fair. Balanced. Derp.</strong>";
/*
while($row=mysql_fetch_array($result)){
//var1 is the number of the story, so we associate comments with the correct story
$var1=$row['story_identifier'];
$commentquery= "select * from comments where story_identifier=$var1";
$commentresult=mysql_query($commentquery,$link);
//prints out story name
echo $row['story_type'],":__",$row['story_name'],":",$row['story_content'],"__";

//prints out comments for story
while($row2=mysql_fetch_array($commentresult)){
echo $row2['comment_name'],":",$row2['comment'];
}

}
*/

?>








</div>


</body>
</html>
