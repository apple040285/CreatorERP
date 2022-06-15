export default {
    namespaced: true,
    state: {
        name: 'John Doe',
    },
    getters: {},
    mutations: {
        UPDATE_NAME(state, val) {
            state.name = val
        },
    },
    actions: {
        updateInfo({ commit }, data) {
            commit('UPDATE_NAME', data.name)
        }
    },
}
