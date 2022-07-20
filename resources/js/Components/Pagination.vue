<template>
    <div v-if="links.length > 3">
        <div class="mx-3">
            <template v-for="(link, p) in links" :key="p">
                <div v-if="link.url === null" class="btn btn-outline-secondary btn-sm"
                    v-html="link.label" />
                <inertia-link v-else
                    class="btn btn-outline-primary btn-sm"
                    :class="{ 'btn btn-primary text-dark btn-sm': link.active }" :href="link.url" v-html="link.label" />
            </template>
        </div>
    </div>
</template>
<script>
import {InertiaLink} from "@inertiajs/inertia-vue3";
    export default {
        props: {
            links: Array
        },
        components:{
            InertiaLink
        }
    }
</script>