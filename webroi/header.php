<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- google code here -->

    <!-- end of google code -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <?php wp_head(); ?>
</head>
<body <?php echo body_class();?>>
    <header>
    <!-- google code -->

    <!-- end of google code -->
    <!-- For wordpress accessibility to skip to main content via keyboard or any screen reader device -->
    <a class="skip-link screen-reader-text" href="#content" tabindex="1">Skip to Content</a>
    <!-- wordpress accessibility ends -->
    </header>
    <!-- navigation code -->
    <nav>
        <?php wp_nav_menu( 'primary' );?>
    </nav>
    <!-- end navigation code -->