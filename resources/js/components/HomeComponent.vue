<template>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12 ">
                <div class="content p-3 pt-5">
                    <h3>{{ feed.strapline }}</h3>
                    <h2>{{ feed.headline.bold }}</h2>
                    <p>{{ feed.body.paragraph }}</p>
                    <img v-bind:src="feed.pos1.picture['@attributes'].href" alt="image">
                    <h2>{{ feed.pos1.headline.bold }}</h2>
                    <p>{{ feed.pos1.subline }}</p>
                    <ul>
                        <li v-for="item in feed.pos1.body.bulletList.item">
                            {{ item.paragraph }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'home',
    data() {
        return {
            feed: {},
        }
    },
    methods: {
        getFeed() {
            axios.get('/feed')
                .then((response) => {
                    if (response.data.status === true) {
                        this.feed = response.data.result;
                    }
                })
        }
    },
    created() {
        this.getFeed();
    },
}
</script>

<style lang="scss" scoped>
.content {
    h2, h3, p, img {
        padding: 5px;
    }

    h2 {
        font-weight: bold;
    }

    h3 {
        font-weight: 500;
    }

    img {
        width: 200px;
        height: 200px;
        margin-bottom: 10px;
    }
}
</style>
