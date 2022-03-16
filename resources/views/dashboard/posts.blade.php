@extends('layouts.master')
@section('content')
<form action="{{route('post.store')}}" method="post">
    <div class="mb-3">
      <label for="title" class="form-label">Titulo</label>
      <input type="text" class="form-control" name="title" id="title" >
      
    </div>
    <div class="mb-3">
      <label for="url_clean" class="form-label">Url Limpia</label>
      <input type="text" class="form-control" name="url_clean" id="url_clean">
    </div>
    <div class="mb-3 form-check">
        <label for="content" class="form-label">Contenido</label>
      <textarea class="form-control" id="content" name="content" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    
@endsection