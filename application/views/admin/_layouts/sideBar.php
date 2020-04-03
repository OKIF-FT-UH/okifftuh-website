<?php  $modul = $this->uri->segment(2);   ?>

  <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <!-- <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./index.html">Home 1</a></li>
                            <li><a href="./index-2.html">Home 2</a></li>
                        </ul>
                    </li> -->
                    
                     <li class="<?= ($modul == '' ? 'active' : '' ) ?>">
                        <a href="<?= site_url('admin/') ?>" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="mega-menu mega-menu-sm <?= ($modul == 'kategori' || $modul == 'mahasiswa' || $modul == 'alumni') ? 'active' : '' ?>">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-docs menu-icon"></i><span class="nav-text">Master Data</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= site_url('admin/kategori') ?>" class="<?= ($modul == 'kategori') ? 'active' : '' ?>">Kategori</a></li>
                            <li><a href="<?= site_url('admin/mahasiswa') ?>" class="<?= ($modul == 'mahasiswa') ? 'active' : '' ?>">Mahasiswa Aktif</a></li>
                            <li><a href="<?= site_url('admin/alumni') ?>" class="<?= ($modul == 'alumni') ? 'active' : '' ?>">Alumni</a></li>
                        </ul>
                    </li>

                    <li class="mega-menu mega-menu-sm <?= ($modul == 'himpunan' || $modul == 'kemahasiswaan' || $modul == 'beasiswa' || $modul == 'prestasi' || $modul == 'artikel' || $modul == 'lomba') ? 'active' : '' ?>">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-book-open menu-icon"></i><span class="nav-text">Informasi</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= site_url('admin/himpunan') ?>" class="<?= ($modul == 'himpunan') ? 'active' : '' ?>">Kegiatan Himpunan</a></li>
                            <li><a href="<?= site_url('admin/kemahasiswaan') ?>" class="<?= ($modul == 'kemahasiswaan') ? 'active' : '' ?>">Kemahasiswaan</a></li>
                            <li><a href="<?= site_url('admin/beasiswa') ?>" class="<?= ($modul == 'beasiswa') ? 'active' : '' ?>">Beasiswa</a></li>
                            <li><a href="<?= site_url('admin/prestasi') ?>" class="<?= ($modul == 'prestasi') ? 'active' : '' ?>">Prestasi</a></li>
                            <li><a href="<?= site_url('admin/artikel') ?>" class="<?= ($modul == 'artikel') ? 'active' : '' ?>">Artikel</a></li>
                            <li><a href="<?= site_url('admin/lomba') ?>" class="<?= ($modul == 'lomba') ? 'active' : '' ?>">Lomba</a></li>
                        </ul>
                    </li>

                    <li class="mega-menu mega-menu-sm <?= ($modul == 'pengurusDmmif' || $modul == 'pengurusHmif' || $modul == 'sejarahPengurus') ? 'active' : '' ?>">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-people menu-icon"></i><span class="nav-text">Pengurus</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?= site_url('admin/pengurusDmmif') ?>" class="<?= ($modul == 'pengurusDmmif') ? 'active' : '' ?>">DMMIF FT-UH</a></li>
                            <li><a href="<?= site_url('admin/pengurusHmif') ?>" class="<?= ($modul == 'pengurusHmif') ? 'active' : '' ?>">HMIF FT-UH</a></li>
                            <li><a href="<?= site_url('admin/sejarahPengurus') ?>" class="<?= ($modul == 'sejarahPengurus') ? 'active' : '' ?>">Sejarah Pengurus</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?= site_url('admin/daftarPrestasi') ?>" aria-expanded="false" class="<?= ($modul == 'daftarPrestasi' ? 'active' : '' ) ?>">
                            <i class="icon-trophy menu-icon"></i><span class="nav-text">Daftar Prestasi</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= site_url('admin/arsip')?>" aria-expanded="false" class="<?= $modul == 'arsip' ? 'active' : '' ?>">
                        <i class="icon-folder menu-icon"></i><span class="nav-text">Arsip</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= site_url('admin/galeri')?>" aria-expanded="false" class="<?= ($modul == 'galeri' ? 'active' : '' ) ?>">
                            <i class="icon-picture menu-icon"></i><span class="nav-text">Galeri</span>
                        </a>
                    </li>

                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i><span class="nav-text">Saran Masuk</span>
                        </a>
                        <ul aria-expanded="false">
                        <li><a href="<?= site_url('admin/saranMasuk') ?>" class="<?= ($modul == 'saranMasuk') ? 'active' : '' ?>">Saran Masuk</a></li>
                        <li><a href="<?= site_url('admin/saranApprove') ?>" class="<?= ($modul == 'saranApprove') ? 'active' : '' ?>">Saran yang Telah disetujui</a></li>
                        </ul>
                    </li>
                    
                    <?php if($this->session->userdata('status_admin') == 'super_admin') : ?>
                        <li>
                            <a href="<?= site_url('admin/admin') ?>" class="<?= ($modul == 'admin') ? 'active' : '' ?>" aria-expanded="false">
                                <i class="icon-user menu-icon"></i><span class="nav-text">Admin</span>
                            </a>
                        </li>
                    <?php endif; ?>
<!-- 
                    <li class="nav-label">Apps</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i> <span class="nav-text">Email</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./email-inbox.html">Inbox</a></li>
                            <li><a href="./email-read.html">Read</a></li>
                            <li><a href="./email-compose.html">Compose</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Apps</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./app-profile.html">Profile</a></li>
                            <li><a href="./app-calender.html">Calender</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Charts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./chart-flot.html">Flot</a></li>
                            <li><a href="./chart-morris.html">Morris</a></li>
                            <li><a href="./chart-chartjs.html">Chartjs</a></li>
                            <li><a href="./chart-chartist.html">Chartist</a></li>
                            <li><a href="./chart-sparkline.html">Sparkline</a></li>
                            <li><a href="./chart-peity.html">Peity</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">UI Components</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-grid menu-icon"></i><span class="nav-text">UI Components</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./ui-accordion.html">Accordion</a></li>
                            <li><a href="./ui-alert.html">Alert</a></li>
                            <li><a href="./ui-badge.html">Badge</a></li>
                            <li><a href="./ui-button.html">Button</a></li>
                            <li><a href="./ui-button-group.html">Button Group</a></li>
                            <li><a href="./ui-cards.html">Cards</a></li>
                            <li><a href="./ui-carousel.html">Carousel</a></li>
                            <li><a href="./ui-dropdown.html">Dropdown</a></li>
                            <li><a href="./ui-list-group.html">List Group</a></li>
                            <li><a href="./ui-media-object.html">Media Object</a></li>
                            <li><a href="./ui-modal.html">Modal</a></li>
                            <li><a href="./ui-pagination.html">Pagination</a></li>
                            <li><a href="./ui-popover.html">Popover</a></li>
                            <li><a href="./ui-progressbar.html">Progressbar</a></li>
                            <li><a href="./ui-tab.html">Tab</a></li>
                            <li><a href="./ui-typography.html">Typography</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-layers menu-icon"></i><span class="nav-text">Components</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./uc-nestedable.html">Nestedable</a></li>
                            <li><a href="./uc-noui-slider.html">Noui Slider</a></li>
                            <li><a href="./uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="./uc-toastr.html">Toastr</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="widgets.html" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Widget</span>
                        </a>
                    </li>
                    <li class="nav-label">Forms</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Forms</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./form-basic.html">Basic Form</a></li>
                            <li><a href="./form-validation.html">Form Validation</a></li>
                            <li><a href="./form-step.html">Step Form</a></li>
                            <li><a href="./form-editor.html">Editor</a></li>
                            <li><a href="./form-picker.html">Picker</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Table</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Table</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./table-basic.html" aria-expanded="false">Basic Table</a></li>
                            <li><a href="./table-datatable.html" aria-expanded="false">Data Table</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Pages</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Pages</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./page-login.html">Login</a></li>
                            <li><a href="./page-register.html">Register</a></li>
                            <li><a href="./page-lock.html">Lock Screen</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    <li><a href="./page-error-404.html">Error 404</a></li>
                                    <li><a href="./page-error-403.html">Error 403</a></li>
                                    <li><a href="./page-error-400.html">Error 400</a></li>
                                    <li><a href="./page-error-500.html">Error 500</a></li>
                                    <li><a href="./page-error-503.html">Error 503</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->