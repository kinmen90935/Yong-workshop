<?php
  $this->load->view('templates/header');
?>
<div class="top" style="background-color:#B6DEBE;">計畫管考</div>
<div class="inner">
  <div class="col span_10_of_12"> 
    <div class="introduce">
              
      <ul>
        <li><a href="#exam">計畫管考</a></li>
      </ul>
      <div id="exam">        
        <p style="font-size:16px;"><a href="http://program.ntue.edu.tw/login.php"><span class="ui-icon ui-icon-link" ></span>計畫管考系統入口</a></p>
        <p style="color:red;"><b>計畫管考機制 </b></p>

        <p>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;本校由內部發動自我評鑑，以自我診斷、自我改善、自我調整、自我績效管考，建立動態和永續的發展機制。並進行持續性的校務品質改善，真正從教學、課程與學生的學習面向，確保學生學習成效，使每位學生具有務實與優勢的競爭力。<br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;本校教卓計畫與管考會議共分為四個層級進行，借由諮詢委員會集思廣益教卓計畫的主軸，以及各計畫主題。另透過不同層級管考會議，控管各計畫執行情形、KPI成效、經費、永續經營等各種項目，進行協調與討論，並將成果填入計畫績效管考系統，以利計畫順利執行及長期追蹤，實施方式如下：
          <img src="<?=base_url()?>assets/images/plan_exam1.png" style="margin-left:25%; width:50%; height:100%"/> 
          <img src="<?=base_url()?>assets/images/plan_exam2.png" style="width:100%; height:50%"/>
        </P>
      </div>      
    </div>
  </div>
</div> 
<?php
  $this->load->view('templates/footer');
?>