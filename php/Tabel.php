<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- datatables -->
    <link href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="../Style/Tabel.css">

    <title>Data Table</title>
</head>
<body>



    <div class="card-shadow">
        <h1 class="header">Data Laptop</h1>
        <a href="index.php" class="beranda">Beranda</a>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Company</th>
                    <th>Product</th>
                    <th>System</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
            <?php
$conn = mysqli_connect("localhost", "root", "", "haninin_store");
$q = mysqli_query($conn, "SELECT * FROM dataset_laptop_new");
$no = 0;
while ($data = mysqli_fetch_array($q)) {
    $no++;
    ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$data['company']?></td>
                    <td><?=$data['product']?></td>
                    <td><?=$data['os']?></td>
                    <td><?=$data['price']?></td>
                    <td><?=$data['quantity']?></td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>


    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>
</html>