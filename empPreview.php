<html>
<head>
    <style>
        d {  
            border-bottom-style: dotted;  
            line-height: 100%;
            .list tr { page-break-inside:avoid; page-break-after:auto;border-bottom:1px solid;}
        }
        tr{
            border: 1px solid black;
        }
        @media print{
	.print{ display:none;}
	.rowcolor{ background-color:#CCCCCC !important;}
	body {padding: 3px; font-size:24px}
	}

tr.thumb {
	float: center;
	list-style: none;
	margin: 0; 
        padding: 10px;
	width: 110px;
}
tr.thumb td {
	margin: 0; 
        padding: 5px;
	float: center;
	position: relative;  /* Set the absolute positioning base coordinate */
	width: 110px;
	height: auto;
}
tr.thumb td img {
	width: 90px; 
        height: auto;  //Set the small thumbnail size 
	-ms-interpolation-mode: bicubic; /* IE Fix for Bicubic Scaling */
	border: 1px solid #ddd;
	padding: 5px;
	background: #f0f0f0;
	position: absolute;
	left: 5px; top: 5px;
}


tr.thumb td img:hover { 
	border: none; /* Get rid of border on hover */
                cursor: pointer;
                width:100%; 
                height:auto;
}
.tg  {border-collapse:collapse;border-spacing:0;width: 100%}
        .tg td{font-size:17px;font-weight: bold;padding:3px 2px;border-style:solid;border:1px solid #000;overflow:hidden;word-break:normal;}
  
    </style>
    <style type="text/css">
        #ofrinf{
            border-collapse:collapse;
            border-spacing:0;
        }
        #officerdeatil {
            border-collapse:collapse;
            border-spacing:0;
        }
        #officerdeatil td{
            border-style:solid;
            border-width:1px;
            overflow:hidden;
            padding:8px;
        }
    </style>
        <?php
$shortname = $empinfo->short_name;
if(isset($shortname)){
$shortname = $empinfo->short_name;
$shortname = ucwords($shortname);
$shortname = ucwords(strtolower($shortname));
}
//echo $bar;
?>
    
                    <meta charset="UTF-8">
                    <title><?php if(isset($page_title)) echo $page_title; else {if(isset($shortname))echo "Officer Information";else echo "Employee Information";}?></title>
                    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>uicontents/themes/default/easyui.css">
                    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/uicontents/themes/icon.css">
                    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/uicontents/themes/demo.css">
</head>
   <body style="padding:11px 50px">
    <p align="center">
        <strong ><font style='font-size:25px'>
            <?php
            if(isset($shortname)){?>
               Officer Information
               <?php
               }else{
                   ?>
                   Employee Information
                   <?php
               }
               
               ?>
            <br/></font></strong></p><br><br>
<?php //echo base_url(); ?>
<!-- Updated By Pantho-->


<table id="ofrinf" style="width:100%;">
  <tr>
    <th style="width:60%; background-color:#c0c0c0; text-align: left; padding: 5px; font-size: 14px;"><?php if(isset($empinfo->emp_name)){echo $shortname.' '.$empinfo->emp_name; }?></th>
    <th style="width:40%; background-color:#c0c0c0; text-align: right; padding: 5px; font-size: 14px;"><?php if(isset($empinfo->ba_no)){echo $empinfo->id_prefix.'-'.$empinfo->ba_no; }?></th>
  </tr>
  <tr>
      <td>
          <table id="officerdeatil" style="width:100%;">
              <tr>
                  <td style="text-align: left;"><strong>Appointment</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->post_name)){echo $empinfo->post_name;} ?></td>
              </tr>
              <tr>
                  <td style="text-align: left;"><strong>Unit</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->unit_name)){echo $empinfo->unit_name;} ?></td>
              </tr>
              <tr>
                  <td style="text-align: left;"><strong>Rank</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->short_name)){echo $shortname;} ?></td>
              </tr>
              <tr>
                  <td style="text-align: left;"><strong>Gender</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->gender)){ if($empinfo->gender=='M'){ echo "Male";}else{ echo "Female";} } ?></td>
              </tr>
              <tr>
                  <td style="text-align: left;"><strong>Date of Birth</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->dob_date)){echo date_style($empinfo->dob_date); }?></td>
              </tr>
              <tr>
                  <td style="text-align: left;"><strong>Joining Date</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->joining_date)){echo date_style($empinfo->joining_date); }?></td>
              </tr>
              <tr>
                  <td style="text-align: left;"><strong>PRL Date</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->lpr_start_date)){echo date_style($empinfo->lpr_start_date);} ?></td>
              </tr>
              <tr>
                  <td style="text-align: left;"><strong>Retirement Date</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->retired_date)){echo date_style($empinfo->retired_date);} ?></td>
              </tr>
              <tr>
                  <td style="text-align: left;"><strong>Service</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->service_name)){echo $empinfo->service_name;} ?></td>
              </tr>
              <tr>
                  <td style="text-align: left;"><strong>Corps/Regiments</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->core_name)){echo $empinfo->core_name;} ?></td>
              </tr>
              <tr>
                  <td style="text-align: left;"><strong>Special Duty</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->duty_name)){echo $empinfo->duty_name;} ?></td>
              </tr>
              <tr>
                  <td style="text-align: left;"><strong>CORO Order No.</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->coro_order)){echo $empinfo->coro_order;} ?></td>
              </tr>
              <tr>
                  <td style="text-align: left;"><strong>CORO Order Date</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->coro_order_date)){echo date_style($empinfo->coro_order_date);} ?></td>
              </tr>
              <tr>
                  <td style="text-align: left;"><strong>Move Order No.</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->move_order)){echo $empinfo->move_order;} ?></td>
              </tr>
              <tr>
                  <td style="text-align: left;"><strong>Move Order Date</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->move_order_date)){echo date_style($empinfo->move_order_date);} ?></td>
              </tr>
              <tr>
                  <td style="text-align: left;"><strong>Mission</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->mission)){if($empinfo->mission == 0){echo 'No';}else{echo 'Yes';}} ?></td>
              </tr>
              
              
              <tr>
                  <td style="text-align: left;"><strong>Depot</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->org_name)){echo $empinfo->org_name;} ?></td>
              </tr>
              <tr>
                  <td style="text-align: left;"><strong>Marital Status</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->marital_status)){ if($empinfo->marital_status == 1) {echo "Married";}else{ echo "Unmarried";} } ?></td>
              </tr>                            
              <tr>
                  <td style="text-align: left;"><strong>Mobile No.</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->emp_mobile)){echo $empinfo->emp_mobile;} ?></td>
              </tr>
              <tr>
                  <td style="text-align: left;"><strong>Email</strong></td>
                  <td style="text-align: left;"><?php if(isset($empinfo->emp_email)){echo $empinfo->emp_email;} ?></td>
              </tr>
          </table>
      </td>
      <td style="text-align: center;">
            <?php if(isset($empinfo->emp_img)){ ?>
                <div style="width:200px; height: 200px; margin: auto;">
                    <img src="<?php echo base_url().$empinfo->emp_img; ?>" style="width:200px; height: 200px;" alt="Officer Image"/>
                </div>
            <?php } ?>
      </td>
  </tr>
</table>

<p align="center">
    <button class="print" onclick='javascript:window.close();'>Close</button>
    <button class="print" onclick='javascript:print()'>Print</button>
</p>

</body>
</html>



