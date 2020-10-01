<template>
<div>
    <button @click="toggeleProgress" class="transition duration-700 ease-in-out bg-indigo-900  rounded-lg font-bold  text-white p-1  text-sm  rounded-md hover:text-black hover:bg-white">
        {{ this.is_watched ? 'Terminé':'Terminé ?' }}

    </button>
</div>
</template>

<script>
export default {
    name: "ProgresButton",
    props: ['episode_id', 'watched'],
    data() {
        return {
            watchedEp: this.watched,
            is_watched: null
        }
    },
    methods: {
        toggeleProgress() {
            axios.post('/toggeleProgress', {
                epissode_id: this.episode_id
            }).then(res => {
                if (res.status === 200) {
                    this.is_watched = !this.is_watched
                    eventBus.$emit('toggeleProgress', res.data);
                }
            }).catch(error => console.log(error));
        },
        is_watchedEp() {
            return this.watchedEp.find(el => el.id == this.episode_id) ? true : false;
        },
    },
    mounted() {
        this.is_watched = this.is_watchedEp();
    }
}
</script>

<style scoped>

</style>
