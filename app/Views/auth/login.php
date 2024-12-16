<?= $this->extend('auth/main_template') ?>

<?= $this->section('content') ?>
<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="<?php echo base_url(); ?>" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="<?php echo base_url(); ?>assets/images/logos/astagina.png" width="300" height="120" alt="">
                </a>
                <form action="<?php echo base_url(); ?>/action_login" method="post">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="email" class="form-control" name="username" id="username" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                  </div>
                  <button type="submit" class="btn btn-primary w-100">Sign In</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
<!-- <script>
  document.addEventListener('contextmenu', function(event) {
    event.preventDefault();
  });
  document.onkeydown = function (e) {
    // Disable F12
    if(e.keyCode == 123) {
      return false;
    }

    // Disable Ctrl+Shift+I (Inspect Element)
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
      return false;
    }

    // Disable Ctrl+Shift+C (Inspect Element - Inspect)
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
      return false;
    }

    // Disable Ctrl+Shift+J (Console)
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
      return false;
    }

    // Disable Ctrl+U (View Source)
    if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
      return false;
    }
  }
</script> -->


<?= $this->endSection() ?>

