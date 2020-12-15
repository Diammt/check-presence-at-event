import Vue from 'vue'
import Vuex from 'vuex'
import connexion from './modules/connexion.js'
import getters from './getters.js'
import global from './modules/global.js'
import actions from './actions.js'
//import actions from './actions.js'

Vue.use(Vuex)

export default new Vuex.Store({
  getters,
  actions,
  modules: {
    global,
    connexion
  }
})
