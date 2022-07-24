<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo site_title;?></title>
		<!--- start styles -->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>" type="text/css" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.dataTables.min.css'); ?>"/>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert.min.css'); ?>">
		<!--- end styles -->
	</head>
	<body>
		<div class="container">
			<div class="loading d-none"><?php echo _l('loading');?>&#8230;</div>
			<div class="text-center">
				<label class="title-label"><?php echo site_title;?></label>
			</div>
			<div class="debug-form">
			    <form method="get">
			      <label><?php echo _l('url');?></label>
			      <input type="text" name="url" id="url" class="form-control">
			      <button class="text-left search-btn" type="button"><?php echo _l('search');?></button>
			    </form>
			</div>
			<br>
			<div class="debug-box d-none">
				<img src="" class="preview-img" width="100%">
				<div class="text-wrapper">
				  <p><strong class="preview-title"></strong></p>
				  <p class="description"></p>
				</div>
				<button class="text-left save-btn" type="button"><?php echo _l('save');?></button>
			</div>
			<!--- start row -->
			<div class="row">
				<div class="">
					<div class="card-box">
						<!--- start table -->
						<table id="detail-table" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th><?php echo _l('no');?>.</th>
									<th><?php echo _l('url');?></th>
									<th><?php echo _l('title');?></th>
									<th><?php echo _l('description');?></th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
						<!--- end table -->
					</div>
				</div>
			</div>
		</div>
		<!--- end row -->
		<!--- start script -->
		<script>
			var base_url = "<?php echo base_url();?>";
		</script>
		<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/sweetalert.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/home.js'); ?>"></script>
		<!--- end script -->
	</body>
</html>