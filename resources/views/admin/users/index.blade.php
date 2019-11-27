@extends('admin.layout.app')

@section('title', 'Users List')

@section('styles')
@parent

@endsection

@section('content')

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title">Users</h3>
			<span class="kt-subheader__separator kt-subheader__separator--v"></span>
			
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
					List of Users
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
						
					</div>
				</div>
			</div>
		</div>
		<div class="kt-portlet__body">

			<!--begin: Datatable -->
			<table class="table table-striped- table-bordered table-hover table-checkable" id="users_list">
				<thead>
					<tr>
						<th>No.</th>
						<th>User Image</th>
						<th>User name</th>
						<th>User Email</th>
						<th>User Mobile</th>
						<th>State</th>
						<th>City</th>
						<!-- <th>Locality</th> -->
						<th>Refferal Code</th>
						<th>Created At</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 0; ?>
                @foreach($randProduct as $user)
                <?php $i++ ?> 
					<tr>
						<td>1</td>
						
						<td>
							<div class="kt-widget__media">
								<img class="kt-widget__img kt-hidden-" src="{{ $user->uprofilepic }}" alt="image" style="width: 2.5rem; border-radius: 5px;">
								<div class="kt-widget__pic kt-widget__pic--warning kt-font-warning kt-font-boldest kt-hidden">
									TF
								</div>
							</div>
                    	</td>
                    	<td>{{ $user->uname }}</td>
                    	<td>{{ $user->uemail }}</td>
                    	<td>{{ $user->umobileno }}</td>
                    	<td>{{ $user->stateid }}</td>
                    	<td>{{ $user->cityid }}</td>
                    	
                    	<td>{{ $user->urefferalCode }}</td>
                    	<td>{{ $user->created_at }}</td>
						<td>
							<a href="" class="btn btn-label-info">
								<i class="flaticon-eye p-0"></i>
							</a>
							
							<!-- <form action="" method="POST" class="category_delete_form">
								@csrf
								@method('DELETE')								
								<button type="submit" class="btn btn-label-danger">
									<i class="flaticon-delete p-0"></i>
								</button >
							</form> -->
						</td>
					</tr>
					@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th>No.</th>
						<th>User Image</th>
						<th>User name</th>
						<th>User Email</th>
						<th>User Mobile</th>
						<th>State</th>
						<th>City</th>
						<!-- <th>Locality</th> -->
						<th>Refferal Code</th>
						<th>Created At</th>
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

<script type="text/javascript" src="{{ asset('assets/js/admin/users.js') }}"></script>
	
@endsection
