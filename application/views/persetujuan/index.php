
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Persetujuan</h1>
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="row mt-3">
                        <div class="card shadow col-lg-12 mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Persetujuan</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Pemesanan</th>
                                                <th>Tanggal Pemesanan</th>
                                                <th>Nama Kendaraan</th>
                                                <th>Status Pemesanan</th>
                                                <th width="200px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                            <?php foreach($persetujuan as $row) : ?>
                                            <tr>
                                                <th><?= $no++; ?></th>
                                                <td><?= $row['kode_pemesanan']; ?></td>
                                                <td><?= $row['tanggal_pemesanan']; ?></td>
                                                <td><?= $row['nama_kendaraan']; ?></td>
                                                <td><span class="badge badge-info"><?= $row['status_pemesanan']; ?></span></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#setujuModal<?= $row['id_pemesanan']; ?>">Setuju</button>
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php foreach($persetujuan as $row) : ?>
            <div class="modal fade" id="setujuModal<?= $row['id_pemesanan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda ingin menyetujui pesanan ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <a href="persetujuan/edit_data/<?= $row['id_pemesanan']; ?>" class="btn btn-primary">Simpan</a>
                </div>
                </div>
            </div>
            </div>
            <?php endforeach; ?>