<template>
    <div>
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
                                <router-link to="/" class="py-4 px-4 flex text-white font-semibold hover:bg-sky-700 
                                    cursor-pointer transition-colors duration-300 ">
                                    HOME
                                </router-link>
                            <!-- /About -->
                            <!-- Tidal & Wave -->
                                <a to="/" class="py-4 px-4 flex text-white font-semibold hover:bg-sky-700 
                                cursor-pointer transition-colors duration-300 ">
                                    TIDAL & WAVE
                                </a>
                            <!-- /Tidal & Wave -->
                            <!-- Weather -->
                                <a to="/" class="py-4 px-4 flex text-white font-semibold hover:bg-sky-700 
                                cursor-pointer transition-colors duration-300 ">
                                    WEATHER
                                </a>
                            <!-- /Weather -->
                            <!-- Map -->
                            <div :class="{ active: activeItem1}" class="dropdown z-40  px-4 flex text-white font-semibold hover:bg-sky-700 
                            cursor-pointer transition-colors duration-300 " style="float:left;">
                            <button class="dropdown py-4" >MAP</button>
                                <div class="dropdown-content p-1 w-[10rem] font-normal " style="left:0;">
                                    <router-link to="/waterLevel"  class="w-full text-white hover:shadow-[inset_10rem_0_0_0] hover:shadow-cyan-700 duration-[400ms,700ms] transition-[color,box-shadow]">WATER LEVEL</router-link>
                                    <router-link to="/Map"  class="w-full text-white hover:shadow-[inset_10rem_0_0_0] hover:shadow-cyan-700 duration-[400ms,700ms] transition-[color,box-shadow]">MAP</router-link>
                                    
                                </div>
                            </div>
                            <!-- /Map -->

                            <!-- Project -->
                            <div :class="{ active: activeItem2}" class="dropdown z-40  px-4 flex text-white font-semibold hover:bg-sky-700 
                                cursor-pointer transition-colors duration-300 " style="float:left;">
                                <button class="dropdown py-4 ">PROJECT</button>
                                <div class="dropdown-content p-1 w-[23rem] font-normal " style="left:0;">
                                    <router-link to="/Map" class="text-white text-justify  hover:shadow-[inset_23rem_0_0_0] hover:shadow-cyan-700 duration-[400ms,700ms] transition-[color,box-shadow]">Coastal Erosion Trends and Management Strategies for Region 1</router-link>
                                    <router-link to="/Map" class="text-white text-justify  hover:shadow-[inset_23rem_0_0_0] hover:shadow-cyan-700 duration-[400ms,700ms] transition-[color,box-shadow]">Assesment Monitoring, and Prediction of Coastal Flooding of Selected Municipalities in Region 1</router-link>
                                    <router-link to="/Map" class="text-white text-justify  hover:shadow-[inset_23rem_0_0_0] hover:shadow-cyan-700 duration-[400ms,700ms] transition-[color,box-shadow]">Development of Science-based Engineering Approach to Coastal Prediction in Region 1</router-link>
                                    <router-link to="/Map" class="text-white text-justify  hover:shadow-[inset_23rem_0_0_0] hover:shadow-cyan-700 duration-[400ms,700ms] transition-[color,box-shadow]">Enhancing Coastal Design and Infrastructure Intervention through the Establishment of Wave Testing Facility</router-link>
                                </div>
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

            <!-- Footer -->
            <footer id="footer" style="" class="bg-white dark:bg-gray-800">
                <div id="contact" class="max-w-screen-xl mx-auto lg:py-5 md:p-8 lg:p-10">
                <div class="grid grid-cols-2 gap-8 md:grid-cols-3 lg:grid-cols-2">
                    <div class="place-content-center grid ">
                        <img class="w-40 h-40 sm:w-36 sm:h-36 " src="img/logo/coaster.png" alt="" >
                    </div>
                    <div class="">
                        <h3 class="mb-4 text-base text-gray-900 dark:text-white">Coaster Contact Information</h3>
                        <ul class="text-gray-500 dark:text-gray-400  justify-end">
                                <li class="mb-4">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                        </svg>
                                        Quiling Sur, Batac City, Ilocos Norte, Philippines
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                        </svg>
                                        +63 5678954378
                                    </div>
                                </li>
                                <li class="mb-4">
                                    <div class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                        </svg>
                                        nralibuyog@mmsu.edu.ph
                                    </div>
                                </li>
                        </ul>
                    </div>
                </div>
                    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-1">
                <div class="text-center">
                    <span class="block text-sm text-center text-gray-500 dark:text-gray-400">© 2022-2023 COASTER. All Rights Reserved.
                    </span>
                    <!-- <ul class="flex justify-center mt-5 space-x-5">
                        <li>
                            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white dark:text-gray-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            </a>
                        </li>
                    </ul> -->
                </div>
                </div>
            </footer>
            <!-- /Footer -->
            
        </div>
    </div>
</template>

<script>
import { defineComponent, ref } from 'vue';
import { MailOutlined, AppstoreOutlined, SettingOutlined } from '@ant-design/icons-vue';
export default defineComponent({
    components: {
        MailOutlined,
        AppstoreOutlined,
        SettingOutlined,
    },
    data() {
        const activeItem1 = ref(false);
        const activeItem2 = ref(false);
        return {
            activeItem1,
            activeItem2,
        };
    },
    watch:{
        $route (to, from){
        let existingObj = this;
            if(to.path == "/Map" || to.path == "/waterLevel"){
                existingObj.activeItem1 = true;
            } else {
                existingObj.activeItem1 = false;
            }
            if(to.path == "/Map" || to.path == "/waterLevel"){
                existingObj.activeItem2 = true;
            } else {
                existingObj.activeItem2 = false;
            }
        }
    },
});
</script>


<style scoped>
.router-link-exact-active{
    background-color: rgb(33, 59, 104);
}

.active {
    background-color: rgb(33, 59, 104);
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: rgb(13,34,71, .8);
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown:hover .dropdown-content {
  display: block;
}

</style>