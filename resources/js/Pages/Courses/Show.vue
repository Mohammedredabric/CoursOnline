<template>
<app-layout>
    <template slot="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            List des episodes
        </h2>
    </template>
    <div class="w-full bg-black " style="    margin-top: -15px;">
        <iframe class=" w-full h-screen mt-3 " :src="'https://www.youtube.com/'+courseShow.episodes[currentKey].video_url" allowfullscreen></iframe>
    </div>
    <div class="container mx-auto ">
        <div class="grid grid-cols-1 sm:grid-cols-1 gap-1 mt-4 bg-gradient-to-r from-gray-300 via-gray-800 to-gray-800 rounded-lg py-10 ">
            <div class="flex justify-start px-6  ">
                <img data-src="https://laracasts.s3.amazonaws.com/series/thumbnails/whats-new-in-laravel-8.png" alt="What's New in Laravel 8" class=" tw-left-0 tw-top-0 ls-is-cached " src="https://laracasts.s3.amazonaws.com/series/thumbnails/whats-new-in-laravel-8.png" style="width: 150px; height: 150px; top: calc(50% - 105px); left: calc(50% - 105px);">
                <div class=" text-4xl text-white m-4 sm:grid-cols-1  ">
                    {{courseShow.title}}
                    <div class="grid grid-cols-4 gap-4">
                        <div class="col-span-1 text-sm text-white font-bold">
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
                                {{ courseShow.episodes_count}} épisodes
                            </div>

                        </div>
                        <div class="col-span-2 text-sm text-white font-bold">
                            <div class="h-4 w-5 inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="inline-block">
                                Mise en line par{{courseShow.user.name}}
                            </div>
                        </div>
                    </div>
                    <div class="grid-cols-1	gap-1">
                        <progress-bar class="w-full" :watched="watched" :episodes="course.episodes"></progress-bar>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto mt-4">

        <div class="grid grid-cols-2 gap-5 bg-gradient-to-r from-gray-300 via-gray-800 to-gray-800 rounded-lg py-10">
            <div class="col-span-1 px-6  ">
                <div class="m-auto p-5 rounded-lg bg-white bg-opacity-25 ">

                    <div class="text-md  text-white font-bold  ">{{courseShow.episodes[currentKey].description}}</div>
                </div>
            </div>
            <div class="col-span-1 px-4">
                <ul v-for="(episode,index) in this.courseShow.episodes" :key="index">
                    <li>
                        <div class="bg-white p-2 text-sm rounded my-2 py-2 border-b border-grey cursor-pointer hover:bg-grey-lighter font-bold">
                            <span class=" text-sm uppercase font-bold"> Episode N* {{ index + 1}}</span>
                            {{ episode.title }}
                            <button class="text-xs text-black focus:text-indigo-500 outline-none" @click="switchEpisode(index)">
                                Voir l' épisode </button>
                            <progres-button class="float-right " :episode_id="episode.id" :watched="watched" />

                        </div>
                    </li>

                </ul>
            </div>
        </div>

    </div>
</app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import ProgresButton from "./ProgresButton";
import ProgressBar from './ProgressBar'
export default {
    name: "show",
    props: ['course', 'watched'],
    data() {
        return {
            courseShow: this.course,
            currentKey: 0
        }
    },
    methods: {
        switchEpisode(index) {
            this.currentKey = index;
            window.scroll({
                top: 0,
                left: 0,
                behavior: 'smooth'
            })
        }
    },
    components: {
        AppLayout,
        ProgresButton,
        ProgressBar
    }
}
</script>

<style scoped>

</style>
