<template>
    <Daerah_Show :daerah="daerah">
        <div class="mt-10 mt-lg-8">
            <span> qaisar al zikra </span>
            {{ daerah.nama_daerah }}
        </div>
    </Daerah_Show>
</template>

<script setup>
import Daerah_Show from '../Daerah_Show.vue';

defineProps({
daerah: Object,
});
</script>

<style lang="scss" scoped>

</style>