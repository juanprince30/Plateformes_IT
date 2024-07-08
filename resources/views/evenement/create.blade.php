<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un nouvel événement</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
                    <option value="webinar">Webinar</option>
                    <option value="salon">Salon</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Créer l'événement</button>
        </form>
    </div>
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

    <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
