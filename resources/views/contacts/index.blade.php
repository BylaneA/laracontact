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
          @if($errors->has('name'))
            @alert(['type' => 'danger'])
              Le champs ne peut être vide
            @endalert
          @endif
            <div class="card card-default">
                <div class="card-header bg-info text-white">Liste des contacts</div>
                <div class="card-body">
                    <p>
                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#addGroup" data-whatever="@getbootstrap">Nouveau</button>
                    </p>
                </div>
            </div>
            {{ $contacts->links() }}
        </div>

    </div>

</div>
@endsection
