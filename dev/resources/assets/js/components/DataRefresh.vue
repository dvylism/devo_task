<template>
  <div>
    <label for="dataRefreshTime">Set minutes for COVID-19 data refresh from API</label>
    <input id="dataRefreshTime" type="number" v-model="refreshTime" />
    <button class="btn btn-success ml-2" id="saveData"  v-on:click="sendData(refreshTime)">Save</button>
  </div>

</template>

<script>
export default {
  name: "DataRefresh",
  data: {
    refreshTime: 0
  },
  methods: {
    sendData(value) {
      axios.get(`/setDRT/${value}`, {
      })
    }
  }
}
</script>
