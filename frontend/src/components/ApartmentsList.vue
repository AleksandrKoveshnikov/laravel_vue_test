<template>
  <div>
    <h1>Apartments</h1>
    <div class="table-wrapper">
      <transition name="fade">
        <div class="loader" v-if="$store.state.loader">Loading...</div>
      </transition>
      <el-table
          :data="apartments"
          stripe
          style="width: 100%"
          empty-text="Data not found"
      >
        <el-table-column
            prop="name"
            label="Name"
            width="180">
        </el-table-column>
        <el-table-column
            prop="price"
            label="Price"
            width="180">
        </el-table-column>
        <el-table-column
            prop="bedrooms"
            label="Bedrooms">
        </el-table-column>
        <el-table-column
            prop="bathrooms"
            label="Bathrooms">
        </el-table-column>
        <el-table-column
            prop="storeys"
            label="Storeys">
        </el-table-column>
        <el-table-column
            prop="garages"
            label="Garages">
        </el-table-column>
      </el-table>
    </div>
  </div>
</template>

<script>

export default {
  name: 'ApartmentsList',

  computed: {
    apartments () {
      return this.$store.state.apartments
    }
  },
}
</script>

<style scoped>
h1 {
  text-align: left;
}

.table-wrapper {
  position: relative;
}

.loader {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: rgba(255, 255, 255, 0.85);
  z-index: 1;
  display: flex;
  justify-content: center;
  align-items: center;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */
{
  opacity: 0;
}
</style>
