<?php
Yii::$app->params['h1'] = 'Dashboard';
?>
<div class="mw-900px">
    <div class="d-flex mb-5 align-items-md-center  border-bottom pb-5 border-1">
        <a href="/acp/profile/" class="d-flex flex-column flex-md-row w-100  align-items-md-center text-dark text-hover-primary">
            <div class="symbol symbol-100px symbol-circle me-5 mb-2 mb-md-0">
                <img src="<?=(!empty($user->photo->src) ? $user->photo->src : '/panel_assets/media/svg/avatars/blank.svg')?>" alt="" class=" img-fit-cover"/>
            </div>
            <div class="flex-grow-1">
                <div class="fs-3 fw-boldest">
                    <div class="text-gray-600 fs-6 fw-bold">Your ID #<?=$user['id']?></div>
                    <?=$user['firstName']?> <?=$user['lastName']?>
                </div>
                <div class="text-muted diplomaItemDescription">
                    <?=$user['role']?>
                </div>
            </div>
        </a>
        <div class="flex-column d-flex position-absolute position-md-relative end-0 me-5 me-md-0">
            <a href="/acp/profile/"  type="button" class="btn btn-sm btn-white mb-2  text-nowrap border-dotted border-1 border-gray-400"><span class="svg-icon svg-icon-1"><i class="bi bi-pencil-square  text-danger"></i></span> Edit profile</a>
        </div>
    </div>



    <div class="card card-bordered">
        <div class="card-header">
            <h3 class="card-title">Page Statistics</h3>
            <div class="card-toolbar">
                <a href="/acp/stat/" class="btn btn-sm btn-light">
                    View All
                </a>
            </div>
        </div>
        <div class="card-body">
            <div id="tt_stat_day_open" style="height: 350px;"></div>
        </div>
    </div>
</div>


<?php
//Достаем из базы последние 7 дней

$lastRecords = \app\models\user\Stat::getLastRecords();


//Берем промежуток 7 дней
$now = new DateTime( "7 days ago");
$interval = new DateInterval( 'P1D'); // 1 Day interval
$period = new DatePeriod( $now, $interval, 7); // 7 Days

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


<? //$this->registerJsFile("/panel_assets/js/profile/char_last_stat.js", ['depends' => ['app\assets\AcpAsset']]);  ?>