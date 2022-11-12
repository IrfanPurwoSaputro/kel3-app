@extends('admin.layout.main')

@section('konten')
<div class="content-wrapper">
  
  <div class="row">
    <div class="col-md-12">
      <div class="card">
     
        <div class="card-body">
        <h4 class="card-title">Perubahan Informasi Gunung Lawu
        </h4>
                  <form class="forms-sample"  method="POST" enctype="multipart/form-data"
                        action="{{url('informasi_update/'.$data->id_informasi)}}">
                     @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Judul</label>
                      <input type="text" name="judul" class="form-control" required 
                      id="exampleInputName1" placeholder="Judul" value="{{$data->judul}}">
                    </div>

                    <div class="form-group">
                        <label for="exampleTextarea1">Isi</label>
                        <textarea class="form-control" id="summernote" name="isi" required><?php echo $data->isi?></textarea>
                    </div>

                      <label>Gambar</label>
                      <div class="input-group col-xs-12">
                         <input type="file" name="gambar" class="file-upload-default" >
                         <input type="hidden" value="{{$data->gambar}}" name="old_gambar">
                      </div>
                      <small style="color:red;">Pilih gambar bila ada perubahan!</small>
                      <div class="form-group">
                        <label for="exampleTextarea1">Gambar Sekarang</label>
                        <img src="{{$data->gambar}}" style="width:100%;">
                        <small style="color:red;">Akan berubah apabila di update saat klik ubah!</small>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Ubah</button>
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
