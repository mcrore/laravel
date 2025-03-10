@extends('template_backend.home')
@section('sub_judul', 'Tambah Post')
@section('content')

@if(count($errors)>0)
    @foreach ($errors->all() as $error)
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong> {{ $error }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    @endforeach
@endif

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <font color="black"> <strong>  {{ Session('success') }} </strong>  </font>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Judul :</label>
        <input type="text" class="form-control" id="judul" name="judul" value="{{old('judul')}} ">
    </div>
    <div class="form-group">
        <label>Kategori :</label>
        <select name="category_id" id="category_id" class="form-control">
            @foreach ($category as $c)
            <option value="{{$c->id}} "> {{$c->name}} </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Pilih Tags :</label>
        {{-- <input type="text" class="form-control" id="judul" name="judul"> --}}
        <select class="form-control select2" multiple="" name="tags[]">
            @foreach ($tags as $tag)
                <option value="{{$tag->id}} ">{{ $tag->name}} </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Konten :</label>
        <textarea name="content" class="form-control" id="content" cols="30" rows="10" id="content"> {{old('content')}} </textarea>
    </div>
    <div class="form-group">
        <label>Gambar :</label>
        <input type="file" class="form-control" id="gambar" name="gambar">
    </div>

   <button class="btn btn-primary btn-block"> Tambah Post </button>
</form>
@endsection