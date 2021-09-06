<template>
  <div>
    <h3>Filters</h3>
    <div class="filters">
      <div class="filter">
        <el-input placeholder="Name" v-model="filters.name"></el-input>
      </div>
      <div class="filter">
        <el-select clearable v-model="filters.bedrooms" placeholder="Bedrooms">
          <el-option
              v-for="(item, index) in dictionary.bedrooms"
              :key="index"
              :label="item"
              :value="item">
          </el-option>
        </el-select>
      </div>
      <div class="filter">
        <el-select clearable v-model="filters.bathrooms" placeholder="Bathrooms">
          <el-option
              v-for="(item, index) in dictionary.bathrooms"
              :key="index"
              :label="item"
              :value="item">
          </el-option>
        </el-select>
      </div>
      <div class="filter">
        <el-select clearable v-model="filters.storeys" placeholder="Storeys">
          <el-option
              v-for="(item, index) in dictionary.storeys"
              :key="index"
              :label="item"
              :value="item">
          </el-option>
        </el-select>
      </div>
      <div class="filter">
        <el-select clearable v-model="filters.garages" placeholder="Garages">
          <el-option
              v-for="(item, index) in dictionary.garages"
              :key="index"
              :label="item"
              :value="item">
          </el-option>
        </el-select>
      </div>

      <div class="filter slider" v-if="sliderMinPrice && sliderMaxPrice">
        <span>Price</span>
        <el-slider v-model="filters.price"
                   range
                   :min="sliderMinPrice"
                   :max="sliderMaxPrice">
        </el-slider>
      </div>
      <el-button type="primary" @click="search">Search</el-button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Search',
  data () {
    return {
      filters: {
        name: null,
        bedrooms: null,
        bathrooms: null,
        storeys: null,
        garages: null,
        price: [100000, 5000000],
      },
    }
  },
  computed: {
    dictionary () {
      return this.$store.state.dictionary
    },
    sliderMinPrice () {
      return this.dictionary?.price?.[0] || 0
    },
    sliderMaxPrice () {
      return this.dictionary?.price?.[1] || 1000000
    },
  },
  methods: {
    search () {

      let filterData = {}

      for (const filterKey in this.filters) {
        if (this.filters[filterKey]) {
          filterData[filterKey] = this.filters[filterKey]
        }
      }

      this.$store.dispatch('getApartments', filterData)
    }
  }
}
</script>

<style scoped>

.filters {
  display: flex;
  flex-flow: column;
  justify-content: center;
}

.filter {
  display: flex;
  flex-flow: column;
  margin-bottom: 10px;
}

.filter.slider {
  min-width: 300px;
}

h3 {
  text-align: left;
}
</style>
