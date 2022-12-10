
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Kendaraan</h1>
                    <?= $this->session->flashdata('pesan'); ?>
                    <!-- <button type="button" class="btn btn-primary dropdown-toggle align-content-end" data-toggle="dropdown"><i class="icon-printer"></i> Export Data</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="kendaraan/export_data_excel">Export Excel</a>
                    </div> -->
                    <div class="row mt-3">
                        <div class="col-3">
                            <div class="card">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kendaraan</h6>
                                </div>
                                <div class="card-body">
                                    <form action="kendaraan/tambah_data" method="POST">
                                        <div class="form-group">
                                            <label for="nama_kendaraan">Nama Kendaraan</label>
                                            <input type="text" class="form-control" id="nama_kendaraan" name="nama_kendaraan" autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label for="plat_nomor">Plat Nomor</label>
                                            <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_jenis_kendaraan">Jenis Kendaraan</label>
                                            <select class="form-control" id="id_jenis_kendaraan" name="id_jenis_kendaraan" required>
                                                <?php foreach($jenis_kendaraan as $jenis) : ?>
                                                <option value="<?= $jenis['id_jenis_kendaraan']; ?>"><?= $jenis['jenis_kendaraan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_tipe_kendaraan">Tipe Kendaraan</label>
                                            <select class="form-control" id="id_tipe_kendaraan" name="id_tipe_kendaraan" required>
                                                <?php foreach($tipe_kendaraan as $tipe) : ?>
                                                <option value="<?= $tipe['id_tipe_kendaraan']; ?>"><?= $tipe['tipe_kendaraan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jumlah_konsumsi_bbm">Jumlah Konsumsi BBM</label>
                                            <input type="text" class="form-control" id="jumlah_konsumsi_bbm" name="jumlah_konsumsi_bbm" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="jadwal_servis">Jadwal Servis</label>
                                            <input type="date" class="form-control" id="jadwal_servis" name="jadwal_servis" required>
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
                                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Kendaraan</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kendaraan</th>
                                                <th>Plat Nomor</th>
                                                <th>Jenis Kendaraan</th>
                                                <th>Tipe Kendaraan</th>
                                                <th>Jumlah Konsumsi BBM</th>
                                                <th>Jadwal Servis</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                            <?php foreach($kendaraan as $row) : ?>
                                            <tr>
                                                <th><?= $no++; ?></th>
                                                <td><?= $row['nama_kendaraan']; ?></td>
                                                <td><?= $row['plat_nomor']; ?></td>
                                                <td><?= $row['jenis_kendaraan']; ?></td>
                                                <td><?= $row['tipe_kendaraan']; ?></td>
                                                <td><?= $row['jumlah_konsumsi_bbm']; ?> Liter</td>
                                                <td><?= $row['jadwal_servis']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editModal<?= $row['id']; ?>">Edit</button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal<?= $row['id']; ?>">Hapus</button>
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
            <?php foreach($kendaraan as $row) : ?>
            <div class="modal fade" id="editModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Kendaraan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="kendaraan/edit_data/<?= $row['id']; ?>" method="POST">
                        <input type="hidden" id="id" name="id" class="form-control input-default" value="<?= $row['id'] ?>">
                        <div class="form-group">
                            <label for="nama_kendaraan">Nama Kendaraan</label>
                            <input type="text" class="form-control" id="nama_kendaraan" name="nama_kendaraan" value="<?= $row['nama_kendaraan']; ?>" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="plat_nomor">Plat Nomor</label>
                            <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" value="<?= $row['plat_nomor']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="id_jenis_kendaraan">Jenis Kendaraan</label>
                            <select class="form-control" id="id_jenis_kendaraan" name="id_jenis_kendaraan" required>
                                <?php foreach($jenis_kendaraan as $jenis) : ?>
                                <option value="<?= $jenis['id_jenis_kendaraan']; ?>" <?php if ($jenis['id_jenis_kendaraan']==$row['id_jenis_kendaraan']) : ?>selected <?php endif; ?>><?= $jenis['jenis_kendaraan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_tipe_kendaraan">Tipe Kendaraan</label>
                            <select class="form-control" id="id_tipe_kendaraan" name="id_tipe_kendaraan" required>
                                <?php foreach($tipe_kendaraan as $tipe) : ?>
                                <option value="<?= $tipe['id_tipe_kendaraan']; ?>" <?php if ($tipe['id_tipe_kendaraan']==$row['id_tipe_kendaraan']) : ?>selected <?php endif; ?>><?= $tipe['tipe_kendaraan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_konsumsi_bbm">Jumlah Konsumsi BBM</label>
                            <input type="text" class="form-control" id="jumlah_konsumsi_bbm" name="jumlah_konsumsi_bbm" value="<?= $row['jumlah_konsumsi_bbm']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="jadwal_servis">Jadwal Servis</label>
                            <input type="date" class="form-control" id="jadwal_servis" name="jadwal_servis" value="<?= $row['jadwal_servis']; ?>" required>
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
            <?php foreach($kendaraan as $row) : ?>
            <div class="modal fade" id="hapusModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a href="kendaraan/hapus_data/<?= $row['id']; ?>" class="btn btn-primary">Hapus</a>
                </div>
                </div>
            </div>
            </div>
            <?php endforeach; ?>
