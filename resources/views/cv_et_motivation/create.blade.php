        

            @extends('main.index')
            @section('content')
                
            <section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
                <div class="container">
                <div class="row">
                    <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Profil</h1>
                    <div class="custom-breadcrumbs">
                        <a href="{{route('offres.jobsRecents')}}">Home</a> <span class="mx-2 slash">/</span>
                        <a href="{{route('offre.index')}}">Profil</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Profil</strong></span>
                    </div>
                    </div>
                </div>
                </div>
            </section>
            
            <section>
                <div class="row" style="margin-top: 8%; margin-bottom: 8%;">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <h1>Ajouter un cv et motivation </h1>

                        <form method='POST' action='{{ route('cv_et_motivation.store') }}' enctype="multipart/form-data">

                            @csrf
                            
                            <label for="cv" class="col-form-label">Cv : </label>
                            <input type="file" id="cv" name="cv" class="form-control">
                            <label for="motivation" class="col-form-label">Motivation : </label>
                            <input type="file" id="motivation" name="motivation" class="form-control">
                            <label for="description" class="col-form-label">Description : </label>
                            <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                            <br>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>


                        <form>
                    </div>
                </div>
            @endsection