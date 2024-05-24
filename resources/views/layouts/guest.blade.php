<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

                {{ $slot }}
        <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script>
    function showForm(formType) {
    var sellerLink = document.getElementById('seller-link');
    var bidderLink = document.getElementById('bidder-link');

    // Hide both forms initially
    document.getElementById('seller-form').style.display = 'none';
    document.getElementById('bidder-form').style.display = 'none';

    // Remove active class from all links
    sellerLink.classList.remove('active');
    bidderLink.classList.remove('active');

    // Show the selected form and add active class to the clicked link
    if (formType === 'seller') {
        document.getElementById('seller-form').style.display = 'block';
        sellerLink.classList.add('active');
    } else if (formType === 'bidder') {
        document.getElementById('bidder-form').style.display = 'block';
        bidderLink.classList.add('active');
    }
}

// Function to handle the transition to the next step
var currentStep = 1; // Initial step for seller form
var currentStepP = 2; // Initial step for bidder form




function nextStep(formType, currentStep) {
  // Hide the current step
  document.querySelector('#' + formType + '-form .step.step-' + currentStep).style.display = 'none';
  
  // Update current step
    currentStep++;

  // Show the next step
  document.querySelector('#' + formType + '-form .step.step-' + currentStep).style.display = 'block'; // Use updated currentStep
}

function previousStep(formType, currentStepP) {

    // Hide the current step
    document.querySelector('#' + formType + '-form .step.step-' + currentStepP).style.display = 'none';
  
    // Update current step
      currentStepP--;

    // Show the previous step
    document.querySelector('#' + formType + '-form .step.step-' + currentStepP).style.display = 'block'; // Use updated currentStep

    // Handle being at the first step (e.g., disable button or show message)
    console.log("Already at the first step");
  
}

// Trigger the showForm function with 'seller' argument when the page is loaded
document.addEventListener('DOMContentLoaded', function () {
    showForm('seller');
});

// Add event listeners to the "Next" and "Previous" links for both seller and bidder forms
document.getElementById('seller-next').addEventListener('click', function() {
    var currentStep = parseInt(document.querySelector('#seller-form .step.active').classList[1].replace('step-', ''));
    nextStep('seller', currentStep);
});

document.getElementById('seller-previous').addEventListener('click', function() {
    var currentStep = parseInt(document.querySelector('#seller-form .step.active').classList[1].replace('step-', ''));
    previousStep('seller', currentStepP);
});

document.getElementById('bidder-next').addEventListener('click', function() {
    var currentStep = parseInt(document.querySelector('#bidder-form .step.active').classList[1].replace('step-', ''));
    nextStep('bidder', currentStep);
});

document.getElementById('bidder-previous').addEventListener('click', function() {
    var currentStep = parseInt(document.querySelector('#bidder-form .step.active').classList[1].replace('step-', ''));
    previousStep('bidder', currentStepP);
});
</script>
    </body>
</html>
