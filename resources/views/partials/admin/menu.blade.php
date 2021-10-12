@stack('menu_start')
<div class="w-70 h-screen flex fixed js-menu transition font-sans">
    <nav class="flex h-screen bg-menu fixed js-menu transition" id="sidenav-main">
      
         <!--nav menu-->
        <div class="w-14 py-7 px-1 bg-menu-light">
            <div class="mb-5 cursor-pointer">
                <img src="../../../../public/Avatar.png" class="m-auto focus:outline-none" alt="avatar" />
            </div>
            <div class="group flex flex-col items-center justify-center menu-toggle-buttons">
                <button class="flex items-center justify-center w-8 h-8 mb-2.5 cursor-pointer js-menu-toggles" data-menu="notification">
                    <ion-icon name="notifications-outline" class="text-secondary w-5 h-5 mt-1"></ion-icon>
                </button>
                <button class="settings-item flex items-center justify-center w-8 h-8 mb-2.5 cursor-pointer js-menu-toggles" data-menu="settings">
                    <ion-icon name="settings-outline" class="text-secondary w-5 h-5 mt-1"></ion-icon>
                </button>
                <button class="add-item flex items-center justify-center w-8 h-8 mb-2.5 cursor-pointer js-menu-toggles" data-menu="add-circle">
                    <ion-icon name="add-circle-outline" class="text-secondary w-5 h-5 mt-1"></ion-icon>
                </button>
            </div>
        </div>
        <!--main menu-->
        <div class="w-72 flex-col py-7 px-5 menu-scroll overflow-y-auto transform translate-x-0 js-main-menu">
             <div>
                <div class="flex items-center relative mb-5 cursor-pointer">
                    <img src="https://akaunting.com/public/images/akaunting-footer-logo.png" class="w-8 h-8" alt="logo" />
                    <div class="ml-2">
                        <p class="text-base">{{ Str::limit(setting('company.name'), 22) }}</p>
                    </div>
                    <div class="absolute right-0">
                        @can('read-common-companies')
                            <svg class="h-5 w-5 text-gray-400" x-description="Heroicon name: solid/selector" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path
                                    fill-rule="evenodd"
                                    d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                    clip-rule="evenodd"
                                ></path>
                            </svg>
                        @endcan
                    </div>
                </div>
                   
                <div class="group cursor-pointer">
                    <img src="./Group 190.png" class="hidden-xs-only " alt="" />
                </div>
                    
            </div>
            <div class="main-menu transform">
                {!! menu('admin') !!}  
               
                @can('show-modules')
                    {!! menu('modules') !!}  
                @endcan

                @can('show-settings')
                     {!! menu('settings') !!}  
                @endcan
            </div>
            <div class="modules-menu hidden transform">
                 <ul class="flex flex-col justify-center">
                    <li class="group relative mb-2.5">
                       <a href="/" class="flex items-center text-secondary">
                            <div class="w-8 h-8 flex items-center justify-center">
                                 <ion-icon name="speedometer-outline" class="w-5 h-5"></ion-icon>
                            </div>
                        <span class="text-sm font-normal font-sans ml-2">Invoice</span>
                        <span class="bg-secondary h-5 rounded-tl-lg rounded-bl-lg absolute -right-5 opacity-0 group-hover:opacity-100 transition-all" style="width: 5px;"></span>
                                </a>
                            </li>
                            <li class="group relative mb-2.5">
                                <a href="/" class="flex items-center text-secondary">
                                    <div class="w-8 h-8 flex items-center justify-center">
                                        <ion-icon name="cube-outline" class="w-5 h-5"></ion-icon>
                                    </div>
                                    <span class="text-sm font-normal font-sans ml-4">Revenue</span>
                                    <span class="bg-secondary h-5 rounded-tl-lg rounded-bl-lg absolute -right-5 opacity-0 group-hover:opacity-100 transition-all" style="width: 5px;"></span>
                                </a>
                            </li>

                            <li class="group relative mb-2.5">
                                <a href="/" class="flex items-center text-secondary">
                                    <div class="w-8 h-8 flex items-center justify-center">
                                        <ion-icon name="cube-outline" class="w-5 h-5"></ion-icon>
                                    </div>
                                    <span class="text-sm font-normal font-sans ml-4">Revenue</span>
                                    <span class="bg-secondary h-5 rounded-tl-lg rounded-bl-lg absolute -right-5 opacity-0 group-hover:opacity-100 transition-all" style="width: 5px;"></span>
                                </a>
                            </li>
                            <li class="group relative mb-2.5">
                                <a href="/" class="flex items-center text-secondary">
                                    <div class="w-8 h-8 flex items-center justify-center">
                                        <ion-icon name="cart-outline" class="w-5 h-5"></ion-icon>
                                    </div>
                                    <span class="text-sm font-normal font-sans ml-4">Customer</span>
                                    <ion-icon name="chevron-down-outline" class="absolute right-0" style="color: #6b7280;"></ion-icon>
                                    <span class="bg-secondary h-5 rounded-tl-lg rounded-bl-lg absolute -right-5 opacity-0 group-hover:opacity-100 transition-all" style="width: 5px;"></span>
                                </a>
                            </li>
                            <li class="group relative mb-2.5">
                                <a href="/" class="flex items-center text-secondary">
                                    <div class="w-8 h-8 flex items-center justify-center">
                                        <ion-icon name="cart-outline" class="w-5 h-5"></ion-icon>
                                    </div>
                                    <span class="text-sm font-normal font-sans ml-4">Bill</span>
                                    <ion-icon name="chevron-down-outline" class="absolute right-0" style="color: #6b7280;"></ion-icon>
                                    <span class="bg-secondary h-5 rounded-tl-lg rounded-bl-lg absolute -right-5 opacity-0 group-hover:opacity-100 transition-all" style="width: 5px;"></span>
                                </a>
                            </li>
                            <li class="group relative mb-2.5">
                                <a href="/" class="flex items-center text-secondary">
                                    <div class="w-8 h-8 flex items-center justify-center">
                                        <ion-icon name="cart-outline" class="w-5 h-5"></ion-icon>
                                    </div>
                                    <span class="text-sm font-normal font-sans ml-4">Vendor</span>
                                    <ion-icon name="chevron-down-outline" class="absolute right-0" style="color: #6b7280;"></ion-icon>
                                    <span class="bg-secondary h-5 rounded-tl-lg rounded-bl-lg absolute -right-5 opacity-0 group-hover:opacity-100 transition-all" style="width: 5px;"></span>
                                </a>
                            </li>
                        </ul>
            </div>
             <div class="settings-menu hidden transform">
                  <ul class="flex flex-col justify-center">
                    <li class="group relative mb-2.5">
                       <a href="/" class="flex items-center text-secondary">
                            <div class="w-8 h-8 flex items-center justify-center">
                                 <ion-icon name="speedometer-outline" class="w-5 h-5"></ion-icon>
                            </div>
                        <span class="text-sm font-normal font-sans ml-2">Company</span>
                        <span class="bg-secondary h-5 rounded-tl-lg rounded-bl-lg absolute -right-5 opacity-0 group-hover:opacity-100 transition-all" style="width: 5px;"></span>
                                </a>
                            </li>
                            <li class="group relative mb-2.5">
                                <a href="/" class="flex items-center text-secondary">
                                    <div class="w-8 h-8 flex items-center justify-center">
                                        <ion-icon name="cube-outline" class="w-5 h-5"></ion-icon>
                                    </div>
                                    <span class="text-sm font-normal font-sans ml-4">Localization</span>
                                    <span class="bg-secondary h-5 rounded-tl-lg rounded-bl-lg absolute -right-5 opacity-0 group-hover:opacity-100 transition-all" style="width: 5px;"></span>
                                </a>
                            </li>

                            <li class="group relative mb-2.5">
                                <a href="/" class="flex items-center text-secondary">
                                    <div class="w-8 h-8 flex items-center justify-center">
                                        <ion-icon name="cube-outline" class="w-5 h-5"></ion-icon>
                                    </div>
                                    <span class="text-sm font-normal font-sans ml-4">Invoice</span>
                                    <span class="bg-secondary h-5 rounded-tl-lg rounded-bl-lg absolute -right-5 opacity-0 group-hover:opacity-100 transition-all" style="width: 5px;"></span>
                                </a>
                            </li>
                            <li class="group relative mb-2.5">
                                <a href="/" class="flex items-center text-secondary">
                                    <div class="w-8 h-8 flex items-center justify-center">
                                        <ion-icon name="cart-outline" class="w-5 h-5"></ion-icon>
                                    </div>
                                    <span class="text-sm font-normal font-sans ml-4">Default</span>
                                    <ion-icon name="chevron-down-outline" class="absolute right-0" style="color: #6b7280;"></ion-icon>
                                    <span class="bg-secondary h-5 rounded-tl-lg rounded-bl-lg absolute -right-5 opacity-0 group-hover:opacity-100 transition-all" style="width: 5px;"></span>
                                </a>
                            </li>
                            <li class="group relative mb-2.5">
                                <a href="/" class="flex items-center text-secondary">
                                    <div class="w-8 h-8 flex items-center justify-center">
                                        <ion-icon name="cart-outline" class="w-5 h-5"></ion-icon>
                                    </div>
                                    <span class="text-sm font-normal font-sans ml-4">Bill</span>
                                    <ion-icon name="chevron-down-outline" class="absolute right-0" style="color: #6b7280;"></ion-icon>
                                    <span class="bg-secondary h-5 rounded-tl-lg rounded-bl-lg absolute -right-5 opacity-0 group-hover:opacity-100 transition-all" style="width: 5px;"></span>
                                </a>
                            </li>
                            <li class="group relative mb-2.5">
                                <a href="/" class="flex items-center text-secondary">
                                    <div class="w-8 h-8 flex items-center justify-center">
                                        <ion-icon name="cart-outline" class="w-5 h-5"></ion-icon>
                                    </div>
                                    <span class="text-sm font-normal font-sans ml-4">Vendor</span>
                                    <ion-icon name="chevron-down-outline" class="absolute right-0" style="color: #6b7280;"></ion-icon>
                                    <span class="bg-secondary h-5 rounded-tl-lg rounded-bl-lg absolute -right-5 opacity-0 group-hover:opacity-100 transition-all" style="width: 5px;"></span>
                                </a>
                            </li>
                        </ul>
            </div>
        </div>
            
        <button type="button" class="toggle-button absolute -right-2 top-8 cursor-pointer transition-opacity js-navbar-shrink">
            <ion-icon name="caret-back-outline" class="text-white text-xs bg-secondary rounded-full" style="padding: 2px;"></ion-icon>
        </button>
    </nav>
</div>
@stack('menu_end')
