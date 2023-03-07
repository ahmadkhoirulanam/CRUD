<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <h1>Hello, world!</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Asal</th>
            </tr>
        </thead>
        <tbody>
           <?php
            include 'koneksi.php';
            $sql = "SELECT * FROM mahasiswa";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $no_urut = 0;
                while ($row = $result->fetch_assoc()){
                    $no_urut++
                ?>
                <tr>
                    <td>
                    <?php echo $no_urut;?>
                    </td>
                    <td>
                        <?php echo $row["nama"];?>
                    </td>
                    <td>
                        <?php echo $row["asal"];?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>