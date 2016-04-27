
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/easyui.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/icon.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/demo.css">
<link href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.easyui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/datagrid-scrollview.js"></script>

<h2>Summary</h2>
<form class="form-horizontal well" action="<?php echo base_url(); ?>index.php/grid/import" method="post" name="upload_excel" enctype="multipart/form-data">
    <input type="file" name="file" id="file" class="input-mini">
    <button type="submit" id="submit" name="Import" class="btn sm btn-primary button-loading">Import</button>
</form>

<table id="tt" class="easyui-datagrid" style="width:100%;height:750px;"	title="Budget summaries" data-options="view:scrollview,rownumbers:true,singleSelect:true,
		url:'<?php echo base_url(); ?>index.php/grid/summaries',autoRowHeight:false,pageSize:50">

    <thead>
        <tr>
            <th field="period" class="th"  >Period</th>
            <th field="department" class="th" >Department</th>
            <th field="unit" class="th" >Unit</th>
            <th field="account" class="th" >Account</th>                   
            <th field="starts" class="th" >Start</th>
            <th field="procurement" class="th" >Procurement type</th>
            <th field="category" class="th" >Category</th>
            <th field="line" class="th" >Line</th>
            <th field="subline" class="th">Subline</th>            
            <th field="priceForeign" class="th" >Price</th>
            <th field="priceLocal" class="th" >Local Price</th>
            <th field="totalForeign" class="th" >Total </th>
            <th field="totalLocal" class="th" >Total Local</th>
            <th field="qty" class="th" >Qty</th>
            <th field="persons" class="th" >Persons</th>
            <th field="freq" class="th" >Feq</th>

        </tr>
    </thead>
</table>




<script type="text/javascript" src="<?php echo base_url(); ?>js/datagrid-scrollview.js"></script>
