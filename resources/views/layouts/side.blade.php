<aside class="w-32 bg-blue-700 text-white flex flex-col min-h-screen"
    x-data="{ 
           activeSubmenu: window.location.pathname === '/dashboard' ? 'dashboard-overview' 
           : window.location.pathname.includes('/dashboard/analytics') ? 'dashboard-analytics' 
           : window.location.pathname.includes('/student/index') ? 'students-show' 
           : window.location.pathname.includes('/student/create') ? 'students-create' 
           : window.location.pathname.includes('/student/manage') ? 'students-manage' 
           : window.location.pathname.includes('/emails/compose') ? 'emails-compose' 
           : window.location.pathname.includes('/emails/manage') ? 'emails-manage' 
           : window.location.pathname.includes('/admins/add') ? 'admins-add' 
           : window.location.pathname.includes('/admins/manage') ? 'admins-manage' 
           : '' 
       }">

    <!-- Sidebar Header -->
    <div class="p-4 text-center font-bold text-lg border-b border-blue-700">
        <span class="text-white">Dashboard</span>
    </div>

    <!-- Navigation Links -->
    <nav class="flex-grow p-2 space-y-2 space-x-2">
        <ul>
            <!-- Dashboard Link with Active State -->
            <li class="relative m-2">
                <a href="#" @click.prevent="activeSubmenu = 'dashboard'" class="flex flex-col items-center px-4 py-2 text-sm font-medium hover:bg-blue-800 rounded"
                    :class="activeSubmenu.includes('dashboard') ? 'bg-blue-800' : ''">
                    <i :class="activeSubmenu.includes('dashboard') ? 'text-yellow-400' : 'text-white'" class="mr-2 fas fa-tachometer-alt text-xl"></i> Dashboard
                </a>

                <!-- Dashboard Submenu -->
                <div x-show="activeSubmenu.includes('dashboard')"
                    class="fixed left-32 top-16 bg-white text-gray-800 w-52 h-screen p-4 shadow-lg space-y-2">

                    <!-- Extra Dashboard Item at the Top -->
                    <div class="absolute -mt-16 flex flex-row items-center px-4 py-2 text-sm font-medium ">
                        <div class="bg-blue-200 rounded-lg p-2 flex items-center justify-center w-8 h-8 mr-1">
                            <i class="fas fa-tachometer-alt text-xl text-blue-700"></i>
                        </div>
                        Dashboard
                    </div>

                    <!-- Submenu Links -->
                    <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-sm font-medium hover:bg-gray-100 rounded"
                        :class="activeSubmenu === 'dashboard-overview' ? 'bg-gray-200' : ''">Overview</a>

                    <a href="#" class="block px-4 py-2 text-sm font-medium hover:bg-gray-100 rounded"
                        :class="activeSubmenu === 'dashboard-analytics' ? 'bg-gray-200' : ''">Analytics</a>
                </div>
            </li>

            <!-- Students Link with Submenu -->
            <li class="relative m-2">
                <a href="#" @click.prevent="activeSubmenu = 'students'" class="flex flex-col items-center px-4 py-2 text-sm font-medium hover:bg-blue-800 rounded"
                    :class="activeSubmenu.includes('students') ? 'bg-blue-800' : ''">
                    <i :class="activeSubmenu.includes('students') ? 'text-yellow-400' : 'text-white'" class="mr-2 fas fa-user-graduate text-xl"></i> Students
                </a>
                <div x-show="activeSubmenu.includes('students')"
                    class="fixed left-32 top-16 bg-white text-gray-800 w-52 h-screen p-4 shadow-lg space-y-2">

                    <!-- Extra Students Item at the Top -->
                    <div class="absolute -mt-16 flex flex-row items-center px-4 py-2 text-sm font-medium ">
                        <div class="bg-blue-200 rounded-lg p-2 flex items-center justify-center w-8 h-8 mr-1 text-blue-700">
                            <i class="fas fa-user-graduate text-xl"></i>
                        </div>
                        Students
                    </div>

                    <a href="{{route('student.index')}}" class="block px-4 py-2 text-sm font-medium hover:bg-gray-100 rounded"
                        :class="activeSubmenu === 'students-show' ? 'bg-gray-200' : ''">Show Student</a>
                    <a href="{{route('student.create')}}" class="block px-4 py-2 text-sm font-medium hover:bg-gray-100 rounded"
                        :class="activeSubmenu === 'students-create' ? 'bg-gray-200' : ''">Add Student</a>
                    <a href="#" class="block px-4 py-2 text-sm font-medium hover:bg-gray-100 rounded"
                        :class="activeSubmenu === 'students-manage' ? 'bg-gray-200' : ''">Manage Students</a>
                </div>
            </li>

            <!-- Emails Link with Submenu -->
            <li class="relative m-2">
                <a href="#" @click.prevent="activeSubmenu = 'emails'" class="flex flex-col items-center px-4 py-2 text-sm font-medium hover:bg-blue-800 rounded"
                    :class="activeSubmenu.includes('emails') ? 'bg-blue-800' : ''">
                    <i :class="activeSubmenu.includes('emails') ? 'text-yellow-400' : 'text-white'" class="mr-2 fas fa-envelope text-xl"></i> Emails
                </a>
                <div x-show="activeSubmenu.includes('emails')"
                    class="fixed left-32 top-16 bg-white text-gray-800 w-52 h-screen p-4 shadow-lg space-y-2">
                    <!-- Extra Emails Item at the Top -->
                    <div class="absolute -mt-16 flex flex-row items-center px-4 py-2 text-sm font-medium ">
                        <div class="bg-blue-200 rounded-lg p-2 flex items-center justify-center w-8 h-8 mr-1 text-blue-700">
                            <i class="fas fa-envelope text-xl"></i>
                        </div>
                        Emails
                    </div>
                    <a href="#" class="block px-4 py-2 text-sm font-medium hover:bg-gray-100 rounded"
                        :class="activeSubmenu === 'emails-compose' ? 'bg-gray-200' : ''">Compose Email</a>
                    <a href="#" class="block px-4 py-2 text-sm font-medium hover:bg-gray-100 rounded"
                        :class="activeSubmenu === 'emails-manage' ? 'bg-gray-200' : ''">Manage Emails</a>
                </div>
            </li>

            <!-- Admins Link with Submenu -->
            <li class="relative m-2">
                <a href="#" @click.prevent="activeSubmenu = 'admins'" class="flex flex-col items-center px-4 py-2 text-sm font-medium hover:bg-blue-800 rounded"
                    :class="activeSubmenu.includes('admins') ? 'bg-blue-800' : ''">
                    <i :class="activeSubmenu.includes('admins') ? 'text-yellow-400' : 'text-white'" class="mr-2 fas fa-users text-xl"></i> Admins
                </a>
                <div x-show="activeSubmenu.includes('admins')"
                    class="fixed left-32 top-16 bg-white text-gray-800 w-52 h-screen p-4 shadow-lg space-y-2">
                    <!-- Extra Admins Item at the Top -->
                    <div class="absolute -mt-16 flex flex-row items-center px-4 py-2 text-sm font-medium ">
                        <div class="bg-blue-200 rounded-lg p-2 flex items-center justify-center w-8 h-8 mr-1 text-blue-700">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                        Admins
                    </div>
                    <a href="#" class="block px-4 py-2 text-sm font-medium hover:bg-gray-100 rounded"
                        :class="activeSubmenu === 'admins-add' ? 'bg-gray-200' : ''">Add Admin</a>
                    <a href="#" class="block px-4 py-2 text-sm font-medium hover:bg-gray-100 rounded"
                        :class="activeSubmenu === 'admins-manage' ? 'bg-gray-200' : ''">Manage Admins</a>
                </div>
            </li>

            <!-- Settings Link (No Submenu) -->
            <li class="m-2">
                <a href="#" class="flex flex-col items-center px-4 py-2 text-sm font-medium hover:bg-blue-800 rounded">
                    <i class="mr-2 fas fa-cogs text-xl text-white"></i> Settings
                </a>
            </li>
        </ul>
    </nav>

    <!-- Logout Button -->
    <div class="p-4 border-t border-blue-700">
        <a href="#" class="flex items-center px-4 py-2 text-sm font-medium hover:bg-blue-800 rounded">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
</aside>