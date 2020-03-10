<{if $op=="op_list"}>
    <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
        <tr> 
            
            <th scope="col-lg-3">日期</th>
            <th scope="col-lg-6">標題</th>
            <th scope="col-lg-3" class="text-center">
                <a href="?op=op_form"><i class="fas fa-plus-square"></i>新增</a>
            </th>
        </tr>
        </thead>
        <tbody>
            <{foreach $rows as $row}>
                <tr>
                    <td class="align-middle"><{$row.date}></td>
                    <td class="align-middle"><{$row.title}></td>
                    <td class="text-center align-middle">
                        <a href="?op=op_form&newn=<{$row.newn}>"><i class="far fa-edit"></i></a>
                        <a href="javascript:void(0)" onclick="op_delete(<{$row.newn}>);"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <{foreachelse}>
                <tr>
                    <td colspan=3>目前沒有資料</td>
                </tr>
            <{/foreach}>

        </tbody>
    </table>
    <{$bar}>
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<{$xoAppUrl}>class/sweetalert2/sweetalert2.min.css">
    <script src="<{$xoAppUrl}>class/sweetalert2/sweetalert2.min.js"></script>
    <script>
        function op_delete(newn){
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
                    document.location.href="news.php?op=op_delete&newn="+newn;
                }
            })
        }
    </script>
<{/if}>
<{if $op=="op_form"}>
    
    <div class="container">        
        <form action="news.php" method="post" id="myForm" class="mb-2" enctype="multipart/form-data">
            <!-- 	 						 -->
            <div class="row">  
                <!--建立日期-->              
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>建立日期</label>
                        <input type="text" class="form-control" name="date" id="date" value="<{$row.date}>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})">
                    </div>
                </div>         
                <!--標題-->              
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>標題<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" value="<{$row.title}>" >
                    </div>
                </div>                                                        
            </div>
            
            <div class="row">
                <div class="col-sm-12">  
                    <!-- 商品內容 -->
                    <div class="form-group">
                        <label class="control-label">商品內容</label>
                        <textarea class="form-control" rows="5" id="content" name="content"><{$row.content}></textarea>
                    </div>
                </div>
            </div>
            
            <!-- ckeditor -->
            <script src="<{$xoAppUrl}>class/ckeditor/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('content',{
                    height:500,//高度
                    contentsCss: ['<{$xoImgUrl}>css/creative.css'],//前台樣板css
                    removeDialogTabs: 'image:Link',//取消連結 //link:target;link:advanced;image:advanced
                    filebrowserBrowseUrl: '<{$xoAppUrl}>class/elfinder.php?type=image'//呼叫elfinder.php
                });
            </script>
            <div class="text-center pb-20">
            <input type="hidden" name="op" value="<{$row.op}>">
            <input type="hidden" name="newn" value="<{$row.newn}>">
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