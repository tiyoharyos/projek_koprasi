<?php
$db = dbConnect();
date_default_timezone_set('Asia/Jakarta'); // Mengatur zona waktu ke Asia/Jakarta (Waktu Indonesia Barat)
if ($db->connect_errno == 0) {
    $jumlahItemPerHalaman = 10;
    $halamanSaatIni = isset($_GET['halaman']) ? $_GET['halaman'] : 1;

    $offset = ($halamanSaatIni - 1) * $jumlahItemPerHalaman;

    $queryTotalItem = "SELECT COUNT(*) as total FROM tbl_berita";
    $resultTotalItem = mysqli_query($db, $queryTotalItem);
    $rowTotalItem = mysqli_fetch_assoc($resultTotalItem);
    $totalItem = $rowTotalItem['total'];
    $totalHalaman = ceil($totalItem / $jumlahItemPerHalaman);
?>
    <div class="d-flex flex-column flex-lg-row mb-4">
        <div class="flex-grow-1 d-flex align-items-center">
            <h3>berita</h3>
        </div>
        <!-- breadcrumbs -->
        <div class="ms-5 ms-lg-0 pt-lg-2">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="" target="_blank" class="btn btn-outline-brand" data-toggle="modal" data-target="#tambahdata"><i class="fas fa-plus-circle" &nbsp></i> Tambah Data</a>
                    </div>
                </ol>
            </nav>
        </div>
    </div>

    <div class="bg-white rounded-4 shadow-sm p-4 mb-5">
        <div class="row  ">
            <!-- Modal Tambah Data-->
            <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Berita</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="views/berita/beritasimpan.php" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Judul Berita</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="judul" require>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Deskripsi Berita</label>
                                    <input type="textarea" class="form-control" id="exampleInputPassword1" name="deskripsi" require>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Penulis</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" name="penulis" require>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tempat</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp" name="tempat" require>
                                </div>
                                <div id="imagePreview" class="mb-3">
                                    <img src="https://cdn.discordapp.com/attachments/1077943381277298789/1101098067962376202/Empty_State.png" id="preview" class="img-thumbnail">
                                    <input type="file" name="gambar" class="form-control" id="formFile" onchange="updatePreview('formFile', 'preview')">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <input type="submit" class="btn btn-primary" name="TblSimpan" value="Tambah Data"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir modal -->
        </div>
        <br>

        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Judul</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Tempat</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM tbl_berita LIMIT $offset, $jumlahItemPerHalaman";
                    $res = $db->query($sql);

                    if ($res) {

                        $data = $res->fetch_row();
                        do {
                            list($id, $judul, $deskripsi, $penulis, $tempat, $tanggal, $jam, $gambar) = $data;
                            $date = date_create($tanggal);
                            $waktu = date("H:i", strtotime($jam));
                    ?>
                            <tr>
                                <td><?= $judul ?></td>
                                <td><?= $deskripsi ?></td>
                                <td><?= $penulis ?></td>
                                <td><?= $tempat ?></td>
                                <td><?= date_format($date, "d-m-Y") ?></td>
                                <td><?= $waktu ?></td>
                                <!-- <td><img src="<?= $gambar ?>" width="200" height="200" alt=""></td> -->
                                <td>


                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?= $id ?>">
                                        <i class="fas fa-pen-square"></i>
                                    </button>


                                    <button id="hapus-<?= $id ?>" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $id ?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="exampleModal<?= $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus berita</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="views/berita/beritahapus.php">
                                                        <input type="hidden" name="id" value="<?php echo $id ?>">
                                                        <div class="modal-body">
                                                            anda yakin untuk hapus berita ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tidak</button>
                                                            <input type="submit" name="TblHapus" class="btn btn-danger" value="Hapus" />
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        </div>
        </td>
        </tr>

        <!-- Modal edit data-->
        <div class="modal fade" id="edit<?= $id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Berita</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="views/berita/beritaupdate.php" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $id ?>" id="id">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Judul Berita</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="judul" value="<?= $judul ?>" require>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Deskripsi Berita</label>
                                <input type="textarea" class="form-control" id="exampleInputPassword1" name="deskripsi" value="<?= $deskripsi ?>" require>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Penulis</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="penulis" value="<?= $penulis ?>" require>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tempat</label>
                                <input type="text" class="form-control" aria-describedby="emailHelp" name="tempat" value="<?= $tempat ?>" require>
                            </div>
                            <div id="imagePreviewEdit<?= $id ?>" class="mb-3">
                                <img src="<?= $gambar ?>" id="previewEdit<?= $id ?>" class="img-thumbnail">
                                <input type="file" name="gambar" class="form-control" id="formFileEdit<?= $id ?>" onchange="updatePreview('formFileEdit<?= $id ?>', 'previewEdit<?= $id ?>')">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <input type="submit" class="btn btn-primary" name="TblUpdate" value="Update Data"></input>
                            </div>
                        </form>
                    </div>
                    </tbody>

                <?php
                        } while ($data = $res->fetch_row());
                ?>
                </table>
                <div class="row">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php for ($i = 1; $i <= $totalHalaman; $i++) { ?>
                                <li class="page-item"><a class="page-link" href="?module=berita&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $db->error; ?>

<?php
                        $res->free();
                    } else
                        echo "<div style='color: white'>Gagal Eksekusi SQL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br></div>";
                } else
                    echo "<div style='color: white'>Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br></div>";

?>
<script>
    function updatePreview(elementId, previewId) {
        var fileInput = document.getElementById(elementId);
        var previewImage = document.getElementById(previewId);

        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function(e) {
            previewImage.src = e.target.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>