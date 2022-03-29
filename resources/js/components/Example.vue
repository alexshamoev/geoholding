<template>
    <div class="p-3 main_vue_component">
        <div class="p-2">
            <h1>{{ title }}</h1>
        </div>
    </div>
</template>

<script>
    export default {
        setup: () => ({
            title: 'How To Install Vue 3 in Laravel 8 From Scratch'
        }),
        props: {
            page: Object,
            title: String,
            likes: Number
        }
    }
</script>