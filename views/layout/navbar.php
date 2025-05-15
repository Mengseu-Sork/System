
<div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);" :class="{ 'dark': isDark}">
      <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark">
        <!-- Sidebar -->
        <aside class="flex-shrink-0 hidden w-64 bg-white dark:bg-darker pl-6 md:block">
          <div class="flex flex-col h-full">
            <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2">
              <a href="/Dashboard" class="flex flex-col items-center mb-6 mt-4 mr-6 text-primary-dark">
                <img src="../../Assets/images/logo.jpg" alt="Logo" class="w-24 mb-2">
                <span class="font-bold text-3xl tracking-wider text-green-500">Fresh Fruit</span>
              </a>
              <div class="space-y-3 overflow-y-auto">
                <div>
                  <a
                    href="/Dashboard"
                    class="group sidebar-link flex items-center p-2 text-gray-500 transition-colors rounded-md hover:bg-primary-100 dark:hover:bg-primary"
                    >
                    <span aria-hidden="true">
                      <i class="fas fa-home icon text-green-500 group-hover:text-white"></i>
                    </span>
                    <span class="ml-3 text-xl group-hover:text-white"> Dashboards </span>
                    <span class="ml-auto" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                      </svg>
                    </span>
                  </a>
                </div>

                <!-- <div>
                  <a
                    href="#"
                    class="group sidebar-link flex items-center p-2 text-gray-500 transition-colors rounded-md hover:bg-primary-100 dark:hover:bg-primary"
                  >
                    <span aria-hidden="true">
                      <i class="fas fa-cube icon text-green-500 group-hover:text-white"></i>
                    </span>
                    <span class="ml-3 text-xl group-hover:text-white"> Products </span>
                    <span class="ml-auto" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                      </svg>
                    </span>
                  </a>
                </div> -->

                <div>

                  <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                  <a
                    href="/productsList"
                    class="group sidebar-link flex items-center p-2 text-gray-500 transition-colors rounded-md hover:bg-primary-100 dark:hover:bg-primary"

                  >
                    <span aria-hidden="true">
                      <i class="fas fa-box icon text-green-500 group-hover:text-white"></i> 
                    <span class="ml-3 text-xl group-hover:text-white"> Inventory </span>
                  </a>
                </div>

                <div>
                  <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                  <a
                    href="#"
                    class="group sidebar-link flex items-center p-2 text-gray-500 transition-colors rounded-md hover:bg-primary-100 dark:hover:bg-primary"

                  >
                    <span aria-hidden="true">
                      <i class="fas fa-warehouse warehouse-icon text-green-500 group-hover:text-white"></i>
                    <span class="ml-5 text-xl group-hover:text-white"> Stock </span>
                  </a>
                </div>

                <div>
                  <!-- active classes 'bg-primary-100 dark:bg-primary' -->
                  <a
                    href="#"
                    class="group sidebar-link flex items-center p-2 text-gray-500 transition-colors rounded-md hover:bg-primary-100 dark:hover:bg-primary"

                  >
                    <span aria-hidden="true">
                    <i class="fas fa-list icon text-green-500 group-hover:text-white"></i>
                    <span class="ml-2 text-xl group-hover:text-white"> Category </span>
                  </a>
                </div>

                <!-- Authentication links -->
                <!-- <div>
                  <a
                    href="#"
                    class="group sidebar-link flex items-center p-2 text-gray-500 transition-colors rounded-md hover:bg-primary-100 dark:hover:bg-primary"

                  >
                    <span aria-hidden="true">
                      <i class="fas fa-shopping-cart icon text-green-500 group-hover:text-white"></i>
                    </span>
                    <span class="ml-2 text-xl group-hover:text-white"> History Order </span>
                    <span aria-hidden="true" class="ml-auto">
                    </span>
                  </a>
                </div> -->

                <!-- Layouts links -->
                <div>
                  <a
                      href="#"
                      class="group sidebar-link flex items-center p-2 text-gray-500 transition-colors rounded-md hover:bg-primary-100 dark:hover:bg-primary"

                    >
                      <span aria-hidden="true">
                        <i class="fas fa-dollar-sign icon1 text-green-500 group-hover:text-white"></i>
                      </span>
                      <span class="ml-4 text-xl group-hover:text-white"> Payments </span>
                      <span aria-hidden="true" class="ml-auto">
                      </span>
                    </a>
                </div>
                <div>
                  <a
                    href="/users"
                    class="group sidebar-link flex items-center p-2 text-gray-500 transition-colors rounded-md hover:bg-primary-100 dark:hover:bg-primary"
                    >
                    <span aria-hidden="true">
                      <i class="fas fa-users icon text-green-500 group-hover:text-white"></i>
                    </span>
                    <span class="ml-2 text-xl group-hover:text-white"> Users </span>
                    <span aria-hidden="true" class="ml-auto">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                      </svg>
                    </span>
                  </a>
                </div>
                <div>
                  <a
                    href="/"
                    class="group sidebar-link flex items-center p-2 text-gray-500 transition-colors rounded-md hover:bg-primary-100 dark:hover:bg-primary"
                  >
                    <span aria-hidden="true">
                      <i class="fas fa-sign-out-alt icon text-green-500 group-hover:text-white"></i>
                    </span>
                    <span class="ml-3 text-xl group-hover:text-white"> Logout </span>
                  </a>
                </div>
              </div>
            </nav>
          </div>
        </aside>
        <div class="flex-1 h-full overflow-hidden">
          <header class="flex-1 bg-white"> 
                  <div class="flex items-center justify-between p-2">
                      <div>
                        <h1 class="ml-6 text-xl text-green-500 font-bold">MANAGEMENT</h1>
                      </div>
                      <nav aria-label="Secondary" class="hidden space-x-6 md:flex md:items-center mr-4">
                            <button id="bellIcon" class="relative focus:outline-none ">
                              <svg class="w-8 h-8 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" 
                                  viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                              </svg>
                              <span id="notifCount" class="absolute -top-1 -right-1 bg-red-500 text-white text-xs px-1 rounded-full">0</span>
                            </button>
                            <button
                              type="button"
                              aria-haspopup="true"
                              aria-expanded="false"
                              onclick="toggleProfile()"
                              class="block transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
                              <span class="sr-only">User menu</span>
                              <a href="/profile">
                                  <div class="relative inline-block">
                                      <!-- Profile Image -->
                                      <img class="w-10 h-10 rounded-full object-cover"
                                          src="" alt="Profile"/>

                                      <!-- Active Indicator -->
                                      <!-- <?php if ($user['active'] == 1): ?>
                                          <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-1 border-white rounded-full"></div>
                                      <?php else: ?>
                                          <div class="w-0 h-0 "></div>
                                      <?php endif; ?> -->
                                  </div>
                              </a>
                          </button>
                      </nav>
                  </div>
          </header>           

       