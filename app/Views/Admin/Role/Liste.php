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
                      
                        <!-- create invoice button-->
                        <div class="invoice-create-btn">
                            <a href=<?= base_url('admin/Role/edit/')?> class="btn waves-effect waves-light invoice-create border-round z-depth-4">
                                <i class="material-icons">add</i>
                                <span class="hide-on-small-only">Create Role</span>
                            </a>
                        </div>
                 
                        <div class="responsive-table">
                            <table class="table invoice-data-table white border-radius-4 pt-1">
                                <thead>
                                    <tr>
                                        <!-- data table responsive icons -->
                                        <th></th>
                                        <!-- data table checkbox -->
                                        <th></th>
                                        
                                        <th>Nom film</th>
                                        <th>Nom acteur</th>
                                        <th>Nom du Role </th>                             
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php if(isset($tablerole)):
                                            foreach($tablerole as $role):?>
                                                <!-- On selectionne la ligne correspondant a l'ID du film -->
                                                <?php $film = $tableFilm->where('id',$role["id_film"])->first() ;
                                                /* *****On selectionne la ligne correspondant a l'ID de l'acteur***** */
                                                $acteur= $tableArtiste->where('id',$role["id_acteur"])->first();  
                                                //dd($acteur["nom"]." ".$acteur["prenom"])?>
                                                <tr>
                                                    <td></td>
                                                    <td></td>                                      
                                                    <td><span class="invoice-amount"><?= $film['titre'] ?></span></td>
                                                    <td><span class="invoice-amount"><?= $acteur["nom"]." ".$acteur["prenom"] ?></span></td>
                                                    <td><span class="invoice-customer"><?= $role["nom_role"] ?></span></td>
                                                    <td>
                                                        <div class="invoice-action">
                                                            <a href=<?= base_url("Admin/Role/Edit/".$role["id_film"]) ?> class="invoice-action-edit">
                                                                <i class="material-icons">edit</i>
                                                            </a>
                                                            <?php if(!empty($_GET['page'])){ ?>
                                                            <a href=<?= base_url("admin/role/delete/".$role["id_film"]."/".$_GET['page']) ?> class="invoice-action-view mr-4">
                                                                <i class="material-icons">delete_sweep</i>
                                                            </a>
                                                            <?php }else{?>
                                                                <a href=<?= base_url("admin/role/delete/".$role["id_film"]) ?> class="invoice-action-view mr-4">
                                                                <i class="material-icons">delete_sweep</i>
                                                            </a>
                                                        <?php } ?>
                                                        </div>
                                                    </td>
                                                </tr>                                                                                                         
                                            <?php endforeach;
                                        endif;?>
                                </tbody>
                            </table>
                             <?= $pager->links() ;?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>               