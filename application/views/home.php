<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Employee Management System with Jquery Easy UI and Codeigniter</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/script.js"></script>
</head>
<body>
    <div class="container">
        <div class="easyui-layout" style="width: 100%; height: 600px;">
            <div class="header" data-options="region:'north', split:'true'">
                <h1>Employee</h1>
            </div>
            <div class="body" data-options="region:'center', title:'All Employee List'">
                <div class="toolbar" id="toolbar" style="padding: 5px; background-color: #eee;">
                    <a href="javascript:void(0)" class="easyui-linkbutton" plain="true" iconCls="icon-add" onclick="newEmployee()">Add</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-edit', plain:'true'" onclick="editEmployee()">Edit</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-cancel', plain:'true'" onclick="deleteEmployee()">Delete</a>
                    <input class="textbox" id="emp_name" class="easyui-searchbox" onkeyup="doSearch()" />
                </div>
                <table id="dg" class="easyui-datagrid" toolbar="#toolbar" data-options="url: '<?php echo base_url('home/all_employee'); ?>'" singleSelect="true" fitColumns="true" rownumbers="true" pagination="true" autoRowHeight="false">
                    <thead>
                        <tr>
                            <th data-options="field:'full_name', width:80">Full Name</th>
                            <th data-options="field:'email', width:80">Email</th>
                            <th data-options="field:'designation', width:80">Designation</th>
                            <th data-options="field:'prof_img', width:80, formatter:formatProfImg">Profile Image</th>
                            <th data-options="field:'status', width:40, formatter:formatStatus">Status</th>
                            <th field="id" width="80" formatter="actionFormatter">Action</th>
                        </tr>
                    </thead>
                </table>
                
            </div>
            <div class="footer" data-options="region:'south'">
                <p style="text-align: center;">Employee Management System</p>
            </div>
        </div>
    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px;" title="Add New Employee" closed="true" buttons="#dialog_buttons">
        <form method="post" novalidate id="fm" enctype="multipart/form-data" style="margin: 0; padding: 20px 50px;">
            <div class="" style="margin-bottom: 20px;font-size: 14px; border-bottom: 1px solid #ccc;">Employee Info</div>
            <div class="" style="margin-bottom: 10px;">
                <input type="text" name="full_name" class="easyui-textbox" required="true" label="Full Name:" style="width:100%;" />
            </div>
            <div class="" style="margin-bottom: 10px;">
                <input type="email" name="email" class="easyui-textbox" required="true" label="Email:" validType="email" style="width:100%;" />
            </div>
            <div class="" style="margin-bottom: 10px;">
                <input type="text" name="designation" class="easyui-textbox" required="true" label="Designation:" style="width:100%;" />
            </div>

            <div class="" style="margin-bottom: 10px;">
                <input class="easyui-filebox" name="prof_img" id="prof_img" style="width: 100%;" label="Profile Image">
            </div>
        </form>
    </div>
    <div id="dialog_buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" style="width: 90px;" onclick="saveEmployee()">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" style="width: 90px;" onclick="$('#dlg').dialog('close')">Cancel</a>
    </div>

    <div id="update_dlg" class="easyui-dialog" style="width: 400px;" title="Update Employee" closed="true" buttons="#update_dialog_buttons">
        <form method="post" novalidate id="update_fm" enctype="multipart/form-data" style="margin: 0; padding: 20px 50px;">
            <div class="" style="margin-bottom: 20px;font-size: 14px; border-bottom: 1px solid #ccc;">Employee Info</div>
            <div class="" style="margin-bottom: 10px;">
                <input type="text" name="full_name" class="easyui-textbox" required="true" label="Full Name:" style="width:100%;" />
            </div>
            <div class="" style="margin-bottom: 10px;">
                <input type="email" name="email" class="easyui-textbox" required="true" label="Email:" validType="email" style="width:100%;" />
            </div>
            <div class="" style="margin-bottom: 10px;">
                <input type="text" name="designation" class="easyui-textbox" required="true" label="Designation:" style="width:100%;" />
            </div>

            <div class="" style="margin-bottom: 10px;">
                <input class="easyui-filebox" name="prof_img" id="prof_img" style="width: 100%;" label="Profile Image">
            </div>
        </form>
    </div>
    <div id="update_dialog_buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" style="width: 90px;" onclick="saveEmployee()">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" style="width: 90px;" onclick="$('#update_dlg').dialog('close')">Cancel</a>
    </div>
    
    <script type="text/javascript">
        /*$( document ).ready(function() {
           var data = <?php //echo json_encode($all_employee); ?>;
           $('#dg').datagrid({
               data: data
           });
        });*/

        var url;
        function newEmployee() {
            $('#dlg').dialog('open').dialog('center');
            $('#fm').form('clear');
            url = '<?php echo base_url('home/save_new_user'); ?>';
        }

        function editEmployee(){
            var selRow = $('#dg').datagrid('getSelected');
            if(selRow){
                $('#update_dlg').dialog('open').dialog('center').dialog('setTitle', 'Edit Employee');
                $('#update_fm').form('load', selRow);
                url = '<?php echo base_url('home/update_employee/'); ?>'+selRow.id;
            }
        }

        function saveEmployee() {
            $('#fm').form('submit', {
                url: url,
                success: function(result){
                    //var result = eval('('+result+')');
                    $('#dlg').dialog('close');
                    $('#dg').datagrid('reload');
                    /*if(result.msg){
                        $.messager.show({
                            title: 'Message',
                            msg: result.msg
                        });
                    }*/
                }
            });
        }      
        
        function deleteEmployee() {
            var row = $('#dg').datagrid('getSelected');
            if(row) {
                $.messager.confirm('Confirm','Are you sure want to delete?', function(r){
                    if(r){
                        $.post("<?php echo base_url('home/delete_employee'); ?>",{id:row.id}, 
                        function(result){
                            //var result = eval('('+result+')');
                            if(result.success){
                                $('#dg').datagrid('reload');
                            } else {
                                $.messager.show({
                                    title: 'Error',
                                    msg: result.error
                                });
                            }
                        }, 'json');
                    }
                });
            }
        }
        
        function formatStatus(val){
            if(val == 0){
                return '<span style="color:red;">Inactive</span>';
            } else if(val == 1) {
                return '<span style="color:green;">Active</span>';
            }
        }

        function formatProfImg(val) {
            if(val == null){
                return '<img src="<?php echo base_url()."uploads/prof.png"; ?>" alt=""  style="width: 25px; height:25px;"/>';
            } else {
                return "<img src=" + "<?php echo base_url(); ?>" + val + "  style="+"width:25px; height:25px;"+"/>";
            }
        }
        
        function doSearch() {
            $('#dg').datagrid('load', {
                search_key: $('#emp_name').val()
            });
        }

        function actionFormatter(val, row, index){
            var v = '<a href="javascript:void(0)" class="easyui-linkbutton" onclick="viewEmployee('+ row.id +')">View Employee</a>';
            var statusActivate = '<a href="javascript:void(0)" class="easyui-linkbutton" onclick="statusUpdate('+ row.id +')">Activate</a>';
            var statusDeActivate = '<a href="javascript:void(0)" class="easyui-linkbutton" onclick="statusUpdate('+ row.id +')">Deactivate</a>';
            var statusBtn = row.status==0 ? statusActivate : statusDeActivate;
            
            return v + ' | ' + statusBtn;
        }

        function viewEmployee(id) {
            var row = $('#dg').datagrid('getSelected');
            if(row){
                var url = '<?php echo base_url('home/single_employee/'); ?>'+id;
                newwindow = window.open(url, 'Employee Details', 'height=400, width=400, scrollbars=no, top=200, left=200');
                if(window.focus) {
                    newwindow.focus();
                }
            }
        }
        
    </script>
</body>
</html>