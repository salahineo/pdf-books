<?php
  // Start Session
  session_start();
  // Empty Session
  session_unset();
  // Destroy Session
  session_destroy();
  // Redirect To Login Page
  header('Location: index.php');
