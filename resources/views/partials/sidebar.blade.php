<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures ">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <li class="label">Main</li>
                <li class="active">
                    <a class="sidebar-sub-toggle">
                        <i class="ti-home"></i> Dashboard
                        <span class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>
                    <ul>
                        <li><a href="index.html">Dashboard</a></li>
                    </ul>
                </li>

                <li class="label">Restaurant Management</li>
                <!-- Commandes -->
                <li>
                    <a class="sidebar-sub-toggle">
                        <i class="ti-receipt"></i> Commandes
                        <span class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>
                    <ul>
                        <li><a href="orders-list.html">Liste des Commandes</a></li>
                        <li><a href="orders-details.html">Détails des Commandes</a></li>
                    </ul>
                </li>

                <!-- Réservations -->
                <li>
                    <a class="sidebar-sub-toggle">
                        <i class="ti-calendar"></i> Réservations
                        <span class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>
                    <ul>
                        <li><a href="reservations-list.html">Liste des Réservations</a></li>
                        <li><a href="reservations-details.html">Détails des Réservations</a></li>
                    </ul>
                </li>

                <!-- Menu -->
                <li>
                    <a class="sidebar-sub-toggle">
                        <i class="ti-menu"></i> Menu
                        <span class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('liste_plat') }}">Liste des Plats</a></li>
                        <li><a href="{{ route('ajout_plat') }}">Ajouter un Plat</a></li>
                        <li><a href="menu-categories.html">Catégories</a></li>
                    </ul>
                </li>

                <!-- Clients -->
                <li>
                    <a class="sidebar-sub-toggle">
                        <i class="ti-user"></i> Clients
                        <span class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>
                    <ul>
                        <li><a href="clients-list.html">Liste des Clients</a></li>
                        <li><a href="clients-details.html">Détails des Clients</a></li>
                    </ul>
                </li>

                <!-- Gestion des Tables et Horaires -->
                <li>
                    <a class="sidebar-sub-toggle">
                        <i class="ti-layout"></i> Gestion des Tables
                        <span class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>
                    <ul>
                        <li><a href="tables-list.html">Liste des Tables</a></li>
                        <li><a href="tables-add.html">Ajouter une Table</a></li>
                    </ul>
                </li>
                <li>
                    <a class="sidebar-sub-toggle">
                        <i class="ti-time"></i> Horaires d'Ouverture
                        <span class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>
                    <ul>
                        <li><a href="opening-hours.html">Horaires</a></li>
                    </ul>
                </li>

                <!-- Rapports -->
                <li>
                    <a class="sidebar-sub-toggle">
                        <i class="ti-bar-chart"></i> Rapports
                        <span class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>
                    <ul>
                        <li><a href="reports-orders.html">Rapports des Commandes</a></li>
                        <li><a href="reports-reservations.html">Rapports des Réservations</a></li>
                        <li><a href="reports-clients.html">Rapports des Clients</a></li>
                    </ul>
                </li>

                <!-- Promotions -->
                <li>
                    <a class="sidebar-sub-toggle">
                        <i class="ti-gift"></i> Promotions
                        <span class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>
                    <ul>
                        <li><a href="promotions-list.html">Liste des Promotions</a></li>
                        <li><a href="promotions-add.html">Ajouter une Promotion</a></li>
                    </ul>
                </li>

                <!-- Notifications -->
                <li>
                    <a class="sidebar-sub-toggle">
                        <i class="ti-bell"></i> Notifications
                        <span class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>
                    <ul>
                        <li><a href="notifications-list.html">Liste des Notifications</a></li>
                        <li><a href="notifications-send.html">Envoyer une Notification</a></li>
                    </ul>
                </li>

                <!-- Paramètres -->
                <li>
                    <a class="sidebar-sub-toggle">
                        <i class="ti-settings"></i> Paramètres
                        <span class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>
                    <ul>
                        <li><a href="settings-general.html">Généraux</a></li>
                        <li><a href="settings-profile.html">Profil</a></li>
                    </ul>
                </li>

                <li>
                    <a href="logout.html"><i class="ti-close"></i> Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->

