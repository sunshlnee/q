<template>
  <div>
    <v-select :options="inf" v-model="selectedValue" />
  </div>
</template>

<script>
import VSelect from '@alfsnd/vue-bootstrap-select'

export default {
  name: 'app',
  props: ['inf'],
  components: {
    VSelect
  },
  data() {
    return {
      selectedValue: null,
      infm: null
    };
  }
}
</script>

<style>

</style>
