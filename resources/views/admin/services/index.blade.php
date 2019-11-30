@extends('admin.layout.app')

@section('title', 'Services List')

@section('styles')
@parent

@endsection

@section('content')

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">Services</h3>
			<span class="kt-subheader__separator kt-subheader__separator--v"></span>
			<a href="" class="btn btn-label-warning btn-bold btn-sm btn-icon-h kt-margin-l-10">
				Add New
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
					List of Services
				</h3>
			</div>
			<div class="kt-portlet__head-toolbar">
				<div class="kt-portlet__head-wrapper">
					<div class="kt-portlet__head-actions">
						<div class="dropdown dropdown-inline">
							<button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-download"></i> Export
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<ul class="kt-nav">
									<li class="kt-nav__section kt-nav__section--first">
										<span class="kt-nav__section-text">Choose an option</span>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon la la-print"></i>
											<span class="kt-nav__link-text">Print</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon la la-copy"></i>
											<span class="kt-nav__link-text">Copy</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon la la-file-excel-o"></i>
											<span class="kt-nav__link-text">Excel</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon la la-file-text-o"></i>
											<span class="kt-nav__link-text">CSV</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="#" class="kt-nav__link">
											<i class="kt-nav__link-icon la la-file-pdf-o"></i>
											<span class="kt-nav__link-text">PDF</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
						&nbsp;
						<a href="{{ route('admin.services.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
							<i class="la la-plus"></i>
							New Record
						</a>
					</div>
				</div>
			</div>
		</div>
		@if (session()->has('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>	
			<strong style="margin-left: 4px;">{{ session('success') }}</strong>
		</div>
		@endif
		<div class="kt-portlet__body">

			<!--begin: Datatable -->
			<table class="table table-striped- table-bordered table-hover table-checkable" id="services_list">
				<thead>
					<tr>
						<th>No.</th>
						<th>services name</th>
						<th>Category</th>
						<th>Sub Category</th>
						<th>Product</th>
						<th>state</th>
						<th>City</th>
						<th>Service Details</th>
						<th>Create At</th>					
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($listServices as $k => $lser)
					<tr>
						<td>{{ $k + 1 }}</td>
						<td>{{ $lser->sname }}</td>
						@foreach($lser->cid as $ls)
						<td>{{ $ls->cname }}</td>
						@endforeach
						@foreach($lser->scid as $ls)
						<td>{{ $ls->scname }}</td>
						@endforeach
						@foreach($lser->pcid as $ls)
						<td>{{ $ls->pcname }}</td>
						@endforeach
						@foreach($lser->stateid as $ls)
						<td>{{ $ls->statename }}</td>
						@endforeach
						@foreach($lser->cityid as $ls)
						<td>{{ $ls->cityname }}</td>
						@endforeach
						<td>{{ $lser->sdetails }}</td>
						<td>{{ $lser->created_at }}</td>
						
						<td>
							<a href="{{ route('admin.services.edit',$lser->sid) }}" class="btn btn-label-info">
								<i class="flaticon-edit p-0"></i>
							</a>
							
							<!-- <form action="" method="POST" class="services_delete_form">
								@csrf
								@method('DELETE') -->								
								<button type="submit" class="btn btn-label-danger">
									<i class="flaticon-delete p-0"></i>
								</button >
							<!-- </form> -->
						</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th>No.</th>
						<th>services name</th>
						<th>Category</th>
						<th>Sub Category</th>
						<th>Product</th>
						<th>state</th>
						<th>city</th>
						<th>Service Details</th>
						<th>Create At</th>					
						<th>Action</th>
					</tr>
				</tfoot>
			</table>

			<!--end: Datatable -->
		</div>
	</div>
	<!--End::Dashboard 1-->
</div>
<!-- end:: Content -->

@endsection

@section('scripts')
@parent

<script type="text/javascript" src="{{ asset('assets/js/admin/services.js') }}"></script>
	
@endsection
