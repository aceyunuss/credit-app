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
          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?= round(($apr + $rjc) / $sub * 100) ?>%</span>
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
          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?= round($apr / ($apr + $rjc) * 100) ?>%</span>
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
          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?= round($rjc / ($apr + $rjc) * 100) ?>%</span>
          <span class="text-nowrap">Pengajuan ditolak</span>
        </p>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-xl-8">
    <div class="card">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Page visits</h3>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr>
              <th scope="col">Page name</th>
              <th scope="col">Visitors</th>
              <th scope="col">Unique users</th>
              <th scope="col">Bounce rate</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">
                /argon/
              </th>
              <td>
                4,569
              </td>
              <td>
                340
              </td>
              <td>
                <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
              </td>
            </tr>
            <tr>
              <th scope="row">
                /argon/index.html
              </th>
              <td>
                3,985
              </td>
              <td>
                319
              </td>
              <td>
                <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%
              </td>
            </tr>
            <tr>
              <th scope="row">
                /argon/charts.html
              </th>
              <td>
                3,513
              </td>
              <td>
                294
              </td>
              <td>
                <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%
              </td>
            </tr>
            <tr>
              <th scope="row">
                /argon/tables.html
              </th>
              <td>
                2,050
              </td>
              <td>
                147
              </td>
              <td>
                <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%
              </td>
            </tr>
            <tr>
              <th scope="row">
                /argon/profile.html
              </th>
              <td>
                1,795
              </td>
              <td>
                190
              </td>
              <td>
                <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-xl-4">
    <div class="card">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Pengguna Terbaru</h3>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr align="center">
              <th scope="col">Nama Pengguna</th>
              <th scope="col">Waktu Bergabung</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($new_user as $key => $value) { ?>
              <tr>
                <td><?= $value['fullname'] ?></td>
                <td align="center"><?= $value['created_date'] ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>