@include('layouts.adminheader')


	<!--Start Site Setting-->
	<div id="sitesettings" class="sitesettings">
		<div><a href="javascript:void(0);" id="sitetoggle"></a></div>
	</div>
	<!--End Site Setting-->

  @include('layouts.adminleftside')

	<!--Start Content Area-->
	<section class="mt-5">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-10 col-md-9 ms-auto">
            
                  @yield('content')




				</div>
			</div>
		</div>
	</section>
	<!--End Content Area-->

@include('layouts.adminfooter')