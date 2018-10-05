<?php
$tod=intval(gmdate('d',time()+3600));
$tom=intval(date('m',time()+3600));
$toy="20".gmdate('y',time()+3600); 
$dates = array('01', '02', '03', '04', '05','06','07','08','09','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31');
	$months = array('January','Feburary','March','April','May','June','July','August','September','October','November','December');
	$dt_box1="";
	$dt_box2="";
	$month_box1="";
	$month_box2="";
	$year_box1="";
	$year_box2="";
	
	$d=1;
	foreach ($dates as $dt)
	{
		$dt_box1.="<option value=".$dt;
		if($dt==$dt1)
			$dt_box1.=" selected='selected'";
		$dt_box1.= ">".$d."</option>";	
		$d++;
	}	

	$d=1;
	foreach ($dates as $dt)
	{
		$dt_box2.="<option value=".$dt;
		if($dt==$dt2-1)
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
		$month_box1.="<option value=".$mt;
		if($mt==$mt1)
			$month_box1.=" selected='selected'";
		$month_box1.=">".$mnt."</option>";	
		$m++;
	}
	
	$m=1;
	foreach ($months as $mnt)
	{
		if($m<9)
			$mt="0".$m;
		else
			$mt=$m;
		$month_box2.="<option value=".$mt;
		if($mt==$mt2)
			$month_box2.=" selected='selected'";
		$month_box2.=">".$mnt."</option>";	
		$m++;
	}	
	
	$toy1=$toy;		
	//$year_box1.="<option value='".$toy."' selected='selected' >".$toy."</option>";
	
	for($i=0;$i<10;$i++)
	{
	
		$year_box1.="<option value='".$toy1."' ";
		if($toy1==$y1)
			$year_box1.="selected='selected'";
		$year_box1.=">".$toy1."</option>";
		$toy1--;
	} 
	
	$toy2=$toy;	
	//$year_box2.="<option value='".$toy2."' selected='selected' >".$toy."</option>";
	
	for($i=0;$i<10;$i++)
	{
	
		$year_box2.="<option value='".$toy2."'";
		if($toy2==$y2)
			$year_box2.="selected='selected'";
		$year_box2.=">".$toy2."</option>";
		$toy2--;
	} 



?>
