@extends('main.index')

@section('content')
    
<section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
    <div class="container">
    <div class="row">
        <div class="col-md-7">
        <h1 class="text-white font-weight-bold">Evenements</h1>
        <div class="custom-breadcrumbs">
            <a href="{{route('offres.jobsRecents')}}">Home</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Profil</strong></span>
        </div>
        </div>
    </div>
    </div>
</section>

    <section style="margin-top: 5%; margin-bottom: 5%;">
        <div class="container mt-5">
            <h1>Créer un nouvel événement</h1>
    
            <form action="{{ route('events.store') }}" method="POST"  onsubmit="return validateForm()">
                @csrf
    
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" id="titre" class="form-control" required>
                </div>
    
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3"></textarea>
                </div>
    
                <div class="form-group">
                    <label for="date_debut">Date de début</label>
                    <input type="datetime-local" name="date_debut" id="date_debut" class="form-control" required>
                </div>
    
                <div class="form-group">
                    <label for="date_fin">Date de fin</label>
                    <input type="datetime-local" name="date_fin" id="date_fin" class="form-control" required>
                </div>
    
                <div class="form-group">
                    <label for="lieu">Lieu</label>
                    <input type="text" name="lieu" id="lieu" class="form-control">
                </div>
    
                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="webinar">Webinare</option>
                        <option value="salon">Salon</option>
                    </select>
                </div>
    
                <button type="submit" class="btn btn-primary">Créer l'événement</button>
            </form>
        </div>
    </section>

    <script>
        function validateForm() {
            var startDate = document.getElementById('date_debut').value;
            var currentDate = new Date().toISOString().split('T')[0]; // Get current date in YYYY-MM-DD format
            var endDate = document.getElementById('date_fin').value;
            if (startDate < currentDate) {
                alert('La date de début doit être égale ou postérieure à la date actuelle.');
                return false; // Prevent form submission
            }
            if (endDate < startDate) {
                alert('La date de fin doit être postérieure à la date de début.');
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
    </script>

@endsection