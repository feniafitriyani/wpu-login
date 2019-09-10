<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('message'); ?>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">
			<?= form_open_multipart('transaction'); ?>
			<div class="input-group mb-3">
				<input type="text" class="form-control" name="nis" placeholder="NIS">
				<div class="input-group-append">
					<button class="btn btn-primary" type="button" id="button-addon2">Search</button>
				</div>
			</div>
		</form>
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Class</th>
					<th scope="col">Major</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailModalLabel">Detail</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('transaction'); ?>
			<div class="modal-body">
				<div class="form-group row">
					<label for="dsp" class="col-sm-3 col-form-label">DSP</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="dsp" name="dsp" value="" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="uts" class="col-sm-3 col-form-label">UTS</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="uts" name="uts" value="" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="praktikum" class="col-sm-3 col-form-label">PRAKTIKUM</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="praktikum" name="praktikum" value="" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="un" class="col-sm-3 col-form-label">UN</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="un" name="un" value="" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label for="kunjin" class="col-sm-3 col-form-label">KUNJIN</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="kunjin" name="kunjin" value="" readonly>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Bayar</button>
			</div>
		</form>
	</div>
</div>
</div>