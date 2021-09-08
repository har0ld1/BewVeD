@extends('template')
@section('content')
<div class="row">
  <div class="container">
    <div class="col-sm-12">
      <h1>S'inscrire</h1>
      <hr>
      <form method="POST">
        {{ csrf_field() }}
        <div class="form-group">
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
        <div class="form-group">
          <label>Confirmation du Mot de passe</label>
          <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmez votre mot de passe">
          @if($errors->has('password_confirmation'))
            <small class="form-text text-danger">{{ $errors->first('password_confirmation') }}</small>
          @endif
        </div>
        <button type="submit" class="btn btn-warning">S'inscrire</button>
      </form>
    </div>
  </div>
</div>
@endsection
