<{if $op == "op_list"}>
  <!-- Page Content -->
  <div class="container" style="margin-top: 110px;">

    <!-- Page Heading -->
    <h1 class="my-4">
      餐點訂購
    </h1>

    <div class="row">
      <{foreach $rows as $row}>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
          <div class="card h-100">
            <img class="card-img-top" src="<{$row.prod}>" alt="<{$row.title}>">
            <div class="card-body">
              <div class="card-title">
                <{$row.title}>： <{$row.price}> 元
              </div>
              <div class="mt-2">
                <a href="#" class="btn btn-primary btn-sm" onclick="add_cart(<{$row.sn}>);">加入購物車</a>
              </div>
            </div>
          </div>
        </div>

      <{/foreach}>      
    </div>
    <!-- /.row -->
    <{$bar}>

  </div>
  <!-- /.container -->
  
  <!-- sweetalert2 -->
  <link rel="stylesheet" href="<{$xoAppUrl}>class/sweetalert2/sweetalert2.min.css">
  <script src="<{$xoAppUrl}>class/sweetalert2/sweetalert2.min.js"></script>
  <script>
    function add_cart(sn){
      Swal.fire({
        title: '加入購物車？',
        // text: "您將無法還原！",
        icon: 'success',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '是的',
        cancelButtonText: '取消'
        }).then((result) => {
        if (result.value) {
            document.location.href="cart.php?op=add_cart&sn="+sn;
        }
      })
    }
</script>
<{elseif  $op == "Portfolio"}>
<{/if}>
<{if $op == "order_form"}>
  <div class="container mt-5" style="margin-top: 100px!important;>
    <h1 class="text-center">點餐訂單</h1>
    <form  role="form" action="cart.php" method="post" id="myForm" >        
      <div class="row">
          <!--姓名-->              
          <div class="col-sm-3">
              <div class="form-group">
                  <label><span class="title">姓名</span><span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="name" id="name" value="<{$row.name}>">
              </div>
          </div>
          <!--電話-->              
          <div class="col-sm-3">
              <div class="form-group">
                  <label><span class="title">電話</span><span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="tel" id="tel" value="<{$row.tel}>">
              </div>
          </div>
          <!--email-->              
          <div class="col-sm-3">
              <div class="form-group">
                  <label><span class="title">email</span><span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="email" id="email" value="<{$row.email}>">
              </div>
          </div>
                  
          <!--分類-->              
          <div class="col-sm-3">
            <div class="form-group">
                <label>桌號或外帶</label>
                <select name="kind_sn" id="kind_sn" class="form-control">
                  <{foreach $row.kind_sn_options as $option}>
                    <option value="<{$option.sn}>" <{if $option.sn == $row.kind_sn}>selected<{/if}>><{$option.title}></option>
                  <{/foreach}>
                </select>
            </div>
          </div>
      </div> 
      
      <div class="row">
          <div class="col-sm-12">  
              <!-- 聯絡事項 -->
              <div class="form-group">
                  <label class="control-label">備註</label>
                  <textarea class="form-control" rows="1" id="ps" name="ps"></textarea>
              </div>
          </div>
      </div>
        
      <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
        <tr> 
            <th scope="col" style="width:85px;">圖片</th>
            <th scope="col">餐點名稱</th>
            <th scope="col" class="text-right" style="width:120px;">價格</th>
            <th scope="col" class="text-center" style="width:120px;">數量</th>
            <th scope="col" class="text-center" style="width:120px;">小計</th>
        </tr>
        </thead>
        <tbody>
            <{foreach $smarty.session.cart as $sn => $row}>
                <tr>
                  <td><img src="<{$row.prod}>" alt="<{$row.title}>" width=80></td>
                  <td class="align-middle"><{$row.title}></td>
                  <td class="text-right align-middle price"><{$row.price}></td>
                  <td class="align-middle">
                    <input type="number" class="form-control amount text-right" name="amount[<{$row.sn}>]" id="amount" value="<{$row.amount}>" min="0" onchange="calTotal()">
                  </td>
                  <td class="text-right align-middle total">
                  </td>
                </tr>
            <{foreachelse}>
                <tr>
                    <td colspan=5>目前沒有點餐</td>
                </tr>
            <{/foreach}>
            <tr>
              <td colspan=4 class="text-right">合計</td>
              <td class="text-right" id="Total"></td>
            </tr>
        </tbody>
      </table>
  
      <!-- sweetalert2 -->
      <link rel="stylesheet" href="<{$xoAppUrl}>class/sweetalert2/sweetalert2.min.css">
      <script src="<{$xoAppUrl}>class/sweetalert2/sweetalert2.min.js"></script>
      <script>
        function op_delete(sn){
            Swal.fire({
                title: '你確定嗎？',
                text: "您將無法還原！",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '是的，刪除它！',
                cancelButtonText: '取消'
                }).then((result) => {
                if (result.value) {
                    document.location.href="prod.php?op=op_delete&sn="+sn;
                }
            })
        }
      </script>
      <div class="text-center pb-3">
        
        <input type="hidden" name="op" value="<{$row.op}>">
        <input type="hidden" name="uid" value="<{$row.uid}>">
        <button type="submit" class="btn btn-primary">送出</button>
      </div>
    </form>
  </div>
  <!-- 表單驗證 -->
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
  <!-- 調用方法 -->
  <style>
  .error{
    color:red;
  }
  </style>
  <script>
    $(function(){
      $("#myForm").validate({
      submitHandler: function(form) {
          form.submit();
      },
      rules: {
          'entry.1597864916' : {
          required: true
          },
          'entry.2110810376' : {
          required: true
          },
          'entry.1402899655' : {
          required: true
          }
      },
      messages: {
          'entry.1597864916' : {
          required: "必填"
          },
          'entry.2110810376' : {
          required: "必填"
          },
          'entry.1402899655' : {
          required: "必填"
          }
      }
      });
    });
  </script>
  <!-- 計算合計金額 -->
  <script>
    calTotal();
    //合計金額
    function calTotal(){
        // document.getElementsByClassName("title")[0].innerText //取標題
        // document.getElementsByClassName("amount")[0].value //取數量
        var prices = document.getElementsByClassName("price");
        var amounts = document.getElementsByClassName("amount");
        var Total = 0;
        for(var i=0; i < prices.length; i++){
            var price = document.getElementsByClassName("price")[i].innerText;
            var amount = document.getElementsByClassName("amount")[i].value;
            var price = parseInt(price);
            Total += (amount * price);//合計
            document.getElementsByClassName("total")[i].innerText = amount * price;//小計            
        }
        if(Total === 0){
            document.getElementById("Total").innerText = "";
        }else{
            document.getElementById("Total").innerText = Total;
        }
        
    }
  </script>
<{/if}>
<{if $op == "order_list"}>
  <div class="container mt-5" style="margin-top: 100px!important;>
    <h1 class="text-center">點餐訂單查詢</h1>      
      <div class="row">
          <!--姓名-->              
          <div class="col-sm-3">
              <div class="form-group">
                  <label><span class="title">姓名</span>
                  </label>
                  <div class="form-control"><{$order_main.name}></div>
              </div>
          </div>
          <!--電話-->              
          <div class="col-sm-3">
              <div class="form-group">
                  <label><span class="title">電話</span>
                  </label>
                  <div class="form-control"><{$order_main.tel}></div>
              </div>
          </div>
          <!--email-->              
          <div class="col-sm-3">
              <div class="form-group">
                  <label><span class="title">email</span></label>
                  <div class="form-control"><{$order_main.email}></div>
              </div>
          </div>
                  
          <!--分類-->              
          <div class="col-sm-3">
            <div class="form-group">
                <label>桌號或外帶</label>
                <div class="form-control"><{$order_main.kind_title}></div>
            </div>
          </div>
      </div> 
      
      <div class="row">
          <div class="col-sm-12">  
              <!-- 聯絡事項 -->
              <div class="form-group">
                  <label class="control-label">備註</label>
                  <div class="form-control"><{$order_main.ps}></div>
              </div>
          </div>
      </div>
        
      <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
        <tr> 
            <th scope="col" style="width:85px;">圖片</th>
            <th scope="col">餐點名稱</th>
            <th scope="col" class="text-right" style="width:120px;">價格</th>
            <th scope="col" class="text-center" style="width:120px;">數量</th>
            <th scope="col" class="text-center" style="width:120px;">小計</th>
        </tr>
        </thead>
        <tbody>
            <{foreach $rows as $row}>
                <tr>
                  <td><img src="<{$row.prod}>" alt="<{$row.title}>" width=80></td>
                  <td class="align-middle"><{$row.title}></td>
                  <td class="text-right align-middle price"><{$row.price}></td>
                  <td class="align-middle text-right">
                    <{$row.amount}>
                  </td>
                  <td class="text-right align-middle total">
                    <{$row.total}>
                  </td>
                </tr>
            <{/foreach}>
            <tr>
              <td colspan=4 class="text-right">合計</td>
              <td class="text-right" id="Total">
                <{$order_main.total}>
              </td>
            </tr>
        </tbody>
      </table>
  </div>
<{/if}>