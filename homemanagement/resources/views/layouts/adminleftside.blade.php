	<!--Start Left Navbar-->

	<div class="wrappers">
		<nav class="navbar navbar-expand-md navbar-light">
			<div id="nav" class="navbar-collapse collapse">
				<div class="container-fluid">
					<div class="row">

						<!-- Start Left Sidebar -->
						<div class="col-lg-2 col-md-3 fixed-top vh-100 overflow-auto sidebars">
							<ul class="navbar-nav flex-column mt-4">
								<li class="nav-item nav-categories ">Main</li>
								<li class="nav-item nav-categories"><a href="javascript:void(0);"
										class="nav-link text-white p-3 mb-2 sidebarlinks"><i
											class="fas fa-tachometer-alt fa-lg me-3"></i>Dashboard</a></li>

								<li class="nav-item">
									<a href="javascript:void(0);" class="nav-link text-white p-3 mb-2 sidebarlinks currents" data-bs-target="#pagelayout" data-bs-toggle="collapse">
										<i class="fas fa-file-alt fa-lg me-3"></i>Insert
										<i class="fas fa-angle-left mores"></i></a>

									   <ul id="pagelayout" class="collapse ps-2">
									    	<li>
                                               <a href="{{route('dailycosts.index')}}" class="nav-link text-white sidebarlinks">
                                                   <i class="fas fa-layer-group mx-3"></i>
								                   <span>Daily Cost</span>
                                               </a>
                                            </li>
									
								    	</ul>

								</li>

								<li class="nav-item"><a href="javascript:void(0);"
										class="nav-link text-white p-3 mb-2 sidebarlinks"
										data-bs-target="#sidebarlayout" data-bs-toggle="collapse"><i
											class="fas fa-file-alt fa-lg me-3"></i>History<i
											class="fas fa-angle-left mores"></i></a>

									<ul id="sidebarlayout" class="collapse ps-2">
										<li><a href="{{route('trashes.index')}}" class="nav-link text-white sidebarlinks"><i
													class="fas fa-trash-alt me-4"></i>Trash</a></li>
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Icon Menu</a></li>
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Sidebar Hidden</a></li>
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Sidebar overlay</a>
										</li>
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Sidebar Fixed</a></li>

									</ul>

								</li>

								<li class="nav-item nav-categories">Widgets</li>

								<li class="nav-item nav-categories">UI Features</li>

								<li class="nav-item"><a href="javascript:void(0);"
										class="nav-link text-white p-3 mb-2 sidebarlinks" data-bs-target="#basicui"
										data-bs-toggle="collapse"><i class="fas fa-file-alt fa-lg me-3"></i>Basic UI
										Element<i class="fas fa-angle-left mores"></i></a>

									<ul id="basicui" class="collapse ps-2">
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Accordions</a></li>
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Buttons</a></li>
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Badges</a></li>
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Breadcrumbs</a></li>
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Dropdowns</a></li>

									</ul>

								</li>

								<li class="nav-item"><a href="javascript:void(0);"
										class="nav-link text-white p-3 mb-2 sidebarlinks" data-bs-target="#advanceui"
										data-bs-toggle="collapse"><i class="fas fa-file-alt fa-lg me-3"></i>Advance UI<i
											class="fas fa-angle-left mores"></i></a>

									<ul id="advanceui" class="collapse ps-2">
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Clipboard</a></li>
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Sliders</a></li>
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Carousel</a></li>
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Loaders</a></li>
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Tree Views</a></li>

									</ul>

								</li>

								<li class="nav-item nav-categories">Users</li>

								<li class="nav-item"><a href="javascript:void(0);"
										class="nav-link text-white p-3 mb-2 sidebarlinks" data-bs-target="#iconselement"
										data-bs-toggle="collapse"><i class="fas fa-file-alt fa-lg me-3"></i>Members<i
											class="fas fa-angle-left mores"></i></a>

									<ul id="iconselement" class="collapse ps-2">
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>All Members</a></li>
								
									</ul>

								</li>

								<li class="nav-item nav-categories">Editors</li>

								<li class="nav-item nav-categories">Text Editors</li>

								<li class="nav-item nav-categories">Code Editors</li>

								<li class="nav-item nav-categories">Date Representation</li>

								<li class="nav-item"><a href="javascript:void(0);"
										class="nav-link text-white p-3 mb-2 sidebarlinks" data-bs-target="#chartelement"
										data-bs-toggle="collapse"><i class="fas fa-file-alt fa-lg me-3"></i>Fix Analysis<i
											class="fas fa-angle-left mores"></i></a>

									<ul id="chartelement" class="collapse ps-2">
										<li><a href="{{route('categories.index')}}" class="nav-link text-white sidebarlinks"><i
											class="fas fa-long-arrow-alt-right me-4"></i>Category</a></li>
										<li><a href="{{route('statuses.index')}}" class="nav-link text-white sidebarlinks">
											<i class="fas fa-long-arrow-alt-right me-4"></i>Status</a></li>									
									</ul>

								</li>

								<li class="nav-item"><a href="javascript:void(0);"
										class="nav-link text-white p-3 mb-2 sidebarlinks" data-bs-target="#tableelement"
										data-bs-toggle="collapse"><i class="fas fa-file-alt fa-lg me-3"></i>Tables<i
											class="fas fa-angle-left mores"></i></a>

									<ul id="tableelement" class="collapse ps-2">
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Basic Table</a></li>
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Data Table</a></li>
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Sortable table</a></li>
									</ul>

								</li>

								<li class="nav-item"><a href="javascript:void(0);"
										class="nav-link text-white p-3 mb-2 sidebarlinks" data-bs-target="#mapelement"
										data-bs-toggle="collapse"><i class="fas fa-file-alt fa-lg me-3"></i>Maps<i
											class="fas fa-angle-left mores"></i></a>

									<ul id="mapelement" class="collapse ps-2">
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Google Map</a></li>
										<li><a href="javascript:void(0);" class="nav-link text-white sidebarlinks"><i
													class="fas fa-long-arrow-alt-right me-4"></i>Vector Map</a></li>
									</ul>

								</li>

							</ul>
						</div>
						<!-- End Left Sidebar -->

						<!-- Start Top Sidebar -->
            @include('layouts.adminnavbar')

						<!-- End Top Sidebar -->
					</div>

				</div>
			</div>
		</nav>
	</div>


	<!--End Left Navbar-->