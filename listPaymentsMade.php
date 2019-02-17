<?php include('header.php'); ?>
<!-- End Sidebar -->

<script src="assets/js/jspdf.debug.js"></script>
<script src="assets/js/jspdf.min.js"></script>

<div class="content-page">

    <!-- Start content -->
    <div class="content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12">
                    <div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Payments list</h1>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active">List Payments</li>
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
                                <a href="addVendorPayments.php" class="btn btn-primary btn-sm"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                    Add Payments</a></span>

                            <h3><i class="fa fa-cart-plus bigfonts" aria-hidden="true"></i><b> Payments list </b></h3>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover display">
                                    <thead>
                                        <tr>
                                            <!--th style="display:none;">Id#</th-->												
                                            <th style="width:50px">Transaction#</th>												
                                            <th style="width:3000px">Date</th>												
                                            <th style="width:200px">Bank</th>
                                            <th style="width:200px">Reference#</th>
                                            <th style="width:3500px">Vendor</th>												
                                            <th style="width:100px">Invoioce#</th>												
                                            <th style="width:300px">PaymentMode</th>												
                                            <th style="width:300px">Amt Received</th>
                                            <th style="width:200px">Actions</th>
                                        </tr>
                                    </thead>										
                                    <tbody>
                                        <?php
                                        include("database/db_conection.php");//make connection here
                                        $sql = "SELECT p.*,v.supname
										FROM payments p, vendorprofile v where payment_vendor = v.vendorid
										ORDER BY p.payment_id DESC ";
                                        $result = mysqli_query($dbcon,$sql);
                                        if ($result->num_rows > 0){
                                            while ($row =$result-> fetch_assoc()){
                                                echo "<tr>";
                                                echo '<td style="display:none;">' .$row['id'] . '</td>';
                                                echo '<td>' .$row['payment_id'] . '</td>';
                                                echo '<td>'.$row['payment_date'].' </td>';
                                                echo '<td>'.$row['payment_bank'].' </td>';
                                                echo '<td>'.$row['payment_ref_no'].' </td>';
                                                echo '<td>'.$row['supname'].' </td>';
                                                echo '<td>'.$row['payment_invoice_no'].' </td>';
                                                echo '<td>'.$row['payment_mode'].' </td>';
                                                echo '<td>'.$row['payment_amount'].' </td>';

                                                $sql2 = "SELECT g.*,p.*,l.*,v.supname,v.address,v.city,v.state,v.country,v.zip,v.gstin,c.orgname,c.image FROM grn_notes g,purchaseorders p,vendorprofile v,comprofile c,payments l
			WHERE g.grn_po_code = p.po_code AND p.po_vendor=v.vendorid AND p.po_comp_code=c.orgid and payment_id='".$row['payment_id']."' and l.payment_invoice_no=g.grn_invoice_no
			ORDER BY p.id DESC";
                                                $result2 = mysqli_query($dbcon,$sql2);
                                                $row2 =$result2-> fetch_assoc();
                                                //print_r($row2);
                                        ?>


                                        <?php


                                                echo '<td><a class="btn btn-light btn-sm hidden-md" onclick="printContent(this);" data-img="'.$row2['image'].'" data-code="'.$row['payment_id'].'"  data-id="po_print">
														<i class="fa fa-print" aria-hidden="true"></i></a>
                                                      ';
                                                //                                                <a href="addVendorPayments.php?payment_id=' . $row['payment_id'] . '&action=edit&type=payments" class="btn btn-primary btn-sm" data-target="#modal_edit_user_5">

                                                /*
														<i class="fa fa-pencil" aria-hidden="true"></i></a>
*/

                                                echo ' </td>';
                                                echo "</tr>";
                                            }
                                        }
                                        ?>						
                                        <script>
                                            function deleteRecord_8(RecordId)
                                            {
                                                if (confirm('Confirm delete')) {
                                                    window.location.href = 'deletepayments.php?id='+RecordId;
                                                }
                                            }
                                        </script>

                                    </tbody>
                                </table>
                            </div>

                        </div>														
                    </div><!-- end card-->	
                    <div id="po_print" style="display:;">


                    </div>
                </div>


                <script>
                    $('#po_print').hide();

                    function get_print_html(payment_id,img){
                        $.ajax ({
                            url: 'assets/payment_print_html.php',
                            type: 'post',
                            async :false,
                            data: {
                                payment_id:payment_id,
                            },
                            //dataType: 'json',
                            success:function(response){
                                if(response!=0 || response!=""){
                                    $('#po_print').html(response);
                                    $('#po_print').prepend('<img src="'+img+'" width="50px" height="50px"/>');
                                }else{
                                    alert('Something went wrong');
                                }
                            }

                        });
                    }
                    var beforePrint = function () {
                        $('#po_print').show();
                    };

                    var afterPrint = function () {
                        location.reload();

                        $('#po_print').hide();
                    };

                    function printContent(el){
                        var id= $(el).attr('data-id');
                        var code= $(el).attr('data-code');
                        var img= $(el).attr('data-img');
                        get_print_html(code,img);

                        window.onbeforeprint = beforePrint;
                        window.onafterprint = afterPrint;
                        var restorepage = $('body').html();
                        var printcontent = $('#' + id).clone();
                        $('body').empty().html(printcontent);
                        window.print();
                        $('body').html(restorepage);

                    }
                </script>
                <?php include('footer.php'); ?>