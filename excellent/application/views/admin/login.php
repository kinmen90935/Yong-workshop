<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>國立臺北教育大學教發中心後臺管理系統</title>
    <style type="text/css">
      body {background-color: #EFEFEF}
      #container {width: 400px;margin: 0 auto; position: relative;margin-top: 100px; text-align: center;}
      #login_form {
        margin-right: auto;
        margin-left: auto;
        background: #FFF;
        padding:10px;
        box-shadow:rgba(122, 122, 122, 0.7) 0 3px 10px -1px;
        -webkit-box-shadow:rgba(122, 122, 122, 0.7) 0 3px 10px -1px;
        color: #666;
      }
      #login_form span {
        display: block;
        font-size: 12px;
        color: #C4C2C2;
      }
      #login_form label {
        display: block;
        margin: 0px 0px 5px;
      }
      #login_form label>span {
        float: left;
        width: 80px;
        text-align: right;
        padding-right: 10px;
        margin-top: 10px;
        color: #969696;
      }
      #login_form input[type="text"], #login_form  input[type="password"]{
        color: #555;
        width: 80%;
        padding: 3px 3px 3px 8px;
        margin-top: 2px;
        margin-right: 6px;
        margin-bottom: 16px;
        border: 1px solid #e5e5e5;
        background: #fbfbfb;
        outline: 0;
        -webkit-box-shadow: inset 1px 1px 2px rgba(200,200,200,0.2);
        box-shadow: inset 1px 1px 2px rgba(200,200,200,0.2);
        font: normal 12px/24px Arial, Helvetica, sans-serif;
      }
      .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
        color: #fff;
        background-color: #428bca;
        border-color: #357ebd;
        width: 100%;
      }
    </style>
    <script src=<?php echo base_url();?>assets/jquery-1.11.2.min.js></script>
    <script src=<?php echo base_url();?>assets/jquery-login.js></script>
  </head>
  <body>
    <div id="container">
      <img src="<?=base_url()?>assets/images/logo.png" width='200' alt="教發中心後臺登入頁面">
      <h2>
        教學卓越後台登入系統
      </h2>
      <form id="login_form" method="post">
        <input type="text" placeholder="帳號" id="username" name="username"/><br>
        <div class="alert alert-danger" style="display:none"></div>
        <div class="alert alert-success" style="display:none"></div>
        <input type="password" placeholder="密碼"  id="password" name="password"/><br>
        <div class="alert alert-danger" style="display:none"></div>
        <div class="alert alert-success" style="display:none"></div>
        <input type="submit" class="btn" id="btnLogin" value="登入"></input>
      </form>
    </div>
    
  </body>
</html>