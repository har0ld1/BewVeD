@extends('template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Liste des apprenants</h1>
            <hr>
            @include('alert', ['type' => 'success'])
        </div>
        <div class="col-sm-6">
            <form>
                <div class="form-group">
                    <label>Filtre ou recherche</label>
                    <input type="email" name="email" class="form-control">
                </div>
            </form>
        </div>
        <div class="col-sm-6">
            <div class="text-right mt-4">
                <a type="button" href="{{route('apprenant_create')}}" class="btn btn-warning">Créer un apprenant</a>
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
                                <a href="{{route('apprenant_edit', $item->id)}}" class="btn btn-primary">Éditer</a>
                                <a href="{{route('apprenant_delete', $item->id)}}" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
