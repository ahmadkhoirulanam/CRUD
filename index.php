<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h1>Hello, world!</h1>
        <table class="table table-bordered">
            <thead>
                <tr class="bg-danger">
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Asal</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';
                $sql = "SELECT * FROM mahasiswa";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $no_urut = 0;
                    while ($row = $result->fetch_assoc()) {
                        $no_urut++
                ?>
                        <tr>
                            <td>
                                <?php echo $no_urut; ?>
                            </td>
                            <td>
                                <?php echo $row["nama"]; ?>
                            </td>
                            <td>
                                <?php echo $row["asal"]; ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row["id"]; ?>">
                                    Edit
                                </button>
                                <div class="modal fade" id="exampleModal<?php echo $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <form method="post" action="<?php echo baseurl("angket-action.php"); ?>">
                                                    <input type="text" class="form-control" id="nama" placeholder="tuliskan nama anda" value="<?php echo $row["id"]; ?>" name="id">
                                                    <div class="mb-3">
                                                        <label for="nama" class="form-label">Nama Anda</label>
                                                        <input type="text" class="form-control" id="nama" placeholder="tuliskan nama anda" value="<?php echo $row["nama"]; ?>" name="nama">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="asal" class="form-label">Asal Anda</label>
                                                        <input type="text" class="form-control" id="asal" placeholder="tuliskan asal anda" value="<?php echo $row["asal"]; ?>" name="asal">
                                                    </div>
                                                    <br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" name="edit-user">Edit Pengguna</button>
                                                    </div>
                                                </form>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $row["id"]; ?>">
                                    Hapus
                                </button>
                                <div class="modal fade" id="hapus<?php echo $row["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <form method="post" action="<?php echo baseurl("angket-action.php"); ?>">
                                                    <input type="text" class="form-control" id="nama" placeholder="tuliskan nama anda" value="<?php echo $row["id"]; ?>" name="id">
                                                    

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" name="delete-user">Hapus Pengguna</button>
                                                    </div>
                                                </form>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "data kosong";
                }

                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>