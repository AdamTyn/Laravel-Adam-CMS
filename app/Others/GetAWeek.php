<?php 
function GetAWeek()
{
	$week=[];
	for ($i=6; $i >0; --$i) { 
		$week[]=date('Y-m-d',strtotime("-".$i."day"));
	}
	$week[6]=date('Y-m-d',$_SERVER['REQUEST_TIME']);

	return $week;
}