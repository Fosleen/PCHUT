import axiosClient from "../axios";

export function getAllGraphicCards() {
  return axiosClient.get("/gpus").then(({ data }) => {
    return data;
  });
}

export function getAllGraphicCardsPaginated(page) {
  return axiosClient
    .get(`/gpus/?paginate=true&page=${page}`)
    .then(({ data }) => {
      return data;
    });
}

export function getGraphicCardById(id) {
  return axiosClient.get(`/gpus/${id}`).then(({ data }) => {
    return data;
  });
}

export function getAllCPUs() {
  return axiosClient.get("/cpus").then(({ data }) => {
    return data;
  });
}

export function getAllCPUsWithSocket(socket_id) {
  return axiosClient.get("cpus/socket/" + socket_id).then(({ data }) => {
    return data;
  });
}

export function getAllCPUsPaginated(page) {
  return axiosClient
    .get(`/cpus/?paginate=true&page=${page}`)
    .then(({ data }) => {
      return data;
    });
}

export function getCPUById(id) {
  return axiosClient.get(`/cpus/${id}`).then(({ data }) => {
    return data;
  });
}

export function getMotherboardById(id) {
  return axiosClient.get(`/motherboards/${id}`).then(({ data }) => {
    return data;
  });
}

export function getAllMotherboardsPaginated(page) {
  return axiosClient
    .get(`/motherboards/?paginate=true&page=${page}`)
    .then(({ data }) => {
      return data;
    });
}

export function getAllRAMs() {
  return axiosClient.get("/rams").then(({ data }) => {
    return data;
  });
}

export function getAllRAMsWithRamType(ram_type_id) {
  return axiosClient.get("rams/ram_types/" + ram_type_id).then(({ data }) => {
    return data;
  });
}

export function getAllRAMsPaginated(page) {
  return axiosClient
    .get(`/rams/?paginate=true&page=${page}`)
    .then(({ data }) => {
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

export function getAllCases() {
  return axiosClient.get("/pccases").then(({ data }) => {
    return data;
  });
}

export function getAllProductsOnDiscount() {
  return axiosClient.get("/discount-components").then(({ data }) => {
    return data;
  });
}

export function getComponentById(id) {
  return axiosClient.get(`/component/${id}`).then(({ data }) => {
    return data;
  });
}

export function getLoggedUser() {
  const bodyParameters = { key: "value" };
  const config = {
    headers: {
      Authorization: `Bearer ${localStorage.getItem("access_token")}`,
    },
  };

  return axiosClient
    .get("/logged-user", bodyParameters, config)
    .then(({ data }) => {
      return data;
    });
}

export function getAllKeyboardsPaginated(page) {
  return axiosClient
    .get(`/keyboards/?paginate=true&page=${page}`)
    .then(({ data }) => {
      return data;
    });
}

export function getAllPSUsPaginated(page) {
  return axiosClient
    .get(`/psus/?paginate=true&page=${page}`)
    .then(({ data }) => {
      return data;
    });
}

export function getAllStoragesPaginated(page) {
  return axiosClient
    .get(`/storages/?paginate=true&page=${page}`)
    .then(({ data }) => {
      return data;
    });
}

export function getAllPCCasesPaginated(page) {
  return axiosClient
    .get(`/pccases/?paginate=true&page=${page}`)
    .then(({ data }) => {
      return data;
    });
}

export function getAllFilteredProductsData(
  selectedType,
  min,
  max,
  manufacturers,
  cores,
  type,
  rgb,
  connector,
  size
) {
  let fetchUrl = `/component?product_type=${selectedType}&min=${min}&max=${max}`;

  if (manufacturers.length != 0) {
    fetchUrl += `&manufacturer=${manufacturers.toString()}`;
  }

  if (cores.length != 0) {
    fetchUrl += `&cores=${cores.toString()}`;
  }

  if (type.length != 0) {
    fetchUrl += `&type=${type.toString()}`;
  }

  if (rgb.length != 0) {
    fetchUrl += `&rgb=${rgb.toString()}`;
  }

  if (connector.length != 0) {
    fetchUrl += `&con=${connector.toString()}`;
  }

  if (size.length != 0) {
    fetchUrl += `&size=${size.toString()}`;
  }

  return axiosClient.get(fetchUrl).then(({ data }) => {
    return data;
  });
}
