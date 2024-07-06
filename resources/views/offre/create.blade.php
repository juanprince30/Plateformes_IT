@extends('main.index')

@section('content')
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('IT/images/hero_1.jpg');" id="home-section">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <h1 class="text-white font-weight-bold">Poster une Offre</h1>
              <div class="custom-breadcrumbs">
                <a href="{{route('/')}}">Home</a> <span class="mx-2 slash">/</span>
                <a href="{{route('offre.index')}}">Offre</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>Poster Offre</strong></span>
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
                  <h2><b>Poster une Offre</b></h2>
                </div>
              </div>
            </div>
            
          </div>
          <div class="row mb-5">
            <div class="col-lg-12">
              <form class="p-4 p-md-5 border rounded" action="{{ route('offre.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h3 class="text-black mb-5 border-bottom pb-2">Details de l'Offre</h3>
                
                <div class="form-group">
                  <label for="company-website-tw d-block">Ajouter une Image</label> <br>
                  <label class="btn btn-secondary btn-md btn-file">
                    Fichier<input type="file" id="image" name="image" hidden>
                  </label>
                </div>
  
                <div class="form-group">
                  <label for="email">Email <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="tonnom@tondomain.com" required>
                </div>
                <div class="form-group">
                  <label for="job-title">Titre de l'Offre <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="titre" name="titre" placeholder="Developpement Web" required>
                </div>
                <div class="form-group">
                  <label for="job-location">Ville <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="ville" name="ville" placeholder="ex: Paris" required>
                </div>
  
                <div class="form-group">
                  <label for="pays">Pays <span class="text-danger">*</span></label>
                  <select class="selectpicker border rounded" id="pays" name="pays" data-style="btn-black" data-width="100%" data-live-search="true" title="Selectionner le Pays" required>
                    <option value="" selected disabled hidden>Selectionner une option</option>
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Albanie">Albanie</option>
                    <option value="Algérie">Algérie</option>
                    <option value="Samoa américaines">Samoa américaines</option>
                    <option value="Andorre">Andorre</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antarctique">Antarctique</option>
                    <option value="Antigua-et-Barbuda">Antigua-et-Barbuda</option>
                    <option value="Argentine">Argentine</option>
                    <option value="Arménie">Arménie</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australie">Australie</option>
                    <option value="Autriche">Autriche</option>
                    <option value="Azerbaïdjan">Azerbaïdjan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahreïn">Bahreïn</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbade">Barbade</option>
                    <option value="Biélorussie">Biélorussie</option>
                    <option value="Belgique">Belgique</option>
                    <option value="Belize">Belize</option>
                    <option value="Bénin">Bénin</option>
                    <option value="Bermudes">Bermudes</option>
                    <option value="Bhoutan">Bhoutan</option>
                    <option value="Bolivie">Bolivie</option>
                    <option value="Bosnie-Herzégovine">Bosnie-Herzégovine</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Île Bouvet">Île Bouvet</option>
                    <option value="Brésil">Brésil</option>
                    <option value="Territoire britannique de l'océan Indien">Territoire britannique de l'océan Indien</option>
                    <option value="Brunei">Brunei</option>
                    <option value="Bulgarie">Bulgarie</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodge">Cambodge</option>
                    <option value="Cameroun">Cameroun</option>
                    <option value="Canada">Canada</option>
                    <option value="Cap-Vert">Cap-Vert</option>
                    <option value="Îles Caïmans">Îles Caïmans</option>
                    <option value="République centrafricaine">République centrafricaine</option>
                    <option value="Tchad">Tchad</option>
                    <option value="Chili">Chili</option>
                    <option value="Chine">Chine</option>
                    <option value="Île Christmas">Île Christmas</option>
                    <option value="Îles Cocos">Îles Cocos</option>
                    <option value="Colombie">Colombie</option>
                    <option value="Comores">Comores</option>
                    <option value="Congo">Congo</option>
                    <option value="République démocratique du Congo">République démocratique du Congo</option>
                    <option value="Îles Cook">Îles Cook</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                    <option value="Croatie">Croatie</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Chypre">Chypre</option>
                    <option value="République tchèque">République tchèque</option>
                    <option value="Danemark">Danemark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominique">Dominique</option>
                    <option value="République dominicaine">République dominicaine</option>
                    <option value="Équateur">Équateur</option>
                    <option value="Égypte">Égypte</option>
                    <option value="Salvador">Salvador</option>
                    <option value="Guinée équatoriale">Guinée équatoriale</option>
                    <option value="Érythrée">Érythrée</option>
                    <option value="Estonie">Estonie</option>
                    <option value="Eswatini">Eswatini</option>
                    <option value="Éthiopie">Éthiopie</option>
                    <option value="Îles Malouines">Îles Malouines</option>
                    <option value="Îles Féroé">Îles Féroé</option>
                    <option value="Fidji">Fidji</option>
                    <option value="Finlande">Finlande</option>
                    <option value="France">France</option>
                    <option value="Guyane française">Guyane française</option>
                    <option value="Polynésie française">Polynésie française</option>
                    <option value="Terres australes et antarctiques françaises">Terres australes et antarctiques françaises</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambie">Gambie</option>
                    <option value="Géorgie">Géorgie</option>
                    <option value="Allemagne">Allemagne</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Grèce">Grèce</option>
                    <option value="Groenland">Groenland</option>
                    <option value="Grenade">Grenade</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guinée">Guinée</option>
                    <option value="Guinée-Bissau">Guinée-Bissau</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haïti">Haïti</option>
                    <option value="Îles Heard-et-MacDonald">Îles Heard-et-MacDonald</option>
                    <option value="Vatican">Vatican</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hongrie">Hongrie</option>
                    <option value="Islande">Islande</option>
                    <option value="Inde">Inde</option>
                    <option value="Indonésie">Indonésie</option>
                    <option value="Iran">Iran</option>
                    <option value="Irak">Irak</option>
                    <option value="Irlande">Irlande</option>
                    <option value="Israël">Israël</option>
                    <option value="Italie">Italie</option>
                    <option value="Jamaïque">Jamaïque</option>
                    <option value="Japon">Japon</option>
                    <option value="Jordanie">Jordanie</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Corée du Nord">Corée du Nord</option>
                    <option value="Corée du Sud">Corée du Sud</option>
                    <option value="Koweït">Koweït</option>
                    <option value="Kirghizistan">Kirghizistan</option>
                    <option value="Laos">Laos</option>
                    <option value="Lettonie">Lettonie</option>
                    <option value="Liban">Liban</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Libéria">Libéria</option>
                    <option value="Libye">Libye</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lituanie">Lituanie</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macao">Macao</option>
                    <option value="Macédoine du Nord">Macédoine du Nord</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Malaisie">Malaisie</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malte">Malte</option>
                    <option value="Îles Marshall">Îles Marshall</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritanie">Mauritanie</option>
                    <option value="Maurice">Maurice</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexique">Mexique</option>
                    <option value="États fédérés de Micronésie">États fédérés de Micronésie</option>
                    <option value="Moldavie">Moldavie</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolie">Mongolie</option>
                    <option value="Monténégro">Monténégro</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Maroc">Maroc</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Namibie">Namibie</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Népal">Népal</option>
                    <option value="Pays-Bas">Pays-Bas</option>
                    <option value="Nouvelle-Calédonie">Nouvelle-Calédonie</option>
                    <option value="Nouvelle-Zélande">Nouvelle-Zélande</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigéria">Nigéria</option>
                    <option value="Niue">Niue</option>
                    <option value="Île Norfolk">Île Norfolk</option>
                    <option value="Macedoine du Nord">Macedoine du Nord</option>
                    <option value="Norvège">Norvège</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palaos">Palaos</option>
                    <option value="Palestine">Palestine</option>
                    <option value="Panama">Panama</option>
                    <option value="Papouasie-Nouvelle-Guinée">Papouasie-Nouvelle-Guinée</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Pérou">Pérou</option>
                    <option value="Philippines">Philippines</option>
                    <option value="Pitcairn">Pitcairn</option>
                    <option value="Pologne">Pologne</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Porto Rico">Porto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Réunion">Réunion</option>
                    <option value="Roumanie">Roumanie</option>
                    <option value="Russie">Russie</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="Sainte-Hélène">Sainte-Hélène</option>
                    <option value="Saint-Kitts-et-Nevis">Saint-Kitts-et-Nevis</option>
                    <option value="Sainte-Lucie">Sainte-Lucie</option>
                    <option value="Saint-Pierre-et-Miquelon">Saint-Pierre-et-Miquelon</option>
                    <option value="Saint-Vincent-et-les-Grenadines">Saint-Vincent-et-les-Grenadines</option>
                    <option value="Samoa">Samoa</option>
                    <option value="Saint-Marin">Saint-Marin</option>
                    <option value="Sao Tomé-et-Principe">Sao Tomé-et-Principe</option>
                    <option value="Arabie saoudite">Arabie saoudite</option>
                    <option value="Sénégal">Sénégal</option>
                    <option value="Serbie">Serbie</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapour">Singapour</option>
                    <option value="Slovaquie">Slovaquie</option>
                    <option value="Slovénie">Slovénie</option>
                    <option value="Îles Salomon">Îles Salomon</option>
                    <option value="Somalie">Somalie</option>
                    <option value="Afrique du Sud">Afrique du Sud</option>
                    <option value="Géorgie du Sud-et-les Îles Sandwich du Sud">Géorgie du Sud-et-les Îles Sandwich du Sud</option>
                    <option value="Sud-Soudan">Sud-Soudan</option>
                    <option value="Espagne">Espagne</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Soudan">Soudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Svalbard et Jan Mayen">Svalbard et Jan Mayen</option>
                    <option value="Suède">Suède</option>
                    <option value="Suisse">Suisse</option>
                    <option value="Syrie">Syrie</option>
                    <option value="Taïwan">Taïwan</option>
                    <option value="Tadjikistan">Tadjikistan</option>
                    <option value="Tanzanie">Tanzanie</option>
                    <option value="Thaïlande">Thaïlande</option>
                    <option value="Timor-Leste">Timor-Leste</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinité-et-Tobago">Trinité-et-Tobago</option>
                    <option value="Tunisie">Tunisie</option>
                    <option value="Turquie">Turquie</option>
                    <option value="Turkménistan">Turkménistan</option>
                    <option value="Îles Turques-et-Caïques">Îles Turques-et-Caïques</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Ouganda">Ouganda</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="Émirats arabes unis">Émirats arabes unis</option>
                    <option value="Royaume-Uni">Royaume-Uni</option>
                    <option value="États-Unis">États-Unis</option>
                    <option value="Uruguay">Uruguay</option>
                    <option value="Ouzbékistan">Ouzbékistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Îles Vierges britanniques">Îles Vierges britanniques</option>
                    <option value="Îles Vierges des États-Unis">Îles Vierges des États-Unis</option>
                    <option value="Sahara occidental">Sahara occidental</option>
                    <option value="Yémen">Yémen</option>
                    <option value="Zambie">Zambie</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                  </select>
                </div>
  
                <div class="form-group">
                  <label for="type_offre">Type de l'Offre <span class="text-danger">*</span></label>
                  <select class="selectpicker border rounded" id="type_offre" name="type_offre" data-style="btn-black" data-width="100%" data-live-search="true" title="Selectionner le type de l'offre" required>
                    <option value="" selected disabled hidden>Selectionner une option</option>
                    <option value="Stage">Stage</option>
                    <option value="Emploi">Emploi</option>
                    <option value="Formation">Formation</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="prix">Prix (Formation)</label>
                  <input type="number" min="0" class="form-control" id="prix" name="prix" placeholder="Le prix en FCFA pour une formation">
                </div>
      
                <div class="form-group">
                    <label for="salaire">Salaire (Stage ou Emploi)</label>
                    <input type="number" min="0" class="form-control" id="salaire" name="salaire" placeholder="Le salaire en FCFA pour emploi ou stage">
                </div>

                <div class="form-group">
                  <label for="experience_requis">Experiences requis ? <span class="text-danger">*</span></label>
                  <input type="number" min="0" class="form-control" id="experience_requis" name="experience_requis">
                </div>
        
                <div class="form-group">
                    <label for="niveau_etude">Niveau d'Etude requis <span class="text-danger">*</span></label>
                    <select name="niveau_etude" id="niveau_etude" class="form-control" required>
                        <option value="" selected disabled hidden>Selectionner une option</option>
                        <option value="Bac+1">Bac+1</option>
                        <option value="Bac+2">Bac+2</option>
                        <option value="Bac+3">Bac+3</option>
                        <option value="Bac+4">Bac+4</option>
                        <option value="Bac+5">Bac+5</option>
                        <option value="Bac+6">Bac+6</option>
                        <option value="Bac+7">Bac+7</option>
                    </select>
                </div>

                <div class="form-group">
                  <label for="categorie_id" class="col-sm-2 col-form-label">Catégorie <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="categorie_id" id="categorie_search" placeholder="Sélectionner une catégorie" required>
                </div>
      
                <div class="form-group">
                    <label for="competence_requis">Compétences requises <span class="text-danger">*</span></label>
                    <input type="" class="form-control" id="competence_requis" name="competence_requis" required>
                </div>
  
                <div class="form-group">
                  <label for="responsabilite">Description de l'offre <span class="text-danger">*</span></label>
                  <textarea name="responsabilite" id="editor-1" class="editor form-control" rows="15" placeholder="Entrer une description de l'Offre" required></textarea>
                </div>

                <div class="form-group">
                  <label for="date_debut">Date Debut <span class="text-danger">*</span></label>
                  <input type="date" id="date_debut_offre" name="date_debut_offre" required>
                </div>
        
                <div class="form-group">
                  <label for="date_fin">Date Fin <span class="text-danger">*</span></label>
                  <input type="date" id="date_fin_offre" name="date_fin_offre" required>
                </div>
  
  
                <h3 class="text-black my-5 border-bottom pb-2">Details de l'Entreprise</h3>
                <div class="form-group">
                  <label for="entreprise">Nom de l'Entreprise <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="entreprise" name="entreprise" placeholder="ex: Orange" required>
                </div>
                
                <div class="form-group">
                  <label for="website">Site Web</label>
                  <input type="text" class="form-control" id="website" name="website" placeholder="https://">
                </div>
  
                <div class="form-group">
                  <label for="company-website-tw d-block">Ajouter le Logo</label> <br>
                  <label class="btn btn-secondary btn-md btn-file">
                    Fichier<input type="file" name="logo" id="logo" hidden>
                  </label>
                  <div id="image-error" class="text-danger"></div>
                </div>
                
                <div class="row align-items-center mb-5">
            
                  <div class="col-lg-4 ml-auto">
                    <div class="row">
                      <div class="col-6"></div>
                      <div class="col-6 text-right">
                        <button type="submit" class="btn btn-block btn-primary btn-md" onclick="return confirm('Etes vous sur de publier cette Offre?!')">Publier l'Offre</a></button>
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