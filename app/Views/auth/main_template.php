<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ASTAGINA PRAPTAMA CBT</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/images/logos/seodashlogo.png" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.min.css" />
</head>

<?= $this->renderSection('content') ?>

<script src="<?php echo base_url(); ?>assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (session()->has('error')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?= session()->getFlashdata('error'); ?>'
        });
    </script>
<?php endif; ?>

<?php if (session()->has('success')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?= session()->getFlashdata('success'); ?>'
        });
    </script>
<?php endif; ?>

</html>