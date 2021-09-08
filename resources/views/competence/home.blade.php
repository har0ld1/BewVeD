@extends('template')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Liste des compétences</h1>
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
                <a type="button" href="{{route('competence_create')}}" class="btn btn-warning">Créer une compétence</a>
            </div>
        </div>
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Libellé</td>
                    <td style="width: 20%">Action</td>
                </tr>
                </thead>
                <tbody>
                    @foreach($competence as $item)
                        <tr>
                        <td>{{$item->libelle}}</td>
                        <td>
                            <a href="{{route('competence_edit', $item->id)}}"  class="btn btn-primary">Éditer</a>
                            <a href="{{route('competence_delete', $item->id)}}"  href="#" class="btn btn-danger">Supprimer</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
