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
    <div class="p-6 lg:p-8 border-b border-gray-200 quote-card">
        <h1 class="quote">
            "{{ quote.quote }}"
        </h1>
        <div class="pill">
            💬 {{ quote.character_name }}
        </div>
        <div class="pill">
            🎬 {{ quote.movie_name }}
        </div>

        <div class="mb-10 vote-icons" style="margin-top: 1rem">
            <button class="icon text-3xl">
                ❤️
            </button>
            <span class="count">
                    {{ quote.upvotes - quote.downvotes }}
                </span>
        </div>

        <div class="vote-icons">
            <div>
                <button
                    class="icon"
                    @click="vote(true)"
                    :class="{ active: quote.user_vote === true}"
                >👍
                </button>
                <span class="count">
                    {{ quote.upvotes }}
                </span>
            </div>
            <div>
                <button
                    class="icon"
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
</template>

<style>
.quote-card {
    background-color: #FCF6F5;
}

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
