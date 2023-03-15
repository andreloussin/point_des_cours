<template>
  <app-layout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Ajouter des heaures</h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-md sm:rounded-lg">
          <div class="flex flex-col">
            <div class="overflow-x-auto -my-2 sm:-mx-6 lg:-mx-8">
              <div class="inline-block py-2 min-w-full align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200 table-fixed">
                    <thead class="bg-indigo-500">
                      <tr>
                        <th
                          scope="col"
                          class="w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase"
                        >
                          <span
                            class="inline-flex py-3 px-6 w-full justify-between"
                            @click="sort('city')"
                          >
                            NOM
                            <svg
                              v-if="params.field === 'city' && params.direction === 'asc'"
                              xmlns="http://www.w3.org/2000/svg"
                              class="h-4 w-4"
                              viewBox="0 0 20 20"
                              fill="currentColor"
                            >
                              <path
                                d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"
                              />
                            </svg>

                            <svg
                              v-if="params.field === 'city' && params.direction === 'desc'"
                              xmlns="http://www.w3.org/2000/svg"
                              class="h-4 w-4"
                              viewBox="0 0 20 20"
                              fill="currentColor"
                            >
                              <path
                                d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"
                              />
                            </svg>
                          </span>
                        </th>

                        <th
                          scope="col"
                          class="py-3 px-6 w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase"
                        >Heures total</th>

                        <th
                          scope="col"
                          class="py-3 px-6 w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase"
                        >Heures écoulées</th>

                        <th
                          scope="col"
                          class="py-3 px-6 w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase"
                        >Enseignant</th>

                        <th
                          v-if="can_edit"
                          scope="col"
                          class="py-3 px-6 w-3/12 text-xs font-semibold tracking-wider text-left text-white uppercase"
                        >Action</th>
                      </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                      <tr>
                        <td
                          class="py-4 px-6 text-sm font-semibold text-gray-900 whitespace-nowrap"
                        >{{ ecu.nom }}</td>

                        <td
                          class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap"
                        >{{ ecu.masse_horaire_total }}</td>

                        <td
                          class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap"
                        >{{ ecu.masse_horaire_ecoule }}</td>

                        <td
                          class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap"
                        >{{ ecu.nom_enseignant }}</td>

                        <td
                          class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap"
                          v-if="can_edit"
                        >
                          <SecondaryButton type="button" class="mt-2" @click.prevent="edit">
                            <NavLink
                              :href="route('dashboard')"
                              :active="route().current('dashboard')"
                            >Ajouter d'heures</NavLink>
                          </SecondaryButton>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--<pagination class="mt-10" :links="ecus.links" />-->
        <div class="my-8"></div>
        <FormSection @submitted="updateProfileInformation">
          <template #title>Ajouter des heures</template>

          <template #description>Vous ne pouvez pas ajouter plus d'heure qu'il n'est disponible</template>

          <template #form>
            <!-- Name -->
            <div class="col-span-6 sm:col-span-4">
              <InputLabel for="name" value="Name" />
              <TextInput
                id="name"
                type="number"
                min="0"
                :max="params.rest"
                class="mt-1 block w-full"
                autocomplete="name"
                v-model="form.heures"
              />
              <InputError class="mt-2" />
            </div>
          </template>
          <template #actions>
            <PrimaryButton
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >Save</PrimaryButton>
          </template>
        </FormSection>
      </div>
    </div>
  </app-layout>
</template>
  
   

<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import Pagination from "../../Components/Pagination.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import NavLink from "@/Components/NavLink.vue";
import FormSection from "@/Components/FormSection.vue";
import TextInput from "@/Components/TextInput.vue";
import NumberInput from "@/Components/NumberInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm } from "@inertiajs/vue3";
import { resolveDirective } from "vue";
export default {
  components: {
    AppLayout,
    Pagination,
    SecondaryButton,
    NavLink,
    FormSection,
    TextInput,
    NumberInput,
    PrimaryButton
  },
  props: {
    ecu: Object
  },
  data() {
    return {
      params: {
        search: "",
        field: "",
        direction: "",
        rest: this.ecu.masse_horaire_total - this.ecu.masse_horaire_ecoule
      },
      form: useForm({
        _method: "PUT",
        heures: 0
      })
    };
  },
  methods: {
    updateProfileInformation() {
      if (this.form.heures) {
        this.form.post(
          route("ecus.update", {
            ecu_id: this.ecu.id,
            heures: this.form.heures
          }),
          {
            errorBag: "updateProfileInformation",
            preserveScroll: true,
            onSuccess: () => this.clearPhotoFileInput()
          }
        );
      }
    },
    clearPhotoFileInput() {
      this.form.heures = 0;
    }
  }
};
</script>