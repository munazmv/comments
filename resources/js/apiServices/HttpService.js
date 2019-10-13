
const token = document.querySelector('meta[name=token]').content;


/**
 * Make HTTP requests
 *
 * @param method
 * @param url
 * @param payload
 * @param params
 * @returns {Promise<*>}
 */
async function makeRequest(method, url, {payload, params}) {
  try {
    const response = await axios({
      method,
      url: url,
      data: payload,
      headers: {
        'Authorization': `Bearer ${token}`
      }
    });

    return response.data;
  } catch(error) {
    throw error
  }
}

/**
 * Make HTTP Get calls
 *
 * @param url
 * @param params
 * @returns {Promise<*>}
 */
export async function get(url, params) {
  return makeRequest('get', url, {params});
}

export async function post(url, payload = {}, params = {}) {
  return makeRequest('post', url, {payload, params});
}
