<template>
    <div>
        <Carousel autoplay v-model="value" :autoplay-speed="9000" :arrow="hover" loop>
            <CarouselItem  class="">
                <div class="demo-carousel flex justify-center ">
                        <img src="img/field1.jpg" class="duration-200 object-contain object-none w-full h-[35rem]" alt="#">       
                </div>
            </CarouselItem>
            <CarouselItem >
                <div class="demo-carousel flex justify-center " >
                    <img src="img/field2.jpg" class="duration-200  cursor-pointer object-none w-full h-[35rem]" alt="#">
                </div>
            </CarouselItem>
            <CarouselItem >
                <div class="demo-carousel flex justify-center " >
                    <img src="img/field3.jpg" class="duration-200  cursor-pointer object-none w-full h-[35rem]" alt="#">
                </div>
            </CarouselItem>
            <CarouselItem >
                <div class="demo-carousel flex justify-center " >
                    <img src="img/field2.jpg" class="duration-200  cursor-pointer object-none w-full h-[35rem]" alt="#">
                </div>
            </CarouselItem>
        </Carousel>
        <div class=" flex justify-center">
            <div class="w-3/4">
                <a-divider  style="border-color: #728596">
                    <h1 class="text-sky-600">
                        Latest Update
                    </h1>
                </a-divider>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="w-3/4">
                <a-card>
                    <a-card-grid style="width: 33.3%;  text-align: center"> 
                        <div>
                            <img src="img/field2.jpg" alt="" class="object-none w-full h-[12rem]">
                        </div>
                        <div class="font-semibold text-sky-600 text-left opacity-90 truncate" >
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                        </div>
                        <div class="font-normal text-xs text-gray-400 text-left truncate">
                            March 31, 2023
                        </div>
                        <div class="text-justify " style="  overflow:hidden;
                        /* line-height: 2rem; */
                        max-height: 1rem;
                        -webkit-box-orient: vertical;
                        display: block;
                        display: -webkit-box;
                        overflow: hidden !important;
                        text-overflow: ellipsis;
                        -webkit-line-clamp: 2;">
                            Showcasing excellence in intellectual property protection, education, management and technology commercialization, Mariano Marcos State University shone in the 2022 Innovation and Technology Support Office (ITSO) cluster awards organized by the Intellectual Property Office of the Philippines (IPOPHL). 
                        </div>
                    </a-card-grid>
                    <a-card-grid style="width: 33.3%; text-align: center"> 
                        <div>
                            <img src="img/field2.jpg" alt="" class="object-none w-full h-[12rem]">
                        </div>
                        <div class="font-semibold text-sky-600 text-left opacity-90 truncate" >
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                        </div>
                        <div class="font-normal text-xs text-gray-400 text-left truncate">
                            March 31, 2023
                        </div>
                        <div class="text-justify " style="  overflow:hidden;
                        /* line-height: 2rem; */
                        max-height: 1rem;
                        -webkit-box-orient: vertical;
                        display: block;
                        display: -webkit-box;
                        overflow: hidden !important;
                        text-overflow: ellipsis;
                        -webkit-line-clamp: 2;">
                            Showcasing excellence in intellectual property protection, education, management and technology commercialization, Mariano Marcos State University shone in the 2022 Innovation and Technology Support Office (ITSO) cluster awards organized by the Intellectual Property Office of the Philippines (IPOPHL). 
                        </div>
                    </a-card-grid>
                    <a-card-grid style="width: 33.3%; text-align: center"> 
                        <div>
                            <img src="img/field2.jpg" alt="" class="object-none w-full h-[12rem]">
                        </div>
                        <div class="font-semibold text-sky-600 text-left opacity-90 truncate" >
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                        </div>
                        <div class="font-normal text-xs text-gray-400 text-left truncate">
                            March 31, 2023
                        </div>
                        <div class="text-justify " style="  overflow:hidden;
                        /* line-height: 2rem; */
                        max-height: 1rem;
                        -webkit-box-orient: vertical;
                        display: block;
                        display: -webkit-box;
                        overflow: hidden !important;
                        text-overflow: ellipsis;
                        -webkit-line-clamp: 2;">
                            Showcasing excellence in intellectual property protection, education, management and technology commercialization, Mariano Marcos State University shone in the 2022 Innovation and Technology Support Office (ITSO) cluster awards organized by the Intellectual Property Office of the Philippines (IPOPHL). 
                        </div>
                    </a-card-grid>
                    <a-card-grid style="width: 33.3%; text-align: center"> 
                        <div>
                            <img src="img/field2.jpg" alt="" class="object-none w-full h-[12rem]">
                        </div>
                        <div class="font-semibold text-sky-600 text-left opacity-90 truncate" >
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                        </div>
                        <div class="font-normal text-xs text-gray-400 text-left truncate">
                            March 31, 2023
                        </div>
                        <div class="text-justify " style="  overflow:hidden;
                        /* line-height: 2rem; */
                        max-height: 1rem;
                        -webkit-box-orient: vertical;
                        display: block;
                        display: -webkit-box;
                        overflow: hidden !important;
                        text-overflow: ellipsis;
                        -webkit-line-clamp: 2;">
                            Showcasing excellence in intellectual property protection, education, management and technology commercialization, Mariano Marcos State University shone in the 2022 Innovation and Technology Support Office (ITSO) cluster awards organized by the Intellectual Property Office of the Philippines (IPOPHL). 
                        </div>
                    </a-card-grid>
                    <a-card-grid style="width: 33.3%; text-align: center"> 
                        <div>
                            <img src="img/field2.jpg" alt="" class="object-none w-full h-[12rem]">
                        </div>
                        <div class="font-semibold text-sky-600 text-left opacity-90 truncate" >
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                            Samplesaaasasasasaasas
                        </div>
                        <div class="font-normal text-xs text-gray-400 text-left truncate">
                            March 31, 2023
                        </div>
                        <div class="text-justify " style="  overflow:hidden;
                        /* line-height: 2rem; */
                        max-height: 1rem;
                        -webkit-box-orient: vertical;
                        display: block;
                        display: -webkit-box;
                        overflow: hidden !important;
                        text-overflow: ellipsis;
                        -webkit-line-clamp: 2;">
                            Showcasing excellence in intellectual property protection, education, management and technology commercialization, Mariano Marcos State University shone in the 2022 Innovation and Technology Support Office (ITSO) cluster awards organized by the Intellectual Property Office of the Philippines (IPOPHL). 
                        </div>
                    </a-card-grid>
                     
                </a-card>
            </div>
        </div>

    </div>
</template>

<script>
export default {
        data () {
            return {
                
            }
        }
    }
</script>