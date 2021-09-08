@extends('template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h1>Se connecter</h1>
      <hr>
        @include('alert', ['type' => 'danger'])
      <form method="POST">
        <div class="form-group">
          {{csrf_field()}}
          <label>Adresse e-mail</label>
          <input type="email" name="email" class="form-control" placeholder="Saisir votre adresse e-mail">
            @if($errors->has('email'))
                <small class="form-text text-danger">{{ $errors->first('email') }}</small>
            @endif
        </div>
        <div class="form-group">
          <label>Mot de passe</label>
          <input type="password" name="password" class="form-control" placeholder="Saisir votre mot de passe">
            @if($errors->has('password'))
                <small class="form-text text-danger">{{ $errors->first('password') }}</small>
            @endif
        </div>
        <button type="submit" class="btn btn-warning">Se connecter</button>
      </form>
    </div>
  </div>
</div>
@endsection
