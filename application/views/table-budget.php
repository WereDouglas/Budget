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
         <form id="station-form" name="station-form" enctype="multipart/form-data"  action='<?= base_url(); ?>index.php/department/create'  method="post">            

             
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
                                                                                            <th>Total</th>
                                                                                             <th>Variance</th>
                                                                                              <th>Cost generation</th>
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
                                      
                                        </tr>
                                    </thead>   
                                    <tbody>

                                        
                                                <tr >
                                                     <td>   <select class="form-control">
                                <?php foreach ($departments as $loop) { ?>   
                                    <option><?= $loop->name ?></option>
                                <?php } ?>

                            </select></td>
                                             <td> <select class="form-control">
                                <?php foreach ($units as $loop) { ?>   
                                    <option><?= $loop->name ?></option>
                                <?php } ?>

                            </select></td>                                          
                                            <th> <textarea class="form-control" rows="1" placeholder="Enter ..."></textarea></th>
                                            <td> <input type="text" class="form-control" placeholder="Enter ..." /></td>
                                             <td>  <input type="text" class="form-control" placeholder="Enter ..." /></td>
                                              <td><select class="form-control">
                                <?php foreach ($objectives as $loop) { ?>   
                                    <option><?= $loop->code ?></option>
                                <?php } ?>

                            </select></td>
                                               <td> <select class="form-control">
                                <?php foreach ($inits as $loop) { ?>   
                                    <option><?= $loop->details ?></option>
                                <?php } ?>

                            </select></td>
                                                <td> <input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                 <td> <input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                    <td><select class="form-control">
                                <?php foreach ($categories as $loop) { ?>   
                                    <option><?= $loop->name ?></option>
                                <?php } ?>

                            </select></td>
                                                       <td> <select class="form-control">
                                <?php foreach ($reports as $loop) { ?>   
                                    <option><?= $loop->name ?></option>
                                <?php } ?>

                            </select></td>
                                                          <td><select class="form-control">
                                <?php foreach ($subs as $loop) { ?>   
                                    <option><?= $loop->name ?></option>
                                <?php } ?>

                            </select></td>
                                                             <td> <select class="form-control">
                                <?php foreach ($accounts as $loop) { ?>   
                                    <option><?= $loop->number ?></option>
                                <?php } ?>

                            </select></td>
                                                               <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                 <td> <select class="form-control">                                
                                <option>Internal</option>
                                <option>External</option>
                            </select></td>
                                                                   <td> <input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                     <td>   <div class="form-group">
                            
                            <select class="form-control">
                                <?php foreach ($rates as $loop) { ?>   
                                    <option><?= $loop->currency ?></option>
                                <?php } ?>

                            </select>
                        </div></td>
                                                                       <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                         <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                           <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                             <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                               <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                 <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                   <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                     <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                       <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                         <td>Start date</td>
                                                                                           <td>End date</td>
                                                                                            <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                             <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                              <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                               <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                                 <td><input type="text" class="form-control" placeholder="Enter ..." /></td>  <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                                   <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                                     <td><input type="text" class="form-control" placeholder="Enter ..." /></td>  <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                                       <td><input type="text" class="form-control" placeholder="Enter ..." /></td>  <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                                         <td><input type="text" class="form-control" placeholder="Enter ..." /></td>  <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                                           <td><input type="text" class="form-control" placeholder="Enter ..." /></td>  <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                                   <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                                    <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                                     <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                                      <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                                                                                       <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                        <td><input type="text" class="form-control" placeholder="Enter ..." /></td>
                                        
                                         <td><input type="text" class="form-control" placeholder="Enter ..." /></td>  
                                         <td> <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button></td>      
                                                </tr>
                                             

                                    </tbody>
                                </table> 
            </form>
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

 