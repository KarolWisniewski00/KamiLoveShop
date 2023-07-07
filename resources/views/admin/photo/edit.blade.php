@extends('layout.dashboard')
@section('main')
<div class="row mb-3">
    <div class="col-12">
        <div class="d-flex flex-row justify-content-start align-items-center">
            <h1 class="my-4 font-display me-2">Zdjęcia</h1>
            <span class="badge rounded-pill bg-primary">Wybrano: Edytowanie zdjęcia</span>
        </div>
    </div>
    <hr>
    <div class="mb-3"><a href="{{route('admin.photo')}}"><span class="badge rounded-pill bg-primary"><i class="fa-solid fa-chevron-left me-2"></i>Powrót</span></a></div>
    <div class="col-12">
        <form action="{{route('admin.photo.update', ['filename' => $filename])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row border rounded p-4 mx-1">
                <div class="col-12 col-md-6">
                    <h4>Podgląd</h4>
                    <div class="d-flex flex-column justify-content-center align-items-center border">
                        <img class="img-fluid" src="{{ asset('photos/' .$filename)}}" alt="" onerror="this.onerror=null; this.src=`{{ asset('svg/photos.svg') }}`;">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <h4>Wczytaj zdjęcie</h4>
                    <div class="form-floating my-3 w-100">
                        <input type="hidden" name="type" value="photo">
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/png, image/jpeg, image/jpg" required>
                        <label for="photo">Zdjęcie</label>
                        <span class="text-danger">@error('photo') {{$message}} @enderror</span>
                    </div>
                    <div class="form-floating my-3 w-100">
                        <input type="text" class="form-control" id="photo_name" name="photo_name" required>
                        <label for="photo_name">Nazwa zdjęcia</label>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-row justify-content-center align-items-center my-4">
                <button type="submit" class="btn btn-lg btn-primary me-2"><i class="fa-solid fa-floppy-disk me-2"></i>Zapisz</button>
                <a href="{{route('admin.photo')}}" class="btn btn-lg btn-secondary"><i class="fa-solid fa-x me-2"></i>Anuluj</a>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#photo').on('change', function() {
            var input = this;

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    var img = $('<img>').attr('src', e.target.result).addClass('img-fluid');
                    var previewContainer = $('.row .col-12 .col-md-6 h4:contains("Podgląd")').parent();
                    previewContainer.find('img, svg').remove();
                    previewContainer.append(img);

                    var fileName = input.files[0].name;
                    var fileNameWithoutExtension = fileName.replace(/\.[^/.]+$/, "");
                    $('#photo_name').val(fileNameWithoutExtension);
                }

                reader.readAsDataURL(input.files[0]);
            }
        });
    });
</script>
@endsection