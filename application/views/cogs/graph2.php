<style>
#chartdiv {width: 100%; height: 500px;} 
</style>

<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>

<?php
$no = 0;
  foreach($bln as $b){
    /*$data1 = array();
    array_push($data1, $b['total']);
    $arrResult = Array();

    $cnt=0;
    $arrResult[$cnt] = $data1[0];
    $cnt++
    echo "<br>" . $b['total'];*/
    $array[] = $b['total'];
?>
  <script type="text/javascript">
    /*var acc = new Array ();
    var n = "<?php echo $no; ?>";
    var acc ="<?php echo $arrResult[$no]; ?>";
    document.write("" + acc);
    document.write("<br>" + n)*/
  </script>
<?php 
    $no++; 
  };
  // echo $array[0];
?>

<script>
var bln1 ="<?php echo $array[0]; ?>";
var bln2 ="<?php echo $array[1]; ?>";
var bln3 ="<?php echo $array[2]; ?>";
var bln4 ="<?php echo $array[3]; ?>";
var bln5 ="<?php echo $array[4]; ?>";
var bln6 ="<?php echo $array[5]; ?>";
var bln7 ="<?php echo $array[6]; ?>";
if (bln7 != true || bln8 != true) {
  bln7 = 0;
};
document.write(bln7);
document.write(bln8);
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
    "income": 6.7,
    "income2": 5.2,
    "expenses": 4.3,
    "wow": bln1
  }, {
    "year": "Februari",
    "income": 6.7,
    "income2": 4.2,
    "expenses": 5.6,
    "wow": bln2
  }, {
    "year": "Maret",
    "income": 6.9,
    "income2": 5.2,
    "expenses": 5.0,
    "wow": bln3
  }, {
    "year": "April",
    "income": 4.5,
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
    "year": "Juli",
    "income": 7.1,
    "income2": 6.2,
    "expenses": 4.1,
    "wow": 9.6
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