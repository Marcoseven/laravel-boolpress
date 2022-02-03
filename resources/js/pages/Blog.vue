<template>
    <div class="page">
        <div class="container">
            <h1>Posts</h1>
        </div>
        <div class="loading" v-if="loading">Loading ...</div>
        <posts-list :posts="posts" v-else></posts-list>
    </div>
</template>

<script>
import PostsListComponent from "../components/PostsListComponent.vue";
export default {
    componets: { PostsListComponent },
    data() {
        return {
            loading: true,
            posts: [],
            meta: null,
            links: null,
        };
    },
    methods: {
        fetchPosts() {
            axios.get("api/posts").then((response) => {
                this.posts = response.data.data;
                this.meta = response.data.meta;
                this.links = response.data.links;
                this.loading = false;
            });
        },
    },
    mounted(){
        this.fetchPosts();
    },
};
</script>

<style></style>
