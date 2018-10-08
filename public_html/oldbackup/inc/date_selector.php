<?php
$tod=intval(gmdate('d',time()+3600));
$tom=intval(gmdate('m',time()+3600));
$toy="20".gmdate('y',time()+3600); 
$dates = array('01', '02', '03', '04', '05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
	$months = array('January','Feburary','March','April','May','June','July','August','September','October','November','December');
	
	$d=1;
	$dt_box1="";
	$dt_box2="";
	$month_box="";
	$year_box="";
	foreach ($dates as $dt)
	{
		$dt_box1.="<option value=".$dt;
		if($dt=='01')
			$dt_box1.=" selected='selected'";
		$dt_box1.= ">".$d."</option>";	
		$d++;
	}	

	$d=1;
	foreach ($dates as $dt)
	{
		$dt_box2.="<option value=".$dt;
		if($tod==$dt)
			$dt_box2.=" selected='selected'";
		$dt_box2.= ">".$d."</option>";	
		$d++;
	}	
	
	
	
	$m=1;
	foreach ($months as $mnt)
	{
		if($m<9)
			$mt="0".$m;
		else
			$mt=$m;
		$month_box.="<option value=".$mt;
		if($mt==$tom)
			$month_box.=" selected='selected'";
		$month_box.=">".$mnt."</option>";	
		$m++;
	}	
	$year_box.="<option value='".$toy."' selected='selected' >".$toy."</option>";
	
	for($i=0;$i<10;$i++)
	{
	
		$year_box.="<option value='".--$toy."' >".$toy."</option>";
	} 



?>
