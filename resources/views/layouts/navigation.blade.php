<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
      <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
          <div class="dropdown profile-element"> <span>
            <img alt="image" class="img-circle" src="{{ asset($config->logo) }}" style="width:  64px; height:  auto;">
           </span>
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <span class="clear">
              <span class="block m-t-xs">
              <strong class="font-bold">{{ $config->name }}</strong>
              </span>
              <span class="text-muted text-xs block">
                Panel de administración
              </span>
            </span>
          </a>
          </div>
            <div class="logo-element">
                PM
            </div>
        </li>

        <li>
            <a href="{{ route('dashboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
        </li>
        <li>
            <a href="{{ route('configuracion')}}"><i class="fa fa-cog"></i> <span class="nav-label">Configuración</span></a>
        </li>
        <li>
          <a href="{{ route('banner')}}"><i class="fa fa-cog"></i> <span class="nav-label">Banners</span></a>
        </li>
      
      </ul>
    </div>
</nav>
