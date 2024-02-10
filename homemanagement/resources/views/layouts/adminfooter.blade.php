	<!--Start Footer Section-->
	<footer class="mt-5">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-10 col-md-8 ms-auto">
					<div class="row border-top pt-3">
						
						<div class="col-lg-6 text-center">
							<ul class="list-inline">
								<li class="list-inline-item me-2"><a href="javascript:void(0);" class="text-dark">Data Land Technology Co.,Ltd</a></li>

								<li class="list-inline-item me-2"><a href="javascript:void(0);" class="text-dark">About</a></li>

								<li class="list-inline-item me-2"><a href="javascript:void(0);" class="text-dark">Contact</a></li>
							</ul>
						</div>

						<div class="col-lg-6 text-center">
							<p>&copy; <span id="getyear"></span>Copyright,All Right Reserved</p>
						</div>

					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--End Footer Section-->




	<!-- bootstrap css1 js1 -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
		crossorigin="anonymous"></script>

	<!-- jquery js1 -->
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" type="text/javascript"></script>

	<!-- jqueryui css1 js1 -->
	<script src="{{asset('assets/libs/jquery-ui-1.13.2.custom/jquery-ui.min.js')}}" type="text/javascript"></script>

	<!-- Google Chart -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<!-- Chartjs js1 -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<!-- Raphael must be included before justgage -->
	<!-- https://github.com/toorshia/justgage -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.2.9/justgage.min.js"></script>

	<!-- custom js js1 -->
	<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    {{-- toastr css 1 js 1  --}}
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
     <script type="text/javascript">
	    toastr.options = {
			'porgressBar':true,
			'closeButton':true
		}	 
	 </script>
	<script>
		@if(Session::has('success'))
		  toastr.success('{{session()->get('success')}}')
		   

		@endif

		@if(session()->has('info'))
		  toastr.info('{{session()->get('info')}}')
		   

		@endif

		@if($errors)
		  @foreach($errors->all() as $error)
		    toastr.error('{{$error}}', 'Inconceivable!',{timeOut:3000}) 

		  @endforeach

		@endif

	</script>
	{{-- extra js --}}
	@yield('script');

</body>

</html>