window.moment = require("moment");
moment.relativeTimeThreshold("ss", 0);

require("./bootstrap");
require("./preview");
require("./append");
require("./dashboard");
require("./notifications");

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
