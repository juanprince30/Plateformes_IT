@extends('main.index')

@section('content')

<section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Discussion</h1>
          <div class="custom-breadcrumbs">
            <a href="{{route('offres.jobsRecents')}}">Home</a> <span class="mx-2 slash">/</span>
            <a href="{{route('discussion.index')}}">Discussion</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Reponse</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section style="margin-top: 5%; margin-bottom: 9%;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-secondary text-white text-center">
                        <h3>Répondre à la Discussion</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('reponse.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="discussion_id" value="{{ $discussion->id }}">
                            <div class="form-group">
                                <label for="contenu">Votre Réponse</label>
                                <textarea class="form-control" id="contenu" name="contenu" rows="9" placeholder="Tapez votre réponse ici..." required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success btn-block">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

@endsection