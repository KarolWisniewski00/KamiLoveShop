@extends('layout.dashboard')
@section('main')
<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex flex-row justify-content-start align-items-center">
            <h1 class="my-4 font-display me-2">Polityka prywatności</h1>
            <a href="{{route('admin.page-policy.create')}}"><span class="badge rounded-pill bg-primary"><i class="fa-solid fa-plus me-2"></i>Dodaj</span></a>
        </div>
    </div>
    <hr>
    @foreach($section as $s)
    <div class="col-12 mb-4">
        <div class="border p-4 d-flex flex-column justify-content-center align-items-center rounded h-100">
            @if ($s->type == true)
            <div class="d-flex justify-content-start align-items-center text-start my-4">
                <h1>{{$s->content}}</h1>
            </div>
            @else
            <div class="d-flex justify-content-start align-items-center text-start my-4">
                <p class="text-muted">{{$s->content}}</p>
            </div>
            @endif
            <div class="mt-4 d-flex flex-row justify-content-center align-items-center">
                <a href="{{route('admin.page-policy.edit', $s->id)}}" class="btn btn-primary btn-lg me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="{{route('admin.page-policy.delete', $s->id)}}" class="btn btn-danger btn-lg" onclick="return confirm('Czy na pewno chcesz usunąć tą sekcję?');"><i class="fa-solid fa-trash"></i></a>
            </div>
        </div>
    </div>
    @endforeach
    {{ $section->links('client.saco.module.pagination') }}
</div>
@endsection