@extends('admin.layout.app')

@section('title', 'Edit SubCategory')

@section('styles')
@parent

@endsection

@section('content')

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title"> Edit SubCategory</h3>
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
						Edit {{ $Subcategorie->scname }} SubCategory
					</h3>
				</div>
			</div>
			<!--begin::Form-->
			<form class="category_edit_form" action="{{ route('admin.SubCategory.update',['id'=>$Subcategorie->scid]) }}" method="post">
				<div class="kt-portlet__body">
					<div class="form-group m-0">
						@csrf
						@method('PUT')
						
						<label for="scname">SubCategory Name</label>
						<input type="text" class="form-control @if($errors->has('scname')) is-invalid @endif" id="scname" name="scname" placeholder="Enter Category Name" value="{{ old('scname') ? old('scname') : $Subcategorie->scname  }}">
						@if($errors->has('scname'))
							<div class="invalid-feedback">Shucks, {{ $errors->first('scname') }}</div>
						@endif
						<span class="form-text text-muted">Please Enter SubCategory name here,SubCategory must be unique.</span>
						<br>
						<label for="cname">Selecte Category</label>
						
							<select class="form-control kt-select2 @if($errors->has('cid')) is-invalid @endif" id="subCategory_select" name="cid">
								<option disabled selected value>Selecte Category Name</option>				
								@foreach($categories as $cat)
							    <option value="{{ $cat->cid }}" <?php if($cat->cid == $Subcategorie->cid){ echo 'selected';} ?>>{{ $cat->cname }}</option>				
								@endforeach
							</select>
					@if($errors->has('cid'))
							<div class="invalid-feedback">{{ $errors->first('cid') }} </div>
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

<script type="text/javascript" src="{{ asset('assets/js/admin/SubCategory.js') }}"></script>
	
@endsection
