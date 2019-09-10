<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="row">
		<div class="col-lg">
			<a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#newStudentsModal">Add New Students</a>
			<?php if (validation_errors()) : ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors(); ?>
				</div>
			<?php endif; ?>
			<?= form_error('students', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
			<?= $this->session->flashdata('message'); ?>
			<div class="row text-right">
				<div class="col col-sm-12 col-lg-12 offset-sm-1 offset-lg-0">
					<a href="<?= base_url('students/printStudents') ?>" class="btn btn-success mb-2">Print <i class="fas fa-fw fa-print"></i></a>
				</div>
			</div>
			<table class="table table-hover" id="table_id">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">NIS</th>
						<th scope="col">Photo</th>
						<th scope="col">Name</th>
						<th scope="col">Class</th>
						<th scope="col">Major</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($students as $st) : ?>
						<tr>
							<th scope="row"><?= $i; ?></th>
							<td><?= $st['nis']; ?></td>
							<td>
								<div class="m-r-10"><img src="<?= base_url('assets/img/students/') . $st['photo']; ?>" class="rounded" width="45"></div>
							</td>
							<td><?= $st['name']; ?></td>
							<td><?= $st['class']; ?></td>
							<td><?= $st['major']; ?></td>
							<td>

								<a href="" class="badge badge-warning" data-toggle="modal" data-target="#detailStudentsModal<?= $st['id'];?>">Detail</a>
								<a href="" class="badge badge-success" data-toggle="modal" data-target="#editStudentsModal<?= $st['id'];?>">Edit</a>
								<a href="<?= base_url(); ?>students/deleteStudents/<?= $st['id']; ?>" class="badge badge-danger">Delete</a>

							</td>
						</tr>
						<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="newStudentsModal" tabindex="-1" role="dialog" aria-labelledby="newStudentsModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newStudentsModalLabel">Add New Student</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('students'); ?>
			<div class="modal-body">
				<div class="form-group">
					<input type="text" class="form-control" id="nis" name="nis" placeholder="NIS">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="name" name="name" placeholder="Full name">
				</div>
				<div class="form-group">
					<select name="class_id" id="class_id" class="form-control">
						<option value="">Select Class</option>
						<?php foreach ($class as $sc) : ?>
							<option value="<?= $sc['id']; ?>"><?= $sc['class']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<select name="major_id" id="major_id" class="form-control">
						<option value="">Select Major</option>
						<?php foreach ($major as $smj) : ?>
							<option value="<?= $smj['id']; ?>"><?= $smj['major']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="psb" name="psb" placeholder="PSB">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="spp" name="spp" placeholder="SPP">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="uts" name="uts" placeholder="UTS">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="uas" name="uas" placeholder="UAS">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="kunjin" name="kunjin" placeholder="KUNJIN">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="pkl" name="pkl" placeholder="PKL">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="uas" name="uas" placeholder="UAS">
				</div>
				<div class="row">
					<div class="col">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="photo" name="photo">
							<label class="custom-file-label" for="photo">Choose file</label>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Add</button>
			</div>
		</form>
	</div>
</div>
</div>
<?php foreach($students as $st): ?>
	<div class="modal fade" id="editStudentsModal<?= $st['id'];?>" tabindex="-1" role="dialog" aria-labelledby="editStudentsModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editStudentsModalLabel">Edit Student</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?= form_open_multipart('students/edit'); ?>
				<div class="modal-body">
					<input type="hidden" name="id" value="<?= $st['id']; ?>">
					<div class="form-group">
						<input type="text" class="form-control" id="nis" name="nis" value="<?= $st['nis']; ?>" readonly>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" value="<?= $st['name']; ?>">
					</div>
					<div class="form-group">
						<select name="class_id" id="class_id" class="form-control">
							<?php foreach($class as $sc): ?>
								<?php if ($sc['id'] == $st['class_id']) : ?>
									<option value="<?= $sc['id']; ?>" selected><?= $sc['class']; ?></option>
									<?php else : ?>
										<option value="<?= $sc['id']; ?>"><?= $sc['class']; ?></option>
									<?php endif ; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<select name="major_id" id="major_id" class="form-control">
								<?php foreach ($major as $smj) : ?>
									<?php if ($smj['id'] == $st['major_id']) : ?>
										<option value="<?= $smj['id']; ?>" selected><?= $smj['major']; ?></option>
										<?php else : ?>
											<option value="<?= $smj['id']; ?>"><?= $smj['major']; ?></option>
										<?php endif ; ?>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<img src="<?= base_url('assets/img/students/') . $st['photo']; ?>" class="img-thumbnail">
								</div>
								<div class="col-sm-9">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="photo" name="photo">
										<label class="custom-file-label" for="photo">Choose file</label>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php endforeach; ?>
		<?php foreach($students as $st): ?>
	<div class="modal fade" id="detailStudentsModal<?= $st['id'];?>" tabindex="-1" role="dialog" aria-labelledby="editStudentsModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="detailStudentsModalLabel">Detail Student</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?= form_open_multipart('students/detail'); ?>
				<div class="modal-body">
					<input type="hidden" name="id" value="<?= $st['id']; ?>">
					<div class="form-group">
						<input type="text" class="form-control" id="nis" name="nis" value="<?= $st['nis']; ?>" readonly>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" value="<?= $st['name']; ?>">
					</div>
					<div class="form-group">
						<select name="class_id" id="class_id" class="form-control">
							<?php foreach($class as $sc): ?>
								<?php if ($sc['id'] == $st['class_id']) : ?>
									<option value="<?= $sc['id']; ?>" selected><?= $sc['class']; ?></option>
									<?php else : ?>
										<option value="<?= $sc['id']; ?>"><?= $sc['class']; ?></option>
									<?php endif ; ?>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<select name="major_id" id="major_id" class="form-control">
								<?php foreach ($major as $smj) : ?>
									<?php if ($smj['id'] == $st['major_id']) : ?>
										<option value="<?= $smj['id']; ?>" selected><?= $smj['major']; ?></option>
										<?php else : ?>
											<option value="<?= $smj['id']; ?>"><?= $smj['major']; ?></option>
										<?php endif ; ?>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="row">
								<div class="col-sm-3">
									<img src="<?= base_url('assets/img/students/') . $st['photo']; ?>" class="img-thumbnail">
								</div>
								<div class="col-sm-9">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="photo" name="photo">
										<label class="custom-file-label" for="photo">Choose file</label>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php endforeach; ?>