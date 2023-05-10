<template>
    <div>
        <div class="w-full">
            <Carousel autoplay v-model="value" :autoplay-speed="3000" :arrow="hover" loop>
                <CarouselItem  class="">
                    <div class="demo-carousel flex justify-center w-full ">
                            <img src="img/field1.jpg" class="duration-200 object-cover object-none w-full h-[35rem]" alt="#">       
                    </div>
                </CarouselItem>
                <CarouselItem >
                    <div class="demo-carousel flex justify-center " >
                        <img src="img/field2.jpg" class="duration-200  cursor-pointer object-cover object-none w-full h-[35rem]" alt="#">
                    </div>
                </CarouselItem>
                <CarouselItem >
                    <div class="demo-carousel flex justify-center " >
                        <img src="img/field3.jpg" class="duration-200  cursor-pointer object-cover object-none w-full h-[35rem]" alt="#">
                    </div>
                </CarouselItem>
                <CarouselItem >
                    <div class="demo-carousel flex justify-center " >
                        <img src="img/field2.jpg" class="duration-200  cursor-pointer object-cover object-none w-full h-[35rem]" alt="#">
                    </div>
                </CarouselItem>
            </Carousel>
        </div>
        <div class="w-full lg:flex lg:justify-center lg:space-x-20 lg:pt-10 p-5">
            <div class=" lg:w-3/12 w-full  bg-white shadow-xl border lg:mt-0">
                <h1 class="text-sky-600 text-2xl text-center">News</h1>
                <div class="max-h-full border-t-2 border-sky-800 p-2">
                    <div v-for="(news, key, index) in this.news"  class="flex border-b  pb-1">
                        <div class="flex-none min-w-fit h-20">
                            <img  class="bg-sky-500 object-cover object-center blur-none w-20 h-20 " :src="`/uploads/${news.image}`">
                        </div>
                        <div class="px-1 flex-initial w-5/6">
                            <p class="text-sm blur-none font-semibold text-sky-900  truncate">{{ news.title }}</p>
                            <h1 class="text-xs blur-none">News | {{ news.date }}</h1>
                            <h1 class="text-xs blur-none text-justify">By {{ news.author }}, {{ news.article.substring(0,160)+"..." }}</h1>
                        </div>
                    </div>
                </div>
                <div class="border-t">
                    View More
                </div>
            </div>
            <div class=" lg:w-3/12 w-full  bg-white shadow-xl border lg:mt-0">
                <h1 class="text-sky-600 text-2xl text-center">Events</h1>
                <div class="max-h-full border-t-2 border-sky-800 p-2">
                    <div v-for="(event, key, index) in this.events"  class="flex border-b">
                        <div class="flex-none w-20 h-20">
                            <img  class="bg-sky-500 object-cover object-center blur-none w-20 h-20 " :src="`/uploads/${event.image}`">
                        </div>
                        <div class="px-1 flex-initial w-[20rem]">
                            <p class="text-sm blur-none font-semibold text-sky-900  truncate">{{ event.title }}</p>
                            <h1 class="text-xs blur-none">Events | {{ event.date }}</h1>
                            <h1 class="text-xs blur-none text-justify">By {{ event.author }}, {{ event.article.substring(0,160)+"..." }}</h1>
                        </div>
                    </div>
                </div>
                <div class="border-t">
                    View More
                </div>
            </div>
            <div class=" lg:w-3/12 w-full  bg-white shadow-xl border lg:mt-0">
                <h1 class="text-sky-600 text-2xl text-center">Events</h1>
                <div class="max-h-full border-t-2 border-sky-800 p-2">
                    <div v-for="(announcement, key, index) in this.announcements"  class="flex border-b">
                        <div class="flex-none w-20 h-20">
                            <img  class="bg-sky-500 object-cover object-center blur-none w-20 h-20 " :src="`/uploads/${announcement.image}`">
                        </div>
                        <div class="px-1 flex-initial w-5/6">
                            <p class="text-sm blur-none font-semibold text-sky-900  truncate">{{ announcement.title }}</p>
                            <h1 class="text-xs blur-none">Announcements | {{ announcement.date }}</h1>
                            <h1 class="text-xs blur-none text-justify">By {{ announcement.author }}, {{ announcement.article.substring(0,160)+"..." }}</h1>
                        </div>
                    </div>
                </div>
                <div class="border-t">
                    View More
                </div>
            </div>
        </div>
        <!-- Project -->
        <div class="grid gap-2 place-content-center mt-10">
            <div class="text-center">
            <h1 class="font-medium leading-tight text-3xl text-sky-600">PROJECT OBJECTIVES</h1>
            <hr class="">
            </div>
        </div>
        
        <section class="body-font text-gray-600">
            <div class="container mx-auto px-5">
                <div class="-m-4 flex flex-wrap">
                    <div class="w-full p-4 md:w-1/2 lg:w-1/4">
                    <a href="{{ route('project1')}}" class="relative block overflow-hidden rounded flex justify-center py-5">
                        <img alt="ecommerce" class="block h-full w-80 shadow-lg object-cover object-center cursor-pointer transition ease-in-out delay-150  hover:-translate-y-1 hover:scale-105 duration-300" src="img/P1.png" />
                    </a>
                    <div class="mt-4 flex justify-center">
                        <h3 class="title-font mb-1 text-xs tracking-widest text-gray-500">PROJECT 1</h3>
                    </div>
                    </div>
                    <div class="w-full p-4 md:w-1/2 lg:w-1/4">
                    <a href="{{ route('project2')}}" class="relative block overflow-hidden rounded flex justify-center py-5">
                        <img alt="ecommerce" class="block h-full w-80 shadow-lg object-cover object-center cursor-pointer transition ease-in-out delay-150  hover:-translate-y-1 hover:scale-105 duration-300" src="img/P2.png" />
                    </a>
                    <div class="mt-4 flex justify-center">
                        <h3 class="title-font mb-1 text-xs tracking-widest text-gray-500">PROJECT 2</h3>
                    </div>
                    </div>
                    <div class="w-full p-4 md:w-1/2 lg:w-1/4">
                    <a href="{{ route('project3')}}" class="relative block overflow-hidden rounded flex justify-center py-5">
                        <img alt="ecommerce" class="block h-full w-80 shadow-lg object-cover object-center cursor-pointer transition ease-in-out delay-150  hover:-translate-y-1 hover:scale-105 duration-300" src="img/P3.png" />
                    </a>
                    <div class="mt-4 flex justify-center">
                        <h3 class="title-font mb-1 text-xs tracking-widest text-gray-500">PROJECT 3</h3>
                    </div>
                    </div>
                    <div class="w-full p-4 md:w-1/2 lg:w-1/4">
                    <a href="{{ route('project4')}}" class="relative block overflow-hidden rounded flex justify-center py-5">
                        <img alt="ecommerce" class="block h-full w-80 shadow-lg object-cover object-center cursor-pointer transition ease-in-out delay-150  hover:-translate-y-1 hover:scale-105 duration-300" src="img/P4.png" />
                    </a>
                    <div class="mt-4 flex justify-center">
                        <h3 class="title-font mb-1 text-xs tracking-widest text-gray-500">PROJECT 4</h3>
                    </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Project -->
        <!-- About Us -->
        <div >
            <div class="grid gap-2 place-content-center mt-10">
                <div class="text-center">
                <h1 class="font-medium leading-tight text-3xl text-sky-600">ABOUT US</h1>
                <hr class="">
                </div>
            </div>
            <div class="flex justify-center w-full  mt-5">
                <div>
                    <div class="xl:w-[90rem] lg:w-[50rem] w-full text-justify indent-8 p-3">
                        The Coastal Engineering Research Center or CoastER Center is the country’s first coastal engineering and management research and development center and 
                        the hub of innovations for coastal resiliency. This facility will spur the development of innovations that address coastal erosion, development construction 
                        materials for coastal protection, policies, and guidelines intended to protect resources from coastal flooding and improve the lives of people in coastal 
                        communities. It will also bolster the capability of Filipino engineers towards coastal engineering leading to the development of a master’s degree for coastal 
                        engineering.
                    </div>
                    <hr class="my-6 border-sky-300" />
                    <div class="xl:w-[90rem] lg:w-[50rem] w-full text-justify indent-8 p-3">
                        The COASTER aims to spearhead the development of technologies and innovation to mitigate and manage coastal disasters and risks. The overall goal of the 
                        center is to take the lead in coastal science and engineering studies to better undertand the magniture of certain process and hazards and their impacts
                        on the maritime environment including tidal deltas and low-lying lands.
                    </div>
                </div>
            </div>
        </div>
        <!-- /About Us -->
        <!-- Coop Agencies -->
        <div class="grid gap-2 place-content-center mb-5">
            <div class="grid gap-2 place-content-center lg:mt-10 mt-2">
                <div class="text-center">
                <h1 class="font-medium leading-tight text-3xl text-sky-600">COOP AGENCIES</h1>
                <hr class="">
                </div>
            </div>
            <div class="flex justify-center gap gap-4 px-10">
                <div class="shrink-0">
                    <a href="https://www.dost.gov.ph/"><img src="img/logo/DOST.png" class="object-fill lg:w-[4vw] lg:h-[4vw] w-[11vw] h-[11vw]" alt="#"></a>
                </div>
                <div class="shrink-0">
                    <a href="https://www.dost.gov.ph/"><img src="img/logo/MMSU.png" class="object-fill lg:w-[4vw] lg:h-[4vw] w-[11vw] h-[11vw]" alt="#"></a>
                </div>
                <div class="shrink-0">
                    <a href="https://www.mmsu.edu.ph/"><img src="img/logo/KYOTO.png" class="object-fill lg:w-[4vw] lg:h-[4vw] w-[11vw] h-[11vw]" alt="#"></a>
                </div>
                <div class="shrink-0">
                    <a href="https://www.mmsu.edu.ph/"><img src="img/logo/DILIMAN.png" class="object-fill lg:w-[4vw] lg:h-[4vw] w-[11vw] h-[11vw]" alt="#"></a>
                </div>
                <div class="shrink-0">
                    <a href="https://www.mmsu.edu.ph/"><img src="img/logo/DMMMSU.png" class="object-fill lg:w-[4vw] lg:h-[4vw] w-[11vw] h-[11vw]" alt="#"></a>
                </div>
                <div class="shrink-0">
                    <a href="https://www.mmsu.edu.ph/"><img src="img/logo/CIVIL.png" class="object-fill lg:w-[4vw] lg:h-[4vw] w-[11vw] h-[11vw]" alt="#"></a>
                </div>
                <div class="shrink-0">
                    <a href="https://www.mmsu.edu.ph/"><img src="img/logo/DPWH.png" class="object-fill lg:w-[4vw] lg:h-[4vw] w-[11vw] h-[11vw]" alt="#"></a>
                </div>
            </div>
        </div>
        <!-- /Coop Agencies -->
    </div>
  </template>
  <script>
  // Import Swiper Vue.js components
  import { Swiper, SwiperSlide } from "swiper/vue";
  
  // Import Swiper styles
  import "swiper/css";
  
  import "swiper/css/pagination";
  import "swiper/css/navigation";
  
  
  // import required modules
  import { Pagination, Navigation } from "swiper";
  
  export default {
    components: {
      Swiper,
      SwiperSlide,
    },
    setup() {
      return {
        modules: [Pagination, Navigation],
      };
    },
    data() {
        return {
            articles: '',
            events: [],
            news: [],
            announcements: [],
        }
    },
    async created() {
        let existingObj = this;
        this.token = window.Laravel.csrfToken;
        await axios.get('/api/getArticles')
        .then(function (response) {
        existingObj.articles = response.data
        for(let i = 0; i < existingObj.articles.length; i++){
            if(existingObj.articles[i].type_id == 1){
                existingObj.news.push(existingObj.articles[i]);
            }
            if(existingObj.articles[i].type_id == 2){
                existingObj.announcements.push(existingObj.articles[i]);
            }
            if(existingObj.articles[i].type_id == 3){
                existingObj.events.push(existingObj.articles[i]);
            }

        }
        // existingObj.events = response.data
        console.log(existingObj.news);
        console.log(existingObj.announcements);
        console.log(existingObj.events);
        })
        .catch(function (error) {
        });
    }
  };
  </script>

  <style scoped>
    article {
    --img-scale: 1.001;
    --title-color: black;
    --link-icon-translate: -20px;
    --link-icon-opacity: 0;
    position: relative;
    border-radius: 16px;
    box-shadow: none;
    background: #fff;
    transform-origin: center;
    transition: all 0.4s ease-in-out;
    overflow: hidden;
    margin: 5px;
    }

    article a::after {
    position: absolute;
    inset-block: 0;
    inset-inline: 0;
    cursor: pointer;
    content: "";
    }

    /* basic article elements styling */
    article h2 {
    /* font-family: "Bebas Neue", cursive; */
    font-size: 1.4rem;
    letter-spacing: 0.06em;
    color: var(--title-color);
    transition: color 0.3s ease-out;
    }

    figure {
    margin: 0;
    padding: 0;
    aspect-ratio: 18 / 9;
    overflow: hidden;
    }

    article img {
    max-width: 100%;
    transform-origin: center;
    transform: scale(var(--img-scale));
    transition: transform 0.4s ease-in-out;
    }

    .article-body {
    /* padding: 10px; */
    }

    article a {
    display: inline-flex;
    align-items: center;
    text-decoration: none;
    color: #28666e;
    }

    article a:focus {
    outline: 1px dotted #28666e;
    }

    article a .icon {
    min-width: 24px;
    width: 24px;
    height: 24px;
    margin-left: 5px;
    transform: translateX(var(--link-icon-translate));
    opacity: var(--link-icon-opacity);
    transition: all 0.3s;
    }

    /* using the has() relational pseudo selector to update our custom properties */
    article:has(:hover, :focus) {
    --img-scale: 1.1;
    --title-color: #28666e;
    --link-icon-translate: 0;
    --link-icon-opacity: 1;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
    }


    /************************ 
    Generic layout (demo looks)
    **************************/

    *,
    *::before,
    *::after {
    box-sizing: border-box;
    }

    body {
    margin: 0;
    padding: 48px 0;
    /* font-family: "Figtree", sans-serif; */
    font-size: 1.2rem;
    line-height: 1.6rem;
    background-image: linear-gradient(45deg, #7c9885, #b5b682);
    min-height: 100vh;
    }

    .articles {
    display: grid;
    max-width: 1200px;
    margin-inline: auto;
    padding-inline: 24px;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 24px;
    }

    @media screen and (max-width: 960px) {
    article {
        container: card/inline-size;
    }
    .article-body p {
        display: none;
    }
    }

    @container card (min-width: 380px) {
    .article-wrapper {
        display: grid;
        grid-template-columns: 100px 1fr;
        gap: 16px;
    }
    .article-body {
        padding-left: 0;
    }
    figure {
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
    figure img {
        height: 100%;
        aspect-ratio: 1;
        object-fit: scale-down;
    }
    }

    .sr-only:not(:focus):not(:active) {
    clip: rect(0 0 0 0); 
    clip-path: inset(50%);
    height: 1px;
    overflow: hidden;
    position: absolute;
    white-space: nowrap; 
    width: 1px;
    }
  </style>
  
    
  