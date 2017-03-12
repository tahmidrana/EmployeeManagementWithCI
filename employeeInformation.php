<script type="text/javascript">
    var url;
    var unitID = null;
    var orgID = null;
    var isArmy = null;
    var marital = [{"marital_status": "1", "marital": "Married"}, {"marital_status": "0", "marital": "Unmarried"}];
    var gender = [{"gender_id": "M", "gender_name": "Male"}, {"gender_id": "F", "gender_name": "Female"}];
    var dataRel = [{"release_status": "1", "status_name": "Retirement"}, {"release_status": "2", "status_name": "Transfer"}, {"release_status": "3", "status_name": "Promotion"}, {"release_status": "4", "status_name": "Current Position"}];
    var UnitOrg = [{"select_unit": "1","unit_label": "Unit"},{"select_unit": "2","unit_label": "Organization"}];
     
    
  
    
    
    $(function () {
                $('#show_unit_div').hide();
                $('#show_org_div').hide();
                
                
                $('#btn1').linkbutton('disable');
                $('#searchbox').textbox('disable');
           });
           
   function selectUnitOrOrg(){
        var select_unit = $('#select_unit').combobox('getValue');
        
        if(select_unit==1){
            $('#show_org_div').hide();
            $('#show_unit_div').show();
        }else{
            $('#show_unit_div').hide();
            $('#show_org_div').show();
        }
    }
           
           
           
           $(function () {
        $("#search_employee").textbox({
            inputEvents: $.extend({}, $.fn.textbox.defaults.inputEvents, {
                keyup: function (e) {
                    //var vGroupId=$('#groupAndCatSubDepotWise').combobox('getValue');
                    //if(vGroupId){


                    var t = $('#search_employee');
                    t.textbox('setValue', $(this).val());
                    var searchValue = t.textbox('getValue');



                    if (e.keyCode == 13) {
                         



                        var encoded = searchValue.replace("(", '%2B');
                        encoded = encoded.replace("(", '%2B');
                        encoded = encoded.replace("(", '%2B');
                        encoded = encoded.replace("(", '%2B');
                        encoded = encoded.replace(")", '%2C');
                        encoded = encoded.replace(")", '%2C');
                        encoded = encoded.replace(")", '%2C');
                        encoded = encoded.replace(")", '%2C');




                        var url = '<?php echo base_url('appConfig/EmployeeController/getEmployeeSearch') . '/'; ?>' + encoded;



                        $('#dg2').datagrid({url: url});

                    }  
                    var row = $('#dg2').datagrid('getSelected');
                    var vocab_id = row.vocab_id;
                    //alert(vocab_id);

                }
            })
        });
    });

    
    function loadDatagrid(org_id) {

        orgID = org_id;
        $('#dg').datagrid({
            url: '<?php echo base_url('appConfig/EmployeeController/unitWiseEmployeeList') . '/'; ?>' + org_id,
            title: 'Employee List of ' + org_id
        });

        $('#dlg').dialog('close');
    }



    function showAllTreeNode()
    {
        var unit_id = $('#unit_id').combotree('getValue');
        unitID = unit_id;
         var  url2='<?php echo base_url('appConfig/EmployeeController/unitBDA') . '/'; ?>' + unit_id;
           $.post(url2, {}, function (result) {
                if (result) {
                $(".divisionadd").html(result.success );
                }
            }, 'json');
            
            /* saerch    option */
              $("#searchbox").textbox({
	inputEvents:$.extend({},$.fn.textbox.defaults.inputEvents,{
		keyup:function(e){
                        var t = $('#searchbox');
                        t.textbox('setValue', $(this).val());
                        var searchValue = t.textbox('getValue');
                        if(searchValue&&searchValue.length>=3){
                           var url1='<?php echo base_url('appConfig/EmployeeController/unitWiseEmployeeList') . '/'; ?>' + unit_id+'/'+searchValue;
                           $('#dg').datagrid({url:url1});
                        $('#searchbox').textbox('textbox').focus();
                      }else if(searchValue==''){
                          var url1='<?php echo base_url('appConfig/EmployeeController/unitWiseEmployeeList') . '/'; ?>' + unit_id;
                           $('#dg').datagrid({url:url1});
                       }
                        
                    }
                })
        });
         
        $('#rank_id').combobox({
            url: '<?php echo base_url('appConfig/EmployeeController/rankList'); ?>',
            valueField: 'rank_id',
            textField: 'rank_title'
        });
        $('#dg').datagrid({
            url: '<?php echo base_url('appConfig/EmployeeController/unitWiseEmployeeList') . '/'; ?>' + unit_id,
            title: 'Employee List' 
        });
        
        //$('#btn1').linkbutton('enable');
        $('#searchbox').textbox('enable');

    }
    
    function showAllOrgTree()
    {
        var unit_id = $('#org_id').combotree('getValue');
        unitID = unit_id;
         var  url2='<?php echo base_url('appConfig/EmployeeController/unitBDA') . '/'; ?>' + unit_id;
           $.post(url2, {}, function (result) {
                if (result) {
                $(".divisionadd").html(result.success );
                }
            }, 'json');
            
            /* saerch    option */
              $("#searchbox").textbox({
	inputEvents:$.extend({},$.fn.textbox.defaults.inputEvents,{
		keyup:function(e){
                        var t = $('#searchbox');
                        t.textbox('setValue', $(this).val());
                        var searchValue = t.textbox('getValue');
                        if(searchValue&&searchValue.length>=3){
                           var url1='<?php echo base_url('appConfig/EmployeeController/orgWiseEmployeeList') . '/'; ?>' + unit_id+'/'+searchValue;
                           $('#dg').datagrid({url:url1});
                        $('#searchbox').textbox('textbox').focus();
                      }else if(searchValue==''){
                          var url1='<?php echo base_url('appConfig/EmployeeController/orgWiseEmployeeList') . '/'; ?>' + unit_id;
                           $('#dg').datagrid({url:url1});
                       }
                        
                    }
                })
        });
         
        $('#rank_id').combobox({
            url: '<?php echo base_url('appConfig/EmployeeController/rankList'); ?>',
            valueField: 'rank_id',
            textField: 'rank_title'
        });
        $('#dg').datagrid({
            url: '<?php echo base_url('appConfig/EmployeeController/orgWiseEmployeeList') . '/'; ?>' + unit_id,
            title: 'Employee List' 
        });
        
        //$('#btn1').linkbutton('enable');
        $('#searchbox').textbox('enable');

    }

    /*-------------------------------------------------------------*/

    function newEmployee() {

        url = '<?php echo base_url('appConfig/EmployeeController/addEmployee'); ?>';
        
        <?php 
        $emp_unit_id = $this->session->userdata('emp_unit_id');
        if($emp_unit_id != NULL){
        ?>
         var unit_id = $('#unit_id').combotree('getValue');
        <?php
        }
         else{
        ?>
         var unit_id = $('#org_id').combotree('getValue');
        <?php
        }
        ?>
                
        
        if (unit_id) {
            $('#dlg').dialog('open').dialog('setTitle', 'Add New Employee Information');
            $('#fm').form('clear');
        } else {
            $('#errorDlg').dialog('open').dialog('setTitle', 'Error');
        }
    }



    function editEmployee() {
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            $('#dlg').dialog('open').dialog('setTitle', 'Edit Employee Information');
            $('#fm').form('load', row);
            url = '<?php echo base_url('appConfig/EmployeeController/updateEmployee'). '/'; ?>' + row.emp_id;
          
        }
    }
    
    function searchEmployee() {
        var row = $('#dg').datagrid('getSelected');
        $('#search_employee').textbox('clear');
         
        if (row) {
            $('#dlg2').dialog('open').dialog('setTitle', 'Search Employee For Post Assign');
            $('#fm2').form('load', row);
            url = '<?php echo base_url('appConfig/EmployeeController/getEmployeeSearch'). '/'; ?>' + row.emp_id+'/'+ row.post_id;
          
        }
    }

    function saveEmployee() {

        var emp_name = $('#emp_name').val();
        var emp_name_bang = $('#emp_name_bang').val();
        var ba_no = $('#ba_no').val();
        var joining_date = $('#joining_date').datebox('getValue');
         
        <?php 
        $emp_unit_id = $this->session->userdata('emp_unit_id');
        if($emp_unit_id != NULL){
        ?>
         var unit_id = $('#unit_id').combobox('getValue');
        <?php
        }
         else{
        ?>
         var unit_id = $('#org_id').combobox('getValue');
        <?php
        }
        ?>
        var v_marital = $('#marital_status').combobox('getValue');
        var v_gender = $('#gender').combobox('getValue');
        var rank_id = $('#rank_id').combobox('getValue');
        if(!rank_id){ rank_id = 0}
        if (emp_name)
        {
            $.post(url, {emp_name: emp_name, ba_no: ba_no, joining_date: joining_date,unit_id:unit_id, rank_id:rank_id, emp_name_bang: emp_name_bang, marital: v_marital, gender: v_gender}, function (result) {
                if (result.success) {
                    
                    $('#dg').datagrid('reload');
                    $.messager.show({
                        title: 'Success',
                        msg: 'Successfully saved'
                    });
                    
                    $('#dlg').dialog('close');
                    
                } else {
                    
                    $.messager.show({
                        title: 'Error',
                        msg: 'Error : ' + result.error_msg
                    });
                }
            }, 'json');
        }

    }
    
    function assignEmployeePost(){
        var row = $('#dg2').datagrid('getSelected');
        var row2 = $('#dg').datagrid('getSelected');
         
        var emp_id = row.emp_id;
        var ba_no = row.ba_no;
        var post_id = row2.post_id;
        
         
        var urlAssign = '<?php echo base_url('appConfig/EmployeeController/assignEmployeePost'); ?>';
        
        if (ba_no)
        {
            $.post(urlAssign, {emp_id:emp_id,ba_no:ba_no,post_id:post_id}, function (result) {
                if (result.success) {
                    
                    $('#dg').datagrid('reload');
                    $('#search_employee').textbox('clear');
                    $('#dg2').datagrid('reload');
                    $('#dlg2').dialog('close');
                    //$('#dg2').datagrid('close');
                    $.messager.show({
                        title: 'success',
                        msg: 'Successfully saved'
                    });
                    
                    
                    
                    
                    
                    
                } else {
                    
                    $.messager.show({
                        title: 'error_msg',
                        msg: 'error_msg : ' + result.error_msg
                    });
                }
            }, 'json');
        }
        
    }
   
    function rowAction(row) {
         //return "<a href='javascript:editEmployee();' style='text-decoration:none;' class='icon-edit easyui-tooltip' title='edit'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;<a href='javascript:removeEmployee();' style='text-decoration:none;' class='icon-remove' title='Delete'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>";
        if(row.emp_name){  
        var link ="<a href='javascript:editEmployee();' style='text-decoration:none;' class='icon-edit easyui-tooltip' title='edit'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><a>&nbsp;&nbsp;&nbsp;&nbsp;</a>"
            link  += "<a href='javascript:preview("+row.emp_id+");' style='text-decoration:none;' title='profile'>[Profile]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
            link  += "<a href='javascript:popUpReleaseForm()' style='text-decoration:none;' title='release'>[Release ]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
            link  += "<a href='javascript:newPass();' style='text-decoration:none;' title='save'>[Reset Password]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        return link;
        }else{
        
        var link  = "<a>&nbsp;&nbsp;&nbsp;&nbsp;</a> <a href='javascript:searchEmployee();' style='text-decoration:none;' class='icon-add' title='Join'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
            link  += "<a>&nbsp;&nbsp;&nbsp;&nbsp;</a><a href='javascript:newPass();' style='text-decoration:none;' title='save'>[Reset Password]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
         return link;
        }
    }
    
    function rowSaveSearch(row) {            
          
          
        var link  = "<a href='javascript:preview("+row.emp_id+");' style='text-decoration:none;' title='profile'>[Profile]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
            link  += "<a href='javascript:employeeJoining();' style='text-decoration:none;' title='join'>[Join]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
        return link;
    }

    function removeEmployee() {
        var row = $('#dg').datagrid('getSelected');
        if (row) {
            $.messager.confirm('Confirm', 'Are you sure you want to remove this person?', function (r) {
                if (r) {
                    $.post('<?php echo base_url('appConfig/EmployeeController/removeEmployee'); ?>', {emp_id: row.emp_id}, function (result) {
                        if (result.success) {
                           $('#dg').datagrid('reload');	// reload the user data
                            $.messager.show({// show error message
                                title: 'Success',
                                msg: result.success
                            });
                        } else {
                            $.messager.show({// show error message
                                title: 'Error',
                                msg: result.msg
                            });
                        }
                    }, 'json');
                     $('#dg').datagrid('reload');
                }
            });
        }
    }
    
    function preview(emp_id) {
     
           var left = 300;
           var top = 100;
           var url = '<?php echo base_url('appConfig/OfficersController/preview') . '/'; ?>' + emp_id;
           newwindow = window.open(url, 'EMP Detail', 'height=700,width=700, scrollbars=yes,top = ' + top + ',left=' + left);
           if (window.focus) {
               newwindow.focus()
           }
    }
    
    function newPass() {
                $('#dlg3').dialog('open').dialog('setTitle', 'Change Password');
                $('#fm3').form('clear');
                
                var row = $('#dg').datagrid('getSelected');
                var post_id = row.post_id;
                
                url = '<?php echo base_url('appConfig/EmployeeController/changepwd') . '/'; ?>' + post_id;
            }
            
    function savePass() {
                
                $('#fm3').form('submit', {
                    url: url,
                    onSubmit: function () {
                        return $(this).form('validate');
                    },
                    success: function (response) {
                      
                        var result = eval('(' + response + ')');
                        if (result.success) {
                            $('#dlg3').dialog('close');		
                                $.messager.show({
                                title: 'Success',
                                msg: 'Change Password Successfully'
                            });
                        } else {
                             $.messager.show({
                                title: 'Error',
                                msg: result.msg
                            }, 'json');
                        }
                    }
                });
            }
            
    function popUpReleaseForm() {
	$('#releaseForm').dialog({
            title: 'Release From Post',
            closed: false,
            cache: false,
            modal: true
        });
    }
    
    function releaseEmployeePost()
    {
        var row = $('#dg').datagrid('getSelected');
        var releaseStatus = $('#releaseStatus').combobox('getValue');
        var remarks = $('#remarks').val();
        var emp_id = row.emp_id;
        
        var actionUrl = "<?php echo base_url('employee/ReleaseAndJoiningController/employeeReleaseFromHisPost'); ?>";
        if(releaseStatus){
            $.messager.confirm('Confirm', 'Are you sure you want to release from current post?', function (r) {
                if (r) {
                    $.post(actionUrl,{emp_id: emp_id, release_status:releaseStatus, remarks:remarks}, function (result) {
                        if (result.success) {
                            
                             
                            $('#dg').datagrid('reload');
                            $('#releaseForm').dialog('close');
                            
                                $.messager.show({// show error message
                                title: 'Success',
                                msg: 'Successfully release'
                            });
							
                        } else {
                            $.messager.show({// show error message
                                title: 'Error',
                                msg: 'Error : ' + result.erroMessage
                            });
                        }
                    }, 'json');
                }
            });
        }else{
            $.messager.show({// show error message
                title: 'Error',
                msg: 'Please select release type '
            });
        }
    }
    
    function employeeJoining() {
        
        var rowdg = $('#dg').datagrid('getSelected');
        var row = $('#dg2').datagrid('getSelected');
        var emp_id = row.emp_id;
         
        var unit_id = row.unit_id;
         
        var post_id = rowdg.post_id;
         
        var system_user = 1;
         
        var isArmy = rowdg.army;
      
         
        
        if(system_user){
            system_user = 1;
        }else{
            system_user = 0;
        }
        
        var rank_id = 0;
        
        if (isArmy == 1) {
            rank_id = row.rank_id;
        }
        
        var actionUrl = "<?php echo base_url('employee/ReleaseAndJoiningController/employeeJoinIntoPost'); ?>";
        $.messager.confirm('Confirm', 'Are you sure you want to join this post?', function (r) {
            if (r) {    
                $.post(actionUrl, {emp_id:emp_id, post_id:post_id, rank_id:rank_id, unit_id:unit_id,is_army:isArmy, system_user:system_user}, function (result) {
                    if (result.success) {
                            $('#dlg2').dialog('close');
                            $('#dg').datagrid('reload');
                            
                            $.messager.show({
                                title: 'Success',
                                msg: 'Successfully saved'
                            });
                        } else { 
                            $.messager.show({
                                title: 'Error',
                                msg: 'Error : ' + result.error_msg
                            });
                        }
                    }, 'json');

            }
        });    
       
    }
    
    
    function employeeAssignToPostUser()
    {
        var rowdg = $('#dg').datagrid('getSelected');
        var row = $('#dg2').datagrid('getSelected');
         
        var actionUrl = '<?php echo base_url('employee/ReleaseAndJoiningController/employeeAssignToPostUser'); ?>';
        if(row){
            $.messager.confirm('Confirm', 'Are you sure you want to assign this user?', function (r) {
            if (r) {
                $.post(actionUrl, {post_id: rowdg.post_id, emp_id:row.emp_id}, function (result) {
                   if (result.success) {
                        $.messager.show({
                            title: 'Success',
                            msg: result.success
                        });
                    } else { 
                        $.messager.show({
                            title: 'Error',
                            msg: 'Error : ' + result.error_msg
                        });
                    } 
                }, 'json');
            }
            });   
        }else{
            $.messager.show({// show error message
                title: 'Error',
                msg: 'Please select employee from employee grid'
            });
        }
    }


</script>
    <table id="dg" title="Employee List" class="easyui-datagrid" height="100%"
           url="#"
           toolbar="#toolbar" pagination="true"
           rownumbers="true" fitColumns="true" striped="true" singleSelect="true">
        <thead>
            <tr>
                <th field="post_name" width="70"><strong>Post Name</strong></th>
                <th field="post_id" width="1" hidden="true"><strong></strong></th>
                <th field="emp_name" width="40"><strong>Name</strong></th>
                <th field="ba_no" width="30"><strong>BA No</strong></th>
                <th field="joining_date" width="30"><strong>Joining Date</strong></th>
                <th field="rank_title" width="20"><strong>Rank</strong></th>
                <th field="Action" width="70" formatter="(function(value, row, index){ return rowAction(row); })"><strong>Action</strong></th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <!--<a href="#" class="easyui-linkbutton easyui-tooltip" id="btn1" iconCls="icon-add" plain="false" title="Add" onClick="newEmployee()">Add</a>-->
        &nbsp;&nbsp;&nbsp;
        <?php 
        if($user_type != 'emp'){?>
        
        <label style="width:250px">Select (Unit or Organization):</label>
        <input id="select_unit" name="select_unit" class="easyui-combobox" data-options="valueField: 'select_unit',textField:'unit_label',data:UnitOrg,onSelect:selectUnitOrOrg" style="width:250px;height:26px" required="true">
         
        
        <p id="show_unit_div" style="width:500px;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         
        <label id="unit_lbl" style="width:150px">Unit :</label>
        <input id="unit_id" name="unit_id" class="easyui-combobox" data-options="url:'<?php echo base_url('CommonController/unitList'); ?>',valueField: 'unit_id',textField:'unit_name',onSelect:showAllTreeNode" style="width:250px;height:26px" required="true">
        </p>
        <p id="show_org_div" style="width:500px;">
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
         <label id="org_lbl" style="width:150px;">Organization :</label>
        <input id="org_id" name="org_id" class="easyui-combobox" data-options="url:'<?php echo base_url('CommonController/orgTree'); ?>',valueField: 'id',textField:'name',onSelect:showAllOrgTree" style="width:250px;height:26px" required="true">
        </p>
        <?php
        }else{
        $emp_unit_id = $this->session->userdata('emp_unit_id');
        if($emp_unit_id != NULL){
        ?>
        <label style="width:150px">Unit:</label>
        <input id="unit_id" name="unit_id" class="easyui-combobox" data-options="url:'<?php echo base_url('CommonController/unitListFilter'); ?>',valueField: 'unit_id',textField:'unit_name',onSelect:showAllTreeNode" style="width:250px;height:26px" required="true">
        <?php
        }
         else{
        ?>
        <label style="width:150px">Organization:</label>
        <input id="org_id" name="org_id" class="easyui-combobox" data-options="url:'<?php echo base_url('CommonController/unitListFilter'); ?>',valueField: 'org_id',textField:'org_name',onSelect:showAllOrgTree" style="width:250px;height:26px" required="true">
        <?php
        }}
        ?>
        <!--<label class="divisionadd"></label>-->
        <div style="float:right">
            <a title="At least 3 character to filter!"   class="easyui-tooltip"> <input id="searchbox" name="searchbox" class="easyui-textbox" data-options="iconCls:'icon-search',prompt:'Search by BA no, Name'" style="width:250px;height:26px;"></a>
        </div>
    </div>

    <div id="dlg2" class="easyui-dialog" style="width:90%;height:90%;padding:1px 1px" closed="true" modal="true" buttons="#dlg2-buttons">
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <input id="search_employee" name="search_employee" class="easyui-textbox" data-options="iconCls:'icon-search',prompt:'Type at least 4 characters of BA No.'" style="width:35%;height:26px">
         <br>
         <br>
         <table id="dg2" class="easyui-datagrid" width="100%" height='93%'
           url="#"
           toolbar="" 
           rownumbers="true" fitColumns="true" singleSelect="true" striped="true" nowrap="false">
        <thead>
            <tr> 
                <th field="ba_no"  width="20%" halign="center"><strong>No</strong></th>
                <th field="post_id"  width="1%" halign="center" hidden="true"><strong></strong></th>
                <th field="emp_id"  width="1%" halign="center" hidden="true"><strong></strong></th>
                <th field="emp_name"  width="30%" halign="center"><strong>Employee Name</strong></th>
                <th field="rank_title"  width="20%" halign="center"><strong>Rank</strong></th>
                
                <th field="Action" width="30%" align="center" formatter="(function(value, row, index){ return rowSaveSearch(row); })"><strong>Action</strong></th>              
            </tr>
        </thead>
        </table>
         
    </div>
    <div id="dlg2-buttons">
         <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onClick="javascript:$('#dlg2').dialog('close')">Cancel</a>
    </div>

        <div id="dlg3" class="easyui-dialog" style="width:450px;height:250px;padding:10px 10px"
             closed="true" buttons="#dlg3-buttons">
            <div class="ftitle">Change Password</div>
            <form id="fm3" method="post" novalidate>
 

                <div class="fitem">
                    <label style="width:150px">New Password</label>
                    <input id="newpwd" type="password" name="newpwd" class="easyui-textbox" size="28" >
                </div>
                
                <div class="fitem">
                    <label style="width:150px">Re-Type Password</label>
                    <input id="repwd" type="password" name="repwd" class="easyui-textbox" size="28">
                </div>

            </form>
        </div>
        <div id="dlg3-buttons">
            <a href="#" class="easyui-linkbutton" iconCls="icon-ok" onClick="savePass()">Save</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onClick="javascript:$('#dlg3').dialog('close')">Cancel</a>
        </div>

    <div id="releaseForm" class="easyui-dialog" style="width:500px;height:200px;padding:10px 20px" closed="true" buttons="#r-buttons">

        <div class="fitem">
            <label>Release Type</label>
            <input id="releaseStatus" name="releaseStatus" class="easyui-combobox" data-options="valueField:'release_status',textField:'status_name',data:dataRel" style="width:300px; height:26px" required="true">
        </div>

        <div class="fitem">
            <label>Remarks </label>
            <input class="easyui-textbox" id="remarks" name="remarks" data-options="multiline:true" style="width:300px; height:60px"></input>
        </div>

        <div id="r-buttons">
            <a href="#" class="easyui-linkbutton" onClick="releaseEmployeePost()">Release</a>
            <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onClick="javascript:$('#releaseForm').dialog('close')">Cancel</a>
        </div>
    </div>

        
    <div id="dlg" class="easyui-dialog" style="width:750px;height:300px;padding:10px 20px" closed="true" modal="true" buttons="#dlg-buttons">
        <div class="ftitle">Employee Information</div>
        <form id="fm" action="javascript:void(0);" method="post" novalidate>
            <table>
                  <tr>
            <div class="fitem">
                <td ><label style="width:150px"><strong>BA No:</strong></label></td>
                <td><input id="ba_no" name="ba_no" class="easyui-validatebox" style="width:200px;height:26px" required="true"></td>
            </div>
            <div class="fitem">
                <td ><label style="width:150px"><strong>&nbsp;&nbsp;&nbsp;Name:</strong></label></td>
                <td ><input id="emp_name" name="emp_name" class="easyui-validatebox" style="width:200px;height:26px" required="true" ></td>
            </div>
            </tr>
            <tr>
           <div class="fitem">
                <td><label style="width:150px"><strong>নাম :</strong></label></td>
               <td> <input  id="emp_name_bang" name="emp_name_bang" class="bangla easyui-textbox" style="width:200px;height:26px"></td>
            </div>
            <div class="fitem">
                <td><label style="width:150px"><strong>&nbsp;&nbsp;&nbsp;Gender:</strong></label></td>
                <td><input id="gender" name="gender" class="easyui-combobox" data-options="panelHeight:'auto',valueField:'gender_id',textField:'gender_name',data:gender"   style="width:200px;height:26px"  required="true"> </td>
            </div>
            </tr>
            <tr>
            <div class="fitem">
               <td> <label style="width:150px"><strong>Marital Status:</strong></label></td>
                <td><input id="marital_status" name="marital_status" class="easyui-combobox" data-options="panelHeight:'auto',valueField:'marital_status',textField:'marital',data:marital"  style="width:200px;height:26px"  required="true"> </td>
            </div>
            <div class="fitem">
               <td> <label style="width:150px"><strong>&nbsp;&nbsp;&nbsp;Joining Date:</strong></label></td>
                <td><input id="joining_date" name="joining_date" class="easyui-datebox easyui-validatebox" style="width:200px;height:26px" required="true"></td>
            </div>
            </tr>
            <tr>
            <div class="fitem" id="rank">
                <td><label style="width:150px"><strong>Rank:</strong></label></td>
               <td> <input id="rank_id" name="rank_id" class="easyui-combobox" style="width:200px;height:26px" data-options="valueField: 'rank_id',textField:'rank_title'" style="width:200px;height:26px"></td>
            </div>
              </tr>
            </table>
          </form>
    </div>
  
    <div id="errorDlg" class="easyui-dialog" style="width:300px;height:100px;padding:10px 20px; vertical-align: middle" closed="true">
        <font color='red'>Please Select Unit.</font>
    </div>
    <div id="dlg-buttons">
        <a href="#" class="easyui-linkbutton" iconCls="icon-save" onClick="saveEmployee()">Save</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-cancel" onClick="javascript:$('#dlg').dialog('close')">Cancel</a>
    </div>

<div id="p" class="easyui-panel"></div>

<div id="r"></div>	
<div id="rs"></div>



<script type="text/javascript">
    var kb = 'Phonetic';
</script>


