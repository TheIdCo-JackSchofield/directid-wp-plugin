=== DirectID Widget ===
Contributors: Jack Schofield - miiCard
Tags: verification, financial, fintech
License: MIT

== Description ==
This plugin initializes the DirectID Widget in posts and pages containing the [directid-widget] tag.

It is also capable of loading into template errors by using the 'directid_widget' action.

== Installation ==
1. Create a new directory on your site '/wp-content/plugins/directid'
1. Upload the contents of this folder to the '/wp-content/plugins/directid' directory
1. Edit oAuthManager.php to contain the secret key and client ID provided by your miiCard account manager
1. Edit apiManager.php to contain the user session endpoint provided by your miiCard account manager
1. Activate the plugin
1. Add [directid-widget] to the post/page where you want the widget to appear
1. Altertnatively add <?php do_action('directid_widget'); ?> to you template where you want the widget to appear

== Frequently Asked Questions ==
= How do I switch from Beta to Live? =
Presently you will need to do the following:

1. Update $apiRoot in apiManager.php  
1. Update $oAuthResource in oAuthMangager.php
1. Update the enqueued javascript and CSS files in directid.php

This will be improved in future versions by providing a simple toggle in the plugins options page.

= How do I add real users? =
You will need to set the $user in apiManager.php to your desired identifier. This must be an escaped string.
