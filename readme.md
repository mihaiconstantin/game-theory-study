## Game Theory and Personality

**Online experiment on Game Theory and personality** at *Tilburg School of Social and Behavioral Sciences - Departments of Developmental Psychology and Social Psychology.*

**Few words about the study:**
 - The aim of this study is to explore the link between several personality traits in the context of a Game Theory scenario.
 - For more details about the conceptual framework you can drop a line at *e.dietvorst@uvt.nl*.
 - If you are interested in the implementation, drop a line at *m.a.constantin@uvt.nl*.
  
**Few words about this project:**
  - This project is a flexible setup that allows the test leader to:
    - specify a series of Game Theory designs a participant can play
    - obtain feedback at the end of game played
    - add custom form elements throughout the experiment
    - add personality questionnaires by creating scales and then populating them with items
    - add multiple experimental conditions and link them to a particular study (i.e., multiple studies can be created, each with a different design)
  - By default, this project comes with `seeds`, representing the exact configuration used in this study. This means that right after the installation, one can run a full replication of the study.  
  - Main technologies used:
    - [Laravel Framework `5.4.36`](https://laravel.com/docs/5.4) &rarr; backend framework of choice 
    - [Voyager `0.11.14`](https://github.com/the-control-group/voyager) (with some customizations) &rarr; for easily interacting with the database and changing various study settings
    
## Installation

**Prerequisites:**
  - [`PHP`](http://php.net/downloads.php) >= 5.6.4
  - [`Composer`](https://getcomposer.org/doc/00-intro.md)
  - `MySql`/ [`MariaDB`](https://downloads.mariadb.org) server
   
*For more precise information regarding the prerequisites, check the [Laravel Documentation](https://laravel.com/docs/5.4).*
 
**Installation steps:**
  - `git clone` this project in your environment
  - `cd` into the `game-theory-tilburg` project and run `composer install`
  - once the installation is finished, run `cp .env.example .env` to create the `.env` configuration file  
  - next, open the `.env` file in your favorite editor and modify the following variables accordingly:
    - `DB_DATABASE=`your_database_name
	- `DB_USERNAME=`your_database_user
	- `DB_PASSWORD=`your_database_password
  	- *see [this resource](https://laravel.com/docs/5.4/configuration#environment-configuration) for more details*
  - then, run `php artisan key:generate` to generate an application-specific secret key that will be added to the `APP_KEY` variable in `.env` automatically
  - next, run `php artisan migrate --seed` to build the database and seed it with the default configuration used in this study
  - next, run `php artisan storage:link` to link the `storage` folder in order for the assets to be correctly loaded
  - finally, run `php artisan serve` to start the developmental server and test out the application. Note that you should not use this server if you intend to collect data using this application. Instead, you need a full-fledged web server like [`Nginx`](https://www.nginx.com/) or [`Apache`](https://httpd.apache.org/)

## Using the application
- to access the experiment based on the configuration used in this study open http://localhost:8000 in your browser
- to acess the admin panel where you can find and edit the study configuration access http://localhost:8000/admin with:
  - email: admin@example.com
  - password: admin  
- the data collected using this application can be exported as several `.csv` files
  - all files are in long format and can be linked by a unique `ID` generated for each respondent
 
## Screenshots
  
### Example questionnaire
![example questionnaire](https://github.com/mihaiconstantin/game-theory-tilburg/blob/master/demo/demo_questionnaire.PNG)
  
### Example instruction
![example Instruction](https://raw.githubusercontent.com/mihaiconstantin/game-theory-tilburg/99fcfa7a4db93aa473b45f62942aa5f5345f29d1/demo/demo_instruction.PNG)
    
### Example game play
![example Instruction](https://github.com/mihaiconstantin/game-theory-tilburg/blob/master/demo/demo_game_play.PNG) 

### Example game outcome
![example Instruction](https://github.com/mihaiconstantin/game-theory-tilburg/blob/master/demo/demo_game_result.PNG)

### Example game evaluation
![example Instruction](https://github.com/mihaiconstantin/game-theory-tilburg/blob/master/demo/demo_evaluation.PNG) 

--- 

*Feel free to get in touch if you need more details! Good luck!*
  
