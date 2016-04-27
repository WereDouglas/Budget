<!-- Content Header (Page header) -->
<link href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/easyui.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/icon.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/demo.css">
<section class="content-header">
    <h1>  Consolidated graphical reports   </h1> 
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

    <div class="row-fluid">
        <div id="container" style="min-width: 310px; height: 200px; margin: 0 auto"></div>
        <div id="container2" style="height: 300px"></div>
        <div id="container3" style="height: 300px"></div>

    </div>


</section><!-- /.content -->


<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src='<?= base_url(); ?>js/jquery.dataTables.min.js'></script>
<script src="<?= base_url(); ?>js/jquery.dataTables.js" type="text/javascript"></script>

<script type="text/javascript">
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

</script>


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
            yAxis: [{// Primary yAxis
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
                }, {// Secondary yAxis
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


<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.easyui.min.js"></script>
<script src="<?= base_url(); ?>/js/highcharts.js"></script>
<script src="<?= base_url(); ?>js/highcharts-3d.js"></script>
<script src="<?= base_url(); ?>/js/modules/exporting.js"></script>

