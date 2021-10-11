@stack('menu_start')
<div class="w-70 h-screen flex fixed js-menu transition">
    <nav class="flex h-screen bg-menu fixed js-menu transition" id="sidenav-main">
      
         <!--nav menu-->
        <div class="w-14 py-7 px-1 bg-menu-light">
            <div class="mb-5 cursor-pointer">
                <img src="../../../../public/Avatar.png" class="m-auto focus:outline-none" alt="avatar" />
            </div>
            <div class="group flex flex-col items-center justify-center">
                <div class="flex items-center justify-center w-8 h-8 mb-2.5 cursor-pointer js-menu-toggles" data-menu="notification">
                    <ion-icon name="notifications-outline" class="text-secondary w-5 h-5 mt-1"></ion-icon>
                </div>
                <div class="flex items-center justify-center w-8 h-8 mb-2.5 cursor-pointer js-menu-toggles" data-menu="settings">
                    <ion-icon name="settings-outline" class="text-secondary w-5 h-5 mt-1"></ion-icon>
                </div>
                <div class="flex items-center justify-center w-8 h-8 mb-2.5 cursor-pointer js-menu-toggles" data-menu="add-circle">
                    <ion-icon name="add-circle-outline" class="text-secondary w-5 h-5 mt-1"></ion-icon>
                </div>
            </div>

            <button type="button" class="absolute -right-0 top-8 cursor-pointer transition-opacity js-navbar-shrink">
                <ion-icon name="caret-back-outline" class="text-white text-xs bg-secondary rounded-full" style="padding: 2px;"></ion-icon>
            </button>
        </div>
        <!--main menu-->
        <div class="w-72 flex-col py-7 px-5 menu-scroll overflow-y-auto js-main-menu">
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
             {!! menu('admin') !!}  
        </div>
    </nav>
</div>
@stack('menu_end')
