<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
} 
</style>

<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<!-- Chart code -->

<?php
	  foreach($bln as $b){
	    $array[] = $b['total'];
	  };

	  foreach($rev as $r){
	    $rvn[] = $r['total'];
	  };
?>
<script>
var bln1 ="<?php echo $array[0]; ?>"

var rvn1 ="<?php echo $rvn[0]; ?>"*-1;
var rvn2 ="<?php echo $rvn[1]; ?>"*-1;
var rvn3 ="<?php echo $rvn[2]; ?>"*-1;
var rvn4 ="<?php echo $rvn[3]; ?>"*-1;


if (bln7 != true) {
  bln7 = 0;
};
document.write(rvn1);
var chart = AmCharts.makeChart( "chartdiv", {
  "type": "serial",
  "addClassNames": true,
  "theme": "light",
  "autoMargins": false,
  "marginLeft": 30,
  "marginRight": 8,
  "marginTop": 10,
  "marginBottom": 26,
  "balloon": {
    "adjustBorderColor": false,
    "horizontalPadding": 10,
    "verticalPadding": 8,
    "color": "#ffffff"
  },

  "dataProvider": [ {
    "year": "Januari",
    "income": rvn1,
    "income2": 5.2,
    "expenses": 4.3,
    "wow": bln1
  }, {
    "year": "Februari",
    "income": rvn2,
    "income2": 4.2,
    "expenses": 5.6,
    "wow": bln2
  }, {
    "year": "Maret",
    "income": rvn3,
    "income2": 5.2,
    "expenses": 5.0,
    "wow": bln3
  }, {
    "year": "April",
    "income": rvn4,
    "income2": 5.2,
    "expenses": 3.1,
    "wow": bln4
  }, {
    "year": "Mei",
    "income": 5.8,
    "income2": 3.2,
    "expenses": 4.2,
    // "dashLengthLine": 5,
    "wow": bln5
  }, {
    "year": "Juni",
    "income": 7.1,
    "income2": 6.2,
    "expenses": 4.1,
    "wow": bln6
  }, {
    "year": "Agustus"
    // "income": 29.5,
    // "expenses": 31.1
  }, {
    "year": "September"
    // "income": 29.5,
    // "expenses": 31.1
  }, {
    "year": "Oktober"
    // "income": 29.5,
    // "expenses": 31.1
  }, {
    "year": "November"
    // "income": 29.5,
    // "expenses": 31.1
  }, {
    "year": "Desember"
    // "income": 29.5,
    // "expenses": 31.1
  }],
  "valueAxes": [ {
    "axisAlpha": 0,
    "position": "left"
  } ],
  "startDuration": 1,
  "graphs": [ {
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Revenue",
    "type": "column",
    "valueField": "income",
    "dashLengthField": "dashLengthColumn"
  }, {
    "alphaField": "alpha",
    "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
    "fillAlphas": 1,
    "title": "Revenue",
    "type": "column",
    "valueField": "income2",
    "dashLengthField": "dashLengthColumn"
  }, {
    "id": "graph2",
    "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
    "bullet": "round",
    "lineThickness": 3,
    "bulletSize": 7,
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "useLineColorForBulletBorder": true,
    "bulletBorderThickness": 3,
    "fillAlphas": 0,
    "lineAlpha": 1,
    "title": "Target",
    "valueField": "expenses",
    "dashLengthField": "dashLengthLine"
  }, {
    "id": "graph3",
    "balloonText": "<span style='font-size:12px;'>[[title]] in [[category]]:<br><span style='font-size:20px;'>[[value]]</span> [[additional]]</span>",
    "bullet": "round",
    "lineThickness": 3,
    "bulletSize": 7,
    "bulletBorderAlpha": 1,
    "bulletColor": "#FFFFFF",
    "useLineColorForBulletBorder": true,
    "bulletBorderThickness": 3,
    "fillAlphas": 0,
    "lineAlpha": 1,
    "title": "COGS",
    "valueField": "wow",
    "dashLengthField": "dashLengthLine"
  } ],
  "categoryField": "year",
  "categoryAxis": {
    "gridPosition": "start",
    "axisAlpha": 0,
    "tickLength": 0
  },
  "export": {
    "enabled": true
  }
} );
</script>

<!-- HTML -->
<div id="chartdiv"></div> 