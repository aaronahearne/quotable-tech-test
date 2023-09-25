<script>
export default {
    props: {
        key: Number,
        quote: Object, // this could be stricter typed
    },
    methods: {
        vote(positive) {
            axios.post('/quote/' + this.quote.id + '/vote', {
                positive: positive
            }).then(() => {
                this.$emit('quote-voted');
            });
        }
    }
}
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <h1>
                {{ quote.quote }}
            </h1>
            <h2> - {{ quote.character_name }}, {{ quote.movie_name }}</h2>
            <div class="vote-icons">
                <div>
                    <button
                        class="icon bg-blue"
                        @click="vote(true)"
                        :class="{ active: quote.user_vote === true}"
                    >👍</button>
                    <span class="count">
                        {{ quote.upvotes }}
                    </span>
                </div>
                <div>
                    <button
                        class="icon bg-blue"
                        @click="vote(false)"
                        :class="{ active: quote.user_vote === false}">
                        👎
                    </button>
                    <span class="count">
                        {{ quote.downvotes }}
                    </span>
                </div>
            </div>

        </div>
    </div>
</template>

<style>
.vote-icons {
    margin: 2rem;

    .icon {
        font-size: x-large;
        cursor: pointer;
        min-width: 3rem;

        &.active{
            font-size: xx-large;
        }
    }

    .count {
        font-size: x-large;
        margin: 2rem;
    }
}
</style>
