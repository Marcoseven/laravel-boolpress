<template>
    <div class="container">
        <div>
            <h1>Blog</h1>
            <posts-list></posts-list>
        </div>
    </div>
</template>

<script>
import PostsListComponentVue from "../components/PostsListComponent.vue";
export default {
    components: { PostsListComponentVue },
};
</script>

<style></style>
