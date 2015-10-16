<!-- Content Header (Page header) -->
<link href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<section class="content-header">
    <h1>  Consolidated reports   </h1> 
    <hr>
    <div class="row" >
        <div class="col-xs-4">

            Budget year/period<br>
            <select name="period"  id="period" >
                <option></option>
                <?php foreach ($periods as $loop) { ?>   
                    <option><?= $loop->year ?></option>
                <?php } ?>

            </select><br>
            Department<br>
            <select name="department"  id="department" >
                <option></option>
                <?php foreach ($departments as $loop) { ?>   
                    <option><?= $loop->name ?></option>
                <?php } ?>

            </select>
            <br>Unit<br><select id="unit"  name="unit" >
                <option></option>
            </select>
            <br>   Account<br>
            <select name="account" id="account" >
                <option></option>
                <?php foreach ($budgets as $loop) { ?>   
                    <option><?= $loop->account ?></option>
                <?php } ?>
            </select>

        </div>


        <div class="col-xs-4">

            Budget Categories<br>
            <select name="category" id="category" >
                <option></option>
                <?php foreach ($categories as $loop) { ?>   
                    <option><?= $loop->name ?></option>
                <?php } ?>
            </select><br>
            Objective<br> <select name="objective" id="objective" >
                <option></option>
                <?php foreach ($objectives as $loop) { ?>   
                    <option><?= $loop->code ?></option>
                <?php } ?>

            </select><br>
            Strategy/Initiatives<br>
            <select name="initiative" id="initiative" >
                <option></option>
            </select>

            <br>  Users<br>
            <select name="by" id="by" >                            
                <option></option>
                <?php foreach ($budgets as $loop) { ?>   
                    <option><?= $loop->by ?></option>
                <?php } ?>
            </select>                    

        </div>   

        <div class="col-xs-4"> 
            Reporting line<br>
            <select name="line" id="line" >
                <option></option>
            </select>
            <br>
            Sub line<br>
            <select name="subline" id="subline" ></select>

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
            <span id="loading" class="col-lg-12"  name ="loading"><img src="<?= base_url(); ?>images/loading.gif" alt="loading" /></span><br>

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

<script src="<?php echo base_url(); ?>js/moment-with-locales.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.js"></script>
</head>
<script src='<?= base_url(); ?>js/jquery.dataTables.min.js'></script>

<script src="<?= base_url(); ?>js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Page script -->
<link id="base-style-responsive" href="<?php echo base_url(); ?>css/mine.css" rel="stylesheet">


<script type="text/javascript">
    $(document).ready(function ()
    {
        $.post("<?php echo base_url() ?>index.php/consolidate/budgets", {posts: ""}
        , function (response) {
            $('#loading').hide();
            setTimeout(finishAjax('loading', escape(response)), 200);

        }); //end change

        $("#generate").on("click", function (e) {

            var period = $("#period").val();
            var department = $("#department").val();
            var unit = $("#unit").val();
            var initiative = $("#initiative").val();
            var account = $("#account").val();
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

    });

</script>
<script>
//Script for getting the dynamic values from database using jQuery and AJAX
    $(document).ready(function () {
        $('#department').change(function () {

            var form_data = {
                name: $('#department').val()
            };

            $.ajax({
                url: "<?php echo base_url() . "index.php/unit/where"; ?>",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                success: function (msg) {
                    var sc = '';
                    $.each(msg, function (key, val) {
                        sc += '<option value="' + val.name + '">' + val.name + '</option>';
                    });
                    $("#unit option").remove();
                    $("#unit").append(sc);
                }
            });
        });

        $('#objective').change(function () {

            var form_data = {
                name: $('#objective').val()
            };

            $.ajax({
                url: "<?php echo base_url() . "index.php/initiative/where"; ?>",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                success: function (msg) {
                    var sc = '';
                    var pc = '';
                    $.each(msg, function (key, val) {
                        sc += '<option value="' + val.details + '">' + val.details + '</option>';
                        pc = val.values;

                    });
                    $("#initiative option").remove();
                    $("#initiative").append(sc);
                    $("#performance").val("");
                    $("#performance").val(pc);

                }
            });
        });

        $('#category').change(function () {

            var form_data = {
                name: $('#category').val()
            };

            $.ajax({
                url: "<?php echo base_url() . "index.php/reporting/where"; ?>",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                success: function (msg) {
                    var sc = '';

                    $.each(msg, function (key, val) {
                        sc += '<option value="' + val.name + '">' + val.name + '</option>';

                    });
                    $("#line option").remove();
                    $("#line").append(sc);



                }
            });
        });
        $('#line').change(function () {

            var form_data = {
                name: $('#line').val()
            };

            $.ajax({
                url: "<?php echo base_url() . "index.php/subline/where"; ?>",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                success: function (msg) {
                    var sc = '';

                    $.each(msg, function (key, val) {
                        sc += '<option value="' + val.name + '">' + val.name + '</option>';

                    });
                    $("#subline option").remove();
                    $("#subline").append(sc);



                }
            });
        });
        $('#subline').change(function () {

            var form_data = {
                name: $('#subline').val()
            };

            $.ajax({
                url: "<?php echo base_url() . "index.php/account/where"; ?>",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                success: function (msg) {
                    var sc = '';

                    $.each(msg, function (key, val) {
                        sc += '<option value="' + val.number + '">' + val.name + " " + val.number + '</option>';

                    });
                    $("#account option").remove();
                    $("#account").append(sc);



                }
            });
        });
        $('#currency').change(function () {

            var form_data = {
                name: $('#currency').val()
            };

            $.ajax({
                url: "<?php echo base_url() . "index.php/rate/where"; ?>",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                success: function (msg) {
                    var sc = '';
                    $.each(msg, function (key, val) {
                        sc = val.rate;
                    });
                    console.log(sc);
                    $("#rate").text("");
                    $("#rate").val(sc);
                }
            });
        });

        $('#price').blur(function () {
            var priceL = $("#price").val() * $("#rate").val();
            $("#priceL").val(priceL);

        });



        $('#period').change(function () {

            var form_data = {
                period: $('#period').val()
            };

            $.ajax({
                url: "<?php echo base_url() . "index.php/period/where"; ?>",
                type: 'POST',
                dataType: 'json',
                data: form_data,
                success: function (msg) {
                    var startp = '';
                    var endp = '';
                    $.each(msg, function (key, val) {
                        startp = val.start;
                        endp = val.end;
                    });

                    $("#endp").val(endp);
                    $("#startp").val(startp);
                }
            });
        });


    });
</script>

<script type="text/javascript">
    $(function () {
        $('#start').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#end').datetimepicker({
            format: 'YYYY-MM-DD'
        });
    });
</script>