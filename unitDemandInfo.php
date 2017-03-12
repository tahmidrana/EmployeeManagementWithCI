<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <script type="text/javascript">
          
            function removedemand() {
                var row = $('#demand_grid').datagrid('getSelected');
                if (row) {
                    $.messager.confirm('Confirm', 'Are you sure you want to remove this Demand Info?', function (r) {
                        if (r) {
                            $.post('<?php echo base_url('issue/UnitDemandController/deletedemand'); ?>', {demand_id: row.demand_id}, function (result) {
                                if (result.success) {
                                    $('#demand_grid').datagrid('reload');	// reload the user data
                                    $.messager.show({// show error message
                                        title: 'Success',
                                        // msg: result.success
                                        msg: 'Deleted successfully'
                                    });
                                } else {
                                    $.messager.show({// show error message
                                        title: 'Error',
                                        msg: result.msg
                                    });
                                }
                            }, 'json');
                        }
                    });
                }
            }
            function rowDemand(row) {
             if(row.approval_status==0&&!row.os_comments){
                return "&nbsp;<a href='<?php echo base_url('issue/UnitDemandController/updatedemand') . '/'; ?>" + row.demand_id + "' style='text-decoration:none;' class='icon-edit easyui-tooltip' title='edit'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;<a href='javascript:removedemand();' style='text-decoration:none;' class='icon-remove' title='Delete'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>";
            }
//            else if(row.approval_status==0&&row.os_comments){
//                return "&nbsp;<a href='<?php echo base_url('issue/UnitDemandController/updatedemand') . '/'; ?>" + row.demand_id + "' style='text-decoration:none;' class='icon-edit easyui-tooltip' title='edit'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>&nbsp;&nbsp;<a href='javascript:removedemand();' style='text-decoration:none;' class='icon-remove' title='Delete'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>";
//            }
            else{
                return " ";
                }
            }

          function rowForward(row) {
                if(row.approval_status<2&&!row.os_comments)
                {
                  return "&nbsp;<a href='javascript:forwardfmn("+row.demand_id+");' style= 'text-decoration:none;'  title='Decision'>Decision</a>";
                }else if(!row.os_comments){
                   return "<font style='text-decoration:non;color:#0A860A ;margin:0px'>Sent</font>&nbsp;&nbsp;&nbsp;<a href='javascript:forwardfmn("+row.demand_id+");' style= 'text-decoration:none;' Class='icon-cut' title='Demand Preview'>&nbsp; &nbsp;&nbsp;</a>&nbsp;";
                }
                else if(row.approval_status==0&&row.os_comments){
                    return "&nbsp;<a href='javascript:forwardfmn("+row.demand_id+");' style= 'text-decoration:none;'  title='Decision'>Decision</a>";
                }
                else{
                     return "&nbsp;<a href='javascript:forwardfmn("+row.demand_id+");' style= 'text-decoration:none;'  title='Decision'>Decision</a>";
                }
            }
            function forwardfmn(demand_id) {
                var left = 300;
                var top = 100;
                var url = '<?php echo base_url('issue/UnitDemandController/forwardingForm') . '/'; ?>' + demand_id;
                newwindow = window.open(url, 'Demand Detail', 'height=700,width=800, scrollbars=yes,top = ' + top + ',left=' + left);
                if (window.focus) {
                    newwindow.focus()
                }
            }
            
    function rowStatus(row) {
           if(row.approval_status==0&&!row.issue_status&&!row.os_comments){
                  return "<p style='text-decoration:non;color:#0A860A ;margin:0px' title='Draft'>Draft</p>";
            }else  if(row.approval_status==1&&!row.issue_status&&!row.os_comments){
                  return "<p style='text-decoration:non;color:#0A860A ;margin:0px' title='Internal Approval In Progress'>Internal Approval In Progress</p>";
            }else if(row.approval_status==2&&!row.issue_status&&!row.os_comments){
                  return "<p style='text-decoration:non;color:#0A860A ;margin:0px'  title='Fmn Approval In Progress'>Fmn Approval In Progress</p>";
            }else if(row.approval_status==3&&!row.issue_status&&!row.os_comments){
                  return "<p style='text-decoration:non;color:#0A860A ;margin:0px'  title='OSS Approval In Progress'>OSS Approval In Progress</p>";
            }else if(row.approval_status==4&&!row.issue_status&&!row.os_comments){
                  return "<p style='text-decoration:non;color:#0A860A ;margin:0px'  title='Approved'>Approved</p>";
            }else if(row.approval_status==4&&row.issue_status==1&&!row.os_comments){
                  return "<p style='text-decoration:non;color:#0A860A ;margin:0px'  title='Received'>Received</p>";
            }else if(row.approval_status==4&&row.issue_status==2&&!row.os_comments){
                  return "<p style='text-decoration:non;color:#0A860A ;margin:0px'  title='I V Prepared'>IV Prepared</p>";
            }else if(row.approval_status==0&&row.os_comments){
                  return "<p style='text-decoration:non;color:red ;margin:0px'  title='Decline'>RTU</p>";
            }else{
                    return "<p style='text-decoration:non;color:#0A860A ;margin:0px' title='Internal Approval In Progress'>Internal Approval In Progress</p>";
            }
             
         }

function reloadDemandGrid(){
  $('#demand_grid').datagrid('reload');
     } 
     function refresh(){
         $('#demand_grid').datagrid('reload');
    }
      function rowSubDepot(row) {
           return row.org_name+" ("+row.main_name+")";
           }
           function filter(){
                  var demandType=$('#demand_type').combobox('getValue');
                  var demandStatus=$('#demandStatus').combobox('getValue');
                  var  fromDate = $('#from_date').datebox('getValue');
                  var ToDate = $('#to_date').datebox('getValue');
                  var demand_no=$('#demand_no').val();
                  var demand_no = demand_no.replace("/",'%2A');
                  var demand_no = demand_no.replace("/",'%2A');
                  var demand_no = demand_no.replace("/",'%2A');
                  var demand_no = demand_no.replace("(",'%2B');
                  var demand_no = demand_no.replace(")",'%2C');
                   if(fromDate==''){
                        fromDate=1;
                    }
                     if(ToDate==''){
                        ToDate=1;
                    }
                    if(demand_no==''){
                        demand_no=0;
                    }
                    if(ToDate<fromDate){
                        ToDate=1;
                    }
                 if(ToDate  && fromDate==1){
                        fromDate=ToDate;
                    }
                    var dgUrl='<?php echo base_url('issue/UnitDemandController/demandList').'/'; ?>'+demandType+'/'+demandStatus+'/'+demand_no+'/'+fromDate+'/'+ToDate;
                      $('#demand_grid').datagrid({
                          url:dgUrl
                      });
               
    }
           
    function demandType(){
        var demandType=$('#demand_type').combobox('getValue');
        var demandStatus=$('#demandStatus').combobox('getValue');
        var url='<?php echo base_url('issue/UnitDemandController/demandForm').'/'; ?>'+demandType;
         $('#demandButton').attr("href",url);
          var dgUrl='<?php echo base_url('issue/UnitDemandController/demandList').'/'; ?>'+demandType+'/'+demandStatus+'/'+0+'/'+1+'/'+1;
        if(demandType==0){
        $('#demand_grid').datagrid({
        url: dgUrl,
        title:'Unit Demand List',
        columns:[[
                   {field:'demand_no',title:'<strong>Demand No</strong>',width:15},
                   {field:'demand_date',title:'<strong>Demand Date</strong>',width:13,
                              formatter:function(value, row, index){ return dateformat(row.demand_date); }
                   },
                   {field:'sub',title:'<strong>Sub Depot</strong>', width:20, align:'center',
			formatter:function(value, row, index){ return rowSubDepot(row); }
	},
                   {field:'status',title:'<strong>Status</strong>', width:15, align:'center',
			formatter:function(value, row, index){ return rowStatus(row); }
	},
                {field:'forward',title:'<strong>Decision</strong>', width:11, align:'center',
			formatter:function(value, row, index){ return rowForward(row); }
	},
                 {field:'demand',title:'<strong>Action</strong>', width:8, align:'center',
			formatter:function(value, row, index){ return rowDemand(row); }
	}
    ]]
    });
    }else if(demandType==3){
             $('#demand_grid').datagrid({url:dgUrl,title:'Organization Demand List'});
    }else{
     $('#demand_grid').datagrid({
        url: dgUrl,
        title:'Officer Demand List',
            columns:[[
                   {field:'demand_no',title:'<strong>Demand No</strong>',width:15},
                   {field:'demand_date',title:'<strong>Demand Date</strong>',width:13,
                              formatter:function(value, row, index){ return dateformat(row.demand_date); }
                   },
                   {field:'sub',title:'<strong>Sub Depot</strong>', width:20, align:'center',
			formatter:function(value, row, index){ return rowSubDepot(row); }
	},
                   {field:'emp_name',title:'<strong>Officer Name</strong>',width:20},
                   {field:'status',title:'<strong>Status</strong>', width:20, align:'center',
			formatter:function(value, row, index){ return rowStatus(row); }
	},
                {field:'forward',title:'<strong>Decision</strong>', width:11, align:'center',
			formatter:function(value, row, index){ return rowForward(row); }
	},
                 {field:'demand',title:'<strong>Action</strong>', width:8, align:'center',
			formatter:function(value, row, index){ return rowDemand(row); }
	}
                ]]
         });
    }
    }
</script>

    </head>
    <body>
        <h2></h2>
         <strong  style="margin-left:10px; margin-top:10px;">Demand Type:</strong>
         <select class="easyui-combobox" name="demand_type"  id="demand_type" <?php  if(!$this->session->userdata('emp_unit_id')) echo "readonly=true";  ?>  style="width:160px;height: 30px" data-options='onSelect:demandType' required="true">
       <?php
       if($this->session->userdata('emp_unit_id')){  
           ?>
       <option value="0"<?php if(isset($demand_type) && $demand_type==0){echo 'selected="selected"';}?>>Unit Demand</option>
       <option value="4"<?php if(isset($demand_type) && $demand_type==4){echo 'selected="selected"';}?>>Officer Demand</option>
       <?php }else{  
           ?>
    <option value="3"<?php if(isset($demand_type) && $demand_type==3){echo 'selected="selected"';}?>>Organization Demand</option>
     <?php } 
     ?>
      </select> 
         <a id="demandButton"  class="easyui-linkbutton" iconCls="icon-add">Add</a>
         <strong  style="margin-left:10px; margin-top:10px;">Status:</strong>
           &nbsp;&nbsp;<select class="easyui-combobox" name="demandStatus"  id="demandStatus"  style="width:100px;height: 30px" data-options='onSelect:demandType,onLoadSuccess:demandType' >
               <option value="0" selected="selected">All</option>
               <option value="1">Receive</option>
               <option value="2">RTU</option>
         </select> 
           <strong  style="margin-left:10px; margin-top:10px;">Demand No:</strong>
           &nbsp;&nbsp;<input name="demand_no" id="demand_no" class="easyui-textbox" data-options="" style="width:120px;height:26px">  
           <strong  style="margin-left:10px; margin-top:10px;">From Date:</strong>
           &nbsp;&nbsp;<input name="from_date" id="from_date" class="easyui-datebox" style="width:100px;height:26px" data-options='onSelect:filter'>  
           <strong  style="margin-left:10px; margin-top:10px;">To Date:</strong>
           &nbsp;&nbsp;<input name="to_date" id="to_date" class="easyui-datebox" style="width:100px;height:26px" data-options="onSelect:filter">
            &nbsp;<button class="easyui-linkbutton"  onclick="filter()"  iconCls="icon-search">Filter</button>
         <h2></h2>
         <table id="demand_grid" class="easyui-datagrid" width="100%"
               toolbar="#toolbar" pagination="true" sortName="demand_id" sortOrder="desc"
               rownumbers="true" fitColumns="true" singleSelect="true"  data-options="
                 rowStyler: function(index,row){
                 if (row.approval_status<2&&!row.os_comments){
                            return 'background-color:#ffe48d;color:blue;font-weight:bold;';
                    }
                }
                 ">
            <thead>
                <tr>
                    <th field="demand_no" width="15" ><strong>Demand No</strong></th>
                    <th field="demand_date" width="13" ><strong>Demand Date</strong></th>
                    <th field="org_name" width="20" ><strong>Sub Depot</strong></th>
                    <th field="status" align="center" width="15" formatter="(function(value, row, index){ return rowStatus(row); })"><strong>Status</strong></th>
                    <th field="forward" align="center" width="10" formatter="(function(value, row, index){ return rowForward(row); })"><strong>Decision</strong></th>
                    <th field="demand" width="8" align="center"  formatter="(function(value, row, index){ return rowDemand(row); })"><strong>Action</strong></th>
                </tr>
            </thead>
        </table>
        <div id="toolbar">
            <a href="#" class="easyui-linkbutton" iconCls="icon-reload" plain="false" onClick="refresh()" >Refresh</a>
            
         </div>
        
    </body>
</html>	









