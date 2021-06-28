<!-- <div id="sidebar-wrapper">
    <ul class="sidebar-nav">
      <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li><a href="/admin/itens">Items</a></li>
      <li><a href="#">Kits</a></li>
    </ul>
  </div> -->

  <nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                  <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="/admin/kits">Kits</a>
            </li>
            <li class="nav-item">
                <a href="/admin/centroCustos">Centros de Custos</a>
            </li>
            <li class="nav-item">
                <a href="/admin/reservas">Reservas</a>
            </li>
            <li class="nav-item">
                <a href="/admin/users">Utilizadores</a>
            </li>
            <li class="nav-item">
                <a href="/admin/gestaoEspaco">Gestão de Espaços</a>
            </li>
        </ul>
    </div>
  </nav>
