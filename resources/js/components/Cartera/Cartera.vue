<template>
    <b-container fluid>
        <!-- User Interface controls -->
        <b-row>
            <b-col sm="6" md="6" class="my-1">
                <b-form-group
                    label="Per page"
                    label-cols-sm="6"
                    label-cols-md="4"
                    label-cols-lg="3"
                    label-align-sm="right"
                    label-size="sm"
                    label-for="perPageSelect"
                    class="mb-0"
                >
                    <b-form-select
                        v-model="perPage"
                        id="perPageSelect"
                        size="sm"
                        :options="pageOptions"
                    ></b-form-select>
                </b-form-group>
            </b-col>
        </b-row>

        <!-- Main table element -->
        <b-table show-empty small stacked="md" :items="items" :fields="fields" :current-page="currentPage" :per-page="perPage"
                 :filter="filter" :filterIncludedFields="filterOn" :sort-by.sync="sortBy" :sort-desc.sync="sortDesc"
                 :sort-direction="sortDirection" @filtered="onFiltered"
        >
    
            <template v-slot:cell(actions)="row">
                <b-button size="sm" @click="info(row.item, row.index, $event.target)" class="mr-1">
                    Info modal
                </b-button>
                <b-button size="sm" @click="row.toggleDetails">
                    {{ row.detailsShowing ? 'Hide' : 'Show' }} Details
                </b-button>
            </template>

            <template v-slot:row-details="row">
                <b-card>
                    <ul>
                        <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
                    </ul>
                </b-card>
            </template>
        </b-table>

        <b-row>
            <b-col sm="6" md="6" offset="6" class="my-1">
                <b-pagination
                    v-model="currentPage"
                    :total-rows="totalRows"
                    :per-page="perPage"
                    align="fill"
                    size="sm"
                    class="my-0"
                ></b-pagination>
            </b-col>
        </b-row>


        <!-- Info modal -->
        <b-modal :id="infoModal.id" :title="infoModal.title" ok-only @hide="resetInfoModal">
            <pre>{{ infoModal.content }}</pre>
        </b-modal>

    </b-container>
</template>

<script>
    export default {
        name: "Cartera",
        data() {
            return {
                items: [],
                fields: [
                    {key: 'nro_obligacion', label: 'Factura', sortable: true, sortDirection: 'desc'},
                    {key: 'proveedor', label: 'Proveedor', sortable: true, class: 'text-center'},
                    {key: 'NIT', label: 'Nit', sortable: true, class: 'text-center'},
                    {key: 'actions', label: 'Actions'}
                ],
                totalRows: 1,
                currentPage: 1,
                perPage: 10,
                pageOptions: [10, 15, 20],
                sortBy: '',
                sortDesc: false,
                sortDirection: 'asc',
                filter: null,
                filterOn: [],
                infoModal: {
                    id: 'info-modal',
                    title: '',
                    content: ''
                }
            }
        },
        computed: {
            sortOptions() {
                // Create an options list from our fields
                return this.fields
                    .filter(f => f.sortable)
                    .map(f => {
                        return {text: f.label, value: f.key}
                    })
            }
        },
        mounted() {
            // Set the initial number of items
            this.totalRows = this.items.length
        },
        methods: {
            info(item, index, button) {
                this.infoModal.title = `Row index: ${index}`
                this.infoModal.content = JSON.stringify(item, null, 2)
                this.$root.$emit('bv::show::modal', this.infoModal.id, button)
            },
            resetInfoModal() {
                this.infoModal.title = ''
                this.infoModal.content = ''
            },
            onFiltered(filteredItems) {
                // Trigger pagination to update the number of buttons/pages due to filtering
                this.totalRows = filteredItems.length
                this.currentPage = 1
            },
            fetchDataProviders() {
                let url = "http://ocbp.hosvital.api/api/v1/getproviderswalletname";

                axios.get(url)
                    .then(response => {
                        this.items = response.data;
                        this.totalRows = this.items.length
                    })
                    .catch(err => {
                        console.log(err);
                    })
            }
        },
        created() {
            this.fetchDataProviders();
        }
    }
</script>

<style scoped>

</style>
