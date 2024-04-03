# SimpleScreen - a MantisBT plugin


Copyright (c) 2024  Cas Nuy  

Released under the [GNU General Public License v3](http://opensource.org/licenses/GPL-3.0)


## Description

SimpleScreen is a plugin that allows to limited set of fields for reporters while reporing an issue 
For users with higher access levels, the normal reporting screen stays in place.
user's access level is equal or above the configured threshold.



## Installation

### Requirements

The plugin requires MantisBT version 2.0.0 or later.

### Setup instructions

1. [Download](https://github.com/mantisbt-plugins/SimpleScreen/releases/latest) 
   the plugin, or clone a copy of the 
   [source code](https://github.com/mantisbt-plugins/SimpleScreen/).

2. Copy the plugin's code into a `SimpleScreen` directory in your Mantis 
   installation's `plugins/` directory. Note that the name is case sensitive.
    
3. Log into Mantis as an administrator, and go to _Manage -> Manage Plugins_.

4. Locate `SimpleScreen` in the _Available Plugins_ list, and click
   on the _Install_ link.

5. Click the hyperlink on the plugin's name to configure it.

6. Open up(n the mantis root directory) bug_report_page.php and search for "$t_fields = config_get( 'bug_report_page_fields' );"

7. Insert the following line after the line found: 
	$t_fields = EVENT_SIGNAL( 'EVENT_SIMPLE_SCREEN' , $t_fields);

## Support

The following support channels are available if you wish to file a
[bug report](https://github.com/mantisbt-plugins/SimpleScreen/issues/new),
or have questions related to use and installation:

  - [GitHub issues tracker](http://github.com/mantisbt-plugins/SimpleScreen/issues)
  - [Gitter chat room](https://gitter.im/mantisbt/mantisbt)

The latest source code is available on
[GitHub](https://github.com/mantisbt-plugins/SimpleScreen).
