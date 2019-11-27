@extends('admin.layout.app')

@section('title', 'Edit '.$categorie->cname.' Category')

@section('styles')
@parent

@endsection

@section('content')

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title"> Edit Category</h3>
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
						Edit {{ $categorie->cname }} Category
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<form class="category_edit_form" action="{{ route('admin.category.update',['id'=>$categorie->cid]) }}" method="post">
				<div class="kt-portlet__body">
					<div class="form-group m-0">
						@csrf
						@method('PUT')
						<label for="cname">Category Name</label>
						<input type="text" class="form-control @if($errors->has('cname')) is-invalid @endif" id="cname" name="cname" placeholder="Enter Category Name" value="{{ old('cname') ? old('cname') : $categorie->cname  }}">
						@if($errors->has('cname'))
							<div class="invalid-feedback">Shucks, {{ $errors->first('cname') }}</div>
						@endif
						<span class="form-text text-muted">Please Enter Category name here,Category must be unique.</span>
						<br>
						<label for="exampleSelect1">Select City</label>
						<select class="form-control" id="cityid" name="cityid">
							<!-- <option>Select City</option> -->
							@foreach($cities as $city)
							<option value="{{ $city->cityid }}"
								<?php
								if($city->cityid == $categorie->cityid){
									echo "selected";
								}
								
								?>
								>{{ $city->cityname }}</option>
                 
							@endforeach
							
						</select>
						@if($errors->has('cityid'))
							<div class="invalid-feedback">{{ $errors->first('cityid') }}</div>
						@endif
					</div>
					
				</div>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<button type="submit" class="btn btn-label-success">Update</button>
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
	
@endsection
