# Mayro

[![Release](https://img.shields.io/badge/release-v1.2-blue.svg?style=flat)](https://github.com/MominRaza/Mayro/releases)
[![Q2A](https://img.shields.io/badge/Question2Answer-v1.8.5-blue.svg?style=flat)](https://github.com/MominRaza/Mayro/releases)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/MominRaza/Mayro/issues)
[![License](https://img.shields.io/badge/License-GPL-green.svg?style=flat)](https://github.com/MominRaza/Mayro/blob/master/LICENSE)
[![Donate](https://img.shields.io/badge/donate-paypal-blue.svg)](https://paypal.me/mominr082)

Google Material Design Theme for [Question2Answer ( Q2A )](https://www.question2answer.org/).


## Screenshots

### Pixle 2 XL
<p float="left">
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/app drawer.png" width="300" alt="App Drawer"/>
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/search.png" width="300" alt="Search"/>
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/questions.png" width="300" alt="Questions"/>
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/question.png" width="300" alt="Question"/>
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/landscape.png" width="600" alt="Landscape"/>
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/ask a question.png" width="300" alt="Ask A Question"/>
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/user toggle.png" width="300" alt="User Toggle"/>
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/categories.png" width="300" alt="Categories"/>
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/users.png" width="300" alt="Users"/>
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/user.png" width="300" alt="User"/>
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/login.png" width="300" alt="Login"/>
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/admin.png" width="300" alt="Admin"/>
</p>

### iPad
<p float="left">
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/hot(iPad).png" width="600" alt="Hot"/>
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/question(iPad).png" width="600" alt="Question"/>
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/users(iPad).png" width="600" alt="Users"/>
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/register(iPad).png" width="600" alt="Register"/>
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/tags(iPad).png" width="600" alt="Tags"/>
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/admin(iPad).png" width="600" alt="Admin"/>
</p>

### iPad Pro
<p float="left">
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/ask(iPad Pro).png" width="700" alt="Ask A Question"/>
<img src="https://raw.githubusercontent.com/MominRaza/assets/master/images/user(iPad Pro).png" width="700" alt="User"/>
</p>


## Features

* Mobile first, clean content focused, responsive layout designed for redability
* Easy to install and setup
* Better integration with the [Onsite notifications plugin](https://github.com/q2apro/q2apro-on-site-notifications/) 
* Better integration with the [Open login plugin](https://github.com/alixandru/q2a-open-login)
* Developer friendly
* Multilingual support


## Installation

1. [Install Question2Answer][]. This theme requires version 1.7 or later   
2. [Download the latest version][latest release] of theme from GitHub, either using [Git][], or downloading directly:
     
     - **Note :** The master branch may have some broken parts, so it is recomended to download the released versions from the releases page.
     - To download using git, install git and then type 
     
          `git clone https://github.com/MominRaza/Mayro.git` 

          `git checkout tags/<latest_tagged_version>`
          
     - To download directly, go to the [latest release][latest release] page and click **Source code** in the **Downloads** section
     
3. Copy the [Mayro] folder to `qa-theme` directory of your q2a installation (eg. `qa-theme/Mayro`)
4. Visit `http://your-q2a-site.com/admin/general` , select the `Mayro` for both the `Site theme` and `Theme for mobile`
5. Congratulations, Mayro theme is now up and running on your website :smile:


## Recommended Settings

### Admin/Users
- Avatar size on user profile page: 200 pixels
- Avatar size on top users page: 180 pixels
- Avatar size on questions: 70 pixels
- Avatar size on answers: 60 pixels
- Avatar size on comments: 60 pixels
- Avatar size on question lists: 60 pixels
- Avatar size on message lists: 60 pixels
### Admin/Lists
- Columns on Tags page: 1
- Columns on Users page: 1


## Manifest File Setup for PWA

- Edit `manifest.webmanifest` file as your requirements.
- Add two `images/icons-192.png` and `images/icons-192.png` to your website root directory (eg. `http://your-q2a-site.com/images/icons-192.png`).
- For more info https://web.dev/add-manifest/

## Author

This free theme is created with :heart: by [Momin Raza](https://github.com/MominRaza)

### Give Me A Treat

<a href="https://paypal.me/mominr082" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-orange.png" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;" ></a>


## License

This program is free software; you can redistribute it and/or modify it under the terms of the [GNU General Public License](https://github.com/MominRaza/Mayro) as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.


## Disclaimer

This code has not been extensively tested on high-traffic installations of Q2A. You should perform your own tests before using this plugin on a live (production) environment. 


## About Question2Answer

**Question2Answer** is a free and open source PHP and MySQL based platform for creating Question & Answer sites. For more information visit Q2A's official site at [question2answer.org](http://www.question2answer.org/)

  [Question2Answer]: http://www.question2answer.org/
  [Install Question2Answer]: http://www.question2answer.org/install.php
  [Git]: http://git-scm.com/
  [Mayro]: https://github.com/MominRaza/Mayro
  [GitHub]: https://github.com/MominRaza/Mayro
  [repositary]: https://github.com/MominRaza/Mayro
  [latest release]: https://github.com/MominRaza/Mayro/releases/latest
  [bugs]: https://github.com/MominRaza/Mayro/issues
