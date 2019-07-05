<div class="row border-bottom">
    <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <ul class="nav navbar-top-links navbar-right">
          <li><a href="#"><i class="fa fa-user"></i> {{ Auth::user()->nombre }}</a></li>
          <li>
              <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fa fa-sign-out"></i>Cerrar sesión
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
          </li>
        </ul>
    </nav>
</div>
