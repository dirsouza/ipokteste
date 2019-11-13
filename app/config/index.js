const { API_HOST = 'localhost', API_PORT = '8000' } = process.env;

export default {
  API_URI: `http://${API_HOST}:${API_PORT}/`
}