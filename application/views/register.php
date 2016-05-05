<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BUDGET</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.4 -->
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck -->
        <link href="<?php echo base_url(); ?>plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
        <link id="base-style-responsive" href="<?php echo base_url(); ?>css/mine.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/easyui.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/icon.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/demo.css">
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <img height="30px" width="40px" src="<?php echo base_url(); ?>images/logo311.png" class="img-circle" alt="logo" />

            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Fill in the details below to register</p>
                <?php echo $this->session->flashdata('msg'); ?>
                <form id="user-form" name="user-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/user/register'  method="post">            


                    <label for="exampleInputFile">User image</label>
                    <input type="file" id="userfile" name="userfile">
                    <img id="preview"  width=150px" height="150px" src="<?= base_url(); ?>images/placeholder.jpg" alt=" Your profile passport image" />
                    <br> Email
                    <input type="email" name="email" id="email" class="span12 form-control" placeholder="Email" />
                    <span id="Loading_email" name ="Loading_email"><img src="<?= base_url(); ?>images/ajax-loader.gif" alt="Ajax Indicator" /></span>
                    Name
                    <input type="text" name="name" id="name" class="span12 form-control" placeholder="name" />
                    <span id="Loading_name" name ="Loading_name"><img src="<?= base_url(); ?>images/ajax-loader.gif" alt="Ajax Indicator" /></span>
                    Contact
                    <input type="text" name="contact" id="contact" class="span12 form-control" placeholder="Contact" />


                    <span class="block input-icon input-icon-right">
                        Password
                        <input type="password" name="password" id="password" class="span12 form-control" placeholder="Password" />

                    </span>
                    <span class="block input-icon input-icon-right">
                        Repeat password
                        <input type="password" name="password2" id="password2" class="span12 form-control" placeholder="Repeat password" />

                    </span>


                    <span class="block input-icon input-icon-right">
                        Select the user role
                        <select id="role" name="role" class="span12 form-control">
                            <?php
                            if (is_array($roles) && count($roles)) {
                                foreach ($roles as $loop) {
                                    ?>                        
                                    <option value="<?= $loop->name ?>" /><?= $loop->name ?>


                                    <?php
                                }
                            }
                            ?>
                        </select></span>

                    <br>
                    Department<br>
                    *don't fill if not applicable<br>
                    <input class="easyui-combobox form-control" style="width:100px" id="department" name="department"  url="<?php echo base_url() . 'index.php/grid/department/'; ?>" valueField="department" textField="department">

                    <br>Unit<br> <input class="easyui-combobox form-control" style="width:100px" id="unit" name="unit"  url="<?php echo base_url() . 'index.php/grid/unit/'; ?>" valueField="unit" textField="unit">

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



        </form>  
        <a href="<?php echo base_url() . "index.php/login/"; ?>">Back to login</a><br>


    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
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
</html>
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
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.easyui.min.js"></script>
