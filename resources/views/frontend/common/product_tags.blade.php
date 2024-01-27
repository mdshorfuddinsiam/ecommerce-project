@php
	// if(session()->get('language') == 'bangla'){
	// 	$tags = App\Models\Product::where('status', 1)->groupBy('product_tags_bn')->select('product_tags_bn')->get();
	// }
	// else{
	// 	$tags = App\Models\Product::where('status', 1)->groupBy('product_tags_en')->select('product_tags_en')->get();
	// }

	// $check = [];

    $field = session()->get('language') == 'bangla' ? 'product_tags_bn' : 'product_tags_en';
    $check = array_unique(array_filter(explode(',',implode(',', App\Models\Product::where('status', 1)->select($field)->pluck($field)->toArray()))));

@endphp


{{-- @php 
	$tag_en = App\Models\Product::where('status', 1)->groupBy('product_tags_en')->select('product_tags_en')->get();
	// dd($tag_en);

	$check = [];
@endphp  --}}


<div class="sidebar-widget product-tag wow fadeInUp">
  <h3 class="section-title">Product tags</h3>
  <div class="sidebar-widget-body outer-top-xs">
    <div class="tag-list"> 
    	{{-- @foreach($tags as $tag)

    		@php 
    			if(session()->get('language') == 'bangla'){
    				$array = explode(',', $tag->product_tags_bn);
    			}
    			else{
    				$array = explode(',', $tag->product_tags_en);
    			}

    			// dd($array);
    		@endphp 
	    	<a class="item" title="Phone" href="category.html">{{ str_replace(',', ' ', $tag->product_tags_en) }}</a> 

    		@foreach($array as $value)
    			@php 
    				if(!$value == null){
    					$check[$value] = $value;
    				}
    			@endphp 
	    		<a class="item" title="Phone" href="category.html">{{ $value }}</a> 
			@endforeach

    	@endforeach --}}


    	@foreach($check as $item)
    		<a class="item" title="{{ $item }}" href="{{ url('product/tag', ['tag'=>$item]) }}">{{ $item }}</a> 
    	@endforeach

    	@php
			// dd($check);
    	@endphp
    </div>
    <!-- /.tag-list --> 
  </div>
  <!-- /.sidebar-widget-body --> 
</div>
<!-- /.sidebar-widget --> 