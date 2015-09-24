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
    <div style=" overflow-x:scroll">
        <form id="budget-form" name="budget-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/budget/create'  method="post">            


            <table class="table table-striped table-bordered bootstrap-datatable datatable" id="datatable" style=" width: auto;">
                <thead>
                    <tr>  
                        <th>Department</th>
                        <th>Unit</th>                                          
                        <th>Activity</th>
                        <th>Output</th>
                        <th>Outcome</th>
                        <th>Objective</th>
                        <th>Strategy/initiatives</th>
                        <th>Performance measure</th>
                        <th>Procurement type</th>
                        <th>Budget Categories</th>
                        <th>Reporting line</th>
                        <th>Sub line</th>
                        <th>Account</th>
                        <th>Account description</th>
                        <th>Funding</th>
                        <th>Unit of measure</th>
                        <th>Currency</th>
                        <th>Ex.rate</th>
                        <th>Unit price</th>
                        <th>Units/Qty</th>
                        <th>Persons</th>
                        <th>Freq</th>
                        <th>Price(Local)</th>
                        <th>Total</th>
                        <th>Cash flow</th>
                        <th>Unit price</th>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Variance</th>
                        <th>Cost generation</th>
                        <th>Auto Fill</th>
                        <th>January</th>
                        <th>February</th>  <th>March</th>
                        <th>April</th>
                        <th>May</th>  <th>June</th>
                        <th>July</th>  <th>August</th>
                        <th>September</th>  <th>October</th>
                        <th>November</th>  <th>December</th>
                        <th>QUARTER 1</th>
                        <th>QUARTER 2</th>
                        <th>QUARTER 3</th>
                        <th>QUARTER 4</th>
                        <th>Description of goods/service or works</th>
                        <th>DETAILED DESCRIPTION OF THE ACTIVITY TO BE UNDERTAKEN</th>
                        <th>Year</th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>   
                <tbody>


                    <tr >
                        <td><select name="department" id="department" class="form-control">
                                <?php foreach ($departments as $loop) { ?>   
                                    <option><?= $loop->name ?></option>
                                <?php } ?>

                            </select></td>
                        <td> <select id="unit" name="unit" class="form-control">

                            </select></td>                                          
                        <td> <textarea id="activity" name="activity" class="form-control" rows="1" placeholder=""></textarea></td>
                        <td> <input name="output" id="output" type="text" class="form-control" placeholder="" /></td>
                        <td>  <input id="outcome" name="outcome" type="text" class="form-control" placeholder="" /></td>
                        <td><select name="objective" id="objective" class="form-control">
                                <?php foreach ($objectives as $loop) { ?>   
                                    <option><?= $loop->code ?></option>
                                <?php } ?>

                            </select></td>
                        <td> <select name="initiative" id="initiative" class="form-control">
                            </select></td>
                        <td> <input type="text" id="performance measure" name="performance measure" class="form-control" placeholder="Enter ..." /></td>
                        <td> <input id="Procurement type" name="Procurement type" type="text" class="form-control" placeholder="Enter ..." /></td>
                        <td><select name="category" id="category" class="form-control">
                                <?php foreach ($categories as $loop) { ?>   
                                    <option><?= $loop->name ?></option>
                                <?php } ?>

                            </select></td>
                        <td> <select name="reporting line" id="reporting line" class="form-control">
                                <?php foreach ($reports as $loop) { ?>   
                                    <option><?= $loop->name ?></option>
                                <?php } ?>

                            </select></td>
                        <td><select name="sub line" id="sub line" class="form-control">
                                <?php foreach ($subs as $loop) { ?>   
                                    <option><?= $loop->name ?></option>
                                <?php } ?>

                            </select></td>
                        <td> <select name="account" id="account" class="form-control">
                                <?php foreach ($accounts as $loop) { ?>   
                                    <option><?= $loop->number ?></option>
                                <?php } ?>

                            </select></td>
                        <td><input type="text" name="account description" id="account description" class="form-control" placeholder="Enter ..." /></td>
                        <td> <select name="funding" id="funding" class="form-control">                                
                                <option>Internal</option>
                                <option>External</option>
                            </select></td>
                        <td> <input name="unit of measure" id="unit of measure" type="text" class="form-control" placeholder="Enter ..." /></td>
                        <td>   
                            <div class="form-group">

                                <select name="currency" id="currency" class="form-control">
                                    <?php foreach ($rates as $loop) { ?>   
                                        <option><?= $loop->currency ?></option>
                                    <?php } ?>

                                </select>
                            </div></td>
                        <td><input id="rate" name="rate" type="text" class="form-control" placeholder="Enter ..." /></td>
                        <td><input id="unit price" name="unit price" type="text" class="form-control" placeholder="Enter ..." /></td>
                        <td><input name="qty" id="qty" type="text" class="form-control" placeholder="Enter ..." /></td>
                        <td><input id="persons" name="persons" type="text" class="form-control" placeholder="Enter ..." /></td>
                        <td><input type="text" name="freq" id="freq" class="form-control" placeholder="Enter ..." /></td>
                        <td><input name="price (local)" id="price" type="text" class="form-control" placeholder="Enter ..." /></td>
                        <td><input id="total" name="total" type="text" class="form-control" placeholder="Enter ..." /></td>
                        <td><input name="cash flow" id="cash flow"  type="text" class="form-control" placeholder="Enter ..." /></td>
                        <td><input id="unit prices" name="unit prices" type="text" class="form-control" placeholder="Enter ..." /></td>
                        <td>  <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input id="start date" name="start date" type="text" class="form-control pull-right" id="reservation" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group --></td>
                        <td>  <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input id="end date" name="end date" type="text" class="form-control pull-right" id="reservation" />
                                </div><!-- /.input group -->
                            </div><!-- /.form group --></td>
                        <td><input id="variance" name="variance" type="text" class="form-control" placeholder="Enter ..." /></td>
                        <td><input type="text" name="cost generation" id="cost generation" class="form-control" placeholder="Enter ..." /></td>


                        <td>

                            <div class="form-group">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked />
                                        Auto  </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" />
                                        Manual 
                                    </label>
                                </div>

                            </div>

                        </td> 
                        <td><input id="January" name="January" type="text" class="form-control" placeholder="Enter ..." /></td>
                        <td><input id="February" name="February" type="text" class="form-control" placeholder="Enter ..." /></td>  
                        <td><input id="March" name="March" type="text" class="form-control" placeholder="Enter ..." /></td>
                        <td><input id="April" name="April" type="text" class="form-control" placeholder="Enter ..." /></td>  
                        <td><input id="May" name="May" type="text" class="form-control" placeholder="Enter ..." /></td>  
                        <td><input id="June" name="June" type="text" class="form-control" placeholder="Enter ..." /></td> 
                        <td><input id="July" name="July" type="text" class="form-control" placeholder="Enter ..." /></td>  
                        <td><input id="August" name="August" type="text" class="form-control" placeholder="Enter ..." /></td>
                        <td><input id="September" name="September" type="text" class="form-control" placeholder="Enter ..." /></td>
                        <td><input id="October" name="October" type="text" class="form-control" placeholder="Enter ..." /></td>
                        <td><input id="November" name="November" type="text" class="form-control" placeholder="Enter ..." /></td>
                        <td><input id="December" name="December" type="text" class="form-control" placeholder="Enter ..." /></td>
                        <td><input type="text" id="Quarter 1" name="Quarter 1" class="form-control" placeholder="Enter ..." /></td>
                        <td><input type="text" id="Quarter 2" name="Quarter 2" class="form-control" placeholder="Enter ..." /></td>
                        <td><input type="text" id="Quarter 3" name="Quarter 3" class="form-control" placeholder="Enter ..." /></td>
                        <td><input type="text" id="Quarter 4" name="Quarter 4" class="form-control" placeholder="Enter ..." /></td>  
                        <td><input type="text" id="services" name="services" class="form-control" placeholder="Enter ..." /></td>
                        <td><input type="text" class="form-control" id="activity details" name="activity details" placeholder="Enter ..." /></td>
                        <td><input type="text" id="Year" name="Year" class="form-control" placeholder="Enter ..." /></td>
                        <td> <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button></td>      
                        <td></td>
                    </tr>


                </tbody>
            </table> 
        </form>
        <span id="loading" class="col-lg-12"  name ="loading"><img src="<?= base_url(); ?>images/loading.gif" alt="loading" /></span><br>

    </div>

</section>


<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->

</body>
<script src='<?= base_url(); ?>js/jquery.dataTables.min.js'></script>

<script src="<?= base_url(); ?>js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>js/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- Page script -->


<script type="text/javascript">
    $(function () {
        $("#datatable").dataTable({bFilter: false, "bPaginate": false, bInfo: false});
        $("#datatabled").dataTable();

    });
</script>

<script type="text/javascript">
    $(document).ready(function ()
    {
        $.post("<?php echo base_url() ?>index.php/budget/budgets", {posts: ""}
        , function (response) {
            $('#loading').hide();
            setTimeout(finishAjax('loading', escape(response)), 200);

        }); //end change


        function finishAjax(id, response) {
            $('#' + id).html(unescape(response));
            $('#' + id).fadeIn();
        }



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




    });

    $('#loading').hide();
    $("#budget-form").submit(function (e) {
        e.preventDefault();
        // console.log($(this).serializeArray());
        $('#loading').show();
        var posts = $(this).serializeArray();


        if (posts.length > 0) {

            $.post("<?php echo base_url() ?>index.php/budget/create", {posts: posts}
            , function (response) {
                //#emailInfo is a span which will show you message
                $('#loading').hide();
                setTimeout(finishAjax('loading', escape(response)), 200);

            }); //end change
        } else {
            alert("Please insert missing information");
            $('#loading').hide();
        }

        function finishAjax(id, response) {
            $('#' + id).html(unescape(response));
            $('#' + id).fadeIn();
        }
    })

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
                        pc += '<input  class="form-control" value="' + val.values + '" />';

                    });
                    $("#initiative option").remove();
                    $("#initiative").append(sc);

                    $("#performance measure input").remove();
                    $("#performance measure").append(pc);

                }
            });
        });


    });
</script>

