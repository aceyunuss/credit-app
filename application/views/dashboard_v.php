<?php if($role == "Konsumen"){ ?>
<div class="row">
  <div class="col-xl-12 col-md-12">
    <div class="card card-stats">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h1 class="card-title text-uppercase text-muted mb-0">CV GEMILANG JAYA ELEKTRONIK</h1>
          </div>
        </div>
        <p class="mt-3 mb-0 text-sm">
          <h4 class="text-nowrap">Jl. Tebet Timur Dalam Raya No.57, RT.8/RW.11, Tebet Tim., Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12820</h4>
        </p>
      </div>
    </div>
  </div>
</div>
<?php } else { ?>
<div class="row">
  <div class="col-xl-3 col-md-6">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Total Pengguna</h5>
            <span class="h2 font-weight-bold mb-0"><?= $usr ?></span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
              <i class="ni ni-single-02"></i>
            </div>
          </div>
        </div>
        <p class="mt-3 mb-0 text-sm">
          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?= round($today_user / $usr * 100) ?>%</span>
          <span class="text-nowrap">Pengguna baru</span>
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Total Pengajuan</h5>
            <span class="h2 font-weight-bold mb-0"><?= $sub ?></span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
              <i class="ni ni-send"></i>
            </div>
          </div>
        </div>
        <p class="mt-3 mb-0 text-sm">
          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?= (!empty($apr) || !empty($rjc) || !empty($sub))  ? round(($apr + $rjc) / $sub * 100) : 0 ?>%</span>
          <span class="text-nowrap">Pengajuan selesai</span>
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Pengajuan Disetujui</h5>
            <span class="h2 font-weight-bold mb-0"><?= $apr ?></span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
              <i class="ni ni-money-coins"></i>
            </div>
          </div>
        </div>
        <p class="mt-3 mb-0 text-sm">
          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?= (!empty($apr) || !empty($rjc) ) ? round($apr / ($apr + $rjc) * 100) : 0 ?>%</span>
          <span class="text-nowrap">Pengajuan disetujui</span>
        </p>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-md-6">
    <div class="card card-stats">
      <!-- Card body -->
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Pengajuan Ditolak</h5>
            <span class="h2 font-weight-bold mb-0"><?= $rjc ?></span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
              <i class="ni ni-air-baloon"></i>
            </div>
          </div>
        </div>
        <p class="mt-3 mb-0 text-sm">
          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?= (!empty($apr) || !empty($rjc) || !empty($sub))  ? round($rjc / ($apr + $rjc) * 100) : 0 ?>%</span>
          <span class="text-nowrap">Pengajuan ditolak</span>
        </p>
      </div>
    </div>
  </div>
</div>

<?php } ?>
<div class="row">
  <?php foreach($item as $k => $v){ ?>
    <div class="col-xl-4">
      <div class="card" style="width: 18rem;">
        <center>
        <img style="max-height:200px; max-width: 250px; height: 200px; width: 250x;" class="card-img-top" src="<?= base_url('assets/img/items/'.$v['pict']) ?>">
      </center>
        <div class="card-body">
          <h5 class="card-title"><?= $v['name'] ?></h5>
        </div>
      </div>
    </div>
<?php } ?>


</div>