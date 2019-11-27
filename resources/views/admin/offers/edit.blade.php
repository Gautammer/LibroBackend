@extends('admin.layout.app')

@section('title', 'Edit Offers')

@section('styles')
@parent

@endsection

@section('content')

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title"> Edit Offers</h3>
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
						Edit  Offers
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<form class="kt-form" action="" method="post">
				<div class="kt-portlet__body">
					<div class="form-group m-0">
						@csrf
						<label for="oname">Offers Name</label>
						<input type="text" class="form-control" id="oname" name="oname" placeholder="Enter Offer Name" value=""><br>

						<label for="onum">Offers Number</label>
						<input type="number" class="form-control" id="onum" name="onum" placeholder="Enter Offers Number" value=""><br>
						

						<label for="role">Role</label>
						<input type="text" class="form-control" id="role" name="role" placeholder="Enter role" value=""><br>
						

						<label for="oCode">Offers Code</label>
						<input type="text" class="form-control" id="oCode" name="oCode" placeholder="Enter Offer code" value=""><br>
						

						<label for="per">Percentage</label>
						<input type="text" class="form-control" id="per" name="per" placeholder="Enter Percentage" value=""><br>

						<!-- <div class="form-group row"> -->
							<label for="exdate">Select Expire Date</label>
							<input type="date" name="exdate" class="form-control" id="exdate" placeholder="Enter a Expire Date" value="">

							<span class="text-danger"></span>

							<!-- </div> -->
							<br>
						<!-- </div> -->
						<!-- <div class="col-lg-12 col-xl-12"> -->
							<label for="exdate">Enter Mobile</label>
							<div class="input-group">
								<div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
								<input type="text" class="form-control" value="" placeholder="Enter Phone" aria-describedby="basic-addon1">
							</div>
							
					</div></br>

					<label for="exampleSelect1">Example select</label>
						<select class="form-control" id="exampleSelect1">
							<option>Select Status</option>
							<option>Active</option>
							<option>Deactive</option>
							
						</select>

						<label class="col-lg-3 col-form-label">Select Image</label>

						<div class="custom-file">
							<input type="file" class="custom-file-input" id="customFile">
							<label class="custom-file-label selected" for="customFile">Select Image File</label>
						</div>
					</div>
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="submit" class="btn btn-label-brand">Submit</button>
							<a href="{{ URL::previous() }}" class="btn btn-secondary">Cancel</a>
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
<script type="text/javascript">
$(document).ready(function(){
  $('#expire_date').datepicker({ dateFormat: 'dd/mm/yy' }).val();
});
</script>
	
@endsection
