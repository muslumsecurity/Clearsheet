// whitelist
$allowed_domains = ['example.com', 'example2.com'];
$url = "http://www.example.com";
$parsed_url = parse_url($url);

if (filter_var($url, FILTER_VALIDATE_URL) && in_array($parsed_url['host'], $allowed_domains)) {
  echo("URL is valid and the domain is allowed");
} else {
  echo("Invalid URL or domain not allowed");
}
