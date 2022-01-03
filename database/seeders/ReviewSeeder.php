<?php

namespace Database\Seeders;
use App\Models\Feedback;
use DB;

use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedbacks')->insert([
            'active' => 1,
            'author' => 'Настя',
            'text' => 'Очень прекрасный способ изучать таблицу умножения!!! Очень удобно!!!! Из плюсов: можно убить время, есть любимое упражнение, общее развитие.',
            'date' => '2020-12-12',
        ]);
        DB::table('feedbacks')->insert([
            'active' => 1,
            'author' => 'Аделя',
            'text' => 'Отлично для  детей школьного возраста. Можно тренироваться ежедневно в любое время. Минимум времени - максимум пользы!',
            'date' => '2021-03-15',
        ]);
        DB::table('feedbacks')->insert([
            'active' => 1,
            'author' => 'Саша',
            'text' => 'Мой ребенок занимется сам, очень удобно. Таблицу умножения выучил быстро и без проблем. Спасибо большое',
            'date' => '2021-04-11',
        ]);
        DB::table('feedbacks')->insert([
            'active' => 1,
            'author' => 'Владимир',
            'text' => 'Разнообразие, интересные упражнения, удобно то, что можно самому настраивать фильтр.
            Мой ребенок быстро разобрался и теперь занимается сам. Для школы то что надо!!!!',
            'date' => '2021-04-22',
        ]);
        DB::table('feedbacks')->insert([
            'active' => 1,
            'author' => 'Саша',
            'text' => 'На сайт вышел случайно в рамках развития навыков ментального счета. Но и другие тренажеры понравились. Спасибо',
            'date' => '2021-04-23',
        ]);
        DB::table('feedbacks')->insert([
            'active' => 1,
            'author' => 'Зарина',
            'text' => 'Интересные тренажеры. Дочь быстро сама разобралась и занимается. Спасибо',
            'date' => '2021-05-04',
        ]);
        DB::table('feedbacks')->insert([
            'active' => 1,
            'author' => 'Любовь',
            'text' => 'Очень сильно помогает, каждий день видно результат)',
            'date' => '2021-05-12',
        ]);
        DB::table('feedbacks')->insert([
            'active' => 1,
            'author' => 'Саша',
            'text' => 'Мозг хорошо приводит в тонус. и на ночь хорошо засыпать под него))))',
            'date' => '2021-05-27',
        ]);
        DB::table('feedbacks')->insert([
            'active' => 1,
            'author' => 'Екатерина',
            'text' => 'Спасибо. очень сильно помогает мне на уроках в школе и на ментальной арифметике. Думаю, именно поэтому я везьде получаю пятёрки. ',
            'date' => '2021-05-29',
        ]);
        DB::table('feedbacks')->insert([
            'active' => 1,
            'author' => 'Аида',
            'text' => 'благодаря сайту и вашим чудесным тренажёрам, мне с лёгкостью удаётся настроить учеников на здоровую соревновательность и достижение новых успехов в учёбе.',
            'date' => '2021-06-06',
        ]);
        DB::table('feedbacks')->insert([
            'active' => 1,
            'author' => 'Алия',
            'text' => ' За 3 месяца я стал более концентрированным и внимательным. Я тал лучше и быстрее справляться с поставленными задачами. Очень развивает мозги. Спасибо',
            'date' => '2021-06-24',
        ]);
    }
}
