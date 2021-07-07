<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <link href="{{asset("css/custom.css")}}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>
<body>
<div id="app">
    <v-app id="inspire">
        <v-card>
            <v-card-title>
                <v-text-field
                        v-model="search"
                        label="Search"
                        single-line
                        hide-details
                ></v-text-field>
            </v-card-title>
            <v-data-table
                    :headers="headers"
                    :items="countries"
                    :expanded.sync="expanded"
                    show-expand
                    single-expand
                    item-key="name"
                    :search="search">
                <template v-slot:expanded-item="{ headers, item }">
                    <td :colspan="headers.length">
                        <div class="row sp-details">
                            <div class="col-4 text-left mt-3">
                                <v-img :src="item.flag" :alt="item.name" width="80" height="50px"></v-img>
                                <p>Country ID @{{item.country_id}}</p>
                                <p>Cases @{{item.cases}}</p>
                                <p>Deaths @{{item.deaths}}</p>
                                <p>Recovered @{{item.recovered}}</p>
                                <p>Active cases @{{item.active}}</p>
                                <p>Critical @{{item.critical}}</p>
                            </div>
                            <div class="col-4 text-left mt-3">
                                <p>Cases per 1 million @{{item.cases_per_one_million}}</p>
                                <p>Deaths per 1 million @{{item.deaths_per_one_million}}</p>
                                <p>Tests @{{item.tests}}</p>
                                <p>Tests per 1 million @{{item.tests_per_one_million}}</p>
                                <p>Population @{{item.population}}</p>
                                <p>Critical per one people @{{item.critical_per_one_million}}</p>
                                <p>Recovered per one people @{{item.recovered_per_one_million}}</p>
                            </div>
                            <div class="col-4 text-left mt-3">
                                <p>One case per people @{{item.one_case_per_people}}</p>
                                <p>One death per people @{{item.one_death_per_people}}</p>
                                <p>One test per people @{{item.one_test_per_people}}</p>
                                <p>Active per one people @{{item.active_per_one_million}}</p>
                            </div>
                        </div>
                    </td>
                </template>
            </v-data-table>
        </v-card>
    </v-app>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.js"
        integrity="sha512-otOZr2EcknK9a5aa3BbMR9XOjYKtxxscwyRHN6zmdXuRfJ5uApkHB7cz1laWk2g8RKLzV9qv/fl3RPwfCuoxHQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script>
    new Vue({
        el: '#app',
        vuetify: new Vuetify(),
        data() {
            return {
                search: '',
                expanded: [],
                headers: [
                    {text: 'Country', value: 'name'},
                    {text: 'Continent', value: 'continent'},
                    {text: 'Today cases', value: 'today_cases'},
                    {text: 'Today deaths', value: 'today_deaths'},
                    {text: 'Active cases', value: 'active'},
                    {text: 'Today recovered', value: 'today_recovered'},
                ],
                countries: []
            }
        },
        created: function () {
            this.fetchData();
        },
        methods: {
            fetchData: function () {
                const self = this;
                const apiURL = '/list';
                axios.get(apiURL)
                    .then(function (response) {
                        data = response['data'];
                        self.countries = data;
                        // console.log(self._data);
                    });
            }
        }
    })
</script>
</body>
</html>