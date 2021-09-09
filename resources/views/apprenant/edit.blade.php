@extends('template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Éditer un apprenant</h1>
            <hr>
            <form method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Nom</label>
                    <input type="text" name="lastname" class="form-control" value="{{$apprenant->lastname}}"  placeholder="Saisir votre nom">
                    @if($errors->has('lastname'))
                        <small class="form-text text-danger">{{ $errors->first('lastname') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label>Prénom</label>
                    <input type="text" name="firstname" class="form-control" value="{{$apprenant->firstname}}" placeholder="Saisir votre prénom">
                    @if($errors->has('firstname'))
                        <small class="form-text text-danger">{{ $errors->first('firstname') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control" value="{{$apprenant->email}}" placeholder="Saisir votre e-mail">
                    @if($errors->has('email'))
                        <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label>Sexe</label>
                    <div>
                        @if($apprenant->gender === 'homme')
                            <input type="radio" id="man" name="gender" value="homme" checked>
                        @else
                            <input type="radio" id="man" name="gender" value="homme">
                        @endif
                            <label for="gender">Homme</label>
                        </div>
                        <div>
                        @if($apprenant->gender === 'femme')
                            <input type="radio" id="woman" name="gender" value="femme" checked>
                        @else
                            <input type="radio" id="woman" name="gender" value="femme">
                        @endif
                            <label for="gender">Femme</label>
                    </div>
                    @if($errors->has('gender'))
                        <small class="form-text text-danger">{{ $errors->first('gender') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" name="age" class="form-control" value="{{$apprenant->age}}" placeholder="Saisir votre age">
                    @if($errors->has('age'))
                        <small class="form-text text-danger">{{ $errors->first('age') }}</small>
                    @endif
                </div>
                @foreach($competences as $key=>$competence)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="skill" value="{{$competence->id}}"
                        @if (isset($apprenant->competences[$key]) && ($competence->id == $apprenant->competences[$key]->id))
                            checked
                            @endif>
                        <label class="form-check-label">{{$competence->libelle}}</label>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-warning mt-3">Editer</button>
            </form>
        </div>
    </div>
</div>
@endsection
