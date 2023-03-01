# CS-Cart/Multi-Vendor Cache Monitor Add-on

This add-on provides monitoring feature for cache invalidation procedures in CS-Cart and Multi-Vendor. It tracks both global cache invalidation processes and performance-impacting partial cache invalidation processes.

In case you need a comprehensive project and infrastructure performance examination, you can ask for a [Complex Project Performance Investigation](https://asaplab.io/services/complex-project-performance-investigation). This service provides the infrastructure and the project code performance audit, including the load and stress testing of the project, that helps to find out root causes of performance issues of a web-site. 

## Features

- Monitors global cache invalidation processes
- Monitors performance-impacting partial cache invalidation processes
- Provides detailed logs for cache invalidation actions
- Informs about ["Rebuild cache automatically"](https://docs.scalesta.com/user-guide/cs-cart/disable-rebuild-cache-automatically/) enabled option
- Informs about ["disable_block_cache"](https://docs.scalesta.com/user-guide/cs-cart/enable-block-cache/) enabled tweak

| Add-on Settings | Cache log | Notifications |
|:---:|:---:|:---:|
| ![Add-on Settings](https://i.gyazo.com/8f7a7b135e6b27af97a0ae6432585e74.png) | ![Cache log](https://i.gyazo.com/4ae3cc7bdc8d6774ea394dfded8a6464.png) | ![Notification about rebuild cache option](https://i.gyazo.com/573d9cdfdcc4a71b415d3376ac9b168e.png) </br> ![Notification about block cache tweak](https://i.gyazo.com/6caa5084c1ba1bc6b018e1cc23486f76.png) |

## Installation

### Manual 

1. Download the 'Zip add-on package from [Releases](https://github.com/asaplab/CS-Cart-Cache-Monitor/releases).
2. Log in to your CS-Cart or Multi-Vendor admin panel and go to `Add-ons → Manage Add-ons`.
3. Click the gear button, push to "Manual installation" to upload and install the add-on.
4. Once the installation is complete, the add-on will start monitoring cache dumping activities.

## Usage

The add-on runs automatically and monitors all cache dumping activities. To view the detailed logs, go to `Administration → Cache monitor logs`.

## Support

If you have any questions or issues with the add-on, please create New Issue.
