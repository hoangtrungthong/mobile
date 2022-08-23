window.moment = require("moment");
moment.relativeTimeThreshold("ss", 0);

require("./bootstrap");
require("./preview");
require("./append");
require("./users");
require("./category");
require("./dashboard");
require("./discount");
require("./notifications");
require("./home")
require("./chart")

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
