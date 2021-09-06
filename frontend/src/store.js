import axios from 'axios'

const baseUrl = 'http://localhost:8003/api'

export default {
  state: {
    apartments: [],
    dictionary: [],
    loader: false,
  },
  mutations: {
    GET_APARTMENTS (state, payload) {
      state.apartments = payload
    },
    GET_DICTIONARY (state, payload) {
      state.dictionary = payload
    },
  },
  actions: {
    async getApartments ({commit, state}, payload) {
      state.loader = true
      const apartments = await axios.get(`${baseUrl}/search`, {
        params: payload
      })

      setTimeout(() => {
        commit('GET_APARTMENTS', apartments.data)
        state.loader = false
      }, 1000)
    },

    async getDictionary ({commit}) {
      const dictionary = await axios.get(`${baseUrl}/dictionary`)

      commit('GET_DICTIONARY', dictionary.data)
    },
  },
}
