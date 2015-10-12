
<link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!-- Font Awesome Icons -->
<link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- Theme style -->
<link href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<!-- iCheck -->
<link href="<?php echo base_url(); ?>plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

<link id="base-style-responsive" href="<?php echo base_url(); ?>css/mine.css" rel="stylesheet">

<div>
    <?php
    if (is_array($userID) && count($userID)) {
        foreach ($userID as $user) {
            ?>   

            <div class="widget-body" style="padding: 3%;">
                <h4> Enter user details to below: </h4>
                <form id="user-form" name="user-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/User/update'  method="post">            

                    <fieldset>
                        <label>

                            <span class="block input-icon input-icon-right">
                                <input type="hidden" name="userID" id="userID" class="span12" value="<?= $user->id ?>" />
                                <input type="email" name="email" id="email" class="span12" value="<?= $user->email ?>" />
                                <span id="Loading_email" name ="Loading_email"><img src="<?= base_url(); ?>images/ajax-loader.gif" alt="Ajax Indicator" /></span>

                            </span>
                        </label>

                        <label>
                            <span class="block input-icon input-icon-right">
                                <input type="text" name="name" id="name" class="span12"value="<?= $user->name ?>" />
                                <span id="Loading_name" name ="Loading_name"><img src="<?= base_url(); ?>images/ajax-loader.gif" alt="Ajax Indicator" /></span>

                            </span>
                        </label>
                        <label>
                            <span class="block input-icon input-icon-right">
                                <input type="text" name="contact" id="contact" class="span12" value="<?= $user->contact ?>" />

                            </span>
                            <span class="block input-icon input-icon-right">
                                <input type="text" id="contact2" name="contact2" class="span12" value="<?= $user->contact2 ?>" />

                            </span>
                        </label>

                        <label>
                            Please input a password only if you want to change the previous password**
                            <span class="block input-icon input-icon-right">
                                <input type="password" name="password" id="password" class="span12" placeholder="Password" />

                            </span>
                        </label>

                        <label>
                            <span class="block input-icon input-icon-right">
                                <input type="password" name="password2" id="password2" class="span12" placeholder="Repeat password" />

                            </span>
                        </label>
                        <label>
                            <span class="block input-icon input-icon-right">
                                <select id="role" name="role">
                                    <option value="<?= $user->role ?>" /><?= $user->role ?>
                                    <?php
                                    if (is_array($roles) && count($roles)) {
                                        foreach ($roles as $loop) {
                                            ?>                        
                                            <option value="<?= $loop->name ?>" /><?= $loop->name ?>


                                        <?php }
                                    } ?>
                                </select></span>

                            <span class="block input-icon input-icon-right">
                                <select id="department" name="department">
                                    <option value="<?= $user->department ?>" /><?= $user->department ?>
                                    <?php
                                    if (is_array($departments) && count($departments)) {
                                        foreach ($departments as $loop) {
                                            ?>                        
                                            <option value="<?= $loop->name ?>" /><?= $loop->name ?>


                                        <?php }
                                    } ?>
                                </select></span>

                        </label>
                        <div class="clearfix">


                            <button class="width-10 btn btn-small btn-success"  >
                                Update

                            </button>
                        </div>
                    </fieldset>
                </form>

            </div>



        <?php
        }
    } else {
        ?>
        <div id="accordion2" class="accordion">
            <div class="accordion-group">

                <div class="accordion-body collapse" id="collapseOne">
                    <div class="accordion-inner">
                        <div class="widget-body" style="padding: 3%;">
                            <h4> Enter user details to below: </h4>
                            <form id="user-form" name="user-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/User/save'  method="post">            

                                <fieldset>
                                    <div class="col-xs-4">
                                        <label for="exampleInputFile">User image</label>
                                        <input type="file" id="userfile" name="userfile">
                                        <img id="preview"  width=150px" height="150px" src="<?= base_url(); ?>images/placeholder.jpg" alt=" Your profile passport image" />


                                    </div>
                                    <div class="col-xs-4">
                                           <label>
                                        <span class="block input-icon input-icon-right">
                                            <input type="email" name="email" id="email" class="span12" placeholder="Email" />
                                            <span id="Loading_email" name ="Loading_email"><img src="<?= base_url(); ?>images/ajax-loader.gif" alt="Ajax Indicator" /></span>

                                        </span> </label>                              
                                        <label>
                                            <span class="block input-icon input-icon-right">
                                                <input type="text" name="name" id="name" class="span12" placeholder="name" />
                                                <span id="Loading_name" name ="Loading_name"><img src="<?= base_url(); ?>images/ajax-loader.gif" alt="Ajax Indicator" /></span>

                                            </span>
                                        </label>
                                        <label>
                                            <span class="block input-icon input-icon-right">
                                                <input type="text" name="contact" id="contact" class="span12" placeholder="Contact" />

                                            </span>
                                        </label>
                                        <label>
                                            <span class="block input-icon input-icon-right">
                                                <input type="password" name="password" id="password" class="span12" placeholder="Password" />

                                            </span>
                                        </label>

                                        <label>
                                            <span class="block input-icon input-icon-right">
                                                <input type="password" name="password2" id="password2" class="span12" placeholder="Repeat password" />

                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-xs-4">

                                        <span class="block input-icon input-icon-right">
                                            Select the user role
                                            <select id="role" name="role">
                                                <?php
                                                if (is_array($roles) && count($roles)) {
                                                    foreach ($roles as $loop) {
                                                        ?>                        
                                                        <option value="<?= $loop->name ?>" /><?= $loop->name ?>


        <?php }
    } ?>
                                            </select></span>

                                        <br>
                                        Select the department 
                                        <select id="department" name="department">
                                            <?php
                                            if (is_array($departments) && count($departments)) {
                                                foreach ($departments as $loop) {
                                                    ?>                        
                                                    <option value="<?= $loop->name ?>" /><?= $loop->name ?>


        <?php }
    } ?>
                                        </select>
<hr>
                                        <label>
                                        <div class="clearfix">
                                            <button type="reset" class="width-10 pull-right btn btn-small btn-success" >
                                                <i class="icon-refresh"></i>
                                                Reset
                                            </button>

                                            <button class="width-10 btn btn-small"  >
                                                Submit
                                            </button>
                                        </div>
                                        </label>
                                    </div>
                                </fieldset>
                            </form>

                        </div>	</div>
                </div>
            </div>

        </div>
<?php } ?>


    <div class="span11">

        <div class="widget-header widget-header-flat">
            <a href="#collapseOne" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
                <span class="arrowed-in-right"></span> <button  class="width-10 pull-left btn  btn-mini btn-yellow">   ADD USER   </button>
            </a><a href="" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed float-right">
                <span class="arrowed-in-right "></span> <button  class="width-10 pull-left btn float-right  btn-mini btn-success">          DELETE SELECTED      </button>     </a>
        </div>
        <div class="widget-box">                   

            <div class="widget-body">

                <div class="row-fluid">
                    <hr>
                    <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="center">
                                    <label>
                                        <input type="checkbox" />
                                        <span class="lbl"></span>
                                    </label>
                                </th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th class="hidden-480">Contact</th>

                                <th class="hidden-480">Role</th>
                                <th class="hidden-480">Department</th>
                                <th class="hidden-phone">                                              
                                    Last Updated
                                </th>
                                <th class="hidden-480">Actions</th>

                                <th>Active</th>
                            </tr>
                        </thead>

                        <tbody>
<?php
if (is_array($users) && count($users)) {
    foreach ($users as $loop) {
        ?>  

                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
        <?php if ($loop->image == "") { ?>                                                    
                                                <img class="avatar" alt="image" height="60px" width="60px" src="<?= base_url(); ?>images/placeholder.jpg">

        <?php } else { ?>

                                                <img class="avatar" alt="image" height="60px" width="60px" src="<?php echo base_url(); ?>uploads/<?php echo $loop->image ?>">
        <?php } ?>	
                                            <a href="#"><?= $loop->name ?></a>
                                        </td>
                                        <td><?= $loop->email ?></td>
                                        <td class="hidden-480"><?= $loop->contact ?></td>


                                        <td class="hidden-480">
                                            <span class="label label-success"><?= $loop->role ?></span>
                                        </td>
                                        <td class="hidden-480">
                                            <span class="label label-info"><?= $loop->department ?></span>
                                        </td>
                                        <td class="hidden-480">
                                            <span ><?= $loop->created ?></span>
                                        </td>

                                        <td> 
                                            <a href="<?php echo base_url() . "index.php/User/edit/" . $loop->id; ?>" class="tooltip-info" data-rel="tooltip" title="View">
                                                Edit
                                            </a>
                                            <a href="<?php echo base_url() . "index.php/User/delete/" . $loop->id; ?>" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                Delete
                                            </a>
                                        </td>

                                        <td>  <label class="pull-right inline">
                                                <small class="muted"></small>
                                                <input id="id-button-borders" checked="" type="checkbox" class="ace-switch ace-switch-5" />
                                                <span class="lbl"></span>
                                            </label></td>
                                    </tr>

    <?php }
} ?>

                        </tbody>
                    </table>    
                </div>

            </div>
        </div><!--/span-->
    </div>



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
<!-- Page script -->
<script type="text/javascript">
    $('#Loading_name').hide();
    $("#name").blur(function (e) {

        var name = $("#name").val();

        if (name != null) {           // show loader 

            $('#Loading_name').show();
            $.post("<?php echo base_url() ?>index.php/User/check", {
                name: name
            }, function (response) {
                //#emailInfo is a span which will show you message
                $('#Loading_name').hide();
                setTimeout(finishAjax('Loading_name', escape(response)), 400);
            });
        }
        function finishAjax(id, response) {
            $('#' + id).html(unescape(response));
            $('#' + id).fadeIn();
        }
    }

    );
    $('#Loading_email').hide();
    $("#email").blur(function (e) {

        var email = $("#email").val();

        if (email != null) {           // show loader 

            $('#Loading_email').show();
            $.post("<?php echo base_url() ?>index.php/User/check_email", {
                email: email
            }, function (response) {
                //#emailInfo is a span which will show you message
                $('#Loading_email').hide();
                setTimeout(finishAjax('Loading_email', escape(response)), 400);
            });
        }
        function finishAjax(id, response) {
            $('#' + id).html(unescape(response));
            $('#' + id).fadeIn();
        }
    }

    );
</script>
<script type="text/javascript">

    $("#userfile").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>