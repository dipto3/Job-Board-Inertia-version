<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="fe-airplay"></i>

                        <span> Dashboard </span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">

                    </ul>
                </li>
                @can('role')
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-sidebar"></i>
                            <span> Role </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('role.index') }}">List</a></li>

                        </ul>
                    </li>
                @endcan
                @can('user')
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-sidebar"></i>
                            <span> Users </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('show.user.company') }}">Company</a></li>
                            <li><a href="{{ route('candidate.list') }}">Candidate</a></li>


                        </ul>
                    </li>
                @endcan
                @can('job')
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-sidebar"></i>
                            <span> Job </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('job.index') }}">List</a></li>

                        </ul>
                    </li>
                @endcan
                @can('subscriber')
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-file-plus"></i>
                            <span> Subscriber </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('subscriber.list') }}">List</a></li>
                        </ul>
                    </li>
                @endcan

                @can('package')
                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-file-plus"></i>
                            <span> Package </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('package.index') }}">List</a></li>
                        </ul>
                    </li>
                @endcan
            </ul>


        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>

    <!-- Sidebar -left -->

</div>
