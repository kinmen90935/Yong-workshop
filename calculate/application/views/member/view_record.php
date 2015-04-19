<?php
    $this->load->view('templates/header');
    $this->load->view('templates/nav');
?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?= $member_data["name"];?>填寫紀錄
                            <input type="hidden" id="select_member_id" value="<?= $member_data["m_id"];?>">
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/calculate/intro">個人主頁</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/calculate/member/index">參賽管理</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> <a href="#">檢視分數</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>周次</th>
                                        <th>時間</th>
                                        <th>成績</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($game_range as $key => $game_week) {
                                    ?>
                                    <tr>
                                        <td>第<?= $game_week['num_of_week']; ?>週</td>
                                        <td><?= $game_week['week_start']; ?> ~ <?= $game_week['week_end']; ?></td>
                                        <td>
                                        <?php
                                            if ($game_week['record']) {
                                                echo "作答得分： " . $game_week['record']['score'] . '<br>';
                                                echo "完成次數： " . $game_week['record']['finish_times'] . '<br>';
                                                echo "花費時間： " . $game_week['record']['cost_times'] . '<br>';
                                                echo "獲得積分： " . $game_week['record']['point'];
                                            } else {
                                                echo "缺";
                                            }
                                        ?>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr>
                                        <th colspan="3">總積分： <?= $total_point;?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            成績圖表
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="/calculate/intro/view">個人主頁</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i> 成績圖表
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="highchart row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> 成績表現</h3>
                            </div>
                            <div class="panel-body">
                                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="highchart row">
                    <div class="col-lg-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> 分幾次完成</h3>
                            </div>
                            <div class="panel-body">
                                <div id="columnContainer1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> 每次作答花費時間</h3>
                            </div>
                            <div class="panel-body">
                                <div id="columnContainer2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<script>
$(function () {
    var m_id = $('#select_member_id').val();
    $.get('<?= base_url()?>record/ajax_get_record', {'m_id' : m_id}, function(rtn) {
        if (rtn.status) {
            var categories_data = rtn.write_time;
            var datas = {
                name: '測驗分數',
                data: rtn.score
            };
            exportHighchart(categories_data, datas);

            //分幾次完成
            var series_data = {
                name: '分幾次完成',
                data: rtn.finish_times
            };
            exportColumnChart($('#columnContainer1'), categories_data, series_data, '分幾次完成', '次數');

            //花費時間
            var series_data = {
                name: '花費時間',
                data: rtn.cost_times
            };
            exportColumnChart($('#columnContainer2'), categories_data, series_data, '花費時間', '分鐘');
        } else {
            $('.highchart').html('查無資料');
        }
    }, 'json');

});

function exportColumnChart($chart, categories_data, series_data, chart_title, unit) {
    var chart1 = new Highcharts.Chart({
        chart: {
            renderTo: $chart.attr('id'),
            type: 'column'
        },
        title: {
            text: chart_title
        },
        subtitle: {
            text: '國立臺北教育大學師培中心'
        },
        xAxis: {
            categories: categories_data
        },
        yAxis: {
            min: 0,
            title: {
                text: unit
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} ' + unit + '</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [series_data]
    });
}

function exportHighchart(categories_data, datas) {
    $('#container').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: '每周成績趨勢圖'
        },
        subtitle: {
            text: '國立臺北教育大學師培中心'
        },
        xAxis: {
            categories: categories_data
        },
        yAxis: {
            title: {
                text: '測驗分數'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [datas]
    });
}

</script>
<?php
    $this->load->view('templates/footer');
?>