<template>
     <app-layout>
         <template slot="header">
             <h6>Training List</h6>
         </template>
         <div class="py-3" v-for="course in this.courseslist" :key="course.id">
            <div class=" mx-4 bg-white rounded p-4 ">
                <div class="flex justify-between items-center ">
                    <div class="text-3xl ">{{course.title}}</div>
                    <div class="text-sm text-gray-400 ">25 Episods</div>
                </div>
            <div class="text-sm text-gray-400 ">{{course.description}}</div>
            <a href="#" class="bg-indigo-500 text-white px-2 py-1  text-sm mt-3 inline-block rounded hover:bg-indigo-600  ">Voir la formation</a>
            </div>
         </div>
         <h1>Courses</h1>
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
