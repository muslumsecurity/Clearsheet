// http ve https kontrol eder.
$url = "http://www.example.com";
$parsed_url = parse_url($url);

if (filter_var($url, FILTER_VALIDATE_URL) && $parsed_url['scheme'] == 'https') {
  echo("URL is valid and the protocol is secure");
} else {
  echo("Invalid URL or non-secure protocol");
}
