<?php
if (session_status() === PHP_SESSION_NONE){session_start();}
$user_ref= $_SESSION['CPSID'];
require("./manager/assets/config.php");

// Getting the parameters of current user
if (isset($_REQUEST['getSessionUser'])) {

if (isset($_COOKIE['CookRef'])) {
$Refnum= $_COOKIE['CookRef'];
$_SESSION['CPSID']=$Refnum;
echo $Refnum;
}
else {
$Refnum= "CPSID".time();
$_SESSION['CPSID']=$Refnum;
$cookRef =(!isset($_COOKIE['CookRef']))?setCookie('CookRef', $Refnum, time()+2592000, '/' ):"";
echo $Refnum;
}

}

//Fetch total quantity of products in a user cart
if (isset($_REQUEST['getCartValue'])) {
$quantQuery = mysqli_query($con,"SELECT * FROM cart WHERE user_ref='$user_ref' ");
$cartQuant =0; 
if (mysqli_num_rows($quantQuery)>0) 
{
      while ($row = mysqli_fetch_assoc($quantQuery)) {
        $cartQuant += $row['quantity']; 

      }
      echo $cartQuant;

}
else echo 0;
}


// Displaying a quickview modal
if (isset($_REQUEST['modalOps'])) {
        # code...
if($_POST['dataid']) {
        $dataid= $_POST['dataid'];
$query = mysqli_query($con,"SELECT * FROM products WHERE id='$dataid'ORDER BY RAND() LIMIT 0,5 ");
while ($row = mysqli_fetch_assoc($query)) {
  extract($row);
  $newView= $views+1;
  mysqli_query($connect, "UPDATE products SET views = '$newView' WHERE id='$dataid' ");

$oldprice= ($dprice<$price)?"<span class='old-price'>₦$price</span>":"";
        

echo"

<button type='button' class='close close2' data-dismiss='modal' aria-label='Close'>
<span aria-hidden='true'><i class='bx bx-x'></i></span>
</button>
<div class='modal-header'>
        <h4 class='modal-title' id='portfolioModallabel'>$title</h4> <span>Product ID: $imageid</span>

    </div>
<div class='row align-items-center'>
<div class='col-lg-6 col-md-6'>
<div class='products-image'>
<img src='$imagepath' alt='image'>
</div>
</div>
<div class='col-lg-6 col-md-6'>
<div class='products-content'>
<h3><a href='#'><span id='title'>$title</span></a></h3>
<div class='price'>
$oldprice
<span class='new-price'>₦$dprice</span>
</div>
<div class='products-review'>
<div class='rating'>
<i class='bx bxs-star'></i>
<i class='bx bxs-star'></i>
<i class='bx bxs-star'></i>
<i class='bx bxs-star'></i>
<i class='bx bxs-star'></i>
</div>
<a href='product_details.html?PID=$imageid#reviews' class='rating-count'>3 reviews</a>
</div>
<ul class='products-info'>
<li><span>Maker:</span> <a href='#'>$pmaker</a></li>".
// <li><span>Availability:</span> <a href='#'>In stock (7 items)</a></li>
"<li><span>Products Type:</span> <a href='#'>$ptype</a></li>
</ul>
<div class='products-add-to-cart'>".
"<div class='input-counter'>
<input type='number' min='1' value='1' id='newQuantity'>
</div>".
"<button type='button' class='default-btn' onclick='addToCart2($id)'<i class='flaticon-trolley'></i> Add to Cart</button>
</div>
<a href='product_details.html?PID=$imageid' class='view-full-info'>or View Full Info</a>
</div>
</div>
</div>";
} 
}

}

//Displaying the customers cart content
if (isset($_REQUEST['modalCart'])) {
        # code...
if($_POST['user_ref']) {
        $user_ref= $_POST['user_ref'];
$subquery = mysqli_query($con,"SELECT * FROM cart WHERE user_ref='$user_ref' ");
if (mysqli_num_rows($subquery)>0) 
$quantity =0; 
{
      while ($row = mysqli_fetch_assoc($subquery)) {
        $quantity += $row['quantity']; 
      }}

$query = mysqli_query($con,"SELECT
        p.title as product_name, p.imagepath as product_image, p.imageid as product_ref, p.price as product_price,  p.dprice as dproduct_price, c.id, c.quantity, c.user_ref, c.product_id
            FROM
            cart c
                LEFT JOIN
                    products p
                        ON p.id = c.product_id
                    WHERE   c.user_ref = '$user_ref'
            ORDER BY
                c.created_on DESC");

echo"
<button type='button' class='close close3' data-dismiss='modal' aria-label='Close'>
<span aria-hidden='true'><i class='bx bx-x'></i></span>
</button>
<div class='modal-body'>";
if (mysqli_num_rows($query)>0) {
$total=0;
  echo"
<h3>My Cart ($quantity)</h3>
<div class='products-cart-content'>";
while ($row = mysqli_fetch_assoc($query)) {
        extract($row);
        $subTotal= $quantity*$dproduct_price;
        $total += $subTotal;      
//  $oldprice= ($dprice<$price)?"<span class='old-price'>₦$price</span>":"";
      
echo"
<div class='products-cart d-flex align-items-center'>
<div class='products-image'>
<a href='#'><img src='$product_image' alt='$product_name'></a>
</div>
<div class='products-content'>
<h3><a href='product_details.html?PID=$product_ref'>$product_name</a></h3>
<div class='products-price'>
<span>$quantity</span>
<span>x</span>
<span class='price'>₦$dproduct_price</span>
</div>
</div>
<a href='#' class='remove-btn' onClick='popCart($product_id)'><i class='bx bx-trash'></i></a>
</div>
";}
echo"
</div>
<div class='products-cart-subtotal'>
<span>Subtotal</span>
<span class='subtotal'>₦$total</span>
</div>
<div class='products-cart-btn'>
<a href='#' class='default-btn'>Proceed to Checkout</a>
</div>
</div>";
 
}

else {
        echo "<div class='products-cart-btn'>
        <br>
        <br>
        <br>
        <h2 class='default-btn'>Cart Is Empty</h2>
        </div>
        ";
}
}

}

//addToCart2
if (isset($_REQUEST['addToCart2'])) {
        # code...
if($_REQUEST['cartData2']) {

        $cartData= $_REQUEST['cartData2'];
$query = mysqli_query($con,"SELECT * FROM products WHERE id='$cartData' ");
if (mysqli_num_rows($query)>0) {
        # code...

$row = mysqli_fetch_assoc($query);
        $product_id= $row['imageid'];
        echo $product_id;
}
}
}

//Delete from cart
if (isset($_REQUEST['popCart'])) {
        # code...
if($_REQUEST['popCart']) {

        $cartData= $_REQUEST['popCart'];
$query = mysqli_query($con,"DELETE FROM cart WHERE product_id='$cartData' && user_ref='$user_ref' ");
echo ($query)?1:0;
        # code...
}
}

// Adding a product to cart
if (isset($_REQUEST['addToCart'])) {
        # code...
if($_REQUEST['cartData']) {
        $table_name="cart";
        $cartData= $_REQUEST['cartData'];
$query = mysqli_query($con,"SELECT * FROM products WHERE imageid='$cartData' ");
if (mysqli_num_rows($query)>0) {
        # code...

$row = mysqli_fetch_assoc($query);
        $product_id= $row['id'];
        // $user_ref= $row['user_ref'];

        $query1 = mysqli_query($con,"SELECT * FROM cart WHERE user_ref='$user_ref' && product_id ='$product_id' ");
        if (mysqli_num_rows($query1)>0) {
        
        // If product exist in the cart for the same user, Increment the quantity instaed of adding a new row
    
        $row =  mysqli_fetch_assoc($query1);
        extract($row);
        $quantity=$quantity+1;
    
        $query2 = mysqli_query($con, "UPDATE $table_name  SET quantity = '$quantity' WHERE user_ref='$user_ref' && product_id='$product_id' ");

//         echo $qresult=($query2)? 1:0;

//         $returnArr = [$qresult,$imageurl,$bars,$randbpm];    
// echo json_encode($returnArr);

   echo($query2)? 1:0;
    }
    
     else {
         # If product has not been added to cart by the same user...
           // query to insert the record
           $query = mysqli_query($con, "INSERT IGNORE INTO cart (user_ref,product_id) VALUES ('$user_ref', '$product_id')");
    
            echo($query)? 1:0;
        }

    
}

}
}


// RETRIEVE ALL PRODUCTS in the products.html page

if (isset($_REQUEST['getProductsMain'])) {
        if($_REQUEST['sortBy']) {
                $cat = (isset($_REQUEST['category']))? $_REQUEST["category"]:"";
                $maker = (isset($_REQUEST['pmaker']))? $_REQUEST["pmaker"]:"";
        
                if (isset($_REQUEST['pmaker']) ) 
                { $psuedo= "WHERE pmaker ='$maker'";        }
        
                elseif (isset($_REQUEST['category'])) 
                { $psuedo= "WHERE category='$cat'";        }
        
                else { $psuedo= "";        }
        
                $limit = 8;

                $page_no= (isset($_POST['page_no']))? $_POST['page_no']:$page_no = 1;
                $offset = ($page_no-1) * $limit;
                
                                // $psuedo = (isset($_REQUEST['pmaker']) && isset($_REQUEST['category']))? $psuedo= "WHERE pmaker ='$maker' && category='$cat' ":"";
                
                $sortBy= $_REQUEST['sortBy'];
                if ($sortBy=="default"|| empty($sortBy)) {  $sorting=   "ORDER BY RAND()";  }
                elseif ($sortBy=="popularity") {  $sorting=   "ORDER BY views DESC";  }
                elseif ($sortBy=="latest") {  $sorting=   "ORDER BY upload_date DESC";  }
                elseif ($sortBy=="plow2high") {  $sorting=   "ORDER BY dprice ASC";  }
                elseif ($sortBy=="phigh2low") {  $sorting=   "ORDER BY dprice DESC";  }
                
        $query = mysqli_query($con,"SELECT * FROM products $psuedo $sorting LIMIT $offset, $limit ");
        if (mysqli_num_rows($query) > 0) {
                # code...
        echo '<div class="row">';
        while ($row = mysqli_fetch_assoc($query)) {
          extract($row);
        // $oldprice= ($dprice<$price)?"<span class='old-price'>₦$price</span>":"";
        echo"
        <div class='col-lg-4 col-md-4 col-sm-6'>
        <div class='single-products-box'>
        <div class='image'>
        <a href='#' data-toggle='modal' data-target='#productsQuickView' data-id='$id' class='d-block'><img src='$imagepath' alt='image'></a>
        <div class='buttons-list'>
        <ul>
        <li>
        <div class='cart-btn'>
        <a href='javascript:void(0)' onclick='addToCart2($id)'>
        <i class='bx bxs-cart-add'></i>
        <span class='tooltip-label'>Add to Cart</span>
        </a>
        </div>
        </li>
        <li>
        <div class='wishlist-btn'>
        <a href='#'>
        <i class='bx bx-heart'></i>
        <span class='tooltip-label'>Add to Wishlist</span>
        </a>
        </div>
        </li>
        <li>
        <div class='quick-view-btn'>
        <a href='#' data-toggle='modal' data-target='#productsQuickView' data-id='$id'>
        <i class='bx bx-search-alt'></i>
        <span class='tooltip-label'>Quick View</span>
        </a>
        </div>
        </li>
        </ul>
        </div>
         </div>
        <div class='content'>
        <h3><a href='product_details.html?PID=$imageid'>$title</a></h3>
        <div class='price'>
        <span class='new-price'>&#8358;$dprice</span>
        </div>
        </div>
        </div>
        </div>";}

        $records = mysqli_query($con, "SELECT * FROM products" );
        $totalRecords = mysqli_num_rows($records);
        
        $totalPage = ceil($totalRecords/$limit);
        
        $output= "<div class='col-lg-12 col-md-12'>
        <div class='pagination-area text-center'>
        <a href='#' class='prev page-numbers'><i class='bx bx-chevrons-left'></i></a>";
        for ($i=1; $i <= $totalPage ; $i++) { 
                if ($i == $page_no) {
                     $active = "current";
                }else{
                     $active = "";
                }
             
                 $output.="<a class='page-numbers $active' id='$i' href=''>$i</a>";
             }
             
    $output.=  " 
        <a href='#' class='prev page-numbers'><i class='bx bx-chevrons-right'></i></a>
        </div>
        </div>";
        echo $output;

        }
        else {
          echo '<div class="col-lg-12 col-md-12 col-sm-12">
          <div class="single-products-box">
          <h1 class="alert alert-warning">No Item found in shop</h1>
          </div>
        </div>';
        }
        echo '</div>'; 
        }
        }
        
// products filter modal products.html and search_results.html

if (isset($_REQUEST['getFilterModal'])) {
                
        $query = mysqli_query($con,"SELECT DISTINCT pmaker FROM products ORDER BY RAND() LIMIT 0,10 ");
        $query1 = mysqli_query($con,"SELECT DISTINCT category  FROM products ORDER BY RAND() LIMIT 0,10 ");
        if (mysqli_num_rows($query) > 0) {
                # code...
        echo "<button type='button' class='close FiLtEr' data-dismiss='modal' aria-label='Close'>
        <span aria-hidden='true'><i class='bx bx-x'></i> Close</span>
        </button>
        <div class='modal-body'>
        <div class='woocommerce-widget-area'>
        <div class='woocommerce-widget brands-list-widget'>
         <h3 class='woocommerce-widget-title'>Brands</h3>
        <p class='brands-list-row Rbtn' style='color: black; font-weight: 700; font-size: large;'>
";
        while ($row = mysqli_fetch_assoc($query)) {
          extract($row);
        // $oldprice= ($dprice<$price)?"<span class='old-price'>₦$price</span>":"";
        echo"
            <input type='radio' onChange='filterNow(1);' name='brands-list' id='brands-list' value='$pmaker'>
            <label for=''>$pmaker</label> <br>";
            
        }
echo "</p>
<br>
<br>
<div class='woocommerce-widget brands-list-widget'>
<h3 class='woocommerce-widget-title'>Categories</h3>
<p class='brands-list-row Rbtn' style='color: black; font-weight: 700; font-size: large;'>
";
while ($row = mysqli_fetch_assoc($query1)) {
 extract($row);
// $oldprice= ($dprice<$price)?"<span class='old-price'>₦$price</span>":"";
echo"
   <input type='radio' onChange='filterNow(2);' name='cat-list' id='cat-list' value='$category'>
   <label for=''>$category</label> <br>";
   
}
echo "</p>".
// <a type='button' href='#' onClick='filterNow();' class='default-btn'><i class='bx bx-filter-alt'></i> Filter</a>

"</div>";

$query2 = mysqli_query($con,"SELECT *  FROM adshow WHERE placement='sidebar' ORDER BY RAND() LIMIT 0,1 ");
if (mysqli_num_rows($query2) > 0) {

echo "<div class='woocommerce-widget woocommerce-ads-widget'>";
while ($row = mysqli_fetch_assoc($query2)) {
        extract($row);
       // $oldprice= ($dprice<$price)?"<span class='old-price'>₦$price</span>":"";
       echo"
 
<img src='$image' alt='image'>
<div class='content'>      
<span>$tag</span>
<h3>$title</h3>
<a href='product_details.html?PID=$product_id' class='default-btn'><i class='flaticon-trolley'></i> Shop Now</a>
</div>
</div>";
}
}

$query3 = mysqli_query($con,"SELECT * FROM products WHERE featured='yes' ORDER BY RAND() LIMIT 0,3 ");

if (mysqli_num_rows($query3) > 0) {

        echo "
        <div class='woocommerce-widget best-seller-widget'>
        <h3 class='woocommerce-widget-title'>Best Seller</h3>
";        
while ($row = mysqli_fetch_assoc($query3)) {
extract($row);

echo "
<article class='item'>
<a href='product_details.html?PID=$imageid' class='thumb'>
<img class='fullimage cover' src='$imagepath' role='img'/>
</a>
<div class='info'>
<h4 class='title usmall'><a href='product_details.html?PID=$imageid'>$title</a></h4>
<span>&#8358;$dprice</span>
<div class='rating'>
<i class='bx bxs-star'></i>
<i class='bx bxs-star'></i>
<i class='bx bxs-star'></i>
<i class='bx bxs-star'></i>
<i class='bx bxs-star'></i>
</div>
</div>
<div class='clear'></div>
</article>";}

echo"
</div>";
}
echo"
</div>
</div>
        </div>";
        }
        else {
          echo '';
        }
} 


// Displaying a single product details
if (isset($_REQUEST['getProductDetails'])) {
        # code...
if($_POST['pid']) {
        $dataid= $_POST['pid'];
$query = mysqli_query($con,"SELECT * FROM products WHERE imageid='$dataid'ORDER BY RAND() LIMIT 0,1");
while ($row = mysqli_fetch_assoc($query)) {
  extract($row);
  $newView= $views+1;
  mysqli_query($connect, "UPDATE products SET views = '$newView' WHERE id='$dataid' ");

$oldprice= ($dprice<$price)?"<span class='old-price'>₦$price</span>":"";

echo json_encode(array('Pdesc'=>$imagedesc,'image1'=>$imagepath,'image2'=>$imagepath2,'pTitle'=>$title,'dprice'=>$dprice,'price'=>$price,'pmaker'=>$pmaker,'ptype'=>$ptype,'pID'=>$id));
 //Make array of files    
// echo json_encode($json_cs); //Encode json  
// echo"
// HERE
// <div class='col-lg-5 col-md-12'>
// <div class='products-details-image'>
// <ul class='products-details-image-slides owl-theme owl-carousel' data-slider-id='1'>
// <li><img src='$imagepath' alt='Product image'></li>
// <li><img src='$imagepath2' alt='Product image'></li>
// <li><img src='assets/img/products/products-img3.jpg' alt='image'></li>
// <li><img src='assets/img/products/products-img4.jpg' alt='image'></li>
// </ul>

// <div class='owl-thumbs products-details-image-slides-owl-thumbs' data-slider-id='1'>
// <div class='owl-thumb-item'>
// <img src='$imagepath' alt='Product image'>
// </div>
// <div class='owl-thumb-item'>
// <img src='$imagepath2' alt='Product image'>
// </div>";

// // <div class='owl-thumb-item'>
// // <img src='$imagepath' alt='Product image'>
// // </div>
// // <div class='owl-thumb-item'>
// // <img src='$imagepath2' alt='Product image'>
// // </div>

// echo
// "</div>
// </div>
// </div>

// <div class='col-lg-7 col-md-12'>
// <div class='products-details-desc'>
// <h3>$title</h3>
// <div class='price'>
// <span class='new-price'>&#8358;$dprice</span>
// <span class='old-price'>&#8358;$price</span>
// </div>
// <div class='products-review'>
// <div class='rating'>
// <i class='bx bxs-star'></i>
// <i class='bx bxs-star'></i>
// <i class='bx bxs-star'></i>
// <i class='bx bxs-star'></i>
// <i class='bx bxs-star'></i>
// </div>
// <a href='#' class='rating-count'>3 reviews</a>
// </div>
// <ul class='products-info'>
// <li><span>Vendor:</span> <a href='#'>$pmaker</a></li>".
// // "<li><span>Availability:</span> <a href='#'>In stock (7 items)</a></li>
// "<li><span>Products Type:</span> <a href='#'>$ptype</a></li>
// </ul>";

// // <div class='products-color-switch'>
// // <span>Color:</span>
// // <ul>
// // <li><a href='#' title='Black' class='color-black'></a></li>
// // <li><a href='#' title='White' class='color-white'></a></li>
// // <li class='active'><a href='#' title='Green' class='color-green'></a></li>
// // <li><a href='#' title='Yellow Green' class='color-yellowgreen'></a></li>
// // <li><a href='#' title='Teal' class='color-teal'></a></li>
// // </ul>
// // </div>
// // <div class='products-size-wrapper'>
// // <span>Size:</span>
// // <ul>
// // <li><a href='#'>XS</a></li>
// // <li class='active'><a href='#'>S</a></li>
// // <li><a href='#'>M</a></li>
// // <li><a href='#'>XL</a></li>
// // <li><a href='#'>XXL</a></li>
// // </ul>
// // </div>

// echo "<div class='products-info-btn'>
// <a href='customer-service.html#shipping'><i class='bx bxs-truck'></i> Shipping Info</a>
// <a href='contact.html'><i class='bx bx-envelope'></i> Ask about this products</a>
// </div>
// <div class='products-add-to-cart'>".
// "<div class='input-counter'>
// <input type='number' min='1' value='1' id='newQuantity'>
// </div>".
// "<button type='button' class='default-btn' onclick='addToCart2($id)'<i class='flaticon-trolley'></i> Add to Cart</button>
// </div>
// <div class='wishlist-btn'>
// <a href='#'><i class='bx bx-heart'></i> Add to Wishlist</a>
// </div>
// <div class='buy-checkbox-btn'>
// <div class='item'>
// <input class='inp-cbx' id='cbx' type='checkbox'>
// <label class='cbx' for='cbx'>
// <span>
// <svg width='12px' height='10px' viewbox='0 0 12 10'>
// <polyline points='1.5 6 4.5 9 10.5 1'></polyline>
// </svg>
// </span>
// <span>I agree with the terms and conditions</span>
// </label>
// </div>
// <div class='item'>
// <a href='#' class='default-btn'>Buy it now!</a>
// </div>
// </div>
// </div>
// </div>

// ";

} 
}

}

?>