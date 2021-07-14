<div class="l-navbar" id="nav-bar">
    <nav class="nav" >

        <ul class="nav_list"> 

            <li>
                <a href="{{ route('admin.home') }}" class="nav_logo"> 
                    <i class="bx bxs-home nav_logo-icon"></i>
                    <span class="nav_logo-name">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="/admin/kits" class="nav_link"> 
                    <i class='bx bx-grid-alt nav_icon'></i> 
                    <span class="nav_name">Kits</span> 
                </a> 
            </li>
            <li>
                <a href="/admin/centroCustos" class="nav_link">
                    <i class='bx bx-euro nav_icon'></i>
                    <span class="nav_name">Centros de Custos</span>
                </a> 
            </li>
            <li>
                <a href="/admin/reservas" class="nav_link">
                    <i class='bx bxs-spreadsheet nav_icon'></i>
                    <span class="nav_name">Reservas</span>
                </a> 
            </li>
            <li>
                <a href="/admin/users" class="nav_link"> 
                    <i class='bx bxs-user-detail nav_icon'></i> 
                    <span class="nav_name">Utilizadores</span> 
                </a> 
            </li>
            <li>
                <a href="#" class="nav_link collapsed" data-toggle="collapse" data-target="#espacoSubmenu" aria-expanded="false" aria-controls="espacoSubmenu">
                    <i class='bx bx-laptop nav_icon'></i>
                    <span class="nav_name">Gestão de Espaços</span> 
                </a> 

                <ul class="collapse list-unstyled" id="espacoSubmenu">

                    <li>
                        <a href="" class="nav_link"> 
                            <i class='bx bxs-user-detail nav_icon'></i> 
                            <span class="nav_name">Espaço 1</span> 
                        </a>                                
                    </li>

                    <li>
                        <a href="" class="nav_link"> 
                            <i class='bx bxs-user-detail nav_icon'></i> 
                            <span class="nav_name">Espaço 2</span> 
                        </a>                                
                    </li>

                </ul>
                
            </li>
            
        </ul>

    </nav>
</div>  

