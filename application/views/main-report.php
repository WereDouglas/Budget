<!-- Content Header (Page header) -->
<link href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>css/mine.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/easyui.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/icon.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/demo.css">

<?php
if ($this->session->userdata('unit') != "") {
    $hide2 = "display:none;";
} else {
    $hide2 = "display:visible;";
}
if ($this->session->userdata('department') != "") {
    $hide = "display:none;";
} else {
    $hide = "display:visible;";
}
if ($this->session->userdata('period') != "" || $this->session->userdata('period') != "none") {
    $hide3 = "display:none;";
}
if ($this->session->userdata('period') == "none") {
    $hide3 = "display:visible;";
}
?> 
<section class="content-header">
    <h1>  Consolidated reports   </h1> 
    <hr>
    <div class="row" >
        <div class="col-xs-4">

            Budget year/period<br>
            <input class="easyui-combobox" style="width:100px" id="period" name="period"  url="<?php echo base_url() . 'index.php/grid/period/'; ?>" valueField="period" textField="period">
            <br>
            Department<br>
            <input class="easyui-combobox" style="width:100px" id="department" name="department"  url="<?php echo base_url() . 'index.php/grid/department/'; ?>" valueField="department" textField="department">

            <br>Unit<br> <input class="easyui-combobox" style="width:100px" id="unit" name="unit"  url="<?php echo base_url() . 'index.php/grid/unit/'; ?>" valueField="unit" textField="unit">

            <br>   Account<br>
            <input class="easyui-combobox" id="account" name="account" style="width:100px"  url="<?php echo base_url() . 'index.php/grid/account/'; ?>" valueField="account" textField="account">
        </div>




        <div class="col-xs-4">

            Budget Categories<br>
            <input class="easyui-combobox" id="category" name="category" style="width:100px"  url="<?php echo base_url() . 'index.php/grid/categories/'; ?>" valueField="category" textField="category">
            <br>
            Objective<br> 
            <input class="easyui-combobox" id="objective" name="objective" style="width:100px"  url="<?php echo base_url() . 'index.php/grid/objective/'; ?>" valueField="objective" textField="objective">


            <br>
            Strategy/Initiatives<br>
            <input class="easyui-combobox" id="initiative" name="initiative" style="width:100px"  url="<?php echo base_url() . 'index.php/grid/initiative/'; ?>" valueField="initiative" textField="initiative">


            <br>  Users<br>
            <input class="easyui-combobox" id="by" name="by" style="width:100px"  url="<?php echo base_url() . 'index.php/grid/user/'; ?>" valueField="submitted" textField="submitted">
        </div>   

        <div class="col-xs-4"> 
            Reporting line<br>
            <input class="easyui-combobox" id="line" name="line" style="width:100px"  url="<?php echo base_url() . 'index.php/grid/lines/'; ?>" valueField="line" textField="line">

            <br>
            Sub line<br>
            <input class="easyui-combobox" id="subline" name="subline" style="width:100px"  url="<?php echo base_url() . 'index.php/grid/sublines/'; ?>" valueField="subline" textField="subline">


        </div>
        <div class="col-xs-4">                 
            <br>  <br>  <br>
            <button type="" id="generate"  name="generate"  class="btn btn-primary btn-small btn-flat">Generate</button>
        </div>


    </div>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Information</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <input type="button" name="exportExcel" id="exportExcel" onclick="ExportToExcel('datatable')" value="Export to Excel">
            <span id="loading" class="col-lg-12"  name ="loading"><img src="<?= base_url(); ?>images/loading.gif" alt="loading.........." /></span><br>

        </div><!-- /.box-body -->
        <div class="box-footer">

        </div><!-- /.box-footer-->
    </div><!-- /.box -->



</section><!-- /.content -->


<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->

</body>


<script src='<?= base_url(); ?>js/jquery.dataTables.min.js'></script>

<script src="<?= base_url(); ?>js/jquery.dataTables.js" type="text/javascript"></script>
<script>
                $('#loading').hide();
//Script for getting the dynamic values from database using jQuery and AJAX
                $("#generate").on("click", function (e) {

                    var period = $('input[name$="period"]').val();
                    var department = $('input[name$="department"]').val();
                    var unit = $('input[name$="unit"]').val();
                    var initiative = $('input[name$="initiative"]').val();
                    var account = $('input[name$="account"]').val();
                    var by = encodeURIComponent($("#by").val());

                    $.post("<?php echo base_url() ?>index.php/consolidate/generate", {period: period, department: department, unit: unit, initiative: initiative, account: account, by: by}
                    , function (response) {
                        $('#loading').hide();
                        setTimeout(finishAjax('loading', escape(response)), 200);

                    }); //end change

                })
                function finishAjax(id, response) {
                    $('#' + id).html(unescape(response));
                    $('#' + id).fadeIn();
                }


</script>


<script type="text/javascript">
    function ExportToExcel(datatable) {
        var htmltable = document.getElementById('datatable');
        var html = htmltable.outerHTML;
        window.open('data:application/vnd.ms-excel,' + ';filename=exportData.xlsx;' + encodeURIComponent(html));
        var result = "data:application/vnd.ms-excel,";
        this.href = result;
        this.download = "my-custom-filename.xls";
        return true;
    }


</script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.easyui.min.js"></script>