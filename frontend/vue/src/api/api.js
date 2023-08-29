import axiosClient from "../axios";

export function getAllGraphicCards() {
  return axiosClient.get("/gpus").then(({ data }) => {
    return data;
  });
}

export function getAllCPUs() {
  return axiosClient.get("/cpus").then(({ data }) => {
    return data;
  });
}

export function getAllRAMs() {
  return axiosClient.get("/rams").then(({ data }) => {
    return data;
  });
}

export function getAllStorages() {
  return axiosClient.get("/storages").then(({ data }) => {
    return data;
  });
}

export function getAllPSUs() {
  return axiosClient.get("/psus").then(({ data }) => {
    return data;
  });
}

export function getAllMotherboards() {
  return axiosClient.get("/motherboards").then(({ data }) => {
    return data;
  });
}
