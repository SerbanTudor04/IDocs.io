# 0.0.1
- First deploy :
    - Added support for elasticsearch
    - Added document model
    - Added support for database postgresql
    - Added support for documents hadling (db table)
    - Added functionality to index new database documents
    - Added boostrap 5 as UI library.
    - Added font awesome for icons library
    - Added register and login system
    - Added layouts for general app and auth.


# 0.1.0
- Added support for document search
- Added support for document view page
- Fix Documents controller after adding document command call.
- Added short_description to documentation table
- Implement short_description add documentation 

# 0.1.1
- Added Migrations for Documents Comments and Rating
- Added models for Documents comments and rating

# 0.1.2
- Added alerts support in general template of the application

# 0.2.0 
- Added comments endpoint in controller
- Added template for adding a comment on document 
- Added comments showing in document view page
- Fix message template, missing close button and added animation fade out
- Added new columns to documents_comments table
- Added application installing script

# 0.2.1
- Change [.env.example](.env.example)

# 0.3.0
- Add support for about page in home controller
- Add support for obtaing appliation links in home controller
- Add table apps_links for storing application routes
- Add seeds for apps_links
- Beautify home page template
- Add mega menu dropdown near logo of application 

# 0.3.1
- Restructure and add tables in database
- Fix navbar menus for authenticated users and guess

# 0.3.2 
- Fix total results in results page
- Fix missing add documentation in results page
- Fix indexing documentation after adding new documentation

# 0.3.3
- Refactor database migration in one file
- Refactor database tables and add foreign keys
- Remove old migrations files
- Refactors models
- Add aditions info after application installtion process

# 0.3.4
- Fix Missing column in Documents comments
- Change artisan to idocs 
- Fix missing columns in migration script and fix column wrong missing types
- Implement uuid in users table
- Fix typo in database seed apps links