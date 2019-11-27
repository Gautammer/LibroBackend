@extends('admin.layout.app')

@section('title', 'Users View')

@section('styles')
@parent

@endsection

@section('content')

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title"> Users View</h3>
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
					<!-- <div class="kt-widget4__pic kt-widget4__pic--pic">
							<img src="https://keenthemes.com/metronic/themes/metronic/theme/default/demo1/dist/assets/media/users/100_4.jpg" alt="users_image" style=" width: 3.5rem;border-radius: 4px;">   
						</div>
					   <h3 class="kt-widget4__username" style="margin-top: 6px;margin-left: 8px;">
						 Amanna Thakor
					</h3>
					-->
			</div>
			<!--begin::Form-->
			<!-- <form class="category_edit_form" action="" method="post"> -->
			<!-- 	<div class="kt-portlet__body">
					<div class="form-group m-0">
						
						<label for="cname">Users Name</label>
						
					</div>
					
				</div> -->

				<div class="kt-portlet kt-portlet--height-fluid">
            <div class="kt-portlet__head kt-portlet__head--noborder">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">

                    </h3>
                </div>
                
            </div>
            <div class="kt-portlet__body">
                <!--begin::Widget -->
                <div class="kt-widget kt-widget--user-profile-2">
                    <div class="kt-widget__head">
                        <div class="kt-widget__media">
                            <img class="kt-widget__img kt-hidden-" src="https://keenthemes.com/metronic/themes/metronic/theme/default/demo1/dist/assets/media/users/100_4.jpg" alt="image" >
                            <div class="kt-widget__pic kt-widget__pic--warning kt-font-warning kt-font-boldest kt-hidden">
                                TF
                            </div>
                        </div>

                        <div class="kt-widget__info">
                            <a href="#" class="kt-widget__username">
                                Teresa Fox                                              
                            </a>

                            
                        </div>
                    </div>

                    <div class="kt-widget__body">
                                            

                        <div class="kt-widget__item">
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">Email:</span>
                                <a href="#" class="kt-widget__data">jason@fifestudios.com</a>
                            </div>
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">Phone:</span>
                                <a href="#" class="kt-widget__data">+91 87545243</a>
                            </div>
                            <div class="kt-widget__contact">
                                <span class="kt-widget__label">Location:</span>
                                <span class="kt-widget__data">India</span>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="kt-widget__footer">
                        <button type="button" class="btn btn-label-success btn-lg btn-upper">write message</button>
                    </div> -->
                </div>              
                 
                <!--end::Widget -->
            </div>
        </div>
				<!-- <div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<button type="submit" class="btn btn-label-success">Update</button>
						<a href="{{ URL::previous() }}" class="btn btn-secondary">Cancel</a>
					</div>
				</div> -->
			<!-- </form> -->
			<!--end::Form-->			
		</div>
		<!--end::Portlet-->

		
	</div>
	</div>
	<!--End::Dashboard 1-->
</div>
</div>
<!-- end:: Content -->

<!-- order Histroy -->

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<div class="kt-portlet kt-portlet--mobile">
		<div class="kt-portlet__head kt-portlet__head--lg">
			<div class="kt-portlet__head-label">
				<span class="kt-portlet__head-icon">
					<i class="kt-font-brand flaticon2-line-chart"></i>
				</span>
				<h3 class="kt-portlet__head-title">
					List of Orders
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
						<!-- <a href="{{ route('admin.users.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
							<i class="la la-plus"></i>
							New Record
						</a> -->
					</div>
				</div>
			</div>
		</div>
		<div class="kt-portlet__body">

			<!--begin: Datatable -->
			<table class="table table-striped- table-bordered table-hover table-checkable" id="category_list">
				<thead>
					<tr>
						<th>No.</th>
						<th>Order name</th>
						<th>Date</th>
						
					</tr>
				</thead>
				<tbody>
					
					<tr>
						<td>1</td>
						<td>Telivion</td>
						<td>12/12/12</td>
						
							
							<!-- <form action="" method="POST" class="category_delete_form">
								@csrf
								@method('DELETE')								
								<button type="submit" class="btn btn-label-danger">
									<i class="flaticon-delete p-0"></i>
								</button >
							</form> -->
						</td>
					</tr>
					
				</tbody>
				<tfoot>
					<tr>
						<th>No.</th>
						<th>Category name</th>
						<th>Date</th>
						
					</tr>
				</tfoot>
			</table>

			<!--end: Datatable -->
		</div>
	</div>
</div>

@endsection

@section('scripts')
@parent

<script type="text/javascript" src="{{ asset('assets/js/admin/category.js') }}"></script>
	
@endsection
