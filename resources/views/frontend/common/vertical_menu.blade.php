<div class="side-menu animate-dropdown outer-bottom-xs">
  <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
  <nav class="yamm megamenu-horizontal">
    <ul class="nav">

      @php 
        // dd($categories);
        // dd($subcategories);
        // dd($row);
      @endphp
      {{-- Categories --}}
      @foreach($categories as $row)
      <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ @$row->category_icon }}" aria-hidden="true"></i>@if(session()->get('language') == 'bangla') {{ @$row->category_name_bn }} @else {{ @$row->category_name_en }} @endif</a>
        <ul class="dropdown-menu mega-menu">
          <li class="yamm-content">
            <div class="row">
              {{-- Sub-Categories --}}
              @php
                $subcategories = App\Models\SubCategory::where('category_id', $row->id)->orderBy('subcategory_name_en', 'ASC')->get();
              @endphp
              @foreach($subcategories as $row)
              <div class="col-sm-12 col-md-3">
                <a href="{{ route('subcategory.product', ['subcat_id'=>$row->id, 'slug'=>$row->subcategory_slug_en]) }}">
                  <h2 class="title">@if(session()->get('language') == 'bangla') {{ @$row->subcategory_name_bn }} @else {{ @$row->subcategory_name_en }} @endif</h2>
                </a>
                <ul class="links list-unstyled">
                  {{-- Sub-Sub-Categories --}}
                  @php
                    $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $row->id)->orderBy('subsubcategory_name_en', 'ASC')->get();
                  @endphp
                  @forelse($subsubcategories as $row)
                  <li><a href="{{ route('subsubcategory.product', ['subsubcat_id'=>$row->id, 'slug'=>$row->subsubcategory_slug_en]) }}">@if(session()->get('language') == 'bangla') {{ @$row->subsubcategory_name_bn }} @else {{ @$row->subsubcategory_name_en }} @endif</a></li>
                  @empty
                  @endforelse
                  {{-- end Sub-Sub-Categories --}}
                </ul>
              </div>
              <!-- /.col -->
              @endforeach
              {{-- end Sub-Categories --}}
            </div>
            <!-- /.row --> 
          </li>
          <!-- /.yamm-content -->
        </ul>
        <!-- /.dropdown-menu --> </li>
      <!-- /.menu-item -->
      @endforeach
      {{-- end Categories --}}
                  
    </ul>
    <!-- /.nav --> 
  </nav>
  <!-- /.megamenu-horizontal --> 
</div>
<!-- /.side-menu --> 