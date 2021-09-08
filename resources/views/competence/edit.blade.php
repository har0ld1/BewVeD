@extends('template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h1>Éditer une compétence</h1>
      <hr>
      <form method="POST">
        <div class="form-group">
          {{csrf_field()}}
          <label>Libellé</label>
          <input type="text" name="libelle" class="form-control" value="{{$competence->libelle}}" placeholder="Saisir votre libellé">
           @if($errors->has('libelle'))
                <small class="form-text text-danger">{{ $errors->first('libelle') }}</small>
           @endif
        </div>
        <button type="submit" class="btn btn-warning">Éditer</button>
      </form>
    </div>
  </div>
</div>
@endsection
