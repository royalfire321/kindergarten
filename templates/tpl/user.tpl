<{if $op=="op_list"}>
    <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
        <tr>
            <th scope="col">帳號</th>
            <th scope="col">姓名</th>
            <th scope="col">電話</th>
            <th scope="col">EMAIL</th>
            <th scope="col">狀態</th>
            <th scope="col">功能</th>
        </tr>
        </thead>
        <tbody>
            <{foreach $rows as $row}>
                <tr>
                    <td><{$row.uname}></td>
                    <td><{$row.name}></td>
                    <td><{$row.tel}></td>
                    <td><{$row.email}></td>
                    <td><{if $row.kind}><i class="fas fa-user-check"></i><{/if}></td>
                    <td>
                        <a href="user.php?op=op_form&uid=<{$row.uid}>"><i class="far fa-edit"></i></a>
                        <a href="javascript:void(0)" onclick="op_delete(<{$row.uid}>);"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <{foreachelse}>
                <tr>
                    <td colspan=6>目前沒有資料</td>
                </tr>
            <{/foreach}>

        </tbody>
    </table>
    
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<{$xoAppUrl}>class/sweetalert2/sweetalert2.min.css">
    <script src="<{$xoAppUrl}>class/sweetalert2/sweetalert2.min.js"></script>
    <script>
        function op_delete(uid){
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
                    document.location.href="user.php?op=op_delete&uid="+uid;
                }
            })
        }
    </script>
<{/if}>
<{if $op=="op_form"}>
    
    <div class="container">
        <h1 class="text-center">會員表單</h1>
        
        <form action="user.php" method="post" id="myForm" class="mb-2" enctype="multipart/form-data">
        
            <div class="row">         
                <!--帳號-->              
                <div class="col-sm-4">
                    <div class="form-group">
                    <label>帳號<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="uname" id="uname" value="<{$row.uname}>" readonly>
                    </div>
                </div>         
                <!--密碼-->              
                <div class="col-sm-4">
                    <div class="form-group">
                    <label>密碼</label>
                    <input type="text" class="form-control" name="pass" id="pass" value="">
                    </div>
                </div>
                <!-- 會員狀態  -->
                <div class="col-sm-4">
                    <div class="form-group">
                    <label style="display:block;">會員狀態</label>
                    <input type="radio" name="kind" id="kind_1" value="1" <{if $row.kind=='1'}>checked<{/if}>>
                    <label for="kind_1" style="display:inline;">管理員</label>&nbsp;&nbsp;
                    <input type="radio" name="kind" id="kind_0" value="0" <{if $row.kind=='0'}>checked<{/if}>>
                    <label for="kind_0" style="display:inline;">會員</label>
                    </div>
                </div>  
                <!--姓名-->              
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>姓名<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="<{$row.name}>">
                    </div>
                </div>         
                <!--電話-->              
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>電話<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="tel" id="tel" value="<{$row.tel}>">
                    </div>
                </div>             
                <!--信箱-->              
                <div class="col-sm-12">
                    <div class="form-group">
                    <label>信箱<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="email" id="email" value="<{$row.email}>">
                    </div>
                </div> 
            </div>
            <div class="text-center pb-20">
            <input type="hidden" name="op" value="op_update">
            <input type="hidden" name="uid" value="<{$row.uid}>">
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
                    'name' : {
                        required: true
                    },
                    'tel' : {
                        required: true
                    },
                    'email' : {
                        required: true,
                        email:true
                    }
                },
                messages: {
                    'uname' : {
                        required: "必填"
                    },
                    'name' : {
                        required: "必填"
                    },
                    'tel' : {
                        required: "必填"
                    },
                    'email' : {
                        required: "必填",
                        email: "請填正確email"
                    }
                }
            });
            });
        </script>
        
    </div>
<{/if}>