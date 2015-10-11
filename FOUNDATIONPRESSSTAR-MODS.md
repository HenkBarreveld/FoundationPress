# Folders and files changed in FoundationPress

**Root:**

\\ANTEC\Sandbox\xampp\htdocs\bcstar\wp-content\themes\FoundationPressStar

**Folder FoundationPressStar:**

- Modified archive.php: different column widths, get_sidebar 'right'
- Modified content.php: removed hr at the end of the article
- Modified content-none.php: enclosed in <article> element for styling purposes
- Modified functions.php: added require_once call for #bcstar-functions.php
- Modified Gruntfile.js:
-- added files and folders to be excluded from the package function
-- disabled unnecessary Foundation core components
- Modified header.php: Typekit, scroll-to-top button
- Modified index.php: replaced call get-template-part, get_sidebar 'right'
- Modified package.json: replaced the "name" by the actual theme folder name "FoundationPressStar"
- Replaced screenshot.png by bcstar.nl screenshot
- Modified search.php: different column widths, get_sidebar 'right'
- Modified sidebar-left.php: different column widths, specify left-sidebar-widgets
- Added sidebar-right.php: copy of adapted sidebar-left.php, specify right-sidebar-widgets
- Added sidebar-wide-left.php: copy of adapted sidebar-left.php, different column widths
- Modified single.php: different column widths, get_sidebar 'right'
- Modified style-css: from FoundationPress to FoundationPressStar
- Added tml-login-form.php: submit with class="button", span with button Annuleren
- Added tml-lostpassword-form.php: submit with class="button", span with button Annuleren
- Added tml-resetpass-form.php: submit with class="button", span with button Annuleren

**Folder FoundationPressStar\assets\images:**

- Added star-logo-128.png: Star logo
- Added white-star_transparent-background_961.png: logo base model for any future use

**Folder FoundationPressStar\assets\images\icons:**
 
- Replaced apple-touch icons (4 files)
- Replaced favicon.ico by Star icon
- Added favicon.png: Star icon as png file

**Folder FoundationPressStar\assets\javascript\custom:**

- Added #bcstar.js: self-documented Javascript and jQuery functions

**Folder FoundationPressStar\assets\scss:**

- Customized foundation.scss: disabled unnecessary @import statements, added #bcstar custom style

**Folder FoundationPressStar\assets\scss\config:**

- Modified _custom-settings.scss:
-- updated @import path in "a. Base" settings
-- added sections from _settings.scss and modified these where applicable

**Folder FoundationPressStar\assets\scss\site:**

- Added _#bcstar.scss: self-documented style adaptations
- Modified _topbar.scss: added styling of Top bar menu

**Folder FoundationPressStar\languages:**

- Replaced FoundationPress.pot
- Replaced nl_NL.mo
- Replaced nl_NL.po

**Folder FoundationPressStar\library:**

- Added #bcstar-functions.php: self-documented additional functions

**Folder FoundationPressStar\parts:**

- Modified off-canvas-menu.php: changed menu-icon into star-menu-icon
- Modified top-bar.php:
-- added div masthead
-- added to top-bar-container id="topbar" and class="sticky"
-- replaced foundationpress_top_bar_l()

**Folder FoundationPressStar\templates:**

- Added page-sidebar-left.php: large screens 3-9 cols instead of 4-8
- Added page-sidebar-left&first.php: sidebar above article on medium-down
- Added page-sidebar-wide-left.php: large screens 4-8 cols instead of 3-9

