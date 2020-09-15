<?php require('top.php') ?>

  <!-- Start Bradcaump area -->
  <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(temp/banner.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">shopping cart</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">products</th>
                                            <th class="product-name">name of products</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="temp/2.jpg" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#">Product 1</a>
                                                <ul  class="pro__prize">
                                                    <li>$23</li>
                                                </ul>
                                            </td>
                                            <td class="product-price"><span class="amount">$23</span></td>
                                            <td class="product-quantity"><input type="number" value="1" /></td>
                                            <td class="product-subtotal">$69</td>
                                            <td class="product-remove"><a href="#"><i class="icon-trash icons"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="temp/9.jpg" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#">Product 7</a>
                                                <ul  class="pro__prize">
                                                    <li>$25</li>
                                                </ul>
                                            </td>
                                            <td class="product-price"><span class="amount">$25</span></td>
                                            <td class="product-quantity"><input type="number" value="1" /></td>
                                            <td class="product-subtotal">$50</td>
                                            <td class="product-remove"><a href="#"><i class="icon-trash icons"></i></a></td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <a href="index.php">Continue Shopping</a>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <a href="checkout.php">checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->

<?php require('footer.php') ?>
