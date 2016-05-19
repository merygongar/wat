<?php
require_once('watInc.php');

$emessage = getForm('errormessage','');
$message = getForm('message','');
$site_title = 'Register Form';

require_once('head.php');
require_once('header.php');
?>
<?php if($emessage!=''){ ?>
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Error!</strong> <?= $emessage;?>
	</div>
<?php } ?>
<?php if($message!=''){ ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<strong>Success!</strong> <?= $message;?>
	</div>
<?php } ?>

       <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Register Form</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form role="form" action="register.php" method="post" enctype="multipart/form-data">
	            <div class="row">
	                <div class="col-lg-6">
	                    <div class="panel panel-default">
	                        <div class="panel-heading">
	                            Account Information
	                        </div>
	                        <div class="panel-body">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password*</label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Repeat Password*</label>
                                        <input type="password" name="password2" class="form-control" placeholder="Repeat Password" required>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Account Information
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Last Name*</label>
                                        <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Company</label>
                                        <input type="text" name="company" class="form-control" placeholder="Enter Company">
                                    </div>
                                </div>  
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
	            <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body">
                                    <button type="submit" class="btn btn-default">Register Account</button>
                                    <button type="reset" class="btn btn-default">Reset Form</button>
                                </div>  
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
            </form>
        </div>
        <!-- /#page-wrapper -->


<?php
require_once('foot.php');
?>
