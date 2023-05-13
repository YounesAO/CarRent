@php $title = "parametres génerales" @endphp
@extends('dashboard')

@section('content')
<div class="m-3 fw">

    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <ul class="nav fw nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" aria-current="page" href="#Marques">Marques</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"  data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">les modèles par marque</a>
                <ul class="dropdown-menu">
                @foreach($marques as $marque)
                <li class="m-1 " ><a class=" p-2 dropdown-item" data-bs-toggle="tab" href="#m-{{$marque->idMarque}}" >{{$marque->marque}}</a></li>
                @endforeach
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#Pieces" >Pieces et Entretients</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
        </li>
    </ul>
</div>

<div class="tab-content fw m-2 ">
    <div id="Marques" class ="tab-pane active m-2">
      <h3>les marques enregistrées</h3>
      <table class="table col-8">
        <thead>
            <tr>
                <th>idMarque</th>
                <th>Nom de la Marque</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marques as $marque)
            <tr>
                <td>{{$marque->idMarque}}</td>
                <td>{{$marque->marque}}</td>
                <td><a href="edite/marque/{{$marque->idMarque}}" class="btn shadow-none  btn-warning">Edite</a></td>
                <td><a href="/delete/marque/{{$marque->idMarque}}" class="btn btn-danger">Supprimer</a></td>
            </tr>
            
            @endforeach
           
        </tbody>
      </table>
    </div>
    @foreach($marques as $marque)

    <div id="m-{{$marque->idMarque}}" class="tab-pane fade m-2">
        <h3>les modèles des voitures marque :{{$marque->marque}}</h3>
        <table class="table col-8">
            <thead>
                <tr>
                    <th>idModèle</th>
                    <th>Nom de la Modèle</th>
                    <th>Date de la Modèle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($marque->models as $model)
                <tr>
                    <td>{{$model->idModel}}</td>
                    <td>{{$model->model}}</td>
                    <td>{{$model->annee}}</td>
                    <td><a href="edite/model/{{$model->idModel}}" class="btn shadow-none  btn-warning">Edite</a></td>
                    <td><a href="/delete/model/{{$model->idModel}}" class="btn btn-danger">Supprimer</a></td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>
    @endforeach

    <div id="Pieces" class="tab-pane fade">
      <h3>list des pieces et conditions des entretients</h3>
      <table class="table col-8">
        <thead>
            <th>
                <th colspan="5">Informations sur les pièces</th>
                <th colspan="2">Condition d'entretien</th>
                <th colspan="2">Actions</th>

            </th>
            <tr>
                
                <th>id Pieces</th>
                <th>Nom </th>
                <th>prix </th>
                <th>icon </th>
                <th>Description</th>
                <th>Condition de distance</th>
                <th>Condition de temps</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            
            @foreach ($pieces as $p)
            <tr>
                <td>{{$p->idPiece}}</td>
                <td>{{$p->nom}}</td>
                <td>{{$p->prix==null?'---':$p->prix}}</td>
                <td><img src="{{ asset("images/$p->img") }}" alt="" style="width: 40px"></td>
                <td>{{$p->description==null?'---':$p->description}}</td>
                <td>{{$p->maxKilo==null?'---':$p->maxKilo." km"}} </td>
                <td>{{$p->maxDurre==null?'---':$p->maxDurre}}</td>
                <td><a href="edite/piece/{{$p->idPiece}}" class="btn shadow-none  btn-warning">Edite</a></td>
                <td><a href="/delete/piece/{{$p->idPiece}}" class="btn btn-danger">Supprimer</a></td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
    </div>
  </div>
@endsection