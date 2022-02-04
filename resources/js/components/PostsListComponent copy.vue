<template>
    <section class="container posts">
        <div class="row d-flex flex-wrap justify-content-center">
            <div class="col-3" v-for="post in posts" :key="post.id">
                <div class="card">
                    <img :src="'/storage/' + post.image" alt="" />
                    <div class="card-body">
                        <h4>{{ post.title }}</h4>
                        <router-link :to="'/blog/' + post.id" class="btn"
                            >Vedi post</router-link
                        >
                    </div>
                </div>
            </div>
        </div>
        <div class="pagination d-flex justify-content-center">
            <span class="btn" @click="prevPage" v-if="meta.currentPage > 1"
                >Precedente</span
            >
            <span class="btn"></span>
            <span
                class="btn"
                @click="nextPage"
                v-if="meta.currentPage != meta.lastPage"
                >Prossima</span
            >
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            posts: null,
        };
    },

    methods: {
        fetchPosts() {
            axios.get("/api/posts").then((response) => {
                this.posts = response.data.data;
                console.log("Component mounted successfully");
            });
        },
    },

    mounted() {
        this.fetchPosts();
    },
};
</script>

<style>
</style>
