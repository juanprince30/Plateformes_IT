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
            <span class="text-white"><strong>Discussion</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section style="margin-top: 5%;">
    <div class="container my-5">
        <div class="row">
            <div class="col-md-10">

            </div>
            <div class="col-md-2">
                <button class="btn btn-success"><a href="{{route('discussion.create')}}" style="color:white; text-decoration:none;">Nouvelle Discussion</a></button>
            </div>
        </div>
        <h1 class="text-center mb-4">Liste des Discussions</h1>
        <form class="mb-4" id="search-form">
            <select id="search-input" class="form-control select2" placeholder="Rechercher par catégorie..."></select>
        </form>
        @if(session('message'))
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
        @endif
        <div class="row" id="discussion-list">
            @foreach($discussions as $discussion)
                <div class="col-md-12 mb-4">
                    <div class="card badge-secondary">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('discussion.show', $discussion) }}">{{ $discussion->sujet }}</a>
                            </h5>
                            <p class="card-text">
                                {{ Str::limit($discussion->contenu, 150) }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">Posté par {{ $discussion->user->name }}</small>
                                <small class="text-muted">{{ $discussion->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4" id="pagination-links">
            {{ $discussions->links() }}
        </div>
    </div>
</section>

    @endsection