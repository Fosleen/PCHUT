import axiosClient from "../axios";

export function getAllGraphicCards() {
  return axiosClient.get("/gpus").then(({ data }) => {
    return data;
  });
}
