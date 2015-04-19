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
                            <small><?  echo date("Y-m-d");?>歡迎<b><?php echo $member_data['name'] ?></b>使用數學增能平台</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> 起源:實施十年的教師檢定考試制度，今年三月有較大的變革，國小類科教師檢定除了原有的四科外，加考包含普通數學知識和數學教材教法的能力測驗，面對這項改革，本計畫擬由制度面全盤理解並建立師資生的數學素養。
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!--
                提示信息
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                        </div>
                    </div>
                </div>
                 /.row -->

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">26</div>
                                        <div>新討論!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left"><a href="/calculate/message">瞭解更多..</a></span>
                                    <span class="pull-right"><a href="/calculate/message"><i class="fa fa-arrow-circle-right"></i></a></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-gear fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $member_data['login_times'] ?></div>
                                        <div>登入次數</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">瞭解更多..</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-star fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $member_data['total_point'] ?></div>
                                        <div>目前積分</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">瞭解更多..</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2>積分排行榜 TOP 5</h2>

                        <?php
                            foreach ($top_member_list as $key => $member) {
                            $rank = $key + 1;
                        ?>
                            <li style="list-style:none;">
                                <img width="40" height="40" src="<?php echo base_url(); ?>assets/img/profile_small.png">
                                <a href="departmentNetwork.php?m_id=1">【<?php echo $rank?>】<?php echo $member['unit_title']; ?> <?php echo $member['name']?></a>
                                <div class="progress">
                                  <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $member['total_point']?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $member['total_point']?>%">
                                    <span class="sr-only"><?php echo $member['total_point']?>% Complete (success)</span>
                                  </div>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">

                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> 即時動態區</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <span class="badge">2014/12/15</span>
                                        <i class="fa fa-fw fa-check"></i> 修正補登記分數錯誤
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">2014/12/9</span>
                                        <i class="fa fa-fw fa-check"></i> 新增回覆討論功能
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">2014/12/9</span>
                                        <i class="fa fa-fw fa-check"></i> 建置作業討論區
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">2014/12/9</span>
                                        <i class="fa fa-fw fa-check"></i> 建立會員管理機制
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">2014/12/9</span>
                                        <i class="fa fa-fw fa-check"></i> 建置填寫登記分數表單
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <span class="badge">2014/12/9</span>
                                        <i class="fa fa-fw fa-check"></i> 建置highchart圖表
                                    </a>
                                </div>
                                <div class="text-right">
                                    <a href="#">查看更多... <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
<?php
    $this->load->view('templates/footer');
?>