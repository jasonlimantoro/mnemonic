import axios from "axios";

const Ajax = axios.create({
  headers : {'X-Requested-With': 'XMLHttpRequest'},
});

export default Ajax;