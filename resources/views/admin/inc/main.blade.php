
  <!-- main content start -->


      <nav aria-label="breadcrumb">
        <ol class="breadcrumb my-breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
      </nav>
      <div class="welcome-msg pt-3 pb-4">
        <h1>Hi <span class="text-primary">{{Auth::user()->name}}</span>, Welcome back</h1>
        <p>Very detailed & featured admin.</p>
      </div>

      <!-- statistics data -->
      <div class="statistics">
        <div class="row">
          <div class="col-xl-6 pr-xl-2">
            <div class="row">
              <div class="col-sm-6 pr-sm-2 statistics-grid">
                <div class="card card_border border-primary-top p-4">
                  <i class="lnr lnr-users"> </i>
                  <h3 class="text-primary number">{{$total_users}}</h3>
                  <p class="stat-text">Customers</p>
                </div>
              </div>
              <div class="col-sm-6 pl-sm-2 statistics-grid">
                <div class="card card_border border-primary-top p-4">
                  <i class="lnr lnr-eye"> </i>
                  <h3 class="text-secondary number">{{$total_order}}</h3>
                  <p class="stat-text">Total order</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6 pl-xl-2">
            <div class="row">
              <div class="col-sm-6 pr-sm-2 statistics-grid">
                <div class="card card_border border-primary-top p-4">
                  <i class="lnr lnr-cloud-download"> </i>
                  <h3 class="text-success number">{{$total_product}}</h3>
                  <p class="stat-text">Total Product</p>
                </div>
              </div>
              <div class="col-sm-6 pl-sm-2 statistics-grid">
                <div class="card card_border border-primary-top p-4">
                  <i class="lnr lnr-cart"> </i>
                  <h3 class="text-danger number">{{$total_revenue}}$</h3>
                  <p class="stat-text">Revenue</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-6 pl-xl-2">
            <div class="row">
              <div class="col-sm-6 pr-sm-2 statistics-grid">
                <div class="card card_border border-primary-top p-4">
                  <i class="lnr lnr-book"> </i>
                  <h3 class="text-success number">{{$total_processing}}</h3>
                  <p class="stat-text">processing</p>
                </div>
              </div>
              <div class="col-sm-6 pl-sm-2 statistics-grid">
                <div class="card card_border border-primary-top p-4">
                  <i class="lnr lnr-cart"> </i>
                  <h3 class="text-danger number">{{$total_delivered}}</h3>
                  <p class="stat-text">Delivered</p>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
      <!-- //statistics data -->




    </div>
    <!-- //content -->
  </div>
  <!-- main content end-->
  </section>
