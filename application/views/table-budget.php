<link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Font Awesome Icons -->
<link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<!-- iCheck -->
<link href="<?php echo base_url(); ?>plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

<link id="base-style-responsive" href="<?php echo base_url(); ?>css/mine.css" rel="stylesheet">


<?php echo $this->session->flashdata('msg'); ?>
<section class="content">
         <form id="budget-form" name="budget-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/budget/create'  method="post">        
            <h2 class="page-header">Add new budget</h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-solid">                               
                  
                            <div class="box-group" id="accordion">
                                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                <div class="panel box box-primary">
                                    <div class="box-header">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" class="btn btn-default btn-flat" data-parent="#accordion" href="#collapseOne">
                                                New Budget
                                            </a>
                                            <a data-toggle="collapse" data-parent="#accordion" class="btn btn-default  btn-flat" href="#collapseTwo">
                                                View advanced
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="box-body">
                                            <div class="col-xs-4">
                                                Budget year/period
                                                <select name="period" id="period" class="form-control">
                                                    <option>Please select a period</option>
                                                    <?php foreach ($periods as $loop) { ?>   
                                                        <option><?= $loop->year ?></option>
                                                    <?php } ?>

                                                </select>
                                                Start <input type="text"  disabled class="form-control" name="startp" id="startp" placeholder="start date" />
                                                End      <input type="text" disabled class="form-control" name="endp" id="endp" placeholder="End date" /> 

                                                Department
                                                <select name="department" id="department" class="form-control">
                                                    <option></option>
                                                    <?php foreach ($departments as $loop) { ?>   
                                                        <option><?= $loop->name ?></option>
                                                    <?php } ?>

                                                </select>Unit<select id="unit" name="unit" class="form-control">
                                                </select>
                                                Activity details
                                                <textarea id="activity" name="activity" class="form-control" rows="1" placeholder=""></textarea>
                                              Output
                                                <input name="output" id="output" type="text" class="form-control" placeholder="Ouput" />
                                               Outcome
                                                <input id="outcome" name="outcome" type="text" class="form-control" placeholder="Outcome" />
                                                Objective <select name="objective" id="objective" class="form-control">
                                                    <option></option>
                                                    <?php foreach ($objectives as $loop) { ?>   
                                                        <option><?= $loop->code ?></option>
                                                    <?php } ?>

                                                </select>
                                                Strategy/Initiatives
                                                <select name="initiative" id="initiative" class="form-control"> </select>
                                                Performance measure
                                                <input type="text" id="performance" name="performance" class="form-control" placeholder="Enter ..." />
                                                Start date


                                                <div class='input-group date' id='start'>
                                                    <input type='text' class="form-control" id="starts" name="starts"/>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>

                                                End date
                                                <div class="form-group">

                                                    <div class='input-group date' id='end'>
                                                        <input type='text' class="form-control" id="ends" name="ends" />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>   

                                            </div>

                                            <div class="col-xs-4"> 

                                                Procurement type
                                                <select name="Procurement type" id="Procurement type" class="form-control">
                                                    <option>N/A</option>
                                                    <option>GOODS</option>
                                                    <option>SERVICES</option>
                                                    <option>WORKS</option>
                                                </select>  
                                                Budget Categories
                                                <select name="category" id="category" class="form-control">
                                                    <option></option>
                                                    <?php foreach ($categories as $loop) { ?>   
                                                        <option><?= $loop->name ?></option>
                                                    <?php } ?>
                                                </select>
                                                Reporting line
                                                <select name="line" id="line" class="form-control">
                                                    <option></option>
                                                </select>
                                                Sub line
                                                <select name="subline" id="subline" class="form-control">
                                                     <option></option>
                                                </select>
                                                Account
                                                <select name="account" id="account" class="form-control">  <option></option></select>
                                                Funding
                                                <select name="funding" id="funding" class="form-control">                                
                                                    <option>Internal</option>
                                                    <option>External</option>
                                                </select>

                                                Accounting description
                                                <input type="text" name="account description" id="account description" class="form-control" placeholder="Enter ..." />
                                                Unit of measure
                                                <input name="unit of measure" id="unit of measure" type="text" class="form-control" placeholder="Enter ..." />
                                                <div class="form-group">
                                                    Currency
                                                    <select name="currency" id="currency" class="form-control">
                                                        <option>Please select a currency</option>
                                                        <?php foreach ($rates as $loop) { ?>   
                                                            <option><?= $loop->currency ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div> 
                                                Rate
                                                <input id="rate" name="rate" type="text" class="form-control"  />            
                                          
                                                Price
                                                <input id="price" name="price" type="text" class="form-control" />
                                                Persons
                                                <input id="persons" name="persons" type="text" class="form-control" value="1" />
                                                Frequency
                                                <input type="text" name="freq" id="freq" class="form-control" value="1"/>
                                              
                                            
                                            </div>       

                                            <div class="col-xs-4"> 

                                              Quantity
                                                <input name="qty" id="qty" type="text" class="form-control" placeholder="" />
                                               
                                                Local Price
                                                <input name="priceL" id="priceL" type="text" class="form-control" placeholder="" />
                                                Total Price
                                                <input id="total" name="total" type="text" class="form-control" placeholder="" />
                                                Cash Flow
                                                <input name="cash flow" id="cash flow"  type="text" class="form-control" placeholder="" />
                                                Total Local
                                                <input id="totalL" name="totalL" type="text" class="form-control" placeholder="" />
                                                 Fill Months and Quarters
                                                <div class="form-group">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="radio" id="optionsRadios1" value="auto"  />
                                                            Auto  </label>
                                                    </div>
                                                     <a data-toggle="collapse" data-parent="#accordion"  href="#collapseTwo">
                                                View advanced
                                            </a>

                                                </div>
                                                Services
                                                <input type="text" id="services" name="services" class="form-control" placeholder="" />

                                                Activity details        
                                                <input type="text" class="form-control" id="activity details" name="activity details" placeholder="" />
                                             Year
                                                <input type="text" id="Year" name="Year" class="form-control" placeholder="Enter ..." />
                                                Variance
                                                <input id="variance" name="variance" type="text" class="form-control" placeholder="Enter ..." />
                                                Cost generational
                                                <input type="text" name="cost generation" id="cost generation" class="form-control" placeholder="Enter ..." />
                                                <br>
                                                <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>



                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="panel box box-danger">

                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="box-body">

                                            <div class="col-xs-4">

                                                January
                                                <input id="January" name="January" type="text" class="form-control" placeholder="" />
                                                February
                                                <input id="February" name="February" type="text" class="form-control" placeholder="" /> 
                                                March
                                                <input id="March" name="March" type="text" class="form-control" placeholder="" />
                                                April
                                                <input id="April" name="April" type="text" class="form-control" placeholder="" />
                                                May
                                                <input id="May" name="May" type="text" class="form-control" placeholder="" /> 
                                                June
                                                <input id="June" name="June" type="text" class="form-control" placeholder="" /> 

                                            </div>
                                            <div class="col-xs-4">                                         
                                                July
                                                <input id="July" name="July" type="text" class="form-control" placeholder="" /> 

                                                August
                                                <input id="August" name="August" type="text" class="form-control" placeholder="" />
                                                September
                                                <input id="September" name="September" type="text" class="form-control" placeholder="" />                       
                                                October
                                                <input id="October" name="October" type="text" class="form-control" placeholder="" />                      
                                                November
                                                <input id="November" name="November" type="text" class="form-control" placeholder="" />                       
                                                December
                                                <input id="December" name="December" type="text" class="form-control" placeholder="" />
                                            </div>
                                            <div class="col-xs-4"> 
                                                Quarter 1
                                                <input type="text" id="Quarter1" name="Quarter1" class="form-control" placeholder="" />
                                                Quarter 2 
                                                <input type="text" id="Quarter2" name="Quarter2" class="form-control" placeholder="" />
                                                Quarter 3   
                                                <input type="text" id="Quarter3" name="Quarter3" class="form-control" placeholder="" />
                                                Quarter 4 
                                                <input type="text" id="Quarter4" name="Quarter4" class="form-control" placeholder="" />  
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                     
                    </div><!-- /.box -->
                </div><!-- /.col -->

            </div><!-- /.row -->
            <!-- END ACCORDION & CAROUSEL-->

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
            }
            else
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
</script>