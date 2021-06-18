<div class="row">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-header border-0">
        <div class="row align-items-center">
          <div class="col">
            <h3 class="mb-0">Users</h3>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center table-flush">
          <thead class="thead-light">
            <tr align="center">
              <th scope="col">Nama</th>
              <th scope="col">Email</th>
              <th scope="col">No Telp</th>
              <th scope="col">Role</th>
              <th scope="col">Tanggal Daftar</th>
            </tr>
          </thead>
          <tbody>

            <?php foreach ((array)$list_user as $key => $value) { ?>
              <tr>
                <th scope="row"><?= $value['fullname'] ?></th>
                <td><?= $value['email'] ?></td>
                <td><?= $value['phone'] ?></td>
                <td align="center">
                  <div class="badge badge-primary"><?= $value['role'] ?></div>
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