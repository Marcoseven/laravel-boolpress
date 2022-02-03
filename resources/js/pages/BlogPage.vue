<template>
    <div class="page">
        <div class="error" v-if="error">
            <p>
                Niente da mostrare
            </p>
        </div>
        <div class="loading" v-if="loading">Loading ...</div>
        <div class="post" v-else>
            <img :src="'/storage/' + post.image" alt="">
            <div class="card-body">
                <h4>{{ post.title }}</h4>
                <h6 v-if="post.category">Categoria: {{ post.category.title }}</h6>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            error: false,
            loading: true,
            post: {},
        };
    },
    methods: {
        fetchPost() {
            axios.get('/api/posts/' + this.$route.params.id).then(response => {
                this.post = response.data.data;
                this.loading = false;
            }).catch.error(error => {
                this.error = true
            })
        }
    },
    mounted(){
        this.fetchPost();
    }
};
</script>

<style></style>
