<aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : Vite::asset('resources/assets/img/avatars/user-avatar.png') }}" 
         alt="User Image" 
        >
        <div>
        <p class="app-sidebar__user-name">{{ Auth::user()->username }}</p> <!-- Dynamic username -->
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{route('dashboard')}}"><i class="app-menu__icon bi bi-house"></i><span class="app-menu__label">Home Page</span></a></li>
        
       
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-trash"></i><span class="app-menu__label">Waste Management</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('wastes.index')}}"><i class="icon bi bi-circle-fill"></i> Waste </a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="{{ route('depot_centers.index') }}" data-toggle="treeview"><i class="app-menu__icon bi bi-box-arrow-in-down"></i><span class="app-menu__label">Deposit.C Management</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
          <ul class="treeview-menu">
          <li><a class="treeview-item" href="{{ route('depot_centers.index') }}"><i class="icon bi bi-circle-fill"></i> Depot Centers</a></li>
          </ul>
        </li>

        <li class="treeview">
    <a class="app-menu__item" href="#" data-toggle="treeview">
        <i class="app-menu__icon bi bi-truck"></i>
        <span class="app-menu__label">Delivery.C Management</span>
        <i class="treeview-indicator bi bi-chevron-right"></i>
    </a>
    <ul class="treeview-menu">
        <li>
            <a class="treeview-item" href="{{ route('delivery-agences.index') }}">
                <i class="icon bi bi-circle-fill"></i> List of Delivery Agencies
            </a>
        </li>
        <li>
        
    </li>
  
    </ul>
        
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-box-arrow-in-down"></i><span class="app-menu__label">Distribution Management</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="{{route('distributions.index')}}" ><i class="icon bi bi-circle-fill"></i> Historiques </a></li>
          </ul>
        </li>
        <li><a class="app-menu__item" href="{{ route('events.index') }}"><i class="app-menu__icon icon bi bi-calendar"></i> Event Management </a></li>

       
        <li>
    <a class="app-menu__item" href="{{ route('recycling_centers.index') }}">
        <i class="app-menu__icon  bi bi-recycle"></i> <!-- Updated icon -->
        <span class="app-menu__label">recycling_centers</span>
    </a>
</li>
<li><a class="app-menu__item" href="{{route('salesCenters.index')}}"><i class="app-menu__icon bi bi bi-cart"></i><span class="app-menu__label">Sales.C Management</span></a></li>

<li><a class="app-menu__item {{ request()->routeIs('publication.index') ? 'active' : '' }}" href="{{route('publication.index')}}"><i class="app-menu__icon bi bi-info-circle"></i><span class="app-menu__label">Awareness Management</span></a></li>

        <li>
    <a class="app-menu__item" href="{{ url('/') }}">
        <i class="app-menu__icon bi bi-house-door"></i> <!-- Updated icon -->
        <span class="app-menu__label">Front page</span>
    </a>
</li>

     
        <li>
        <a class="app-menu__item" href="{{ route('logout') }}" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                   <i class="app-menu__icon bi bi-door-open"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
        </li>

      </ul>
    </aside>