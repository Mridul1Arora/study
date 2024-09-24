<!DOCTYPE HTML>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template" data-style="light">
  <head>
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />
        <script src="../../assets/vendor/libs/jquery/jquery.js"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet" />
        <title>@yield('title')</title>

        <!-- Icons -->
        <link rel="stylesheet" href="../../assets/vendor/fonts/remixicon/remixicon.css" />
        <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

        <!-- Menu waves for no-customizer fix -->
        <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
        <!-- Icons -->
        <link rel="stylesheet" href="../../assets/vendor/fonts/remixicon/remixicon.css" />
        <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="../../assets/css/demo.css" />
        <link rel="stylesheet" href="../../assets/css/custom-css.css" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/fullcalendar/fullcalendar.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/flatpickr/flatpickr.css" />
        <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
        <meta charset="utf-8" />
      <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
      <meta name="description" content="" />

      <!-- Row Group CSS -->
      <link rel="stylesheet" href="../../assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css" />
      <!-- Form Validation -->
      <link rel="stylesheet" href="../../assets/vendor/libs/@form-validation/form-validation.css" />

      <!-- Helpers -->
      <script src="../../assets/vendor/js/helpers.js"></script>
      <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
      <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
      <!-- <script src="../../assets/vendor/js/template-customizer.js"></script> -->
      <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
      <script src="../../assets/js/config.js"></script>
  </head>
    <body>
        <!-- Include JS files here -->
        <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
        <script src="../../assets/vendor/libs/popper/popper.js"></script>
        <script src="../../assets/vendor/js/bootstrap.js"></script>
        <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
        <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
        <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
        <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
        <script src="../../assets/vendor/js/menu.js"></script>

        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="../../assets/vendor/js/dropdown-hover.js"></script>
        <script src="../../assets/vendor/js/mega-dropdown.js"></script>
        <script src="../../assets/vendor/libs/select2/select2.js"></script>
        <script src="../../assets/vendor/libs/moment/moment.js"></script>
        <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>

        <!-- Main JS -->
        <script src="../../assets/js/main.js"></script>

        <!-- Page JS -->
        <script src="../../assets/js/ui-navbar.js"></script>
        @include('layout.partials.header')
        
        <div class="container-fluid">
          @yield('content')
        </div>     


        <!-- Main JS -->
        <script src="../../assets/js/main.js"></script>

    <!-- Page Specific JS -->
    <script src="../../assets/js/ui-navbar.js"></script>
    <script src="../../assets/js/tables-datatables-basic.js"></script>
  </body>
</html>