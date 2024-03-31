<?php
Yii::$app->params['h1'] = 'Page open statistics';
?>

    <div class="card card-bordered">
        <div class="card-header">
            <h3 class="card-title">Last 14 days</h3>
        </div>
        <div class="card-body">
            <div id="tt_stat_day_open" style="height: 150px;"></div>
        </div>
    </div>



<div class="mw-900px">

    <?php

    $lastRecords = \app\models\user\Stat::getLastRecords(null,100);
    $now = new DateTime( "100 days ago");
    $interval = new DateInterval( 'P1D'); //
    $period = new DatePeriod( $now, $interval, 100); //

    $trTd = '';
    foreach($period as $day) {
        $trTd = '<tr><td><b class="fs-5">'.$day->format('d.m.Y').'</b></td><td>'.intval($lastRecords[$day->format('Y-m-d')]).'</td></tr>'.$trTd;
    }

    ?>

    <div class="py-5">
        <div class="table-responsive">
            <table class="table table-row-dashed table-row-gray-300 gy-7">
                <thead>
                <tr class="fw-bolder fs-6 text-gray-800">
                    <th>Day</th>
                    <th>Views</th>
                </tr>
                </thead>
                <tbody>
                <?=$trTd?>
                </tbody>
            </table>
        </div>
    </div>




</div>




<?php
//Достаем из базы последние 7 дней

$lastRecords = \app\models\user\Stat::getLastRecords(null,14);


//Берем промежуток 7 дней
$now = new DateTime( "14 days ago");
$interval = new DateInterval( 'P1D'); // 1 Day interval
$period = new DatePeriod( $now, $interval, 14); // 7 Days

$sale_data = array();
foreach($period as $day) {
    $dates[] = $day->format('d.m');
    $dateResult[] = intval($lastRecords[$day->format('Y-m-d')]);

}

$datesImplode = implode("','",$dates);
$dateResultImplode = implode(',', $dateResult);

$script = <<< EOT_JS_CODE

$(function () {
    var element = document.getElementById('tt_stat_day_open');

    var height = parseInt(KTUtil.css(element, 'height'));
    var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
    var borderColor = KTUtil.getCssVariableValue('--bs-gray-200');
    var baseColor = KTUtil.getCssVariableValue('--bs-info');
    var lightColor = KTUtil.getCssVariableValue('--bs-light-info');

    if (!element) {
        return false;
    }

    var options = {
        series: [{
            name: 'Page opening',
            data: [$dateResultImplode]
        }],
        chart: {
            fontFamily: 'inherit',
            type: 'area',
            height: height,
            toolbar: {
                show: false
            }
        },
        plotOptions: {

        },
        legend: {
            show: false
        },
        dataLabels: {
            enabled: false
        },
        fill: {
            type: 'solid',
            opacity: 1
        },
        stroke: {
            curve: 'smooth',
            show: true,
            width: 3,
            colors: [baseColor]
        },
        xaxis: {
            categories: ['$datesImplode'],
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false
            },
            labels: {
                style: {
                    colors: labelColor,
                    fontSize: '12px'
                }
            },
            crosshairs: {
                position: 'front',
                stroke: {
                    color: baseColor,
                    width: 1,
                    dashArray: 3
                }
            },
            tooltip: {
                enabled: true,
                formatter: undefined,
                offsetY: 0,
                style: {
                    fontSize: '12px'
                }
            }
        },
        yaxis: {
            labels: {
                style: {
                    colors: labelColor,
                    fontSize: '12px'
                }
            }
        },
        states: {
            normal: {
                filter: {
                    type: 'none',
                    value: 0
                }
            },
            hover: {
                filter: {
                    type: 'none',
                    value: 0
                }
            },
            active: {
                allowMultipleDataPointsSelection: false,
                filter: {
                    type: 'none',
                    value: 0
                }
            }
        },
        tooltip: {
            style: {
                fontSize: '12px'
            }
        },
        colors: [lightColor],
        grid: {
            borderColor: borderColor,
            strokeDashArray: 4,
            yaxis: {
                lines: {
                    show: true
                }
            }
        },
        markers: {
            strokeColor: baseColor,
            strokeWidth: 3
        }
    };
    var chart = new ApexCharts(element, options);
    chart.render();
});

EOT_JS_CODE;

// значение $position может быть View::POS_READY (значение по умолчанию),
// или View::POS_LOAD, View::POS_HEAD, View::POS_BEGIN, View::POS_END
//$position = $this::POS_READY;
$this->registerJs($script, \yii\web\View::POS_END, NULL);
?>