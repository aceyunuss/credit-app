 <!-- Sidenav -->
 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
   <div class="scrollbar-inner">
     <!-- Brand -->
     <div class="sidenav-header  align-items-center">
       <a class="navbar-brand" href="javascript:void(0)">
         <img src="<?= base_url('assets/img/brand/blue.png" class="navbar-brand-img') ?>" alt="...">
       </a>
     </div>

     <input type="hidden" id="act_menu" value="<?= $this->uri->segment(1); ?>">

     <div class="navbar-inner">
       <!-- Collapse -->
       <div class="collapse navbar-collapse" id="sidenav-collapse-main">
         <!-- Nav items -->
         <ul class="navbar-nav">

           <li class="nav-item home">
             <a class="nav-link home" href="<?= site_url('home') ?>">
               <i class="ni ni-tv-2 text-primary"></i>
               <span class="nav-link-text">Dashboard</span>
             </a>
           </li>
           <li class="nav-item submission rc">
             <a class="nav-link submission" href="<?= site_url('submission') ?>">
               <i class="ni ni-send text-info"></i>
               <span class="nav-link-text">Pengajuan</span>
             </a>
           </li>
           <li class="nav-item submissionhist rc">
             <a class="nav-link submissionhist" href="<?= site_url('submissionhist') ?>">
               <i class="ni ni-book-bookmark text-warning"></i>
               <span class="nav-link-text">Riwayat Pengajuan</span>
             </a>
           </li>
           <li class="nav-item users rs">
             <a class="nav-link users" href="<?= site_url('users') ?>">
               <i class="ni ni-single-02 text-pink"></i>
               <span class="nav-link-text">Daftar User</span>
             </a>
           </li>
           <li class="nav-item assessment rs">
             <a class="nav-link assessment" href="<?= site_url('assessment') ?>">
               <i class="ni ni-ruler-pencil text-danger"></i>
               <span class="nav-link-text">Penilaian</span>
             </a>
           </li>
           <li class="nav-item assessmentresult rs">
             <a class="nav-link assessmentresult" href="<?= site_url('assessmentresult') ?>">
               <i class="ni ni-paper-diploma text-primary"></i>
               <span class="nav-link-text">Hasil Penilaian</span>
             </a>
           </li>
           <li class="nav-item submissionreport rm">
             <a class="nav-link submissionreport" href="<?= site_url('submissionreport') ?>">
               <i class="ni ni-money-coins text-green"></i>
               <span class="nav-link-text">Laporan Pengajuan</span>
             </a>
           </li>
           <li class="nav-item assessmentcriteria rs">
             <a class="nav-link assessmentcriteria" href="<?= site_url('assessmentcriteria') ?>">
               <i class="ni ni-settings-gear-65 text-danger"></i>
               <span class="nav-link-text">Kriteria Penilaian</span>
             </a>
           </li>
           <li class="nav-item item rs">
             <a class="nav-link item" href="<?= site_url('item') ?>">
               <i class="ni ni-app text-info"></i>
               <span class="nav-link-text">Daftar Barang</span>
             </a>
           </li>
         </ul>
       </div>
     </div>
   </div>
 </nav>