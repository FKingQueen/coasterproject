import Vuex from 'vuex'
import { createStore } from 'vuex-extensions'

const store =  createStore(Vuex.Store, { 
    state: {
        isLoggedin: true
    }
})
