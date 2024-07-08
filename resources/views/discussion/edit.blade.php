@extends('main.index')

@section('content')
    
  <section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Discussion</h1>
          <div class="custom-breadcrumbs">
            <a href="{{route('/')}}">Home</a> <span class="mx-2 slash">/</span>
            <a href="{{route('discussion.index')}}">Discussion</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Discussion</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card shadow-sm">
            <div class="card-body">
              <h2 class="card-title mb-4">Nouvelle Discussion</h2>
              <form action="{{ route('discussion.store') }}" method="POST">
                @csrf
                @foreach ($discussion as $item)
                    <div class="form-group">
                        <label for="sujet">Sujet</label>
                        <input type="text" class="form-control" id="sujet" name="sujet" placeholder="Sujet" value="{{$item->sujet}}" required>
                    </div>
                    <div class="form-group">
                        <label for="contenu">Contenu</label>
                        <textarea class="form-control" id="contenu" name="contenu" rows="5" placeholder="Contenu" required>{{$item->contenu}}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="etat">État</label>
                        <select class="form-control" id="etat" name="etat" required>
                        <option value="Ouvert" @if($discussion->etat == 'Ouvert') selected @endif>Ouvert</option>
                        <option value="Fermer" @if($discussion->etat == 'Ouvert') selected @endif>Fermé</option>
                        </select>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Modifier la Discussion</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection