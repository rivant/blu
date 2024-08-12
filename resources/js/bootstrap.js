import axios from 'axios';
import 'mdbootstrap/css/mdb.min.css';
import 'mdb-ui-kit/css/mdb.min.css';

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
