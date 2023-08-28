<a href="{{ route('product.show', $p->id) }}" class="border text-center p-4 position-relative h-100 d-flex flex-column justify-content-between align-items-center text-decoration-none">
    <img alt="product" src="{{ asset('photos/'.$p->photo)}}" onerror="this.onerror=null; this.src=`{{ asset('svg/photos.svg') }}`;" class="img-fluid">
    <h3 class="text-black">{{$p->name}}</h3>
    <p class="text-muted">{{$p->short_description}}</p>
    <div class="d-flex flex-row justify-content-center align-items-center mb-4">
        @if ($p->sale_price != 0)
        <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">{{$p->normal_price}} PLN</div>
        <div class="text-custom-2 fs-4"> {{$p->sale_price}} PLN</div>
        @else
        <div class="text-custom-2 fs-4"> {{$p->normal_price}} PLN</div>
        @endif
    </div>
    <div class="d-flex flex-row justify-content-between align-items-center">
        <button type="button" class="btn btn-custom-1 rounded-0 btn-lg"><i class="fa fa-search me-2"></i>Podgląd</button>
    </div>
    <div class="position-absolute top-0 start-100 p-2" style="transform:translateX(-100%)">
        @if ($p->sale_price != 0)
        <div class="bg-custom-1 p-2 text-white ">-{{round(100-(($p->sale_price*100)/$p->normal_price),2)}}%</div>
        @endif
    </div>
</a>