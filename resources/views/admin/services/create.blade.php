@extends('admin.layout.app')

@section('title', 'Add New Service')

@section('styles')
@parent

@endsection

@section('content')

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title"> Add New Service</h3>
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
	<div class="kt-portlet kt-portlet--mobile">
		<div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-label">
				<span class="kt-portlet__head-icon">
					<i class="kt-font-brand flaticon2-line-chart"></i>
				</span>
				<h3 class="kt-portlet__head-title">
					Add Services
				</h3>
			</div>
			
		</div>
		<div class="kt-portlet__body">
            <form method="POST" class="kt-form" action="{{ route('admin.services.store') }}" enctype="multipart/form-data" >
            @csrf
                <div class="row">
                    <div class="form-group  col-lg-6 col-md-6" >
                        <label for="pcname"> Service Name</label>
                        <input style="margin-bottom:5px;" type="text" style="" class="form-control @if($errors->has('sname')) is-invalid @endif" id="sname" name="sname" placeholder="Enter Service Name" value="{{ old('sname') }}" required>                    
                        <label for="cname">SubCategory Name</label>
						<select class="form-control kt-select2 @if($errors->has('cid')) is-invalid @endif" id="subcat" name="subcat" required>
								<option disabled selected value>Select SubCategory Name</option>
						</select>
					    <!-- <input style="margin-bottom:5px;" type="text" style="" class="form-control @if($errors->has('subcat')) is-invalid @endif" id="subcat" name="subcat" placeholder="Enter Subcategory Name" value="{{ old('subcat') }}" required>                     -->
                        <label for="pcname"> Service Details</label>
                        <textarea class="form-control" name="sdetail" class="form-control @if($errors->has('sdetail')) is-invalid @endif"  style="margin-bottom:5px;" id="exampleTextarea" rows="3" required>{{ old('locality') }}</textarea>
						<label for="cname">Locality Name</label>
						<select class="form-control kt-select2 @if($errors->has('locality')) is-invalid @endif" id="locality" name="locality[]" required multiple="multiple">
							<option disabled selected value>Select Locality</option>
						</select>
                        <label for="cname">Price</label>
						<input style="margin-bottom:5px;" type="text" style="" class="form-control @if($errors->has('price')) is-invalid @endif" id="price" name="price" placeholder="Enter Price " value="{{ old('price') }}" required>                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>	
                    <div class="form-group  col-lg-6 col-md-6">                
                    <label for="cname">Category Name</label>
					<select class="form-control kt-select2 @if($errors->has('cid')) is-invalid @endif" id="cname" name="cname" required>
								<option disabled selected value>Selecte Category Name</option>				
								@foreach($category as $cat)
							    <option value="{{ $cat->cid }}">{{ $cat->cname }}</option>				
								@endforeach
					</select>
                    <!-- <input style="margin-bottom:5px;" type="text" style="" class="form-control @if($errors->has('cname')) is-invalid @endif" id="cname" name="cname" placeholder="Enter Category Name" value="{{ old('cname') }}" required>                     -->
					<label for="cname">Product Category</label>
					<select class="form-control kt-select2 @if($errors->has('proname')) is-invalid @endif" id="proname" name="proname" required>
						<option disabled selected value>Select Product Category</option>
					</select>
					<label for="cname">City Name</label>
					<select class="form-control kt-select2 @if($errors->has('cityname')) is-invalid @endif" id="cityname" name="cityname" required>
						<option disabled selected value>Selecte City</option>				
						@foreach($cities as $city)
						<option value="{{ $city->cityid }}">{{ $city->cityname }}</option>				
						@endforeach
					</select>
                    <label for="cname" style=""> Images</label>
                    <input style="margin-bottom:5px;" name="img_upload[]" type="file" style="" class="form-control @if($errors->has('img_upload[]')) is-invalid @endif" id="img" name="img_upload[]" placeholder="Upload Image" accept="image/*" multiple required/>                    
					@error('img_upload[]')
						<span class="invalid-feedback" role="alert">
						  <strong>{{ $message }}</strong>
						</span>
					@enderror
                    <label for="cname">Special Price</label>
					<input style="margin-bottom:5px;" type="text" style="" class="form-control @if($errors->has('sprice')) is-invalid @endif" id="sprice" name="sprice" placeholder="Enter Special Service" value="{{ old('sprice') }}">                    
					<label for="partnerprice">Partner Price</label>
					<input style="margin-bottom:5px;" type="text" style="" class="form-control @if($errors->has('partnerprice')) is-invalid @endif" id="partnerprice" name="partnerprice" placeholder="Enter Partner Price " value="{{ old('partnerprice') }}" required>
					</div>
                </div>
            </form>
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
	<script>
		$('#cname').change(function() {
			var id = $(this).find(':selected').attr('value');
			var url = '{{ route("admin.services.subCategories", ":id") }}';
			url = url.replace(':id', id);
			$.ajax({
				type: 'GET',
				url: url,
				dataType: "text",
				success: function(data) {
					
					$('#subcat').html(data);
				}
			});
		});

		$('#subcat').change(function() {
			var id = $(this).find(':selected').attr('value');
			var url = '{{ route("admin.services.productCategory", ":id") }}';
			url = url.replace(':id', id);
			$.ajax({
				type: 'GET',
				url: url,
				dataType: "text",
				success: function(data) {
					console.log(data);
					
					$('#proname').html(data);
				}
			});
		});

		$('#cityname').change(function() {
			var id = $(this).val();
			var url = '{{ route("admin.services.getCities", ":id") }}';
			url = url.replace(':id', id);
			$.ajax({
				type: 'GET',
				url: url,
				dataType: "text",
				success: function(data) {
					console.log(data);
					
					$('#locality').html(data);
				}
			});
		});
	</script>
@endsection
