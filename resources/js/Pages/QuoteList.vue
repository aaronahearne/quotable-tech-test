<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import QuoteCard from "@/Components/QuoteCard.vue";
</script>

<script>
export default {
    computed: {
        orderedQuotes() {
            return this.quotes.sort((a, b) => {
                return b.upvotes - a.upvotes;
            })
        }
    },
    data() {
        return {
            quotes: [],
        }
    },
    methods: {
        getQuotes() {
            axios.get('/quotes').then((response) => {
                this.quotes = response.data['data'];
            });
        },
    },
    created() {
        this.getQuotes();
    }
}
</script>

<template>
    <AppLayout title="QuoteList">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-xl sm:rounded-lg  mb-8" v-for="quote in orderedQuotes">
                    <QuoteCard
                        v-if="orderedQuotes.length > 0"

                        :quote="quote"
                        @quote-voted="getQuotes()"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
