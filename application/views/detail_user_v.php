<div class="row">
  <div class="col-xl-4 order-xl-2">
    <div class="card card-profile">
      <img src="<?= base_url('assets/img/theme/img-1-1000x600.jpg') ?>" alt="Image placeholder" class="card-img-top">
      <div class="row justify-content-center">
        <div class="col-lg-3 order-lg-2">
          <div class="card-profile-image">
            <a href="#">
              <img src="<?= base_url('assets/img/theme/default-pict.jpg') ?>" class="rounded-circle">
            </a>
          </div>
        </div>
      </div>
      <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
        <div class="d-flex justify-content-between">
        </div>
      </div>
      <div class="card-body pt-0">
        <div class="row">
          <div class="col">
            <div class="card-profile-stats d-flex justify-content-center">
              <div>
                <span class="heading text-success"><?= $apr ?></span>
                <span class="description">Disetujui</span>
              </div>
              <div>
                <span class="heading text-primary"><?= $sub ?></span>
                <span class="description">Pengajuan</span>
              </div>
              <div>
                <span class="heading text-danger"><?= $rjc ?></span>
                <span class="description">Ditolak</span>
              </div>
            </div>
          </div>
        </div>
        <div class="text-center">
          <h5 class="h2"> <?= $usr['fullname'] ?> </h5>
          <div class="h5 badge badge-<?= $usr['role'] == 'Konsumen' ? 'primary' : 'success' ?>">
            <?= $usr['role'] ?>
          </div>
          <div class="h5 mt-4">
            Terdaftar sejak <?= substr($usr['created_date'], 0, 10) ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-8 order-xl-1">
    <div class="card">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="mb-0">Profil</h3>
          </div>
        </div>
      </div>
      <div class="card-body">

        <div class="pl-lg-5">
          <div class="row">
            <div class="col-lg-11">
              <div class="form-group">
                <label class="form-control-label" for="input-username">Nama</label>
                <p><?= $usr['fullname'] ?> </p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-11">
              <div class="form-group">
                <label class="form-control-label" for="input-email">Email</label>
                <p><?= $usr['email'] ?> </p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-11">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">No Telp</label>
                <p><?= $usr['phone'] ?> </p>
              </div>
            </div>
          </div>

          <!-- <div class="row">
            <div class="col-lg-11">
              <div class="form-group">
                <label class="form-control-label" for="input-last-name">Alamat</label>
                <p><?= $usr['address'] ?> </p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-11">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">Tanggal Lahir</label>
                <p><?= substr($usr['birthdate'], 0, 10) ?></p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-11">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">Jenis Kelamin</label>
                <p><?= $usr['gender'] == "m" ? "Laki-laki" : "Perempuan" ?> </p>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</div>