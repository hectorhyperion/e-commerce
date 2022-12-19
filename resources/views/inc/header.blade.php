<!-- header -->
<div class="agileits_header">
    <div class="container">
        <div class="w3l_offers">
            <p>SALE UP TO 70% OFF. USE CODE "SALE70%" . <a href="/product">SHOP NOW</a></p>
        </div>
        <div class="agile-login">
              <ul>
            @auth
          <li><a href="/Contact">Help</a></li>
          <li><a href="/logout">Logout <i class="fa fa-key"></i> </a></li>
          <li><a href="/showUserOrder">Order</a></li>
                @else
                <li><a href="/Register"> Create Account </a></li>
                <li><a href="/Login">Login</a></li>
            @endauth




            </ul>
        </div>
        <div class="product_list_header">
            <ul>
                  <a href="/show/Cart">
             <i class="fa  fa-cart-arrow-down" aria-hidden="true"></i>Cart</a>
            </ul>


        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<div class="logo_products">
    <div class="container">
    <div class="w3ls_logo_products_left1">
            <ul class="phone_email">
                <li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (+0123) 234 567</li>

            </ul>
        </div>
        <div class="w3ls_logo_products_left">
            <h1>
                @auth
                <a href="/users/dashboard">super Market</a>
                @else
                <a href="/">super Market</a>
                @endauth
            </h1>
        </div>
    <div class="w3l_search">
        <form action="#" method="post">
            <input type="search" name="Search" placeholder="Search for a Product..." required="">
            <button type="submit" class="btn btn-default search" aria-label="Left Align">
                <i class="fa fa-search" aria-hidden="true"> </i>
            </button>
            <div class="clearfix"></div>
        </form>
    </div>

        <div class="clearfix"> </div>
    </div>
</div>
<!-- //header -->
