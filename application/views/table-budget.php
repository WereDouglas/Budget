<link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Font Awesome Icons -->
<link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<!-- iCheck -->
<link href="<?php echo base_url(); ?>plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

<link id="base-style-responsive" href="<?php echo base_url(); ?>css/mine.css" rel="stylesheet">

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
if ($this->session->userdata('period') != "" ||$this->session->userdata('period') != "none" ) {
    $hide3 = "display:none;";
}
if ($this->session->userdata('period') == "none" ){
    $hide3 = "display:visible;";
}
?> 
<style>
    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
        padding: 0px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #ddd;
    }
    .table {
        margin:0px;padding:0px;
        width:100%;
        box-shadow: 10px 10px 5px #888888;
        border:1px solid #ffffff;

        -moz-border-radius-bottomleft:0px;
        -webkit-border-bottom-left-radius:0px;
        border-bottom-left-radius:0px;

        -moz-border-radius-bottomright:0px;
        -webkit-border-bottom-right-radius:0px;
        border-bottom-right-radius:0px;

        -moz-border-radius-topright:0px;
        -webkit-border-top-right-radius:0px;
        border-top-right-radius:0px;

        -moz-border-radius-topleft:0px;
        -webkit-border-top-left-radius:0px;
        border-top-left-radius:0px;
    }.table table{
        border-collapse: collapse;
        border-spacing: 0;
        width:100%;
        height:100%;
        margin:0px;padding:0px;
    }.table tr:last-child td:last-child {
        -moz-border-radius-bottomright:0px;
        -webkit-border-bottom-right-radius:0px;
        border-bottom-right-radius:0px;
    }
    .table table tr:first-child td:first-child {
        -moz-border-radius-topleft:0px;
        -webkit-border-top-left-radius:0px;
        border-top-left-radius:0px;
    }
    .table table tr:first-child td:last-child {
        -moz-border-radius-topright:0px;
        -webkit-border-top-right-radius:0px;
        border-top-right-radius:0px;
    }.table tr:last-child td:first-child{
        -moz-border-radius-bottomleft:0px;
        -webkit-border-bottom-left-radius:0px;
        border-bottom-left-radius:0px;
    }.table tr:hover td{
        background-color:#cccccc;


    }
    .table td{
        vertical-align:middle;

        background-color:#f7f8f9;

        border:1px solid #ffffff;
        border-width:0px 1px 1px 0px;
        text-align:left;
        padding:0px;
        font-size:10px;
        font-family:Arial;
        font-weight:bold;
        color:#000000;
    }.table tr:last-child td{
        border-width:0px 1px 0px 0px;
    }.table tr td:last-child{
        border-width:0px 0px 1px 0px;
    }.table tr:last-child td:last-child{
        border-width:0px 0px 0px 0px;
    }
    .table tr:first-child td{
        background:-o-linear-gradient(bottom, #003366 5%, #003f7f 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #003366), color-stop(1, #003f7f) );
        background:-moz-linear-gradient( center top, #003366 5%, #003f7f 100% );
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#003366", endColorstr="#003f7f");	background: -o-linear-gradient(top,#003366,003f7f);

        background-color:#003366;
        border:0px solid #ffffff;
        text-align:center;
        border-width:0px 0px 1px 1px;
        font-size:14px;
        font-family:Arial;
        font-weight:bold;
        color:#ffffff;
    }
    .table tr:first-child:hover td{
        background:-o-linear-gradient(bottom, #003366 5%, #003f7f 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #003366), color-stop(1, #003f7f) );
        background:-moz-linear-gradient( center top, #003366 5%, #003f7f 100% );
        filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#003366", endColorstr="#003f7f");	background: -o-linear-gradient(top,#003366,003f7f);

        background-color:#003366;
    }
    .table tr:first-child td:first-child{
        border-width:0px 0px 1px 0px;
    }
    .table tr:first-child td:last-child{
        border-width:0px 0px 1px 1px;
    }
    button, select,input {
        text-transform: none;
        height: 25px;
    }
</style>

<?php echo $this->session->flashdata('msg'); ?>
<section class="content">
    <h2 class="page-header">NEW BUDGET  <a href="#" class="btn btn-default btn-primary">Vertical View</a>  </h2> 
    <form action="<?php echo base_url(); ?>index.php/budget/import" method="post" name="upload_excel" enctype="multipart/form-data">
        <input type="file" name="file" id="file" >
        <button type="submit" id="submit" name="Import" class="btn btn-primary">Import</button>
    </form>
    NAME: <?php echo $this->session->userdata('name'); ?> | DEPARTMENT: <?php echo $this->session->userdata('department'); ?>   |  PERIOD: <?php echo $this->session->userdata('period'); ?> | UNIT: <?php echo $this->session->userdata('unit'); ?>

    <form  enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/budget/save'  method="post">        
        <div  >
            <table class="table scroll" >
                <tr>
                    <td>

                    </td>
                    <td style="<?php echo $hide3; ?>">
                        Period
                    </td>

                    <td style="<?php echo $hide; ?>">
                        Department
                    </td>
                    <td style="<?php echo $hide2; ?>">
                        Unit
                    </td>
                    <td>
                        Activity
                    </td> <td>
                        Output
                    </td> <td>
                        Outcome
                    </td> <td>
                        Objective
                    </td> 
                    <td>
                        Initiative
                    </td>
                    <td>
                        Performance
                    </td> 

                    <td>
                        Proc.Type
                    </td> <td>
                        Category
                    </td> <td>
                        Reporting Line
                    </td>
                    <td>
                        Sub Line
                    </td> 
                    <td >
                        Account
                    </td>
                    <td>
                        Funding
                    </td> <td>
                        Description
                    </td> <td>
                        Currency
                    </td> <td>
                        Ex.Rate
                    </td> <td>
                        Price
                    </td> <td>
                        Local Price
                    </td> 
                    <td>
                        Qty
                    </td> 

                    <td>
                        Total
                    </td> <td>
                        Local Total
                    </td><td>
                        Persons
                    </td> <td>
                        Freq
                    </td> <td>
                        Flow
                    </td> <td>
                        Variance
                    </td> <td>
                        Generation
                    </td> 
                    <td>
                        Start- End
                    </td> 

                    <td>
                        Auto
                    </td>
                    <td>
                        January
                    </td> <td>
                        February
                    </td> <td>
                        March
                    </td> <td>
                        April
                    </td> <td>
                        May
                    </td> <td>
                        June
                    </td> <td>
                        July
                    </td> <td>
                        August
                    </td> <td>
                        September
                    </td> <td>
                        October
                    </td> <td>
                        November
                    </td> 
                    <td>
                        December
                    </td>
                    <td>
                        Q1
                    </td>
                    <td>
                        Q2
                    </td>
                    <td>
                        Q3
                    </td>
                    <td>
                        Q4
                    </td>
                    <td>
                        Details
                    </td>
                    <td>
                        Submit
                    </td>

                </tr>
                <tr>
                    <td>

                    </td>
                    <td style="<?php echo $hide3; ?>" >
                        <select name="period" id="period" >
                            <!--                            <option>Please select a period</option>-->
                            <?php foreach ($periods as $loop) { ?>   
                                <option><?= $loop->year ?></option>
                            <?php } ?>

                        </select>
                    </td>

                    <td style="<?php echo $hide ?>">
                        <select name="department" id="department" >
                            <option selected="selected"><?= $this->session->userdata('department') ?></option>
                            <?php foreach ($departments as $loop) { ?>   
                                <option><?= $loop->name ?></option>
                            <?php } ?>

                        </select>
                    </td>


                    <td style="<?php echo $hide2 ?>">
                        <select name="unit" id="unit" >
                            <option selected="selected"><?= $this->session->userdata('unit') ?></option>
                            <?php foreach ($units as $loop) { ?>   
                                <option><?= $loop->name ?></option>
                            <?php } ?>

                        </select>
                    </td>

                    <td>
                        <textarea id="activity" name="activity"  rows="1" style="height: 25px;"  placeholder=""></textarea>
                    </td> <td>
                        <input name="output" id="output" type="text"  placeholder="Ouput" />
                    </td> <td>
                        <input id="outcome" name="outcome" type="text"  placeholder="Outcome" />
                    </td> <td>
                        <select name="objective" id="objective" >
                            <option></option>
                            <?php foreach ($objectives as $loop) { ?>   
                                <option><?= $loop->code ?></option>
                            <?php } ?>

                        </select>
                    </td> <td>
                        <select name="initiative" id="initiative" > </select>

                    </td> <td>
                        <input type="text" id="performance" name="performance"  placeholder="Enter ..." />
                    </td> 


                    <td>
                        <select name="procurement" id="procurement" >
                            <option>N/A</option>
                            <option>GOODS</option>
                            <option>SERVICES</option>
                            <option>WORKS</option>
                        </select>  
                    </td> <td>
                        <select name="category" id="category" >
                            <option></option>
                            <?php foreach ($categories as $loop) { ?>   
                                <option><?= $loop->name ?></option>
                            <?php } ?>
                        </select>
                    </td> <td>
                        <select name="line" id="line" >
                            <option></option>
                        </select>
                    </td> <td>
                        <select name="subline" id="subline" >
                            <option></option>
                        </select>
                    </td> 
                    <td>
                        <select name="account" id="account" >
                            <option></option>
                            <?php foreach ($accounts as $loop) { ?>   
                                <option value="<?= $loop->number ?>"><?= $loop->name . ' ' . $loop->number ?></option>
                            <?php } ?>

                        </select>

                    </td>

                    <td>
                        <select name="funding" id="funding" >                                
                            <option>Internal</option>
                            <option>External</option>
                        </select>
                    </td> <td>
                        <input type="text" name="description" id="description"  placeholder="Enter ..." />
                    </td> <td>
                        <select name="currency" id="currency" >
                            <option>Please select a currency</option>
                            <?php foreach ($rates as $loop) { ?>   
                                <option><?= $loop->currency ?></option>
                            <?php } ?>

                        </select>
                    </td> 
                    <td>
                        <input id="rate" name="rate" type="text"   /> 
                    </td> 
                    <td>
                        <input id="price" name="price" type="text"  />
                    </td> 
                    <td>
                        <input name="priceL" id="priceL" type="text"  placeholder="" />
                    </td>
                    <td>
                        <input name="qty" id="qty" type="text"  placeholder="" />
                    </td>
                    <td>
                        <input id="total" name="total" type="text"  placeholder="" />
                    </td>
                    <td>
                        <input id="totalL" name="totalL" type="text"  placeholder="" />
                    </td> 
                    <td>
                        <input id="persons" name="persons" type="text"  value="1" />
                    </td>
                    <td>
                        <input type="text" name="freq" id="freq"  value="1"/>

                    </td> 
                    <td>
                        <select name="flow" id="flow" >                                
                            <option>+</option>
                            <option>-</option>
                        </select>
                    </td> 
                    <td>
                        <input id="variance" name="variance" type="text"  placeholder="Enter ..." />
                    </td> 
                    <td>
                        <input type="text" name="generation" id="generation"  placeholder="Enter ..." />
                    </td>
                    <td>
                        <div class='input-group date' id='start'>
                            <input type='text'  id="starts" name="starts"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                        -
                        <div class='input-group date' id='end'>
                            <input type='text'  id="ends" name="ends"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </td> 
                    <td>
                        <div class="form-group">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="radio" id="optionsRadios1" value="auto"  />
                                </label>
                            </div>
                        </div>
                    </td>
                    <td>
                        <input id="January" name="January" type="text"  placeholder="" />
                    </td> 
                    <td>
                        <input id="February" name="February" type="text"  placeholder="" /> 
                    </td> 
                    <td>
                        <input id="March" name="March" type="text"  placeholder="" />
                    </td> 
                    <td>
                        <input id="April" name="April" type="text"  placeholder="" />
                    </td>
                    <td>
                        <input id="May" name="May" type="text"  placeholder="" /> 
                    </td> 
                    <td>
                        <input id="June" name="June" type="text"  placeholder="" /> 
                    </td> 
                    <td>
                        <input id="July" name="July" type="text"  placeholder="" /> 
                    </td> 
                    <td>
                        <input id="August" name="August" type="text"  placeholder="" />
                    </td>
                    <td>
                        <input id="September" name="September" type="text"  placeholder="" /> 
                    </td>
                    <td>
                        <input id="October" name="October" type="text"  placeholder="" />   
                    </td> 
                    <td>
                        <input id="November" name="November" type="text"  placeholder="" />    
                    </td> 
                    <td>
                        <input id="December" name="December" type="text"  placeholder="" />
                    </td>
                    <td>
                        <input type="text" id="Quarter1" name="Quarter1"  placeholder="" />
                    </td>
                    <td>
                        <input type="text" id="Quarter2" name="Quarter2"  placeholder="" />
                    </td>
                    <td>
                        <input type="text" id="Quarter3" name="Quarter3"  placeholder="" />
                    </td>
                    <td>
                        <input type="text" id="Quarter4" name="Quarter4"  placeholder="" />  
                    </td>
                    <td>
                        <input type="text" id="details" name="details"  placeholder="" />  
                    </td>
                    <td>
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button></td>
                </tr>

            </table>
        </div>




    </form>

    <span id="loading"  name ="loading"><img src="<?= base_url(); ?>images/ajax-loader.gif" alt="loading........" /></span><br>


</section>


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



<script type="text/javascript">
    $(document).ready(function ()
    {


        $(".editbox").hide();

        $(".edit_tr").click(function ()
        {
            var ID = $(this).attr('id');
            $("#name" + ID).hide();
            $("#name_input_" + ID).show();

            $("#details" + ID).hide();
            $("#details_input_" + ID).show();


        }).change(function ()
        {
            var ID = $(this).attr('id');
            var name = $("#name_input_" + ID).val();
            var details = $("#details_input_" + ID).val();



            var dataString = 'id=' + ID + '&name=' + name + '&details=' + details;
            $("#name_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif" />'); // Loading image
            $("#details_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif" />'); // Loading image

            if (name.length > 0)
            {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . "index.php/department/update/"; ?>",
                    data: dataString,
                    cache: false,
                    success: function (html)
                    {
                        $("#name_" + ID).html(name);
                        $("#details_" + ID).html(details);


                    }
                });
            } else
            {
                alert('Enter something.');
            }

        });

        // Edit input box click action
        $(".editbox").mouseup(function ()
        {
            return false
        });

        // Outside click action
        $(document).mouseup(function ()
        {
            $(".editbox").hide();
            $(".text").show();
        });

        $('#loading').hide();
        $("#budget-form").submit(function (e) {
            e.preventDefault();
            //  console.log($(this).serializeArray());
            $('#loading').show();
            var posts = $(this).serializeArray();

            var period = $("#period").val();
            var department = $("#department").val();
            var unit = $("#unit").val();
            var initiative = $("#initiative").val();
            var startdate = $("#starts").val();
            var enddate = $("#ends").val();
            var account = $("#account").val();
            var total = $("#totalL").val();
            console.log(account);

            if (posts.length > 0) {
                //   console.log("Period of use " + period);



                $.post("<?php echo base_url() ?>index.php/budget/create", {posts: posts, period: period, department: department, unit: unit, initiative: initiative, startdate: startdate, enddate: enddate, account: account, total: total}
                , function (response) {
                    //#emailInfo is a span which will show you message

                    $('#loading').hide();
                    setTimeout(finishAjax('loading', escape(response)), 200);

                }).fail(function (e) {
                    console.log(e);
                }); //end change
            } else {
                alert("Please insert missing information");
                //  console.log("missing information");
                $('#loading').hide();
            }

            function finishAjax(id, response) {
                $('#' + id).html(unescape(response));
                $('#' + id).fadeIn();
            }
        })




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

        $('#qty').blur(function () {
            var total = $("#price").val() * $("#qty").val();
            $("#total").val(total);
            var f = parseInt($("#freq").val());
            var per = parseInt($("#persons").val());
            var totalL = ($("#price").val() * $("#rate").val()) * $("#qty").val() * (f * per);

            $("#totalL").val(totalL);
        });
        // optionsRadios2
        $(':radio').click(function () {
            // console.log( $(this).val())
            if ($(this).val() == 'auto') {

                //  console.log(startnumber + startmonth);
                // console.log(endnumber + endmonth);
                var numbermonths = (endnumber - startnumber);
                //  console.log("number of months " + (numbermonths+1));
                // console.log(startnumber);
                var start = numbermonths;
                var each = $("#totalL").val() / numbermonths;
                var quarter = $("#totalL").val() / 4
                for (var i = startnumber - 1; i < (startnumber + numbermonths); i++) {
                    // console.log(i);
                    //   console.log("Counting from" + monthNames[i]);
                    $("#" + monthNames[i]).val(each);
                }

                var quarter1 = ($("#January").val() + $("#February").val() + $("#March").val()) / 3;
                var quarter2 = ($("#April").val() + $("#May").val() + $("#June").val()) / 3;
                var quarter3 = ($("#July").val() + $("#August").val() + $("#September").val()) / 3;
                var quarter4 = ($("#October").val() + $("#November").val() + $("#December").val()) / 3;

                if (quarter1 > 0) {
                    //$("#Quarter1").val(); 
                    $("#Quarter1").val(quarter1);
                }
                if (quarter2 > 0) {
                    //  $("#Quarter2").val(); 
                    $("#Quarter2").val(quarter2);
                }
                if (quarter3 > 0) {
                    //  $("#Quarter3").val(); 
                    $("#Quarter3").val(quarter3);
                }
                if (quarter4 > 0) {
                    //    $("#Quarter4").val(); 
                    $("#Quarter4").val(quarter4);
                }
            }

        });
        var monthNames = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"];


        var startnumber = 0;
        var endnumber = 0;

        var startmonth = "";
        var endmonth = "";

        $('#starts').blur(function () {
            console.log($("#starts").val());

            var start = new Date($("#starts").val());
            console.log(monthNames[start.getMonth()]);
            startmonth = monthNames[start.getMonth()];
            startnumber = (1 + (monthNames.indexOf(monthNames[start.getMonth()])));
        });
        $('#ends').blur(function () {
            console.log($("#ends").val());
            var end = new Date($("#ends").val());
            console.log(monthNames[end.getMonth()]);
            endmonth = monthNames[end.getMonth()];
            endnumber = (1 + (monthNames.indexOf(monthNames[end.getMonth()])));
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
    $("a").click(function () {
        $("table").each(function () {
            var $this = $(this);
            var newrows = [];
            $this.find("tr").each(function () {
                var i = 0;
                $(this).find("td").each(function () {
                    i++;
                    if (newrows[i] === undefined) {
                        newrows[i] = $("<tr></tr>");
                    }
                    newrows[i].append($(this));
                });
            });
            $this.find("tr").remove();
            $.each(newrows, function () {
                $this.append(this);
            });
        });

        return false;
    });
</script>