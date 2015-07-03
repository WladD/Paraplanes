<?php

function model()
{
	global $z, $srlat, $srlon, $plk, $start, $finish, $wynik1, $wynik2, $wynik3, $wynik4, $wynik5, $wynik6, $wynik7, $wynik8, $wynik9, $wynik0, $coord, $coords, $time, $j;
	$minlat=999999;
	$maxlat=0;
	$minlon=999999;
	$maxlon=0;
	for($i=0; $i<count($plk); $i++)
	{
		
		switch(true)
		{
			case(substr($plk[$i],0,1)=='B'):
			
				$time[$j]=substr($plk[$i],1,2).':'.substr($plk[$i],3,2).':'.substr($plk[$i],5,2);
				$coord[$j][0]=substr($plk[$i],7,2).'°'.substr($plk[$i],9,2).','.substr($plk[$i],11,3).'`'.substr($plk[$i],14,1);
				$coord[$j][1]=substr($plk[$i],15,3).'°'.substr($plk[$i],18,2).','.substr($plk[$i],20,3).'`'.substr($plk[$i],23,1);
				$lat=(substr($plk[$i],7,2)+substr($plk[$i],9,5)/60000)*(substr($plk[$i],14,1)=="S"?-1:1);
				$lon=(substr($plk[$i],15,3)+substr($plk[$i],18,5)/60000)*(substr($plk[$i],23,1)=="W"?-1:1);
				$coords[] = "coord($lat,$lon)";
				$j++;
				
				if ($minlat>$lat)
				{
					$minlat=$lat;
				}
				
				if ($maxlat<$lat)
				{
					$maxlat=$lat;
				}
				if ($minlon>$lon)
				{
					$minlon=$lon;
				}
				
				if ($maxlon<$lon)
				{
					$maxlon=$lon;
				}
				break;
			
			case(strpos($plk[$i], 'DTE')!=false):
			
				$wynik1=substr($plk[$i],5,2).'.'.substr($plk[$i],7,2).'.20'.substr($plk[$i],9,2);
				break;
			
			case(strpos($plk[$i], 'PILOT')!=false):
			
				$wynik2=substr($plk[$i],11);
				break;

			case(strpos($plk[$i], 'LIDERTYPE')!=false):
			
				$wynik3=substr($plk[$i],16);
				break;
		
			case(strpos($plk[$i], 'GLIDERID')!=false):
			
				$wynik4=substr($plk[$i],14);
				break;
			
			case(strpos($plk[$i], 'COMPETITIONID')!=false):
			
				$wynik5=substr($plk[$i],19);
				break;
			
			case(strpos($plk[$i], 'FGPS')!=false):
			
				$wynik6=substr($plk[$i],6);
				break;
			
			case(strpos($plk[$i], 'DATUM')!=false):
			
				$wynik7=substr($plk[$i],14);
				break;
			
			case(strpos($plk[$i], 'FFXA')!=false):
			
				$wynik8=substr($plk[$i],5);
				break;

			case(strpos($plk[$i], 'CLASS')!=false):

				$wynik9=substr($plk[$i],23);
				break;

			case(strpos($plk[$i], 'Site')!=false):

				$wynik0=substr($plk[$i],10);
				break;
		}
	}

$rlat=abs($maxlat-$minlat);
$rlon=abs($maxlon-$minlon);
$srlat=($maxlat+$minlat)/2;
$srlon=($maxlon+$minlon)/2;

if ($rlat>$rlon)
{
	$kr=$rlat;
}
else
{
	$kr=$rlon;
}



if ($kr>0)
{
	if($kr<0.3)
	{
		$z=14;
	}
}
if ($kr>0.3)
{
	if($kr<0.6)
	{
		$z=9;
	}
}

if ($kr>0.6)
{
	if($kr<1.2)
	{
		$z=8;
	}
}
if ($kr>1.2)
{
	
	
		$z=7;
	
}



}
?>