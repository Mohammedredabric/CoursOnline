<template>
<div>
    <div class="relative pt-1">
        <div class="flex mb-2 items-center justify-between">
            <div>
                <span class="text-xs font-black font-semibold inline-block py-1 px-2 uppercase rounded-full text-gray-600 bg-gray-200">
                    {{percentageText}}
                </span>
            </div>
            <div class="text-right">
                <span class="text-xs font-semibold inline-block text-withe">
                    {{percentage}}%
                </span>
            </div>
        </div>
        <div class="overflow-hidden h-2 mb-4 text-xs text-black flex rounded bg-gray-200 ">
            <div :style="{width:percentage+'%'}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500 transition-width duration-500"></div>
        </div>

    </div>
</div>
</template>

<script>
export default {
    name: 'ProgressBar',
    props: ['watched', 'episodes'],
    data() {
        return {
            watchedData: this.watched
        }
    },
    computed: {
        percentage() {
            let filtersEp = this.episodes.filter(el => {
                return this.watchedData.find(w => {
                    return w.id == el.id;
                })
            })
            return Math.ceil((filtersEp.length / this.episodes.length) * 100);
        },
        percentageText() {
            if (this.percentage == 100) return 'Terminé';
            else return 'En cours'
        }
    },
    mounted() {
        eventBus.$on('toggeleProgress', data => this.watchedData = data);
    }
}
</script>

<style scoped>

</style>
