<template>
  <div id="app">
    <Search class="filters-wrapper"/>
    <ApartmentsList class="apartments-list"/>
  </div>
</template>

<script>

import Search from './components/Search'
import ApartmentsList from './components/ApartmentsList'

export default {
  name: 'App',
  components: {
    ApartmentsList,
    Search,
  },
  async mounted () {
    await this.$store.dispatch('getDictionary')
    await this.$store.dispatch('getApartments')
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
  display: flex;
}

.filters-wrapper {
  padding: 0 15px;
}

.apartments-list {
  width: 100%;
  padding: 0 15px;
}
</style>
