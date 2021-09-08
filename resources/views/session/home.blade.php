@extends('template')
@section('content')
<div class="container">
  <div class="row">
      <div class="col-sm-12">
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
          <a type="button" href="{{route('session_create')}}" class="btn btn-warning">Créer session</a>
        </div>
      </div>
      @foreach($session as $item)
      <div class="col-sm-6 mb-2 mt-2">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">{{$item->libelle}}</h5>
                  <p class="card-text">Promotion du {{\Carbon\Carbon::parse($item->date)->format('d F Y')}}</p>
                  <a href="#" class="btn btn-primary">Accéder</a>
              </div>
          </div>
      </div>
      @endforeach
  </div>
</div>
@endsection
