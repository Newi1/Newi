<?php
session_start();
?>

<?php

require 'pnr.php';
require 'database.php';


$pnr = $_POST['pnr'];




//$b_id1 = 

if($baggage_total_count == 0)
{
	echo QRcode::png($pnr,true,QR_ECLEVEL_L,3,4);
}

elseif($baggage_total_count == 1)
{
	
	$text = $pnr.$b_id1;
	echo QRcode::png($text,true,QR_ECLEVEL_L,3,4);
}

elseif($baggage_total_count == 2)
{
	$text = $pnr.$b_id1;//1st qr code with bid1
	echo QRcode::png($text,true,QR_ECLEVEL_L,3,4);
	
	$text = $pnr.$b_id2;//2nd qr code with bid2
	echo QRcode::png($text,true,QR_ECLEVEL_L,3,4);
}

elseif($baggage_total_count == 3)
{
	$text = $pnr.$b_id1;
	echo QRcode::png($text,true,QR_ECLEVEL_L,3,4);
	$text = $pnr.$b_id2;
	echo QRcode::png($text,true,QR_ECLEVEL_L,3,4);
	$text = $pnr.$b_id3;
	echo QRcode::png($text,true,QR_ECLEVEL_L,3,4);
}
elseif($baggage_total_count == 4)
{
	$text = $pnr.$b_id1;
	echo QRcode::png($text,true,QR_ECLEVEL_L,3,4);
	$text = $pnr.$b_id2;
	echo QRcode::png($text,true,QR_ECLEVEL_L,3,4);
	$text = $pnr.$b_id3;
	echo QRcode::png($text,true,QR_ECLEVEL_L,3,4);
	$text = $pnr.$b_id4;
	echo QRcode::png($text,true,QR_ECLEVEL_L,3,4);
}

elseif($baggage_total_count == 5)
{
	$text = $pnr.$b_id1;
	echo QRcode::png($text,true,QR_ECLEVEL_L,3,4);
	$text = $pnr.$b_id2;
	echo QRcode::png($text,true,QR_ECLEVEL_L,3,4);
	$text = $pnr.$b_id3;
	echo QRcode::png($text,true,QR_ECLEVEL_L,3,4);
	$text = $pnr.$b_id4;
	echo QRcode::png($text,true,QR_ECLEVEL_L,3,4);
	$text = $pnr.$b_id5;
	echo QRcode::png($text,true,QR_ECLEVEL_L,3,4);
}


?>