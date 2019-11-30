@extends('admin.layout.app')

@section('title', 'Add New Product Category')

@section('styles')
@parent

@endsection

@section('content')

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title"> Add New Product Category</h3>
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
		<div class="col-md-6">
		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						Add a New Product Category
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<form class="kt-form" action="{{ route('admin.ProductCategory.store') }}" method="post" enctype="multipart/form-data">
				<div class="kt-portlet__body">
					<div class="form-group m-0">
						@csrf
						<label for="pcname">Product Category Name</label>
						<input type="text" class="form-control @if($errors->has('pcname')) is-invalid @endif" id="pcname" name="pcname" placeholder="Enter ProductCategory Name" value="{{ old('pcname') }}">
						@if($errors->has('pcname'))
							<div class="invalid-feedback">{{ $errors->first('pcname') }} </div>
						@endif
						<span class="form-text text-muted">Please Enter ProductCategory name here,ProductCategory must be unique.</span>
						<br>
						<label for="cname">Selecte SubCategory</label>
						
							<select class="form-control kt-select2 @if($errors->has('scid')) is-invalid @endif" id="subCategory_select" name="scid">
								<option disabled selected value>Selecte SubCategory Name</option>				
								@foreach($Subcategories as $cat)
							    <option value="{{ $cat->scid }}">{{ $cat->scname }}</option>				
								@endforeach
							</select>
					@if($errors->has('scid'))
							<div class="invalid-feedback">{{ $errors->first('scid') }} </div>
						@endif
						<br>
						<label for="pcimg" style="margin-top: 3px;">Product Category Image</label>
						<input style="margin-bottom:5px;" type="file" style="" class="form-control @if($errors->has('pcimg')) is-invalid @endif" id="pcimg" name="pcimg" accept="image/*"/>                    
						@error('pcimg')
							<span class="invalid-feedback" role="alert">
								{{ $message }}
							</span>
						@enderror
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

	<script src="{{ asset('assets/js/pages/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/js/admin/SubCategory.js') }}"></script>
	
@endsection
