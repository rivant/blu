<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
  releases: Array,
});
const form = useForm({
  name: '',
  architecture: '',
  continent: '',
  focus: '',
  unique_units: '',
  unique_technologies: '',
  unique_buildings: '',
  release_id: ''
});

const submit = () => {
    form.post(route('empires.store'), {
        onFinish: () => form.reset(
          'name', 'architecture', 'continent', 'focus', 'unique_units', 'unique_technologies', 'unique_buildings'
        ),
    });
};

const cancelCreate = (event) => {
  event.preventDefault();
  Inertia.visit(route('empires.index'));
};
</script>

<template>
  <GuestLayout>
    <Head title="Create An Empire" />

    <form @submit.prevent="submit">
      <div class="form-group">
        <label for="release">Release</label>
        <select v-model="form.release_id" id="release" class="mt-1 mb-3 form-control" style="height: 2.75rem;">
          <option value="" disabled>Select a release</option>
          <option v-for="release in releases" :key="release.id" :value="release.id">
            {{ release.name }} ({{ release.release_date }})
          </option>
        </select>
      </div>

      <div>
        <InputLabel for="name" value="Name" />
        <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required />
        <InputError class="mt-2" :message="form.errors.name" />
      </div>

      <div class="mt-4">
        <InputLabel for="architecture" value="Architecture" />
        <TextInput id="architecture" type="text" class="mt-1 block w-full" v-model="form.architecture" required />
        <InputError class="mt-2" :message="form.errors.architecture" />
      </div>

      <div class="mt-4">
        <InputLabel for="continent" value="Continent" />
        <TextInput id="continent" type="text" class="mt-1 block w-full" v-model="form.continent" required />
        <InputError class="mt-2" :message="form.errors.continent" />
      </div>

      <div class="mt-4">
        <InputLabel for="focus" value="Focus" />
        <TextInput id="focus" type="text" class="mt-1 block w-full" v-model="form.focus" required />
        <InputError class="mt-2" :message="form.errors.focus" />
      </div>

      <div class="mt-4">
        <InputLabel for="unique_units" value="Unique Units" />
        <TextInput id="unique_units" type="text" class="mt-1 block w-full" v-model="form.unique_units" required />
        <InputError class="mt-2" :message="form.errors.unique_units" />
      </div>

      <div class="mt-4">
        <InputLabel for="unique_technologies" value="Unique Technologies Units" />
        <TextInput id="unique_technologies" type="text" class="mt-1 block w-full" v-model="form.unique_technologies" required />
        <InputError class="mt-2" :message="form.errors.unique_technologies" />
      </div>
      
      <div class="mt-4">
        <InputLabel for="unique_buildings" value="Unique Buildings" />
        <TextInput id="unique_buildings" type="text" class="mt-1 block w-full" v-model="form.unique_buildings" />
        <InputError class="mt-2" :message="form.errors.unique_buildings" />
      </div>

      <div class="flex items-center justify-between mt-4">
        <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Add
        </PrimaryButton>
        <button class="ms-4 btn btn" @click="cancelCreate">Cancel</button>
      </div>
    </form>
  </GuestLayout>
</template>
