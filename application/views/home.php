<div class="container">
	<div class="row" style="margin-top: 50px;">
		<div class="col-md-12">
			<div class="form-group">
				<?php
				if ($this->session->flashdata('error')):

				?>
					<div class="alert alert-primary" role="alert">
						<?php echo $this->session->flashdata('error');?>
					</div>
				<?php endif; ?>
			</div>
			<a href="<?php echo site_url('home/newStudent')?>" class="btn btn-primary" style="margin-bottom: 20px;">Add New Student</a>
			<?php
				if ($students->num_rows() > 0):
			?>
				<table class="table">
					<th>ID</th>
					<th>Name</th>
					<th>Age</th>
					<th>Subject</th>
					<th>Date</th>
					<th>Edit</th>
					<th>Delete</th>
					<?php foreach($students->result() as $std): ?>
						<tr>
							<td>
								<?php echo $std->s_id;?>
							</td>
							<td>
								<?php echo $std->s_name;?>
							</td>
							<td>
								<?php echo $std->s_age;?>
							</td>
							<td>
								<?php echo $std->s_subject;?>
							</td>
							<td>
								<?php echo $std->s_date;?>
							</td>
							<td>
								<a class="btn btn-primary" href="<?php echo site_url('home/editStudent/'. $std->s_id)?>">Edit</a>
							</td>
							<td>
								<a class="btn btn-danger" href="<?php echo site_url('home/delete/'.$std->s_id)?>">
									Delete
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
			<?php else: ?>
				Not found.
			<?php endif; ?>
		</div>
	</div>
</div>
