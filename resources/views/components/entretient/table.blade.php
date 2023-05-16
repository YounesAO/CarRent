<div class="m-2">
    <a class="btn btn-success" href="?form=true">Ajouter un entretient</a>
</div>
<table id='tableEntretient' class="table m-2" stryle='min-height : 100vh'>
    <thead>
        <tr>
            <th>Id entretien</th>
            <th>date d'entretien</th>
            <th>pièces changée</th>
            <th>montant</th>
        </tr>
    </thead>
    <tbody>
        @foreach($entretients as $e)
        <tr>
            <td>{{$e->idEntretient}}</td>
            <td>{{$e->date}}</td>
            <td><ul>@foreach($e->pieces as $p )<li>{{$p->nom}} </li>@endforeach </ul></td>
            <td>{{$e->montant}}</td>
        </tr>
        @endforeach
        </tbody>
</table>
<script>
     document.addEventListener('DOMContentLoaded', function () {
        $('#tableEntretient').DataTable({
            pagingType: 'full_numbers',
            language: {
                url: '{{ asset("lang/fr-FR.json") }}',
            }
        });

    }, false);
</script>