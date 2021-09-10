@extends('template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h1>{{$session->libelle}}</h1>
        </div>
        <div class="col-sm-6">
            <div class="text-right mt-0">
                <a type="button" href="{{route('apprenant_add', $session->id)}}" class="btn btn-warning">Gérer les apprenants</a>
            </div>
        </div>
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>Nom</td>
                        <td>Prénom</td>
                        <td>Email</td>
                        <td>Sexe</td>
                        <td>Age</td>
                        <td>Compétences</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($apprenant as $item)
                    <tr>
                        <td>{{$item->lastname}}</td>
                        <td>{{$item->firstname}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->gender}}</td>
                        <td>{{$item->age}}</td>
                        <td>
                            @foreach(\App\Models\Apprenant::find($item->id)->competences as $competence)
                                {{$competence->libelle}}
                            @endforeach
                        </td>
                        <td><a href="{{route('apprenant_remove', [$session->id, $item->id])}}" class="btn btn-danger">Supprimer</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="card">
                <div class="card-header">
                    Mini-Groupes
                </div>
                <div class="card-body">
                    @if(!$minigroupe)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Sexe</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Age</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">Compétences</label>
                    </div><br>
                    <a href="{{route('create_mini_groupe', $session->id)}}" class="btn btn-primary" type="submit">Créer les mini-groupes</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
