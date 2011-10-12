<?php
session_start();
$identifier = $_GET['val'];

//query the database for all properties here:
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

$sqlquery= "select * from stories where story_identifier=$identifier";

$result=mysql_query($sqlquery,$link);
$row=mysql_fetch_array($result);
$temp_type=$row['story_type'];
$temp_name=$row['story_name'];
$content=$row['story_content']; 
         
          
if(!$result){ 
$message="oh shit query is malformed!";
echo $message;
}            


    
mysql_close($link);



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

<form name="input" action="scripts/story_edit.php?val1=<?php echo $identifier;  ?>" method="post">
				<table align="center">
					  <tr>
 					   <td><label for="name">Story Title:</label></td>
 					   <td align="left"><input type="text" name="title" id="title" value="<?php echo $temp_name;  ?>"></td>
 					 </tr>
 					 <tr>
 					   <td><label for="email">Story Type:</label></td>
 					   <td align="left">
 					   
 					   	<select name="type">
  						<option>Funny</option>
						  <option>Tech</option>
						  <option>WTF</option>
						  <option>Politics</option>
						  <option>Programming</option>
						</select>
 					   
 					   </td>
 					 </tr>
 					 <tr>
 					 	<td><label for="message">Content:</label></td>
 					 	<td><textarea rows="15" cols="60" wrap="physical" name="content"><?php echo $content; ?></textarea></td>
 					 </tr>
					<tr>
                                           <td><label for="na">Password (secure!):</label></td>
                                           <td align="left"><input type="password" name="password" id="title"></td>
                                         </tr>
				</table>
				<input type="submit" value="Edit Story" />
			</form>

</div>








</div>


</body>
</html>
