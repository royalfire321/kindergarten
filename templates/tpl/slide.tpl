<{if $op=="op_list"}>
    <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
        <tr> 
            <th scope="col" style="width:85px;">圖片</th>
            <th scope="col">標題</th>
            <th scope="col">網址</th>
            <th scope="col" class="text-center">外連</th>
            <th scope="col" class="text-center">狀態</th>
            <th scope="col" class="text-center">
                <a href="?op=op_form&kind=<{$kind}>"><i class="fas fa-plus-square"></i>新增</a>
            </th>
        </tr>
        </thead>
        <tbody>
            <{foreach $rows as $row}>
                <tr>
                    <td><img src="<{$row.pic}>" alt="<{$row.title}>" width=80></td>
                    <td class="align-middle"><{$row.title}></td>
                    <td class="align-middle"><{$row.url}></td>
                    <td class="text-center align-middle"><{if $row.target}><i class="fas fa-check"></i><{/if}></td>
                    <td class="text-center align-middle"><{if $row.enable}><i class="fas fa-check"></i><{/if}></td>
                    <td class="text-center align-middle">
                        <a href="?op=op_form&kind=<{$row.kind}>&sn=<{$row.sn}>"><i class="far fa-edit"></i></a>
                        <a href="javascript:void(0)" onclick="op_delete('<{$row.kind}>',<{$row.sn}>);"><i class="far fa-trash-alt"></i></a>
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
        function op_delete(kind,sn){
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
                    document.location.href="slide.php?op=op_delete&kind=" + kind + "&sn="+sn;
                }
            })
        }
    </script>
<{/if}>
<{if $op=="op_form"}>
    
    <div class="container">        
        <form action="slide.php" method="post" id="myForm" class="mb-2" enctype="multipart/form-data">
            <!-- 	 						 -->
            <div class="row">         
                <!--標題-->              
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>標題<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" value="<{$row.title}>" >
                    </div>
                </div>          
                <!--網址-->              
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>網址<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="url" id="url" value="<{$row.url}>" >
                    </div>
                </div>
                             
                <!--圖片-->              
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>圖片</label>
                        <input type="file" class="form-control" name="pic" id="pic">
                        <label class="mt-1">
                            <{if $row.pic}>
                                <img src="<{$row.pic}>" alt="<{$row.title}>" class="img-fluid">
                            <{/if}>
                        </label>
                    </div>
                </div> 
                <!-- 外連狀態  -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label style="display:block;">外連狀態</label>
                        <input type="radio" name="target" id="target_1" value="1" <{if $row.target=='1'}>checked<{/if}>>
                        <label for="target_1" style="display:inline;">啟用</label>&nbsp;&nbsp;
                        <input type="radio" name="target" id="target_0" value="0" <{if $row.target=='0'}>checked<{/if}>>
                        <label for="target_0" style="display:inline;">停用</label>
                    </div>
                </div>   
                <!--選單狀態  -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label style="display:block;">選單狀態</label>
                        <input type="radio" name="enable" id="enable_1" value="1" <{if $row.enable=='1'}>checked<{/if}>>
                        <label for="enable_1" style="display:inline;">啟用</label>&nbsp;&nbsp;
                        <input type="radio" name="enable" id="enable_0" value="0" <{if $row.enable=='0'}>checked<{/if}>>
                        <label for="enable_0" style="display:inline;">停用</label>
                    </div>
                </div>  
       
                <!--排序-->              
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>排序</label>
                        <input type="text" class="form-control text-right" name="sort" id="sort" value="<{$row.sort}>">
                    </div>
                </div>
            </div>
            
            <div class="text-center pb-20">
            <input type="hidden" name="op" value="<{$row.op}>">
            <input type="hidden" name="sn" value="<{$row.sn}>">
            <input type="hidden" name="kind" value="<{$row.kind}>">
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
                        },
                        'url' : {
                            required: true
                        }
                    },
                    messages: {
                        'title' : {
                            required: "必填"
                        },
                        'url' : {
                            required: "必填"
                        }
                    }
                });
            });
        </script>
        <script type='text/javascript' src='<{$xoAppUrl}>class/My97DatePicker/WdatePicker.js'></script>
        
    </div>
<{/if}>