<?php $this->load->view('templates/header');?>
    <div class="inner">
        <div class="col span_10_of_12">
            <div class="news">
                <div class="title">
                    <p>
                        <?php echo $title; ?>
                    </p>                
                </div> 
                <br><br>
                <h6>
                    <span class="ui-icon  ui-icon-pencil"></span>
                    <?php echo "教發中心於".date('Y/m/d',$post_date)."發布";?>
                </h6>
                <p>
                    <?php echo htmlspecialchars_decode($content);?>
                </p>
            </div>
            <br><br><br><br><br><br><br><br>             
        </div>
    </div>
<?php $this->load->view('templates/footer'); ?> 