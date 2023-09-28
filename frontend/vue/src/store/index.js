import { createStore } from "vuex";
import axiosClient from "../axios";

const store = createStore({
  state: {
    user: {
      data: {},
      token: sessionStorage.getItem("access_token"),
      cart: { data: sessionStorage.getItem("cart"), totalPrice: 0 },
      orders: {},
    },
    currentProduct: {
      loading: false,
      data: {},
    },
    cartItem: {
      data: {},
    },
    filter: {
      isOpen: false,
    },
  },
  getters: {
    getUserData(state) {
      return state.user.data;
    },
  },
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

    logout({ commit }) {
      return axiosClient.post("/logout").then((response) => {
        commit("logout");
        return response;
      });
    },

    totalCartPrice({ commit }, price) {
      //console.log(price);

      commit("setTotalCartPrice", price);
    },

    getProduct({ commit }, { id, productable_type }) {
      commit("setCurrentProductLoading", true);
      let apiUrl = `/${productable_type.toLowerCase()}s/${id}`;

      return axiosClient
        .get(apiUrl)
        .then((res) => {
          //console.log(res);

          commit("setProduct", res.data);
          commit("setCurrentProductLoading", false);
          return res;
        })
        .catch((err) => {
          commit("setCurrentProductLoading", false);
          throw err;
        });
    },

    getCartItem({ commit }, { id }) {
      let apiUrl = `/component/${id}`;

      return axiosClient
        .get(apiUrl)
        .then((res) => {
          //console.log(res);

          commit("setCartItem", res.data);
          return res;
        })
        .catch((err) => {
          //console.log(err);
          commit("setCartItem", []);
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
          //console.log(ordersArray);

          commit("setUsersOrders", ordersArray);
          return res;
        })
        .catch((err) => {
          // console.log(err);
          commit("setUsersOrders", []);
        });
    },

    toggleFilterDropdown({ commit }) {
      commit("toggleFilter");
    },

    updateUser({ commit }, user) {
      return axiosClient.put(`/users/${user.id}`, user).then((res) => {
        commit("setUpdatedUser", res.data.data);
        return res;
      });
    },
  },
  mutations: {
    setUser: (state, userData) => {
      state.user.token = userData.token;
      //console.log(userData.user);

      state.user.data = userData.user;
      // console.log(state.user.data);

      localStorage.setItem("access_token", userData.token);
    },

    setUpdatedUser: (state, userData) => {
      // console.log(userData);
      state.user.data = userData;
    },

    setProduct: (state, product) => {
      state.currentProduct.data = product.data;
    },

    setCartItem: (state, product) => {
      state.cartItem.data = product.data;
    },

    setUsersOrders: (state, data) => {
      //console.log(data);
      state.user.orders = data;
    },

    setCurrentProductLoading: (state, loading) => {
      state.currentProduct.loading = loading;
    },

    setTotalCartPrice: (state, totalPrice) => {
      state.user.cart.totalPrice = totalPrice;
    },

    toggleFilter: (state) => {
      state.filter.isOpen = !state.filter.isOpen;
    },

    logout: (state) => {
      state.user.data = {};
      state.user.token = null;
      state.user.cart.data = {};
      state.user.cart.totalPrice = 0;
      state.user.orders = {};
    },
  },

  modules: {},
});

export default store;
