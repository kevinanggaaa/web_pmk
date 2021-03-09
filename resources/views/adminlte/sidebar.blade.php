<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ asset('/adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
                              with font-awesome or any other icon font library -->
          <h2 class="text-center font-weight-bold mb-4"><span style="color:red;"><i class="nav-icon fas fa-cross "></i>PMK</span> <span style="color:#3366ff;">ITS</span></h2>

          
          <li class="mb-1">
            <a href="{{route ('profiles.index')}}" class="nav-link active">
              <i class="pl-1 nav-icon far fa-user-circle fa-lg"></i>

                <p class="pl-1">
                    Profile
                    <i class="right fas fa-angle-left"></i>
                </p>

            </a>
          </li>
         
          @if(auth()->user()->hasRole('Super Admin'))
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-users"></i>
              <p>
                User Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route ('users.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route ('roles.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
        </ul>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
                          with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fa fa-handshake"></i>
                            <p>
                                Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                                @if(auth()->user()->hasPermissionTo('view lecturer'))
                                <li class="nav-item">
                                    <a href="{{route ('lecturers.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dosen</p>
                                    </a>
                                </li>
                                @endif

                                @if(auth()->user()->hasPermissionTo('view student'))
                                <li class="nav-item">
                                    <a href="{{route ('students.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Mahasiswa</p>
                                    </a>
                                </li>
                                @endif
                           
                                @if(auth()->user()->hasPermissionTo('view alumni'))
                                <li class="nav-item">
                                    <a href="{{route ('alumnis.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Alumni</p>
                                    </a>
                                </li>
                                @endif

                                @if(auth()->user()->hasPermissionTo('view organizational record'))
                                <li class="nav-item">
                                    <a href="{{route ('organizational-records.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Histori Organisasi</p>
                                    </a>
                                </li>
                                @endif

                                @if(auth()->user()->hasPermissionTo('view counselor'))
                                <li class="nav-item">
                                    <a href="{{route ('counselors.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Konselor</p>
                                    </a>
                                </li>
                                @endif

                                @if(auth()->user()->hasPermissionTo('view counseling'))
                                <li class="nav-item">
                                    <a href="{{route ('counselings.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Konseling</p>
                                    </a>
                                </li>
                                @endif

                                @if(auth()->user()->hasPermissionTo('view prayer request'))
                                <li class="nav-item">
                                    <a href="{{route ('prayer-requests.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pray Request</p>
                                    </a>
                                </li>
                                @endif
                                <li class="nav-item">
                                    <a href="{{route ('events.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Event</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route ('birthday.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Ulang tahun</p>
                                    </a>
                                </li>
                        </ul>
                    </li>
        </ul>

     
        @if(auth()->user()->hasRole('Super Admin'))
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
                          with font-awesome or any other icon font library -->                   
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-blog"></i>
                            <p>
                                Landing Page
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route ('landingPage.indexHome')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Home</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route ('landingPage.indexVisiMisi')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Visi Misi</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Count</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route ('landingPage.indexAbout')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>About</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Persekutuann jumat</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Testimoni</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{route ('landingPage.indexRenungan')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Renungan harian</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Event</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Banner</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route ('posts.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Post</p>
                                    </a>
                                </li>
                        </ul>
                      </li>                
        </ul>
        @endif
      </nav>
    </div>
  </aside>
</aside>