<!-- Content Header (Page header) -->
<link href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<section class="content-header">
    <h1>
        BUDGET MASTER

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> TOTAL BUDGETS:<?php echo count($budgets) ?></a></li>
        <li>MY SUBMISSIONS:<?php echo count($budgeted) ?></li>
        <li class="active">Blank page</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title"> NAME: <?php echo $this->session->userdata('name'); ?> | DEPARTMENT: <?php echo $this->session->userdata('department'); ?>   |  PERIOD: <?php echo $this->session->userdata('period'); ?> | UNIT: <?php echo $this->session->userdata('unit'); ?>
            </h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <h1>Periods and deadlines</h1>
            <table class="jobs table table-striped table-bordered bootstrap-datatable datatable" id="datatable">
                <thead>
                    <tr>  

                        <th>Year/Period</th>
                        <th>Start</th> 
                        <th>End</th> 
                        <th>Details</th> 

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
                                </td>
                                <td class="edit_td">
                                    <span id="start_<?php echo $id; ?>" class="text"><?php echo $start; ?></span>
                                </td> 
                                <td class="edit_td">
                                    <span id="end_<?php echo $id; ?>" class="text"><?php echo $end; ?></span>
                                </td> 
                                <td class="edit_td">
                                    <span id="details_<?php echo $id; ?>" class="text"><?php echo $details; ?></span>
                                </td> 

                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>     

        </div><!-- /.box-body -->
        <div class="box-footer">

        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->