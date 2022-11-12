@extends('admin.layout.main')

@section('konten')
<div class="content-wrapper">
  
  <div class="row">
    <div class="col-md-12">
      <div class="card">
     
        <div class="card-body">
        <h4 class="card-title">Penambahan Informasi Gunung Lawu
        </h4>
                  <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="{{url('informasi_store')}}">
                     @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Judul</label>
                      <input type="text" name="judul" class="form-control" required id="exampleInputName1" placeholder="Judul">
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Isi</label>
                        <textarea class="form-control" id="summernote" name="isi" required></textarea>
                    </div>

                      <label>Gambar</label>
                      <div class="input-group col-xs-12">
                         <input type="file" name="gambar" class="file-upload-default" required>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Tambah</button>
                    <a href="{{url('informasi_list')}}" class="btn btn-light">Batal</a>
                  </form>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
      $('#summernote').summernote({
        placeholder: 'Isi informasi disini...',
        tabsize: 2,
        height: 400,
        toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                   // ['insert', ['link', 'picture', 'hr']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']]
                ]
      });
    </script>
@endsection
