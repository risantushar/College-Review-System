<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Site Metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="#" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/front_end/interface/css/bootstrap.min.css')}}" />
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="{{asset('/front_end/interface/css/pogo-slider.min.css')}}" />
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('/front_end/interface/css/style.css')}}" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('/front_end/interface/css/responsive.css')}}" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('/front_end/interface/css/custom.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
    {{-- <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <img src="{{asset('/front_end/interface/images/loader.gif')}}" alt="#" />
        </div>
    </div>
    <!-- end loader --> --}}

    <!-- Start header -->
    @include('student.include.nav')
    <!-- End header -->
    
    <!-- Body section -->
    @yield('body')
    <!-- Body section end -->

     <!--Login Modal -->
     <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login Here</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <a href="{{route('student_login_page')}}" class="btn btn-primary">Student</a>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card">
                                <a href="{{route('admin_login_page')}}" class="btn btn-primary">Admin</a>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card">
                                <a href="{{route('authority_login_page')}}" class="btn btn-primary">Autority</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    @include('sweetalert::alert')

    {{-- Login Modal End --}}
    
    <!-- Start Footer -->
    @include('student.include.footer')
    {{-- End footer --}}

    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

    <!-- ALL JS FILES -->
    <script src="{{asset('/front_end/interface/js/jquery.min.js')}}"></script>
	<script src="{{asset('/front_end/interface/js/popper.min.js')}}"></script>
    <script src="{{asset('/front_end/interface/js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('/front_end/interface/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('/front_end/interface/js/jquery.pogo-slider.min.js')}}"></script>
    <script src="{{asset('/front_end/interface/js/slider-index.js')}}"></script>
    <script src="{{asset('/front_end/interface/js/smoothscroll.js')}}"></script>
    <script src="{{asset('/front_end/interface/js/form-validator.min.js')}}"></script>
    <script src="{{asset('/front_end/interface/js/contact-form-script.js')}}"></script>
    <script src="{{asset('/front_end/interface/js/isotope.min.js')}}"></script>
    <script src="{{asset('/front_end/interface/js/images-loded.min.js')}}"></script>
    <script src="{{asset('/front_end/interface/js/custom.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script>

(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});
    </script>
</body>

</html>