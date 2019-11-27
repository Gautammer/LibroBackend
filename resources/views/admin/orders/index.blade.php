@extends('admin.layout.app')

@section('title', 'Orders List')

@section('styles')
@parent

@endsection

@section('content')

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">Ordres</h3>
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
					List of Ordres
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
						<!-- <a href="{{ route('admin.category.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
							<i class="la la-plus"></i>
							New Record
						</a> -->
					</div>
				</div>
			</div>
		</div>
		<div class="kt-portlet__body">

			<!--begin: Datatable -->
			<table class="table table-striped- table-bordered table-hover table-checkable" id="orders_list">
				<thead>
					<tr>
						<th>No.</th>
						<th>Order name</th>
						<th>Order By</th>
						<th>Order Address</th>
						<th>Date</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
					<tr>
						<td>1</td>
						<td>Tv</td>
						<td>MAster</td>
						<td>Bhavngar</td>
						<td>12/10/2020</td>
						<td>
							<a href="http://localhost:8000/admin/orders/viewOrder" class="btn btn-label-info">
								<i class="flaticon-eye p-0"></i>
							</a>
							<button type="submit" class="btn btn-label-warning">
									<!-- <i class="flaticon-collaboration p-0"></i> -->
									Assign
								</button >
						</td>
					</tr>
					
				</tbody>
				<tfoot>
					<tr>
						<th>No.</th>
						<th>Order name</th>
						<th>Order By</th>
						<th>Order Address</th>
						<th>Date</th>
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

<script type="text/javascript" src="{{ asset('assets/js/admin/orders.js') }}"></script>
	
@endsection
