<aside id="app-menu"
    class="hs-overlay fixed inset-y-0 start-0 z-60 hidden w-sidenav min-w-sidenav bg-primary-900 overflow-y-auto -translate-x-full transform transition-all duration-200 hs-overlay-open:translate-x-0 lg:bottom-0 lg:end-auto lg:z-30 lg:block lg:translate-x-0 rtl:translate-x-full rtl:hs-overlay-open:translate-x-0 rtl:lg:translate-x-0 print:hidden [--body-scroll:true] [--overlay-backdrop:true] lg:[--overlay-backdrop:false]">

    <div class="flex flex-col h-full">
        <!-- Sidenav Logo -->
        <div class="sticky top-0 flex h-topbar items-center justify-between px-6">
            <a href="{{ route('dashboard') }}">
                <img src="assets/images/logo-light.png" alt="logo" class="flex h-8">
            </a>
        </div>

        <div class="p-4 h-[calc(100%-theme('spacing.topbar'))] flex-grow" data-simplebar>
            <!-- Menu -->
            <ul class="admin-menu flex w-full flex-col gap-1">

                <!-- Main Section -->
                {{-- <li class="px-3 py-3 text-sm font-semibold text-default-300 uppercase tracking-wider border-b border-default-100/10 mb-2">
                    <div class="flex items-center gap-x-2">
                        <i class="fa-solid fa-home text-base"></i>
                        <span>Main</span>
                    </div>
                </li> --}}

                <!-- Dashboard -->
                <li class="menu-item mb-1">
                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2.5 text-sm font-medium transition-all 
                        {{ request()->routeIs('dashboard') ? 'bg-primary-600 text-white shadow-lg' : 'text-default-100 hover:bg-default-100/5 hover:text-white' }}"
                        href="{{ route('dashboard') }}">
                        <i class="fa-solid fa-chart-pie text-xl"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Inventory Management Section -->
                {{-- <li class="px-3 py-3 text-sm font-semibold text-default-300 uppercase tracking-wider border-b border-default-100/10 mb-2 mt-6">
                    <div class="flex items-center gap-x-2">
                        <i class="fa-solid fa-boxes-stacked text-base"></i>
                        <span>Inventory Management</span>
                    </div>
                </li> --}}

                <!-- Inventory -->
                <li class="menu-item mb-1">
                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2.5 text-sm font-medium transition-all 
                        {{ request()->routeIs('inventory.*') ? 'bg-primary-600 text-white shadow-lg' : 'text-default-100 hover:bg-default-100/5 hover:text-white' }}"
                        href="{{ route('inventory.index') }}">
                        <i class="fa-solid fa-box-open text-xl"></i>
                        <span>Inventory Items</span>
                    </a>
                </li>

                <!-- Products -->
                <li class="menu-item mb-1">
                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2.5 text-sm font-medium transition-all 
                        {{ request()->routeIs('products.*') ? 'bg-primary-600 text-white shadow-lg' : 'text-default-100 hover:bg-default-100/5 hover:text-white' }}"
                        href="{{ route('products.index') }}">
                        <i class="fa-solid fa-cube text-xl"></i>
                        <span>Products</span>
                    </a>
                </li>

                <!-- Categories -->
                <li class="menu-item mb-1">
                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2.5 text-sm font-medium transition-all 
                        {{ request()->routeIs('categories.*') ? 'bg-primary-600 text-white shadow-lg' : 'text-default-100 hover:bg-default-100/5 hover:text-white' }}"
                        href="{{ route('categories.index') }}">
                        <i class="fa-solid fa-tags text-xl"></i>
                        <span>Categories</span>
                    </a>
                </li>

                <!-- Warehouse -->
                <li class="menu-item mb-1">
                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2.5 text-sm font-medium transition-all 
                        {{ request()->routeIs('warehouse.*') ? 'bg-primary-600 text-white shadow-lg' : 'text-default-100 hover:bg-default-100/5 hover:text-white' }}"
                        href="{{ route('warehouse.index') }}">
                        <i class="fa-solid fa-warehouse text-xl"></i>
                        <span>Warehouse</span>
                    </a>
                </li>

                <!-- Suppliers -->
                <li class="menu-item mb-1">
                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2.5 text-sm font-medium transition-all 
                        {{ request()->routeIs('suppliers.*') ? 'bg-primary-600 text-white shadow-lg' : 'text-default-100 hover:bg-default-100/5 hover:text-white' }}"
                        href="{{ route('suppliers.index') }}">
                        <i class="fa-solid fa-truck-field text-xl"></i>
                        <span>Suppliers</span>
                    </a>
                </li>

                <!-- Customer Management Section -->
                {{-- <li class="px-3 py-3 text-sm font-semibold text-default-300 uppercase tracking-wider border-b border-default-100/10 mb-2 mt-6">
                    <div class="flex items-center gap-x-2">
                        <i class="fa-solid fa-users text-base"></i>
                        <span>Customer Management</span>
                    </div>
                </li> --}}

                <!-- Customers -->
                <li class="menu-item mb-1">
                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2.5 text-sm font-medium transition-all 
                        {{ request()->routeIs('customers.*') ? 'bg-primary-600 text-white shadow-lg' : 'text-default-100 hover:bg-default-100/5 hover:text-white' }}"
                        href="{{ route('customers.index') }}">
                        <i class="fa-solid fa-user-group text-xl"></i>
                        <span>Customers</span>
                    </a>
                </li>

                <!-- Order Management Section -->
                {{-- <li class="px-3 py-3 text-sm font-semibold text-default-300 uppercase tracking-wider border-b border-default-100/10 mb-2 mt-6">
                    <div class="flex items-center gap-x-2">
                        <i class="fa-solid fa-shopping-cart text-base"></i>
                        <span>Order Management</span>
                    </div>
                </li> --}}

                <!-- Orders -->
                <li class="menu-item mb-1">
                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2.5 text-sm font-medium transition-all 
                        {{ request()->routeIs('orders.*') ? 'bg-primary-600 text-white shadow-lg' : 'text-default-100 hover:bg-default-100/5 hover:text-white' }}"
                        href="{{ route('orders.index') }}">
                        <i class="fa-solid fa-receipt text-xl"></i>
                        <span>Orders</span>
                    </a>
                </li>

                <!-- Shipping -->
                <li class="menu-item mb-1">
                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2.5 text-sm font-medium transition-all 
                        {{ request()->routeIs('shipping.*') ? 'bg-primary-600 text-white shadow-lg' : 'text-default-100 hover:bg-default-100/5 hover:text-white' }}"
                        href="{{ route('shipping.index') }}">
                        <i class="fa-solid fa-truck-fast text-xl"></i>
                        <span>Shipping</span>
                    </a>
                </li>

                <!-- Reports & Analytics Section -->
                {{-- <li class="px-3 py-3 text-sm font-semibold text-default-300 uppercase tracking-wider border-b border-default-100/10 mb-2 mt-6">
                    <div class="flex items-center gap-x-2">
                        <i class="fa-solid fa-chart-line text-base"></i>
                        <span>Reports & Analytics</span>
                    </div>
                </li> --}}

                <!-- Reports -->
                <li class="menu-item mb-1">
                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2.5 text-sm font-medium transition-all 
                        {{ request()->routeIs('reports.*') ? 'bg-primary-600 text-white shadow-lg' : 'text-default-100 hover:bg-default-100/5 hover:text-white' }}"
                        href="{{ route('reports.index') }}">
                        <i class="fa-solid fa-chart-simple text-xl"></i>
                        <span>Reports</span>
                    </a>
                </li>

                <!-- Analytics -->
                <li class="menu-item mb-1">
                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2.5 text-sm font-medium transition-all 
                        {{ request()->routeIs('analytics.*') ? 'bg-primary-600 text-white shadow-lg' : 'text-default-100 hover:bg-default-100/5 hover:text-white' }}"
                        href="{{ route('analytics.index') }}">
                        <i class="fa-solid fa-chart-simple text-xl"></i>
                        <span>Analytics</span>
                    </a>
                </li>

                <!-- System Settings Section -->
                {{-- <li class="px-3 py-3 text-sm font-semibold text-default-300 uppercase tracking-wider border-b border-default-100/10 mb-2 mt-6">
                    <div class="flex items-center gap-x-2">
                        <i class="fa-solid fa-cog text-base"></i>
                        <span>System Settings</span>
                    </div>
                </li> --}}

                <!-- Settings -->
                <li class="menu-item mb-1">
                    <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2.5 text-sm font-medium transition-all 
                        {{ request()->routeIs('settings.*') ? 'bg-primary-600 text-white shadow-lg' : 'text-default-100 hover:bg-default-100/5 hover:text-white' }}"
                        href="{{ route('settings.index') }}">
                        <i class="fa-solid fa-sliders text-xl"></i>
                        <span>Settings</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</aside>
