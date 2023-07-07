@extends('layout.dashboard')
@section('main')
<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex flex-row justify-content-start align-items-center">
            <h1 class="my-4 font-display me-2">Kategorie</h1>
            <span class="badge rounded-pill bg-primary">Wybrano: Tworzenie nowej kategorii</span>
        </div>
    </div>
    <hr>
    <div class="mb-3"><a href="{{route('admin.category')}}"><span class="badge rounded-pill bg-primary"><i class="fa-solid fa-chevron-left me-2"></i>Powrót</span></a></div>
    <div class="col-12">
        <form method="POST" action="{{route('admin.category.store')}}">
            <!--TOKEN-->
            @csrf
            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="name" value="" name="name" required>
                <label for="name">Nazwa</label>
                <span class="text-danger">@error('name') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="plural" value="" name="plural" required>
                <label for="plural">L.mnoga</label>
                <span class="text-danger">@error('plural') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="url" value="" name="url" required>
                <label for="url">URL</label>
                <span class="text-danger">@error('url') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="order" value="0" name="order" required>
                <label for="order">Kolejność</label>
                <span class="text-danger">@error('order') {{$message}} @enderror</span>
            </div>

            <div class="row border rounded p-4 mx-1">
                <div class="col-12 col-md-6">
                    <h4>Podgląd</h4>
                    <div class="d-flex flex-column justify-content-center align-items-center border">
                        <img class="img-fluid bd-placeholder-img" src="{{ asset('svg/photos.svg') }}" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <h4>Wczytaj zdjęcie</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-photo-film me-2"></i>Wybierz zdjęcie
                    </button>
                    <span class="text-danger">@error('photo') {{$message}} @enderror</span>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="fa-solid fa-photo-film me-2"></i>Wybierz zdjęcie</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        @foreach(File::files(public_path('photos')) as $file)
                                        <div class="col-12 col-md-4 p-2">
                                            <button type="button" data-filename="{{basename($file)}}" class="bg-transparent d-flex flex-column justify-content-between align-items-center h-100 border">
                                                <div class="d-flex flex-column justify-content-center align-items-center h-100 overflow-hidden">
                                                    <img alt="" src="{{ asset('photos/' . basename($file)) }}" class="img-fluid p-2" onerror="this.onerror=null; this.src=`{{ asset('svg/photos.svg') }}`;">
                                                </div>
                                            </button>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-lg btn-primary me-2"><i class="fa-solid fa-floppy-disk me-2"></i>Zapisz</button>
                                    <button type="button" data-bs-dismiss="modal" class="btn btn-lg btn-secondary"><i class="fa-solid fa-x me-2"></i>Anuluj</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="photo" value="" id="photo" required>
            <div class="d-flex justify-content-start align-items-center mt-4">
                <button type="submit" class="btn btn-lg btn-primary me-2"><i class="fa-solid fa-floppy-disk me-2"></i>Zapisz</button>
                <a href="{{route('admin.category')}}" class="btn btn-lg btn-secondary"><i class="fa-solid fa-x me-2"></i>Anuluj</a>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var selectedFileName = "";

        $('.modal-body button').click(function() {
            $('.modal-body button').removeClass('border-primary');
            $(this).addClass('border-primary');

            selectedFileName = $(this).data('filename');
        });

        $('.modal-footer button.btn-primary').click(function() {
            $('#photo').val(selectedFileName);
            $('#exampleModal').modal('hide');
            var imagePath = "{{ asset('photos/') }}/" + selectedFileName;
            if (selectedFileName == "") {
                var previewImage = `
                <img class="img-fluid bd-placeholder-img" src="{{ asset('svg/photos.svg') }}" alt="">
                `;
                $('.bd-placeholder-img').replaceWith(previewImage);
            } else {
                var previewImage = '<img src="' + imagePath + '" class="img-fluid bd-placeholder-img p-2">';
                $('.bd-placeholder-img').replaceWith(previewImage);
            }
        });
    });
</script>


@endsection