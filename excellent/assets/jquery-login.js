      $(document).ready(function(){
        $('#login_form').submit(function(e) {
          e.preventDefault(); 
          console.log("abc");
          var username = $("input[name=username]").val();
          var password = $("input[name=password]").val();
          $.ajax({
            url : "admin/ajax_login",
            type: "POST",
            data : {'username' : username ,'password' : password},
            dataType: 'json',
            success:function(rtn, textStatus, jqXHR) {
              if (rtn.status) {
                window.location.href = "admin/home";
                console.log("def");
                //$('.alert-success').show().html(rtn.msg);
               // $('.alert-danger').hide();
              } else {
                //$('.alert-danger').show().html(rtn.msg);
              }
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log(jqXHR.responseText);
                  //if fails
            }
          });
        });
      });