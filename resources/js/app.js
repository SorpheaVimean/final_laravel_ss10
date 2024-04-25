import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// Initialization for ES Users
import {
    Modal,
    Input,
    Ripple,
    initTWE,
  } from "tw-elements";
  
  initTWE({ Modal,Input , Ripple });