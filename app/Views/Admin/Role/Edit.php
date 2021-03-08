<h1> <?php    echo $page_title;?></h1>
   <div id="main">
        <div class="row">
            <div class="content-wrapper-before blue-grey lighten-5"></div>
            <div class="col s12">
                <div class="container">
                    <!-- invoice list -->
                    <section class="invoice-list-wrapper section">
                        <!-- create invoice button-->
                        <!-- Options and filter dropdown button-->
                        <div class="responsive-table">
                            <!-- Form with validation -->

                                <div class="col-12 s12 m6 l6">
                                    <div id="validation" class="card card card-default scrollspy">
                                        <div class="card-content">
                                            <h4 class="card-title">Form with validation</h4>
                                            <form action="<?= base_url('admin/role/edit/'.$tablerole["id_film"]."/".$tablerole["id_acteur"])  ?>" method= "Post" enctype="multipart/form-data">
                                                <!-- Je cache mon champ(hidden) pour dire que je suis dans le mode modifier -->
                                                <!-- je modifie -->
                                                <?php if(isset($tablerole['id_film']) && isset($tablerole['id_acteur'])){   ?>
                                                <input type="hidden" value="update" name='save'>
                                                <?php }else{ ?>
                                                <!-- Je cr un nouvelle enregistrement -->
                                                <input type="hidden" value="create" name='save'>
                                                <?php } ?>
                                                
                                                <!-- // Basic Select2  -->
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <i class="material-icons prefix">account_circle</i>
                                                        <input id="name" type="text" name="nomRole" value="<?= $tablerole['nom_role']?>" class="validate">
                                                        <label for="name">Name Role</label>
                                                    </div>
                                                </div>
                                                <div class="input-field">
                                                <select class="select2 browser-default" name= "idFilm">
                                                    <option value="square">Selectionnez un Film</option>
                                                    <?php foreach($modelFilm as  $film){
                                                        $select= "";
                                                        /****************** Je test si mes id sont identique puis j'insère le seclected afin de recupere */
                                                        if($tablerole['id_film'] == $film["id"]){
                                                            $select = 'selected' ;
                                                        }
                                                        ?>
                                                     
                                                    <option value="<?= $film["id"] ?>" <?=$select?> ><?= $film["titre"] ?></option>
                                                   <?php } ?>
                                                </select>
                                                </div>
                                                                                            
                                                <!-- // Basic Select2  -->
                                                <div class="input-field">
                                                <select class="select2 browser-default" name= "idActeur">
                                                <option value="square">Selectionnez le Nom de l'Acteur</option>
                                                    <?php foreach($modelArtiste as  $acteur){
                                                         $select= "";
                                                         if($tablerole['id_acteur'] == $acteur["id"]){
                                                             $select = 'selected' ;
                                                         }?>
                                                    <option value="<?= $acteur["id"] ?>" <?= $select ?>><?= $acteur["nom"]." ".$acteur["prenom"] ?></option>
                                                   <?php } ?>
                                                </select>
                                                </div>
                                                <!--Default version-->
                                                <div class="row section">
                                                    <div class="col s12 m4 l3">
                                                        <p>Ajouter une image</p>
                                                    </div>
                                                    <div class="col s12 m8 l9">
                                                        <input type="file" id="input-file-now" name='image' class="dropify" data-default-file="" />
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                                                            <i class="material-icons right">send</i>
                                                        </button>
                                                    </div>
                                                </div>
                                            
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>        
                    </section>
                        
                </div>
            </div>
        </div>
    </div>
