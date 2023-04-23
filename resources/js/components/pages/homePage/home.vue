<template>
    <div>
        <div>
            <Carousel autoplay v-model="value" :autoplay-speed="3000" :arrow="hover" loop>
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
        </div>
        <div class=" flex justify-center">
            <div class="w-3/4">
                <a-divider  style="border-color: #728596">
                    <h1 class="text-sky-600">
                        Latest Update
                    </h1>
                </a-divider>
            </div>
        </div>
        <div class="w-full flex justify-center bg-gray-100 p-10">
            <div class="w-3/4 drop-shadow-md">
                <swiper
                ref="{swiperRef}"
                :slidesPerView="3"
                :spaceBetween="30"
                :pagination="{
                    type: 'fraction',
                }"
                :navigation="true"
                :modules="modules"
                class="mySwiper"
                
                >
                    <swiper-slide v-for='(article, index) in articles' :key='article.id' >
                        <article class="h-96">
                            <div class="article-wrapper">
                                <figure>
                                    <img :src="`/uploads/${article.image}`" alt="" />
                                    <!-- <Image :src="`/uploads/${article.image}`" class="object-cover  border" /> -->
                                </figure>
                                <div class="article-body px-3 pt-2">
                                    <div>
                                        <a-tag color="red">Project #</a-tag>
                                        <a-tag color="green">Project #</a-tag>
                                        <a-tag color="cyan">Project #</a-tag>
                                        <a-tag color="blue">Project #</a-tag>
                                    </div> 
                                    <div class="flex justify-between">
                                        <h2>{{ article.title.substring(0,15) }}</h2>
                                        <p>
                                            Date: 
                                        </p>
                                    </div>
                                    <p>
                                        By: {{ article.author }}
                                    </p>
                                    <p class="indent-8 text-justify">
                                        {{ article.article.substring(0,120)+"..." }}
                                    </p>
                                    <a href="#" class="read-more">
                                    Read more
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </swiper-slide>
                    <swiper-slide >
                        <article class="h-96">
                            <div class="grid grid-cols-2 gap-4 place-content-center h-48 p-10">
                                <div>01</div>
                                <div>02</div>
                                <div>03</div>
                                <div>04</div>
                            </div>
                        </article>

                    </swiper-slide>
                </swiper>
            </div>
        </div>
        
        <div class=" flex justify-center">
            <div class="w-3/4">
                <a-divider  style="border-color: #728596">
                    <h1 class="text-sky-600">
                        PROJECT OBJECTIVES
                    </h1>
                </a-divider>
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
            articles: [],
        }
    },
    async created() {
        let existingObj = this;
        this.token = window.Laravel.csrfToken;
        await axios.get('/api/getArticles')
        .then(function (response) {
        existingObj.articles = response.data
        console.log(existingObj.articles);
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
  
    
  