$(document).ready(function(){

    // Get Number of items in cart every 10 seconds
    setInterval(function() {
        $.ajax({
            type: "POST",
            url: "ajax.php?getCartValue",
            // data: 1,
            // cache: false,
            success: function(data){
                // alert(data);
                $(".cartNumber").html("<span>"+data+"</span>");
            }
        });
                    }, 10000);             

//Products view modal
    $('#productsQuickView').on('show.bs.modal', function (e) {
        var dataid = $(e.relatedTarget).data('id');
        var dataString = 'dataid=' + dataid;
        $.ajax({
            type: "POST",
            url: "ajax.php?modalOps",
            data: dataString,
            cache: false,
            success: function(data){
                $("#content").html(data);
            }
        });
     });
 //Shopping Cart Modal
     $('#shoppingCartModal').on('show.bs.modal', function (e) {
        // alert(user_ref)
        $.ajax({
            type: "POST",
            url: "ajax.php?getSessionUser",
            // data: dataString,
            cache: false,
            success: function(data){
        var user_ref = data;
        var dataString = 'user_ref=' + user_ref;
        $.ajax({
                    type: "POST",
                    url: "ajax.php?modalCart",
                    data: dataString,
                    cache: false,
                    success: function(data){
                        $("#contentCart").html(data);
                    }
                });
        
            }
        });
    });

// Add to cart
$('.addToCart').click(function(e)  {
        var cartData = $(this).attr("forcart");
        var dataString = 'cartData=' + cartData;
        // alert(cartData);
        $.ajax({
            type: "POST",
            url: "ajax.php?addToCart",
            data: dataString,
            cache: false,
            dataType: 'json',
            success: function(data, statusText){
                if (data==1) {
                    // alert(statusText);
                    $(".CaRT").click()
                //    $('#shoppingCartModal').modal(options);
                // $(".cartNumber").text(data);

                }
                else {
                    notify("danger","Sorry, something went Wrong. Please try again");
                    console.log(data);
                }
                // $("#content").html(data);
            }
        });
     });
//Notify
     function notify(type,msg){
                $.notify({
                    icon: 'bx bxs-bell',
                    message: msg

                },{
                    type: type,
                    timer: 1000
                });
            }

// Load content of products table with pagination
    function loadData(page){
        $.ajax({
          url  : "ajax.php?getProductsMain",
          type : "POST",
          cache: false,
          data : {page_no:page,'sortBy':'default' },
          success:function(response){
            $("#Result").html(response);
        }
        });
      }
      loadData();

      //Sort items on products page
        $("select.Psort").change(function(){
            var sorting = $(this).children("option:selected").val();
            var dataString = 'sortBy=' + sorting;
            $.ajax({
                type: "POST",
                url: "ajax.php?getProductsMain",
                data : {'page_no':1,'sortBy':sorting },
                cache: false,
                success: function(data){
                    // alert(data);
                    $("#Result").html(data);
                }
            });
            });
            loadData();

            //Filter items on Products page
            $('#productsFilterModal').on('show.bs.modal', function (e) {
                $.ajax({
                    type: "POST",
                    url: "ajax.php?getFilterModal",
                    // data: dataString,
                    cache: false,
                    success: function(data){
                $("#contentFilter").html(data);                
                    }
                });
            });
      
      // Pagination code
      $(document).on("click", ".pagination-area  a", function(e){
        e.preventDefault();
        var pageId = $(this).attr("id");
        loadData(pageId);
      });

    //   Fetch product details using product id
    function fetchOne(page){
        var PID = urlParams["PID"];
if (PID !="") {    
        $.ajax({
          url  : "ajax.php?getProductDetails",
          type : "POST",
          dataType: 'json',
          cache: false,
          data : {'pid':PID,'sortBy':'default' },
        //   success:function(response){
        //     $("#singleResult").html(response);
        success: function(data) {
            $("#ptitle").html(data.pTitle);
            $(".pprice").html("&#8358;"+data.dprice);
            $(".dprice").html("&#8358;"+data.price);
            $(".pType").html(data.ptype);
            $(".pMaker").html(data.pmaker);
            $(".Pdesc").html(data.Pdesc);
            $(".image1_1").prop("src", data.image1);
            $(".image1_2").prop("src", data.image2);
            $('#Carted').html('<button type="submit" class="default-btn" onclick="addToCart2('+data.pID+')"> <i class="flaticon-trolley"></i> Add to Cart</button>');
            }
        });
    }
    else {""}
}
fetchOne();

      //Ready function ends         
});

//Filter product

function filterNow(id){
    if (id==1) {
        var brandS = $("input[name='brands-list']:checked").val();
        var dataString = {'page_no':1,"sortBy":"default","pmaker":brandS};       
    }
    else if(id==2) {
        var catS = $("input[name='cat-list']:checked").val();
        var dataString = {'page_no':1,"sortBy":"default","category":catS};              
    }
    // alert(dataString) 
// var dataString = 'sortBy=' + sorting;
$.ajax({
    type: "POST",
    url: "ajax.php?getProductsMain",
    data: dataString,
    cache: false,
    success: function(data){
        // alert(data);
        $("#Result").html(data);
        $(".FiLtEr").click()
    }
});
};

// ON EVENT FUNCTIONS
//Adding to cart when modal is opened
function addToCart2(id)
{
    function notify(type,msg){
                $.notify({
                    icon: 'bx bxs-bell',
                    message: msg
 
                },{
                    type: type,
                    timer: 1000
                });
            }

     $.ajax({
                url: 'ajax.php?addToCart2',
                type: "POST",
                data: {
                    'cartData2' : id,
                },
                success : function(response) { 
                    // alert(response)
                    var dataString = 'cartData=' + response;
                    $.ajax({
            type: "POST",
            url: "ajax.php?addToCart",
            data: dataString,
            cache: false,
            success: function(data){
                if (data==1) {
                    $(".close2").click()
                    $(".CaRT").click()
                }
                else {
                    notify("danger","Sorry, something went Wrong. Please try again");
                    console.log(data);
                }
                // $("#content").html(data);
            }
        });

                }

            });
}

//REMOVING FROM CART
function popCart(pro_id)
{
    function notify(type,msg){
                $.notify({
                    icon: 'bx bxs-bell',
                    message: msg

                },{
                    type: type,
                    timer: 1000
                });
            }

     $.ajax({
                url: 'ajax.php?popCart',
                type: "POST",
                data: {
                    'popCart' : pro_id,
                },
                success : function(response) { 
                    if (response==1) {
     notify("success","Cart updated");
     $(".close3").click()
      
     setTimeout(function() {
                $(".CaRT").click() 
                    }, 500);             
                    } 
                    else {  notify("danger","Sorry, something went Wrong. Please try again");
}

                }

            });
}

var urlParams;
(window.onpopstate = function () {
    var match,
        pl     = /\+/g,  // Regex for replacing addition symbol with a space
        search = /([^&=]+)=?([^&]*)/g,
        decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
        query  = window.location.search.substring(1);

    urlParams = {};
    while (match = search.exec(query))
       urlParams[decode(match[1])] = decode(match[2]);
})();
