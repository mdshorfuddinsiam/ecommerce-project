@extends('frontend.main_master')

@section('title')
  Wishlist Page
@endsection

@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Wishlist</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th colspan="4" class="heading-title">My Wishlist</th>
				</tr>
			</thead>
			<tbody id="wishlist">
				
			</tbody>
		</table>
	</div>
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
@include('frontend.body.brands')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="productTitle" aria-hidden="true">
  <div class="modal-dialog" style="width: 800px">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="productTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        
        <div class="row">
          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img id="pImage" src="" class="card-img-top" style="width: 200px; height: 200px" alt="...">
            </div>
          </div>
          <div class="col-md-4">
            <ul class="list-group">
              <li class="list-group-item">Product Price: <strong class="text-danger">$<span id="pPrice"></span></strong>&emsp;<del id="oldPrice"></del> </li>
              <li class="list-group-item">Product Code: <strong id="pCode"></strong> </li>
              <li class="list-group-item">Category: <strong id="pCategory"></strong> </li>
              <li class="list-group-item">Brand: <strong id="pBrand"></strong> </li>
              {{-- <li class="list-group-item">Stock: <span class="badge badge-pill " id="pStock"></span></li> --}}
              <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="aviable" style="background: green; color: white;"></span> 
              <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: white;"></span>
              </li> 
            </ul>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="pColor">Choose Color</label>
              <select class="form-control" id="pColor" name="color">
                {{-- <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option> --}}
              </select>
            </div>
            <div class="form-group" id="sizeArea">
              <label for="pSize">Choose Size</label>
              <select class="form-control" id="pSize" name="size">
                {{-- <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option> --}}
              </select>
            </div>
            <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="number" class="form-control" id="pQty" value="1" min="1">
            </div>

            <input type="hidden" id="product_id">
            <button type="submit" class="btn btn-primary" onclick="addToCart()" >Add To Cart</button>

          </div>
        </div>

      </div>

      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}

    </div>
  </div>
</div>


@endsection


@section('user-js')

<script>

	{{-- Show All Wishlist Products --}}
	function wishlist(){
	  $.ajax({
	      type: 'GET',
	      dataType: 'JSON',
	      url: '{{ url('/user/get-wishlist-product') }}',
	      success:function(res){
	          console.log(res);

	          var rows = "";

	          $.each(res, function(key, value){
	            rows += (`<tr>
					<td class="col-md-2"><img src="/${value.product.product_thambnail}" alt="imga"></td>
					<td class="col-md-7">
						<div class="product-name">
							<a href="#">
							  	${value.product.product_name_en}
							</a>
						</div>
						{{-- <div class="rating">
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star rate"></i>
							<i class="fa fa-star non-rate"></i>
							<span class="review">( 06 Reviews )</span>
						</div> --}}
						<div class="price">
							${value.product.discount_price == null
								? `$${value.product.selling_price}`
								: `$${value.product.discount_price}<span>$${value.product.selling_price}</span>`
							}
						</div>
					</td>
					<td class="col-md-2">
						<button  class="btn-upper btn btn-primary" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" onclick="productViewAjax('${value.product.id}')"> Add To Cart </button>
					</td>
					<td class="col-md-1 close-btn">
						<button type="submit" id="${value.id}" onclick="removeWishlist(this.id)"><i class="fa fa-times"></i></button>
					</td>
				</tr>`);
	          });

	          $('#wishlist').html(rows);

	      }
	  });
	}

	wishlist();
	{{-- End Show All Wishlist Products --}}


  	{{-- Remove Wishlist Product --}}
  	function removeWishlist(id){
  	  $.ajax({
  	      type: 'GET',
  	      dataType: 'JSON',
  	      url: '{{ url('/user/wishlist-remove') }}/'+id,
  	      success:function(res){
  	          console.log(res);

  	          // Start Message 
  	          const Toast = Swal.mixin({
  	                toast: true,
  	                position: 'top-end',
  	                
  	                showConfirmButton: false,
  	                timer: 3000
  	              })
  	          if ($.isEmptyObject(res.error)) {
  	              Toast.fire({
  	                  type: 'success',
  	                  icon: 'success',
  	                  title: res.success
  	              })
  	          }else{
  	              Toast.fire({
  	                  type: 'error',
  	                  icon: 'error',
  	                  title: res.error
  	              })
  	          }
  	          // End Message 

  	          wishlist();
  	      }
  	    });
  	}
  	{{-- End Remove Wishlist Product --}}


</script>

<script>
	// Product View With Ajax
	function productViewAjax(id){
	  // alert(id);

	  $.ajax({
	      type: 'GET',
	      dataType: 'JSON',
	      url: '{{ url('product/view/ajax') }}/'+id,
	      success:function(res){
	        // console.log(res);

	        @if(session()->get('language') == 'bangla')
	          $('#productTitle').text(res.product.product_name_bn);
	          $('#pCategory').text(res.product.category.category_name_bn);
	          $('#pBrand').text(res.product.brand.brand_name_bn);
	        @else
	          $('#productTitle').text(res.product.product_name_en);
	          $('#pCategory').text(res.product.category.category_name_en);
	          $('#pBrand').text(res.product.brand.brand_name_en);
	        @endif

	        $('#pImage').attr('src', '/'+res.product.product_thambnail);
	        $('#pPrice').text(res.product.selling_price);
	        $('#pCode').text(res.product.product_code);


	        // Product Price
	        if(res.product.discount_price == null){
	          $('#pPrice').text('');
	          $('#oldPrice').text('');
	          $('#pPrice').text(res.product.selling_price);
	        }
	        else{
	          $('#pPrice').text('');
	          $('#oldPrice').text('');
	          $('#pPrice').text(res.product.discount_price);
	          $('#oldPrice').text('$'+res.product.selling_price);
	        }


	        // Color
	        $('select[name="color"]').empty();
	        // $('#pColor').empty();
	        $.each(res.color, function(key, value){
	          $('select[name="color"]').append('<option value="'+value+'">'+value+'</option>');
	          // $('#pColor').append('<option value="'+value+'">'+value+'</option>');
	        });
	        // end Color

	        // Size
	        if(res.size == ""){
	          $('#sizeArea').hide();
	        } 
	        else{
	          $('#sizeArea').show();
	          $('select[name="size"]').empty();
	          $.each(res.size, function(key, value){
	            $('select[name="size"]').append('<option value="'+value+'">'+value+'</option>');
	          });
	        }
	        // end Color

	        // Stock
	        // if(res.product.product_qty > 0){
	        //   $('#pStock').removeClass('badge-warning');
	        //   $('#pStock').addClass('badge-success');
	        //   $('#pStock').text('Available');
	        // }
	        // else{
	        //   $('#pStock').removeClass('badge-success');
	        //   $('#pStock').addClass('badge-primary');
	        //   $('#pStock').text('Stock Out');
	        // }

	        // Stock
	        if(res.product.product_qty > 0){
	             $('#aviable').text('');
	             $('#stockout').text('');
	             $('#aviable').text('aviable');
	        }
	        else{
	             $('#aviable').text('');
	             $('#stockout').text('');
	             $('#stockout').text('stockout');
	        } // end Stock Option 

	        // Product id & quantity
	        $('#product_id').val(id);
	        $('#pQty').val(1);
	        // End Product id & quantity
	       
	      }
	  });

	}
	// End Product View With Ajax
</script>

<script>
	// Add To Cart Product with Ajzx
	function addToCart(){
	    var id = $('#product_id').val();
	    var product_name = $('#productTitle').text();
	    var color = $('#pColor option:selected').text();
	    var size = $('#pSize option:selected').text();
	    var qty = $('#pQty').val();

	    // alert(id);
	    // console.log(id);
	    // console.log(product_name);
	    // console.log(color);
	    // console.log(size);
	    // console.log(qty);

	    $.ajax({
	        type: 'POST',
	        dataType: 'JSON',
	        data: {product_name:product_name, color:color, size:size, qty:qty},
	        url: '{{ url('/cart/data/store') }}/'+id,
	        success:function(res){
	            // console.log(res);
	            // $('#exampleModal').modal('hide');
	            $('#closeModal').click();

	            // Start Message 
	            const Toast = Swal.mixin({
	                  toast: true,
	                  position: 'top-end',
	                  icon: 'success',
	                  showConfirmButton: false,
	                  timer: 3000
	                })
	            if ($.isEmptyObject(res.error)) {
	                Toast.fire({
	                    type: 'success',
	                    title: res.success
	                })
	            }else{
	                Toast.fire({
	                    type: 'error',
	                    title: res.error
	                })
	            }
	            // End Message 

	            // mini cart 
	            miniCart();
	        }
	    });

	}
	// End Add To Cart Product with Ajzx
</script>

<script>
  
  {{-- Add product into Mini Cart --}}
  function miniCart(){
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: '{{ url('/product/mini/cart') }}',
        success:function(res){
            // console.log(res);

            $('#cartQty').text(res.cartQty);
            $('#subTotal').text('$'+res.cartTotal);
            $('#cartTotal').text(res.cartTotal);

            var miniCart = "";

            $.each(res.carts, function(key, value){
              miniCart += (`<div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                      <div class="price">$${value.price} * ${value.qty}</div>
                    </div>
                    <div class="col-xs-1 action"> 
                        <button type="submit" id="${value.rowId}" onclick="removeMiniCart(this.id)"><i class="fa fa-trash"></i></button>
                    </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>`);
            });

            $('#miniCart').html(miniCart);

        }
    });
  }

  miniCart();
  {{-- End Add product into Mini Cart --}}

</script>

<script>
  {{-- Remove product into Mini Cart --}}
  function removeMiniCart(rowId){
    $.ajax({
        type: 'GET',
        dataType: 'JSON',
        url: '{{ url('/minicart/product-remove') }}/'+rowId,
        success:function(res){
            console.log(res);

            // Start Message 
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 3000
                })
            if ($.isEmptyObject(res.error)) {
                Toast.fire({
                    type: 'success',
                    title: res.success
                })
            }else{
                Toast.fire({
                    type: 'error',
                    title: res.error
                })
            }
            // End Message 

            miniCart();
        }
      });
  }
  {{-- End Remove product into Mini Cart --}}
</script>

@endsection