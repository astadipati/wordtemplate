<!DOCTYPE html>
<html>
<head>
<title>Tutorial PHP Datatables Dengan PHP Dan MySQL</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" /> -->
    <link rel="stylesheet" href="static/css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>

<table id="tabel-data" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Job Title</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
        include("config.php");

        $employee = mysqli_query($db,"select * from perkara_banding");
        while($row = mysqli_fetch_array($employee))
        {
            echo "<tr>
            <td>".$row['perkara_id']."</td>
            <td>".$row['nomor_perkara_pn']."</td>
            <td>".$row['putusan_pn']."</td>
            <td>".$row['permohonan_banding']."</td>
            <td>
            <a href='data.php?id=".$row['perkara_id']."'>Cetak</a>
            </td>
        </tr>";
        }
    ?>
    </tbody>

    <script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>

</table>
</body>
</html>