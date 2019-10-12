import {get, post} from "./HttpService";

/**
 * Get all user comments
 *
 * @returns {Promise<*>}
 */
export async function allComments() {
  return get(`/api/v1/comments`);
}

/**
 * Add a comment
 *
 * @param data
 * @returns {Promise<*>}
 */
export async function createComment(data) {
  return post(`/api/v1/comments`, data);
}
