<!-- Content Header (Page header) -->
<link href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<section class="content-header">
    <h1>  Consolidated graphical reports   </h1> 
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
 
      <div class="row-fluid">
                       <div id="container" style="min-width: 310px; height: 200px; margin: 0 auto"></div>
<div id="container2" style="height: 300px"></div>
<div id="container3" style="height: 300px"></div>
                 
</div>
                   

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

<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            zoomType: 'xy'
        },
        title: {
            text: 'Total budgets per month'
        },
        subtitle: {
            text: ''
        },
        xAxis: [{
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            crosshair: true
        }],
        yAxis: [{ // Primary yAxis
            labels: {
                format: '{value}million',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            },
            title: {
                text: 'Shs/USD',
                style: {
                    color: Highcharts.getOptions().colors[1]
                }
            }
        }, { // Secondary yAxis
            title: {
                text: 'Number',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            labels: {
                format: '{value} million',
                style: {
                    color: Highcharts.getOptions().colors[0]
                }
            },
            opposite: true
        }],
        tooltip: {
            shared: true
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            x: 120,
            verticalAlign: 'top',
            y: 100,
            floating: true,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        series: [{
            name: 'Number',
            type: 'column',
            yAxis: 1,
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
            tooltip: {
                valueSuffix: ' million'
            }

        }, {
            name: 'Count',
            type: 'spline',
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
            tooltip: {
                valueSuffix: 'M'
            }
        }]
    });
});
		</script>
                
          <script type="text/javascript">
$(function () {
    $('#container2').highcharts({

        chart: {
            type: 'column',
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                viewDistance: 25,
                depth: 40
            },
            marginTop: 80,
            marginRight: 40
        },

        title: {
            text: 'Total budgets per department'
        },

        xAxis: {
            categories: ['Technology', 'Revenue', 'accounting', 'Legal', 'Repairs']
        },

        yAxis: {
            allowDecimals: false,
            min: 0,
            title: {
                text: 'Amount in shs'
            }
        },

        tooltip: {
            headerFormat: '<b>{point.key}</b><br>',
            pointFormat: '<span style="color:{series.color}">\u25CF</span> {series.name}: {point.y} / {point.stackTotal}'
        },

        plotOptions: {
            column: {
                stacking: 'normal',
                depth: 40
            }
        },

        series: [{
            name: 'ICT',
            data: [5, 3, 4, 7, 2],
            stack: 'male'
        }, {
            name: 'Legal',
            data: [3, 4, 4, 2, 5],
            stack: 'male'
        }, {
            name: 'HUMAN_RESOURCES & ADMIN',
            data: [2, 5, 6, 2, 1],
            stack: 'female'
        }, {
            name: 'INTERNAL AUDIT ',
            data: [3, 0, 4, 4, 3],
            stack: 'female'
        }]
    });
});


		</script>
                <script type="text/javascript">
$(function () {
    $('#container3').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: 'Department expenditure'
        },
        subtitle: {
            text: 'reports per department'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: 'Department',
            data: [
                ['ICT', 8],
                ['Legal', 3],
                ['Broadcasting', 10],
                ['INTERNAL AUDIT ', 6],
                ['HUMAN_RESOURCES & ADMIN', 8],
                ['COMPETITION & CONSUMERAFFAIRS ', 4]
                
            ]
        }]
    });
});
		</script>
                
<script src="<?= base_url(); ?>/js/highcharts.js"></script>
<script src="<?= base_url(); ?>js/highcharts-3d.js"></script>
<script src="<?= base_url(); ?>/js/modules/exporting.js"></script>