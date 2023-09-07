import { createStore } from "vuex";
import axiosClient from "../axios";

const store = createStore({
  state: {
    user: {
      data: {},
      token: sessionStorage.getItem("access_token"),
      cart: sessionStorage.getItem("cart"),
      orders: {},
    },
    currentProduct: {
      loading: false,
      data: {},
    },
    filter: {
      isOpen: false,
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

    getProduct({ commit }, { id, productable_type }) {
      commit("setCurrentProductLoading", true);
      let apiUrl = `/${productable_type.toLowerCase()}s/${id}`;

      return axiosClient
        .get(apiUrl)
        .then((res) => {
          console.log(res);

          commit("setProduct", res.data);
          commit("setCurrentProductLoading", false);
          return res;
        })
        .catch((err) => {
          commit("setCurrentProductLoading", false);
          throw err;
        });
    },

    getOrdersByUser({ commit }, { id }) {
      let apiUrl = `/user-orders/${id}`;
      return axiosClient
        .get(apiUrl)
        .then((res) => {
          const ordersData = res.data.orders;
          const ordersArray = Object.keys(ordersData).map((orderId) => ({
            ...ordersData[orderId],
            id: Number(orderId),
          }));
          console.log(ordersArray);

          commit("setUsersOrders", ordersArray);
          return res;
        })
        .catch((err) => {
          throw err;
        });
    },

    toggleFilterDropdown({ commit }) {
      commit("toggleFilter");
    },
  },
  mutations: {
    setUser: (state, userData) => {
      state.user.token = userData.token;
      state.user.data = userData.user;
      localStorage.setItem("access_token", userData.token);
      localStorage.setItem("user_id", userData.user.id); // TODO change to more safer way
    },

    setProduct: (state, product) => {
      state.currentProduct.data = product.data;
    },

    setUsersOrders: (state, data) => {
      console.log(data);

      state.user.orders = data;
    },

    setCurrentProductLoading: (state, loading) => {
      state.currentProduct.loading = loading;
    },

    toggleFilter: (state) => {
      state.filter.isOpen = !state.filter.isOpen;
    },
  },

  modules: {},
});

export default store;
