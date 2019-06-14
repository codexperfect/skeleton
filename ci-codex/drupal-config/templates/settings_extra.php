$settings_secure = __DIR__ . '/settings.secure.inc';
if (is_readable($settings_secure)) {
  require_once $settings_secure;
}

if (!defined("ENVIRONMENT_NAME")) {
  throw new Exception("Please make sure that ENVIRONMENT_NAME is set in settings-secure.inc");
}

$env_settings = __DIR__ . '/settings.' . ENVIRONMENT_NAME . '.php';
if (is_readable($env_settings)) {
  require_once $env_settings;
}
