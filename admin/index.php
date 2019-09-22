<?php require_once('header.php'); ?>

<section class="content-header">
	<h1>Dashboard</h1>
</section>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_top_category");
$statement->execute();
$total_top_category = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_mid_category");
$statement->execute();
$total_mid_category = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_end_category");
$statement->execute();
$total_end_category = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_product");
$statement->execute();
$total_product = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
$statement->execute(array('Completed'));
$total_order_completed = $statement->rowCount();


$statement = $pdo->prepare("SELECT * FROM tbl_customer");
$statement->execute(array('Completed'));
$total_cus = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE shipping_status=?");
$statement->execute(array('Completed'));
$total_shipping_completed = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
$statement->execute(array('Pending'));
$total_order_pending = $statement->rowCount();

$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=? AND shipping_status=?");
$statement->execute(array('Completed','Pending'));
$total_order_complete_shipping_pending = $statement->rowCount();
?>

<section class="content">
	<div class="row">
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="fa fa-tasks"></i></span>
<a href="top-category.php"><div class="info-box-content">
					<span class="info-box-text">Categories</span>
					<span class="info-box-number"><?php echo $total_top_category; ?></span>
				</div>
				</a>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="fa fa-tags"></i></span>
				<a href="mid-category.php"><div class="info-box-content">
					<span class="info-box-text">Sub Categories</span>
					<span class="info-box-number"><?php echo $total_mid_category; ?></span>
				</div></a>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="fa fa-tags"></i></span>
				<a href="end-category.php"><div class="info-box-content">
					<span class="info-box-text">Under Categories</span>
					<span class="info-box-number"><?php echo $total_end_category; ?></span>
				</div></a>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="fa fa-tags"></i></span>
				<a href="product.php"><div class="info-box-content">
					<span class="info-box-text">Products</span>
					<span class="info-box-number"><?php echo $total_product; ?></span>
				</div></a>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="fa fa-shopping-basket"></i></span>
				<a href="order.php"><div class="info-box-content">
					<span class="info-box-text">Completed Orders</span>
					<span class="info-box-number"><?php echo $total_order_completed; ?></span>
				</div></a>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="fa fa-truck"></i></span>
				<a href="order.php"><div class="info-box-content">
					<span class="info-box-text">Completed Shipping</span>
					<span class="info-box-number"><?php echo $total_shipping_completed; ?></span>
				</div></a>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red"><i class="fa fa-exclamation-triangle"></i></span>
				<a href="order.php"><div class="info-box-content">
					<span class="info-box-text">Pending Orders</span>
					<span class="info-box-number"><?php echo $total_order_pending; ?></span>
				</div></a>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>
				<a href="order.php"><div class="info-box-content">
					<span class="info-box-text">Pending Shipping </span>
					<span class="info-box-number"><?php echo $total_order_complete_shipping_pending; ?></span>
				</div></a>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
				<a href="customer.php"><div class="info-box-content">
					<span class="info-box-text">Customer</span>
					<span class="info-box-number"><?php echo $total_cus; ?></span>
				</div></a>
			</div>
		</div>
		
	</div>
</section>

<?php require_once('footer.php'); ?>