@extends('main.index')

@section('content')
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <h1 class="text-white font-weight-bold">Modifier une Offre</h1>
              <div class="custom-breadcrumbs">
                <a href="{{route('offres.jobsRecents')}}">Home</a> <span class="mx-2 slash">/</span>
                <a href="{{route('offre.index')}}">Offre</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>Modifier Offre</strong></span>
              </div>
            </div>
          </div>
        </div>
      </section>
  
      
      <section class="site-section">
        <div class="container">
  
          <div class="row align-items-center mb-5">
            <div class="col-lg-8 mb-4 mb-lg-0">
              <div class="d-flex align-items-center">
                <div>
                  <h2><b>Modifier une Offre</b></h2>
                </div>
              </div>
            </div>
            
          </div>
          <div class="row mb-5">
            <div class="col-lg-12">
              <form class="p-4 p-md-5 border rounded" action="{{ route('offre.update', $offre->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h3 class="text-black mb-5 border-bottom pb-2">Details de l'Offre</h3>
                
                <div class="form-group">
                  <label for="company-website-tw d-block">Modifier une Image</label> <br>
                  <label class="btn btn-secondary btn-md btn-file">
                    Fichier<input type="file" id="image" name="image" hidden>
                  </label>
                </div>
  
                <div class="form-group">
                  <label for="email">Email <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="tonnom@tondomain.com" value="{{ $offre->email }}" required>
                </div>
                <div class="form-group">
                  <label for="job-title">Titre de l'Offre <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="titre" name="titre" placeholder="Developpement Web" value="{{ $offre->titre }}" required>
                </div>
                <div class="form-group">
                  <label for="job-location">Ville <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="ville" name="ville" placeholder="ex: Paris" value="{{ $offre->ville }}" required>
                </div>
  
                <div class="form-group">
                  <label for="pays">Pays <span class="text-danger">*</span></label>
                  <select name="pays" id="pays" class="selectpicker border rounded" data-style="btn-black" data-width="100%" data-live-search="true" title="Selectionner le pays" required>
                    <option value="" selected disabled hidden>Selectionner une option</option>
                    <option value="Afghanistan" {{ old('pays', $offre->pays) == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
                    <option value="Albanie" {{ old('pays', $offre->pays) == 'Albanie' ? 'selected' : '' }}>Albanie</option>
                    <option value="Algérie" {{ old('pays', $offre->pays) == 'Algérie' ? 'selected' : '' }}>Algérie</option>
                    <option value="Samoa américaines" {{ old('pays', $offre->pays) == 'Samoa américaines' ? 'selected' : '' }}>Samoa américaines</option>
                    <option value="Andorre" {{ old('pays', $offre->pays) == 'Andorre' ? 'selected' : '' }}>Andorre</option>
                    <option value="Angola" {{ old('pays', $offre->pays) == 'Angola' ? 'selected' : '' }}>Angola</option>
                    <option value="Anguilla" {{ old('pays', $offre->pays) == 'Anguilla' ? 'selected' : '' }}>Anguilla</option>
                    <option value="Antarctique" {{ old('pays', $offre->pays) == 'Antarctique' ? 'selected' : '' }}>Antarctique</option>
                    <option value="Antigua-et-Barbuda" {{ old('pays', $offre->pays) == 'Antigua-et-Barbuda' ? 'selected' : '' }}>Antigua-et-Barbuda</option>
                    <option value="Argentine" {{ old('pays', $offre->pays) == 'Argentine' ? 'selected' : '' }}>Argentine</option>
                    <option value="Arménie" {{ old('pays', $offre->pays) == 'Arménie' ? 'selected' : '' }}>Arménie</option>
                    <option value="Aruba" {{ old('pays', $offre->pays) == 'Aruba' ? 'selected' : '' }}>Aruba</option>
                    <option value="Australie" {{ old('pays', $offre->pays) == 'Australie' ? 'selected' : '' }}>Australie</option>
                    <option value="Autriche" {{ old('pays', $offre->pays) == 'Autriche' ? 'selected' : '' }}>Autriche</option>
                    <option value="Azerbaïdjan" {{ old('pays', $offre->pays) == 'Azerbaïdjan' ? 'selected' : '' }}>Azerbaïdjan</option>
                    <option value="Bahamas" {{ old('pays', $offre->pays) == 'Bahamas' ? 'selected' : '' }}>Bahamas</option>
                    <option value="Bahreïn" {{ old('pays', $offre->pays) == 'Bahreïn' ? 'selected' : '' }}>Bahreïn</option>
                    <option value="Bangladesh" {{ old('pays', $offre->pays) == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                    <option value="Barbade" {{ old('pays', $offre->pays) == 'Barbade' ? 'selected' : '' }}>Barbade</option>
                    <option value="Biélorussie" {{ old('pays', $offre->pays) == 'Biélorussie' ? 'selected' : '' }}>Biélorussie</option>
                    <option value="Belgique" {{ old('pays', $offre->pays) == 'Belgique' ? 'selected' : '' }}>Belgique</option>
                    <option value="Belize" {{ old('pays', $offre->pays) == 'Belize' ? 'selected' : '' }}>Belize</option>
                    <option value="Bénin" {{ old('pays', $offre->pays) == 'Bénin' ? 'selected' : '' }}>Bénin</option>
                    <option value="Bermudes" {{ old('pays', $offre->pays) == 'Bermudes' ? 'selected' : '' }}>Bermudes</option>
                    <option value="Bhoutan" {{ old('pays', $offre->pays) == 'Bhoutan' ? 'selected' : '' }}>Bhoutan</option>
                    <option value="Bolivie" {{ old('pays', $offre->pays) == 'Bolivie' ? 'selected' : '' }}>Bolivie</option>
                    <option value="Bosnie-Herzégovine" {{ old('pays', $offre->pays) == 'Bosnie-Herzégovine' ? 'selected' : '' }}>Bosnie-Herzégovine</option>
                    <option value="Botswana" {{ old('pays', $offre->pays) == 'Botswana' ? 'selected' : '' }}>Botswana</option>
                    <option value="Île Bouvet" {{ old('pays', $offre->pays) == 'Île Bouvet' ? 'selected' : '' }}>Île Bouvet</option>
                    <option value="Brésil" {{ old('pays', $offre->pays) == 'Brésil' ? 'selected' : '' }}>Brésil</option>
                    <option value="Territoire britannique de l'océan Indien" {{ old('pays', $offre->pays) == 'Territoire britannique de l\'océan Indien' ? 'selected' : '' }}>Territoire britannique de l'océan Indien</option>
                    <option value="Brunei" {{ old('pays', $offre->pays) == 'Brunei' ? 'selected' : '' }}>Brunei</option>
                    <option value="Bulgarie" {{ old('pays', $offre->pays) == 'Bulgarie' ? 'selected' : '' }}>Bulgarie</option>
                    <option value="Burkina Faso" {{ old('pays', $offre->pays) == 'Burkina Faso' ? 'selected' : '' }}>Burkina Faso</option>
                    <option value="Burundi" {{ old('pays', $offre->pays) == 'Burundi' ? 'selected' : '' }}>Burundi</option>
                    <option value="Cambodge" {{ old('pays', $offre->pays) == 'Cambodge' ? 'selected' : '' }}>Cambodge</option>
                    <option value="Cameroun" {{ old('pays', $offre->pays) == 'Cameroun' ? 'selected' : '' }}>Cameroun</option>
                    <option value="Canada" {{ old('pays', $offre->pays) == 'Canada' ? 'selected' : '' }}>Canada</option>
                    <option value="Cap-Vert" {{ old('pays', $offre->pays) == 'Cap-Vert' ? 'selected' : '' }}>Cap-Vert</option>
                    <option value="Îles Caïmans" {{ old('pays', $offre->pays) == 'Îles Caïmans' ? 'selected' : '' }}>Îles Caïmans</option>
                    <option value="République centrafricaine" {{ old('pays', $offre->pays) == 'République centrafricaine' ? 'selected' : '' }}>République centrafricaine</option>
                    <option value="Tchad" {{ old('pays', $offre->pays) == 'Tchad' ? 'selected' : '' }}>Tchad</option>
                    <option value="Chili" {{ old('pays', $offre->pays) == 'Chili' ? 'selected' : '' }}>Chili</option>
                    <option value="Chine" {{ old('pays', $offre->pays) == 'Chine' ? 'selected' : '' }}>Chine</option>
                    <option value="Île Christmas" {{ old('pays', $offre->pays) == 'Île Christmas' ? 'selected' : '' }}>Île Christmas</option>
                    <option value="Îles Cocos" {{ old('pays', $offre->pays) == 'Îles Cocos' ? 'selected' : '' }}>Îles Cocos</option>
                    <option value="Colombie" {{ old('pays', $offre->pays) == 'Colombie' ? 'selected' : '' }}>Colombie</option>
                    <option value="Comores" {{ old('pays', $offre->pays) == 'Comores' ? 'selected' : '' }}>Comores</option>
                    <option value="République du Congo" {{ old('pays', $offre->pays) == 'République du Congo' ? 'selected' : '' }}>République du Congo</option>
                    <option value="République démocratique du Congo" {{ old('pays', $offre->pays) == 'République démocratique du Congo' ? 'selected' : '' }}>République démocratique du Congo</option>
                    <option value="Îles Cook" {{ old('pays', $offre->pays) == 'Îles Cook' ? 'selected' : '' }}>Îles Cook</option>
                    <option value="Costa Rica" {{ old('pays', $offre->pays) == 'Costa Rica' ? 'selected' : '' }}>Costa Rica</option>
                    <option value="Croatie" {{ old('pays', $offre->pays) == 'Croatie' ? 'selected' : '' }}>Croatie</option>
                    <option value="Cuba" {{ old('pays', $offre->pays) == 'Cuba' ? 'selected' : '' }}>Cuba</option>
                    <option value="Chypre" {{ old('pays', $offre->pays) == 'Chypre' ? 'selected' : '' }}>Chypre</option>
                    <option value="République tchèque" {{ old('pays', $offre->pays) == 'République tchèque' ? 'selected' : '' }}>République tchèque</option>
                    <option value="Danemark" {{ old('pays', $offre->pays) == 'Danemark' ? 'selected' : '' }}>Danemark</option>
                    <option value="Djibouti" {{ old('pays', $offre->pays) == 'Djibouti' ? 'selected' : '' }}>Djibouti</option>
                    <option value="Dominique" {{ old('pays', $offre->pays) == 'Dominique' ? 'selected' : '' }}>Dominique</option>
                    <option value="République dominicaine" {{ old('pays', $offre->pays) == 'République dominicaine' ? 'selected' : '' }}>République dominicaine</option>
                    <option value="Équateur" {{ old('pays', $offre->pays) == 'Équateur' ? 'selected' : '' }}>Équateur</option>
                    <option value="Égypte" {{ old('pays', $offre->pays) == 'Égypte' ? 'selected' : '' }}>Égypte</option>
                    <option value="Salvador" {{ old('pays', $offre->pays) == 'Salvador' ? 'selected' : '' }}>Salvador</option>
                    <option value="Guinée équatoriale" {{ old('pays', $offre->pays) == 'Guinée équatoriale' ? 'selected' : '' }}>Guinée équatoriale</option>
                    <option value="Érythrée" {{ old('pays', $offre->pays) == 'Érythrée' ? 'selected' : '' }}>Érythrée</option>
                    <option value="Estonie" {{ old('pays', $offre->pays) == 'Estonie' ? 'selected' : '' }}>Estonie</option>
                    <option value="Éthiopie" {{ old('pays', $offre->pays) == 'Éthiopie' ? 'selected' : '' }}>Éthiopie</option>
                    <option value="Îles Falkland" {{ old('pays', $offre->pays) == 'Îles Falkland' ? 'selected' : '' }}>Îles Falkland</option>
                    <option value="Îles Féroé" {{ old('pays', $offre->pays) == 'Îles Féroé' ? 'selected' : '' }}>Îles Féroé</option>
                    <option value="Fidji" {{ old('pays', $offre->pays) == 'Fidji' ? 'selected' : '' }}>Fidji</option>
                    <option value="Finlande" {{ old('pays', $offre->pays) == 'Finlande' ? 'selected' : '' }}>Finlande</option>
                    <option value="France" {{ old('pays', $offre->pays) == 'France' ? 'selected' : '' }}>France</option>
                    <option value="Guyane française" {{ old('pays', $offre->pays) == 'Guyane française' ? 'selected' : '' }}>Guyane française</option>
                    <option value="Polynésie française" {{ old('pays', $offre->pays) == 'Polynésie française' ? 'selected' : '' }}>Polynésie française</option>
                    <option value="Terres australes françaises" {{ old('pays', $offre->pays) == 'Terres australes françaises' ? 'selected' : '' }}>Terres australes françaises</option>
                    <option value="Gabon" {{ old('pays', $offre->pays) == 'Gabon' ? 'selected' : '' }}>Gabon</option>
                    <option value="Gambie" {{ old('pays', $offre->pays) == 'Gambie' ? 'selected' : '' }}>Gambie</option>
                    <option value="Géorgie" {{ old('pays', $offre->pays) == 'Géorgie' ? 'selected' : '' }}>Géorgie</option>
                    <option value="Allemagne" {{ old('pays', $offre->pays) == 'Allemagne' ? 'selected' : '' }}>Allemagne</option>
                    <option value="Ghana" {{ old('pays', $offre->pays) == 'Ghana' ? 'selected' : '' }}>Ghana</option>
                    <option value="Gibraltar" {{ old('pays', $offre->pays) == 'Gibraltar' ? 'selected' : '' }}>Gibraltar</option>
                    <option value="Grèce" {{ old('pays', $offre->pays) == 'Grèce' ? 'selected' : '' }}>Grèce</option>
                    <option value="Groenland" {{ old('pays', $offre->pays) == 'Groenland' ? 'selected' : '' }}>Groenland</option>
                    <option value="Grenade" {{ old('pays', $offre->pays) == 'Grenade' ? 'selected' : '' }}>Grenade</option>
                    <option value="Guadeloupe" {{ old('pays', $offre->pays) == 'Guadeloupe' ? 'selected' : '' }}>Guadeloupe</option>
                    <option value="Guam" {{ old('pays', $offre->pays) == 'Guam' ? 'selected' : '' }}>Guam</option>
                    <option value="Guatemala" {{ old('pays', $offre->pays) == 'Guatemala' ? 'selected' : '' }}>Guatemala</option>
                    <option value="Guinée" {{ old('pays', $offre->pays) == 'Guinée' ? 'selected' : '' }}>Guinée</option>
                    <option value="Guinée-Bissau" {{ old('pays', $offre->pays) == 'Guinée-Bissau' ? 'selected' : '' }}>Guinée-Bissau</option>
                    <option value="Guyana" {{ old('pays', $offre->pays) == 'Guyana' ? 'selected' : '' }}>Guyana</option>
                    <option value="Haïti" {{ old('pays', $offre->pays) == 'Haïti' ? 'selected' : '' }}>Haïti</option>
                    <option value="Îles Heard-et-MacDonald" {{ old('pays', $offre->pays) == 'Îles Heard-et-MacDonald' ? 'selected' : '' }}>Îles Heard-et-MacDonald</option>
                    <option value="Honduras" {{ old('pays', $offre->pays) == 'Honduras' ? 'selected' : '' }}>Honduras</option>
                    <option value="Hong Kong" {{ old('pays', $offre->pays) == 'Hong Kong' ? 'selected' : '' }}>Hong Kong</option>
                    <option value="Hongrie" {{ old('pays', $offre->pays) == 'Hongrie' ? 'selected' : '' }}>Hongrie</option>
                    <option value="Islande" {{ old('pays', $offre->pays) == 'Islande' ? 'selected' : '' }}>Islande</option>
                    <option value="Inde" {{ old('pays', $offre->pays) == 'Inde' ? 'selected' : '' }}>Inde</option>
                    <option value="Indonésie" {{ old('pays', $offre->pays) == 'Indonésie' ? 'selected' : '' }}>Indonésie</option>
                    <option value="Iran" {{ old('pays', $offre->pays) == 'Iran' ? 'selected' : '' }}>Iran</option>
                    <option value="Irak" {{ old('pays', $offre->pays) == 'Irak' ? 'selected' : '' }}>Irak</option>
                    <option value="Irlande" {{ old('pays', $offre->pays) == 'Irlande' ? 'selected' : '' }}>Irlande</option>
                    <option value="Israël" {{ old('pays', $offre->pays) == 'Israël' ? 'selected' : '' }}>Israël</option>
                    <option value="Italie" {{ old('pays', $offre->pays) == 'Italie' ? 'selected' : '' }}>Italie</option>
                    <option value="Jamaïque" {{ old('pays', $offre->pays) == 'Jamaïque' ? 'selected' : '' }}>Jamaïque</option>
                    <option value="Japon" {{ old('pays', $offre->pays) == 'Japon' ? 'selected' : '' }}>Japon</option>
                    <option value="Jordanie" {{ old('pays', $offre->pays) == 'Jordanie' ? 'selected' : '' }}>Jordanie</option>
                    <option value="Kazakhstan" {{ old('pays', $offre->pays) == 'Kazakhstan' ? 'selected' : '' }}>Kazakhstan</option>
                    <option value="Kenya" {{ old('pays', $offre->pays) == 'Kenya' ? 'selected' : '' }}>Kenya</option>
                    <option value="Kiribati" {{ old('pays', $offre->pays) == 'Kiribati' ? 'selected' : '' }}>Kiribati</option>
                    <option value="Koweït" {{ old('pays', $offre->pays) == 'Koweït' ? 'selected' : '' }}>Koweït</option>
                    <option value="Kirghizistan" {{ old('pays', $offre->pays) == 'Kirghizistan' ? 'selected' : '' }}>Kirghizistan</option>
                    <option value="Laos" {{ old('pays', $offre->pays) == 'Laos' ? 'selected' : '' }}>Laos</option>
                    <option value="Lettonie" {{ old('pays', $offre->pays) == 'Lettonie' ? 'selected' : '' }}>Lettonie</option>
                    <option value="Liban" {{ old('pays', $offre->pays) == 'Liban' ? 'selected' : '' }}>Liban</option>
                    <option value="Lesotho" {{ old('pays', $offre->pays) == 'Lesotho' ? 'selected' : '' }}>Lesotho</option>
                    <option value="Liberia" {{ old('pays', $offre->pays) == 'Liberia' ? 'selected' : '' }}>Liberia</option>
                    <option value="Libye" {{ old('pays', $offre->pays) == 'Libye' ? 'selected' : '' }}>Libye</option>
                    <option value="Liechtenstein" {{ old('pays', $offre->pays) == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
                    <option value="Lituanie" {{ old('pays', $offre->pays) == 'Lituanie' ? 'selected' : '' }}>Lituanie</option>
                    <option value="Luxembourg" {{ old('pays', $offre->pays) == 'Luxembourg' ? 'selected' : '' }}>Luxembourg</option>
                    <option value="Macao" {{ old('pays', $offre->pays) == 'Macao' ? 'selected' : '' }}>Macao</option>
                    <option value="Macédoine" {{ old('pays', $offre->pays) == 'Macédoine' ? 'selected' : '' }}>Macédoine</option>
                    <option value="Madagascar" {{ old('pays', $offre->pays) == 'Madagascar' ? 'selected' : '' }}>Madagascar</option>
                    <option value="Malawi" {{ old('pays', $offre->pays) == 'Malawi' ? 'selected' : '' }}>Malawi</option>
                    <option value="Malaisie" {{ old('pays', $offre->pays) == 'Malaisie' ? 'selected' : '' }}>Malaisie</option>
                    <option value="Maldives" {{ old('pays', $offre->pays) == 'Maldives' ? 'selected' : '' }}>Maldives</option>
                    <option value="Mali" {{ old('pays', $offre->pays) == 'Mali' ? 'selected' : '' }}>Mali</option>
                    <option value="Malte" {{ old('pays', $offre->pays) == 'Malte' ? 'selected' : '' }}>Malte</option>
                    <option value="Îles Marshall" {{ old('pays', $offre->pays) == 'Îles Marshall' ? 'selected' : '' }}>Îles Marshall</option>
                    <option value="Martinique" {{ old('pays', $offre->pays) == 'Martinique' ? 'selected' : '' }}>Martinique</option>
                    <option value="Mauritanie" {{ old('pays', $offre->pays) == 'Mauritanie' ? 'selected' : '' }}>Mauritanie</option>
                    <option value="Maurice" {{ old('pays', $offre->pays) == 'Maurice' ? 'selected' : '' }}>Maurice</option>
                    <option value="Mayotte" {{ old('pays', $offre->pays) == 'Mayotte' ? 'selected' : '' }}>Mayotte</option>
                    <option value="Mexique" {{ old('pays', $offre->pays) == 'Mexique' ? 'selected' : '' }}>Mexique</option>
                    <option value="Micronésie" {{ old('pays', $offre->pays) == 'Micronésie' ? 'selected' : '' }}>Micronésie</option>
                    <option value="Moldavie" {{ old('pays', $offre->pays) == 'Moldavie' ? 'selected' : '' }}>Moldavie</option>
                    <option value="Monaco" {{ old('pays', $offre->pays) == 'Monaco' ? 'selected' : '' }}>Monaco</option>
                    <option value="Mongolie" {{ old('pays', $offre->pays) == 'Mongolie' ? 'selected' : '' }}>Mongolie</option>
                    <option value="Montserrat" {{ old('pays', $offre->pays) == 'Montserrat' ? 'selected' : '' }}>Montserrat</option>
                    <option value="Maroc" {{ old('pays', $offre->pays) == 'Maroc' ? 'selected' : '' }}>Maroc</option>
                    <option value="Mozambique" {{ old('pays', $offre->pays) == 'Mozambique' ? 'selected' : '' }}>Mozambique</option>
                    <option value="Myanmar" {{ old('pays', $offre->pays) == 'Myanmar' ? 'selected' : '' }}>Myanmar</option>
                    <option value="Namibie" {{ old('pays', $offre->pays) == 'Namibie' ? 'selected' : '' }}>Namibie</option>
                    <option value="Nauru" {{ old('pays', $offre->pays) == 'Nauru' ? 'selected' : '' }}>Nauru</option>
                    <option value="Népal" {{ old('pays', $offre->pays) == 'Népal' ? 'selected' : '' }}>Népal</option>
                    <option value="Pays-Bas" {{ old('pays', $offre->pays) == 'Pays-Bas' ? 'selected' : '' }}>Pays-Bas</option>
                    <option value="Nouvelle-Calédonie" {{ old('pays', $offre->pays) == 'Nouvelle-Calédonie' ? 'selected' : '' }}>Nouvelle-Calédonie</option>
                    <option value="Nouvelle-Zélande" {{ old('pays', $offre->pays) == 'Nouvelle-Zélande' ? 'selected' : '' }}>Nouvelle-Zélande</option>
                    <option value="Nicaragua" {{ old('pays', $offre->pays) == 'Nicaragua' ? 'selected' : '' }}>Nicaragua</option>
                    <option value="Niger" {{ old('pays', $offre->pays) == 'Niger' ? 'selected' : '' }}>Niger</option>
                    <option value="Nigeria" {{ old('pays', $offre->pays) == 'Nigeria' ? 'selected' : '' }}>Nigeria</option>
                    <option value="Niue" {{ old('pays', $offre->pays) == 'Niue' ? 'selected' : '' }}>Niue</option>
                    <option value="Île Norfolk" {{ old('pays', $offre->pays) == 'Île Norfolk' ? 'selected' : '' }}>Île Norfolk</option>
                    <option value="Corée du Nord" {{ old('pays', $offre->pays) == 'Corée du Nord' ? 'selected' : '' }}>Corée du Nord</option>
                    <option value="Îles Mariannes du Nord" {{ old('pays', $offre->pays) == 'Îles Mariannes du Nord' ? 'selected' : '' }}>Îles Mariannes du Nord</option>
                    <option value="Norvège" {{ old('pays', $offre->pays) == 'Norvège' ? 'selected' : '' }}>Norvège</option>
                    <option value="Oman" {{ old('pays', $offre->pays) == 'Oman' ? 'selected' : '' }}>Oman</option>
                    <option value="Pakistan" {{ old('pays', $offre->pays) == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                    <option value="Palau" {{ old('pays', $offre->pays) == 'Palau' ? 'selected' : '' }}>Palau</option>
                    <option value="Palestine" {{ old('pays', $offre->pays) == 'Palestine' ? 'selected' : '' }}>Palestine</option>
                    <option value="Panama" {{ old('pays', $offre->pays) == 'Panama' ? 'selected' : '' }}>Panama</option>
                    <option value="Papouasie-Nouvelle-Guinée" {{ old('pays', $offre->pays) == 'Papouasie-Nouvelle-Guinée' ? 'selected' : '' }}>Papouasie-Nouvelle-Guinée</option>
                    <option value="Paraguay" {{ old('pays', $offre->pays) == 'Paraguay' ? 'selected' : '' }}>Paraguay</option>
                    <option value="Pérou" {{ old('pays', $offre->pays) == 'Pérou' ? 'selected' : '' }}>Pérou</option>
                    <option value="Philippines" {{ old('pays', $offre->pays) == 'Philippines' ? 'selected' : '' }}>Philippines</option>
                    <option value="Îles Pitcairn" {{ old('pays', $offre->pays) == 'Îles Pitcairn' ? 'selected' : '' }}>Îles Pitcairn</option>
                    <option value="Pologne" {{ old('pays', $offre->pays) == 'Pologne' ? 'selected' : '' }}>Pologne</option>
                    <option value="Portugal" {{ old('pays', $offre->pays) == 'Portugal' ? 'selected' : '' }}>Portugal</option>
                    <option value="Porto Rico" {{ old('pays', $offre->pays) == 'Porto Rico' ? 'selected' : '' }}>Porto Rico</option>
                    <option value="Qatar" {{ old('pays', $offre->pays) == 'Qatar' ? 'selected' : '' }}>Qatar</option>
                    <option value="La Réunion" {{ old('pays', $offre->pays) == 'La Réunion' ? 'selected' : '' }}>La Réunion</option>
                    <option value="Roumanie" {{ old('pays', $offre->pays) == 'Roumanie' ? 'selected' : '' }}>Roumanie</option>
                    <option value="Russie" {{ old('pays', $offre->pays) == 'Russie' ? 'selected' : '' }}>Russie</option>
                    <option value="Rwanda" {{ old('pays', $offre->pays) == 'Rwanda' ? 'selected' : '' }}>Rwanda</option>
                    <option value="Saint-Kitts-et-Nevis" {{ old('pays', $offre->pays) == 'Saint-Kitts-et-Nevis' ? 'selected' : '' }}>Saint-Kitts-et-Nevis</option>
                    <option value="Sainte-Lucie" {{ old('pays', $offre->pays) == 'Sainte-Lucie' ? 'selected' : '' }}>Sainte-Lucie</option>
                    <option value="Saint-Pierre-et-Miquelon" {{ old('pays', $offre->pays) == 'Saint-Pierre-et-Miquelon' ? 'selected' : '' }}>Saint-Pierre-et-Miquelon</option>
                    <option value="Saint-Vincent-et-les-Grenadines" {{ old('pays', $offre->pays) == 'Saint-Vincent-et-les-Grenadines' ? 'selected' : '' }}>Saint-Vincent-et-les-Grenadines</option>
                    <option value="Samoa" {{ old('pays', $offre->pays) == 'Samoa' ? 'selected' : '' }}>Samoa</option>
                    <option value="Saint-Marin" {{ old('pays', $offre->pays) == 'Saint-Marin' ? 'selected' : '' }}>Saint-Marin</option>
                    <option value="Sao Tomé-et-Principe" {{ old('pays', $offre->pays) == 'Sao Tomé-et-Principe' ? 'selected' : '' }}>Sao Tomé-et-Principe</option>
                    <option value="Arabie saoudite" {{ old('pays', $offre->pays) == 'Arabie saoudite' ? 'selected' : '' }}>Arabie saoudite</option>
                    <option value="Sénégal" {{ old('pays', $offre->pays) == 'Sénégal' ? 'selected' : '' }}>Sénégal</option>
                    <option value="Serbie" {{ old('pays', $offre->pays) == 'Serbie' ? 'selected' : '' }}>Serbie</option>
                    <option value="Seychelles" {{ old('pays', $offre->pays) == 'Seychelles' ? 'selected' : '' }}>Seychelles</option>
                    <option value="Sierra Leone" {{ old('pays', $offre->pays) == 'Sierra Leone' ? 'selected' : '' }}>Sierra Leone</option>
                    <option value="Singapour" {{ old('pays', $offre->pays) == 'Singapour' ? 'selected' : '' }}>Singapour</option>
                    <option value="Slovaquie" {{ old('pays', $offre->pays) == 'Slovaquie' ? 'selected' : '' }}>Slovaquie</option>
                    <option value="Slovénie" {{ old('pays', $offre->pays) == 'Slovénie' ? 'selected' : '' }}>Slovénie</option>
                    <option value="Îles Salomon" {{ old('pays', $offre->pays) == 'Îles Salomon' ? 'selected' : '' }}>Îles Salomon</option>
                    <option value="Somalie" {{ old('pays', $offre->pays) == 'Somalie' ? 'selected' : '' }}>Somalie</option>
                    <option value="Afrique du Sud" {{ old('pays', $offre->pays) == 'Afrique du Sud' ? 'selected' : '' }}>Afrique du Sud</option>
                    <option value="Corée du Sud" {{ old('pays', $offre->pays) == 'Corée du Sud' ? 'selected' : '' }}>Corée du Sud</option>
                    <option value="Espagne" {{ old('pays', $offre->pays) == 'Espagne' ? 'selected' : '' }}>Espagne</option>
                    <option value="Sri Lanka" {{ old('pays', $offre->pays) == 'Sri Lanka' ? 'selected' : '' }}>Sri Lanka</option>
                    <option value="Soudan" {{ old('pays', $offre->pays) == 'Soudan' ? 'selected' : '' }}>Soudan</option>
                    <option value="Suriname" {{ old('pays', $offre->pays) == 'Suriname' ? 'selected' : '' }}>Suriname</option>
                    <option value="Suède" {{ old('pays', $offre->pays) == 'Suède' ? 'selected' : '' }}>Suède</option>
                    <option value="Suisse" {{ old('pays', $offre->pays) == 'Suisse' ? 'selected' : '' }}>Suisse</option>
                    <option value="Syrie" {{ old('pays', $offre->pays) == 'Syrie' ? 'selected' : '' }}>Syrie</option>
                    <option value="Taïwan" {{ old('pays', $offre->pays) == 'Taïwan' ? 'selected' : '' }}>Taïwan</option>
                    <option value="Tadjikistan" {{ old('pays', $offre->pays) == 'Tadjikistan' ? 'selected' : '' }}>Tadjikistan</option>
                    <option value="Tanzanie" {{ old('pays', $offre->pays) == 'Tanzanie' ? 'selected' : '' }}>Tanzanie</option>
                    <option value="Thaïlande" {{ old('pays', $offre->pays) == 'Thaïlande' ? 'selected' : '' }}>Thaïlande</option>
                    <option value="Timor oriental" {{ old('pays', $offre->pays) == 'Timor oriental' ? 'selected' : '' }}>Timor oriental</option>
                    <option value="Togo" {{ old('pays', $offre->pays) == 'Togo' ? 'selected' : '' }}>Togo</option>
                    <option value="Tokelau" {{ old('pays', $offre->pays) == 'Tokelau' ? 'selected' : '' }}>Tokelau</option>
                    <option value="Tonga" {{ old('pays', $offre->pays) == 'Tonga' ? 'selected' : '' }}>Tonga</option>
                    <option value="Trinité-et-Tobago" {{ old('pays', $offre->pays) == 'Trinité-et-Tobago' ? 'selected' : '' }}>Trinité-et-Tobago</option>
                    <option value="Tunisie" {{ old('pays', $offre->pays) == 'Tunisie' ? 'selected' : '' }}>Tunisie</option>
                    <option value="Turquie" {{ old('pays', $offre->pays) == 'Turquie' ? 'selected' : '' }}>Turquie</option>
                    <option value="Turkménistan" {{ old('pays', $offre->pays) == 'Turkménistan' ? 'selected' : '' }}>Turkménistan</option>
                    <option value="Tuvalu" {{ old('pays', $offre->pays) == 'Tuvalu' ? 'selected' : '' }}>Tuvalu</option>
                    <option value="Ouganda" {{ old('pays', $offre->pays) == 'Ouganda' ? 'selected' : '' }}>Ouganda</option>
                    <option value="Ukraine" {{ old('pays', $offre->pays) == 'Ukraine' ? 'selected' : '' }}>Ukraine</option>
                    <option value="Émirats arabes unis" {{ old('pays', $offre->pays) == 'Émirats arabes unis' ? 'selected' : '' }}>Émirats arabes unis</option>
                    <option value="Royaume-Uni" {{ old('pays', $offre->pays) == 'Royaume-Uni' ? 'selected' : '' }}>Royaume-Uni</option>
                    <option value="États-Unis" {{ old('pays', $offre->pays) == 'États-Unis' ? 'selected' : '' }}>États-Unis</option>
                    <option value="Uruguay" {{ old('pays', $offre->pays) == 'Uruguay' ? 'selected' : '' }}>Uruguay</option>
                    <option value="Ouzbékistan" {{ old('pays', $offre->pays) == 'Ouzbékistan' ? 'selected' : '' }}>Ouzbékistan</option>
                    <option value="Vanuatu" {{ old('pays', $offre->pays) == 'Vanuatu' ? 'selected' : '' }}>Vanuatu</option>
                    <option value="Vatican" {{ old('pays', $offre->pays) == 'Vatican' ? 'selected' : '' }}>Vatican</option>
                    <option value="Venezuela" {{ old('pays', $offre->pays) == 'Venezuela' ? 'selected' : '' }}>Venezuela</option>
                    <option value="Vietnam" {{ old('pays', $offre->pays) == 'Vietnam' ? 'selected' : '' }}>Vietnam</option>
                    <option value="Îles Vierges britanniques" {{ old('pays', $offre->pays) == 'Îles Vierges britanniques' ? 'selected' : '' }}>Îles Vierges britanniques</option>
                    <option value="Îles Vierges des États-Unis" {{ old('pays', $offre->pays) == 'Îles Vierges des États-Unis' ? 'selected' : '' }}>Îles Vierges des États-Unis</option>
                    <option value="Wallis-et-Futuna" {{ old('pays', $offre->pays) == 'Wallis-et-Futuna' ? 'selected' : '' }}>Wallis-et-Futuna</option>
                    <option value="Yémen" {{ old('pays', $offre->pays) == 'Yémen' ? 'selected' : '' }}>Yémen</option>
                    <option value="Zambie" {{ old('pays', $offre->pays) == 'Zambie' ? 'selected' : '' }}>Zambie</option>
                    <option value="Zimbabwe" {{ old('pays', $offre->pays) == 'Zimbabwe' ? 'selected' : '' }}>Zimbabwe</option>
                  </select>
                </div>
  
                <div class="form-group">
                  <label for="type_offre">Type de l'Offre <span class="text-danger">*</span></label>
                  <select class="selectpicker border rounded" id="type_offre" name="type_offre" data-style="btn-black" data-width="100%" data-live-search="true" title="Selectionner le type de l'offre"  required>
                    <option value="" selected disabled hidden>Selectionner une option</option>
                    <option value="Stage" {{ old('pays', $offre->type_offre) == 'Stage' ? 'selected' : '' }}>Stage</option>
                    <option value="Emploi" {{ old('pays', $offre->type_offre) == 'Emploi' ? 'selected' : '' }}>Emploi</option>
                    <option value="Formation" {{ old('pays', $offre->type_offre) == 'Formation' ? 'selected' : '' }}>Formation</option>
                  </select>
                </div>

                
                <div class="form-group">
                    <label for="prix">Prix (Formation)</label>
                    <input type="number" min="0" class="form-control" id="prix" name="prix" placeholder="Le prix en FCFA pour une formation" @if ($offre->prix)value="{{ $offre->prix }}" @endif>
                </div>
                
                
                
                
                <div class="form-group">
                    <label for="salaire">Salaire (Stage ou Emploi)</label>
                    <input type="number" min="0" class="form-control" id="salaire" name="salaire" placeholder="Le salaire en FCFA pour emploi ou stage" @if ($offre->salaire) value="{{ $offre->salaire }}" @endif>
                </div>
                

                <div class="form-group">
                  <label for="experience_requis">Experiences requis ? <span class="text-danger">*</span></label>
                  <input type="number" min="0" class="form-control" id="experience_requis" name="experience_requis" value="{{ $offre->experience_requis }}">
                </div>

                <div class="form-group">
                    <label for="niveau_etude">Niveau d'Etude requis</label>
                    <select name="niveau_etude" id="niveau_etude" class="form-control" required>
                        <option value="" selected disabled hidden>Selectionner une option</option>
                        <option value="Bac+1" {{ old('niveau_etude', $offre->niveau_etude) == 'Bac+1' ? 'selected' : '' }}>Bac+1</option>
                        <option value="Bac+2" {{ old('niveau_etude', $offre->niveau_etude) == 'Bac+2' ? 'selected' : '' }}>Bac+2</option>
                        <option value="Bac+3" {{ old('niveau_etude', $offre->niveau_etude) == 'Bac+3' ? 'selected' : '' }}>Bac+3</option>
                        <option value="Bac+4" {{ old('niveau_etude', $offre->niveau_etude) == 'Bac+4' ? 'selected' : '' }}>Bac+4</option>
                        <option value="Bac+5" {{ old('niveau_etude', $offre->niveau_etude) == 'Bac+5' ? 'selected' : '' }}>Bac+5</option>
                        <option value="Bac+6" {{ old('niveau_etude', $offre->niveau_etude) == 'Bac+6' ? 'selected' : '' }}>Bac+6</option>
                        <option value="Bac+7" {{ old('niveau_etude', $offre->niveau_etude) == 'Bac+7' ? 'selected' : '' }}>Bac+7</option>
                    </select>
                </div>
      
                <div class="form-group">
                    <label for="competence_requis">Compétences requises <span class="text-danger">*</span></label>
                    <input type="" class="form-control" id="competence_requis" name="competence_requis" value="{{ $offre->competence_requis }}" required>
                </div>
  
                <div class="form-group">
                  <label for="responsabilite">Description de l'offre <span class="text-danger">*</span></label>
                  <textarea name="responsabilite" id="responsabilite" class="editor form-control" rows="15" required>{{$offre->responsabilite}}</textarea>
                </div>

                <div class="form-group">
                  <label for="date_debut">Date Debut <span class="text-danger">*</span></label>
                  <input type="date" id="date_debut_offre" name="date_debut_offre" value="{{ $offre->date_debut_offre }}" required>
                </div>
        
                <div class="form-group">
                  <label for="date_fin">Date Fin <span class="text-danger">*</span></label>
                  <input type="date" id="date_fin_offre" name="date_fin_offre" value="{{ $offre->date_fin_offre }}" required>
                </div>
  
  
                <h3 class="text-black my-5 border-bottom pb-2">Details de l'Entreprise</h3>
                <div class="form-group">
                  <label for="entreprise">Nom de l'Entreprise <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="entreprise" name="entreprise" placeholder="ex: Orange" value="{{ $offre->entreprise }}" required>
                </div>
                
                <div class="form-group">
                  <label for="website">Site Web</label>
                  <input type="text" class="form-control" id="website" name="website" placeholder="https://" @if ($offre->website) value="{{ $offre->website }}" @endif>
                </div>
  
                <div class="form-group">
                  <label for="company-website-tw d-block">Modifier le Logo</label> <br>
                  <label class="btn btn-secondary btn-md btn-file">
                    Fichier<input type="file" name="logo" id="logo" hidden>
                  </label>
                  <div id="image-error" class="text-danger"></div>
                </div>
                
                <div class="row align-items-center mb-5">
            
                  <div class="col-lg-4 ml-auto">
                    <div class="row">
                      <div class="col-6"text-right> 
                        <a href="{{ route('offre.mesoffre') }}" class="btn btn-block btn-danger btn-md">Annuler</a>
                      </div>
                      <div class="col-6 text-right">
                        <button type="submit" class="btn btn-block btn-primary btn-md" onclick="return confirm('Etes vous sur de Modifier cette Offre?!')">Modifier</a></button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
  
           
          </div>
        </div>
      </section>
  
@endsection