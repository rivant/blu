<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    empires: {
        type: Array,
        required: true,
    },
    success: String 
});
</script>

<template>
  <GuestLayout>
    <Head title="Empires" />
    <div v-if="success" class="alert alert-success" role="alert">
      {{ success }}
    </div>
    <div class="mb-2">
      <span>Current Empires | </span>
      <span>
        <Link
             :href="route('empires.create')"
             class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
         >
             Add Empire
        </Link>
      </span>
      <hr />
    </div>
    <div>
      <ul v-if="empires.length">
        <li v-for="empire in empires" :key="empire.id">
          <Link :href="route('empires.show', { id: empire.id })"
             class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
          >
            <strong>{{ empire.name }}</strong> - {{ empire.architecture }}
          </Link>
        </li>
      </ul>
      <p v-else>No empires found.</p>
    </div>

    <div class="flex items-center justify-end mt-4">
    </div>
  </GuestLayout>
</template>
