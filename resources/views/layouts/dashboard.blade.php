<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <title>Orion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="{{asset('admin/css/bootstrap-theme.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/fullcalendar/fullcalendar/fullcalendar.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{asset('admin/css/owl.carousel.css')}}" type="text/css">
    <link href="{{asset('admin/css/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/css/fullcalendar.css')}}">
    <link href="{{asset('admin/css/widgets.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/xcharts.min.css')}}" rel=" stylesheet">
    <link href="{{asset('admin/css/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">
    <link href="toastr.css" rel="stylesheet"/>
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
  </head>
  <body>
    <section id="container" class="">
      @include('admin.header')
        <aside>
          <div id="sidebar" class="nav-collapse">
            <ul class="sidebar-menu">
              <li class="active">
                <a class="" href="/dashboard/home">
                  <i class="icon_house_alt"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              <li>
                <a class="" href="{{route('category.new')}}">
                  <i class="fa fa-plus"></i>
                  <span>Create Category</span>
                  </a>
              </li>
              <li>
                <a class="" href="{{route('forum.new')}}">
                  <i class="fa fa-plus"></i>
                  <span>Create Forum</span>
                  </a>
              </li>
              <li>
                <a class="" href="/dashboard/users">
                  <i class="fa fa-users"></i>
                  <span>Users</span>
                  </a>
              </li>
              <li>
                <a class="" href="{{route('categories')}}">
                  <i class="fa fa-list-alt"></i>
                  <span>Categories</span>
                </a>
              </li>
              <li>
                <a class="" href="{{route('forums')}}">
                  <i class="fa fa-users"></i>
                  <span>Forums</span>
                </a>
              </li>
            </ul>
          </div>
        </aside>
        <div id="app">
          @yield('content')
        </div>  
    </section>
    <script>
      CKEDITOR.replace( 'editor1' );
    </script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('admin/js/jquery.js')}}"></script>
    <script src="{{asset('admin/js/jquery-ui-1.10.4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/jquery-knob/js/jquery.knob.js')}}"></script>
    <script src="{{asset('admin/js/jquery.sparkline.js')}}" type="text/javascript"></script>
    <script src="{{asset('admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
    <script src="{{asset('admin/js/owl.carousel.js')}}"></script>
    <script src="{{asset('admin/js/fullcalendar.min.js')}}"></script>
    <script src="{{asset('admin/assets/fullcalendar/fullcalendar/fullcalendar.js')}}"></script>
    <script src="{{asset('admin/js/calendar-custom.js')}}"></script>
    <script src="{{asset('admin/js/jquery.rateit.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.customSelect.min.js')}}"></script>
    <script src="{{asset('admin/assets/chart-master/Chart.js')}}"></script>
    <script src="{{asset('admin/js/scripts.js')}}"></script>
    <script src="{{asset('admin/js/sparkline-chart.js')}}"></script>
    <script src="{{asset('admin/js/easy-pie-chart.js')}}"></script>
    <script src="{{asset('admin/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('admin/js/xcharts.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.autosize.min.js')}}"></script>
    <script src="{{asset('admin/js/jquery.placeholder.min.js')}}"></script>
    <script src="{{asset('admin/js/gdp-data.js')}}"></script>
    <script src="{{asset('admin/js/morris.min.js')}}"></script>
    <script src="{{asset('admin/js/sparklines.js')}}"></script>
    <script src="{{asset('admin/js/charts.js')}}"></script>
    <script src="{{asset('admin/js/jquery.slimscroll.min.js')}}"></script>
    <script>
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });
      $(function() {
        $('select.styled').customSelect();
      });
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>
  </body>
  <script src="jquery.min.js"></script>
  <script src="toastr.js"></script>
  @toastr_render
</html>