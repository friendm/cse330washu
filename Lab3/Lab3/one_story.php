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
<br>
<?php
session_start();
$storyID =mysql_real_escape_string( $_GET['id']);
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
include 'scripts/individual_story.php';


//about to get real up in hur


$sqlquery= "select * from stories where story_identifier=$storyID";


//only one story here
$result=mysql_query($sqlquery,$link);
$row=mysql_fetch_array($result);
$type=$row['story_type'];
$name=$row['story_name'];
$content=$row['story_content'];



//check if this is our user's story or if the user is an admin
$elevated = false;if (strcmp($_SESSION['userid'], $row['username'])==0 || $_SESSION['Admin']){
        $elevated = true;
}
$identS = $row['story_identifier'];//print out html story
echo "<div class=\"storybox\">
<h2 class=\"storytitle\">$type-$name</h2>";
if ($elevated){
        echo "
        <br><hr4><a href=\"edit_story.php?val=$storyID\"><span class=\"normallink\">Edit </span></a>/<a href=\"scripts/story_delete.php?value1=$storyID\"><span class=\"normallink\"> Delete</span></a></hr4>
";
}
echo "<p>$temp_content</p>";


$query2= " select * from comments where story_identifier=$storyID";
$result1=mysql_query($query2,$link);
while($row2=mysql_fetch_array($result1)){ //multiple comments still in this loop
$com_name=$row2['comment_name'];
$comment=$row2['comment'];
$user=$row2['username'];


//check for elevated privledges on the comments
$elevated_comment = false;
if (strcmp($_SESSION['userid'], $row2['username'])==0 || $_SESSION['Admin']){
        $elevated_comment = true;
}

echo "
<p>
<ul>
<li>$user says:<strong>$com_name</strong>";

if ($elevated_comment){
        echo "<a href=\"comment_edit.php?val1=$com_name&val2=$comment&val3=$storyID\"><span class=\"normallink\">Edit </span></a>/<a href=\"scripts/comment_delete.php?val1=$com_name&val2=$comment&val3=$storyID\"><span class=\"normallink\"> Delete</span></a>";
}

echo "<br> $comment</li>
</ul>
</p>
";


}
if(!$result){
$message="oh shit query is malformed!";
echo $message,$sqlquery;
}



mysql_close($link);









//done getting real

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
