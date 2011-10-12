<?php


$username="wustl_inst";
$password="wustl_pass";
$database="Lab3";

session_start();


$link=mysql_connect('localhost',$username,$password);
if(!$link){
echo "fail to connect";
}


$dbselected=mysql_select_db("Lab3",$link);
if(!$dbselected){
echo "db not selected! ";
}

$sqlquery= "select username,story_identifier,story_type,story_name,story_content from stories where story_type='Tech'";

$result=mysql_query($sqlquery,$link);

if(!$result){
$message="oh shit query is malformed!";
echo $message;
}

while($row=mysql_fetch_array($result)){
//var1 is the number of the story, so we associate comments with the correct story
$var1=$row['story_identifier'];
$commentquery= "select * from comments where story_identifier=$var1";
$commentresult=mysql_query($commentquery,$link);


$temp_name = $row['story_name'];
$temp_type = $row['story_type'];
$temp_content = $row['story_content'];

//check if this is our user's story or if the user is an admin
$elevated = false;
if (strcmp($_SESSION['userid'], $row['username'])==0 || $_SESSION['Admin']){
	$elevated = true;
}
$identS = $row['story_identifier'];
//print out html story
echo "<div class=\"storybox\">
<h2 class=\"storytitle\"><a href=\"one_story.php?id=$identS\">$temp_type- <span class=\"normallink\">$temp_name</span></a></h2>";
if ($elevated){
	echo "
	<br><hr4><a href=\"edit_story.php?val=$identS\"><span class=\"normallink\">Edit </span></a>/<a href=\"scripts/story_delete.php?value1=$identS\"><span class=\"normallink\"> Delete</span></a></hr4>
";
}
echo "<p>$temp_content</p>";

//comments



/*
//prints out story name
echo $row['story_type'],":__",$row['story_name'],":",$row['story_content'],"__";
*/

//prints out comments for story
while($row2=mysql_fetch_array($commentresult)){
//echo $row2['comment_name'],":",$row2['comment'];
$temp_commName = $row2['comment_name'];
$temp_comment = $row2['comment'];
$temp_user = $row2['username'];

//check for elevated privledges on the comments
$elevated_comment = false;
if (strcmp($_SESSION['userid'], $row2['username'])==0 || $_SESSION['Admin']){
        $elevated_comment = true;
}

echo "
<p>
<ul>
<li>$temp_user says:<strong>$temp_commName</strong>";

if ($elevated_comment){
	echo "<a href=\"comment_edit.php?val1=$temp_commName&val2=$temp_comment&val3=$identS\"><span class=\"normallink\">Edit </span></a>/<a href=\"scripts/comment_delete.php?val1=$temp_commName&val2=$temp_comment&val3=$identS\"><span class=\"normallink\"> Delete</span></a>";
}

echo "<br> $temp_comment</li>
</ul>
</p>
";



}
//check if logged in to add comment button
$passvar = $row['story_identifier'];
if (strcmp($_SESSION['userid'], "")!=0){
echo "<a href=\"comment_add.php?var1=$passvar\"><span class=\"normallink\">Add Comment</span></a>";
}
echo "</div>";
}
mysql_close($link);

?>
