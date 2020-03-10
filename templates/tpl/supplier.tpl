<{if $op=="op_list"}>
    <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
        <tr> 
            <th scope="col">公司名稱</th>
            <th scope="col">業務代表</th>
            <th scope="col" class="text-right">電話</th>
            <th scope="col" class="text-center">email</th>
            <th scope="col" class="text-center">狀態</th>
            <th scope="col" class="text-center">
                <a href="?op=op_form"><i class="fas fa-plus-square"></i>新增</a>
            </th>
        </tr>
        </thead>
        <tbody>
            <{foreach $rows as $row}>
                <tr>

                    <td class="align-middle"><{$row.name}></td>
                    <td class="align-middle"><{$row.sales_represent}></td>
                    <td class="text-right align-middle"><{$row.phone}></td>
                    <td class="text-center align-middle"><{$row.email}></td>
                    <td class="text-center align-middle"><{if $row.enable}><i class="fas fa-check"></i><{/if}></td>
                    <td class="text-center align-middle">
                        <a href="?op=op_form&zn=<{$row.zn}>"><i class="far fa-edit"></i></a>
                        <a href="javascript:void(0)" onclick="op_delete(<{$row.zn}>);"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <{foreachelse}>
                <tr>
                    <td colspan=5>目前沒有資料</td>
                </tr>
            <{/foreach}>

        </tbody>
    </table>
    
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<{$xoAppUrl}>class/sweetalert2/sweetalert2.min.css">
    <script src="<{$xoAppUrl}>class/sweetalert2/sweetalert2.min.js"></script>
    <script>
        function op_delete(zn){
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
                    document.location.href="supplier.php?op=op_delete&zn="+zn;
                }
            })
        }
    </script>
<{/if}>
<{if $op=="op_form"}>
    
    <div class="container">        
        <form action="supplier.php" method="post" id="myForm" class="mb-2" enctype="multipart/form-data">


            <div class="row">         
                <!--公司名稱-->              
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>公司名稱<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" value="<{$row.name}>" >
                    </div>
                </div>                            
                <!--電話-->              
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>電話</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="<{$row.phone}>">
                    </div>
                </div>
                 <!--email-->              
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>email</label>
                        <input type="text" class="form-control" name="email" id="email" value="<{$row.email}>">
                    </div>
                </div>   
                 <!--業務代表-->              
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>業務代表</label>
                        <input type="text" class="form-control" name="sales_represent" id="sales_represent" value="<{$row.sales_represent}>">
                    </div>
                </div>
                  <!-- 商品狀態  -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label style="display:block;">商品狀態</label>
                        <input type="radio" name="enable" id="enable_1" value="1" <{if $row.enable=='1'}>checked<{/if}>>
                        <label for="enable_1" style="display:inline;">啟用</label>&nbsp;&nbsp;
                        <input type="radio" name="enable" id="enable_0" value="0" <{if $row.enable=='0'}>checked<{/if}>>
                        <label for="enable_0" style="display:inline;">停用</label>
                    </div>
                </div>  
                 <!--地址-->              
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>地址</label>
                        <input type="text" class="form-control" name="address" id="address" value="<{$row.address}>">
                    </div>
                </div>                   
            </div>
            
            <div class="text-center pb-20">
            <input type="hidden" name="op" value="<{$row.op}>">
            <input type="hidden" name="zn" value="<{$row.zn}>">
            <button type="submit" class="btn btn-primary">送出</button>
            </div>
        
        </form>
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
                        'title' : {
                            required: true
                        }
                    },
                    messages: {
                        'title' : {
                            required: "必填"
                        }
                    }
                });
            });
        </script>
        <script type='text/javascript' src='<{$xoAppUrl}>class/My97DatePicker/WdatePicker.js'></script>
        
    </div>
<{/if}>