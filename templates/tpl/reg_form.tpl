<div class="container mt-5">
    <h1 class="text-center">註冊表單</h1>

    

    <form  action="index.php" method="post" id="myForm" class="mb-20" enctype="multipart/form-data">
    
      <div class="row">         
        <!--帳號-->              
        <div class="col-sm-4">
          <div class="form-group">
            <label>帳號<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="uname" id="uname" value="" >
          </div>
        </div>         
        <!--密碼-->              
        <div class="col-sm-4">
          <div class="form-group">
            <label>密碼<span class="text-danger">*</span class="text-danger"></label>
            <input type="password" class="form-control" name="pass" id="pass" value="" >
          </div>
        </div>         
        <!--確認密碼-->              
        <div class="col-sm-4">
          <div class="form-group">
            <label>確認密碼<span class="text-danger">*</span class="text-danger"></label>
            <input type="password" class="form-control" name="chk_pass" id="chk_pass" value="" >
          </div>
        </div>         
        <!--姓名-->              
        <div class="col-sm-4">
          <div class="form-group">
            <label>姓名<span class="text-danger">*</span class="text-danger"></label>
            <input type="text" class="form-control" name="name" id="name" value="">
          </div>
        </div>         
        <!--電話-->              
        <div class="col-sm-4">
          <div class="form-group">
            <label>電話<span class="text-danger">*</span class="text-danger"></label>
            <input type="text" class="form-control" name="tel" id="tel" value="" >
          </div>
        </div>             
        <!--信箱-->              
        <div class="col-sm-4">
          <div class="form-group">
            <label>信箱<span class="text-danger">*</span class="text-danger"></label>
            <input type="text" class="form-control" name="email" id="email" value="" >
          </div>
        </div> 
      </div>
      <div class="text-center pb-20">
        <input type="hidden" name="op" value="reg">
        <button type="submit" class="btn btn-primary">送出</button>
      </div>
  
    </form>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
    <script>
      $(function(){
        });
      $(function(){
          $("#myForm").validate({
              submitHandler: function(form) {
                  form.submit();
              },
              rules: {
                  'uname' : {
                      required: true
                  },
                  'email' : {
                      required: true ,
                      email:true 
                    },
                  'tel' : {
                      required: true,
                      digits:true
                  }, 
                  'pass' : {
                      required: true,
                      minlength:6
                  },
                  'chk_pass' : {
                      equalTo: "#pass"    
                  },
                  'name' : {
                      required: true
                  },  

              },
              
              messages: {
                  'uname' : {
                      required: "必填"
                  },
                  'email' : {
                      required: "必填" ,
                      email:"請輸入正確格式" ,
                    },
                  'tel' : {
                      required: "必填",
                      digits:"請輸入正確格式"
                  },
                  'pass' : {
                      required: "必填",
                      minlength:"至少輸入6個數值"
                  },
                  'chk_pass' : {
                      equalTo:"密碼不一致"      
                  }, 
                  'name' : {
                      required: "必填"
                  },
              }
          });

      });
  </script>
  
  </div>