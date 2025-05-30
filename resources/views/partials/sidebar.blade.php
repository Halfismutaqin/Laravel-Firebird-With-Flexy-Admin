<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/logo.svg') }}" alt="">
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-6"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="init">
            <div class="simplebar-wrapper" style="margin: 0px -24px;">
                <div class="simplebar-height-auto-observer-wrapper">
                    <div class="simplebar-height-auto-observer">
                    </div>
                </div>
                <div class="simplebar-mask">
                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                        <div class="simplebar-content-wrapper" tabindex="0" role="region"
                            aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                            <div class="simplebar-content" style="padding: 0px 24px;">
                                <ul id="sidebarnav">
                                    <li class="nav-small-cap">
                                        <iconify-icon icon="solar:menu-dots-linear"
                                            class="nav-small-cap-icon fs-4"></iconify-icon>
                                        <span class="hide-menu">Home</span>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="./index.html" aria-expanded="false">
                                            <i class="ti ti-atom"></i>
                                            <span class="hide-menu">Dashboard</span>
                                        </a>
                                    </li>
                                    <!-- ---------------------------------- -->
                                    <!-- Dashboard -->
                                    <!-- ---------------------------------- -->
                                    <li class="sidebar-item">
                                        <a class="sidebar-link justify-content-between" target="_blank"
                                            href="https://bootstrapdemos.wrappixel.com/flexy/dist/main/index.html"
                                            aria-expanded="false">
                                            <div class="d-flex align-items-center gap-3">
                                                <span class="d-flex">
                                                    <i class="ti ti-aperture"></i>
                                                </span>
                                                <span class="hide-menu">Analytical</span>
                                            </div>
                                            <span
                                                class="hide-menu badge bg-secondary-subtle text-secondary fs-1 py-1">Pro</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
