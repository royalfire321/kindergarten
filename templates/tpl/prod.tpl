<{if $op=="op_list"}>
    <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
        <tr> 
            <th scope="col" style="width:85px;">圖片</th>
            <th scope="col">標題</th>
            <th scope="col">分類</th>
            <th scope="col" class="text-right">價格</th>
            <th scope="col" class="text-center">狀態</th>
            <th scope="col" class="text-center">計數</th>
            <th scope="col" class="text-center">
                <a href="?op=op_form"><i class="fas fa-plus-square"></i>新增</a>
            </th>
        </tr>
        </thead>
        <tbody>
            <{foreach $rows as $row}>
                <tr>
                    <td><img src="<{$row.prod}>" alt="<{$row.title}>" width=80></td>
                    <td class="align-middle"><{$row.title}></td>
                    <td class="align-middle"><{$row.kinds_title}></td>
                    <td class="text-right align-middle"><{$row.price}></td>
                    <td class="text-center align-middle"><{if $row.enable}><i class="fas fa-check"></i><{/if}></td>
                    <td class="text-center align-middle"><{$row.counter}></td>
                    <td class="text-center align-middle">
                        <a href="?op=op_form&sn=<{$row.sn}>"><i class="far fa-edit"></i></a>
                        <a href="javascript:void(0)" onclick="op_delete(<{$row.sn}>);"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
            <{foreachelse}>
                <tr>
                    <td colspan=6>目前沒有資料</td>
                </tr>
            <{/foreach}>

        </tbody>
    </table>
    <{$bar}>
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
<{/if}>
<{if $op=="op_form"}>
    
    <div class="container">        
        <form action="prod.php" method="post" id="myForm" class="mb-2" enctype="multipart/form-data">
            <!-- 	 						 -->
            <div class="row">         
                <!--標題-->              
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>標題<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" value="<{$row.title}>" >
                    </div>
                </div>         
                <!--分類-->              
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>分類</label>
                        <select name="kind_sn" id="kind_sn" class="form-control">
                            <{foreach $row.kind_sn_options as $option}>
                                <option value="<{$option.sn}>" <{if $option.sn == $row.kind_sn}>selected<{/if}>><{$option.title}></option>
                            <{/foreach}>
                        </select>
                    </div>
                </div>
                <!-- 商品狀態  -->
                <div class="col-sm-4">
                    <div class="form-group">
                        <label style="display:block;">商品狀態</label>
                        <input type="radio" name="enable" id="enable_1" value="1" <{if $row.enable=='1'}>checked<{/if}>>
                        <label for="enable_1" style="display:inline;">啟用</label>&nbsp;&nbsp;
                        <input type="radio" name="enable" id="enable_0" value="0" <{if $row.enable=='0'}>checked<{/if}>>
                        <label for="enable_0" style="display:inline;">停用</label>
                    </div>
                </div>  
                <!--價格-->              
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>價格</label>
                        <input type="text" class="form-control text-right" name="price" id="price" value="<{$row.price}>">
                    </div>
                </div>         
                <!--建立日期-->              
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>建立日期</label>
                        <input type="text" class="form-control" name="date" id="date" value="<{$row.date}>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})">
                    </div>
                </div>             
                <!--排序-->              
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>排序</label>
                        <input type="text" class="form-control text-right" name="sort" id="sort" value="<{$row.sort}>">
                    </div>
                </div>            
                <!--計數-->              
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>計數</label>
                        <input type="text" class="form-control text-right" name="counter" id="counter" value="<{$row.counter}>">
                    </div>
                </div>             
                <!--圖片-->              
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>圖片</label>
                        <input type="file" class="form-control" name="prod" id="prod">
                        <label class="mt-1">
                            <{if $row.prod}>
                                <img src="<{$row.prod}>" alt="<{$row.title}>" class="img-fluid">
                            <{/if}>
                        </label>
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
            <input type="hidden" name="sn" value="<{$row.sn}>">
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