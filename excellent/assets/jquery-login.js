      $(document).ready(function(){
        $('#login_form').submit(function(e) {
          e.preventDefault(); 
          console.log("abc");
          var username = $("input[name=username]").val();
          var password = $("input[name=password]").val();
          console.log("ZZZ");
          $.ajax({
            url : "admin/ajax_login",
            type: "POST",
            data : {'username' : username ,'password' : password},
            dataType: 'json',
            success:function(rtn, textStatus, jqXHR) {
              if (rtn.status) 
              {
                window.location.href = "admin/home";
                console.log("def");
              } 
              else 
              {
                alert(rtn.msg);
                $('#login_form')[0].reset();
              }
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log(jqXHR.responseText);
                  //if fails
            }
          });
        });
      });