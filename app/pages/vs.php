<?php
$UI=\CORE\UI::init();
$UI->pos['js'].='<script src="./ui/ext/js/Chart.min.js"></script>';
$UI->pos['js'].='
<script>
$(document).ready(function() {

var ctx1 = document.getElementById("chart_1").getContext("2d");
var ctx2 = document.getElementById("chart_2").getContext("2d");
var ctx3 = document.getElementById("chart_3").getContext("2d");
var ctx4 = document.getElementById("chart_4").getContext("2d");

var data1 = {
    labels: ["2013-2014", "2014-2015", "2015-2016"],
    datasets: [
        {
            label: "умуми",
            fillColor: "rgba(0,33,201,0.7)",
            strokeColor: "rgba(0,33,201,0.8)",
            highlightFill: "rgba(0,33,201,0.75)",
            highlightStroke: "rgba(0,33,201,1)",
            data: [110, 119, 125]
        },
        {
            label: "бучети",
            fillColor: "rgba(24,167,0,0.7)",
            strokeColor: "rgba(24,167,0,0.8)",
            highlightFill: "rgba(24,167,0,0.75)",
            highlightStroke: "rgba(24,167,0,1)",
            data: [90, 90, 90]
        },
        {
            label: "гайрибучети",
            fillColor: "rgba(217,214,0,0.7)",
            strokeColor: "rgba(217,214,0,0.8)",
            highlightFill: "rgba(217,214,0,0.75)",
            highlightStroke: "rgba(217,214,0,1)",
            data: [20, 29, 35]
        }
    ]
};

var myChart1 = new Chart(ctx1).Bar(data1);

var data2 = [
    {
        value: 19,
        color: "#3cd451",
        highlight: "#52ff6a",
        label: "Шохмансур"
    },
    {
        value: 26,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "И.Сомони"
    },
    {
        value: 28,
        color:"#F7464A",
        highlight: "#FF5A5E",
        label: "Фирдавси"
    },
    {
        value: 52,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Сино"
    }
]

var myChart2 = new Chart(ctx2).Doughnut(data2);

var data3 = {
    labels: ["2013-2014", "2014-2015", "2015-2016"],
    datasets: [
        {
            label: "умуми",
            fillColor: "rgba(211,18,18,0.7)",
            strokeColor: "rgba(211,18,18,0.8)",
            highlightFill: "rgba(211,18,18,0.75)",
            highlightStroke: "rgba(211,18,18,1)",
            data: [24007, 25895, 27446]
        },
        {
            label: "бучети",
            fillColor: "rgba(120,59,211,0.7)",
            strokeColor: "rgba(120,59,211,0.8)",
            highlightFill: "rgba(120,59,211,0.75)",
            highlightStroke: "rgba(120,59,211,1)",
            data: [20940, 22044, 23017]
        },
        {
            label: "гайрибучети",
            fillColor: "rgba(212,100,0,0.7)",
            strokeColor: "rgba(212,100,0,0.8)",
            highlightFill: "rgba(212,100,0,0.75)",
            highlightStroke: "rgba(212,100,0,1)",
            data: [3067, 3851, 4429]
        }
    ]
};

var myChart3 = new Chart(ctx3).Bar(data3);

var data4 = [
    {
        value: 12838,
        color: "#948ff6",
        highlight: "#b5b1f7",
        label: "Сино"
    },
    {
        value: 3788,
        color: "#4e48cd",
        highlight: "#8c88d9",
        label: "Шохмансур"
    },
    {
        value: 3332,
        color: "#07008d",
        highlight: "#1710a4",
        label: "И.Сомони"
    },
    {
        value: 7488,
        color:"#1b11e2",
        highlight: "#382fef",
        label: "Фирдавси"
    }
    
]

var myChart4 = new Chart(ctx4).Pie(data4);



});
</script>

';
$this->pos['main']='
<h3 class="text-center text-primary"><strong>'.\CORE::t('dvs','Data visualization').':</strong></h3>
<br>
<br>
<div class="row text-center">
    <div class="col-sm-6">
<strong>Шумораи умумии муассисаҳои томактабӣ дар шаҳри Душанбе (125 муассиса)</strong><br><br>
<canvas id="chart_1" width="480" height="320"></canvas>
    </div>
    <div class="col-sm-6">
<strong>Шумораи умумии муассисаҳои томактабӣ дар шаҳри Душанбе 
(вобаста ба ноҳияҳо) дар соли таҳсили 2015-2016</strong><br><br>
<canvas id="chart_2" width="480" height="320"></canvas>
    </div>
</div>
<br>
<br>
<div class="row text-center">
    <div class="col-sm-6">
<strong>Шумораи умумии тарбиятгирандагони муассисаҳои томактабӣ дар шаҳри Душанбе</strong><br><br>
<canvas id="chart_3" width="480" height="320"></canvas>
    </div>
    <div class="col-sm-6">
<strong>Шумораи умумии  тарбиятгирандагони муассисаҳои томактабӣ 
дар шаҳри Душанбе (вобаста ба ноҳияҳо) дар соли таҳсили 2015-2016</strong><br><br>
<canvas id="chart_4" width="480" height="320"></canvas>
    </div>
</div>
<br>
<br>


<div class="row text-center">
    <div class="col-sm-6">
        <img src="./ui/img/diag1/1.png" border="0">
    </div>
    <div class="col-sm-6">
        <img src="./ui/img/diag1/2.png" border="0">
    </div>
</div>
<br>
<br>
<div class="row text-center">
    <div class="col-sm-6">
        <img src="./ui/img/diag1/3.png" border="0">
    </div>
    <div class="col-sm-6">
        <img src="./ui/img/diag1/4.png" border="0">
    </div>
</div>
<br>
<br>
<div class="row text-center">
    <div class="col-sm-6">
        <img src="./ui/img/diag1/5.png" border="0">
    </div>
    <div class="col-sm-6">
        <img src="./ui/img/diag1/6.png" border="0">
    </div>
</div>
<br>
<br>
<div class="row text-center">
    <div class="col-sm-6">
        <img src="./ui/img/diag1/7.png" border="0">
    </div>
    <div class="col-sm-6">

    </div>
</div>
<br>
<br>
';