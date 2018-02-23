<?php
/*echo "COGS<br>";
foreach ($fz2_ytd_cogs as $cogs) {
	$cogsf 	= $cogs->cogs;
	$fcogs 	= number_format($cogsf,2,",",".");
	echo "Area: " . $cogs->area . "<br>";
	echo "COGS: " . $fcogs . "<br>";
	echo "<br>";
}

echo "<hr>";

echo "Revenue<br>";
foreach ($fz2_ytd_rev as $rev) {
		$totalrev 	= $rev->rev;
		$negone 	= -1;
		$finalrev 	= $totalrev * $negone;
		$frev 		= number_format($finalrev,2,",",".");
		echo "Area: " . $rev->area . "<br>";
		echo "Revenue: " . $frev . "<br>";
		echo "<br>";
}

echo "<hr>";*/

/*$net = [];
foreach($fz2_ytd_rev as $key=>$value){
	$totalrev 	= $value->rev;
	$negone 	= -1;
	$finalrev 	= $totalrev * $negone;
	if($value->area == $fz2_ytd_cogs[$key]->area){
		array_push($net,($finalrev-$fz2_ytd_cogs[$key]->cogs));
	}

		$cogs 		= $fz2_ytd_cogs[$key]->cogs;
		$fcogs 		= number_format($cogs,2,",",".");
		$frev 		= number_format($finalrev,2,",",".");
		echo "Area: " . $value->area . "<br>";
		echo "COGS: " . $fcogs . "<br>";
		echo "Revenue: " . $frev . "<br>";

		for ($i=0; $i < count($net); $i++) { 
			echo "Net Income: " . $net[$i] . "<hr>";
		}

}*/	

				$net = [];
				$tambah = 0;
                  foreach($fz2_ytd_rev as $key=>$value){
                    $totalrev   = $value->rev;
                    $negone   = -1;
                    $finalrev   = $totalrev * $negone;
                    if($value->area == $fz2_ytd_cogs[$key]->area){
                      array_push($net,($finalrev-$fz2_ytd_cogs[$key]->cogs));
                    }

                      $cogs     = $fz2_ytd_cogs[$key]->cogs;
                      /*$cogs     += $cogs;
                      $finalrev += $finalrev;*/

                      $fcogs    = number_format($cogs,2,",",".");
                      $frev     = number_format($finalrev,2,",",".");
                      $netin    = number_format($net[$key],2,",",".");

                      //$netin    += $netin;

                      /*echo "<td>" . $fcogs . "</td>";
                      echo "<td>" . $finalrev . "</td>";
                      echo "<td>" . $netin . "</td>";*/

                      $tambah 	+= $cogs;
                  }
                  
                  $fcogs    = number_format($tambah,2,",",".");
                  echo $fcogs;
?>


<?php 
    $a = count($klasifikasi);
   for ($i=0; $i < count($klasifikasi); $i++) { 
      if ($i < $a) {
  ?>
        {
        "klasifikasi"   : "<?=$arraykla[$i];?>",
        "jumlah"        : <?=$arraytot[$i];?>
        },
  <?php
      } elseif ($i = $a) {
  ?>
        {
        "klasifikasi"   : "<?=$arraykla[$i];?>",
        "jumlah"        : <?=$arraytot[$i];?>
        }
  <?php
      }
    }
  ?>

  <?php 
    $a = count($klasifikasi);
   for ($i=0; $i < count($klasifikasi); $i++) { 
  ?>
      {
        "klasifikasi"   : "<?=$arraykla[$i];?>",
        "jumlah"        : <?=$arraytot[$i];?>
      },
  <?php
      if ($i = $a) {
  ?>
        {
        "klasifikasi"   : "<?=$arraykla[$i];?>",
        "jumlah"        : <?=$arraytot[$i];?>
        } 
  <?php
      }
    }
  ?>


  "dataProvider": [
  {
    "klasifikasi"   : "ALKER,SALKER,KBM",
    "total"        : 128369950  }, 
  {
    "klasifikasi"   : "AMORTISASI",
    "total"        : 9101380  }, 
  {
    "klasifikasi"   : "BBM",
    "total"        : 161588744  }, 
  {
    "klasifikasi"   : "DEPRESIASI",
    "total"        : 440389068  }, 
  {
    "klasifikasi"   : "GAJI",
    "total"        : 2763808115  }, 
  {
    "klasifikasi"   : "MATERIAL ALISTA",
    "total"        : 3176227326  }, 
  {
    "klasifikasi"   : "PENGELUARAN IF",
    "total"        : 241542492  }, 
  {
    "klasifikasi"   : "SEWA GEDUNG",
    "total"        : 200000  }, 
  {
    "klasifikasi"   : "SEWA KBM",
    "total"        : 3850000  }, 
  {
    "klasifikasi"   : "SPPD",
    "total"        : 19529250  }, 
{
    "klasifikasi"   : "TAGIHAN MITRA",
    "total"        : 1516134505  }
  ]



var chart = AmCharts.makeChart( "chartdiv_evaluasi", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [ {
    "klasifikasi"   : "ALKER,SALKER,KBM",
    "jumlah"        : -128369950  }, {
    "klasifikasi"   : "AMORTISASI",
    "jumlah"        : 9101380  }, {
    "klasifikasi"   : "BBM",
    "jumlah"        : 161588744  }, {
    "klasifikasi"   : "DEPRESIASI",
    "jumlah"        : 440389068  }, {
    "klasifikasi"   : "GAJI",
    "jumlah"        : 2763808115  }, {
    "klasifikasi"   : "MATERIAL ALISTA",
    "jumlah"        : 3176227326  }, {
    "klasifikasi"   : "PENGELUARAN IF",
    "jumlah"        : 241542492  }, {
    "klasifikasi"   : "SEWA GEDUNG",
    "jumlah"        : 200000  }, {
    "klasifikasi"   : "SEWA KBM",
    "jumlah"        : 3850000  }, {
    "klasifikasi"   : "SPPD",
    "jumlah"        : 19529250  }, {
    "klasifikasi"   : "TAGIHAN MITRA",
    "jumlah"        : 1516134505  } ],
  "valueField": "jumlah",
  "titleField": "klasifikasi",
  "outlineAlpha": 0,
  "depth3D": 15,
  "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[jumlah]]</b></span>",
  "marginTop":0,
  "marginBottom":0,
  "angle": 30,
  "labelRadius": 0.5,
  "export": {
    "enabled": true
  }
} );


<script>
var chart = AmCharts.makeChart( "chartdiv_evaluasi", {
  "type": "pie",
  "theme": "light",
 "dataProvider": [ <?php $i = $count($cogs_klasifikasi_all)-1; foreach($cogs_klasifikasi_all as $key=>$value) { if($i != $key) { ?>{
  "klasifikasi"   : "ALKER,SALKER,KBM",
  "jumlah"        : -128369950  }, <?php } else {?>{
  "klasifikasi"   : "ALKER,SALKER,KBM",
  "jumlah"        : -128369950  } <?php } } ?> ],
  "valueField": "jumlah",
  "titleField": "klasifikasi",
  "outlineAlpha": 0,
  "depth3D": 15,
  "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[jumlah]]</b></span>",
  "marginTop":0,
  "marginBottom":0,
  "angle": 30,
  "labelRadius": 0.5,
  "export": {
    "enabled": true
  }
} );
</script>


<?php 
      foreach ($cogs_per_klasifikasi as $key => $value) {
    ?>
      {
        "period"              : <?=$arrayperiod[$key];?>,
        "pengeluaranbatang"   : <?=$arraypenglubang[$value];?>,
        "pengeluarangaris"    : <?=$arraypenglugar[$value];?>
      }, 
    <?php 
      } 
    ?>