import Vue from 'vue'
import Vuex from 'vuex'
import getters from './getters.js'
import actions from './actions.js'

import connexion from './modules/connexion.js'
import global from './modules/global.js'
import header from './modules/header.js'

Vue.use(Vuex)

export default new Vuex.Store({
  getters,
  actions,
  modules: {
    global,
    connexion,
    header
  }
})
