
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Pemesanan</h1>
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="row mt-3">
                        <!-- DataTales Example -->
                        <div class="col-12">
                            <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#tambahModal">
                            Tambah Pesanan
                            </button>
                            <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pemesanan</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Pemesanan</th>
                                                <th>Tanggal Pemesanan</th>
                                                <th>Nama Pemesan</th>
                                                <th>Departemen Pemesan</th>
                                                <th>No HP</th>
                                                <th>Nama Kendaraan</th>
                                                <th>Drive</th>
                                                <th>Status Pemesanan</th>
                                                <th width="200px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                            <?php foreach($pemesanan as $row) : ?>
                                            <tr>
                                                <th><?= $no++; ?></th>
                                                <td><?= $row['kode_pemesanan']; ?></td>
                                                <td><?= $row['tanggal_pemesanan']; ?></td>
                                                <td><?= $row['nama_pemesan']; ?></td>
                                                <td><?= $row['departemen']; ?></td>
                                                <td><?= $row['no_handphone']; ?></td>
                                                <td><?= $row['nama_kendaraan']; ?></td>
                                                <td><?= $row['driver']; ?></td>
                                                <td><span class="badge badge-info"><?= $row['status_pemesanan']; ?></span></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal<?= $row['id_pemesanan']; ?>">Edit</button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal<?= $row['id_pemesanan']; ?>">Hapus</button>
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

            <!-- Modal Tambah-->
            <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pesanan Kendaraan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="pemesanan/tambah_data" method="post">
                        <div class="form-group">
                            <label for="kode_pemesanan">Kode Pemesanan</label>
                            <input type="text" class="form-control" id="kode_pemesanan" name="kode_pemesanan" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
                            <input type="date" class="form-control" id="tanggal_pemesanan" name="tanggal_pemesanan" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_pemesan">Nama Pemesan</label>
                            <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" required>
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
                            <label for="no_handphone">Nomor HP</label>
                            <input type="text" class="form-control" id="no_handphone" name="no_handphone" required>
                        </div>
                        <div class="form-group">
                            <label for="id">Nama Kendaraan</label>
                            <select class="form-control" id="id" name="id" required>
                                <?php foreach($kendaraan as $kndrn) : ?>
                                <option value="<?= $kndrn['id']; ?>"><?= $kndrn['nama_kendaraan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="driver">Driver</label>
                            <input type="text" class="form-control" id="driver" name="driver" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
            </div>

            <!-- Modal Edit-->
            <?php foreach($pemesanan as $row) : ?>
            <div class="modal fade" id="editModal<?= $row['id_pemesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Kendaraan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="pemesanan/edit_data/<?= $row['id_pemesanan']; ?>" method="POST">
                        <input type="hidden" id="id_pemesanan" name="id_pemesanan" class="form-control input-default" value="<?= $row['id_pemesanan'] ?>">
                        <input type="hidden" id="id_status_pemesanan" name="id_status_pemesanan" class="form-control input-default" value="<?= $row['id_status_pemesanan'] ?>">
                        <div class="form-group">
                            <label for="kode_pemesanan">Kode Pemesanan</label>
                            <input type="text" class="form-control" id="kode_pemesanan" name="kode_pemesanan" value="<?= $row['kode_pemesanan']; ?>" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pemesanan">Tanggal Pemesanan</label>
                            <input type="date" class="form-control" id="tanggal_pemesanan" name="tanggal_pemesanan" value="<?= $row['tanggal_pemesanan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_pemesan">Nama Pemesan</label>
                            <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" value="<?= $row['nama_pemesan']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="id_departemen">Departemen</label>
                            <select class="form-control" id="id_departemen" name="id_departemen" required>
                                <?php foreach($departemen as $dprtmn) : ?>
                                <option value="<?= $dprtmn['id_departemen']; ?>" <?php if ($dprtmn['id_departemen']==$row['id_departemen']) : ?>selected <?php endif; ?>><?= $dprtmn['departemen']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_handphone">Nomor HP</label>
                            <input type="text" class="form-control" id="no_handphone" name="no_handphone" value="<?= $row['no_handphone']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="id">Nama Kendaraan</label>
                            <select class="form-control" id="id" name="id" required>
                                <?php foreach($kendaraan as $kndrn) : ?>
                                <option value="<?= $kndrn['id']; ?>" <?php if ($kndrn['id']==$row['id']) : ?>selected <?php endif; ?>><?= $kndrn['nama_kendaraan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="driver">Driver</label>
                            <input type="text" class="form-control" id="driver" name="driver" value="<?= $row['driver']; ?>" required>
                        </div>
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
            <?php foreach($pemesanan as $row) : ?>
            <div class="modal fade" id="hapusModal<?= $row['id_pemesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a href="pemesanan/hapus_data/<?= $row['id_pemesanan']; ?>" class="btn btn-primary">Hapus</a>
                </div>
                </div>
            </div>
            </div>
            <?php endforeach; ?>
