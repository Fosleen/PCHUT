import { createStore } from "vuex";
import axiosClient from "../axios";

const store = createStore({
  state: {
    user: {
      data: {},
      token: sessionStorage.getItem("access_token"),
    },
    currentProduct: {
      loading: false,
      data: {},
    },
  },
  getters: {},
  actions: {
    register({ commit }, user) {
      return axiosClient.post("/register", user).then(({ data }) => {
        commit("setUser", data);
        return data;
      });
    },

    login({ commit }, user) {
      return axiosClient.post("/login", user).then(({ data }) => {
        commit("setUser", data);
        return data;
      });
    },

    getProduct({ commit }, id) {
      commit("setCurrentProductLoading", true);
      return axiosClient
        .get(`/keyboards/${id}`)
        .then((res) => {
          commit("setProduct", res.data); // calls mutation
          commit("setCurrentProductLoading", false);
          return res;
        })
        .catch((err) => {
          commit("setCurrentProductLoading", false);
          throw err;
        });
    },
  },
  mutations: {
    setUser: (state, userData) => {
      state.user.token = userData.token;
      state.user.data = userData.user;
      localStorage.setItem("access_token", userData.token);
    },

    setProduct: (state, product) => {
      state.currentProduct.data = product.data;
    },

    setCurrentProductLoading: (state, loading) => {
      state.currentProduct.loading = loading;
    },
  },
  modules: {},
});

export default store;
