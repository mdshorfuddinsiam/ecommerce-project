@php
if(session()->get('language') == 'bangla') {
	$tags = App\Models\Product::groupBy('product_tags_bn')->select('product_tags_bn')->get(); 
} else{
 	// $tags = App\Models\Product::all();
 	$tags = App\Models\Product::select('product_tags_en')->get();
}

$check = [];

foreach($tags as $tag){
	// dd($tags); 
	$array = explode(',', $tag->product_tags_en);
	// dd($array); 
	foreach ($array as $value){
		// dd($value); 
		// echo  $value;
		if(!empty($value)){
			$check[$value] = $value;
		}
	}
}

@endphp


<div class="sidebar-widget product-tag wow fadeInUp">
	<h3 class="section-title">Product tags</h3>
	<div class="sidebar-widget-body outer-top-xs"> 
		<div class="tag-list"> 
			@foreach($check as $row) 
				<a class="item active" title="Phone" href="category.html">{{ $row }}</a> 
			@endforeach
		</div>
		<!-- /.tag-list --> 
	</div>
	<!-- /.sidebar-widget-body --> 
</div>
<!-- /.sidebar-widget -->  