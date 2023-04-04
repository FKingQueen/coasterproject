<template>
    <div>
        <!-- Top View -->
        <div id="topView" class="w-full hidden lg:block p-0">
                <div class="flex justify-around">
                    <div class="md:flex p-0">
                        <img src="img/top.png" class="duration-200  cursor-pointer object-fill h-20" alt="#">
                    </div>
                <div class="text-sm grid grid-cols-1 gap-1 content-center ">
                    <div class="text-right">
                        <p class="">Contact Us</p>
                        <p class="no-underline hover:underline hover:text-blue-600 cursor-pointer">+63912345678</p>
                        <p class="no-underline hover:underline hover:text-blue-600 cursor-pointer">coaster@gmail.com</p>
                    </div>

                </div>
            </div>
        </div>
        <nav id="navbar" style="transition: 0.6s;" class="relative z-30 flex w-full bg-[#0d2247] lg:px-20 md:px-3 sm:px-1 border-y-4 border-cyan-900 ">
            <div class="px-5 xl:px-12  flex w-full justify-evenly">
                <!-- Nav Links -->
                <div id="navButton" style="">
                    <div class=" lg:flex text-white font-normal font-heading w-full ">
                        <!-- About -->
                            <router-link to="/" href="javascript:void(0)" class="py-4 px-4 flex text-white font-semibold hover:bg-sky-700 
                                cursor-pointer transition-colors duration-300 ">
                                HOME
                            </router-link>
                        <!-- /About -->
                        <!-- Tidal & Wave -->
                            <a href="/" class="py-4 px-4 flex text-white font-semibold hover:bg-sky-700 
                            cursor-pointer transition-colors duration-300 ">
                                TIDAL & WAVE
                            </a>
                        <!-- /Tidal & Wave -->
                        <!-- Weather -->
                            <router-link to="/waterLevel" class="py-4 px-4 flex text-white font-semibold hover:bg-sky-700 
                            cursor-pointer transition-colors duration-300 ">
                                WEATHER
                            </router-link>
                        <!-- /Weather -->
                        <!-- Map -->
                            <Dropdown>
                                <a href="javascript:void(0)" class="py-4 px-4 flex text-white font-semibold hover:bg-sky-700 
                                    cursor-pointer transition-colors duration-300 ">
                                    MAP
                                </a>
                                <template #list>
                                    <DropdownMenu >
                                        <DropdownItem>
                                            <router-link to="/waterLevel">Map</router-link>
                                        </DropdownItem>
                                        <DropdownItem>
                                            <router-link to="/map">Map</router-link>
                                        </DropdownItem>
                                    </DropdownMenu>
                                </template>
                            </Dropdown>
                        <!-- /Map -->

                        <!-- Project -->
                            <div class="dropdown z-40  px-4 flex text-white font-semibold hover:bg-sky-700 
                                cursor-pointer transition-colors duration-300 " style="float:left;">
                                <button class="dropdown py-4 ">PROJECT</button>
                            </div>
                        <!-- /Project -->
                    </div>
                </div>

                <!-- Search Bar -->
                    <button id="btnSearchrToggler" type="button" class=" text-2xl text-white hover:text-gray-200 lg:mr-0 mr-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 focus:outline outline-offset-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                <!-- /Search Bar -->

            </div>
          </nav>
        <router-view ></router-view>
        
    </div>
</template>


