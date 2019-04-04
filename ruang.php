<!doctype html>
<html class="no-js" lang="en">
<?php 
include 'library/oop.php';
include 'controller/controller.php';
$perintah = new oop();
$table = "ruang";
@$ruang = $_POST['nama_ruang'];
@$kode = $_POST['kode_ruang'];
@$ket = $_POST['keterangan'];
session_start();
$isi = "id_ruang = '', nama_ruang = '$ruang', kode_ruang = '$kode', keterangan = '$ket'";
$form= "?form";
if(isset($_POST['simpan'])){
    $perintah->simpan($con,$table,$isi,$form);
}
if(isset($_GET['edit'])){
    $ruangan = $_GET['kode'];
    $where = "id_ruang = $ruangan";
    $query = "SELECT * FROM $table WHERE $where";
    $sql = mysqli_query($con,$query);
    $edit = mysqli_fetch_array($sql);
    // $perintah->edit($con,$table,$where);
}
if(isset($_POST['update'])){
    $kodes = $_GET['kode'];
    $isi = "nama_ruang = '$_POST[nama_ruang]', kode_ruang = '$_POST[kode_ruang]', keterangan = '$_POST[keterangan]'";
    $where = "id_ruang = $kodes";
    $perintah->update($con,$table,$isi,$where,$form);
}
// if(($_SESSION['id_petugas'] == '1')){
//     echo "<script>alert('Welcome')</script>";
// }else{
//     echo "<script>alert('Silahkan Login Sebagai Admin');document.location.href='index.php'</script>";
//     session_destroy();
// }
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>srtdash - ICO Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- amchart css -->
    <!-- <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" /> -->
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.php"><img src="assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i
                                        class="ti-dashboard"></i><span>dashboard</span></a>
                                <ul class="collapse">
                                    <li class=""><a href="jenis.php">Jenis</a></li>
                                    <li class="active"><a href="ruang.php">Ruang</a></li>
                                    <li class=""><a href="inventaris.php">Inventaris</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true">
                                    <i class="ti-paper"></i><span>Report</span>
                                </a>
                                <ul class="colapse">
                                    <li class=""><a href="masuk.php">Report Masukan Barang</a></li>
                                    <li class=""><a href="pinjam.php">Report Pinjam Barang</a></li>   
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
        <form action="" method="POST">
            <!-- header area start -->

            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard Administrator</h4>
                            <ul class="bread crumbs pull-left">
                                <li><a href="?home">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
                                <!-- <?php echo $_SESSION['name']?>     -->
                            <i
                                    class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                            <a href="index.php" onclick="return confirm('yakin ingin logout?') <?php session_destroy();?>">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                
                    <!-- Table Input-->
                    <br>
                    <div class="card">
                        <div class="card-header">
                            Input Jenis
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Jenis</h5>
                            <table class="table table-bordered">
                                <thead class="thead-light">

                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Nama Ruang</span>
                                                </div>
                                                <input class="form-control" type="text" placeholder="Nama Ruang"
                                                    aria-label="Nama Ruang" value="<?php echo @$edit[1]?>" name="nama_ruang" required>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Kode Ruang</span>
                                                </div>
                                                <input class="form-control" type="text" placeholder="Kode Ruang"
                                                    aria-label="Kode Ruang" value="<?php echo @$edit['kode_ruang']?>" name="kode_ruang" required>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Keterangan</span>
                                                </div>
                                                <input class="form-control" type="text" value="<?php echo @$edit['keterangan']?>" placeholder="Keterangan"
                                                    aria-label="keterangan" name="keterangan" require>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <td>
                                        <?php if(@$_GET['kode'] == ""){?>
                                        <input type="submit" class="form-control btn btn-success" name="simpan" id="" value="Save">
                                        <?php }else{?>
                                        <input type="submit" class="form-control btn btn-success" name="update" value="Update">
                                        <?php } ?>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <br>
                    <!-- data -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Daftar Jenis</h5>
                            <div class="data-tables datatable-primary">
                            <table class="table" id="dataTable">   
                                    <th>
                                    <td>ID Jenis</td>
                                    <td>Nama Ruang</td>
                                    <td>Kode Ruang</td>
                                    <td>Keterangan</td>
                                    <td>Action</td>
                                    </th>
                                <tbody>
                                    <?php
                                    $field = $perintah->tampil($con,$table);
                                    foreach($field as $data){
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td><?php echo $data[0]?></td>
                                        <td><?php echo $data[1]?></td>
                                        <td><?php echo $data[2]?></td>
                                        <td><?php echo $data[3]?></td>
                                        <td>
                                            <a href="?edit&kode='<?php echo $data[0]?>'">Update</a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- main content area end -->

            <!-- footer area start-->
            <footer>
                <div class="footer-area">
                    <p>© Copyright 2019. All right reserved. Template by <a
                            href="https://colorlib.com/wp/">Colorlib</a>.</p>
                </div>
            </footer>
            <!-- footer area end-->
        </div>
        <!-- page container area end -->
        <!-- offset area start -->

        <!-- offset area end -->
        <!-- jquery latest version -->
        <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
        <!-- bootstrap 4 js -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>
        <script src="assets/js/jquery.slicknav.min.js"></script>

        <!-- all line chart activation -->
        <script src="assets/js/line-chart.js"></script>
        <!-- all pie chart -->
        <script src="assets/js/pie-chart.js"></script>
        <!-- others plugins -->
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/scripts.js"></script>
        
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
</body>
</html>