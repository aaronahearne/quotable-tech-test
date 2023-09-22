<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<script>
export default {
    props: {
        quote: Object,
    },
    computed: {
        upvotes() {
            return this.quote.user_quote_votes.filter((user_quote_vote) => user_quote_vote.positive).length;
        },
        downvotes(){
            return this.quote.user_quote_votes.filter((user_quote_vote) => !user_quote_vote.positive).length;
        }
    }
}
</script>

<template>
    <div>
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <p>
                {{ quote.quote }}
            </p>
            <p> - {{ quote.character_name }}, {{ quote.movie_name }}</p>
            <div class="vote-icons">
                <div class="vote-up">
                    <span>👍</span>
                    <span>
                        {{ upvotes }}
                    </span>
                </div>
                <div class="vote-icon vote-down">
                    <span>👎</span>
                    <span>
                        {{ downvotes }}
                    </span>
                </div>
            </div>

        </div>

    </div>
</template>
