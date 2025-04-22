<?php
// Get the UPI parameter from URL (supports 'upi', 'url', or 'link')
$upiLink = $_GET['upi'] ?? $_GET['url'] ?? $_GET['link'] ?? null;

if ($upiLink) {
    // Decode URL-encoded characters (e.g., %40 becomes @)
    $decodedUpiLink = urldecode($upiLink);
    // Sanitize for JavaScript (prevents XSS)
    $safeUpiLink = htmlspecialchars($decodedUpiLink, ENT_QUOTES, 'UTF-8');
} else {
    die("No UPI link found in the URL.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Redirecting to UPI Payment...</title>
</head>
<body>
    <p>Redirecting to UPI payment...</p>

    <script>
        // Get the UPI link from PHP
        const upiLink = "<?php echo $safeUpiLink; ?>";
        
        // Auto-redirect after a small delay (better UX)
        setTimeout(() => {
            window.location.href = upiLink;
        }, 1000); // 1-second delay (optional)
    </script>
</body>
</html>
