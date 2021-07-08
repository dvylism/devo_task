<template>
  <div>
    <label for="dataRefreshTime">Set minutes for COVID-19 data refresh from API</label>
    <input id="dataRefreshTime" type="number" v-model="refreshTime"/>
    <button class="btn btn-success ml-2" id="saveData" v-on:click="sendData(refreshTime)">Save</button>
    <div>
      <span v-html="interval"></span>
    </div>
  </div>
</template>

<script>
export default {
  name: "RefreshForm",
  data() {
    return {
      refreshTime: 0,
      interval: ""
    }
  },
  methods: {
    sendData(value) {
      axios.get(`/setDRT/${value}`, {})
    },
  },
  created() {
    let self = this;
    axios.get('/getDRT').then(function (response) {
      self.interval = `Current time refreshing interval: ${response.data} minutes`;
    });
  }
}
</script>

<style scoped>

</style>