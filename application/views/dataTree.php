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
    <div class="container" style="width: 800px;">
        <div class="easyui-layout" style="width: 100%; height: 600px;">
            <div class="header" data-options="region:'north', split:'true'">
                <h1>Data Tree</h1>
            </div>
            <div class="body" data-options="region:'center', title:'All Employee List'">
                
            </div>
            <div class="sidebar" data-options="region:'west', split:true" style="width: 200px;">
                <div class="easyui-panel">
                    <ul id="tt" class="easyui-tree">
                        <li>
                            <span>Banks</span>
                            <ul>
                                <li data-options="state:'closed'">
                                    <span>Prime Bank</span>
                                    <ul>
                                        <li>Mirpur Branch</li>
                                        <li>Mohammadpur Branch</li>
                                        <li>Uttora Branch</li>
                                    </ul>
                                </li>
                                <li>
                                    <span>Brack Bank</span>
                                    <ul>
                                        <li>Mirpur Branch</li>
                                        <li>Uttora Branch</li>
                                    </ul>
                                </li>
                                <li>
                                    <span>Dutch Bangla Bank</span>
                                    <ul>
                                        <li>Mirpur Branch</li>
                                        <li>Tejgaon Branch</li>
                                        <li>Banani Branch</li>
                                        <li>Dhanmondi Branch</li>
                                    </ul>
                                </li>
                                <li>
                                    <span>Islami Bank</span>
                                    <ul>
                                        <li>Mirpur Branch</li>
                                        <li>Tejgaon Branch</li>
                                        <li>Agargaon Branch</li>
                                        <li>Banasree Branch</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer" data-options="region:'south'">
                <p style="text-align: center;">Employee Management System</p>
            </div>
        </div>
    </div>    
    
    <script type="text/javascript">
        
    </script>
</body>
</html>