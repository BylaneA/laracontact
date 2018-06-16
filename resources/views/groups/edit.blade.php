@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
        
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
                    <div class="card-header bg-info text-white">Edition groupe : {{ $group->id}}</div>
                    <div class="card-body">
                        <form class="" action="{{ route('group.edit', ['group' => $group->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-form-label">Nom:</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Modifier</button>
                        </form>
                    </div>

                </div>
          </div>
      </div>
  </div>
@endsection
