@extends('admin.layout.app')

@section('title', 'Orders View')

@section('styles')
@parent

@endsection

@section('content')

<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-subheader__main">
			<h3 class="kt-subheader__title"> Orders View</h3>
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
						 Orders View
					</h3>
				</div>
			</div>


			<!--begin::Form-->
			<div class="col-xl-4">
        <!--begin:: Portlet-->
        <div class="kt-portlet kt-portlet--height-fluid">            
            <div class="kt-portlet__body kt-portlet__body--fit">
                <!--begin::Widget -->
                <div class="kt-widget kt-widget--project-1">
                    <div class="kt-widget__head d-flex">
                        <div class="kt-widget__label">
                            <div class="kt-widget__media kt-widget__media--m">
                                <span class="kt-media kt-media--md kt-media--circle kt-hidden-"> 
                                    <img src="http://localhost/jigo/LibroServiceApp/storage/img/users/3.png" alt="image">
                                </span>
                                <span class="kt-media kt-media--md kt-media--circle kt-hidden"> 
                                    <img src="http://localhost/jigo/LibroServiceApp/storage/img/users/3.png" alt="image">
                                </span>
                            </div>
                            <div class="kt-widget__info kt-padding-0 kt-margin-l-15">
                                <a href="#" class="kt-widget__title">
                                    Nexa - Next generation SAAS                                                 
                                </a>
                                <span class="kt-widget__desc">
                                    Creates Limitless possibilities  
                                </span>
                            </div>
                        </div>
                        <div class="kt-widget__toolbar">
                            <!-- <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown">
                                <i class="flaticon-more-1"></i>
                            </a> -->
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                                <ul class="kt-nav">
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                            <span class="kt-nav__link-text">Reports</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-send"></i>
                                            <span class="kt-nav__link-text">Messages</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>
                                            <span class="kt-nav__link-text">Charts</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                            <span class="kt-nav__link-text">Members</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon2-settings"></i>
                                            <span class="kt-nav__link-text">Settings</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="kt-widget__body">
                        <span class="kt-widget__text kt-margin-t-0 kt-padding-t-5">
                            I distinguish three main text objecttives.First
                            your objective could be merely                             
                        </span>
                        
                        <div class="kt-widget__stats kt-margin-t-20">
                            <div class="kt-widget__item d-flex align-items-center kt-margin-r-30">
                                <span class="kt-widget__date kt-padding-0 kt-margin-r-10">
                                    Start 
                                </span>
                                <div class="kt-widget__label">
                                    <span class="btn btn-label-brand btn-sm btn-bold btn-upper">07 may, 18</span>
                                </div>
                            </div>
                            <div class="kt-widget__item d-flex align-items-center kt-padding-l-0">
                                <span class="kt-widget__date kt-padding-0 kt-margin-r-10 ">
                                    Due
                                </span>
                                <div class="kt-widget__label">
                                    <span class="btn btn-label-danger btn-sm btn-bold btn-upper">07 0ct, 18</span>
                                </div>
                            </div>
                        </div>
                        <div class="kt-widget__container">
                            <span class="kt-widget__subtitel">Progress</span>
                            <div class="kt-widget__progress d-flex align-items-center flex-fill">
                                <div class="progress" style="height: 5px;width: 100%;">
                                    <div class="progress-bar kt-bg-success" role="progressbar" style="width: 78%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="kt-widget__stat">
                                    78%
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="kt-widget__footer">
                        <div class="kt-widget__wrapper">
                            <div class="kt-widget__section">
                                <div class="kt-widget__blog">
                                    <i class="flaticon2-list-1"></i>
                                    <a href="#" class="kt-widget__value kt-font-brand">64 Tasks</a>
                                </div>
                                <div class="kt-widget__blog">
                                    <i class="flaticon2-talk"></i>
                                    <a href="#" class="kt-widget__value kt-font-brand">654 Comments</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Widget -->    
            </div>
        </div>
        <!--end:: Portlet-->
    </div>
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
