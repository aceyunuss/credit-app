<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Data Pengguna Aplikasi</h3>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr align="center">
              <th scope="col">Aksi</th>
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">No Telp</th>
              <th scope="col">Role</th>
              <th scope="col">Tanggal Daftar</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ((array)$list_user as $key => $value) {
              $bdg = $value['role'] == "Konsumen" ? "primary" : "success";
            ?>
              <tr>
                <td align="center">
                  <a class="btn btn-sm btn-info" href="<?= site_url('users/detail/' . $value['id']) ?>">Lihat</a>
                </td>
                <th scope="row"><?= $value['fullname'] ?></th>
                <td><?= $value['email'] ?></td>
                <td><?= $value['phone'] ?></td>
                <td align="center">
                  <div class="badge badge-<?= $bdg ?>"><?= $value['role'] ?></div>
                </td>
                <td align="center"><?= $value['created_date'] ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>