<?php

include('xmlrpc-2.2.2/lib/xmlrpc.inc');
?>
<html>
<body>
<h1> Mikes Calculator </h1>


<form method= 'POST' action='rpc1.php' name='calculator'>

Number 1: <input type ='text' name ='num1' >
Number 2: <input type = 'text' name= 'num2' >

<input type ='radio' name=r1 value='add' >add
<input type ='radio' name=r1 value='subtract' >subtract
<input type ='radio' name=r1 value='multiply' >multiply

<input type ='radio' name=r1 value='div'  >divide

<input type='submit' value='submit'/>
</form>

</body>
</html>

<?php
$first=$_POST['num1'];
$second=$_POST['num2'];
$method=$_POST['r1'];

$client = new xmlrpc_client( 'http://localhost:8000/RPC2' );


//$arr= array(new xmlrpcval($first,"string"),new xmlrpcval($second,"string"));
/*
$int= new xmlrpcval($first);
$int2 = new xmlrpcval($second);
$para= new xmlrpcval('add',"$first","$second");
$msg = new xmlrpcmsg($para);
*/
if ($method=="add"){ 
 $msg = new xmlrpcmsg('add',
                         array(new xmlrpcval($first, 'int'),
                         new xmlrpcval($second, 'int')));
}



if ($method=="subtract"){
 $msg = new xmlrpcmsg('subtract',
                         array(new xmlrpcval($first, 'int'),
                         new xmlrpcval($second, 'int')));
}


if ($method=="div"){
 $msg = new xmlrpcmsg('divide',
                         array(new xmlrpcval($first, 'int'),
                         new xmlrpcval($second, 'int')));
}


if ($method=="multiply"){
 $msg = new xmlrpcmsg('multiply',
                         array(new xmlrpcval($first, 'int'),
                         new xmlrpcval($second, 'int')));
}














$client->return_type = 'phpvals';
$resp = $client->send($msg);
//$result=5;


if($resp->faultCode()){
  $result= $resp->faultString() ;
}else{
  $result= $resp->value();
}
print $result;
?>
