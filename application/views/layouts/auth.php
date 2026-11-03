<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>RPM PT. Indoneptune Net Mfg</title>
    <link href="<?= base_url(); ?>assets/favicon.ico" rel="icon">
    <!-- CSS files -->
    <link href="<?= base_url().'assets/src' ?>/css/tabler.min.css?1692870487" rel="stylesheet"/>
    <link href="<?= base_url().'assets/src' ?>/css/tabler-flags.min.css?1692870487" rel="stylesheet"/>
    <link href="<?= base_url().'assets/src' ?>/css/tabler-payments.min.css?1692870487" rel="stylesheet"/>
    <link href="<?= base_url().'assets/src' ?>/css/tabler-vendors.min.css?1692870487" rel="stylesheet"/>
    <link href="<?= base_url().'assets/src' ?>/css/demo.min.css?1692870487" rel="stylesheet"/>

    <link href="<?= base_url().'assets/css' ?>/own-style.css?1692870487" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
    <noscript>
        <style type="text/css">
            .page {
            display: none;
            }
        </style>
        <div class="noscriptmsg">
            You don't have javascript enabled. Good luck with that.
        </div>
    </noscript>
  </head>
  <body  class=" d-flex flex-column">
    <script src="<?= base_url().'assets/src' ?>/js/demo-theme.min.js?1692870487"></script>
    <div class="page page-center" style="background-color: white;">
      <div class="container container-tight py-4">
        <div class="text-center mb-4">
        </div>
        <?php if($this->session->flashdata('kodenya')): ?>
        <div class="alert alert-important alert-danger alert-dismissible mb-1" role="alert">
          <div class="d-flex">
            <div class="font-kecil">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v4" /><path d="M12 16h.01" /></svg>
            </div>
            <div class="font-kecil">
              <?= $this->session->flashdata('kodenya') ?>
            </div>
          </div>
          <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
        <?php endif; ?>
        <div class="card card-md">
          <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <div class="text-center mb-1">
              <img src="<?= base_url().'assets/img/logodepanK.png' ?>" class="img-fluid" width="270" height="32" alt="IFN">
            </div>
            <h2 class="h2 text-center mb-4">RPM NETTING</h2>
            <form action="<?= base_url().'auth/getpersonil' ?>" method="post" autocomplete="off" novalidate>
              <div class="mb-3">
                <label class="form-label">Nomor Induk Karyawan</label>
                <input type="email" class="form-control text-uppercase" placeholder="User Name" name="nik" autocomplete="off">
              </div>
              <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Next</button>
              </div>
            </form>
          </div>
        </div>
        <div class="text-center text-secondary mt-3">
          Belum punya Akun? <a href="./" tabindex="-1">Sign up</a>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url().'assets/src' ?>/js/tabler.min.js?1692870487" defer></script>
    <script src="<?= base_url().'assets/src' ?>/js/demo.min.js?1692870487" defer></script>
  </body>
</html>