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
                </tr>
            </thead>   
            <tbody>

                <?php
                if (is_array($budgets) && count($budgets)) {
                    foreach ($budgets as $loop) {
                        $details = $loop->content;
                        $details = json_decode($details);
                        ?>  
                        <tr  class="edit_tr">
                            <?php
                            foreach ($details as $key => $value) {

                                if (is_numeric($value)) {
                                    echo ' <td>' . number_format($value) . '</td>';
                                } else {
                                    echo ' <td>' . $value . '</td>';
                                }
                            }
                            ?>
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

