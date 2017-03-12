<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Member</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.easyui.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="easyui-layout" style="width: 700px; height: 500px;">
            <div class="" data-options="region: 'north'" style="height: 65px;">
                <h1 style="text-align: center;">Members Area</h1>
            </div>
            <div class="" data-options="region: 'south'" style="height: 60px;">
                <p style="text-align: center;">Member management system @ 2017</p>
            </div>
            <div class="" data-options="region: 'west'" style="width: 100px;"></div>
            <div class="" data-options="region: 'center'">
                <table id="member_dg" class="easyui-datagrid" data-options="toolbar: '#toolbar', singleSelect: true, fitColumns: true, pagination: true" url="<?php echo base_url() . 'member/get_all_members'; ?>">
                    <thead>
                        <tr>
                            <th data-options="field: 'name', width: 100">Name</th>
                            <th data-options="field: 'phone', width: 100">Phone</th>
                            <th data-options="field: 'prof_img', width: 100">Image</th>
                            <th data-options="field: 'status', width: 100">Status</th>
                        </tr>
                    </thead>
                </table>
                <div id="toolbar">
                    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-add', plain:true" onclick="addUser()">Add User</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-edit', plain:true">Edit User</a>
                    <a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-cancel', plain:true">Delete User</a>
                </div>
            </div>
        </div>
    </div>

    <div id="add_user_dialog" class="easyui-dialog" closed="true" buttons="#add_user_buttons" style="width: 400px; padding: 10px;">
        <form method="post" id="add_user_form" novalidate style="padding: 10px;" enctype="multipart/form-data">
            <div style="margin-bottom: 20px; border-bottom: 1px solid #ccc; font-size: 14px;">Add Member</div>
            <div style="margin-bottom: 10px;">
                <input name="name" class="easyui-textbox" label="Name: " required="true" style="width: 100%;">
            </div>
            <div style="margin-bottom: 10px;">
                <input name="phone" class="easyui-textbox" label="Phone: " required="true" style="width: 100%;">
            </div>
            <div style="margin-bottom: 10px;">
                <input name="prof_img" class="easyui-filebox" label="Profile Image: " required="true" style="width: 100%;">
            </div>
        </form>
    </div>
    <div id="add_user_buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton" style="width: 90px;" iconCls="icon-ok" onclick="saveNewUser()">Save</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" style="width: 90px;" iconCls="icon-cancel" onclick="$('#add_user_dialog').dialog('close')">Cancel</a>
    </div>




    <script type="text/javascript">
        var url;
        function addUser() {
            $('#add_user_dialog').dialog('open').dialog('center').dialog('setTitle', 'Add new member');
            $('#add_user_form').form('clear');
        }

        function saveNewUser() {
            $('#add_user_form').form('submit', {
                url: '<?php echo base_url() . 'member/save_new_member'; ?>',
                onSubmit: function () {
                    return $(this).form('validate');
                },
                success: function (result) {
                    var result = eval('('+result+')');
                    if(result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    }
                    else{
                        $('#add_user_dialog').dialog('close');
                        $('#member_dg').datagrid('reload');
                    }
                }
            });
        }
    </script>
</body>
</html>