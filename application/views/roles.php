<link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Font Awesome Icons -->
<link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<!-- iCheck -->
<link href="<?php echo base_url(); ?>plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

<link id="base-style-responsive" href="<?php echo base_url(); ?>css/mine.css" rel="stylesheet">
<div class="row-fluid">
    <div class="span12">
        <!--PAGE CONTENT BEGINS-->
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box transparent" id="recent-box">
                   
                     
                        <div class="widget">
                            <div class="widget-main padding-4">

                                    <?php
                                    if (is_array($roleID) && count($roleID)) {
                                        foreach ($roleID as $role) {
                                            ?>                                    

                                            <form id="edit-form" name="edit-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/Role/update'  method="post">            

                                                <div class="well well-large">
                                                    <div class="widget-body">
                                                        <div class="widget-main">
                                                            <h4 class="header green lighter bigger">
                                                                Update user role 
                                                            </h4>

                                                            <fieldset>


                                                                <label>
                                                                    <span class="block input-icon input-icon-right">
                                                                        <input type="text" class="span12" id="edit_role" name="edit_role" value="<?= $role->name ?>"  />
                                                                        <input type="hidden" class="span12" id="roleID" name="roleID" value="<?= $role->id ?>" />
                                                                        <i class="icon-white"></i>
                                                                    </span>
                                                                </label>
                                                                <h4 class="header green lighter bigger">

                                                                    Please select the user privileges
                                                                </h4>
                                                                 <span class="lbl"> Actions</span>
                                                                         <input type="text" class="span12" id="edit_actions" name="edit_actions" value="<?= $role->actions ?>"  />
                                                                       
                                                                 <span class="lbl"> Views</span>
                                                                  
                                                                         <input type="text" class="span12" id="edit_views" name="edit_views" value="<?= $role->views ?>"  />
                                                                  
                                                                  
                                                                        
                                                                    <button type="submit" class="width-10  btn btn-small btn-success">
                                                                        Update

                                                                    </button>
                                                           
                                                            </fieldset>

                                                        </div>


                                                    </div><!--/widget-body-->
                                                </div><!--/signup-box-->
                                            </form>

    <?php }
} else { ?>

                                        <form id="role-form" name="role-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/Role/save'  method="post">            
                                            

                                            <div class="well well-large">
                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                      
                                                        <fieldset>
                                                   <?php echo $this->session->flashdata('msg');?>									
						
                                                            <label>
                                                                <span class="block input-icon input-icon-right">
                                                                   
                                                                    <i class="icon-white"></i>
                                                                </span>
                                                            </label>
                                                            <h4 class="header green lighter bigger">

                                                                Please select the user privileges
                                                            </h4>
                                                         
                                                               
                                                                   <input type="text" class="span3" id="role" name="role" required="" placeholder="Role" />
                                                                    <span id="Loading" name ="Loading"><img src="<?= base_url(); ?>images/ajax-loader.gif" alt="Ajax Indicator" /></span> 
                                                                 
                                                                    
                                                                  <span class="lbl"> Actions</span>
                                                                    <input type="text" class="span12" id="actions" name="actions"   />
                                                              
                                                                       <span class="lbl"> Views</span>  
                                                                    <input type="text" class="span12" id="views" name="views"   />
                                                                                                                   
                                                        
                                                                <button type="submit" class="width-10  btn btn-small btn-success">
                                                                    Submit

                                                                </button>
                                                     
                                                        </fieldset>

                                                    </div>


                                                </div><!--/widget-body-->
                                            </div><!--/signup-box-->
                                        </form>

<?php } ?>

                                </div>

                                <div class="hr hr8"></div>
     <div class="well well-large">
                                <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="center">
                                                <label>
                                                    <input type="checkbox" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </th>
                                            <th>Role name</th>
                                            <th>Actions</th>
                                            <th>Views</th>                                          
                                                <th class="hidden-480"> </th>

                                          
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        if (is_array($roles) && count($roles)) {
                                            foreach ($roles as $loop) {
                                                ?>                                                                
                                                <tr class="warning">
                                                    <td><input type="checkbox" />
                                                        <span class="lbl"></span></td>
                                                    <td><?= $loop->name ?></td>
                                                    <td><?= $loop->actions ?></td>
                                                    <td><?= $loop->views ?></td>                                                  
                                                    <td> 
                                                        <a href="<?php echo base_url() . "index.php/Role/edit/" . $loop->id; ?>" class="tooltip-info" data-rel="tooltip" title="View">
                                                            Edit
                                                        </a>
                                                        <a href="<?php echo base_url() . "index.php/Role/delete/" . $loop->id; ?>" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                           Delete
                                                        </a>
                                                    </td>

                                                    
                                                   
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>  
     </div>

                                <div class="hr hr-double hr8"></div>


                            </div><!--/widget-main-->
                       
                  
                </div><!--/span-->

            </div><!--/row-->

            <!--PAGE CONTENT ENDS-->
        </div><!--/.span-->
    </div><!--/.row-fluid-->
</div><!--/.page-content-->


</div><!--/.main-content-->
</div><!--/.main-container-->
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

<script type="text/javascript">
    $('#Loading').hide();
    $("#role").blur (function (e) {

        var role = $("#role").val();

        if (role != null) {           // show loader 
            console.log(role);
            $('#Loading').show();
            $.post("<?php echo base_url() ?>index.php/role/check", {
                role: role
            }, function (response) {
                //#emailInfo is a span which will show you message
                $('#Loading').hide();
                setTimeout(finishAjax('Loading', escape(response)), 400);
            });
        }
        function finishAjax(id, response) {
            $('#' + id).html(unescape(response));
            $('#' + id).fadeIn();
        }
    }

    );
</script>