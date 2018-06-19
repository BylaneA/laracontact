@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        @include('layouts.sidebar')

        <div class="col-md-10">
          @if( Session::has( 'success' ))
              {{ Session::get( 'success' ) }}
          @elseif( Session::has( 'warning' ))
              {{ Session::get( 'warning' ) }}
          @endif
            <div class="card card-default">
                <div class="card-header bg-info text-white">Liste des contacts</div>
                <div class="card-body">
                    <p>
                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#addContact" data-whatever="@getbootstrap">Nouveau</button>
                    </p>
                    @include('contacts.table')
                </div>
            </div>
            {{ $contacts->links() }}
        </div>

    </div>

</div>
@include('contacts.add')
@endsection

@section('script')
  $('document').ready(function () {
    $('#groupe').multiSelect({
      selectableHeader:"<span class='text-info'>Groupes</span>",
      selectionHeader:"<span class='text-info'>Groupes selectionnés</span>"
    })
  });
@endsection
