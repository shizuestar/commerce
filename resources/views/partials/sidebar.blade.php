<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link collapsed {{ Request::is("/") ? "active" : "" }}" href="/">
                <i class="bi bi-house-door"></i>
                <span>Home</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i>
                <span>Categories</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="components-breadcrumbs.html">
                        <i class="bi bi-circle"></i
                        ><span>Breadcrumbs</span>
                    </a>
                </li>
                <li>
                    <a href="components-carousel.html">
                        <i class="bi bi-circle"></i
                        ><span>Carousel</span>
                    </a>
                </li>
                <li>
                    <a href="components-tooltips.html">
                        <i class="bi bi-circle"></i
                        ><span>Tooltips</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a
                class="nav-link collapsed"
                data-bs-target="#forms-nav"
                data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-journal-text"></i><span>Forms</span
                ><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul
                id="forms-nav"
                class="nav-content collapse"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.html">
                        <i class="bi bi-circle"></i
                        ><span>Form Elements</span>
                    </a>
                </li>
                <li>
                    <a href="forms-layouts.html">
                        <i class="bi bi-circle"></i
                        ><span>Form Layouts</span>
                    </a>
                </li>
                <li>
                    <a href="forms-editors.html">
                        <i class="bi bi-circle"></i
                        ><span>Form Editors</span>
                    </a>
                </li>
            </ul>
        </li>

        @auth
            <li class="nav-heading">User</li>

            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is("dashboard/user/profile") ? "active" : ""  }}" href="/dashboard/user/profile">
                    <i class="bi bi-person"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is("dashboard/user/carts") ? "active" : "" }}" href="/dashboard/user/carts">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-contact.html">
                    <i class="bi bi-envelope"></i>
                    <span>Contact</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/logout">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Logout</span>
                </a>
            </li>
        @endauth
        @can("admin")
            <li class="nav-heading">Admin</li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ Request::is("dashboard/products") ? "active" : "" }}" href="/dashboard/products">
                    <i class="bi bi-person"></i>
                    <span>Manage Products</span>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link collapsed {{ Request::is("dashboard/orders") ? 'active' : '' }}" href="/dashboard/orders">
                    <i class="bi bi-person"></i>
                    <span>Manage Orders</span>
                </a>
            </li>
        @endcan
    </ul>
</aside>