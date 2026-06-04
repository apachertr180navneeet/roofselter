<aside id="admin-sidebar" class="admin-sidebar flex flex-col">
    <div class="flex items-center h-16 px-4 border-b border-white/10 flex-shrink-0">
        <a href="{{route('admin')}}" class="flex items-center gap-3">
            <img src="{{ asset(get_setting('system_logo_white') ? 'img/'.get_setting('system_logo_white') : 'panel-assets/icon.png') }}" alt="Logo" class="h-9 w-auto rounded">
            <span class="nav-text text-white font-semibold text-lg whitespace-nowrap">{{ get_setting('website_name') ?: 'RoofShelter' }}</span>
        </a>
    </div>

    <nav class="flex-1 overflow-y-auto py-4 space-y-1">
        <a href="{{route('admin')}}" class="nav-item{{ request()->routeIs('admin') ? ' active' : '' }}">
            <i class="fas fa-home w-5 text-center nav-icon"></i>
            <span class="nav-text">Dashboard</span>
        </a>

        <div class="px-4 pt-4 pb-1">
            <span class="nav-text text-xs font-semibold uppercase tracking-wider text-gray-500">Content</span>
        </div>

        <a href="{{route('admin.slider')}}" class="nav-item{{ request()->routeIs('admin.slider*') ? ' active' : '' }}">
            <i class="fas fa-sliders-h w-5 text-center nav-icon"></i>
            <span class="nav-text">Slider</span>
        </a>
        <a href="{{route('admin.cms')}}" class="nav-item{{ request()->routeIs('admin.cms*') ? ' active' : '' }}">
            <i class="fas fa-file-alt w-5 text-center nav-icon"></i>
            <span class="nav-text">CMS Pages</span>
        </a>
        <a href="{{route('admin.about')}}" class="nav-item{{ request()->routeIs('admin.about*') ? ' active' : '' }}">
            <i class="fas fa-info-circle w-5 text-center nav-icon"></i>
            <span class="nav-text">About</span>
        </a>
        <a href="{{route('admin.service')}}" class="nav-item{{ request()->routeIs('admin.service*') && !request()->routeIs('admin.service-*') ? ' active' : '' }}">
            <i class="fas fa-cogs w-5 text-center nav-icon"></i>
            <span class="nav-text">Services</span>
        </a>
        <a href="{{route('admin.team_members')}}" class="nav-item{{ request()->routeIs('admin.team_members*') ? ' active' : '' }}">
            <i class="fas fa-user-friends w-5 text-center nav-icon"></i>
            <span class="nav-text">Team Members</span>
        </a>


        <a href="{{route('admin.blog')}}" class="nav-item{{ request()->routeIs('admin.blog*') ? ' active' : '' }}">
            <i class="fas fa-folder-open w-5 text-center nav-icon"></i>
            <span class="nav-text">Projects</span>
        </a>

        <div class="px-4 pt-4 pb-1">
            <span class="nav-text text-xs font-semibold uppercase tracking-wider text-gray-500">Inquiries</span>
        </div>

        <a href="{{route('admin.enquiries')}}" class="nav-item{{ request()->routeIs('admin.enquiries*') ? ' active' : '' }}">
            <i class="fas fa-bullhorn w-5 text-center nav-icon"></i>
            <span class="nav-text flex-1">Enquiries</span>
            <span id="enquiry-count" class="nav-text px-2 py-0.5 text-xs rounded-full bg-red-500 text-white">0</span>
        </a>
        <a href="{{route('admin.appointments')}}" class="nav-item{{ request()->routeIs('admin.appointments*') ? ' active' : '' }}">
            <i class="fas fa-calendar-check w-5 text-center nav-icon"></i>
            <span class="nav-text flex-1">Appointments</span>
            <span id="appointment-count" class="nav-text px-2 py-0.5 text-xs rounded-full bg-yellow-500 text-white">0</span>
        </a>
        <a href="{{route('admin.quotes')}}" class="nav-item{{ request()->routeIs('admin.quotes*') ? ' active' : '' }}">
            <i class="fas fa-file-invoice-dollar w-5 text-center nav-icon"></i>
            <span class="nav-text flex-1">Quote Requests</span>
            <span id="quote-count" class="nav-text px-2 py-0.5 text-xs rounded-full bg-green-500 text-white">0</span>
        </a>

        <div class="px-4 pt-4 pb-1">
            <span class="nav-text text-xs font-semibold uppercase tracking-wider text-gray-500">Engagement</span>
        </div>

        <a href="{{route('admin.testimonial')}}" class="nav-item{{ request()->routeIs('admin.testimonial*') ? ' active' : '' }}">
            <i class="fa fa-users w-5 text-center nav-icon"></i>
            <span class="nav-text">Testimonials</span>
        </a>
        <a href="{{route('admin.galleries')}}" class="nav-item{{ request()->routeIs('admin.galleries*') ? ' active' : '' }}">
            <i class="fas fa-images w-5 text-center nav-icon"></i>
            <span class="nav-text">Gallery</span>
        </a>
        <a href="{{route('admin.faqs')}}" class="nav-item{{ request()->routeIs('admin.faqs*') ? ' active' : '' }}">
            <i class="fas fa-question-circle w-5 text-center nav-icon"></i>
            <span class="nav-text">FAQs</span>
        </a>

        <div class="px-4 pt-4 pb-1">
            <span class="nav-text text-xs font-semibold uppercase tracking-wider text-gray-500">System</span>
        </div>

        <a href="{{route('admin.settings.index')}}" class="nav-item{{ request()->routeIs('admin.settings*') || request()->routeIs('admin.profile*') ? ' active' : '' }}">
            <i class="fas fa-desktop w-5 text-center nav-icon"></i>
            <span class="nav-text">Website Setup</span>
        </a>
    </nav>
</aside>

      
