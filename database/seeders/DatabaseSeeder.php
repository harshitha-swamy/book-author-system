<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $authors = [
            [
                'name'    => 'George Orwell',
                'email'   => 'george@example.com',
                'bio'     => 'English novelist and critic, famous for his works on political dystopia.',
                'born_on' => '1903-06-25',
            ],
            [
                'name'    => 'J.K. Rowling',
                'email'   => 'jk@example.com',
                'bio'     => 'British author, best known for the Harry Potter fantasy series.',
                'born_on' => '1965-07-31',
            ],
        ];

        foreach ($authors as $data) {
            $author = Author::create($data);

            if ($author->name === 'George Orwell') {
                Book::create([
                    'author_id'    => $author->id,
                    'title'        => '1984',
                    'isbn'         => '978-0451524935',
                    'description'  => 'A dystopian novel set in a totalitarian society.',
                    'price'        => 9.99,
                    'published_on' => '1949-06-08',
                ]);

                Book::create([
                    'author_id'    => $author->id,
                    'title'        => 'Animal Farm',
                    'isbn'         => '978-0451526342',
                    'description'  => 'An allegorical novella reflecting the events of the Russian Revolution.',
                    'price'        => 7.99,
                    'published_on' => '1945-08-17',
                ]);
            }

            if ($author->name === 'J.K. Rowling') {
                Book::create([
                    'author_id'    => $author->id,
                    'title'        => "Harry Potter and the Philosopher's Stone",
                    'isbn'         => '978-0439708180',
                    'description'  => 'The first book in the Harry Potter series.',
                    'price'        => 12.99,
                    'published_on' => '1997-06-26',
                ]);
            }
        }
    }
}