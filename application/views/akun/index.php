
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Akun</h1>
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="row mt-3">
                        <div class="col-3">
                            <div class="card">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Akun</h6>
                                </div>
                                <div class="card-body">
                                    <form action="akun/tambah_data" method="POST">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_departemen">Departemen</label>
                                            <select class="form-control" id="id_departemen" name="id_departemen" required>
                                                <?php foreach($departemen as $dprtmn) : ?>
                                                <option value="<?= $dprtmn['id_departemen']; ?>"><?= $dprtmn['departemen']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_role">User Role</label>
                                            <select class="form-control" id="id_role" name="id_role" required>
                                                <?php foreach($user_role as $role) : ?>
                                                <option value="<?= $role['id_role']; ?>"><?= $role['role']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- DataTales Example -->
                        <div class="col-9">
                            <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Akun</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Departemen</th>
                                                <th>Role</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(empty($akun)) : ?>
                                            <tr>
                                                <td colspan="14">
                                                <div class="alert alert-danger text-center">Data tidak ditemukan!!</div>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                            <?php $no=1; ?>
                                            <?php foreach($akun as $row) : ?>
                                            <tr>
                                                <th><?= $no++; ?></th>
                                                <td><?= $row['nama']; ?></td>
                                                <td><?= $row['username']; ?></td>
                                                <td><?= $row['departemen']; ?></td>
                                                <td><?= $row['role']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal<?= $row['id_user']; ?>">Edit</button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal<?= $row['id_user']; ?>">Hapus</button>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Modal Edit-->
            <?php foreach($akun as $row) : ?>
            <div class="modal fade" id="editModal<?= $row['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Kendaraan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="kendaraan/edit_data/<?= $row['id_user']; ?>" method="POST">
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
                </div>
            </div>
            </div>
            <?php endforeach; ?>

            <!-- Modal Hapus-->
            <?php foreach($akun as $row) : ?>
            <div class="modal fade" id="hapusModal<?= $row['id_user']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-danger">
                    Anda ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <a href="akun/hapus_data/<?= $row['id_user']; ?>" class="btn btn-primary">Hapus</a>
                </div>
                </div>
            </div>
            </div>
            <?php endforeach; ?>
