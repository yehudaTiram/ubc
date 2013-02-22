=== United ===

== About ==
This theme was created by Thad Allender for United Bike Co. in June of 2011.  Usage of this theme is restricted to the licensee (United Bike Co.) as specified on the Web Development Contract.  If you have questions or comments, please email Thad at info@graphpaperpress.com or thadallender@gmail.com

== Installation ==
This section describes how to install this theme and get it working.

	1. Unzip united.zip to your Desktop.	
		* Note: make sure that the extracted folder is `united` and that your ZIP file has not created two levels of folders (for example, `united/united`).
	
	2. Go to `/wp-content/themes/` and make sure that you do not already have a `united` folder installed. If you do, then back it up and remove it from `/wp-content/themes/` before uploading your copy of United.
	3. Upload `united` to `/wp-content/themes/`.
	4. Activate United through the Appearance -> Themes menu in your WordPress Dashboard.
	5. Install the [OptionTree plugin](http://wordpress.org/extend/plugins/option-tree/)  This plugin will add a Theme Options panel to your WordPress Dashboard. This is a required plugin.
	6. Activate the plugin.
	7. Go to Settings -> Media and make sure to enter the following values:	
		* Image sizes		
			** Thumbnail size
				*** Width: 150
				*** Height: 150
				*** [checked] Crop thumbnails to exact dimensions (normally thumbnails are proportional)
				
			** Medium size
				*** Max Width: 590
				*** Max Height: 0
				
			** Large size
				*** Max Width: 950
				*** Max Height: 0
				
		
		* Embeds
			** [checked] When possible, embed the media content from a URL directly onto the page. For example: links to Flickr and YouTube.
			** Maximum embed size
				*** Width: 590
				*** Height: 0
				
	
	
	8. Regenerate your thumbnails with the [Regenerate Thumbnails](http://wordpress.org/extend/plugins/regenerate-thumbnails/) WordPress plugin.
		
= Installation Troubleshooting =
If you've performed a clean install of United and are having problems, make sure that the following conditions have been met: 
			* Make sure that you've installed the theme properly. You should use an FTP program like FileZilla, WinSCP, or Fetch to upload your files. Do not use WordPress' Install a theme in .zip format option.
			* Permissions: On most servers, the theme files should be set to 644 and folders should be set to 755
			* Make sure that you've deactivated all of your plugins before installing and/or upgrading if you continue to have theme activation problems.
			* Your United folder should be named `united`. Do not rename this folder.
			* United uses jQuery for much of its functionality. If parts of your theme appear broken or unresponsive, then you likely have a JavaScript conflict being caused by an active plugin. Deactivate your plugins, one-by-one, to determine which plugin is conflicting with jQuery.
		
== Usage ==
This section contains info for using the unique features of this theme.  If you are new to using WordPress, please checkout our [video tutorials](http://vimeo.com/graphpaperpress/videos).

= Theme Options =
This theme comes with Theme Options for controlling many aspects of the design, fonts, widgets, etc. Visit Appearance -> Theme Options to get started.

= Menus =
To add menu to your website, go to Appearance -> Menus and add a new menu. You can then add categories, pages and custom links to this new menu. You can also drag and drop menus around to make sub menus or reorder them. [Watch video tutorial](http://vimeo.com/16432328).

This theme supports six Theme Locations for your menus.  Theme Locations are specific areas in this theme where your menus can appear.  After creating your menu, be sure you add it to a Theme Location.

The Social Menu Theme Location requires some special treatment in order to generate the icons for each link.  When you are on the Appearance -> Menu admin panel, click on the Screen Options link at the top right of the page and select CSS Classes from the `Show Advanced Menu Properties` sub-section.  This theme supports a total of six custom icons.  Specific the following CSS Classes underneath each menu item to generate the corresponding social media icon: facebook, twitter, youtube, vimeo, apple, rss. 

= Backgrounds =
Custom background is another great feature of WordPress that is supported in United. Add yours by clicking Appearance -> Background.

= Widgets: =
There are widgetized areas in United. You can add a variety of Widgets to this theme on the Appearance -> Widgets tab in WordPress.

= Slideshows: =
There are three distinct ways you add slideshows to United.
	
	1. Homepage Slideshow: Visit the Appearance -> Theme Options -> Slideshow to add slides to the homepage slideshow.
	2. Product Archive Page: Visit the Appearance -> Theme Options -> Products to add slides to the homepage slideshow.
	3. Team and Product Individual Entries: Simply upload all the images you want using the Image Upload tool in WordPress.  Uploading these images to each of your Team or Product entries will effectively attach them to each post.  All images uploaded to each Team or Product entry will be included in the Team or Product entry slideshow.

= Page Templates: =
This theme comes packaged with two page templates: Default and Full-Width, No Sidebar.

== Changelog ==
These are the changes seen by United since it was first available for public download.
		
= Version 1.0 (July 1, 2011) =
	* Initial release