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
            <h1 class="quote">
                "{{ quote.quote }}"
            </h1>
            <div class="pill">
                💬 {{ quote.character_name }}
            </div>
            <div class="pill">
                🎬 {{ quote.movie_name }}
            </div>
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
.quote {
    font-size: x-large;
    margin: 2rem;
    margin-left: inherit;
}

.pill {
    background-color: #ddd;
    border: none;
    color: black;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    margin: 4px 2px;
    border-radius: 16px;
}

.vote-icons {
    margin: 2rem;
    margin-left: inherit;

    .icon {
        font-size: x-large;
        cursor: pointer;
        min-width: 3rem;

        &.active{
            font-size: xxx-large;
        }
    }

    .count {
        font-size: x-large;
        margin: 2rem;
    }
}
</style>
