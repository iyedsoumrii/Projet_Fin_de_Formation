            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Table Admin</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Accueil
                            </a>
                            <div class="sb-sidenav-menu-heading">Gérer les tables</div>

                            <!--Categories --->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Catégories
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-category.php">Ajouter</a>
                                    <a class="nav-link" href="manage-categories.php">Gérer</a>
                                </nav>
                            </div>

<!--- Sub-Categories --->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#subcat" aria-expanded="false" aria-controls="subcat">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Sous-Catégories
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="subcat" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-subcategories.php">Ajouter</a>
                                    <a class="nav-link" href="manage-subcategories.php">Gérer</a>
                                </nav>
                            </div>

<!--- Products --->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#product" aria-expanded="false" aria-controls="product">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Produits
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="product" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add-product.php">Ajouter</a>
                                    <a class="nav-link" href="manage-products.php">Gérer</a>
                                </nav>
                            </div>

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#product1" aria-expanded="false" aria-controls="product1">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="product1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="aboutus.php">À propos</a>
                                    <a class="nav-link" href="contactus.php">Contact</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#product2" aria-expanded="false" aria-controls="product2">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Commandes
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="product2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="all-order.php">Toutes les commandes</a>
                                    <a class="nav-link" href="new-order.php">Nouvelle commande</a>
                                    <a class="nav-link" href="confirm-order.php">commande confirmée</a>
                                    <a class="nav-link" href="pickup-order.php">Commandes à récupérer</a>
                                    <a class="nav-link" href="ontheway-order.php">En cours de livraison</a>
                                    <a class="nav-link" href="delivered-order.php">Commande livrée</a>
                                    <a class="nav-link" href="cancelled-order.php">Commande annulée</a>
                                </nav>
                            </div>
 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#subcat1" aria-expanded="false" aria-controls="subcat1">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Avis
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="subcat1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="all-reviews.php">Tous les avis</a>
                                    <a class="nav-link" href="new-reviews.php">Nouveaux</a>
                                    <a class="nav-link" href="approved-reviews.php">Acceptés</a>
                                    <a class="nav-link" href="unapproved-reviews.php">Rejetés</a>
                                </nav>
                            </div>
                           
           
                           <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Réclamations
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="readenq.php">Lire les réclamations</a>
                                    <a class="nav-link" href="unreadenq.php">Réclamations non lues</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Rapport
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="bwdates-report-ds.php">entre de/à rapport</a>
                                    <a class="nav-link" href="requestcount-report-ds.php">de/à date</a>
                                    <a class="nav-link" href="sales-reports.php">Rapports de vente</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="search-order.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-search"></i></div>
                                Recherche
                            </a>
                             <a class="nav-link" href="reg-users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Clients
                            </a>
                             <a class="nav-link" href="subscriber.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Abonnés
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Connecté en tant que :</div>
                        Admin
                    </div>
                </nav>
            </div>