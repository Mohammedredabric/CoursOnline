<template>
<app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </template>

    <div class="py-3">

        <div class="w-full max">
            <div v-if="$page.flash.success" class="bg-green-200 text-green-500 p-3">
                {{ $page.flash.success }}
            </div>
            <form @submit.prevent="submit" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        TIter de la formation
                    </label>
                    <input v-model="form.title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Titer">
               <div class=" text-xs mt-1  text-red-400 " v-if="$page.errors.title">{{$page.errors.title[0]}}</div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Description de la formation
                    </label>
                    <textarea v-model="form.description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="discription" placeholder="Description"></textarea>
                    <div class=" text-xs mt-1  text-red-400  " v-if="$page.errors.description">{{$page.errors.description[0]}}</div>

                </div>

                <div class="mb-4">
                    <h2 class="text-2xl">Episodes de la formation</h2>
                    <div v-for="(episode,index )  in form.episodes" :key="index" >
                       <div class="mb-1">
                           <label class="block text-gray-700 text-sm font-bold mb-2"
                                  for="'title-'+index">
                               TIter de l'épisode n° {{index + 1}}
                           </label>
                           <input v-model="form.episodes[0].title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'title-'+index" type="text" placeholder="Titer de l'épisode">
                           <div class=" text-xs mt-1  text-red-400 " v-if="$page.errors['episodes.'+index+'.title']">{{$page.errors['episodes.'+index+'.title'][0]}}</div>

                       </div>
                        <div class="mb-1">
                            <label class="block text-gray-700 text-sm font-bold mb-2"
                                   for="'description-'+index">
                                Description de l'épisode n° {{index + 1}}
                            </label>
                            <textarea v-model="form.episodes[0].description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'description-'+index" type="text" placeholder="Description de l'épisode">
                            </textarea>
                            <div class=" text-xs mt-1  text-red-400  " v-if="$page.errors['episodes.'+index+'.description']">{{$page.errors['episodes.'+index+'.description'][0]}}</div>
                        </div>
                        <div class="mb-1">
                            <label class="block text-gray-700 text-sm font-bold mb-2"
                                   for="'video_url-'+index">
                                URL de l'épisode n° {{index + 1}}
                            </label>
                            <input v-model="form.episodes[0].video_url" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="'video_url-'+index" type="text" placeholder="URL Video de l'épisode">
                            <div class=" text-xs mt-1 text-red-400 " v-if="$page.errors['episodes.'+index+'.video_url']">{{$page.errors['episodes.'+index+'.video_url'][0]}}</div>

                        </div>
                        <button v-if="index>= 1" @click.prevent="remove(index)" class="bg-red-200 p-1 font-bold my-2   rounded focus:outline-none focus:shadow-outline text-white block w-full" type="button">-</button>
                        <hr class=" my-4 text-center" />

                    </div>
                </div>

                <div class="">
                    <button @click.prevent="Add" class="bg-green-200 px-2 font-bold my-2 py-2 px-4 rounded focus:outline-none focus:shadow-outline text-white block w-full" type="button">+</button>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Créer ma formation
                    </button>

                </div>
            </form>
            <p class="text-center text-gray-500 text-xs">
                &copy;2020 Acme Corp. All rights reserved.
            </p>
        </div>
    </div>
</app-layout>
</template>

<script>
import AppLayout from './../Layouts/AppLayout'
import Button from "../Jetstream/Button";

export default {
    data() {
        return {
            form: {
                title: null,
                description: null,
                episodes: [
                    {title:null, description:null, video_url:null}
                ]
            }
        }
    },
    methods: {
        submit() {
            this.$inertia.post('/courses', this.form);
        },
        Add(){
            this.form.episodes.push({title:null, description:null, video_url:null});
        },
        remove(index){
            this.form.episodes.splice(index,1);
        }
    },
    components: {
        Button,
        AppLayout,
    },
}
</script>
