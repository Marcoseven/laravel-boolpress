<template>
    <section class="posts d-flex flex-wrap justify-content-center">
         <div class="post" :v-for="post in posts">
            <div class="card">
                <img :src="'/storage/' + post.image" alt="">
                <div class="card-body">
                    <h4>{{ post.name }}</h4>
                </div>
            </div>
        </div> 
    </section>
</template>

<script>
export default {
    data(){
        return {
            posts: null,
            loading: true,
            meta: null,
            links: null,
        };
    },
    mounted(){
        axios.get('api/posts').then(response => {
            console.log(response);
            this.posts = response.data.data;
            this.meta = response.data.meta;
            this.links = response.data.links;
            this.loading = false;
        })
        console.log('Component mounted');
    },
};
</script>

<style>
</style>