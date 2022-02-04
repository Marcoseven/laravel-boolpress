<template>
    <div class="post">
        <div class="card">
            <img :src="'/storage/' + post.image" alt="" />
            <div class="card-body">
                <h4>{{ post.title }}</h4>
                <a href="'/posts' + post.id" v-if="!isSingle">Vedi Post</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        post: Object,
    },
    mounted() {
        console.log("Component mounted successfully");
    },
};
</script>

<style></style>
