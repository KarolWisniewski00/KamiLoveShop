<div class="border text-center p-4 shadow position-relative h-100 d-flex flex-column justify-content-between align-items-center">
    <img alt="product_photo" src="{{ asset('photos/'.$product->photo)}}" class="img-fluid">
    <h3>{{$product->name}}</h3>
    <p class="text-muted">{{$product->short_description}}</p>
    <div class="d-flex flex-row justify-content-center align-items-center mb-4">
        @if ($product->sale_price != 0)
        <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">{{$product->normal_price}} PLN</div>
        <div class="text-custom-1 fs-4"> {{$product->sale_price}} PLN</div>
        @else
        <div class="text-custom-1 fs-4"> {{$product->normal_price}} PLN</div>
        @endif
    </div>
    <div class="d-flex flex-row justify-content-start align-items-center flex-wrap mb-2">
        @if (in_array($product->id,$sizes_id))
        @foreach($brokers_all as $broker)
        @if($broker->product_id == $product->id)
        @foreach($sizes as $size)
        @if ($size->id == $broker->size_id)
        <span class="bg-custom-1 rounded-pill badge m-1">{{$size->value}}</span>
        @endif
        @endforeach
        @endif
        @endforeach
        @else
        @endif
    </div>
    <div class="d-flex flex-row justify-content-between align-items-center">
        @if (in_array($product->id,$sizes_id))
        <a href="{{ url('product/'.$product->id)}}" class="btn btn-custom-2 w-100 h-100">Wybierz opcję</a>
        @else
        <button class="btn btn-custom-1 w-75 h-100 me-2">Dodaj do koszyka</button>
        <a href="{{ url('product/'.$product->id)}}" class="btn btn-custom-2 w-25 h-100 text-white d-flex justify-content-center align-items-center"><i class="fa fa-search"></i></a>
        @endif
    </div>
    <div class="position-absolute top-0 start-100 p-2" style="transform:translateX(-100%)">
        @if ($product->new != 0)
        <div class="bg-custom-1 p-2 text-white mb-2 shadow rounded">Nowość!</div>
        @endif
        @if ($product->sale_price != 0)
        <div class="bg-custom-2 p-2 text-white shadow rounded">-{{round(100-(($product->sale_price*100)/$product->normal_price),2)}}%</div>
        @endif
    </div>
</div>