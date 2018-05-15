<?php
require "core/builder/PDOwrapper.php";
require "core/builder/QueryComposer.php";
require "core/builder/SQLBuilder.php";

require "core/output.php";
require "core/Route.php";
require "core/Model.php";
require "core/Middleware.php";

require "app/db_connect/db_connection.php";

// require "app/View.php";
require "app/Controller.php";

require "app/web/routes.php";
//models
require "Student.php";



Route::run();
