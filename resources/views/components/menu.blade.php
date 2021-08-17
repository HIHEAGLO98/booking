<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      @can("participant")
      <li class="nav-item">
        <a href="{{ route('acceuils.index') }}" 
        class="nav-link {{ setMenuActive('acceuils.index') }} ">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Accueil
          </p>
        </a>
      </li>
      <li class="nav-item {{ setMenuClass('book.booking.', 'menu-open') }}">
        <a href="#" class="nav-link {{ setMenuClass('book.booking.', 'active') }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Tableau de bord
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>Vue globale</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('book.booking.bookings.index') }}" 
            class="nav-link {{ setMenuActive('book.booking.bookings.index') }} ">
              <i class="nav-icon fas fa-swatchbook"></i>
              <p>Mes Réservations</p>
            </a>
          </li>
        </ul>
      </li>
      @endcan

     {{--   @can("participant")
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Tableau de bord
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>Vue globale</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-swatchbook"></i>
              <p>Réservations</p>
            </a>
          </li>
        </ul>
      </li>
      @endcan--}}

      @can("admin")
      <li class="nav-item {{ setMenuClass('admin.habilitations.', 'menu-open') }}">
        <a href="#" class="nav-link {{ setMenuClass('admin.habilitations.', 'active') }}">
          <i class=" nav-icon fas fa-user-shield"></i>
          <p>
            Habilitations
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item ">
            <a href="{{ route('admin.habilitations.users.index') }}"
            class="nav-link {{ setMenuActive('admin.habilitations.users.index') }}">
                <i class=" nav-icon fas fa-users-cog"></i>
                <p>
                  Utilisateurs
              </p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item {{ setMenuClass('admin.gestion.', 'menu-open') }}">
        <a href="#" class="nav-link {{ setMenuClass('admin.gestion.', 'active') }}">
          <i class="nav-icon fas fa-cogs"></i>
          <p>
            Gestion Pays
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('admin.gestion.pays.index')}}"
            class="nav-link {{ setMenuActive('admin.gestion.pays.index') }}">
              <i class="nav-icon far fa-circle"></i>
              <p>Pays</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.gestion.ville.index')}}"
             class="nav-link {{ setMenuActive('admin.gestion.ville.index') }}">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>Villes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.gestion.salle.index')}}"
             class="nav-link {{ setMenuActive('admin.gestion.salle.index') }}">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>Salles</p>
            </a>
          </li>

        </ul>
      </li>

        <li class="nav-item {{ setMenuClass('admin.evenement.', 'menu-open') }}">
            <a href="#" class="nav-link {{ setMenuClass('admin.evenement.', 'active') }}">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
                Gestion événements
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.evenement.type.index')}}"
                    class="nav-link {{ setMenuActive('admin.evenement.type.index') }}">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Type d'événements</p>
                    </a>
                </li>

              <li class="nav-item ">
                <a href="{{ route('admin.evenement.evenement.index')}}"
                class="nav-link {{ setMenuActive('admin.evenement.evenement.index') }}">
                <i class="nav-icon fas fa-list-ul"></i>
                <p>Evénements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.booking.bookings.list') }}" 
                class="nav-link {{ setMenuActive('admin.booking.bookings.list') }}">
                <i class="nav-icon fas fa-sliders-h"></i>
                <p>Les reservations</p>
                </a>
              </li>

            </ul>
      </li>
      @endcan

      @can("organisateur")
      <li class="nav-item {{ setMenuClass('organisateur.evenement.', 'menu-open') }}">
        <a href="#" class="nav-link {{ setMenuClass('organisateur.evenement.', 'active') }}">
          <i class="nav-icon fas fa-cogs"></i>
          <p>
            Gestion événements
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('organisateur.evenement.event.index')}}"
            class="nav-link {{ setMenuActive('organisateur.evenement.event.index') }}">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>Evénements</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sliders-h"></i>
              <p>Tickets</p>
            </a>
        </li>
      </ul>
      </li>
      @endcan
      
     <!--
      <li class="nav-header">LOCATION</li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <p>
            <i class="nav-icon fas fa-users"></i>
            Gestion des clients
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-exchange-alt"></i>
          <p>
            Gestion des locations
          </p>
        </a>
      </li>

      <li class="nav-header">CAISSE</li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-coins"></i>
          <p>
            Gestion des paiements
          </p>
        </a>
      </li>-->

    </ul>
  </nav>
