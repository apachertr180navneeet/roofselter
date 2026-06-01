      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo pt-2">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="{{route('admin')}}" class="logo">
              <img
                src="{{ asset(get_setting('system_logo_black') ? 'img/'.get_setting('system_logo_black') : 'webtheme/assets/images/resources/RoofShelter-Logo1.jpg') }}"
                alt="navbar brand"
                class="navbar-brand rounded-3 bg-white"
                height="auto"
                width="110px"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item{{ request()->routeIs('admin') ? ' active' : '' }}">
                <a href="{{route('admin')}}">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>
              <li class="nav-item{{ request()->routeIs('admin.slider*') ? ' active' : '' }}">
                <a href="{{route('admin.slider')}}">
                  <i class="fas fa-sliders-h"></i>
                  <p>Slider</p>
                </a>
              </li>

              <li class="nav-item{{ request()->routeIs('admin.service*') && !request()->routeIs('admin.service-*') ? ' active' : '' }}">
                <a href="{{route('admin.service')}}">
                  <i class="icon-equalizer"></i>
                  <p>Services</p>
                </a>
              </li>

              <li class="nav-item{{ request()->routeIs('admin.team_members*') ? ' active' : '' }}">
                <a href="{{route('admin.team_members')}}">
                  <i class="fas fa-user-friends"></i>
                  <p>Team Members</p>
                </a>
              </li>
              <li class="nav-item{{ request()->routeIs('admin.become-partner') ? ' active' : '' }}">
                <a href="{{route('admin.become-partner')}}">
                  <i class="fas fa-handshake"></i>
                  <p>Partners</p>
                </a>
              </li>
              <li class="nav-item{{ request()->routeIs('admin.before-after*') ? ' active' : '' }}">
                <a href="{{route('admin.before-after')}}">
                  <i class="fas fa-images"></i>
                  <p>Before & After</p>
                </a>
              </li>
              <li class="nav-item{{ request()->routeIs('admin.certifications*') ? ' active' : '' }}">
                <a href="{{route('admin.certifications')}}">
                  <i class="fas fa-certificate"></i>
                  <p>Certifications</p>
                </a>
              </li>
              <li class="nav-item{{ request()->routeIs('admin.why-choose-us*') ? ' active' : '' }}">
                <a href="{{route('admin.why-choose-us')}}">
                  <i class="fas fa-star"></i>
                  <p>Why Choose Us</p>
                </a>
              </li>
              
              <li class="nav-item{{ request()->routeIs('admin.blog*') || request()->routeIs('admin.blog-category*') ? ' active show' : '' }}">
                <a data-bs-toggle="collapse" href="#blogs">
                  <i class="fas fa-folder-open"></i>
                  <p>Projects</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse{{ request()->routeIs('admin.blog*') || request()->routeIs('admin.blog-category*') ? ' show' : '' }}" id="blogs">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{route('admin.blog')}}" class="{{ request()->routeIs('admin.blog') && !request()->routeIs('admin.blog-category*') ? 'active' : '' }}">All Projects</a>
                    </li>
                    <li>
                      <a href="{{route('admin.blog-category')}}" class="{{ request()->routeIs('admin.blog-category*') ? 'active' : '' }}">Category</a>
                    </li>
                  </ul>
                </div>
              </li>

              <li class="nav-item{{ request()->routeIs('admin.testimonial*') ? ' active' : '' }}">
                <a href="{{route('admin.testimonial')}}">
                  <i class="fa fa-users"></i>
                  <p>Testimonials</p>
                </a>
              </li>
              <li class="nav-item{{ request()->routeIs('admin.enquiries*') ? ' active' : '' }}">
                <a href="{{ url('admin/enquiries') }}" id="enquiry-link">
                  <i class="fas fa-bullhorn"></i>
                  <p>Enquiries</p>
                  <span id="enquiry-count" class="badge bg-danger">0</span>
                </a>
              </li>
              <li class="nav-item{{ request()->routeIs('admin.appointments*') ? ' active' : '' }}">
                <a href="{{ route('admin.appointments') }}" id="appointment-link">
                  <i class="fas fa-calendar-check"></i>
                  <p>Appointments</p>
                  <span id="appointment-count" class="badge bg-warning text-dark">0</span>
                </a>
              </li>
              <li class="nav-item{{ request()->routeIs('admin.quotes*') ? ' active' : '' }}">
                <a href="{{ route('admin.quotes') }}" id="quote-link">
                  <i class="fas fa-file-invoice-dollar"></i>
                  <p>Quote Requests</p>
                  <span id="quote-count" class="badge bg-success">0</span>
                </a>
              </li>
              <li class="nav-item{{ request()->routeIs('admin.settings*') || request()->routeIs('admin.profile*') ? ' active' : '' }}">
                <a href="{{route('admin.settings.index')}}">
                  <i class="fas fa-desktop"></i>
                  <p>Website Setup</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      