<?php
session_destroy();
session_unset();
// request where it come form
header("location: http://localhost\Intern\Nisit\loginNisit.php");