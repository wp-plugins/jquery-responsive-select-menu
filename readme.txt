=== jQuery Responsive Select Menu ===
Contributors:      McGuive7, MIGHTYminnow
Donate link:       http://mightyminnow.com
Tags:              responsive, mobile, navigation, menu, select, mobile, tablet, phone, iPhone, android, drop-down, jQuery
Requires at least: 3.0
Tested up to:      3.6.1
Stable tag:        1.0
License:           GPLv2 or later
License URI:       http://www.gnu.org/licenses/gpl-2.0.html

Automatically turns your standard WordPress navigation menus into responsive select / drop-down menus when the screen is below a certain width. 

== Description ==
The perfect solution to make your site responsive for mobile devices like phones and tablets. jQuery Responsive Select Menu lets you make your WordPress menus responsive by turning them into drop-down `<select>` elements below a width of your choosing.

= Features =
* Fully customizable - choose width, custom menu text, which menus to affect, and more.
* Works for ALL menus, whether custom WordPress 3 or automatically generated.
* Lightweight - jQuery functionality is less than 3kb.

**See the section on [Installation](http://wordpress.org/plugins/jquery-responsive-select-menu/installation/) for details on setting up your responsive mobile select menu.**

== Installation ==
= Installation =
1. Install and activate the plugin.
2. Configure the plugin via **Settings > jQuery Responsive Select Menu**.

= Settings =
**Menu Container(s) Class / ID**  
For each menu you wish to make responsive, enter the class or ID of an element containing that menu's &lt;ul&gt; element. For example, say you have the following HTML markup:

	<nav class="nav-primary">
		<div class="wrap">
			<ul class="menu">
				<li><a>Menu Item 1</a></li>
				<li><a>Menu Item 2</a></li>
				<li><a>Menu Item 3</a></li>
			</ul>
		</div>
	</nav>

You could enter `.nav-primary` or even `.nav-primary .wrap` for the Menu Container(s) Class / ID setting. If you have multiple menus you'd like make responsive, simply enter a comma-separated list.

Note: you may need to use a tool like Chrome inspect or Firebug to determine the appropriate class / ID for your menus.

**Maximum Menu Width**  
The width at which you want your normal menu to switch the responsive, drop-down select menu.

**Sub Item Spacer**  
The character used to denote sub-items in your drop-down select menus.

**First Term**  
The text for the select menu's top-level "dummy" item. If left blank, the drop-down select's item will be pulled from the first item in your navigation menu.

**Show Current Page**  
If checked, your drop-down select menu will show the current page. If unchecked, the menu will display the top-level "dummy" item.

== Screenshots ==
1. Normal WordPress navigation.
2. Responsive select / drop-down menu at user-specified mobile width.
3. Sample first item and sub-item spacer at responsive / mobile sizes.

== Changelog ==

= 1.0 =
* First release

== Upgrade Notice ==

= 1.0 =
First Release