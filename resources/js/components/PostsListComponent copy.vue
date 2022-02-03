<template>
    <section class="posts d-flex flex-wrap justify-content-center">
         <div class="post" :v-for="post in posts">
            <div class="card">
                <img :src="'/storage/' + post.image" alt="">
                <div class="card-body">
                    <h4>{{ post.name }}</h4>
                    <router-link :to="'/posts/' + post.id">Vedi post</router-link>
                </div>
            </div>
        </div> 
    </section>
</template>

<script>
export default {
    props: {
        posts: Array
    },
};
</script>

<style>
</style>