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
          
       <h2><?=$categoryName?> Reporting line</h2>
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

                            <form id="station-form" name="station-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/reporting/create'  method="post">            
                             
                                <div class="row">
                                    <div class="col-xs-8">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Reporting line" />
                                    <input type="hidden" class="form-control" name="categoryID" id="objectiveID" value="<?php echo $categoryID;?>" />
                                    <input type="hidden" class="form-control" name="categoryName" id="objectiveName" value="<?php echo $categoryName;?>" />
                                   
                                    <span class="glyphicon glyphicon-barcode form-control-feedback"></span>
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
                                            <th>Name</th>                                                                                  
                                            <th>Created on:</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>   
                                    <tbody>

                                        <?php
                                        if (is_array($reportings) && count($reportings)) {
                                            foreach ($reportings as $loop) {                                             
                                                $name = $loop->name;                                             
                                                $id = $loop->id;
                                              
                                                $created = $loop->created;
                                                ?>  
                                                <tr id="<?php echo $id; ?>" class="edit_tr">
                                                   
                                                    <td class="edit_td">
                                                        <span id="name_<?php echo $id; ?>" class="text"><?php echo $name; ?></span>
                                                        <input type="text" value="<?php echo $name; ?>" class="editbox" id="name_input_<?php echo $id; ?>"
                                                    </td>
                                                   
                                                   
                                                    <td class="edit_td">
                                                        <span id="created_<?php echo $id; ?>" class="text"><?php echo $created; ?></span>
                                                        <input type="text" value="<?php echo $created; ?>" class="editbox" id="created_input_<?php echo $id; ?>"
                                                    </td>   

                                                    <td class="center">
                                                        <a class="btn btn-info" href="<?php echo base_url() . "index.php/subline/index/".$name."/". $id; ?>">Sub line</a>
                                                        <a class="btn btn-danger" href="<?php echo base_url() . "index.php/reporting/delete/" .$categoryID."/".$categoryName."/". $id; ?>">Delete</a>
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

<script type="text/javascript">


        $("#imgfile").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
</script>
<script src="<?= base_url(); ?>js/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?= base_url(); ?>js/dataTables.bootstrap.js" type="text/javascript"></script>
<!-- Page script -->


<script type="text/javascript">
$(function () {
   $("#datatable").dataTable();

});
</script>


<script type="text/javascript">
    $(document).ready(function ()
    {
        $(".editbox").hide();

        $(".edit_tr").click(function ()
        {
            var ID = $(this).attr('id');
            $("#name" + ID).hide();
            $("#name_input_" + ID).show();

            

        }).change(function ()
        {
            var ID = $(this).attr('id');
            var name = $("#name_input_" + ID).val();
           
            var dataString = 'id=' + ID + '&name=' + name ;
            $("#name_" + ID).html('<img src="<?= base_url(); ?>images/loading.gif" />'); // Loading image
           
            if (name.length > 0 )
            {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() . "index.php/reporting/update/"; ?>",
                    data: dataString,
                    cache: false,
                    success: function (html)
                    {
                        $("#name_" + ID).html(name);
                      
                       

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
