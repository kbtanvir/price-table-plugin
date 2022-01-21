let request = (url = "", params = {}, method = "", token = "") => {
  let options = {
    method,
    headers: {
      "Content-Type": "application/json",
    },
  };

  // set headers

  if (token === "wordpress") options.headers["X-WP-Nonce"] = WP_API.nonce;
  else options.headers["Authorization"] = `Bearer ${token}`;

  // set requests with methods

  switch (method) {
    case "GET":
      url += "?" + new URLSearchParams(params).toString();
      return fetch(url, options).then((response) => response.json());

    case "POST":
      options.body = JSON.stringify(params);
      return fetch(url, options).then((response) => response.json());

    case "PUT":
      options.body = JSON.stringify(params);
      return fetch(url, options).then((response) => response.json());

    case "DELETE":
      url += "?" + new URLSearchParams(params).toString();
      return fetch(url, options).then((response) => response.json());

    default:
      console.log(
        "something went wrong with switch statement in WCC_REST request method"
      );
  }
};

function WCC_REST(token) {
  this.request = request;
  this.create = (url, params) => this.request(url, params, "POST", token);
  this.read = (url, params) => this.request(url, params, "GET", token);
  this.update = (url, params) => this.request(url, params, "PUT", token);
  this.remove = (url, params) => this.request(url, params, "DELETE", token);
}

const WP_REST = new WCC_REST("wordpress");
const WP_EP = WP_API.endpoint;
