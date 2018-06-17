<table class="table table-bordered">
    <thead class="thead-light">
        <th>#ID</th>
        <th>Nom</th>
        <th>Téléphone</th>
        <th>Email</th>
        <th colspan="4" class="text-center">Actions</th>
    </thead>
    <tbody>
        @if(count($contacts) > 0)
            @foreach($contacts as $c)
            <tr>
                <td scope="row">{{ $c->id }}</td>
                <td>{{ $c->fullname }}</td>
                <th>{{ $c->phone }}</th>
                <th>{{ $c->email }}</th>
                <td colspan="3" class="text-center">
                    <a class="btn btn-info btn-sm" href="">details</a>
                    <a class="btn btn-warning btn-sm" href="">editer</a>
                    <a class="btn btn-danger btn-sm" href="">supprimer</a>
                </td>
            </tr>
            @endforeach
        @else
            <p class="text-center bg-info text-white">
                Aucun contact enregistré
            </p>
        @endif
    </tbody>
</table
