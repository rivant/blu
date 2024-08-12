<script setup>
import { reactive } from 'vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
  empire: {
      type: Object,
      required: true,
  },
});

const form = reactive({ ...props.empire });

const updateEmpire = () => {
  Inertia.put(route('empires.update', { id: props.empire.id }), form, {
    onSuccess: () => {
      Inertia.visit(route('empires.show', { id: props.empire.id }));
    }
  });
};

const cancelEdit = () => {
  Inertia.visit(route('empires.show', { id: props.empire.id }));
};
</script>

<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto mt-5">
        <div class="card">
          <div class="card-header">Edit {{ empire.name }}</div>
          <div class="card-body">
            <form @submit.prevent="updateEmpire">
              <div class="form-group mb-4">
                <label for="name">Name</label>
                <input
                  id="empire-name"
                  v-model="form.name"
                  type="text"
                  class="form-control rounded"
                  required
                />
              </div>

              <div class="form-group mb-4">
                <label for="architecture">Architecture</label>
                <input
                  id="architecture"
                  v-model="form.architecture"
                  type="text"
                  class="form-control rounded"
                  required
                />
              </div>

              <div class="form-group mb-4">
                <label for="continent">Continent</label>
                <input
                  id="continent"
                  v-model="form.continent"
                  type="text"
                  class="form-control rounded"
                  required
                />
              </div>

              <div class="form-group mb-4">
                <label for="focus">Focus</label>
                <input
                  id="focus"
                  v-model="form.focus"
                  type="text"
                  class="form-control rounded"
                  required
                />
              </div>

              <div class="form-group mb-4">
                <label for="unique-units">Unique Units</label>
                <input
                  id="unique-units"
                  v-model="form.unique_units"
                  type="text"
                  class="form-control rounded"
                  required
                />
              </div>

              <div class="form-group mb-4">
                <label for="unique-technologies">Unique Technologies</label>
                <input
                  id="unique-technologies"
                  v-model="form.unique_technologies"
                  type="text"
                  class="form-control rounded"
                  required
                />
              </div>

              <div class="form-group mb-4">
                <label for="unique-buildings">Unique Buildings</label>
                <input
                  id="unique-buildings"
                  v-model="form.unique_buildings"
                  type="text"
                  class="form-control rounded"
                />
              </div>

              <button type="button" class="btn btn-primary" @click="updateEmpire">Save</button>
              <button type="button" class="btn btn-secondary" @click="cancelEdit">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
