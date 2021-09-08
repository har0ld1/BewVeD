@extends('template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h1>Créer une session</h1>
      <hr>
      <form method="POST">
        <div class="form-group">
          {{csrf_field()}}
          <label>Libellé</label>
          <input type="text" name="libelle" class="form-control" placeholder="Saisir votre libellé">
           @if($errors->has('libelle'))
                <small class="form-text text-danger">{{ $errors->first('libelle') }}</small>
           @endif
        </div>
        <div class="form-group">
          <label>Date</label>
          <input type="date" name="date" class="form-control">
            @if($errors->has('date'))
                <small class="form-text text-danger">{{ $errors->first('date') }}</small>
            @endif
        </div>
        <button type="submit" class="btn btn-warning">Créer</button>
      </form>
    </div>
  </div>
</div>
@endsection
