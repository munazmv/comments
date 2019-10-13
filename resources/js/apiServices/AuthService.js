import {get} from './HttpService'

/**
 * Get authenticated user
 *
 * @returns {Promise<void>}
 */
export async function getAuthenticatedUser() {
  return get('/api/v1/my');
}
