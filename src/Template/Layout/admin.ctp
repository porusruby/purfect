
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $this->fetch('title') ?></title>
    <meta name="description" content="Free CakePHP CMS">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <?=  $this->Html->css('/backend/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>
    <?=  $this->Html->css('/backend/vendors/font-awesome/css/font-awesome.min.css'); ?>
    <?=  $this->Html->css('/backend/vendors/themify-icons/css/themify-icons.css'); ?>
    <?=  $this->Html->css('/backend/vendors/flag-icon-css/css/flag-icon.min.css'); ?>
    <?=  $this->Html->css('/backend/vendors/selectFX/css/cs-skin-elastic.css'); ?>
    <?=  $this->Html->css('/backend/vendors/jqvmap/dist/jqvmap.min.css'); ?>

    <?=  $this->Html->css('/backend/assets/css/style.css'); ?>
    <!-- Datatables -->
    <?=  $this->Html->css('/backend/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>
    <?=  $this->Html->css('/backend/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>
    <?=  $this->Html->css('/backend/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css'); ?>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <?php echo $this->element('admin/sidebar'); ?>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

        <?php echo $this->element('admin/header'); ?>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?= $this->fetch('title') ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><?= $this->fetch('title') ?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
        <?= $this->Flash->render() ?>

        <?= $this->fetch('content') ?>

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <?=  $this->Html->script('/backend/vendors/jquery/dist/jquery.min.js'); ?>
    
    <?=  $this->Html->script('/backend/vendors/popper.js/dist/umd/popper.min.js'); ?>
    
    <?=  $this->Html->script('/backend/vendors/bootstrap/dist/js/bootstrap.min.js'); ?>
    
    <?=  $this->Html->script('/backend/assets/js/main.js'); ?>

    <?=  $this->Html->script('/backend/vendors/ckeditor/ckeditor.js'); ?>
   
    
    <!--
    <?=  $this->Html->script('/backend/assets/js/dashboard.js'); ?>

    <?=  $this->Html->script('/backend/vendors/chart.js/dist/Chart.bundle.min.js'); ?>

    <?=  $this->Html->script('/backend/assets/js/widgets.js'); ?>
    
    <?=  $this->Html->script('/backend/vendors/jqvmap/dist/jquery.vmap.min.js'); ?>
   
    <?=  $this->Html->script('/backend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js'); ?>
    
    <?=  $this->Html->script('/backend/vendors/jqvmap/dist/maps/jquery.vmap.world.js'); ?>
    -->
    <!-- Datatables -->
    <?=  $this->Html->script('/backend/vendors/datatables.net/js/jquery.dataTables.min.js'); ?>
    <?=  $this->Html->script('/backend/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>
    <?=  $this->Html->script('/backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js'); ?>
    <?=  $this->Html->script('/backend/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js'); ?>
    <!--
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>
    -->

    <script>
    
    var roxyFileman = '<?php echo $this->request->getAttribute("webroot")."backend/vendors/filemanager/dialog.php" ?>';
        (function ($) {
    //    "use strict";
    /*  Data Table
    -------------*/
    <?php if( ($this->request->getParam('controller') == 'Posts' OR $this->request->getParam('controller') == 'Pages' ) && ( $this->request->getParam('action') == 'add' OR $this->request->getParam('action') == 'edit')   ) { ?>
    $(function(){
    CKEDITOR.replace( 'editor1',{filebrowserBrowseUrl:roxyFileman+'?type=2&editor=ckeditor&fldr=',
                                    filebrowserImageBrowseUrl:roxyFileman+'?type=1&editor=ckeditor&fldr=',
                                    filebrowserUploadUrl: roxyFileman+'?type=2&editor=ckeditor&fldr='}); 
    });
    <?php } ?>

    $('#bootstrap-data-table').DataTable({
        lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
    });

    $('#bootstrap-data-table-export').DataTable({
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    });

	$('#myTable').DataTable( {
        initComplete: function () {
				this.api().columns().every( function () {
					var column = this;
					var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);

							column
								.search( val ? '^'+val+'$' : '', true, false )
								.draw();
						} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			}
		} );

    })(jQuery);
    </script>

</body>

</html>
