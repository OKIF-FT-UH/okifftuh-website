<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $title ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/if.png')?>">
    <!-- Custom Stylesheet -->
    <link href="<?=base_url('assets/admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/admin/css/style.css')?>" rel="stylesheet">

    <?php
    $modul = $this->uri->segment(2);
    if($modul == 'createInformation' || $modul == 'editInformation') : ?>
		<script type="text/javascript" src="https://cloud.tinymce.com/stable/tinymce.min.js"> </script>
		<script type="text/javascript">
			tinyMCE.init({
			         // General options
			         mode : "textareas",
			        // theme : "advanced",
			});
		</script>
    <?php endif; ?>

    <?php if($modul == 'galeri') : ?>
        <!-- Date picker plugins css -->
        <link href="<?= base_url('assets/admin/')?>plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
         <link href="./plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <?php endif; ?>

</head>