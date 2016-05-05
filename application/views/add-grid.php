
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/easyui.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/icon.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/demo.css">
<link href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

<h2>Budgets</h2>
<form class="form-horizontal well" action="<?php echo base_url(); ?>index.php/grid/import" method="post" name="upload_excel" enctype="multipart/form-data">
    <input type="file" name="file" id="file" class="input-mini">
    <button type="submit" id="submit" name="Import" class="btn sm btn-primary button-loading">Import</button>
</form>


<table id="dg" title="Budgets" style="width:100%;height:100%"
       toolbar="#toolbar" pagination="true" idField="id"
       rownumbers="true" fitColumns="true" singleSelect="true">
    <thead>
        <tr>
            <th field="period" class="th"  editor="{type:'validatebox',options:{required:true}}">Period</th>
            <th field="account" width="80" sortable="true" data-options="
                formatter : function(value,row) { 
                return row.account; 
                },
                editor : {
                type:'combobox',
                options : {
                valueField:'account',
                textField:'account',
                url:'<?php echo base_url() . 'index.php/grid/account/'; ?>',
                required:true,
                onSelect:function(record){ 

                }   
                }                 
                }">
                Account
            </th>
            <th field="department" width="80" sortable="true" data-options="
                formatter : function(value,row) { 
                return row.department; 
                },
                editor : {
                type:'combobox',
                options : {
                valueField:'department',
                textField:'department',
                url:'<?php echo base_url() . 'index.php/grid/department/'; ?>',
                required:true,
                onSelect:function(rec){ 
                var url = '<?php echo base_url() ?>/index.php/grid/unit/'+rec.department; 
                $('#unit').combobox('reload',url);
                }   
                }                 
                }">
                Department
            </th>
            <th field="unit" width="80" sortable="true" data-options="
                formatter : function(value,row) { 
                return row.unit; 
                },
                editor : {
                type:'combobox',
                options : {
                valueField:'unit',
                textField:'unit',
                url:'<?php echo base_url() . 'index.php/grid/unit/'; ?>',
                required:true,
                onSelect:function(rec){ 
                var url = '<?php echo base_url() ?>/index.php/grid/unit/'+rec.department; 
                $('#unit').combobox('reload',url);
                }   
                }                 
                }">
                Unit
            </th>

            <th field="activity" width="30" editor="{type:'validatebox',options:{required:true}}">Activity</th>
            <th field="output" class="th" editor="text">Output</th>
            <th field="outcome" class="th" editor="text">Outcome</th>
            <th field="objectives" width="80" sortable="true" data-options="
                formatter : function(value,row) { 
                return row.objectives; 
                },
                editor : {
                type:'combobox',
                options : {
                valueField:'title',
                textField:'title',
                url:'<?php echo base_url() . 'index.php/grid/obj/'; ?>',
                required:true

                }                 
                }">
                Objective
            </th>
            <th field="initiatives" width="80" sortable="true" data-options="
                formatter : function(value,row) { 
                return row.initiatives; 
                },
                editor : {
                type:'combobox',
                options : {
                valueField:'details',
                textField:'details',
                url:'<?php echo base_url() . 'index.php/grid/inits/'; ?>',
                required:true                  
                }                 
                }">
                Initiative
            </th>
            <th field="performance" width="80" sortable="true" data-options="
                formatter : function(value,row) { 
                return row.performance; 
                },
                editor : {
                type:'combobox',
                options : {
                valueField:'values',
                textField:'values',
                url:'<?php echo base_url() . 'index.php/grid/perf/'; ?>'

                }                 
                }">
                Performance
            </th>
            <th field="starts" width="80" sortable="true" data-options="
                formatter : function(value,row) { 
                return row.starts; 
                },
                editor : {
                type:'combobox',
                options : {
                valueField:'name',
                textField:'name',
                url:'<?php echo base_url() . 'index.php/grid/months/'; ?>'

                }                 
                }">
                Start
            </th>
            <th field="procurement" class="th" editor="{type:'validatebox',options:{required:true}}">Procurement type</th>
            <th field="category" width="80" sortable="true" data-options="
                formatter : function(value,row) { 
                return row.category; 
                },
                editor : {
                type:'combobox',
                options : {
                valueField:'name',
                textField:'name',
                url:'<?php echo base_url() . 'index.php/grid/category/'; ?>'

                }                 
                }">
                Category
            </th>
            <th field="line" width="80" sortable="true" data-options="
                formatter : function(value,row) { 
                return row.line; 
                },
                editor : {
                type:'combobox',
                options : {
                valueField:'name',
                textField:'name',
                url:'<?php echo base_url() . 'index.php/grid/line/'; ?>'

                }                 
                }">
                Reporting Line
            </th>
            <th field="subline" width="80" sortable="true" data-options="
                formatter : function(value,row) { 
                return row.subline; 
                },
                editor : {
                type:'combobox',
                options : {
                valueField:'name',
                textField:'name',
                url:'<?php echo base_url() . 'index.php/grid/subline/'; ?>'

                }                 
                }">
                Sub Line
            </th>

            <th field="funding" width="80" sortable="true" data-options="
                formatter : function(value,row) { 
                return row.funding; 
                },
                editor : {
                type:'combobox',
                options : {
                valueField:'name',
                textField:'name',
                url:'<?php echo base_url() . 'index.php/grid/fund/'; ?>'
                }                 
                }">
                Funding
            </th>

            <th field="description" width="30" editor="{type:'validatebox',options:{required:true}}">Description</th>
            <th field="currency" class="th" editor="{type:'validatebox',options:{required:true}}">Currency</th>
            <th field="rate" class="th" editor="{type:'numberbox',options:{precision:1}}">Ex.Rate</th>
            <th field="priceForeign" class="th" editor="{type:'numberbox',options:{precision:0}}">Price</th>
            <th field="priceLocal" class="th" editor="numberbox">Local Price</th>
            <th field="totalForeign" class="th" editor="{type:'validatebox',options:{required:true}}">Total </th>
            <th field="totalLocal" class="th" editor="{type:'validatebox',options:{required:true}}">Total Local</th>
            <th field="qty" class="th" editor="{type:'validatebox',options:{required:true}}">Qty</th>
            <th field="persons" class="th" editor="{type:'validatebox',options:{required:true}}">Persons</th>
            <th field="freq" class="th" editor="numberbox">Feq</th>
            <th field="flow" class="th" editor="{type:'validatebox',options:{required:true}}">Flow</th>
            <th field="variance" class="th" editor="{type:'validatebox',options:{required:true}}">Variance</th>
            <th field="generation" class="th" editor="{type:'validatebox',options:{required:true}}">Generation</th>
            <th field="Jan" class="th" editor="{type:'validatebox',options:{required:true}}">Jan</th>
            <th field="Feb" class="th" editor="{type:'validatebox',options:{required:true}}">Feb</th>
            <th field="Mar" class="th" editor="{type:'validatebox',options:{required:true}}">Mar</th>
            <th field="Apr" class="th" editor="{type:'validatebox',options:{required:true}}">Apr</th>
            <th field="May" class="th" editor="{type:'validatebox',options:{required:true}}">May</th>
            <th field="Jun" class="th" editor="{type:'validatebox',options:{required:true}}">Jun</th>
            <th field="Jul" class="th" editor="{type:'validatebox',options:{required:true}}">Jul</th>
            <th field="Aug" class="th" editor="{type:'validatebox',options:{required:true}}">Aug</th>
            <th field="Sep" class="th" editor="{type:'validatebox',options:{required:true}}">Sep</th>
            <th field="Oct" class="th" editor="{type:'validatebox',options:{required:true}}">Oct</th>
            <th field="Nov" class="th" editor="{type:'validatebox',options:{required:true}}">Nov</th>
            <th field="Dec" class="th" editor="{type:'validatebox',options:{required:true}}">Dec</th>
            <th field="Q1" class="th" editor="{type:'validatebox',options:{required:true}}">Q1</th>
            <th field="Q2" class="th" editor="{type:'validatebox',options:{required:true}}">Q2</th>
            <th field="Q3" class="th" editor="{type:'validatebox',options:{required:true}}">Q3</th>
            <th field="Q4" class="th" editor="{type:'validatebox',options:{required:true}}">Q4</th>
            <th field="details" width="30" editor="{type:'validatebox',options:{required:true}}">Details</th>
            <th field="created" class="th" editor="{type:'validatebox',options:{required:true}}">Created</th>
            <th field="submitted" class="th" editor="{type:'validatebox',options:{required:true}}">Submitted</th>
            <th field="other" class="th" >Other</th>

        </tr>
    </thead>
</table>
<div id="toolbar">
     <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Delete</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Save</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Cancel</a>
    <div id="tb" style="padding:5px;height:auto">

        
    </div>

</div>

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.6.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.easyui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.edatagrid.js"></script>

<script type="text/javascript">
        $(function () {
            $('#dg').edatagrid({
                url: '<?php echo base_url() . 'index.php/grid/view/'; ?>',
                saveUrl: '<?php echo base_url() . 'index.php/grid/save/'; ?>',
                updateUrl: '<?php echo base_url() . 'index.php/grid/update/'; ?>',
                destroyUrl: '<?php echo base_url() . 'index.php/grid/delete/'; ?>'
            });
        });
        var lastIndex;
        $('#dg').datagrid({
            onClickRow: function (rowIndex) {
                if (lastIndex != rowIndex) {
                    $(this).datagrid('endEdit', lastIndex);
                    $(this).datagrid('beginEdit', rowIndex);
                }
                lastIndex = rowIndex;
            },
            onBeginEdit: function (rowIndex) {
                var editors = $('#dg').datagrid('getEditors', rowIndex);
                var n1 = $(editors[0].target);
                var n2 = $(editors[1].target);
                var n3 = $(editors[2].target);
                n1.add(n2).numberbox({
                    onChange: function () {
                        var cost = n1.numberbox('getValue') * n2.numberbox('getValue');
                        n3.numberbox('setValue', cost);
                    }
                })
            }
        });
        $('#dg').datagrid({
            rowStyler: function (index, row) {
                if (row.listprice > 80) {
                    return 'background-color:#6293BB;color:#fff;'; // return inline style
                    // the function can return predefined css class and inline style
                    // return {class:'r1', style:{'color:#fff'}};	
                }
            }
        });


//        onSelect: function(rows){
//            var url = '<?php echo base_url() . 'index.php/grid/account/'; ?>' + rows.family_id;
//            var tr = $(this).closest('tr.datagrid-row');
//            var idx = parseInt(tr.attr('datagrid-row-index'));
//            var ed = $("#dgUpholdstery").datagrid("getEditor", {index: id, field: 'account'});
//            $(ed.target).combobox("reload", url);
//        }

</script>
