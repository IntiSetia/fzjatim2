<?php
//error_reporting(0);
$percat 	= [];
$latestperiod = 0;
$maxperiod =  0;


foreach ($cogs_all_per_klasifikasi as $a) {
	$klasifikasi 	= $a['klasifikasi'];
	/*$tampil 		= array_unique($klasifikasi);*/
	echo $klasifikasi . "<br>";

	/*$period 		= $a['posting_period'];
	array_push($percat, $period);
	print_r($percat);
	if($latestperiod > $maxperiod){
		$maxperiod = $latestperiod;
	}
	$latestperiod  = $period;
	echo $latestperiod;*/
}


/*$temp = array();
foreach ($cogs_all_per_klasifikasi as $m) {
  if (!in_array($m[0], $temp)) {
    echo $m;
    $temp[] = $m[0];
  }
}

/*bikin variabel array buat masukin datanya per category 
per category maksudnya Pik? 
begitu kah?
iya tep 
terus gini bentar aku mikir sia
bikin variabel max category
$percatnya jadiin multidimensi
terus nanti 
Cara njadikan multidimensi? .-.
gitu juga bisa seh

gimana ya dapetin max periodnya :3
nambah model boleh?

Sobatku tidur nih keknyaa

Gutten nitee ^_^*/

?>