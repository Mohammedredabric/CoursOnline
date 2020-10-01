<template>
     <app-layout>
         <template slot="header" >
             <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                 List des farmation
             </h2>
         </template>
         <div class="py-3" v-for="course in this.courseslist" :key="course.id">
            <div class=" mx-4 bg-gradient-to-r from-indigo-300 via-indigo-800 to-indigo-800 rounded-lg py-10 ">
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-1 m-auto">
                        <div class="relative flex justify-center items-center">
                            <img  data-src="https://laracasts.s3.amazonaws.com/series/thumbnails/whats-new-in-laravel-8.png" alt="What's New in Laravel 8" class="tw-absolute tw-left-0 tw-top-0 ls-is-cached absolute" src="https://laracasts.s3.amazonaws.com/series/thumbnails/whats-new-in-laravel-8.png" style="width: 210px; height: 210px; top: calc(50% - 105px); left: calc(50% - 105px);">
                            <svg viewBox="0 0 33.83098862 33.83098862" width="250" height="250" xmlns="http://www.w3.org/2000/svg" class="circle-chart">
                                <circle stroke="rgba(0, 0, 0, .2)" stroke-width="1" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" class="circle-chart__background"></circle>
                               <!-- <circle stroke="white" stroke-width="1" stroke-dasharray="3,100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" class="circle-chart__circle"></circle>-->
                            </svg>

                        </div>
                    </div>
                    <div class="col-span-3 mr-8 ">
                        <div class="rounded-lg  p-8">
                            <div class="flex justify-between items-center py-2 ">
                                <div class="text-4xl text-white ">{{course.title}}</div>
                            </div>
                            <div class="text-sm text-white py-4 ">{{course.description}}</div>
                            <a :href="'course/'+course.id" class="transition duration-700 ease-in-out    bg-white text-black rounded-lg font-bold  text-white px-2 py-2   text-sm my-5 inline-block rounded hover:text-indigo-900  ">Voir la formation</a>
                            <a :href="'course/'+course.id" class="transition duration-700 ease-in-out bg-indigo-900  rounded-lg font-bold  text-white px-2 py-2  text-sm my-5 inline-block rounded hover:text-black hover:bg-white  ">Ajouter à la liste</a>
                            <div class="grid grid-cols-4 gap-4">
                                <div class="col-span-1 text-sm text-white font-bold" >
                                   <div class="h-4 w-5 inline-block">
                                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                           <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
                                       </svg>
                                   </div>
                                    <div class="inline-block">Débutant</div>

                                </div>
                                <div class="col-span-1 text-sm text-white font-bold">
                                    <div class="h-4 w-5 inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                                        </svg>
                                    </div>
                                    <div class="inline-block">
                                        {{ course.episodes_count}} épisodes
                                    </div>

                                </div>
                                <div class="col-span-2 text-sm text-white font-bold">
                                    <div class="h-4 w-5 inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="inline-block">
                                        Mise en line par{{course.user.name}} - <span class="text-sm" >{{ course.participants  }} participant</span><span class="text-sm" v-if="parseInt(course.participants) > 1" >s</span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
         </div>
     </app-layout>
</template>

<script>
    import AppLayout from "../../Layouts/AppLayout";
    export default {
        name: "Courses",
        props:['courses'],
        data() {
            return {
                courseslist: this.courses
            }
        },
        mounted() {
            console.log(this.courseslist);
        },
        components:{
            AppLayout
        }
    }
</script>

<style scoped>

</style>
