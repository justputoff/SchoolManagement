        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
              <a href="{{ route('dashboard') }}" class="app-brand-link">
                <span class="app-brand-logo demo">
                  <img src="{{ asset('assets/img/logo-intents.jpg') }}" style="max-width: 150px" alt="">
                </span>
              </a>
  
              <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
              </a>
            </div>
  
            <div class="menu-inner-shadow"></div>
  
            <ul class="menu-inner py-1 mt-3">
              <!-- Dashboard -->
              <li class="menu-item">
                <a href="{{ route('dashboard') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-home"></i>
                  <div data-i18n="Analytics">Dashboard</div>
                </a>
              </li>
              @if (Auth::user()->role->name == 'admin')
              <!-- Users -->
              <li class="menu-item {{ Route::is('users*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-user"></i>
                  <div data-i18n="Analytics">Users</div>
                </a>
              </li>
              <!-- Teachers -->
              <li class="menu-item {{ Route::is('teachers*') ? 'active' : '' }}">
                <a href="{{ route('teachers.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-chalkboard"></i>
                  <div data-i18n="Analytics">Teachers</div>
                </a>
              </li>
              <!-- Packages -->
              <li class="menu-item {{ Route::is('packages*') ? 'active' : '' }}">
                <a href="{{ route('packages.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-book"></i>
                  <div data-i18n="Analytics">Packages</div>
                </a>
              </li>
              <!-- Class Rooms -->
              <li class="menu-item {{ Route::is('class_rooms*') ? 'active' : '' }}">
                <a href="{{ route('class_rooms.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-school"></i>
                  <div data-i18n="Analytics">Class Rooms</div>
                </a>
              </li>
              <!-- Subjects -->
              <li class="menu-item {{ Route::is('subjects*') ? 'active' : '' }}">
                <a href="{{ route('subjects.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-book-reader"></i>
                  <div data-i18n="Analytics">Subjects</div>
                </a>
              </li>
              <!-- Schedules -->
              <li class="menu-item {{ Route::is('schedules*') ? 'active' : '' }}">
                <a href="{{ route('schedules.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-calendar"></i>
                  <div data-i18n="Analytics">Schedules</div>
                </a>
              </li>
              <!-- Students -->
              <li class="menu-item {{ Route::is('students*') ? 'active' : '' }}">
                <a href="{{ route('students.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-graduation"></i>
                  <div data-i18n="Analytics">Students</div>
                </a>
              </li>
              <!-- Billings -->
              <li class="menu-item {{ Route::is(['billings*', 'payments*', 'transactions*']) ? 'active' : '' }}">
                <a href="{{ route('billings.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-receipt"></i>
                  <div data-i18n="Analytics">Billings</div>
                </a>
              </li>
              <!-- Registration -->
              <li class="menu-item {{ Route::is('registration*') ? 'active' : '' }}">
                <a href="{{ route('registration.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-file"></i>
                  <div data-i18n="Analytics">Registration</div>
                </a>
              </li>
              @else
              <!-- Schedules -->
              <li class="menu-item {{ Route::is('schedules*') ? 'active' : '' }}">
                <a href="{{ route('schedules.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-calendar"></i>
                  <div data-i18n="Analytics">Schedules</div>
                </a>
              </li>
              <!-- Billings -->
              <li class="menu-item {{ Route::is(['billings*', 'payments*', 'transactions*']) ? 'active' : '' }}">
                <a href="{{ route('billings.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-receipt"></i>
                  <div data-i18n="Analytics">Billings</div>
                </a>
              </li>
              @endif
            </ul>
          </aside>
          <!-- / Menu -->