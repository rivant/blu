<script setup>
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
  empire: {
      type: Object,
      required: true,
  },
  success: String
});
const destroyEmpire = () => {
  Inertia.delete(route('empires.destroy', { id: props.empire.id }), {
    onSuccess: () => {
      Inertia.visit(route('empires.index'));
    },
    onError: (error) => {
      console.error('Error deleting empire:', error);
    }
  });
};
</script>

<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div v-if="success" class="alert alert-success" role="alert">
            {{ success }}
          </div>
          <div class="card-header">
            <h3 class="d-inline text-primary"><strong>{{ empire.name }} Empire</strong> | </h3>
            <a :href="route('empires.index', { id: empire.id })" class="underline">Return to List</a>
          </div>
          <div class="card-body">
            <p class="card-text text-success">Release: <strong class="text-primary">{{ empire.release.name }} ({{ empire.release.release_date }})</strong></p>
            <p class="card-text text-success">Architecture: <strong class="text-primary">{{ empire.architecture }}</strong></p>
            <p class="card-text text-success">Continent: <strong class="text-primary">{{ empire.continent }}</strong></p>
            <p class="card-text text-success">Focus: <strong class="text-primary">{{ empire.focus }}</strong></p>
            <p class="card-text text-success">Unique Units: <strong class="text-primary">{{ empire.unique_units }}</strong></p>
            <p class="card-text text-success">Unique Technologies: <strong class="text-primary">{{ empire.unique_technologies }}</strong></p>
            <p class="card-text text-success">Unique Buildings: <strong class="text-primary">{{ empire.unique_buildings }}</strong></p>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-md-5 text-center">
                <a :href="route('empires.edit', { id: empire.id })" class="underline">Update</a>
              </div>
              <div class="col-md-2 text-center">|</div>
              <div class="col-md-5 text-center">
                <a href="#" class="underline" @click="destroyEmpire">Remove</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
