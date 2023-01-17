<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Responsive bootstrap 4 admin template" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App css -->
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    </head>

    <body data-layout="horizontal">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Navigation Bar-->
            <?php $this->load->view('admin/navigation.php'); ?>
            <!-- End Navigation Bar-->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start container-fluid -->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <h4 class="header-title mb-3">View => Deposits</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->



                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h5 class="mt-0 font-14 mb-3">Users</h5>
                                    <div class="table-responsive">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Mpesa Transaction ID</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Reason</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
    
                                            <tbody>
                                                <?php
                                                    foreach($all_deposits as $deposit){
														$clientPhone = str_replace('254', '0', $deposit['phone_number']);
														// Get client name from the clients table
														$clientData = $this->db->get_where('clients', array('client_phone_num' => $clientPhone))->row_array();
														// Prepare date and time
														$date = strtotime($deposit['created_at']);
														$transDate = date('m-d-Y', $date);
														$transTime = date('g:i a', $date);
                                                        ?>
                                                        <tr>
															<td><?php echo $deposit["merchant_request_id"];?></td>
                                                            <td><?php echo $clientData["client_name"];?></td>
                                                            <td><?php echo $clientPhone;?></td>
                                                            <td><?php echo number_format($deposit["amount"],2);?></td>
                                                            <td><?php echo $transDate;?></td>
                                                            <td><?php echo $transTime;?></td>
                                                            <td class="col-3"><?php echo $deposit["result_description"];?></td>
															<?php if ($deposit['customer_message'] == 'Requested'): ?>
                                                            <td class="text-warning">REQUESTED</td>
															<?php elseif ($deposit['customer_message'] == 'Failed'):?>
																<td class="text-danger">FAILED</td>
															<?php elseif ($deposit['customer_message'] == 'Paid'):?>
																<td class="text-success">SUCCESSFULL</td>
															<?php endif; ?>
															<td>
																<?php if (empty($deposit["result_description"])): ?>
																<button type="button" onclick="validatePayment(this)" class="btn btn-success btn-sm" data-url="<?= site_url('mpesa_payment/validate_payment') ?>" data-id="<?= $deposit['checkout_request_id']?>">Confirm Payment</button>
																<?php else: ?>
																	<button type="button" disabled class="btn btn-warning">Confirmed</button>
																	<?php endif; ?>
															</td>
                                                        </tr>
                                                        <?php
                                                    } //end foreach
                                                ?>
                                                
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end container-fluid -->

                    

                    <!-- Footer Start -->
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    2017 - 2020 &copy; </a>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- end Footer -->

                </div>
                <!-- end content -->

            </div>
            <!-- END content-page -->

        </div>
        <!-- END wrapper -->

      

        <!-- Vendor js -->
        <script src="<?php echo base_url();?>assets/js/vendor.min.js"></script>

        <script src="<?php echo base_url();?>assets/libs/morris-js/morris.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/raphael/raphael.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/pages/dashboard.init.js"></script>
        <!-- Required datatable js -->
        <script src="<?php echo base_url();?>assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Buttons examples -->
        <script src="<?php echo base_url();?>assets/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables/dataTables.select.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/jszip/jszip.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/pdfmake/pdfmake.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/pdfmake/vfs_fonts.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url();?>assets/libs/datatables/buttons.print.min.js"></script>
        <!-- Datatables init -->
        <script src="<?php echo base_url();?>assets/js/pages/datatables.init.js?adfads"></script>

        <!-- App js -->
        <script src="<?php echo base_url();?>assets/js/app.min.js"></script>

		<script>
			function validatePayment(d) {
				const url = d.getAttribute('data-url');
				const checkoutRequestId = d.getAttribute('data-id');
				const data = { CheckoutRequestID: checkoutRequestId };
				$.ajax({
					url: url,
					type: 'POST',
					dataType: 'json',
					data: data,
					beforeSend: function () {
						$(d).attr('disabled', true)
						$(d).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Validating...')
					}, 
					success: function(data) {
						if (data.status == 'success') {
							window.location.reload();
						}
					},
					error: function (jqXHR, textStatus, errorThrown) {
						alert('There was some error performing check');
					}
				})
			}
		</script>

    </body>

</html>
