<header class="admin-header">
    <div class="flex items-center justify-between w-full">
        <div class="flex items-center gap-4">
            <button id="sidebar-toggle" class="lg:hidden p-2 text-gray-500 hover:text-gray-700 rounded-lg hover:bg-gray-100 transition-colors">
                <i class="fas fa-bars text-lg"></i>
            </button>
            <h1 class="text-lg font-semibold text-gray-900">@yield('title', 'Dashboard')</h1>
        </div>

        <div class="flex items-center gap-3">
            <div class="relative dropdown">
                <button class="relative p-2 text-gray-500 hover:text-gray-700 rounded-lg hover:bg-gray-100 transition-colors" id="notifDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell text-lg"></i>
                    <span id="header-enquiry-count" class="absolute -top-0.5 -right-0.5 w-5 h-5 flex items-center justify-center text-[10px] font-bold text-white bg-red-500 rounded-full">0</span>
                </button>
                <ul class="dropdown-menu absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-lg border border-gray-200 py-2 hidden" aria-labelledby="notifDropdown">
                    <li class="px-4 py-2 border-b border-gray-100">
                        <span class="text-sm font-semibold text-gray-700">You have <span id="notif-total">0</span> new notifications</span>
                    </li>
                    <li class="max-h-64 overflow-y-auto" id="notif-list">
                        <div class="px-4 py-6 text-center text-sm text-gray-400">No notifications yet</div>
                    </li>
                    <li class="border-t border-gray-100">
                        <a href="{{ route('admin.enquiries') }}" class="flex items-center justify-center gap-1 px-4 py-2.5 text-sm text-brand-600 hover:text-brand-700 font-medium">See all notifications <i class="fas fa-arrow-right text-xs"></i></a>
                    </li>
                </ul>
            </div>

            <div class="relative dropdown">
                <button class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-gray-100 transition-colors" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('img/'.Auth::guard('admin')->user()->image)}}" alt="" class="w-8 h-8 rounded-full object-cover border-2 border-gray-200">
                    <span class="hidden sm:block text-sm font-medium text-gray-700">{{Auth::guard('admin')->user()->name}}</span>
                    <i class="fas fa-chevron-down text-xs text-gray-400"></i>
                </button>
                <ul class="dropdown-menu absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-lg border border-gray-200 py-2 hidden">
                    <li class="px-4 py-3 border-b border-gray-100">
                        <div class="flex items-center gap-3">
                            <img src="{{asset('img/'.Auth::guard('admin')->user()->image)}}" alt="" class="w-10 h-10 rounded-lg object-cover">
                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-gray-900 truncate">{{Auth::guard('admin')->user()->name}}</p>
                                <p class="text-xs text-gray-500 truncate">{{Auth::guard('admin')->user()->email}}</p>
                            </div>
                        </div>
                    </li>
                    <li><a href="{{route('admin.profile')}}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors"><i class="fas fa-user w-4 text-gray-400"></i> View Profile</a></li>
                    <li class="border-t border-gray-100"><a href="{{route('admin.logout')}}" class="flex items-center gap-3 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors"><i class="fas fa-sign-out-alt w-4"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>