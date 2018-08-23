<?php

use Illuminate\Database\Seeder;

class PersonalityItemTableSeeder extends Seeder
{
    /**
     * Run the personality_items table seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('personality_items')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');


        #region hexaco items

        $hexaco_items = [

            ['order' => 1,  'name' => 'hexaco', 'text' => 'I would be quite bored by a visit to an art gallery.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 2,  'name' => 'hexaco', 'text' => 'I plan ahead and organize things, to avoid scrambling at the last minute.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 3,  'name' => 'hexaco', 'text' => 'I rarely hold a grudge, even against people who have badly wronged me.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 4,  'name' => 'hexaco', 'text' => 'I feel reasonably satisfied with myself overall.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 5,  'name' => 'hexaco', 'text' => 'I would feel afraid if I had to travel in bad weather conditions.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 6,  'name' => 'hexaco', 'text' => 'I wouldn\'t use flattery to get a raise or promotion at work, even if I thought it would succeed.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 7,  'name' => 'hexaco', 'text' => 'I\'m interested in learning about the history and politics of other countries.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 8,  'name' => 'hexaco', 'text' => 'I often push myself very hard when trying to achieve a goal.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 9,  'name' => 'hexaco', 'text' => 'People sometimes tell me that I am too critical of others.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 10, 'name' => 'hexaco', 'text' => 'I rarely express my opinions in group meetings.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 11, 'name' => 'hexaco', 'text' => 'I sometimes can\'t help worrying about little things.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 12, 'name' => 'hexaco', 'text' => 'If I knew that I could never get caught, I would be willing to steal a million dollars.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 13, 'name' => 'hexaco', 'text' => 'I would enjoy creating a work of art, such as a novel, a song, or a painting.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 14, 'name' => 'hexaco', 'text' => 'When working on something, I don\'t pay much attention to small details.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 15, 'name' => 'hexaco', 'text' => 'People sometimes tell me that I\'m too stubborn.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 16, 'name' => 'hexaco', 'text' => 'I prefer jobs that involve active social interaction to those that involve working alone.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 17, 'name' => 'hexaco', 'text' => 'When I suffer from a painful experience, I need someone to make me feel comfortable.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 18, 'name' => 'hexaco', 'text' => 'Having a lot of money is not especially important to me.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 19, 'name' => 'hexaco', 'text' => 'I think that paying attention to radical ideas is a waste of time.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 20, 'name' => 'hexaco', 'text' => 'I make decisions based on the feeling of the moment rather than on careful thought.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 21, 'name' => 'hexaco', 'text' => 'People think of me as someone who has a quick temper.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 22, 'name' => 'hexaco', 'text' => 'On most days, I feel cheerful and optimistic.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 23, 'name' => 'hexaco', 'text' => 'I feel like crying when I see other people crying.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 24, 'name' => 'hexaco', 'text' => 'I think that I am entitled to more respect than the average person is.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 25, 'name' => 'hexaco', 'text' => 'If I had the opportunity, I would like to attend a classical music concert.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 26, 'name' => 'hexaco', 'text' => 'When working, I sometimes have difficulties due to being disorganized.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 27, 'name' => 'hexaco', 'text' => 'My attitude toward people who have treated me badly is “forgive and forget.”', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 28, 'name' => 'hexaco', 'text' => 'I feel that I am an unpopular person.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 29, 'name' => 'hexaco', 'text' => 'When it comes to physical danger, I am very fearful.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 30, 'name' => 'hexaco', 'text' => 'If I want something from someone, I will laugh at that person\'s worst jokes.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 31, 'name' => 'hexaco', 'text' => 'I\'ve never really enjoyed looking through an encyclopedia.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 32, 'name' => 'hexaco', 'text' => 'I do only the minimum amount of work needed to get by.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 33, 'name' => 'hexaco', 'text' => 'I tend to be lenient in judging other people.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 34, 'name' => 'hexaco', 'text' => 'In social situations, I\'m usually the one who makes the first move.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 35, 'name' => 'hexaco', 'text' => 'I worry a lot less than most people do.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 36, 'name' => 'hexaco', 'text' => 'I would never accept a bribe, even if it were very large.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 37, 'name' => 'hexaco', 'text' => 'People have often told me that I have a good imagination.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 38, 'name' => 'hexaco', 'text' => 'I always try to be accurate in my work, even at the expense of time.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 39, 'name' => 'hexaco', 'text' => 'I am usually quite flexible in my opinions when people disagree with me.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 40, 'name' => 'hexaco', 'text' => 'The first thing that I always do in a new place is to make friends.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 41, 'name' => 'hexaco', 'text' => 'I can handle difficult situations without needing emotional support from anyone else.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 42, 'name' => 'hexaco', 'text' => 'I would get a lot of pleasure from owning expensive luxury goods.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 43, 'name' => 'hexaco', 'text' => 'I like people who have unconventional views.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 44, 'name' => 'hexaco', 'text' => 'I make a lot of mistakes because I don\'t think before I act.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 45, 'name' => 'hexaco', 'text' => 'Most people tend to get angry more quickly than I do.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 46, 'name' => 'hexaco', 'text' => 'Most people are more upbeat and dynamic than I generally am.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 47, 'name' => 'hexaco', 'text' => 'I feel strong emotions when someone close to me is going away for a long time.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 48, 'name' => 'hexaco', 'text' => 'I want people to know that I am an important person of high status.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 49, 'name' => 'hexaco', 'text' => 'I don\'t think of myself as the artistic or creative type.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 50, 'name' => 'hexaco', 'text' => 'People often call me a perfectionist.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 51, 'name' => 'hexaco', 'text' => 'Even when people make a lot of mistakes, I rarely say anything negative.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 52, 'name' => 'hexaco', 'text' => 'I sometimes feel that I am a worthless person.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 53, 'name' => 'hexaco', 'text' => 'Even in an emergency I wouldn\'t feel like panicking.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 54, 'name' => 'hexaco', 'text' => 'I wouldn\'t pretend to like someone just to get that person to do favors for me.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 55, 'name' => 'hexaco', 'text' => 'I find it boring to discuss philosophy.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 56, 'name' => 'hexaco', 'text' => 'I prefer to do whatever comes to mind, rather than stick to a plan.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 57, 'name' => 'hexaco', 'text' => 'When people tell me that I\'m wrong, my first reaction is to argue with them.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 58, 'name' => 'hexaco', 'text' => 'When I\'m in a group of people, I\'m often the one who speaks on behalf of the group.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 59, 'name' => 'hexaco', 'text' => 'I remain unemotional even in situations where most people get very sentimental.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 60, 'name' => 'hexaco', 'text' => 'I\'d be tempted to use counterfeit money, if I were sure I could get away with it', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],

        ];


        DB::table('personality_items')->insert($hexaco_items);

        #endregion


        #region in-between-games items

        $game_question_items = [

            ['order' => 1,  'name' => 'game_question', 'text' => 'I enjoyed playing this game', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 2,  'name' => 'game_question', 'text' => 'I felt comfortable while playing this game.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 3,  'name' => 'game_question', 'text' => 'I took pleasure in playing this game', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 4,  'name' => 'game_question', 'text' => 'I felt happy while playing this game.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 5,  'name' => 'game_question', 'text' => 'I would like to continue playing this game', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 6,  'name' => 'game_question', 'text' => 'I felt bored when I was playing this game.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 7,  'name' => 'game_question', 'text' => 'I disliked playing this game', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 8,  'name' => 'game_question', 'text' => 'I like my relationship with the other player', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 9,  'name' => 'game_question', 'text' => 'When making my decision, I took the outcome for the other player into account.', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 10, 'name' => 'game_question', 'text' => 'I would like to meet the other player', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 11, 'name' => 'game_question', 'text' => 'I more or less think of the other player as an enemy', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],

        ];


        DB::table('personality_items')->insert($game_question_items);

        #endregion


        #region bfi items

        $bfi_items = [

            ['order' => 1, 'name' => 'bfi', 'text' => 'Tends to find fault with others', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 2, 'name' => 'bfi', 'text' => 'Is helpful and unselfish with others', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 3, 'name' => 'bfi', 'text' => 'Starts quarrels with others', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 4, 'name' => 'bfi', 'text' => 'Has a forgiving nature', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 5, 'name' => 'bfi', 'text' => 'Is generally trusting', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 7, 'name' => 'bfi', 'text' => 'Is considerate and kind to almost everyone', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 8, 'name' => 'bfi', 'text' => 'Is sometimes rude to others', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 9, 'name' => 'bfi', 'text' => 'Likes to cooperate with others', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],

        ];


        DB::table('personality_items')->insert($bfi_items);

        #endregion


        #region study evaluation items for WallStreet

        $study_evaluation_wallstreet_items = [

            ['order' => 1, 'name' => 'wallstreet', 'text' => 'Know each other', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 1, 'name' => 'wallstreet', 'text' => 'Don\'t help each other much', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 1, 'name' => 'wallstreet', 'text' => 'Live in disharmony', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 1, 'name' => 'wallstreet', 'text' => 'Grab what they can for themselves', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 1, 'name' => 'wallstreet', 'text' => 'Grant the other as little as possible', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 1, 'name' => 'wallstreet', 'text' => 'Compete rather than cooperate', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 1, 'name' => 'wallstreet', 'text' => 'Do things for themselves', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 1, 'name' => 'wallstreet', 'text' => 'Distrust each other', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 1, 'name' => 'wallstreet', 'text' => 'Control each other', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 1, 'name' => 'wallstreet', 'text' => 'Are not very kind to each other', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],

        ];

        DB::table('personality_items')->insert($study_evaluation_wallstreet_items);

        #endregion


        #region study evaluation items for Community

        $study_evaluation_community_items = [

            ['order' => 1, 'name' => 'community', 'text' => 'Know each other', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 1, 'name' => 'community', 'text' => 'Help each other a lot', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 1, 'name' => 'community', 'text' => 'Live in harmony', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 1, 'name' => 'community', 'text' => 'Share things', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 1, 'name' => 'community', 'text' => 'Go for equality with others', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 1, 'name' => 'community', 'text' => 'Cooperate rather than compete', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 1, 'name' => 'community', 'text' => 'Do things together', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 1, 'name' => 'community', 'text' => 'Trust each other', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 1, 'name' => 'community', 'text' => 'Control each other', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
            ['order' => 1, 'name' => 'community', 'text' => 'Are kind to each other', 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' => \Carbon\Carbon::now()->toDateTimeString()],
        ];

        DB::table('personality_items')->insert($study_evaluation_community_items);

        #endregion

    }
}
