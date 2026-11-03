<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Indoneptune Net Manufacturing</title>
    <link href="<?= base_url(); ?>assets/favicon.ico" rel="icon">
    <!-- CSS files -->
     <?php $updatetime = '1692870488'; ?>
    <link href="<?= base_url().'assets/src' ?>/css/tabler.min.css?<?= $updatetime ?>" rel="stylesheet"/>
    <link href="<?= base_url().'assets/src' ?>/css/tabler-flags.min.css?<?= $updatetime ?>" rel="stylesheet"/>
    <link href="<?= base_url().'assets/src' ?>/css/tabler-payments.min.css?<?= $updatetime ?>" rel="stylesheet"/>
    <link href="<?= base_url().'assets/src' ?>/css/tabler-vendors.min.css?<?= $updatetime ?>" rel="stylesheet"/>
    <link href="<?= base_url().'assets/src' ?>/css/demo.min.css?<?= $updatetime ?>" rel="stylesheet"/>
    <link href="<?= base_url().'assets/src' ?>/libs/toast/jquery.toast.min.css?<?= $updatetime ?>" rel="stylesheet"/>
    <link href="<?= base_url().'assets/css' ?>/vendor/fontawesome/css/fontawesome.min.css?<?= $updatetime ?>" rel="stylesheet"/>
    <link href="<?= base_url().'assets/css' ?>/own-style.css?<?= $updatetime ?>" rel="stylesheet"/>
    <style>
      .ui-autocomplete {
        z-index: 99999 !important;
        max-height: 200px;
        overflow-y: auto;
        overflow-x: hidden;
        font-size: 12px;
        background-color: white;
      }
    </style>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
    <script type="text/javascript">
    base_url = '<?= base_url() ?>';
  </script>
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
  <body >
    <script src="<?= base_url().'assets/src' ?>/js/demo-theme.min.js?1692870487"></script>
    <!-- Canvas -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="canvasdet" aria-labelledby="offcanvasEndLabel" style="min-width:75% !important">
      <div class="offcanvas-header">
        <div class="offcanvas-title font-bold" id="offcanvasEndLabel">Lorem Title</div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="fetched-data">
          <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab assumenda ea est, eum exercitationem fugiat illum itaque laboriosam magni necessitatibus, nemo nisi numquam quae reiciendis repellat sit soluta unde. Aut! -->
          <div class="text-center p-5" style="font-size: 20px;">
            <div class="spinner-border spinner-border text-teal text-center" role="status"></div> LOADING...
          </div>
        </div>
        <hr class="m-0 mt-1">
        <div class="mt-3 text-right">
          <button class="btn btn-primary btn-sm btn-flat" type="button" data-bs-dismiss="offcanvas">
            Close
          </button>
        </div>
      </div>
    </div>
    <!-- End Canvas -->
    <!-- Kummpulan Modal -->
    <div class="modal modal-blur fade" id="modal-simple" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-info">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body fetched-data p-1">
            Fetching Data ..
          </div>
          <!-- <div class="modal-footer">
              <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
            </div> -->
        </div>
      </div>
    </div>
    <div class="modal modal-blur fade" id="modal-password" role="dialog" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content btn-flat">
          <div class="modal-header bg-info hilang">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-2">
            <div class="mb-2">
                <label class="form-label font-kecil font-bold">Enter Password</label>
                <input type="password" class="form-control font-kecil btn-flat" name="example-text-input" placeholder="Input Password">
                <div class="text-right mb-2 mt-1">
                  <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Batal</button>
                  <button type="button" class="btn btn-sm btn-primary">Lanjutkan</button>
                </div>
              </div>
          </div>
          <!-- <div class="modal-footer">
              <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
            </div> -->
        </div>
      </div>
    </div>
    <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-danger"></div>
          <div class="modal-body text-center py-4">
            <svg class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
              <path d="M12 9v4" />
              <path d="M12 17h.01" />
            </svg>
            <h3>Anda Yakin ?</h3>
            <div class="text-secondary" id="message">Do you really want to remove 84 files? What you've done cannot be undone.</div>
          </div>
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
                <div class="col"><a id="btn-ok" href="#" class="btn btn-danger w-100">
                    Ya
                  </a></div>
                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                    Tidak
                  </a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal modal-blur fade" id="modal-info" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-info"></div>
          <div class="modal-body text-center py-4">
            <svg class="icon mb-2 text-info icon-lg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-alert-circle">
              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
              <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
              <path d="M12 8v4" />
              <path d="M12 16h.01" />
            </svg>
            <h3>Anda Yakin ?</h3>
            <div class="text-secondary" id="message-info"></div>
          </div>
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
                <div class="col"><a id="btn-oke" href="#" class="btn btn-info w-100">
                    Ya
                  </a></div>
                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                    Tidak
                  </a></div>
                  <!--  -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal modal-blur fade" id="modal-large" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h5 class="modal-title">Large modal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body fetched-data p-1">
          <div class="text-center">Fetching Data ..</div>
          <!-- <div>
              <div class="container container-slim py-4" id="syncloader">
                    <div class="text-center">
                        <div class="mb-3">
                        </div>
                        <div class="text-secondary mb-3">Fetching data, Please wait..</div>
                        <div class="progress progress-sm">
                        <div class="progress-bar progress-bar-indeterminate"></div>
                        </div>
                    </div>
                </div>
           </div> -->
        </div>
        <!-- <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
          </div> -->
      </div>
    </div>
  </div>
  <div class="modal modal-blur fade" id="modal-large-loading" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h5 class="modal-title">Large modal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body fetched-data p-1">
          <div class="text-center">Fetching Data ..</div>
          <!-- <div>
              <div class="container container-slim py-4" id="syncloader">
                    <div class="text-center">
                        <div class="mb-3">
                        </div>
                        <div class="text-secondary mb-3">Fetching data, Please wait..</div>
                        <div class="progress progress-sm">
                        <div class="progress-bar progress-bar-indeterminate"></div>
                        </div>
                    </div>
                </div>
           </div> -->
        </div>
        <!-- <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
          </div> -->
      </div>
    </div>
  </div>
    <div class="page">
      <!-- Navbar -->
      <div class="sticky-top">
        <header class="navbar navbar-expand-md sticky-top d-print-none" >
          <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
              <a href="<?= base_url() ?>">
                <img src="<?= base_url().'assets/img/logodepanK.png' ?>" width="65" height="32" alt="IFN" class="navbar-brand-image">
              </a>
            </h1>
            <div class="navbar-nav flex-row order-md-last">
              <div class="d-none d-md-flex">
                <div class="nav-item dropdown d-none d-md-flex me-3">
                  <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                    <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" /><path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                    <span class="badge bg-red"></span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Last updates</h3>
                      </div>
                      <div class="list-group list-group-flush list-group-hoverable">
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Example 1</a>
                              <div class="d-block text-secondary text-truncate mt-n1">
                                Change deprecated html tags to text decoration classes (#29604)
                              </div>
                            </div>
                            <div class="col-auto">
                              <a href="#" class="list-group-item-actions">
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto"><span class="status-dot d-block"></span></div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Example 2</a>
                              <div class="d-block text-secondary text-truncate mt-n1">
                                justify-content:between ⇒ justify-content:space-between (#29734)
                              </div>
                            </div>
                            <div class="col-auto">
                              <a href="#" class="list-group-item-actions show">
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto"><span class="status-dot d-block"></span></div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Example 3</a>
                              <div class="d-block text-secondary text-truncate mt-n1">
                                Update change-version.js (#29736)
                              </div>
                            </div>
                            <div class="col-auto">
                              <a href="#" class="list-group-item-actions">
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="list-group-item">
                          <div class="row align-items-center">
                            <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                            <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Example 4</a>
                              <div class="d-block text-secondary text-truncate mt-n1">
                                Regenerate package-lock.json (#29730)
                              </div>
                            </div>
                            <div class="col-auto">
                              <a href="#" class="list-group-item-actions">
                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                  <?php $fotouser = datauser($this->session->userdata('nik'),'krite'); ?>
                  <?php 
                    // if ($fotouser != null && $fotouser != '') {
                    //     $fotonya = base_url().'assets/image/personil/' . $fotouser;
                    //   } else {
                        $fotonya = base_url().'assets/img/avatar/005f.jpg';
                    // } 
                  ?>
                  <!-- <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span> -->
                   <span class="avatar avatar-sm" style="background-image: url(<?= $fotonya; ?>)"></span>
                  <div class="d-none d-xl-block ps-2">
                    <div><?= datauser($this->session->userdata('nik'),'nama') ?></div>
                    <div class="mt-1 small text-secondary"><?= datauser($this->session->userdata('nik'),'bagian') ?></div>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <a href="#" class="dropdown-item">Status</a>
                  <a href="./" class="dropdown-item">Profile</a>
                  <a href="#" class="dropdown-item">Feedback</a>
                  <div class="dropdown-divider"></div>
                  <a href="./" class="dropdown-item">Settings</a>
                  <a href="<?= base_url().'auth/logout' ?>" class="dropdown-item">Logout</a>
                </div>
              </div>
            </div>
          </div>
        </header>
        <header class="navbar-expand-md">
          <div class="collapse navbar-collapse bg-blue" id="navbar-menu">
            <div class="navbar bg-blue-lt">
              <div class="container-xl">
                <ul class="navbar-nav">
                  <li class="nav-item <?php if(isset($header) && $header['menu']=='dashboard'){ echo "active"; } ?>">
                    <a class="nav-link" href="<?= base_url().'main/clear' ?>" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block <?php if(isset($header) && $header['menu']=='dashboard'){ echo "text-pink"; } ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-dashboard <?php if(isset($header) && $header['menu']=='dashboard'){ echo "text-pink"; } ?>"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M10 13a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M13.45 11.55l2.05 -2.05" /><path d="M6.4 20a9 9 0 1 1 11.2 0l-11.2 0" /></svg>
                      </span>
                      <span class="nav-link-title text-black">
                        Dashboard
                      </span>
                    </a>
                  </li>
                  <li class="nav-item <?php if(isset($header) && $header['menu']=='rpm'){ echo "active"; } ?>">
                    <a class="nav-link" href="<?= base_url().'rpm/clear' ?>" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block <?php if(isset($header) && $header['menu']=='rpm'){ echo "text-pink"; } ?>"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-rotate-clockwise-2"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M9 4.55a8 8 0 0 1 6 14.9m0 -4.45v5h5" /><path d="M5.63 7.16l0 .01" /><path d="M4.06 11l0 .01" /><path d="M4.63 15.1l0 .01" /><path d="M7.16 18.37l0 .01" /><path d="M11 19.94l0 .01" /></svg>
                      </span>
                      <span class="nav-link-title">
                        Input RPM
                      </span>
                    </a>
                  </li>
                  <li class="nav-item <?php if(isset($header) && $header['menu']=='cekjala'){ echo "active"; } ?>">
                    <a class="nav-link" href="<?= base_url().'cekjala/clear' ?>" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block <?php if(isset($header) && $header['menu']=='cekjala'){ echo "text-pink"; } ?>"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-grid-pattern"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M4 6a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2l0 -12" /><path d="M10 8v8" /><path d="M14 8v8" /><path d="M8 10h8" /><path d="M8 14h8" /></svg>
                      </span>
                      <span class="nav-link-title">
                        Cek Jala
                      </span>
                    </a>
                  </li>
                  <li class="nav-item <?php if(isset($header) && $header['menu']=='potjala'){ echo "active"; } ?>">
                    <a class="nav-link" href="<?= base_url().'potjala/clear' ?>" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block <?php if(isset($header) && $header['menu']=='potjala'){ echo "text-pink"; } ?>"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-scissors"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M3 7a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M3 17a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M8.6 8.6l10.4 10.4" /><path d="M8.6 15.4l10.4 -10.4" /></svg>
                      </span>
                      <span class="nav-link-title">
                        Potong Jala
                      </span>
                    </a>
                  </li>
                  <!-- <li class="nav-item <?php if(isset($header) && $header['menu']=='laporan'){ echo "active"; } ?>">
                    <a class="nav-link" href="<?= base_url().'laporan/clear' ?>" >
                      <span class="nav-link-icon d-md-none d-lg-inline-block <?php if(isset($header) && $header['menu']=='laporan'){ echo "text-pink"; } ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-file-text"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2" /><path d="M9 9l1 0" /><path d="M9 13l6 0" /><path d="M9 17l6 0" /></svg>
                      </span>
                      <span class="nav-link-title">
                        Report
                      </span>
                    </a>
                  </li> -->
                </ul>
                <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                  <!-- <form action="./" method="get" autocomplete="off" novalidate>
                    <div class="input-icon">
                      <span class="input-icon-addon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                      </span>
                      <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search in website">
                    </div>
                  </form> -->
                </div>
              </div>
            </div>
          </div>
        </header>
      </div>
      <div class="page-wrapper">
      <input type="hidden" name="jeniserror" id="jeniserror" value="<?= $this->session->flashdata('jeniserror'); ?>">
      <input type="hidden" name="pesanerror" id="pesanerror" value="<?= $this->session->flashdata('pesanerror'); ?>">