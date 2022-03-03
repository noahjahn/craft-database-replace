# Craft Database Replace

Craft Database Replace is a Craft CMS 3 plugin that allows you to upload a backup database script file to replace the currently running.

This plugin is a work in progress.

## Use cases

* Deploying to a service with a database not exposed to the internet
* If you have multiple environments and ever want to replace a specific environments database with another
    - For example, if production content needs to be pulled into staging
    - Or if you're developing locally, this provides an interface for replacing your local database
* Database rollbacks
* Initial database imports for starting new projects with a pre-defined "templated" database

## Ideas

* Upload a database sql file in the Craft CP utilities section to replace the current database
* Prompt the user to double check they know what they're doing
* Create a back up before replacing -- ask the user if they would like to download the copy as well
* Create a permission in settings for seeing/using this utility
* Allow the upload path to be configurable in the Craft CP settings

### Future

* Create a database table viewer in the CP
* More database management -- like automated backups, though this probably shouldn't be managed in this way
