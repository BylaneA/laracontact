@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
      @if($errors->has('name'))
        @alert(['type' => 'danger'])
          Le champs ne peut être vide
        @endalert
      @endif
        <div class="col-md-2">
            <div class="list-group">
                <a href="" class="btn btn-secondary list-group-item list-group-item-action">
                    Groupes &nbsp; <span class="badge badge-info">{{ $group_number }}</span>
                </a>
                <a href="" class="btn btn-secondary list-group-item list-group-item-action">
                    Contacts &nbsp; <span class="badge badge-info">{{ $contact_number }}</span>
                </a>
            </div>
        </div>

        <div class="col-md-10">
            <div class="card card-default">
                <div class="card-header bg-info text-white">Liste des groupes</div>
                <div class="card-body">
                    <p>
                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#addGroup" data-whatever="@getbootstrap">Nouveau</button>
                    </p>
                    @include('groups.table')
                </div>
            </div>
            {{ $groups->links() }}
        </div>

    </div>

</div>
@include('groups.add')
@endsection
