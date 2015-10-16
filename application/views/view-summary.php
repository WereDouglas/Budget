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
    <div class="box"  style=" overflow-x:scroll">         
<input type="button" onclick="ExportToExcel('datatable')" value="Export to Excel">

        <hr>


        <table class="table jobs table-striped table-bordered bootstrap-datatable datatable" name="datatable" id="datatable" style=" width: auto;">
            <thead>
                <tr>  
                    <th>Department</th>
                    <th>Unit</th>
                    <th>Strategy/initiatives</th> 
                    <th>Start date</th>
                    <th>End date</th>
                    <th>Account</th>
                    <th>Total</th>
                      <th>created by</th> 
                       <th></th> 
                                                                                              
                </tr>
            </thead>     
                
                       <tbody>

                                        <?php
                                       if (is_array($budgets) && count($budgets)) {
                                                foreach ($budgets as $loop) {                                          
                                                $period = $loop->period;
                                                $department = $loop->department; 
                                                 $unit = $loop->unit; 
                                                  $initiative = $loop->initiative; 
                                                   $startdate = $loop->startdate; 
                                                    $enddate = $loop->enddate; 
                                                     $account = $loop->account; 
                                                      $total = $loop->total; 
                                                       $by = $loop->by; 
                                                $id = $loop->id;                                              
                                                $created = $loop->created;
                                                ?>  
                                                <tr id="<?php echo $id; ?>" class="edit_tr">
                                                   
                                                    <td><?php echo $department; ?></td>
                                                      <td><?php echo $unit; ?></td>
                                                        <td><?php echo $initiative; ?></td>
                                                          <td><?php echo $startdate; ?></td>
                                                            <td><?php echo $enddate; ?></td>
                                                              <td><?php echo $account; ?></td>
                                                                <td><?php echo  number_format($total); ?></td>
                                                                  <td><?php echo $by; ?></td>
                                                                       <td class="center">
                                                         <a class="btn btn-danger" href="<?php echo base_url() . "index.php/budget/delete/" . $id; ?>">Delete</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                  </tbody>





        </table>   
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
<script type="text/javascript">
function ExportToExcel(datatable){
       var htmltable= document.getElementById('datatable');
       var html = htmltable.outerHTML;
       window.open('data:application/vnd.ms-excel,' + encodeURIComponent(html));
    }
</script>
<!--<script type="text/javascript">
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
        </script>-->

