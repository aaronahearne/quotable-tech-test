<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import QuoteCard from "@/Components/QuoteCard.vue";
</script>

<script>
export default {
    props: {
        quotes: Array,
    }
}
</script>

<template>
    <AppLayout title="QuoteList">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Quotable
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <QuoteCard v-for="quote in quotes" :quote="quote"/>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
