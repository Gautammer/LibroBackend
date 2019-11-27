@extends('admin.layout.app')

@section('title', 'Edit Services')

@section('styles')
@parent

@endsection

@section('content')

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title"> Edit Services</h3>
			<span class="kt-subheader__separator kt-subheader__separator--v"></span>
			<a href="{{ URL::previous() }}" class="btn btn-outline-secondary btn-bold btn-sm btn-icon-h kt-margin-l-10">
				Back
			</a>

		</div>

	</div>
</div>

<!-- end:: Content Head -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<!--Begin::Dashboard 1-->
	<div class="row">
		<div class="col-md-12">
		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Edit  Services
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<form class="kt-form" action="" method="post">
				<div class="kt-portlet__body">
					<div class="form-group m-0">
						@csrf
						<label for="sname">Service Name</label>
						<input type="text" class="form-control" id="sname" name="sname" placeholder="Enter Service Name" value=""><br>

						<label for="category">Category</label>
						<select class="form-control" id="category">
							<option>Select Category</option>
							<option>Electonics</option>
							<option>Home Asse.</option>
							
						</select><br>
						

						<label for="subcategory">Sub Category</label>
						<select class="form-control" id="subcategory">
							<option>Select sub category</option>
							<option>AC</option>
							<option>Wall</option>
							
						</select><br>
						

						<label for="product">Product</label>
						<select class="form-control" id="product">
							<option>Select Product</option>
							<option>Lg</option>
							<option>Jio</option>
							
						</select><br>
						
						<label for="state">State</label>
						<select class="form-control" id="state">
							<option>Select State</option>
							<option>Ahemdabad</option>
							<option>Surat</option>
							
						</select><br>

						<label for="sdetails">Service Details</label>
						<textarea class="form-control" id="sdetails" name="sdetails" rows="3" placeholder="Enter Service Details" value=""></textarea><br>

						<label for="spstatus">Special Status</label>
						<select class="form-control" id="spstatus">
							<option>Select Status</option>
							<option>0</option>
							<option>1</option>
							
						</select><br>

						<label for="sstatus">Service Status</label>
						<select class="form-control" id="sstatus">
							<option>Select Service Status</option>
							<option>Active</option>
							<option>Deactive</option>
							
						</select><br>

						<label class="col-lg-3 col-form-label">Select Image</label>

						<div class="custom-file">
							<input type="file" class="custom-file-input" id="customFile">
							<label class="custom-file-label selected" for="customFile">Select Image File</label>
						</div>
							<span class="form-text text-muted">Max file size is 1MB and max number of files is 5.</span>
						<!-- </div> -->
						<!-- <div class="form-group row"> -->
							
					<!-- </div> -->
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="submit" class="btn btn-label-brand">Submit</button>
							<a href="{{ URL::previous() }}" class="btn btn-secondary">Cancel</a>
						</div>
					</div>
				</div>
				</form>
			<!--end::Form-->			
		</div>
		<!--end::Portlet-->

		
	</div>
	</div>
	<!--End::Dashboard 1-->
</div>
<!-- end:: Content -->

@endsection

@section('scripts')
@parent

<script type="text/javascript" src="{{ asset('assets/js/admin/category.js') }}"></script>
	
@endsection
