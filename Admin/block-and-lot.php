<?php 
if(!isset($_SESSION)){
    session_start();    
}
include("../config.php");
$con = connect();

if(isset($_SESSION["username"])){
    // Fetch sites with total blocks and lots in one query
    $sites = $con->query("
        SELECT s.site_id, s.site_name, s.site_sqm2, 
               COUNT(DISTINCT b.block_id) AS total_blocks, 
               COUNT(DISTINCT l.lot_id) AS total_lots
        FROM tbl_sites s
        LEFT JOIN tbl_blocks b ON s.site_id = b.site_id
        LEFT JOIN tbl_lots l ON b.block_id = l.block_id
        GROUP BY s.site_id
    ");

    // Fetch blocks with their respective site names
    $blocks = $con->query("
        SELECT b.block_id, b.block_name, b.sector, s.site_name, b.total_lots 
        FROM tbl_blocks b
        INNER JOIN tbl_sites s ON b.site_id = s.site_id
    ");

    // Fetch lots with their respective block and site names
    $lots = $con->query("
        SELECT l.lot_id, l.lot_name, s.site_name, b.block_name, b.sector, l.lawn_type 
        FROM tbl_lots l
        INNER JOIN tbl_blocks b ON l.block_id = b.block_id
        INNER JOIN tbl_sites s ON l.site_id = s.site_id
    ");

    // Update total lots in blocks
    $con->query("
        UPDATE tbl_blocks b
        SET total_lots = (
            SELECT COUNT(*) FROM tbl_lots l WHERE l.block_id = b.block_id
        )
    ");

} else {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../Assets/image/logopngplain.png" type="image/x-icon">
    <title>Divine Life Memorial Park</title>
    <link rel="stylesheet" type="text/css" href="../Assets/DataTables/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../Assets/css/index_admin.css">
    
    <script src="../Assets/js/sweetalert.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php include("queries/block_and_lot.php");?>
    <div class="sidebar close">
        <div class="logo-details">
            <img src="../Assets/image/logopngplain.png" alt="">
        </div>
        <ul class="nav-links">
            <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Dashboard">
                <a href="dashboard.php">
                    <i class='bx bx-grid-alt bx-rotate-180'></i>
                    <span class="link_name">Dashboard</span>
                </a>
            </li>
            <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Customer">
                <a href="customer.php">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Customer</span>
                </a>
            </li>
            <li class="tabs active" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Block & Lot Setup">
                <a href="block-and-lot.php">
                    <i class='bx bx-layer'></i>
                    <span class="link_name">Block & Lot Setup</span>
                </a>
            </li>
            <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Interment Setup">
                <a href="interment_Setup.php">
                    <i class='bx bxs-user-rectangle'></i>
                    <span class="link_name">Interment Setup</span>
                </a>
            </li>
            <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Grave Map">
                <a href="grave-map.php">
                    <i class='bx bx-map-alt'></i>
                    <span class="link_name">Grave Map</span>
                </a>
            </li>
            <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Slideshow">
                <a href="slideshow.php">
                    <i class='bx bx-carousel'></i>
                    <span class="link_name">Slideshow</span>
                </a>
            </li>
            <li class="tabs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="News & Events">
                <a href="news-events.php">
                    <i class='bx bx-news'></i>
                    <span class="link_name">News & Events</span>
                </a>
            </li>
        </ul>
        <button id="logout" data-username="<?php echo  $_SESSION["username"] ?>">
            <div class="admin-content">
                <div class="admin d-flex align-items-center">
                    <div class="admin-details ">
                        <i class='bx bx-log-out-circle' style="cursor: pointer"></i>
                        <div class="admin-label">
                            Logout
                        </div>
                    </div>
                </div>
            </div>
        </button>
    </div>
    <div class="notif"></div>
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
        </div>
        <div class="main-container">
            <div class="content active">
                <div class="div-content">
                    <h2 class="title-head d-flex align-items-center">
                        <i class='bx bxs-layer fs-1'></i>
                        &nbsp;BLOCK AND LOT SETUP</h2>
                    <hr>
                    <div class="row mb-4 p-0">
                        <div class="col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link text-dark d-flex align-items-center block-setup" id="sites-tab" data-bs-toggle="tab" data-bs-target="#sites" type="button" role="tab" aria-controls="sites" aria-selected="true">
                                                <i class='bx bx-sitemap fs-5'></i>
                                                &nbsp;Garden Sites
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link text-dark d-flex align-items-center block-setup" id="blocks-tab" data-bs-toggle="tab" data-bs-target="#blocks" type="button" role="tab" aria-controls="blocks" aria-selected="false">
                                                <i class='bx bxs-cube-alt fs-5'></i>
                                                &nbsp;Blocks
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link text-dark d-flex align-items-center block-setup" id="lots-tab" data-bs-toggle="tab" data-bs-target="#lots" type="button" role="tab" aria-controls="lots" aria-selected="false">
                                                <i class='bx bxs-grid fs-5'></i>
                                                &nbsp;Lots
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane" id="sites" role="tabpanel" aria-labelledby="sites-tab">
                                            <div class="head">
                                                <div class="row p-0">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="bg-white p-3 h-100 rounded">
                                                            <div class="title-header bg-white sticky-top p-3 d-flex">
                                                                <h5 class="d-flex align-items-center">
                                                                    <i class='bx bx-sitemap fs-3'></i>
                                                                    &nbsp;List of Garden Sites</h5>
                                                                <button class="btn btn-primary add-customer d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#add-site">
                                                                    <i class='bx bx-plus fs-4'></i> 
                                                                    &nbsp;New Site
                                                                </button>
                                                            </div> 
                                                            <br>
                                                            <div class="site">
                                                                <table class="table table-striped table-bordered w-100" id="tbl-site-info">
                                                                    <thead class="tbl-header text-light">
                                                                        <th>#</th>
                                                                        <th>Sites</th>
                                                                        <th>Square Meter</th>
                                                                        <th>Total Blocks</th>
                                                                        <th>Total Lots</th>
                                                                        <th>Action</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php while($row=$sites->fetch_array()){?>
                                                                            <tr>
                                                                                <td class="align-middle"><?php echo $row["site_id"] ?></td>
                                                                                <td class="align-middle"><?php echo $row["site_name"] ?></td>
                                                                                <td class="align-middle"><?php echo $row["site_sqm2"] ?></td>
                                                                                <td class="align-middle"><?php echo $row["total_blocks"] ?></td>
                                                                                <td class="align-middle"><?php echo $row["total_lots"] ?></td>
                                                                                <td class="align-middle text-center">
                                                                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit-site-<?php echo $row["site_id"]?>">
                                                                                        <i class='bx bxs-edit'></i>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                        <?php }?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="blocks" role="tabpanel" aria-labelledby="blocks-tab">
                                            <div class="head">
                                                <div class="row p-0">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="bg-white p-3 h-100 rounded">
                                                            <div class="title-header bg-white sticky-top p-3 d-flex">
                                                                <h5 class="d-flex align-items-center">
                                                                    <i class='bx bxs-cube-alt fs-3'></i>
                                                                    &nbsp;List of Blocks</h5>
                                                                <button class="btn btn-primary add-customer d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#add-block">
                                                                    <i class='bx bx-plus fs-4'></i> 
                                                                    &nbsp;New Block
                                                                </button>
                                                            </div> 
                                                            <br>
                                                            <div class="block">
                                                                <table class="table table-striped table-bordered w-100 " id="tbl-block-info">
                                                                    <thead class="tbl-header text-light">
                                                                        <th>#</th>
                                                                        <th>Block</th>
                                                                        <th>Sector</th>
                                                                        <th>Site</th>
                                                                        <th>Total Lots</th>
                                                                        <th>Action</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php while($row=$blocks->fetch_array()){?>
                                                                            <tr>
                                                                                <td class="align-middle"><?php echo $row["block_id"] ?></td>
                                                                                <td class="align-middle"><?php echo $row["block_name"] ?></td>
                                                                                <td class="align-middle"><?php echo $row["sector"] ?></td>
                                                                                <td class="align-middle"><?php echo $row["site_name"] ?></td>
                                                                                <td class="align-middle"><?php echo $row["total_lots"] ?></td>
                                                                                <td class="align-middle text-center">
                                                                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit-block-<?php echo $row["block_id"]?>">
                                                                                        <i class='bx bxs-edit'></i>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                        <?php }?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="lots" role="tabpanel" aria-labelledby="lots-tab">
                                            <div class="head">
                                                <div class="row p-0">
                                                    <div class="col-sm-12 col-md-12">
                                                        <div class="bg-white p-3 h-100 rounded">
                                                            <div class="title-header bg-white sticky-top p-3 d-flex">
                                                                <h5 class="d-flex align-items-center">
                                                                    <i class='bx bxs-grid fs-3'></i>
                                                                    &nbsp;List of Lots</h5>
                                                                <button class="btn btn-primary add-customer d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#add-lot">
                                                                    <i class='bx bx-plus fs-4'></i> 
                                                                    &nbsp;New Lot
                                                                </button>
                                                            </div> 
                                                            <br>
                                                            <div class="lot">
                                                                <table class="table table-striped table-bordered w-100" id="tbl-lot-info" >
                                                                    <thead class="tbl-header text-light">
                                                                        <th>#</th>
                                                                        <th>Lot</th>
                                                                        <th>Block</th>
                                                                        <th>Sector</th>
                                                                        <th>Site</th>
                                                                        <th>Lawn Type</th>
                                                                        <th>Action</th>
                                                                    </thead>
 <tbody>
                                                                        <?php while($row=$lots->fetch_array()){?>
                                                                            <tr>
                                                                                <td class="align-middle"><?php echo $row["lot_id"] ?></td>
                                                                                <td class="align-middle"><?php echo $row["lot_name"] ?></td>
                                                                                <td class="align-middle"><?php echo $row["block_name"] ?></td>
                                                                                <td class="align-middle"><?php echo $row["sector"] ?></td>
                                                                                <td class="align-middle"><?php echo $row["site_name"] ?></td>
                                                                                <td class="align-middle"><?php echo $row["lawn_type"] ?></td>
                                                                                <td class="align-middle text-center">
                                                                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit-lot-<?php echo $row["lot_id"]?>">
                                                                                        <i class='bx bxs-edit'></i>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                        <?php }?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------------------- MODAL ADD SITE ----------------------------->
    <div class="modal fade" id="add-site" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg"> 
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                        <i class='bx bx-sitemap fs-1'></i>
                        &nbsp;Add New Site
                    </h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body p-5">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="site-name">Site name:<i class="req">*</i></label>
                                <input type="text" id="site-name" name="site-name" placeholder="Name of Site" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="site-sqm2">Square meters:<i class="req">*</i></label>
                                <input type="text" id="site-sqm2" name="site-sqm2" placeholder="ex. 4sqm" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="btn-submit-site" id="btn-submit-site" class="btn btn-primary">Add</button>
                        <button type="reset" class="btn btn-danger">Reset</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!------------------------- MODAL ADD BLOCK ----------------------------->
    <div class="modal fade" id="add-block" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg"> 
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                        <i class='bx bxs-cube-alt fs-1'></i>
                        &nbsp;Add New Block
                    </h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body p-5">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="block-name">Block number:<i class="req">*</i></label>
                                <input type="number" id="block-name" name="block-name" placeholder="Block number" min="1" max="99" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="sector">Sector:<i class="req">*</i></label>
                                <select id="sector" name="sector" class="form-select" required>
                                    <option value="" selected disabled>Select Sector</option>
                                    <option value="A">A</option>
                                    <option value="B"> B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="site-id">Site name:<i class="req">*</i></label>
                                <select type="text" id="site-id" name="site-id" class="form-select" required>
                                    <option value="" selected disabled>Select Site</option>
                                    <?php while($row=$sites->fetch_array()){?>
                                        <option value="<?php echo $row["site_id"] ?>"><?php echo $row["site_name"] ?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="btn-submit-block" id="btn-submit-block" class="btn btn-primary">Add</button>
                        <button type="reset" class="btn btn-danger">Reset</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!------------------------- MODAL ADD LOT ----------------------------->
    <div class="modal fade" id="add-lot" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg"> 
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                        <i class='bx bxs-grid fs-1'></i>
                        &nbsp;Add New Lot
                    </h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                    <div class="modal-body p-5">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label for="site-lot">Site name:<i class="req">*</i></label>
                                <select type="text" id="site-lot" name="site-lot" class="form-select" required>
                                    <option value="" selected disabled>Select Site</option>
                                    <?php while($row=$sites->fetch_array()){?>
                                        <option value="<?php echo $row["site_id"] ?>"><?php echo $row["site_name"] ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="sector-lot">Sector:<i class="req">*</i></label>
                                <select id="sector-lot" name="sector-lot" class="form-select" required disabled>
                                    <option value="" selected disabled>Select Sector</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="block-lot">Block number:<i class="req">*</i></label>
                                <select type="text" id="block-lot" name="block-lot" class="form-select" required disabled>
                                    <option value="" selected disabled>Select Block</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="lot-name">Lot number:<i class="req">*</i></label>
                                <input type="number" id="lot-name" name="lot-name" min="1" max="99" placeholder="Lot number" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lawn-type">Lawn Type:<i class="req">*</i></label>
                                <select id="lawn-type" name="lawn-type" class="form-select" required>
                                    <option value="" selected disabled>Select Lawn Type</option>
                                    <option value="Premium">Premium</option>
                                    <option value="Deluxe">Deluxe</option>
                                    <option value="Standard">Standard</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="btn-submit-lot" id="btn-submit-lot" class="btn btn-primary">Add</button>
                        <button type="reset" class="btn btn-danger" id="btn-reset-lot">Reset</button> 
                    </div>
                </form>
            </div>
        </div>
    </ div>
    <!---------------------------- MODAL EDIT SITE ----------------------------->
    <?php while($row=$sites->fetch_array()){?>
        <div class="modal fade" id="edit-site-<?php echo $row["site_id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg"> 
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                            <i class='bx bx-edit fs-1'></i>
                            &nbsp;Edit <?php echo $row["site_name"] ?> Site
                        </h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body p-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="edit-site-name">Site name:<i class="req">*</i></label>
                                    <input type="text" id="edit-site-name" name="edit-site-name" placeholder="Name of Site" class="form-control" value="<?php echo $row["site_name"] ?>" required>
                                    <input type="hidden" name="edit-site-id" value="<?php echo $row["site_id"] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="edit-site-sqm2">Square meters:<i class="req">*</i></label>
                                    <input type="text" id="edit-site-sqm2" name="edit-site-sqm2" placeholder="ex. 4sqm" class="form-control" value="<?php echo $row["site_sqm2"] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="btn-update-site" id="btn-update-site" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-danger">Reset</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php }?>
    <!---------------------------- MODAL EDIT BLOCK ----------------------------->
    <?php while($row=$blocks->fetch_array()){?>
        <div class="modal fade" id="edit-block-<?php echo $row["block_id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg"> 
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                            <i class='bx bxs-edit fs-1'></i>
                            &nbsp;Edit Block: <?php echo $row["block_name"] ?> - Sector: <?php echo $row["sector"] ?> - Site: <?php echo $row["site_name"] ?>
                        </h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body p-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="edit-block-name">Block number:<i class="req">*</i></label>
                                    <input type="number" id="edit-block-name" name="edit-block-name" placeholder="Block number" min="1" max="99" class="form-control" value="<?php echo $row["block_name"] ?>" required>
                                    <input type="hidden" name="edit-block-id" id="edit-block-id" value="<?php echo $row["block_id"] ?>">
                                    <input type="hidden" name="edit-site-id" id="edit-site-id" value="<?php echo $row["site_id"] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="edit-sector-block">Sector:<i class="req">*</i></label>
                                    <select id="edit-sector-block" name="edit-sector-block" class="form-select" required>
                                        <option value="<?php echo $row["sector"] ?>" selected><?php echo $row["sector"] ?></option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>
                                </div>
                            </div>
 </div>
                        <div class="modal-footer">
                            <button type="submit" name="btn-update-block" id="btn-update-block" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-danger">Reset</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php }?>
    <!---------------------------- MODAL EDIT LOT ----------------------------->
    <?php while($row=$lots->fetch_array()){?>
        <div class="modal fade" id="edit-lot-<?php echo $row["lot_id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg"> 
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title d-flex align-items-center" id="staticBackdropLabel">
                            <i class='bx bxs-edit fs-1'></i>
                            &nbsp;Edit Lot: <?php echo $row["lot_name"] ?> - Block: <?php echo $row["block_name"] ?> - Sector: <?php echo $row["sector"] ?> - Site: <?php echo $row["site_name"] ?>
                        </h4>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body p-5">
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label for="edit-lot-name">Lot number:<i class="req">*</i></label>
                                    <input type="number" id="edit-lot-name" name="edit-lot-name" min="1" max="99" placeholder="Lot number" class="form-control" value="<?php echo $row["lot_name"] ?>" required>
                                    <input type="hidden" name="edit-site-lot" value="<?php echo $row["site_id"] ?>">
                                    <input type="hidden" name="edit-lot-id" value="<?php echo $row["lot_id"] ?>">
                                    <input type="hidden" name="edit-block-id" value="<?php echo $row["block_id"] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="edit-lawn-type">Lawn Type:<i class="req">*</i></label>
                                    <select id="edit-lawn-type" name="edit-lawn-type" class="form-select" required>
                                        <option value="<?php echo $row["lawn_type"] ?>"><?php echo $row["lawn_type"] ?></option>
                                        <option value="Premium">Premium</option>
                                        <option value="Deluxe">Deluxe</option>
                                        <option value="Standard">Standard</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="btn-update-lot" id="btn-update-lot" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-danger">Reset</button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php }?>
    <script src="../Assets/js/index_admin.js" defer></script>
    <script src="../Assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../Assets/DataTables/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>
    <script src="https://kit.fontawesome.com/ec4303cca5.js" crossorigin="anonymous"></script>
</body>
</html>