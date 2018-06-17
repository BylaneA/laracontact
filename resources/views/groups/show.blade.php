@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          @include('layouts.sidebar')
          <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header bg-info text-white">Détails : {{ $group->id}}</div>
                    <div class="card-body">
                        <form class="">
                            <div class="form-group">
                                <label for="name" class="col-form-label">Nom du groupe:</label>
                                <input type="text" value="{{ $group->name}}" class="form-control" name="name" disabled="disabled" >
                            </div>
                            <a href="/home" class="btn btn-default btn-sm">Retour</a>
                        </form>
                    </div>

                </div>
          </div>
      </div>
  </div>
@endsection
