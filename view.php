<?php

function view()
{
	global $sr, $wynik1, $wynik2, $wynik3, $wynik4, $wynik5, $wynik6, $wynik7, $wynik8, $wynik9, $wynik0, $time, $coord, $coords, $j;
	echo 'Data odlotu: ';
	echo $wynik1."<br/>\n";
	echo 'Pilot: ';
	echo $wynik2."<br/>\n";
	echo 'Przewożnik: ';
	echo $wynik3."<br/>\n";
	echo 'Numer lotu: ';
	echo $wynik4."<br/>\n";
	echo 'ID: ';
	echo $wynik5."<br/>\n";
	echo 'Model GPS: ';
	echo $wynik6."<br/>\n";
	echo 'System odniesienia: ';
	echo $wynik7."<br/>\n";
	echo 'Dokładnośc: ';
	echo $wynik8.' m'."<br/>\n";
	echo 'Klasa: ';
	echo $wynik9."<br/>\n";
	echo 'Startowisko: ';
	echo $wynik0."<br/>\n"."<br/>\n";

	echo 'Czas startowy: ';
	echo $time[0]."<br/>\n";
	echo 'Współrzędne startowe: ';
	echo $coord[0][0].' ~ ';
	echo $coord[0][1]."<br/>\n";
	

	echo 'Czas lądowania: ';
	echo $time[$j-1]."<br/>\n";
	echo 'Współrzędne lądowania: ';
	echo $coord[count($coords)-1][0].' ~ ';
	echo $coord[count($coords)-1][1]."<br/>\n";
}

?>