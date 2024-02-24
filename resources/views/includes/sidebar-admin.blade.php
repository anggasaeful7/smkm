<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/your/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').click(function() {
                $(this).next('.submenu').slideToggle(300);
            });
        });
    </script>
</head>

<body>

    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            @can('nav admin')
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading">Menu</div>
                    <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                        href="{{ route('admin-dashboard') }}">
                        <div class="nav-link-icon"><i class="fas fa-home"></i></div>
                        Beranda
                    </a>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle">
                            <div class="nav-link-icon"><i Class="fa fa-th-large"></i></div>
                            Kegiatan
                        </a>
                        <div class="submenu">
                            <a class="nav-link {{ request()->is('admin/kegiatan*') ? 'active' : '' }}"
                                href="{{ route('daftar-kegiatan') }}">
                                <div class="nav-link-icon"><i class="fas fa-home"></i></div> Daftar Kegiatan
                            </a>
                            <a class="nav-link {{ request()->is('admin/datapendaftaran*') ? 'active' : '' }}"
                                href="{{ route('data-pendaftaran') }}">
                                <div class="nav-link-icon"><i class="fa fa-th-list"></i></div> Data Pendaftaran
                            </a>
                            <a class="nav-link {{ request()->is('admin/datapendaftar*') ? 'active' : '' }}"
                                href="{{ route('filter.form') }}">
                                <div class="nav-link-icon"><i class="fas fa-table"></i></div> Data Pendaftar
                            </a>

                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle">
                            <div class="nav-link-icon"><i class="fas fa-users"></i></div>
                            Data-Data
                        </a>
                        <div class="submenu">
                            <a class="nav-link {{ request()->is('admin/department*') ? 'active' : '' }}"
                                href="{{ route('department.index') }}">
                                <div class="nav-link-icon"><i class="fas fa-home"></i></div> Data Organisasi
                            </a>
                            <a class="nav-link {{ request()->is('admin/jeniskegiatan') ? 'active' : '' }}"
                                href="{{ route('jeniskegiatan.index') }}">
                                <div class="nav-link-icon"><i class="fas fa-fax"></i></div> Data Jenis Kegiatan
                            </a>
                            <a class="nav-link {{ request()->is('admin/jenisikutserta') ? 'active' : '' }}"
                                href="{{ route('jenisikutserta.index') }}">
                                <div class="nav-link-icon"><i class="fas fa-exclamation-circle"></i></div> Data Jenis
                                Ikutserta
                            </a>
                            <a class="nav-link {{ request()->is('admin/sender*') ? 'active' : '' }}"
                                href="{{ route('sender.index') }}">
                                <div class="nav-link-icon"><i class="fas fa-address-card"></i></div> Penanggung Jawab
                                Proposal
                            </a>
                            <a class="nav-link {{ request()->is('admin/prodi*') ? 'active' : '' }}"
                                href="{{ route('prodi.index') }}">
                                <div class="nav-link-icon"><i class="fas fa-graduation-cap"></i></div> Program Studi
                            </a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle">
                            <div class="nav-link-icon"><i class="fas fa-envelope"></i></div>
                            Proposal
                        </a>
                        <div class="submenu">
                            <a class="nav-link {{ request()->is('admin/letter/surat-masuk') ? 'active' : '' }}"
                                href="{{ route('surat-masuk') }}">
                                <div class="nav-link-icon"><i class="fas fa-book"></i></div> Pengajuan Proposal
                            </a>
                            <a class="nav-link {{ request()->is('admin/letterout/surat-keluar') ? 'active' : '' }}"
                                href="{{ route('surat-keluar') }}">
                                <div class="nav-link-icon"><i class="fas fa-list-ul"></i></div> Data Pengajuan
                            </a>
                            <a class="nav-link {{ request()->is('admin/disposisi/surat-disposisi') ? 'active' : '' }}"
                                href="{{ route('surat-disposisi') }}">
                                <div class="nav-link-icon"><i class="fa fa-exclamation-triangle"></i></div> Status Proposal
                            </a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle">
                            <div class="nav-link-icon"><i class="fas fa-book"></i></div>
                            Presensi
                        </a>
                        <div class="submenu">
                            <a class="nav-link {{ request()->is('admin/presensi/riwayat*') ? 'active' : '' }}"
                                href="{{ route('presensi-riwayat-all') }}">
                                <div class="nav-link-icon"><i class="fas fa-address-book"></i></div>Riwayat Presensi
                            </a>
                            <a class="nav-link {{ request()->is('admin/sertifikat*') ? 'active' : '' }}"
                                href="{{ route('data-sertifikat') }}">
                                <div class="nav-link-icon"><i class="fa fa-upload"></i></div> Submit Sertifikat
                            </a>
                            <a class="nav-link {{ request()->is('admin/downloadsertif*') ? 'active' : '' }}"
                                href="{{ route('sertifikat') }}">
                                <div class="nav-link-icon"><i class="fas fa-file"></i></div> Sertifikat Kegiatan
                            </a>
                        </div>
                    </div>
                    <a class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}"
                        href="{{ route('user.index') }}">
                        <div class="nav-link-icon"><i Class="fas fa-users"></i></div>
                        Data User
                    </a>
                    <!-- Add other dropdown menus and links following the same structure -->
                </div>
            @endcan
            @can('nav peninjau')
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading">Menu</div>
                    <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                        href="{{ route('admin-dashboard') }}">
                        <div class="nav-link-icon"><i class="fas fa-home"></i></div>
                        Beranda
                    </a>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle">
                            <div class="nav-link-icon"><i Class="fa fa-th-large"></i></div>
                            Kegiatan
                        </a>
                        <div class="submenu">
                            <a class="nav-link {{ request()->is('admin/kegiatan*') ? 'active' : '' }}"
                                href="{{ route('daftar-kegiatan') }}">
                                <div class="nav-link-icon"><i class="fas fa-home"></i></div> Daftar Kegiatan
                            </a>
                            <a class="nav-link {{ request()->is('admin/datapendaftaran*') ? 'active' : '' }}"
                                href="{{ route('data-pendaftaran') }}">
                                <div class="nav-link-icon"><i class="fa fa-th-list"></i></div> Data Pendaftaran
                            </a>
                            <a class="nav-link {{ request()->is('admin/datapendaftar*') ? 'active' : '' }}"
                                href="{{ route('filter.form') }}">
                                <div class="nav-link-icon"><i class="fas fa-table"></i></div> Data Pendaftar
                            </a>

                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle">
                            <div class="nav-link-icon"><i class="fas fa-users"></i></div>
                            Data-Data
                        </a>
                        <div class="submenu">
                            <a class="nav-link {{ request()->is('admin/department*') ? 'active' : '' }}"
                                href="{{ route('department.index') }}">
                                <div class="nav-link-icon"><i class="fas fa-home"></i></div> Data Organisasi
                            </a>
                            <a class="nav-link {{ request()->is('admin/jeniskegiatan') ? 'active' : '' }}"
                                href="{{ route('jeniskegiatan.index') }}">
                                <div class="nav-link-icon"><i class="fas fa-fax"></i></div> Data Jenis Kegiatan
                            </a>
                            <a class="nav-link {{ request()->is('admin/jenisikutserta') ? 'active' : '' }}"
                                href="{{ route('jenisikutserta.index') }}">
                                <div class="nav-link-icon"><i class="fas fa-exclamation-circle"></i></div> Data Jenis
                                Ikutserta
                            </a>
                            <a class="nav-link {{ request()->is('admin/sender*') ? 'active' : '' }}"
                                href="{{ route('sender.index') }}">
                                <div class="nav-link-icon"><i class="fas fa-address-card"></i></div> Pengaju Proposal
                            </a>
                            <a class="nav-link {{ request()->is('admin/prodi*') ? 'active' : '' }}"
                                href="{{ route('prodi.index') }}">
                                <div class="nav-link-icon"><i class="fas fa-graduation-cap"></i></div> Program Studi
                            </a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle">
                            <div class="nav-link-icon"><i class="fas fa-envelope"></i></div>
                            Proposal
                        </a>
                        <div class="submenu">
                            <a class="nav-link {{ request()->is('admin/letterout/surat-keluar') ? 'active' : '' }}"
                                href="{{ route('surat-keluar') }}">
                                <div class="nav-link-icon"><i class="fas fa-list-ul"></i></div> Data Pengajuan
                            </a>
                            <a class="nav-link {{ request()->is('admin/disposisi/surat-disposisi') ? 'active' : '' }}"
                                href="{{ route('surat-disposisi') }}">
                                <div class="nav-link-icon"><i class="fa fa-exclamation-triangle"></i></div> Status
                                Proposal
                            </a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle">
                            <div class="nav-link-icon"><i class="fas fa-book"></i></div>
                            Presensi
                        </a>
                        <div class="submenu">
                            <a class="nav-link {{ request()->is('admin/sertifikat*') ? 'active' : '' }}"
                                href="{{ route('data-sertifikat') }}">
                                <div class="nav-link-icon"><i class="fa fa-upload"></i></div> Submit Sertifikat
                            </a>
                            <a class="nav-link {{ request()->is('admin/downloadsertif*') ? 'active' : '' }}"
                                href="{{ route('sertifikat') }}">
                                <div class="nav-link-icon"><i class="fas fa-file"></i></div> Sertifikat Kegiatan
                            </a>
                        </div>
                    </div>
                    <!-- Add other dropdown menus and links following the same structure -->
                </div>
            @endcan
            @can('nav ormawa')
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading">Menu</div>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle">
                            <div class="nav-link-icon"><i Class="fa fa-th-large"></i></div>
                            Kegiatan
                        </a>
                        <div class="submenu">
                            <a class="nav-link {{ request()->is('admin/kegiatan*') ? 'active' : '' }}"
                                href="{{ route('daftar-kegiatan') }}">
                                <div class="nav-link-icon"><i class="fas fa-home"></i></div> Daftar Kegiatan
                            </a>
                            <a class="nav-link {{ request()->is('admin/datapendaftar*') ? 'active' : '' }}"
                                href="{{ route('filter.form') }}">
                                <div class="nav-link-icon"><i class="fas fa-table"></i></div> Data Pendaftar
                            </a>

                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle">
                            <div class="nav-link-icon"><i class="fas fa-envelope"></i></div>
                            Proposal
                        </a>
                        <div class="submenu">
                            <a class="nav-link {{ request()->is('admin/letter/surat-masuk') ? 'active' : '' }}"
                                href="{{ route('surat-masuk') }}">
                                <div class="nav-link-icon"><i class="fas fa-book"></i></div> Pengajuan Proposal
                            </a>
                            <a class="nav-link {{ request()->is('admin/letterout/surat-keluar') ? 'active' : '' }}"
                                href="{{ route('surat-keluar') }}">
                                <div class="nav-link-icon"><i class="fas fa-list-ul"></i></div> Data Pengajuan
                            </a>
                            <a class="nav-link {{ request()->is('admin/disposisi/surat-disposisi') ? 'active' : '' }}"
                                href="{{ route('surat-disposisi') }}">
                                <div class="nav-link-icon"><i class="fa fa-exclamation-triangle"></i></div> Status
                                Proposal
                            </a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle">
                            <div class="nav-link-icon"><i class="fas fa-book"></i></div>
                            Presensi
                        </a>
                        <div class="submenu">
                            <a class="nav-link {{ request()->is('admin/sertifikat*') ? 'active' : '' }}"
                                href="{{ route('data-sertifikat') }}">
                                <div class="nav-link-icon"><i class="fa fa-upload"></i></div> Submit Sertifikat
                            </a>
                            <a class="nav-link {{ request()->is('admin/downloadsertif*') ? 'active' : '' }}"
                                href="{{ route('sertifikat') }}">
                                <div class="nav-link-icon"><i class="fas fa-file"></i></div> Sertifikat Kegiatan
                            </a>
                        </div>
                    </div>
                    <!-- Add other dropdown menus and links following the same structure -->
                </div>
            @endcan
            @can('nav umum')
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading">Menu</div>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle">
                            <div class="nav-link-icon"><i Class="fa fa-th-large"></i></div>
                            Kegiatan
                        </a>
                        <div class="submenu">
                            <a class="nav-link {{ request()->is('admin/kegiatan*') ? 'active' : '' }}"
                                href="{{ route('daftar-kegiatan-umum') }}">
                                <div class="nav-link-icon"><i class="fas fa-home"></i></div> Daftar Kegiatan
                            </a>
                            <a class="nav-link {{ request()->is('admin/datapendaftaran*') ? 'active' : '' }}"
                                href="{{ route('data-pendaftaran-umum') }}">
                                <div class="nav-link-icon"><i class="fa fa-th-list"></i></div> Data Pendaftaran
                            </a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle">
                            <div class="nav-link-icon"><i class="fas fa-book"></i></div>
                            Presensi
                        </a>
                        <div class="submenu">
                            <a class="nav-link {{ request()->is('admin/presensi*') ? 'active' : '' }}"
                                href="{{ route('data-kegiatan') }}">
                                <div class="nav-link-icon"><i class="fas fa-address-book"></i></div> Presensi Kegiatan
                            </a>
                            <a class="nav-link {{ request()->is('admin/presensi/riwayat*') ? 'active' : '' }}"
                                href="{{ route('presensi-riwayat') }}">
                                <div class="nav-link-icon"><i class="fas fa-address-book"></i></div>Riwayat Presensi
                            </a>
                            <a class="nav-link {{ request()->is('admin/downloadsertif*') ? 'active' : '' }}"
                                href="{{ route('sertifikat') }}">
                                <div class="nav-link-icon"><i class="fas fa-file"></i></div> Sertifikat Kegiatan
                            </a>
                        </div>
                    </div>
                    <!-- Add other dropdown menus and links following the same structure -->
                </div>
            @endcan

        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{ Auth::user()->name }}</div>
            </div>
        </div>
    </nav>

</body>

</html>
