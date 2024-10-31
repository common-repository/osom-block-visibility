=== Osom Block Visibility ===
Contributors: osompress, nahuai, esther_sola,
Donate link: https://osompress.com
Tags:  hide block, hide content, visibility, conditional blocks, hide on mobile, hide on descktop, hide to loggedin, hide to loggedout
Requires at least: 6.3
Tested up to: 6.6
Stable tag: 1.0.1
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
 

== Description ==

Osom Block Visibility lets you easily control block visibility from WordPress Block Editor. 

The plugin adds a new panel to the block editor with the controls to manage every block visibility by device or user logged status.

The advantage of Osom Block Visibility compared to other similar plugins is that it doesn't use CSS to hide the block, but prevents it from rendering and adding unnecessary load in the first place.
This can be hugely beneficial in terms of web performance, specially if you are hidding images or other heavy content.

= Features =

The new Visibility Settings in the block editor will let you:
1. Hide the block on desktop.
2. Hide the block on mobile and tablet.
3. Hide the block to loggedin users.
4. Hide the block to loggedout users.

You can use it for:
* Hide any block on mobile and tablets to improve performance.
* Display/hide some menu items dependending if the user it's loggedin or not (on block themes).
* Increase loading speed for pages with different block designs for each screen size. 

= Tutorial =

* [Control WordPress blocks visibility by device & logged status](https://osompress.com/control-wordpress-blocks-visibility-device-logged-status/)

= Dev Info =
The plugin uses wp_is_mobile function to check if the device it's a mobile (or tablet) or not. This has the limitation that it can't discern between mobile and tablet, but it has the advantage that let's you load only the necessary block for the device. This can reduce the number of blocks loaded per page even by half in some cases. 

== Installation ==

This plugin can be installed directly from your site.

1. Log in and navigate to Plugins &rarr; Add New.
2. Type "Osom Block Visibility" into the Search and hit Enter.
3. Locate the Osom Block Visibility plugin in the list of search results and click **Install Now**.
4. Once installed, click the Activate link.
5. Now you have the new plugin settings available from WordPress Block Editor right sidebar.

It can also be installed manually.

1. Download the Osom Block Visibility plugin from WordPress.org.
2. Unzip the package and move to your plugins directory.
3. Log into WordPress and navigate to the Plugins screen.
4. Locate Osom Block Visibility in the list and click the *Activate* link.
5. Now you have the new plugin settings available from WordPress Block Editor right sidebar.


== Frequently Asked Questions ==

= Can I use Osom Block Visibility with any theme? =

Yes, you can use Osom Block Visibility with any theme, including a block theme.

= Where can I find Osom Block Visibility settings? =

You can find the settings to control the visibility on the Block Editor right column under the Block > Visibility Settings. 

= Can I use Osom Block Visibility to hide any block? =

Yes, the settings to hide the block will be available in every block, including third-party blocks.

= Can I hide several blocks alltogether? =

If you need to hide several blocks that are close to each other we recomend you to group them and apply the settings to this group block.

= I'm resizing the browser window to test if it hides the block but I don't see any change, why is that?  =

That's the expected behavior, since the plugin it's not using CSS to hide the block content.
If you want to test how it's seen on a mobile/tablet you should visualize it using one of those devices.

= Can I use Osom Block Visibility on WordPress Multisite?  =

Yes, you can.

= Can I use Osom Block Visibility with the classic editor?  =

No, the plugin is designed to work with WordPress Block Editor.

== Screenshots == 
 
1. New panel to control block visibility

== Changelog ==

= 1.0.1 =
* Fix issues with server-side registered blocks. 

= 1.0 =
* Initial release. 
