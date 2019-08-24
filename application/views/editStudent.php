

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<?php
				if ($this->session->flashdata('error')):

					?>
					<div class="alert alert-primary" role="alert">
						<?php echo $this->session->flashdata('error');?>
					</div>
				<?php endif; ?>
			</div>
			<h1>Edit your new student</h1>
			<form action="<?php echo site_url('home/updateUser')?>" method="post">
				<div class="form-group">
					<label>Name <span>*</span></label>
					<input type="text" name="name" value="<?php echo $student[0]['s_name']?>" placeholder="Enter your Name" class="form-control">
				</div>
				<div class="form-group">
					<label>Subject <span>*</span></label>
					<input type="text" name="subject" value="<?php echo $student[0]['s_subject']?>" placeholder="Enter your Subject" class="form-control">
				</div>
				<div class="form-group">
					<label>Age <span>*</span></label>
					<input type="text" name="age" value="<?php echo $student[0]['s_age']?>" placeholder="Enter your Age" class="form-control">
					<input type="hidden" name="oldId" value="<?php echo $student[0]['s_id']?>">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
					<a href="<?php echo site_url('home')?>" class="btn btn-info">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</div>
