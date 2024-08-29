
@extends('layout.app')

@section('title', 'Leads')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
            
            
<div class="row gx-6">

  <!-- Navigation -->
  <div class="col-12 col-lg-4">
    <div class="d-flex justify-content-between flex-column mb-4 mb-md-0">
      <h5 class="mb-4">Getting Started</h5>
      <ul class="nav nav-align-left nav-pills flex-column">
        <li class="nav-item mb-1">
          <a class="nav-link active waves-effect waves-light" href="javascript:void(0);">
            <i class="ri-store-2-line me-2"></i>
            <span class="align-middle">Store details</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link waves-effect waves-light" href="app-ecommerce-settings-payments.html">
            <i class="ri-bank-card-line me-2"></i>
            <span class="align-middle">Users</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link waves-effect waves-light" href="app-ecommerce-settings-checkout.html">
            <i class="ri-shopping-cart-line me-2"></i>
            <span class="align-middle">Checkout</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link waves-effect waves-light" href="app-ecommerce-settings-shipping.html">
            <i class="ri-car-line me-2"></i>
            <span class="align-middle">Shipping &amp; delivery</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link waves-effect waves-light" href="app-ecommerce-settings-locations.html">
            <i class="ri-map-pin-2-line me-2"></i>
            <span class="align-middle">Locations</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link waves-effect waves-light" href="app-ecommerce-settings-notifications.html">
            <i class="ri-notification-4-line me-2"></i>
            <span class="align-middle">Notifications</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <!-- /Navigation -->

  <!-- Options -->
  <div class="col-12 col-lg-8 pt-6 pt-lg-0">

    <div class="tab-content p-0">
      <!-- Store Details Tab -->
      <div class="tab-pane fade show active" id="store_details" role="tabpanel">


        <div class="card mb-6">
          <div class="card-header">
            <h5 class="card-title m-0">Profile</h5>
          </div>
          <div class="card-body">
            <div class="row mb-5 g-5">
              <div class="col-12 col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="text" class="form-control" id="ecommerce-settings-details-name" placeholder="John Doe" name="settingsDet" aria-label="settings Details">
                  <label for="ecommerce-settings-details-name">Store Name</label>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="tel" class="form-control phone-mask" id="ecommerce-settings-details-phone" placeholder="+(123) 456-7890" name="phone" aria-label="phone">
                  <label for="ecommerce-settings-details-phone">Phone Number</label>
                </div>
              </div>

              <div class="col-12 col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="email" class="form-control" id="ecommerce-settings-details-email" placeholder="johndoe@gmail.com" name="email" aria-label="email">
                  <label for="ecommerce-settings-details-email">Store contact email</label>
                </div>
              </div>

              <div class="col-12 col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="email" class="form-control" id="ecommerce-settings-sender-email" placeholder="johndoe@gmail.com" name="sender_email" aria-label="sender email">
                  <label for="ecommerce-settings-sender-email">Sender email</label>
                </div>
              </div>
            </div>

            <div class="alert d-flex align-items-center alert-warning mb-0 h6" role="alert">
              <span class="alert-icon me-4 rounded-3"><i class="ri-notification-3-line ri-22px"></i></span>
              Confirm that you have access to johndoe@gmail.com in sender email settings.
            </div>
          </div>
        </div>

        <div class="card mb-6">
          <div class="card-header">
            <h5 class="card-title m-0">Billing information</h5>
          </div>
          <div class="card-body">
            <div class="row g-5">
              <div class="col-12 col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="text" id="business-name" class="form-control" placeholder="Business name">
                  <label for="business-name">Legal business name</label>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-floating form-floating-outline form-floating-select2">
                  <div class="position-relative"><select id="country_region" class="select2 form-select select2-hidden-accessible" data-placeholder="United States" data-select2-id="country_region" tabindex="-1" aria-hidden="true">
                    <option value="" data-select2-id="2">United States</option>
                    <option value="Australia">Australia</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Brazil">Brazil</option>
                    <option value="Canada">Canada</option>
                    <option value="China">China</option>
                    <option value="France">France</option>
                    <option value="Germany">Germany</option>
                    <option value="India">India</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Japan">Japan</option>
                    <option value="Korea">Korea, Republic of</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Philippines">Philippines</option>
                    <option value="Russia">Russian Federation</option>
                    <option value="South Africa">South Africa</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Emirates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                  </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 343.328px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-country_region-container"><span class="select2-selection__rendered" id="select2-country_region-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">United States</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                  <label for="country_region">Country/region</label>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="text" id="bill_address" class="form-control" placeholder="Address">
                  <label for="bill_address">Address</label>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="text" id="apa_suite" class="form-control" placeholder="Apartment, suite, etc.">
                  <label for="apa_suite">Apartment, suite, etc.</label>
                </div>
              </div>
              <div class="col-12 col-md-4">
                <div class="form-floating form-floating-outline">
                  <input type="text" id="bill_city" class="form-control" placeholder="City">
                  <label for="bill_city">City</label>
                </div>
              </div>
              <div class="col-12 col-md-4">

                <div class="form-floating form-floating-outline">
                  <input type="text" id="bill_state" class="form-control" placeholder="State">
                  <label for="bill_state">State</label>
                </div>
              </div>
              <div class="col-12 col-md-4">
                <div class="form-floating form-floating-outline">
                  <input type="number" id="bill_pincode" class="form-control" placeholder="PIN Code" min="0" max="999999">
                  <label for="bill_pincode">PIN Code</label>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="card mb-6">
          <div class="card-header">
            <div class="card-title mb-0">
              <h5 class="mb-0">Time zone and units of measurement</h5>
              <p class="card-subtitle mt-0">Used to calculate product prices, shipping weighs, and order times.</p>
            </div>
          </div>
          <div class="card-body">
            <div class="row g-5">
              <div class="col-12">
                <div class="form-floating form-floating-outline form-floating-select2">
                  <div class="position-relative"><select id="timeZones" class="select2 form-select select2-hidden-accessible" data-placeholder="(GMT-12:00) International Date Line West" data-select2-id="timeZones" tabindex="-1" aria-hidden="true">
                    <option value="" data-select2-id="4">(GMT-12:00) International Date Line West</option>
                    <option value="-12">(GMT-12:00) International Date Line West</option>
                    <option value="-11">(GMT-11:00) Midway Island, Samoa</option>
                    <option value="-10">(GMT-10:00) Hawaii</option>
                    <option value="-9">(GMT-09:00) Alaska</option>
                    <option value="-8">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                    <option value="-8">(GMT-08:00) Tijuana, Baja California</option>
                    <option value="-7">(GMT-07:00) Arizona</option>
                    <option value="-7">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                    <option value="-7">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                    <option value="-6">(GMT-06:00) Central America</option>
                    <option value="-6">(GMT-06:00) Central Time (US &amp; Canada)</option>
                    <option value="-6">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                    <option value="-6">(GMT-06:00) Saskatchewan</option>
                    <option value="-5">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                    <option value="-5">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                    <option value="-5">(GMT-05:00) Indiana (East)</option>
                    <option value="-4">(GMT-04:00) Atlantic Time (Canada)</option>
                    <option value="-4">(GMT-04:00) Caracas, La Paz</option>
                  </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="3" style="width: 706.656px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-timeZones-container"><span class="select2-selection__rendered" id="select2-timeZones-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">(GMT-12:00) International Date Line West</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                  <label for="timeZones">Time Zone</label>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-floating form-floating-outline form-floating-select2">
                  <div class="position-relative"><select id="unitSystemDropdown" class="select2 form-select select2-hidden-accessible" data-placeholder="Metric" data-select2-id="unitSystemDropdown" tabindex="-1" aria-hidden="true">
                    <option value="" data-select2-id="6">Metric</option>
                    <option value="metric">Metric</option>
                    <option value="imperial">Imperial</option>
                    <option value="us">US Customary</option>
                    <option value="si">International System</option>
                  </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 343.328px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-unitSystemDropdown-container"><span class="select2-selection__rendered" id="select2-unitSystemDropdown-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Metric</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                  <label for="unitSystemDropdown">Metric</label>
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-floating form-floating-outline form-floating-select2">
                  <div class="position-relative"><select id="weightUnits" class="select2 form-select select2-hidden-accessible" data-placeholder="Kilograms" data-select2-id="weightUnits" tabindex="-1" aria-hidden="true">
                    <option value="" data-select2-id="8">Kilograms</option>
                    <option value="kg">Kilograms</option>
                    <option value="lb">Pounds</option>
                    <option value="g">Grams</option>
                    <option value="mg">Milligrams</option>
                  </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="7" style="width: 343.328px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-weightUnits-container"><span class="select2-selection__rendered" id="select2-weightUnits-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Kilograms</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                  <label for="weightUnits">Weight</label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card mb-6">
          <div class="card-header">
            <div class="card-title mb-0">
              <h5 class="mb-0">Store currency</h5>
              <p class="text-body mb-0">The currency your products are sold in.</p>
            </div>
          </div>
          <div class="card-body">
            <div>
              <div class="form-floating form-floating-outline form-floating-select2">
                <div class="position-relative"><select id="currency-store" class="select2 form-select select2-hidden-accessible" data-placeholder="Store currency" data-select2-id="currency-store" tabindex="-1" aria-hidden="true">
                  <option value="" data-select2-id="10">Store Currency</option>
                  <option value="usd">USD</option>
                  <option value="euro">Euro</option>
                  <option value="pound">Pound</option>
                  <option value="bitcoin">Bitcoin</option>
                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="9" style="width: 706.656px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-currency-store-container"><span class="select2-selection__rendered" id="select2-currency-store-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Store currency</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                <label for="currency-store">Store currency</label>
              </div>
            </div>
          </div>
        </div>

        <div class="card mb-6">
          <div class="card-header">
            <div class="card-title mb-0">
              <h5 class="mb-0">Order id format</h5>
              <p class="text-body mb-0">Shown on the Orders page, customer pages, and customer order notifications to identify orders.</p>
            </div>
          </div>
          <div class="card-body">
            <div class="row g-5">
              <div class="col-12 col-md-6">
                <div class="input-group input-group-merge">
                  <span class="input-group-text">#</span>
                  <div class="form-floating form-floating-outline">
                    <input type="number" class="form-control" id="ecommerce-settings-details-prefix" name="prefix" aria-label="Prefix" min="0">
                    <label for="ecommerce-settings-details-prefix">Prefix</label>
                  </div>
                </div>
                <p class="mb-0 pt-2">Your order ID will appear as #1001, #1002, #1003 ...</p>
              </div>
              <div class="col-12 col-md-6">
                <div class="form-floating form-floating-outline">
                  <input type="text" class="form-control" id="ecommerce-settings-sender-suffix" name="suffix" aria-label="Suffix">
                  <label for="ecommerce-settings-sender-suffix">Suffix</label>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-end gap-4">
          <button type="reset" class="btn btn-outline-secondary waves-effect">Discard</button>
          <a class="btn btn-primary waves-effect waves-light" href="app-ecommerce-settings-payments.html">Save Changes</a>
        </div>

      </div>
    </div>

  </div>
  <!-- /Options-->
</div>


          </div>
@endsection