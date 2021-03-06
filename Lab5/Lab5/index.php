
<html>
<head>
<title>Card Designer</title>
<style>
#body, html{
	margin:0px;
	padding:0px;
}
		
#card {
	position: absolute;
	height: 175px;
	width: 306px;
	top:0px;
	left:0px;
	/*background-color:#E3E0D7;*/
	border: 1px black solid;
	margin:0px;
	padding:0px;
}

#loginbox {
	position:absolute;
	height:auto;
	width:250px;
	left:310px;
	top:0px;
	border:1px solid #000;
}

#orderControlBox {
	position:absolute;
	width:250px;
	height:auto;
	top:0px;
	left:562px;
	border:1px solid #000;
}

#orderHistoryBox {
	position:absolute;
	width:250px;
	height:auto;
	top:0px;
	left:812px;
	border:1px solid #000;
}

#preferencesBox {
	position:absolute;
	width:250px;
	height:auto;
	top:180px;
	left:0px;
	border:1px solid #000;
}

#badge {
	margin:0px;
	width:90px;
	height:100px;
	background-image:url(scripts/<?php session_start(); $name = $_SESSION['userid']; echo $name; ?>/badge.png);
	background-size: 100% 100%;
	/*background-repeat:no-repeat;*/
}

#name, #office, #department, #title, #phone, #email, #address {
	font-family:Georgia, "Times New Roman", Times, serif;
	height:auto;
	padding:0px;
	margin:0px;
	background-color:#CCC;
}

#name {
	font-size:18px;
}

#office {
	font-size:14px;
}

#department, #title, #phone, #email, #address {
	font-size:10px;
}

.divButton {
	background-color:#999;
	border:1px solid #000;
	width:75px;
}
</style>
 <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css" type="text/css" rel="Stylesheet" />
<!-- We need the style sheet linked above or the dialogs/other parts of jquery-ui won't display correctly!-->
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script><!-- The main library. 
Note: must be listed before the jquery-ui library -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js"></script><!-- jquery-UI 
hosted on Google's Ajax CDN-->
<script type="text/javascript" src="scripts/dom-drag.js"></script>

<script type="text/javascript" src="scripts/canvas2image.js"></script>
<script type="text/javascript" src="scripts/base64.js"></script>
</head>
<body>




<div id="card"></div>
<!-- For Handle / Root Style Dragging
<div id="root" style="left:200px; top:200px; position:relative">
<div id="handle">Handle</div>
Some text
<input id="testbox" type="text"/>
</div>
<img id="theImage" src="assets/img/lips_small.gif" style="position: relative; left:10px; top:10px;" />
-->

<!-- Login Box -->
<div id="loginBox">

<div id="log">
Username:<br /><input id="inputUsername" type="text" name="user" /><br />
Password:<br /><input id="inputPassword" type="password" name="pass" /><br />
<div id="login" class="divButton">Login</div>
</div>

<div id="reg">
Username:<br /><input id="registerUsername" type="text" name="userReg" /><br />
Password:<br /><input id="registerPassword1" type="password" name="pass1Reg" /><br />
Password:<br /><input id="registerPassword2" type="password" name="pass2Reg" /><br />
<div id="register" class="divButton">Register</div>
</div>

<div id="logout" class="divButton">Logout</div>

</div> <!-- End loginBox -->


<!-- Order Control Box -->
<div id="orderControlBox">
<div id="identity">
Welcome
</div>
<hr></hr>
<div><html>
<form enctype="multipart/form-data" action="scripts/imghandler.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
Choose a file to upload: <input name="uploadedfile" type="file" /><br>
 <input type="submit" value="Upload File" />
</form>
</html>
</div>
<hr></hr>
<div>Single Order:<br />Number of Cards:<input id="singleOrderTextbox" type="text" /><div id="singleOrderButton" class="divButton">Order</div></div>
<hr></hr>
<div>Bulk Order:<br />Number of Cards Per Person:<input id="bulkOrderTextbox" type="text" />
<form enctype="multipart/form-data" action="scripts/csvhandler.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
Choose a file to upload: <input name="uploadedfile" type="file" /><br>
 <input type="submit" value="Upload CSV" />
</form>
</div>
<hr></hr>
<div>Price Estimator:<br />
Zip Code<input id="zipcodeBox" type="text" /><br/> 
Cost:<div id="cost" style="float:right">&#36;0</div></div>
<hr></hr>
<!-- <div id="order" class="divButton">Order</div> -->
<div id="makeCard" class="divButton">Make Card</div>
</div> <!-- End of orderControlBox -->



<!-- Order History Box -->
<div id="orderHistoryBox">
<div id="showOrdersButton" class="divButton">Show Orders</div>
<div id="orderHistory">

</div>
</div> <!-- End orderHistoryBox -->



<div id="preferencesBox"> <!-- preferencesBox -->
Name:<br /><input id="prefName" type="text" value="NAME" /><br />
Title:<br /><input id="prefTitle" type="text" value="TITLE" /><br />
Office:<br /><input id="prefOffice" type="text" value="OFFICE" /><br />
Department:<br /><input id="prefDept" type="text" value="DEPARTMENT" /><br />
Phone:<br /><input id="prefPhone" type="text" value="Phone: xxx-xxx-xxx" /><br />
Email:<br /><input id="prefEmail" type="text" value="Email: jjlove@gmail.com" /><br />
Address:<br /><input id="prefAddress" rows="3" cols="20" value="0000 Anywhere St, Nowhere, KS 66215" />

<p id="last">Hello</p>
</div> <!-- End preferencesBox -->



<div id="badge" style="left:10px; top:10px; position:absolute;"></div>
<div id="office" style="left:225px; top:10px; position:absolute;">OFFICE</div>
<div id="department" style="left:225px; top:25px; position:absolute;">DEPARTMENT</div>
<div id="name" style="left:150px; top:65px; position:absolute;">NAME</div>
<div id="title" style="left:163px; top:85px; position:absolute;">TITLE</div>
<div id="phone" style="left:210px; top:150px; position:absolute;">Phone: xxx-xxx-xxx</div>
<div id="email" style="left:185px; top:160px; position:absolute;">Email: jjlove@gmail.com</div>
<div id="address" style="left:5px; top:160px; position:absolute;">0000 Anywhere St, Nowhere, KS 66215</div>


<div style="position:absolute; top:600px; left:0px;">
<canvas id="myCanvas" width="306" height="175">
 <p>Your browser doesn't support HTML5.</p>
</canvas>
</div>

<script type="text/javascript">
//needed for ajax queries
var xmlHttp;
xmlHttp=new XMLHttpRequest();


//remember the badge so we can refer to it in init
var badgeImage = document.getElementById("badge");
var officeImage = document.getElementById("office");
var deptImage = document.getElementById("department");
var nameImage = document.getElementById("name");
var titleImage = document.getElementById("title");
var phoneImage = document.getElementById("phone");
var emailImage = document.getElementById("email");
var addressImage = document.getElementById("address");

//card size
var CARD_WIDTH = $('#card').width();
var CARD_HEIGHT = $('#card').height();

//image size and bounds
var IMAGE_WIDTH = $('#badge').width();
var IMAGE_HEIGHT = $('#badge').height();
var IMAGE_BOUNDS_WIDTH = CARD_WIDTH-IMAGE_WIDTH;
var IMAGE_BOUNDS_HEIGHT = CARD_HEIGHT-IMAGE_HEIGHT;
var imagePositionX = badgeImage.offsetLeft;
var imagePositionY = badgeImage.offsetTop;

//Office size and bounds
var OFFICE_WIDTH = $('#office').width();
var OFFICE_HEIGHT = $('#office').height();
var OFFICE_BOUNDS_WIDTH = CARD_WIDTH-OFFICE_WIDTH;
var OFFICE_BOUNDS_HEIGHT = CARD_HEIGHT-OFFICE_HEIGHT;
var officePositionX = officeImage.offsetLeft;
var officePositionY = officeImage.offsetTop;

//Department size and bounds
var DEPT_WIDTH = $('#department').width();
var DEPT_HEIGHT = $('#department').height();
var DEPT_BOUNDS_WIDTH = CARD_WIDTH-DEPT_WIDTH;
var DEPT_BOUNDS_HEIGHT = CARD_HEIGHT-DEPT_HEIGHT;
var deptPositionX = deptImage.offsetLeft;
var deptPositionY = deptImage.offsetTop;

//Name size and bounds
var NAME_WIDTH = $('#name').width();
var NAME_HEIGHT = $('#name').height();
var NAME_BOUNDS_WIDTH = CARD_WIDTH-NAME_WIDTH;
var NAME_BOUNDS_HEIGHT = CARD_HEIGHT-NAME_HEIGHT;
var namePositionX = nameImage.offsetLeft;
var namePositionY = nameImage.offsetTop;

//Name title and bounds
var TITLE_WIDTH = $('#title').width();
var TITLE_HEIGHT = $('#title').height();
var TITLE_BOUNDS_WIDTH = CARD_WIDTH-TITLE_WIDTH;
var TITLE_BOUNDS_HEIGHT = CARD_HEIGHT-TITLE_HEIGHT;
var titlePositionX = titleImage.offsetLeft;
var titlePositionY = titleImage.offsetTop;

//Name phone and bounds
var PHONE_WIDTH = $('#phone').width();
var PHONE_HEIGHT = $('#phone').height();
var PHONE_BOUNDS_WIDTH = CARD_WIDTH-PHONE_WIDTH;
var PHONE_BOUNDS_HEIGHT = CARD_HEIGHT-PHONE_HEIGHT;
var phonePositionX = phoneImage.offsetLeft;
var phonePositionY = phoneImage.offsetTop;

//Name email and bounds
var EMAIL_WIDTH = $('#email').width();
var EMAIL_HEIGHT = $('#email').height();
var EMAIL_BOUNDS_WIDTH = CARD_WIDTH-EMAIL_WIDTH;
var EMAIL_BOUNDS_HEIGHT = CARD_HEIGHT-EMAIL_HEIGHT;
var emailPositionX = emailImage.offsetLeft;
var emailPositionY = emailImage.offsetTop;

//Name address and bounds
var ADDRESS_WIDTH = $('#address').width();
var ADDRESS_HEIGHT = $('#address').height();
var ADDRESS_BOUNDS_WIDTH = CARD_WIDTH-ADDRESS_WIDTH;
var ADDRESS_BOUNDS_HEIGHT = CARD_HEIGHT-ADDRESS_HEIGHT;
var addressPositionX = addressImage.offsetLeft;
var addressPositionY = addressImage.offsetTop;


//init the badge as a drag and drop object
Drag.init(badgeImage, null, 0, IMAGE_BOUNDS_WIDTH, 0, IMAGE_BOUNDS_HEIGHT);
Drag.init(officeImage, null, 0, OFFICE_BOUNDS_WIDTH, 0, OFFICE_BOUNDS_HEIGHT);
Drag.init(deptImage, null, 0, DEPT_BOUNDS_WIDTH, 0, DEPT_BOUNDS_HEIGHT);
Drag.init(nameImage, null, 0, NAME_BOUNDS_WIDTH, 0, NAME_BOUNDS_HEIGHT);
Drag.init(titleImage, null, 0, TITLE_BOUNDS_WIDTH, 0, TITLE_BOUNDS_HEIGHT);
Drag.init(phoneImage, null, 0, PHONE_BOUNDS_WIDTH, 0, PHONE_BOUNDS_HEIGHT);
Drag.init(emailImage, null, 0, EMAIL_BOUNDS_WIDTH, 0, EMAIL_BOUNDS_HEIGHT);
Drag.init(addressImage, null, 0, ADDRESS_BOUNDS_WIDTH, 0, ADDRESS_BOUNDS_HEIGHT);
//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
//////////////////  Finished Connecting all Drag N Drop Components ////////////////


//updates the text of each card component, redraws the image, and updates all coordinates, update size constraints
function updateCard(){
	//update text of each card
	$('#name').text($('#prefName').val());
	$('#title').text($('#prefTitle').val());
	$('#office').text($('#prefOffice').val());
	$('#department').text($('#prefDept').val());
	$('#phone').text($('#prefPhone').val());
	$('#email').text($('#prefEmail').val());
	$('#address').text($('#prefAddress').val());
	
	//redraw the image
	$('#badge').css('background-image', 'url(scripts/<?php session_start(); $name = $_SESSION['userid']; echo $name; ?>/badge.png)');
	
	//updates all coordinates & size contraints
	//image size and bounds
 IMAGE_WIDTH = $('#badge').width();
 IMAGE_HEIGHT = $('#badge').height();
 IMAGE_BOUNDS_WIDTH = CARD_WIDTH-IMAGE_WIDTH;
 IMAGE_BOUNDS_HEIGHT = CARD_HEIGHT-IMAGE_HEIGHT;
 imagePositionX = badgeImage.offsetLeft;
 imagePositionY = badgeImage.offsetTop;

//Office size and bounds
 OFFICE_WIDTH = $('#office').width();
 OFFICE_HEIGHT = $('#office').height();
 OFFICE_BOUNDS_WIDTH = CARD_WIDTH-OFFICE_WIDTH;
 OFFICE_BOUNDS_HEIGHT = CARD_HEIGHT-OFFICE_HEIGHT;
 officePositionX = officeImage.offsetLeft;
 officePositionY = officeImage.offsetTop;

//Department size and bounds
 DEPT_WIDTH = $('#department').width();
 DEPT_HEIGHT = $('#department').height();
 DEPT_BOUNDS_WIDTH = CARD_WIDTH-DEPT_WIDTH;
 DEPT_BOUNDS_HEIGHT = CARD_HEIGHT-DEPT_HEIGHT;
 deptPositionX = deptImage.offsetLeft;
 deptPositionY = deptImage.offsetTop;

//Name size and bounds
 NAME_WIDTH = $('#name').width();
 NAME_HEIGHT = $('#name').height();
 NAME_BOUNDS_WIDTH = CARD_WIDTH-NAME_WIDTH;
 NAME_BOUNDS_HEIGHT = CARD_HEIGHT-NAME_HEIGHT;
 namePositionX = nameImage.offsetLeft;
 namePositionY = nameImage.offsetTop;

//Name title and bounds
 TITLE_WIDTH = $('#title').width();
 TITLE_HEIGHT = $('#title').height();
 TITLE_BOUNDS_WIDTH = CARD_WIDTH-TITLE_WIDTH;
 TITLE_BOUNDS_HEIGHT = CARD_HEIGHT-TITLE_HEIGHT;
 titlePositionX = titleImage.offsetLeft;
 titlePositionY = titleImage.offsetTop;

//Name phone and bounds
 PHONE_WIDTH = $('#phone').width();
 PHONE_HEIGHT = $('#phone').height();
 PHONE_BOUNDS_WIDTH = CARD_WIDTH-PHONE_WIDTH;
 PHONE_BOUNDS_HEIGHT = CARD_HEIGHT-PHONE_HEIGHT;
 phonePositionX = phoneImage.offsetLeft;
 phonePositionY = phoneImage.offsetTop;

//Name email and bounds
 EMAIL_WIDTH = $('#email').width();
 EMAIL_HEIGHT = $('#email').height();
 EMAIL_BOUNDS_WIDTH = CARD_WIDTH-EMAIL_WIDTH;
 EMAIL_BOUNDS_HEIGHT = CARD_HEIGHT-EMAIL_HEIGHT;
 emailPositionX = emailImage.offsetLeft;
 emailPositionY = emailImage.offsetTop;

//Name address and bounds
 ADDRESS_WIDTH = $('#address').width();
 ADDRESS_HEIGHT = $('#address').height();
 ADDRESS_BOUNDS_WIDTH = CARD_WIDTH-ADDRESS_WIDTH;
 ADDRESS_BOUNDS_HEIGHT = CARD_HEIGHT-ADDRESS_HEIGHT;
 addressPositionX = addressImage.offsetLeft;
 addressPositionY = addressImage.offsetTop;



//prove that some coordinates are changing
$('#last').text("x: " + namePositionX + " y: " + namePositionY);
	
}


//watch for keystrokes on the inputs and update accordingly
$('#prefName').keydown(function() {
  updateCard();
});
$('#prefName').keyup(function() {
  updateCard();
});
$('#prefTitle').keydown(function() {
  updateCard();
});
$('#prefTitle').keyup(function() {
  updateCard();
});
$('#prefOffice').keydown(function() {
  updateCard();
});
$('#prefOffice').keyup(function() {
  updateCard();
});
$('#prefDept').keydown(function() {
  updateCard();
});
$('#prefDept').keyup(function() {
  updateCard();
});
$('#prefPhone').keydown(function() {
  updateCard();
});
$('#prefPhone').keyup(function() {
  updateCard();
});
$('#prefEmail').keydown(function() {
  updateCard();
});
$('#prefEmail').keyup(function() {
  updateCard();
});
$('#prefAddress').keydown(function() {
  updateCard();
});
$('#prefAddress').keyup(function() {
  updateCard();
});


//watch for an element moving & update accordingly
 $("#badge").mouseup(function(){
      updateCard();
    }).mousedown(function(){
      updateCard();
    });
$("#office").mouseup(function(){
      updateCard();
    }).mousedown(function(){
      updateCard();
    });
$("#department").mouseup(function(){
      updateCard();
    }).mousedown(function(){
      updateCard();
    });
$("#name").mouseup(function(){
      updateCard();
    }).mousedown(function(){
      updateCard();
    });
$("#title").mouseup(function(){
      updateCard();
    }).mousedown(function(){
      updateCard();
    });
$("#phone").mouseup(function(){
      updateCard();
    }).mousedown(function(){
      updateCard();
    });
$("#email").mouseup(function(){
      updateCard();
    }).mousedown(function(){
      updateCard();
    });
$("#address").mouseup(function(){
      updateCard();
    }).mousedown(function(){
      updateCard();
    });

//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////
//////////////////  Finished Manipulating & Updating all Drag N Drop Components ////////////////

//if clicking on makeCard
$("#makeCard").live("click", function(){
var originX = 0;
var originY = 0;
var width = 306;
var height = 175;

var canvas = $("#myCanvas");
var context = canvas.get(0).getContext("2d");

context.fillStyle = '#FFFFFF';
context.fillRect(0,0,306,175);
context.fillStyle = '#000000';
context.strokeRect(0,0,306,175);


var text;
//add things to canvas
var textName = $('#name').text();
context.font = "18px Georgia";
context.fillText(textName, namePositionX, namePositionY+10);


text = $('#office').text();
context.font = "14px Georgia";
context.fillText(text, officePositionX, officePositionY+10);

text = $('#title').text();
context.font = "10px Georgia";
context.fillText(text, titlePositionX, titlePositionY+10);

text = $('#department').text();
context.font = "10px Georgia";
context.fillText(text, deptPositionX, deptPositionY+10);

text = $('#phone').text();
context.font = "10px Georgia";
context.fillText(text, phonePositionX, phonePositionY+10);

text = $('#email').text();
context.font = "10px Georgia";
context.fillText(text, emailPositionX, emailPositionY+10);

text = $('#address').text();
context.font = "10px Georgia";
context.fillText(text, addressPositionX, addressPositionY+10);


//add image to canvas
var imgBadge = new Image();
imgBadge.src = "scripts/<?php  echo $name; ?>/badge.png";
context.drawImage(imgBadge,imagePositionX,imagePositionY,90,100);

var oCanvas = document.getElementById("myCanvas");
Canvas2Image.saveAsPNG(oCanvas);

//everything is now finished, so save the canvas as an image
//var dataURL = canvas.toDataURL();
//document.getElementById("canvasImg").src = dataURL;


//$('#last').text("finalX: " + namePositionX + " finalY: " +namePositionY);

});


//if clicking on the login button
$("#login").live("click", function(){
		//first login...
        var user,pass;
        user=document.getElementById("inputUsername").value;
        pass=document.getElementById("inputPassword").value;
        var req="user="+user+"&pass="+pass;

        xmlHttp.open("POST","scripts/login.php",true);
        
        xmlHttp.onreadystatechange=function(){
                if (xmlHttp.readyState == 4){
                        var pElement=document.getElementById("identity");
                        pElement.innerHTML=xmlHttp.responseText;
                }
        }
         xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlHttp.setRequestHeader("Content-length", req.length);
         xmlHttp.setRequestHeader("Connection", "close");
         xmlHttp.send(req);
		 
		 
});
//if clicking on the register button
$("#register").live("click", function(){
        var user,pass1,pass2;
        user=document.getElementById("registerUsername").value;
        pass1=document.getElementById("registerPassword1").value;
        pass2=document.getElementById("registerPassword2").value;

        var req="reg_user="+user+"&reg_pass1="+pass1+"&reg_pass2="+pass2;

        xmlHttp.open("POST","scripts/registration.php",true);
        
        xmlHttp.onreadystatechange=function(){
                if (xmlHttp.readyState == 4){
                        var pElement=document.getElementById("identity");
                        pElement.innerHTML=xmlHttp.responseText;
                }
        }
         xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlHttp.setRequestHeader("Content-length", req.length);
         xmlHttp.setRequestHeader("Connection", "close");
         xmlHttp.send(req);
});
//logout button
$("#logout").live("click", function(){
        xmlHttp.open("GET","scripts/logout.php",true);
        
        xmlHttp.onreadystatechange=function(){
                if (xmlHttp.readyState == 4){
                        var pElement=document.getElementById("identity");
                        pElement.innerHTML=xmlHttp.responseText;
                }
        }
         xmlHttp.send(null);    
});
//if clicking on the login button
$("#singleOrderButton").live("click", function(){
        var cards,zip;
        cards=document.getElementById("singleOrderTextbox").value;
        zip = document.getElementById("zipcodeBox").value;
	var req="cards="+cards+"&zip="+zip;

        xmlHttp.open("POST","scripts/price.php",true);
        
        xmlHttp.onreadystatechange=function(){
                if (xmlHttp.readyState == 4){
                        var pElement=document.getElementById("cost");
                        pElement.innerHTML=xmlHttp.responseText;
                }
        }
         xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlHttp.setRequestHeader("Content-length", req.length);
         xmlHttp.setRequestHeader("Connection", "close");
         xmlHttp.send(req);
});
//show orders button
$("#showOrdersButton").live("click", function(){
        xmlHttp.open("GET","scripts/orderhistory.php",true);
        
        xmlHttp.onreadystatechange=function(){
                if (xmlHttp.readyState == 4){
                        var pElement=document.getElementById("orderHistory");
                        pElement.innerHTML=xmlHttp.responseText;
                }
        }
         xmlHttp.send(null);    
});

//if clicking on the bulk order button
$("#bulkOrderButton").live("click", function(){
        var cards,zip;
        cards=document.getElementById("bulkOrderTextbox").value;
        zip = document.getElementById("zipcodeBox").value;
        var req="cards="+cards+"&zip="+zip;

        xmlHttp.open("POST","scripts/price.php",true);
        
        xmlHttp.onreadystatechange=function(){
                if (xmlHttp.readyState == 4){
                        var pElement=document.getElementById("cost");
                        pElement.innerHTML=xmlHttp.responseText;
                }
        }
         xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlHttp.setRequestHeader("Content-length", req.length);
         xmlHttp.setRequestHeader("Connection", "close");
         xmlHttp.send(req);
});
/*
//show orders button
$("#order").live("click", function(){
        xmlHttp.open("GET","scripts/orderhistory.php",true);
        
        xmlHttp.onreadystatechange=function(){
                if (xmlHttp.readyState == 4){
                        var pElement=document.getElementById("orderHistory");
                        pElement.innerHTML=xmlHttp.responseText;
                }
        }
         xmlHttp.send(null);    
});
*/



</script>




</body>
</html>

