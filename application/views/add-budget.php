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
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">New Budget</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <form id="station-form" name="station-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/department/create'  method="post">            

                <div class="row">
                    <div class="col-xs-4">                                          
                        <div class="form-group">
                            <label>Department</label>
                            <select class="form-control">
                                <?php foreach ($departments as $loop) { ?>   
                                    <option><?= $loop->name ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Units/subs</label>
                            <select class="form-control">
                                <?php foreach ($units as $loop) { ?>   
                                    <option><?= $loop->name ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Activities</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>              
                        <div class="form-group">
                            <label>Output</label>
                            <input type="text" class="form-control" placeholder="Enter ..." />
                        </div>
                        <div class="form-group">
                            <label>Outcome</label>
                            <input type="text" class="form-control" placeholder="Enter ..." />
                        </div>
                        <div class="form-group">
                            <label>Objectives</label>
                            <select class="form-control">
                                <?php foreach ($objectives as $loop) { ?>   
                                    <option><?= $loop->code ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Strategies/Initiatives</label>
                            <select class="form-control">
                                <?php foreach ($inits as $loop) { ?>   
                                    <option><?= $loop->details ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Performance measure</label>
                            <input type="text" class="form-control" placeholder="Enter ..." />
                        </div>
                        <div class="form-group">
                            <label>Procurement type</label>
                            <input type="text" class="form-control" placeholder="Enter ..." />
                        </div>
                        <div class="form-group">
                            <label>Budget Categories</label>
                            <select class="form-control">
                                <?php foreach ($categories as $loop) { ?>   
                                    <option><?= $loop->name ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Reporting line</label>
                            <select class="form-control">
                                <?php foreach ($reports as $loop) { ?>   
                                    <option><?= $loop->name ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sub line</label>
                            <select class="form-control">
                                <?php foreach ($subs as $loop) { ?>   
                                    <option><?= $loop->name ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Accounts</label>
                            <select class="form-control">
                                <?php foreach ($accounts as $loop) { ?>   
                                    <option><?= $loop->number ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Account description</label>
                            <input type="text" class="form-control" placeholder="Enter ..." />
                        </div>
                        <div class="form-group">
                            <label>Funding</label>
                            <select class="form-control">                                
                                <option>Internal</option>
                                <option>External</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Unit of measure</label>
                            <input type="text" class="form-control" placeholder="Enter ..." />
                        </div>
                        <div class="form-group">
                            <label>Currency & Exchange rate</label>
                            <select class="form-control">
                                <?php foreach ($rates as $loop) { ?>   
                                    <option><?= $loop->currency ?></option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Rate</label>
                            <input type="text" class="form-control" placeholder="Enter ..." />
                        </div>

                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label>Unit price</label>
                            <input type="text" class="form-control" placeholder="Enter ..." />
                        </div>
                        <div class="form-group">
                            <label>Units/Quantity</label>
                            <input type="text" class="form-control" placeholder="Enter ..." />
                        </div>
                        <div class="form-group">
                            <label>Persons</label>
                            <input type="text" class="form-control" placeholder="Enter ..." />
                        </div>
                        <div class="form-group">
                            <label>Frequency</label>
                            <input type="text" class="form-control" placeholder="Enter ..." />
                        </div>
                        <div class="form-group">
                            <label>Price(Local)</label>
                            <input type="text" class="form-control" placeholder="Enter ..." />
                        </div>
                        <div class="form-group">
                            <label>Total</label>
                            <input type="text" class="form-control" placeholder="Enter ..." />
                        </div>
                        <div class="form-group">
                            <label>Cash Flow</label>
                            <input type="text" class="form-control" placeholder="Enter ..." />
                        </div>
                        <div class="form-group">
                            <label>Unit price</label>
                            <input type="text" class="form-control" placeholder="Enter ..." />
                        </div>
                       <div class="form-group">
                    <label>Start date:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="reservation" />
                    </div><!-- /.input group -->
                  </div><!-- /.form group -->
                          <div class="form-group">
                    <label>End date:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="reservation" />
                    </div><!-- /.input group -->
                    </div><!-- /.form group -->
                    

                        <!-- radio -->
                        <div class="form-group">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked />
                                     Auto fill costs      </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" />
                                    Manual cost generation
                                </label>
                            </div>
                          
                        </div>
                         <div class="form-group">
                            <label>Variance</label>
                            <input type="text" class="form-control" placeholder="" />
                        </div>
                          <div class="form-group">
                            <label>QUARTER 1</label>
                            <input type="text" class="form-control" placeholder="" />
                        </div>
                            <div class="form-group">
                            <label>QUARTER 2</label>
                            <input type="text" class="form-control" placeholder="" />
                        </div>
                          <div class="form-group">
                            <label>QUARTER 3</label>
                            <input type="text" class="form-control" placeholder="" />
                        </div>
                          <div class="form-group">
                            <label>QUARTER 4</label>
                            <input type="text" class="form-control" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label>TOTAL</label>
                            <input type="text" class="form-control" placeholder="" />
                        </div>
                        

                    </div>
                    <div class="col-xs-4">

                        <div class="form-group">
                            <label>January</label>
                            <input type="text" class="form-control" placeholder="" />
                        </div>
                            <div class="form-group">
                            <label>February</label>
                            <input type="text" class="form-control" placeholder="" />
                        </div>
                          <div class="form-group">
                            <label>March</label>
                            <input type="text" class="form-control" placeholder="" />
                        </div>
                          <div class="form-group">
                            <label>April</label>
                            <input type="text" class="form-control" placeholder="" />
                        </div>
                          <div class="form-group">
                            <label>May</label>
                            <input type="text" class="form-control" placeholder="" />
                        </div>
                          <div class="form-group">
                            <label>June</label>
                            <input type="text" class="form-control" placeholder="" />
                        </div>
                          <div class="form-group">
                            <label>July</label>
                            <input type="text" class="form-control" placeholder="" />
                        </div>
                          <div class="form-group">
                            <label>August</label>
                            <input type="text" class="form-control" placeholder="" />
                        </div>
                          <div class="form-group">
                            <label>September</label>
                            <input type="text" class="form-control" placeholder="" />
                        </div>
                          <div class="form-group">
                            <label>October</label>
                            <input type="text" class="form-control" placeholder="" />
                        </div>
                          <div class="form-group">
                            <label>November</label>
                            <input type="text" class="form-control" placeholder="" />
                        </div>
                          <div class="form-group">
                            <label>December</label>
                            <input type="text" class="form-control" placeholder="" />
                        </div>
                         
                       <div class="form-group">
                            <label>Description of goods/service or works</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>  
                           <div class="form-group">
                            <label>DETAILED DESCRIPTION OF THE ACTIVITY TO BE UNDERTAKEN</label>
                            <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                        </div>  
   <div class="form-group">
                            <label>YEAR</label>
                            <input type="text" class="form-control" placeholder="2015/2016" />
                        </div>


                        <div class="col-xs-6">

                            <button type="reset" class="btn btn-danger btn-block btn-flat">Cancel</button>

                        </div><!-- /.col -->
                        <div class="col-xs-6">
                            <div class="form-group has-feedback">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>

                            </div></div>
                    </div><!-- /.col -->

                </div>




            </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->

</section>

<script src="<?php echo base_url(); ?>plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
<script src='<?= base_url(); ?>js/jquery.dataTables.min.js'></script>

<script src="<?= base_url(); ?>js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>js/dataTables.bootstrap.js" type="text/javascript"></script>
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

    });
</script>
    <script src="<?= base_url(); ?>plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
 <script src="<?= base_url(); ?>plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
  
 <script type="text/javascript">
      $(function () {
        //Initialize Select2 Elements
      

        //Datemask dd/mm/yyyy
  
        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker4').datetimepicker({
            pickTime: false
        });
    });
</script>
