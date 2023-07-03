<section class="section">
    <div class="container-fluid">
      <div class="title-wrapper pt-30">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="title mb-30">
              <h2>eCommerce Dashboard</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="breadcrumb-wrapper mb-30">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#0">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    eCommerce
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      


      <div class="row">

        
        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="icon-card mb-30">
            <div class="icon primary">
              <i class="lni lni-credit-cards"></i>
            </div>
            <div class="content">
              <h6 class="mb-10">Products</h6>
              <h3 class="text-bold mb-10">
                 {{-- {{$total_product}}  --}}
                </h3>
            </div>
          </div>
          <!-- End Icon Cart -->
        </div>
        <!-- End Col -->


        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="icon-card mb-30">
            <div class="icon orange">
              <i class="lni lni-user"></i>
            </div>
            <div class="content">
              <h6 class="mb-10">Users</h6>
              <h3 class="text-bold mb-10">
                {{-- {{$total_users}} --}}
              </h3>
            </div>
          </div>
          <!-- End Icon Cart -->
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="icon-card mb-30">
            <div class="icon purple">
              <i class="lni lni-cart-full"></i>
            </div>
            <div class="content">
              <h6 class="mb-10">Brands</h6>
              <h3 class="text-bold mb-10">
                {{-- {{$total_brands}} --}}
              </h3>
            </div>
          </div>

        </div>
        <!-- End Col -->


        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="icon-card mb-30">
            <div class="icon success">
              <i class="lni lni-dollar"></i>
            </div>
            <div class="content">
              <h6 class="mb-10">Categories</h6>
              <h3 class="text-bold mb-10">
                {{-- {{$total_categories}} --}}
              </h3>
            </div>
          </div>
          <!-- End Icon Cart -->
        </div>
        <!-- End Col -->



      </div>
    </div>
  </section>