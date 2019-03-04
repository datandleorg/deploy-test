<?php include('header.php'); ?>
<!-- End Sidebar -->

<div class="content-page">

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">SalesOrders list</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">List SalesOrders Items</li>
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
                                <a href="addSalesOrder.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                    Add Sales Order</a></span>

                            <h3><i class="fa fa-cart-plus bigfonts" aria-hidden="true"></i><b> Sales Orders list </b></h3>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover display">
                                    <thead>
                                        <tr>
                                            <th style="display:none;">Id</th>												
                                            <th>SO Number</th>												
                                            <th>SO Date</th>												
                                            <th>Customer</th>
                                            <th>SO Status</th>												
                                            <th>Amount</th>												
                                            <th>User</th>												
                                            <th>Actions</th>
                                        </tr>
                                    </thead>										
                                    <tbody>


                                        <?php


                                        function status_code($status){
                                            if($status=="Approved"){
                                                $status_text = ' <span class="text-dark">'.$status.'</span>';  
                                                return $status_text;  
                                            }
                                            if($status=="Created"){
                                                $status_text = ' <span class="text-primary">'.$status.'</span>';  
                                                return $status_text;  
                                            } 

                                            if($status=="Delivered"){
                                                $status_text = ' <span class="text-success">'.$status.'</span>';  
                                                return $status_text;  
                                            } 


                                            if($status=="Invoiced"){
                                                $status_text = ' <span class="text-info">'.$status.'</span>';  
                                                return $status_text;  
                                            } 
                                            if($status=="Cancelled"){
                                                $status_text = ' <span class="text-secondary">'.$status.'</span>';  
                                                return $status_text;  
                                            } 
                                            if($status=="Closed"){
                                                $status_text = ' <span class="text-muted">'.$status.'</span>';  
                                                return $status_text;  
                                            } 
                                        }

                                        $sql = "SELECT i.*,c.* FROM salesorders i,customerprofile c where c.custid=i.so_customer
										ORDER BY i.id DESC ";
                                        $result = mysqli_query($dbcon,$sql);
                                        if ($result->num_rows > 0){
                                            while ($row =$result-> fetch_assoc()){
                                                echo "<tr>";
                                                echo '<td style="display:none;">' .$row['id'] . '</td>';
                                                echo '<td>' .$row['so_code'] . '</td>';
                                                echo '<td>'.$row['so_date'].' </td>';
                                                echo '<td>'.$row['custname'].' </td>';
                                                echo '<td>'.status_code($row['so_status']).' </td>';
                                                echo '<td>'.$row['so_value'].' </td>';
                                                echo '<td>'.$row['so_owner'].' </td>';
                                        ?>


                                        <?php


                                                echo '<td>';

                                                echo '    <div class="dropdown">
  <button type="button" class="btn btn-light btn-xs dropdown-toggle" data-toggle="dropdown">

  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item"  href="#" onclick="ToPrint(this);" data-code="'.$row['so_code'].'" data-img="assets/images/logo.png"  data-id="po_print"><i class="fa fa-print" aria-hidden="true"></i>&nbsp; Print</a>';

                                                if($row['so_status']=="Created"){
                                                    echo ' <a class="dropdown-item" href="addSalesOrder.php?so_code=' . $row['so_code'] . '&action=edit&type=salesorders" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp; Edit</a>';   
                                                    echo '
                                                        <a class="dropdown-item"  href="#" onclick="deleteRecord_8(this);" data-id="'.$row['so_code'].'" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i>&nbsp; Delete</a>';

                                                    echo ' <a class="dropdown-item" href="workers/setters/soconvert.php?so_code=' . $row['so_code'] . '&so_status=Approved" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5"><i class="fa fa-exchange" aria-hidden="true"></i>&nbsp; Convert to Approved</a>';   

                                                }

                                                if($row['so_status']=="Approved"){

                                                    echo '
                                                        <a class="dropdown-item"  href="addInvoice.php?so_code=' . $row['so_code'] . '&action=add&type=invoices" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Convert to Invoice"><i class="fa fa-exchange" aria-hidden="true"></i>&nbsp; Convert to Invoice</a>';

                                                }



                                                echo '    </div></div>';



                                                echo ' </td>';
                                                echo "</tr>";
                                            }
                                        }
                                        ?>						
                                        <script>
                                            function deleteRecord_8(x)
                                            {
                                                var RecordId = $(x).attr('data-id');
                                                if (confirm('Confirm delete')) {
                                                    window.location.href = 'deleteSalesOrders.php?so_code='+RecordId;
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
                        var template= $(el).attr('data-template');
                        window.location.href = 'assets/so_print_html.php?so_code='+code;
                     }
                </script>
                <?php include('footer.php'); ?>