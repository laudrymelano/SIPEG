  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
          <span class="brand-text font-weight-light">SIPEG</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-2 pb-2 mb-2 d-flex">
              <div class="info">
                  <strong style="color: white">Hello, Admin&nbsp; <a href="#"></a></strong>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                  <li class="nav-item">
                      <a href="{{ url('dashboard') }}"
                          class="nav-link {{ Request::is('dashboard') ? 'active' : null }}">
                          <i class="fas fa-user-friends"></i> &nbsp;
                          <p> Data Master </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('logout') }}" class="nav-link">
                          @csrf
                          <i class="nav-icon fas fa-sign-out-alt"></i>
                          <p>Logout</p>
                  </li>
                  </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
