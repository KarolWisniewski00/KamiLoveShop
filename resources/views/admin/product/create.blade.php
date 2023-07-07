@extends('layout.dashboard')
@section('main')
<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex flex-row justify-content-start align-items-center">
            <h1 class="my-4 font-display me-2">Produkty</h1>
            <span class="badge rounded-pill bg-primary">Wybrano: Tworzenie nowego produktu</span>
        </div>
    </div>
    <hr>
    <div class="mb-3"><a href="{{route('admin.product')}}"><span class="badge rounded-pill bg-primary"><i class="fa-solid fa-chevron-left me-2"></i>Powrót</span></a></div>
    <div class="col-12">
        <form class="form text-center my-4" id="form" action="{{route('products_new_form')}}" method="POST" enctype="multipart/form-data">
            <!--TOKEN-->
            @csrf

            <div class="form-check my-3 d-flex flex-row justify-content-start align-items-center">
                <input class="form-check-input" type="checkbox" value="1" id="new" name="new" checked>
                <label class="form-check-label ps-2" for="new">
                    Nowość
                </label>
            </div>

            <div class="form-floating my-3">
                <input type="text" class="form-control" id="name" value="" name="name" required>
                <label for="name">Nazwa</label>
                <span class="text-danger">@error('name') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3">
                <input type="text" class="form-control" id="short_description" value="" name="short_description">
                <label for="short_description">Krótki opis</label>
                <span class="text-danger">@error('short_description') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3">
                <input type="text" class="form-control" id="long_description" value="" name="long_description">
                <label for="long_description">Długi opis</label>
                <span class="text-danger">@error('long_description') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3">
                <input type="text" class="form-control" id="normal_price" value="" name="normal_price" required>
                <label for="normal_price">Cena regularna</label>
                <span class="text-danger">@error('normal_price') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3">
                <input type="text" class="form-control" id="sale_price" value="" name="sale_price">
                <label for="sale_price">Cena promocyjna</label>
                <span class="text-danger">@error('sale_price') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3">
                <input type="text" class="form-control" id="SKU" value="" name="SKU" required>
                <label for="SKU">SKU</label>
                <span class="text-danger">@error('SKU') {{$message}} @enderror</span>
            </div>

            <div class="form-floating my-3 w-100">
                <input type="text" class="form-control" id="order" value="0" name="order">
                <label for="order">Kolejność</label>
                <span class="text-danger">@error('order') {{$message}} @enderror</span>
            </div>

            <div class="row border rounded p-4 mx-1 my-3">
                <div class="col-12 col-md-6">
                    <h4>Podgląd</h4>
                    <div class="d-flex flex-column justify-content-center align-items-center border">
                        <img class="img-fluid bd-placeholder-img img-single" src="{{ asset('svg/photos.svg') }}" alt="">
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
                                            <button type="button" data-filename="{{basename($file)}}" class="btn-single bg-transparent d-flex flex-column justify-content-between align-items-center h-100 border">
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

            <div class="row border rounded p-4 mx-1 my-3">
                <div class="col-12 col-md-6">
                    <h4>Podgląd</h4>
                    <div class="d-flex flex-column justify-content-center align-items-center border img-multi">
                        <img class="img-fluid bd-placeholder-img" src="{{ asset('svg/photos.svg') }}" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <h4>Wczytaj zdjęcia</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                        <i class="fa-solid fa-photo-film me-2"></i>Wybierz zdjęcia
                    </button>
                    <span class="text-danger">@error('photo') {{$message}} @enderror</span>

                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModal2Label"><i class="fa-solid fa-photo-film me-2"></i>Wybierz zdjęcie</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        @foreach(File::files(public_path('photos')) as $file)
                                        <div class="col-12 col-md-4 p-2">
                                            <button type="button" data-filename="{{basename($file)}}" class="btn-multi bg-transparent d-flex flex-column justify-content-between align-items-center h-100 border">
                                                <div class="d-flex flex-column justify-content-center align-items-center h-100 overflow-hidden">
                                                    <img alt="" src="{{ asset('photos/' . basename($file)) }}" class="img-fluid p-2" onerror="this.onerror=null; this.src=`{{ asset('svg/photos.svg') }}`;">
                                                </div>
                                            </button>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-lg btn-primary me-2" id="saveButton"><i class="fa-solid fa-floppy-disk me-2"></i>Zapisz</button>
                                    <button type="button" data-bs-dismiss="modal" class="btn btn-lg btn-secondary"><i class="fa-solid fa-x me-2"></i>Anuluj</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="photos" value="" id="photos" required>

            <div class="d-flex justify-content-start align-items-center mt-4">
                <button class="btn btn-lg btn-primary me-2" type="submit"><i class="fa-solid fa-floppy-disk me-2"></i>Zapisz</button>
                <a href="{{route('admin.product')}}" class="btn btn-lg btn-secondary me-2"><i class="fa-solid fa-xmark me-2"></i>Anuluj</a>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var selectedFileName = "";

        $('.modal-body button.btn-single').click(function() {
            $('.modal-body button.btn-single').removeClass('border-primary');
            $(this).addClass('border-primary');

            selectedFileName = $(this).data('filename');
        });

        $('.modal-footer button.btn-primary').click(function() {
            $('#photo').val(selectedFileName);
            $('#exampleModal').modal('hide');
            var imagePath = "{{ asset('photos/') }}/" + selectedFileName;
            if (selectedFileName == "") {
                var previewImage = `
                <img class="img-fluid bd-placeholder-img img-single" src="{{ asset('svg/photos.svg') }}" alt="">
                `;
                $('.img-single').replaceWith(previewImage);
            } else {
                var previewImage = '<img src="' + imagePath + '" class="img-fluid bd-placeholder-img p-2 img-single">';
                $('.img-single').replaceWith(previewImage);
            }
        });
    });

    $(document).ready(function() {
        var selectedFileNames = [];

        $('.modal-body button.btn-multi').click(function() {
            $(this).toggleClass('border-primary');

            var filename = $(this).data('filename');
            var index = selectedFileNames.indexOf(filename);

            if (index === -1) {
                selectedFileNames.push(filename);
            } else {
                selectedFileNames.splice(index, 1);
            }
        });

        $('#saveButton').click(function() {
            $('#photos').val(selectedFileNames.join(','));

            var previewImage;
            if (selectedFileNames.length === 0) {
                previewImage = `
                    <img class="img-fluid bd-placeholder-img" src="{{ asset('svg/photos.svg') }}" alt="">
                `;
            } else {
                previewImage = '';
                for (var i = 0; i < selectedFileNames.length; i++) {
                    var imagePath = "{{ asset('photos/') }}/" + selectedFileNames[i];
                    previewImage += '<div class="col"><div class="d-flex flex-column justify-content-center align-items-center border"><img src="' + imagePath + '" class="img-fluid bd-placeholder-img p-2"></div></div>';
                }
            }
            $('.img-multi').replaceWith('<div class="row border img-multi">'+previewImage+'</div>');

            $('#exampleModal2').modal('hide');
        });
    });
</script>
@endsection