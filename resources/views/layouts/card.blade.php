<div class="border text-center p-4  position-relative h-100 d-flex flex-column justify-content-between align-items-center">
    <a href="{{ url('product/'.$p->id)}}" class="">
        <img alt="product_photo" src="{{ asset('photos/'.$p->photo)}}" class="img-fluid">
    </a>
    <h3>{{$p->name}}</h3>
    <p class="text-muted">{{$p->short_description}}</p>
    <div class="d-flex flex-row justify-content-center align-items-center mb-4">
        @if ($p->sale_price != 0)
        <div class="text-muted" style="text-decoration: line-through;padding-top:1px;">{{$p->normal_price}} PLN</div>
        <div class="text-custom-1 fs-4"> {{$p->sale_price}} PLN</div>
        @else
        <div class="text-custom-1 fs-4"> {{$p->normal_price}} PLN</div>
        @endif
    </div>
    <div class="d-flex flex-row justify-content-start align-items-center flex-wrap mb-2">
        @if (in_array($p->id,$sizes_id))
        @foreach($brokers_all as $broker)
        @if($broker->product_id == $p->id)
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
        @if (in_array($p->id,$sizes_id))
        <a href="{{ url('product/'.$p->id)}}" class="btn btn-custom-2 w-100 h-100">
            <div class="d-flex justify-content-start align-items-center">
                <div><i class="fa-solid fa-hand-point-up m-1"></i></div>
                <div>Wybierz opcję</div>
            </div>
        </a>
        @else
        <form method="POST" action="{{route('busket_new_form')}}" class="w-75 me-2">
            @csrf
            <input type="hidden" name="product_id" value="{{$p->id}}">
            <input type="hidden" name="quantity" value="1">
            <button type="submit" class="btn btn-custom-1 w-100 h-100">
                <div class="d-flex justify-content-start align-items-center">
                    <div><i class="fa-solid fa-cart-shopping m-1"></i></div>
                    <div>Dodaj do koszyka</div>
                </div>
            </button>
        </form>
        <a href="{{ url('product/'.$p->id)}}" class="btn btn-custom-2 w-25 h-100 text-white d-flex justify-content-center align-items-center"><i class="fa fa-search"></i></a>
        @endif
    </div>
    <div class="position-absolute top-0 start-100 p-2" style="transform:translateX(-100%)">
        @if ($p->new != 0)
        <div class="bg-custom-1 p-2 text-white mb-2  rounded">Nowość!</div>
        @endif
        @if ($p->sale_price != 0)
        <div class="bg-custom-2 p-2 text-white  rounded">-{{round(100-(($p->sale_price*100)/$p->normal_price),2)}}%</div>
        @endif
    </div>
</div>