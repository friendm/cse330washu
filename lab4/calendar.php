<html>
<head>
<title>CalenDerp</title>
<link rel="stylesheet" type="text/css" href="css/global.css" />
 <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/start/jquery-ui.css" type="text/css" rel="Stylesheet" />
<!-- We need the style sheet linked above or the dialogs/other parts of jquery-ui won't display correctly!-->
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script><!-- The main library. 
Note: must be listed before the jquery-ui library -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js"></script><!-- jquery-UI 
hosted on Google's Ajax CDN-->



<script type="text/javascript">
var monthsArray;
var daysArray;
var daysInMonth;
var currentTime;
var month;
var date;
var day;
var year;
var totalNumberBoxes = 42; //6*7
var xmlHttp;

$(document).ready(function() {
	xmlHttp=new XMLHttpRequest();

	//arrays to represent strings from numbers regarding dates
	monthsArray=["January","February","March","April","May","June","July","August","September","October","November","December"];
	daysArray=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
	daysInMonth=["31","28","31","30","31","30","31","31","31","31","30","31"];
	if (year % 4 == 0) { //leap year!
		daysInMonth[1]=29;
	}

	//get timestamps so we know where to start
	currentTime = new Date();
	month = currentTime.getMonth();
	date = currentTime.getDate();
	day = currentTime.getDay();
	year = currentTime.getFullYear();

	//set default settings and text to the current date
	$("#monthBox").text(monthsArray[month] + " " + year);
	$("#infoBoxHeader").text(daysArray[day] + ", " + monthsArray[month] + " " + date + ", " + year);
	
	//start the calendar on correct day for the month
	var startDate = new Date(year,month,1);
	var firstDay = startDate.getDay()+1;
	for(var i = 1; i <= daysInMonth[month];i++){
		$("#box"+firstDay).text(i);
		firstDay++;
	}
//infoBoxUpdater();
}); //end of load doc



function incrementMonth(){
	if (month==11){ //if current month is december
		month = 0;
		year++;
	} else {
		month++;
	}
	redrawCalendar();
	infoBoxUpdater();
}
function decrementMonth(){
	if (month==0){ //if current month is december
		month = 11;
		year--;
	} else {
		month--;
	}
	redrawCalendar();
	infoBoxUpdater();
}

function redrawCalendar(){
	if (year % 4 == 0) { //leap year!
		daysInMonth[1]=29;
	} else {
		daysInMonth[1]=28;
	}

	//clear all previous values
	for (var i = 0; i < totalNumberBoxes;i++){
		$("#box"+i).text("");
	}

	//start the calendar on correct day for the month
	var startDate = new Date(year,month,1);
	var firstDay = startDate.getDay()+1;
	for(var i = 1; i <= daysInMonth[month];i++){
		$("#box"+firstDay).text(i);
		firstDay++;
	}
	
	//Update Headers
	$("#monthBox").text(monthsArray[month] + " " + year);
	$("#infoBoxHeader").text(daysArray[day] + ", " + monthsArray[month] + " " + date + ", " + year);
}

//Click months forwards / backwards
$("#back").live("click", function() {
    if (month==0){ //if current month is december
    	date = 1;
		month = 11;
		year--;
		currentTime = new Date(year,month,1);
    	day = currentTime.getDay();
	} else {
		date=1;
		month--;
		currentTime = new Date(year,month,1);
    	day = currentTime.getDay();
	}
	redrawCalendar();
//	infoBoxUpdater();
});
$("#forward").live("click", function() {
    if (month==11){ //if current month is december
    	date=1;
		month = 0;
		year++;
		currentTime = new Date(year,month,1);
    	day = currentTime.getDay();
	} else {
		date=1;
		month++;
		currentTime = new Date(year,month,1);
    	day = currentTime.getDay();
	}
	redrawCalendar();
	//infoBoxUpdater();
});


//TODO:
//On click, should update #infoBoxHeader and display the events of that day
$(".box").live("click", function() {
	//only display date information if the box has contents (is used in this month)
	if($("#"+this.id).text()!= ""){
		//change the date to the clicked box
		date = $("#"+this.id).text();
		currentTime = new Date(year,month,date)
		day = currentTime.getDay();
	
	//send AJAX query
        var req="year="+year+"&month="+month+"&date="+date;

        xmlHttp.open("POST","event_lister.php",true);
        
        xmlHttp.onreadystatechange=function(){
                if (xmlHttp.readyState == 4){
                        var pElement=document.getElementById("infoBox");
                        pElement.innerHTML=xmlHttp.responseText;
                }
        }
         xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlHttp.setRequestHeader("Content-length", req.length);
         xmlHttp.setRequestHeader("Connection", "close");
         xmlHttp.send(req);
	//end of AJAX query
	
		
		//Display all date events
    	//$("span").text("Clicked ID: " + this.id);
     	//$("span").append("Date content goes here");
     	
     	//Change header of the box to the date clicked
     	$("#infoBoxHeader").text(daysArray[day] + ", " + monthsArray[month] + " " + date + ", " + year);
     	
     }
});

//infoBox updater
function infoBoxUpdater(){
	//send AJAX query
        var req="year="+year+"&month="+month+"&date="+date;

        xmlHttp.open("POST","event_lister.php",true);
        
        xmlHttp.onreadystatechange=function(){
                if (xmlHttp.readyState == 4){
                        var pElement=document.getElementById("infoBox");
                        pElement.innerHTML=xmlHttp.responseText;
                }
        }
         xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlHttp.setRequestHeader("Content-length", req.length);
         xmlHttp.setRequestHeader("Connection", "close");
         xmlHttp.send(req);
        //end of AJAX query
}


//email for creative portion
$("#email").live("click", function(){
        var yours,other,content;
        yours=document.getElementById("yourEmail").value;
        other=document.getElementById("otherEmail").value;
	//content=document.getElementById("infoBox").value;
	content=$("#infoBox").text();
        var req="usermail="+yours+"&reciever="+other+"&content="+content;

        xmlHttp.open("POST","cal_email.php",true);
        
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

        //infoBoxUpdater();
});






//if clicking on the login button
$("#inputLogin").live("click", function(){
	var user,pass;
 	user=document.getElementById("inputUsername").value;
  	pass=document.getElementById("inputPassword").value;
  	var req="user="+user+"&pass="+pass;

	xmlHttp.open("POST","login.php",true);
	
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

	//infoBoxUpdater();
});


//if clicking on the register button
$("#inputRegister").live("click", function(){
        var user,pass1,pass2;
        user=document.getElementById("registerUsername").value;
        pass1=document.getElementById("registerPassword1").value;
	pass2=document.getElementById("registerPassword2").value;

        var req="reg_user="+user+"&reg_pass1="+pass1+"&reg_pass2="+pass2;

        xmlHttp.open("POST","registration.php",true);
        
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
	xmlHttp.open("GET","logout.php",true);
        
        xmlHttp.onreadystatechange=function(){
                if (xmlHttp.readyState == 4){
                        var pElement=document.getElementById("identity");
                        pElement.innerHTML=xmlHttp.responseText;
                }
        }
        // xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         //xmlHttp.setRequestHeader("Content-length", req.length);
        // xmlHttp.setRequestHeader("Connection", "close");
         xmlHttp.send(null);	
	//infoBoxUpdater();
});


//new event button
$("#newEvent").live("click", function(){
        var theEvent,eventHour,eventMinutes,timeZone;

	var e = document.getElementById("minuteSelect");
	eventMinutes = e.options[e.selectedIndex].text;
	e = document.getElementById("hourSelect");
        eventHour = e.options[e.selectedIndex].text;
	e = document.getElementById("timeZoneSelect");
        timeZone = e.options[e.selectedIndex].text;
        theEvent=document.getElementById("inputEvent").value;

        var req="year="+year+"&day="+date+"&month="+month+"&event="+theEvent+"&eventtime="+eventHour+"&minutes="+eventMinutes+"&tzone="+timeZone;
        xmlHttp.open("POST","calender_add.php",true);
        
        xmlHttp.onreadystatechange=function(){
                if (xmlHttp.readyState == 4){
                        var pElement=document.getElementById("identity");
                        pElement.innerHTML=xmlHttp.responseText;
                //	redrawCalendar();
		}
        }
         xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
         xmlHttp.setRequestHeader("Content-length", req.length);
         xmlHttp.setRequestHeader("Connection", "close");
         xmlHttp.send(req);

//	infoBoxUpdater();
});        


//delete and event
$(".event").live("click", function() {
        //only display date information if the box has contents (is used in this month)
        

		//if($("#"+this.id).text()!= ""){
                //change the date to the clicked box
                //date = $("#"+this.id).text();
                //currentTime = new Date(year,month,date)
                //day = currentTime.getDay();
        
        //send AJAX query
	var temp=$("#"+this.id).text();
        var req="event_string="+temp+"&month="+month+"&day="+date+"&year="+year;

        xmlHttp.open("POST","calender_delete.php",true);
        
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
        //end of AJAX query
        
                
                //Display all date events
        //$("span").text("Clicked ID: " + this.id);
        //$("span").append("Date content goes here");
        
        //Change header of the box to the date clicked
       //$("#infoBoxHeader").text(daysArray[day] + ", " + monthsArray[month] + " " + date + ", " + year);
        
     //}
});


	
  </script>



</head>
<body>


<?php
//php to populate entire static calendar layout

echo "<div id=\"monthHeader\">
<div id=\"weekdaysHeader\">

<div class=\"weekDaysHeader\">Sunday</div>
<div class=\"weekDaysHeader\">Monday</div>
<div class=\"weekDaysHeader\">Tuesday</div>
<div class=\"weekDaysHeader\">Wednesday</div>
<div class=\"weekDaysHeader\">Thursday</div>
<div class=\"weekDaysHeader\">Friday</div>
<div class=\"weekDaysHeader\">Saturday</div>

</div>
</div>";
echo "<div>";
$totalBoxCount=1;
for($totalBoxes=1; $totalBoxes<=6; $totalBoxes++){
	echo "<div id=\"week$totalBoxes\">";
	for($weekCounter=0; $weekCounter < 7; $weekCounter++){
		$dayString = numToWeekDay($weekCounter);
		echo "<div id=\"box$totalBoxCount\" class=\"box\"></div>";
		$totalBoxCount++;
	}
	echo "</div>";
}
echo "</div>";
echo "<div id=\"infoBox\"><span id=\"event_lister\"></span></div>";
echo "<div id=\"infoBoxHeader\"><p>Tuesday, Nov 18, 2011</p></div>";
echo "<div id=\"infoBoxNewEvent\">";
echo "Hour:<select id=\"hourSelect\">";
for ($i=0; $i<24; $i++){
	echo "<option value=\"hour$i\">$i</option>";
}
echo "</select>";

echo "Minute:<select id=\"minuteSelect\">";
for ($i=0; $i<60; $i++){
        echo "<option value=\"minute$i\">$i</option>";
}
echo "</select>";

echo "Zone:<select id=\"timeZoneSelect\">";
        echo "<option value=\"est\">EST</option>
	<option value=\"cst\">CST</option>
	<option value=\"rmt\">RMT</option>
	<option value=\"pst\">PST</option>
";
echo "</select>";

echo "Event:<input id=\"inputEvent\" type=\"text\" name=\"event\" />";
echo "<div id=\"newEvent\"><a href=\"#\">+New Event</a></div>Click to Delete Event";


echo "</div>";
echo "<div id=\"monthBox\"><p>Month</p></div>";
echo "<div id=\"back\"><p><a href=\"#\">Back</a></p></div>";
echo "<div id=\"forward\"><p><a href=\"#\">Forward</a></p></div>";
echo "<div id=\"loginBox\">
<div id=\"identity\">
Welcome
</div>

<div id=\"login\">
Username:<br /><input id=\"inputUsername\" type=\"text\" name=\"user\" /><br />
Password:<br /><input id=\"inputPassword\" type=\"password\" name=\"pass\" /><br />
<div id=\"inputLogin\">Login</div>
</div>

<div id=\"register\">
Username:<br /><input id=\"registerUsername\" type=\"text\" name=\"userReg\" /><br />
Password:<br /><input id=\"registerPassword1\" type=\"text\" name=\"pass1Reg\" /><br />
Password:<br /><input id=\"registerPassword2\" type=\"text\" name=\"pass2Reg\" /><br />
<div id=\"inputRegister\">Register</div>
</div>

<div id=\"logout\">
<a href=\"#\">Logout</a>
</div>

Email Today's Schedule:<br />
Your Email:<br /><input id=\"yourEmail\" type=\"text\" name=\"youremail\" /><br />
Friend's Email:<br /><input id=\"otherEmail\" type=\"text\" name=\"otheremail\" /><br />
<div id=\"email\">
<a href=\"#\">Email</a>
</div>
</div>";


function numToWeekDay($num){
	if ($num == 0){
		return "Sunday ";
	} else if ($num == 1){
		return "Monday ";
	} else if ($num == 2){
		return "Tuesday ";
	} else if ($num == 3){
		return "Wednesday ";
	} else if ($num == 4){
		return "Thursday ";
	} else if ($num == 5){
		return "Friday ";
	} else if ($num == 6){
		return "Saturday ";
	}
}




?>


</body>
</html>
