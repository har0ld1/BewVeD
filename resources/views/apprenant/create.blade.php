@extends('template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Créer un apprenant</h1>
            <hr>
            <form method="POST">
                <div class="form-group">
                    {{csrf_field()}}
                    <label>Nom</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Saisir votre nom">
                    @if($errors->has('lastname'))
                        <small class="form-text text-danger">{{ $errors->first('lastname') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    {{csrf_field()}}
                    <label>Prénom</label>
                    <input type="text" name="firstname" class="form-control" placeholder="Saisir votre prénom">
                    @if($errors->has('firstname'))
                        <small class="form-text text-danger">{{ $errors->first('firstname') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    {{csrf_field()}}
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control" placeholder="Saisir votre e-mail">
                    @if($errors->has('email'))
                        <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    {{csrf_field()}}
                    <label>Sexe</label>
                    <div>
                        <input type="radio" id="man" name="gender" value="homme">
                        <label for="gender">Homme</label>
                    </div>
                    <div>
                        <input type="radio" id="woman" name="gender" value="femme">
                        <label for="gender">Femme</label>
                    </div>
                    @if($errors->has('gender'))
                        <small class="form-text text-danger">{{ $errors->first('gender') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    {{csrf_field()}}
                    <label>Age</label>
                    <input type="number" name="age" class="form-control" placeholder="Saisir votre age">
                    @if($errors->has('age'))
                        <small class="form-text text-danger">{{ $errors->first('age') }}</small>
                    @endif
                </div>
                <button type="submit" class="btn btn-warning">Créer</button>
            </form>
        </div>
    </div>
</div>
@endsection
