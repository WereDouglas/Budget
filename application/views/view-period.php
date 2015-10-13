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

    <!-- Default box -->
    <div class="box">
          
       <h2>Budget periods</h2>
            <div class="btn-toolbar ">

                <a href="#collapseTwo" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">

                    <button class="btn btn-default btn-default">
                        <i class="icon-save bigger-125"></i>
                        Add
                    </button></a>
                <a href="#collapseThree" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">

                    <button class="btn btn-default btn-default">
                        <i class="icon-list bigger-110"></i>
                        List
                    </button>
                </a>


            </div>
       <hr>
      

        <div class="widget-main ">
            <div id="accordion2" class="accordion">              

                <div class="accordion-group">
                    <div class="accordion-body collapse" id="collapseTwo">
                        <div class="accordion-inner">

                            <form id="station-form" name="station-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/period/create'  method="post">            
                             
                                <div class="row">
                                    <div class="col-xs-1">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" name="year" id="year" placeholder="Budget year" />                                     
                                    
                                </div>
                                        Start date
                             <div class="form-group">

                                <div class='input-group date' id='start'>
                                    <input type='text' class="form-control" id="start" name="start"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            End date
                               <div class="form-group">

                                <div class='input-group date' id='end'>
                                    <input type='text' class="form-control" id="end" name="end" />
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" name="details" id="details" placeholder="Details" />                                    
                                   
                                    
                                </div>
                               
                            
                                    </div><!-- /.col -->
                                    <div class="col-xs-2"></div><div class="col-xs-2"></div>
                                    <div class="col-xs-2">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
                                       
                                    </div><!-- /.col -->
                                    <div class="col-xs-2">
                                      
                                        <button type="reset" class="btn btn-danger btn-block btn-flat">Cancel</button>
                                    </div><!-- /.col -->
                                </div>
                            </form>      


                        </div><!-- /.box -->


                    </div>
                </div>
            </div>

            <div class="accordion-group">
                <div class="accordion-body collapsed" id="collapseThree">
                    <div class="accordion-inner">
                        <div class="row-fluid sortable">		


                            <div class="box-content">
                                <table class="jobs table table-striped table-bordered bootstrap-datatable datatable" id="datatable">
                                    <thead>
                                        <tr>  
                                            <th>Year/Period</th>
                                             <th>Start</th> 
                                              <th>End</th> 
                                               <th>Details</th> 
                                            <th>Created on:</th>
                                             <th>Created by:</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>   
                                    <tbody>

                                        <?php
                                        if (is_array($periods) && count($periods)) {
                                            foreach ($periods as $loop) {                                             
                                                $year = $loop->year;
                                                $start = $loop->start; 
                                                 $end = $loop->end; 
                                                  $details = $loop->details; 
                                                $id = $loop->id;                                              
                                                $created = $loop->created;
                                                 $by = $loop->by; 
                                                ?>  
                                                <tr id="<?php echo $id; ?>" class="edit_tr">
                                                   
                                                    <td class="edit_td">
                                                        <span id="year_<?php echo $id; ?>" class="text"><?php echo $year; ?></span>
                                                        <input type="text" value="<?php echo $year; ?>" class="editbox" id="year_input_<?php echo $id; ?>"
                                                    </td>
                                                     <td class="edit_td">
                                                        <span id="start_<?php echo $id; ?>" class="text"><?php echo $start; ?></span>
                                                        <input type="text" value="<?php echo $start; ?>" class="editbox" id="start_input_<?php echo $id; ?>"
                                                    </td> 
                                                     <td class="edit_td">
                                                        <span id="end_<?php echo $id; ?>" class="text"><?php echo $end; ?></span>
                                                        <input type="text" value="<?php echo $end; ?>" class="editbox" id="end_input_<?php echo $id; ?>"
                                                    </td> 
                                                     <td class="edit_td">
                                                        <span id="details_<?php echo $id; ?>" class="text"><?php echo $details; ?></span>
                                                        <input type="text" value="<?php echo $details; ?>" class="editbox" id="details_input_<?php echo $id; ?>"
                                                    </td> 
                                                   
                                                    <td class="edit_td">
                                                        <span id="created_<?php echo $id; ?>" class="text"><?php echo $created; ?></span>
                                                        <input type="text" value="<?php echo $created; ?>" class="editbox" id="created_input_<?php echo $id; ?>"
                                                    </td> 
                                                    
                                                    <td class="edit_td">
                                                        <span id="by_<?php echo $id; ?>" class="text"><?php echo $by; ?></span>
                                                        <input type="text" value="<?php echo $by; ?>" class="editbox" id="by_input_<?php echo $id; ?>"
                                                    </td> 

                                                    <td class="center">
                                                         <a class="btn btn-danger" href="<?php echo base_url() . "index.php/period/delete/" . $id; ?>">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>            
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
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
$(function () {
   $("#datatable").dataTable();

});
</script>
<script src="<?php echo base_url(); ?>js/moment-with-locales.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap-datetimepicker.js"></script>

<script type="text/javascript">
    $(document).ready(function ()
    {
        $(".editbox").hide();

        $(".edit_tr").click(function ()
        {
            var ID = $(this).attr('id');
            $("#year" + ID).hide();
            $("#year_input_" + ID).show();
            
             $("#start" + ID).hide();
            $("#start_input_" + ID).show();
            
             $("#end" + ID).hide();
            $("#end_input_" + ID).show();
            
             $("#details" + ID).hide();
            $("#details_input_" + ID).show();
            

        }).change(function ()
        {
            var ID = $(this).attr('id');
            var year = $("#year_input_" + ID).val();
             var start = $("#start_input_" + ID).val();
              var end = $("#end_input_" + ID).val();
               var details = $("#details_input_" + ID).val();
          
           
            var dataString = 'id=' + ID + '&year=' + year + '&start=' + start+ '&end=' + end+ '&details=' + details ;
            $("#year_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif" />'); // Loading image
            $("#start_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif" />'); // Loading image
             $("#end_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif" />');
              $("#details_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif" />');
            
            if (year.length > 0 )
            {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . "index.php/period/update/"; ?>",
                    data: dataString,
                    cache: false,
                    success: function (html)
                    {
                        $("#year_" + ID).html(year);
                         $("#start_" + ID).html(start);
                           $("#end_" + ID).html(end);
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