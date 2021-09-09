@extends('template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Ajouter des apprenants à la session</h1>
            @include('alert', ['type' => 'success'])
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Email</td>
                    <td>Sexe</td>
                    <td>Age</td>
                    <td>Compétences</td>
                    <td style="width: 20%">Action</td>
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
                    <td>
                        <a href="{{route('apprenant_add_submit', [$session->id, $item->id])}}" class="btn btn-primary">Ajouter</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{route('session_show', [$session->id])}}" class="btn btn-warning">Retour</a>
        </div>
    </div>
</div>
@endsection
