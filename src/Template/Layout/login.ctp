<!-- File: src/Template/Users/login.ctp -->

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
    <title>Login Porus Ruby</title>
    <meta name="description" content="Porus Ruby Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <?=  $this->Html->css('/backend/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>
    <?=  $this->Html->css('/backend/vendors/font-awesome/css/font-awesome.min.css'); ?>
    <?=  $this->Html->css('/backend/vendors/themify-icons/css/themify-icons.css'); ?>
    <?=  $this->Html->css('/backend/vendors/flag-icon-css/css/flag-icon.min.css'); ?>
    <?=  $this->Html->css('/backend/vendors/selectFX/css/cs-skin-elastic.css'); ?>

    <?=  $this->Html->css('/backend/assets/css/style.css'); ?>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">
<?= $this->Flash->render() ?>

<?= $this->fetch('content') ?>

<?=  $this->Html->script('/backend/vendors/jquery/dist/jquery.min.js'); ?>
<?=  $this->Html->script('/backend/vendors/popper.js/dist/umd/popper.min.js'); ?>
<?=  $this->Html->script('/backend/vendors/bootstrap/dist/js/bootstrap.min.js'); ?>
<?=  $this->Html->script('/backend/assets/js/main.js'); ?>


</body>

</html>
