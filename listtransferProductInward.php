
<?php include('header.php'); ?>
<!-- End Sidebar -->
<?php include('generic_modal.php');?>

<div class="content-page">

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Stock Transfer(Product Inward) list</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">Stock Transfer(Product Inward) list</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
                    <div class="card mb-3">
                        <div class="card-header">


                            <span class="pull-right">
                                <a href="transferProductInward.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                    Add Stock Transfer</a></span>

                            <h3><i class="fa fa-cart-plus bigfonts" aria-hidden="true"></i><b> Stock Transfer(Product Inward) list </b></h3>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover display">
                                    <thead>
                                        <tr>
                                            <th style="display:none;">ID</th>												
                                            <th>TransID</th>												
                                            <th>Transfered On</th>												
                                            <!--th>Status</th-->												
                                            <th>Location</th>												
                                            <th>Stock Value</th>
                                            <th>User</th>												
                                            <th>Actions</th>
                                        </tr>
                                    </thead>										
                                    <tbody>
                                        <?php
//stk_mov_req_date

                                        include("database/db_conection.php");//make connection here
                                        $sql = "SELECT s.*,w.warehousename FROM stock_movement s ,warehouse w  where s.stk_mov_location=w.location_id
										ORDER BY s.id DESC ";
                                        $result = mysqli_query($dbcon,$sql);
                                        if ($result->num_rows > 0){
                                            while ($row =$result-> fetch_assoc()){
                                                echo "<tr>";
                                                echo '<td style="display:none;">' .$row['id'] . '</td>';
                                                echo '<td>' .$row['stk_mov_id'] . '</td>';
                                                echo '<td>'.$row['stk_mov_req_date'].' </td>';
                                                //echo '<td>'.$row['stk_mov_status'].' </td>';
                                                echo '<td>'.$row['warehousename'].' </td>';
                                                echo '<td>'.$row['stk_value'].' </td>';
                                                echo '<td>'.$row['stk_mov_owner'].' </td>';
                                        ?>

                                        <?php
                                                echo ' <td>
                                                <div class="dropdown">
  <button type="button" class="btn btn-light btn-xs dropdown-toggle" data-toggle="dropdown">

  </button>
  <div class="dropdown-menu">
      <a class="dropdown-item" href="#" onclick="load_items_view(this);"  data-code="'.$row['stk_mov_id'].'"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp; View Items</a>';

                                                echo ' <a class="dropdown-item" href="#" onclick="ToPrint(this);"  data-id="po_print" data-code="'.$row['stk_mov_id'].'" data-img="assets/images/logo.png"><i class="fa fa-print" aria-hidden="true"></i>&nbsp; Print</a>';
                                                echo '
    <a class="dropdown-item" href="transferProductInward.php?stk_mov_id=' . $row['stk_mov_id'] . '&action=edit&type=stock_movement"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp; Edit</a>';      

                                                echo '
                                                    <a class="dropdown-item" href="#" onclick="deleteRecord_8(this);" data-id="'.$row['stk_mov_id'].'"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp; Delete</a>';

                                                echo        '</div></div></td>';
                                                echo ' </td>';
                                                echo "</tr>";
                                            }
                                        }
                                        ?>	

                                        <script>
                                            function deleteRecord_8(x)
                                            {
                                                console.log(x);
                                                var RecordId = $(x).attr('data-id');
                                                console.log(RecordId);
                                                console.log($(x).attr('data-id'));
                                                if (confirm('Confirm delete')) {
                                                    window.location.href = 'deleteProductInward.php?id='+RecordId;
                                                }
                                            }
                                        </script>

                                    </tbody>
                                </table>
                            </div>

                        </div>														
                    </div><!-- end card-->	
                  
                </div>


                <script>
                    function ToPrint(el){
                        var code= $(el).attr('data-code');
                        window.location.href = 'assets/stk_mov_print_html.php?stk_mov_id='+code;

                     }

                </script>
                <?php include('footer.php'); ?>