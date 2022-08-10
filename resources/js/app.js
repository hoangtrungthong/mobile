require('./bootstrap');
require('./preview');
require('./append');
require('./users');
require('./category');
require('./notifications');

window.moment = require('moment');
moment.relativeTimeThreshold('ss', 0);

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
