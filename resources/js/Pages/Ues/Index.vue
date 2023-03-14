<template>
  <app-layout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">UES</h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="mb-4 max-w-xs">
          <input
            type="search"
            v-model="params.search"
            aria-label="Search"
            placeholder="Search..."
            class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          />
        </div>

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
                            @click="sort('nom')"
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
                        >Action</th>
                      </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                      <tr v-for="(ecu) in ecus.data" :key="ecu.id">
                        <td
                          class="py-4 px-6 text-sm font-semibold text-gray-900 whitespace-nowrap"
                        >{{ ecu.nom }}</td>

                        <td
                          class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap"
                        >{{ ecu.masse_horaire_total }}</td>

                        <td
                          class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap"
                        >{{ ecu.masse_horaire_ecoule }}</td>

                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap">
                          <SecondaryButton type="button" class="mt-2" @click.prevent="edit">
                            <NavLink
                              :href="route('dashboard')"
                              :active="route().current('dashboard')"
                            >Ouvrir</NavLink>
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
      </div>
    </div>
  </app-layout>
</template>
  
   

<script>
import AppLayout from "../../Layouts/AppLayout.vue";
import Pagination from "../../Components/Pagination.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import NavLink from "@/Components/NavLink.vue";
export default {
  components: {
    AppLayout,
    Pagination,
    SecondaryButton,
    NavLink
  },
  props: {
    ecus: Object
  },
  data() {
    return {
      params: {
        search: "",
        field: "",
        direction: ""
      }
    };
  },
  methods: {
    edit() {
      console.log("test");
    }
  }
};
</script>