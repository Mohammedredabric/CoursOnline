<template>
    <app-layout>
        <template slot="header">
            <h6>List des episodes</h6>
            <div class="py-4 mx-8">
                <div class="text-2xl text-gray-400 ">{{courseShow.episodes[currentKey].title}}</div>
                <iframe class=" w-full h-screen mt-3 " :src="'https://www.youtube.com/'+courseShow.episodes[currentKey].video_url" allowfullscreen></iframe>
                <div class="  bg-white rounded mt-6 ">
                    <div class="text-sm text-gray-400 ">{{courseShow.episodes[currentKey].description}}</div>
                </div>
                <div class="mt-6">
                    <ul v-for="(episode,index) in this.courseShow.episodes" :key="index">
                        <li class="mt-3">
                            Episode N* {{ index + 1}} - {{ episode.title }}
                            <button class="text-gray-400 focus:text-indigo-500 outline-none" @click="switchEpisode(index)">
                                Voir l'épisode
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </template>
    </app-layout>
</template>

<script>
    import AppLayout from "../../Layouts/AppLayout";
    export default {
        name: "show",
        props:['course'],
        data() {
            return {
                courseShow:this.course,
                currentKey:0
            }
        },
        methods:{
            switchEpisode(index){
            this.currentKey=index;
            window.scroll({
                top:0,
                left:0,
                behavior:'smooth'
            })
            }
        },
        components:{
            AppLayout
        }
    }
</script>

<style scoped>

</style>
