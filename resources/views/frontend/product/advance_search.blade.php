<ul class="list-group">
	@forelse($products as $row)
	<li class="list-group-item"> <a href="{{ route('product.details', ['product'=>@$row->id,'slug'=>@$row->product_slug_en]) }}"><img src="{{ asset($row->product_thambnail) }}" alt="" width="30"><span style="margin-left: 10px">{{ $row->product_name_en }}</span></a> </li> 
	@empty
	@endforelse
</ul>


{{-- <ul>
	@foreach($products as $item)
	<li> <img src="{{ asset($item->product_thambnail) }}" style="width: 30px; height: 30px;"> {{ $item->product_name_en }}  </li>
	@endforeach

</ul> --}}