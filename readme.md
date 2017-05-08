## Game Theory and Personality

**Online experiment on Game Theory and personality** *Tilburg School of Social and Behavioral Sciences - Departments of Developmental Psychology and Social Psychology.*

**Few words about this project**
 - The aim is to explore the link between several personality traits in the context of a Game Theory scenario.
 - For more details about the conceptual framework you can drop a line at *e.dietvorst@tilburguniversity.edu*.
 - If you are interested in the implementation, drop me a line at *m.a.constantin@tilburguniversity.com*.
  
 **What is this project and what it is not**
  - This project is a flexible setup that allows you to:
    - specify a series of Game Theory designs a participant can play
    - obtain feedback after each game and add other custom forms throughout the experiments
    - easily add personality questionnaires by changing the items and scales
    - specify custom experimental conditions and load them in your current study
  - By default, this project comes with `seeds` (aka the configuration that was used in this study) that you can easily run for a fully replication.
  - This project does not include by default the `CRUD` interface we use. To easily interact with the database, we use [Voyager](https://github.com/the-control-group/voyager) (with some appropriate customizations). You can find the exported [tables related to Voyager here](https://github.com/mihaiconstantin/game-theory-tilburg/blob/master/game-theory-voyager-setup.sql).

**Installation**
 *We assume you have an webserver (e.g., `Apache`) and a `MySql`/ `MariaDB` installation in place.*
 
 Then, follow these steps:
  - make sure you have `composer` installed on your machine check [this resource](https://getcomposer.org/doc/00-intro.md)
  - make sure your `PHP` installation meets [these requirements](https://laravel.com/docs/5.4/installation#server-requirements)
  - `git clone` this project in your environment
  - `cd` into the `game-theory-tilburg` project and run `composer install`
  - once the installation is finished is finished copy the `.env.example` into `.env` and [update the variables](https://laravel.com/docs/5.4/configuration#environment-configuration) with your own values.
  - then, run `php artisan migrate --seed` to build the database and seed it with the default data used in the study
  
  
## Screenshots
  
### Example questionnaire
![example questionnaire](https://github.com/mihaiconstantin/game-theory-tilburg/blob/master/demo/demo_questionnaire.PNG)
  
### Example Instruction
![example Instruction](https://raw.githubusercontent.com/mihaiconstantin/game-theory-tilburg/99fcfa7a4db93aa473b45f62942aa5f5345f29d1/demo/demo_instruction.PNG)
    
### Example Game Play
![example Instruction](https://github.com/mihaiconstantin/game-theory-tilburg/blob/master/demo/demo_game_play.PNG) 

### Example Game Result
![example Instruction](https://github.com/mihaiconstantin/game-theory-tilburg/blob/master/demo/demo_game_result.PNG)

### Example Game Evaluation
![example Instruction](https://github.com/mihaiconstantin/game-theory-tilburg/blob/master/demo/demo_evaluation.PNG) 


  
