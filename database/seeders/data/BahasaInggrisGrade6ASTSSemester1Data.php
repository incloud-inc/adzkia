<?php

namespace Database\Seeders\Data;

class BahasaInggrisGrade6ASTSSemester1Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Asesmen Sumatif Tengah Semester 1 (ASTS 1) Bahasa Inggris Kelas 6 - Paket A',
                'type' => 'exam',
                'description' => 'Asesmen sumatif tengah semester ganjil (Paket A): Menguji penguasaan Unit 1 (Simple Past Tense - Regular & Irregular Verbs, Nominal Past was/were, dan kalimat tanya lampau).',
                'duration_minutes' => 75,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: A School Excursion to the Science Center', 'content' => '[Keterangan Gambar: Rombongan siswa kelas 6 SD sedang mengamati replika roket luar angkasa dan planetarium di Pusat Peragaan Iptek Jakarta.]

Last Thursday, sixty students from SD Cendekia visited the National Science and Technology Center in Jakarta. They departed from school at seven o\'clock by bus and arrived at the center an hour later. At the venue, a friendly guide, Kak Dian, showed them various scientific exhibitions.

First, the students watched a 3D movie about the solar system in the giant dome planetarium. They learned how planets orbit the sun. Next, they visited the robotics pavilion. Budi and Kevin operated a robotic arm to move small blocks. In the physics gallery, Siti tried the whisper dish experiment to understand how sound waves travel through the air. At twelve o\'clock, they ate lunch together in the garden area. Before returning home, they bought miniature rockets at the gift shop. All students felt excited because they gained valuable scientific knowledge.'],
                            ['title' => 'Stimulus 2: Diary Entry - My Unforgettable Sunday', 'content' => '[Keterangan Gambar: Halaman buku harian bersampul cokelat dengan tulisan tangan Rian tentang pengalamannya mengikuti lomba lari maraton anak 5 km.]

Dear Diary,
Sunday, 18 October 2026 was one of the most unforgettable days of my life. I participated in the Junior City Fun Run 5K competition. I woke up at five o\'clock and ate a banana with warm milk. My father drove me to the town square where hundreds of young runners gathered.

When the whistle blew, I started running steadily. At kilometer three, my legs felt very heavy and tired. However, I remembered my coach\'s advice: "Never give up when you are tired; stop only when you finish!" I continued running and crossed the finish line in twenty-eight minutes. I received a shiny finisher medal and a certificate. My parents hugged me warmly and took many photos. I felt exhausted, but I was extremely proud of my determination.'],
                            ['title' => 'Stimulus 3: Rules of the Simple Past Tense', 'content' => '[Keterangan Gambar: Rangkuman tata bahasa Simple Past Tense: Rumus Kalimat Verbal (+) S + V2 + O, (-) S + did not + V1 + O, (?) Did + S + V1 + O? Rumus Kalimat Nominal: (+) S + was/were + Adj/Noun, (-) S + was/were not + Adj/Noun, (?) Was/Were + S + Adj/Noun? Keterangan: was (I, he, she, it), were (you, we, they).]

In the Simple Past Tense, we distinguish between verbal sentences (using action verbs) and nominal sentences (using the linking verb to be: was or were). Regular verbs add -ed, while irregular verbs change irregularly. In negative and interrogative verbal sentences, the auxiliary *did* carries the past tense meaning, so the main verb returns to its base form (V1).'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Based on Stimulus 1, how did the students travel to the Science Center?',
                                'explanation' => 'In the text: "They departed from school at seven o\'clock by bus..."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'They traveled by bus.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'They took a train.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'They rode bicycles.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'They walked on foot.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What did the students watch in the giant dome planetarium?',
                                'explanation' => 'They watched a 3D movie about the solar system.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'A 3D movie about the solar system', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'A horror movie about ghosts', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'A cartoon about Mickey Mouse', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'A football match', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO activities done by the students during the excursion!',
                                'explanation' => 'Operating robotic arms and trying the whisper dish experiment.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Budi and Kevin operated a robotic arm to move blocks.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Siti tried the whisper dish experiment in the physics gallery.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'The students swam in a deep swimming pool.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'They planted rice seeds in a muddy field.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match each character/group with what they did yesterday!',
                                'explanation' => 'Pairs of characters and excursion activities.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Sixty students', 'is_correct' => false, 'match_key' => 'Visited the Science Center by bus', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Budi and Kevin', 'is_correct' => false, 'match_key' => 'Operated a robotic arm', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Siti', 'is_correct' => false, 'match_key' => 'Tried the whisper dish experiment', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Kak Dian', 'is_correct' => false, 'match_key' => 'Guided the students around exhibitions', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Why did Rian participate in the Junior City Fun Run?',
                                'explanation' => 'Rian participated in the Junior City Fun Run 5K competition.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'To run in the 5K competition and test his endurance', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'To sell sports shoes to runners', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'To take pictures of the town square', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'To watch television with his father', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What did Rian receive after crossing the finish line?',
                                'explanation' => 'Rian received a finisher medal and certificate.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'A shiny finisher medal and a certificate', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'A brand new sports car', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'A basket of tropical fruits', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'A ticket to an amusement park', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False based on Rian\'s diary entry!',
                                'explanation' => 'Rian continued running and finished in 28 minutes.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Rian woke up at five o\'clock in the morning on Sunday.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Rian stopped running at kilometer three and gave up.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Rian completed the 5K run in twenty-eight minutes.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'The sentence: "My father drove me to the town square" uses the irregular past verb "drove", which comes from ....',
                                'explanation' => 'Drive -> drove.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Drive', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Drived', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Driven', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Drives', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Which to be is used for the subject pronoun "We" in the past tense?',
                                'explanation' => 'We were.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Were', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Was', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Are', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Is', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'The correct nominal past sentence for "She is happy today" in the past is ....',
                                'explanation' => 'She was happy yesterday.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'She was happy yesterday.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'She were happy yesterday.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'She did happy yesterday.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'She been happy yesterday.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for nominal past sentences!',
                                'explanation' => 'I was sick (use was with I, not were).',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => '"They were at the museum last Sunday" is correct.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => '"I were sick yesterday" is grammatically correct.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => '"Was he at home last night?" is a correct question.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO sentences that correctly use "was" or "were"!',
                                'explanation' => 'Budi was and The students were are grammatically correct.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Budi was absent from school yesterday.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'The students were excited during the trip.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'We was very tired last night.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'She were in the classroom.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Yesterday, my family ... to the zoo by car.',
                                'explanation' => 'Past form of go is went.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'went', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'go', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'goes', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'going', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'She ... a delicious strawberry cake for my birthday party last week.',
                                'explanation' => 'Regular past verb: baked.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'baked', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'bake', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'baking', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'bakes', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'The students ... in the school yard two hours ago.',
                                'explanation' => 'Students (plural) uses were.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'were', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'was', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'are', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'is', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Edo did not ... soccer yesterday because it was raining.',
                                'explanation' => 'After did not, use base verb play.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'play', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'played', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'plays', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'playing', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Did you ... the historical monument yesterday?',
                                'explanation' => 'Did + S + base verb see.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'see', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'saw', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'seen', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'seeing', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Where ... you yesterday afternoon?',
                                'explanation' => 'Where were you yesterday?',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'were', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'was', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'did', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'are', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'My mother ... fresh vegetables at the supermarket this morning.',
                                'explanation' => 'Buy -> bought.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bought', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'buy', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'buyed', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'buying', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'The baby ... loudly because she was hungry last night.',
                                'explanation' => 'Cry -> cried.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'cried', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'cry', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'cryed', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'crying', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'We ... our lunch in the cafeteria yesterday.',
                                'explanation' => 'Eat -> ate.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ate', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'eat', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'eated', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'eating', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What did they ... in the art class yesterday?',
                                'explanation' => 'Base verb: draw.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'draw', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'drew', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'drawn', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'drawing', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO past time signals!',
                                'explanation' => 'Yesterday afternoon and last night indicate past time.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Yesterday afternoon', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Last night', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tomorrow morning', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Every day', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO irregular past verbs!',
                                'explanation' => 'Took and fell are irregular past verbs.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Took (from take)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Fell (from fall)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Helped (from help)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Cooked (from cook)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO grammatically correct negative past sentences!',
                                'explanation' => 'Didn\'t come and didn\'t watch are correct.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'He didn\'t come to my party yesterday.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'We didn\'t watch the football match.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'He didn\'t came yesterday.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'We didn\'t watched the match.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match the present verb with its past form!',
                                'explanation' => 'Pairs of irregular verbs.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Drink', 'is_correct' => false, 'match_key' => 'Drank', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Drive', 'is_correct' => false, 'match_key' => 'Drove', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Sing', 'is_correct' => false, 'match_key' => 'Sang', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Speak', 'is_correct' => false, 'match_key' => 'Spoke', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match the subject with the correct past to be (was/were)!',
                                'explanation' => 'Pairs of subjects and past to be.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'He', 'is_correct' => false, 'match_key' => 'was', 'order' => 1],
                                    ['label' => null, 'option_text' => 'They', 'is_correct' => false, 'match_key' => 'were', 'order' => 2],
                                    ['label' => null, 'option_text' => 'I', 'is_correct' => false, 'match_key' => 'was', 'order' => 3],
                                    ['label' => null, 'option_text' => 'You', 'is_correct' => false, 'match_key' => 'were', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match the question with the appropriate answer!',
                                'explanation' => 'Pairs of questions and answers.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Did you sleep well?', 'is_correct' => false, 'match_key' => 'Yes, I did.', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Where were you yesterday?', 'is_correct' => false, 'match_key' => 'I was at my uncle\'s house.', 'order' => 2],
                                    ['label' => null, 'option_text' => 'What did you eat for breakfast?', 'is_correct' => false, 'match_key' => 'I ate fried rice and eggs.', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Who helped you yesterday?', 'is_correct' => false, 'match_key' => 'My mother helped me.', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for Simple Past Tense!',
                                'explanation' => 'Write -> wrote (not writed).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'The past form of "run" is "ran".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'The past form of "write" is "writed".', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'The past form of "swim" is "swam".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for past negative forms!',
                                'explanation' => 'After didn\'t use base verb go.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => '"She didn\'t go" is correct.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => '"She didn\'t went" is correct.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => '"They weren\'t hungry" is a correct nominal negative sentence.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik pada soal berikut dengan jawaban yang tepat dan ringkas.',
                        'order' => 2,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past tense of "go" is ....',
                                'explanation' => 'Went.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'went', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past tense of "see" is ....',
                                'explanation' => 'Saw.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'saw', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past tense of "buy" is ....',
                                'explanation' => 'Bought.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'bought', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past tense of "eat" is ....',
                                'explanation' => 'Ate.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'ate', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past tense of "drink" is ....',
                                'explanation' => 'Drank.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'drank', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past to be for "I" is ....',
                                'explanation' => 'I was.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'was', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past to be for "They" is ....',
                                'explanation' => 'They were.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'were', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete the negative: "He ... (not finish) his homework yesterday."',
                                'explanation' => 'didn\'t finish.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'didn\'t finish', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete the question: "... you visit your grandmother last weekend?"',
                                'explanation' => 'Did.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Did', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past form of the regular verb "play" is ....',
                                'explanation' => 'Played.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'played', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past form of the regular verb "study" is ....',
                                'explanation' => 'Studied.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'studied', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'A past time marker meaning "tadi malam" is last ....',
                                'explanation' => 'Last night.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'night', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete: "Where ... you yesterday afternoon?" - "I was at home."',
                                'explanation' => 'Were.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'were', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete: "What did you ... (find) in the garden yesterday?"',
                                'explanation' => 'Find (base form).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'find', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past form of "make" is ....',
                                'explanation' => 'Made.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'made', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Soal Uraian Komprehensif',
                        'instructions' => 'Jawablah pertanyaan-pertanyaan berikut dengan menyertakan langkah penyelesaian, rumus, atau argumen logis yang terstruktur.',
                        'order' => 3,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Explain the difference between regular and irregular verbs in the Simple Past Tense, and provide three examples for each category along with their base and past forms!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
1. Regular Verbs: Form their past tense by adding -ed or -d to the base form.
   - wash -> washed
   - clean -> cleaned
   - play -> played
2. Irregular Verbs: Do not add -ed; their past forms change irregularly or stay identical.
   - go -> went
   - eat -> ate
   - buy -> bought',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Change the following present tense sentences into correct Simple Past Tense sentences!
a. (+) Kevin visits his grandparents in Yogyakarta.
b. (-) We do not see any monkeys at the zoo.
c. (?) Do you buy a new drawing book at the shop?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
a. (+) "Kevin visited his grandparents in Yogyakarta yesterday."
b. (-) "We didn\'t see (did not see) any monkeys at the zoo yesterday."
c. (?) "Did you buy a new drawing book at the shop yesterday?"',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Explain when to use "was" and when to use "were" in nominal past sentences, and write two example sentences for each!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
1. "Was" is used with singular subjects: I, He, She, It, or singular nouns.
   - Example 1: "I was at home yesterday evening."
   - Example 2: "She was very happy with her test score."
2. "Were" is used with plural subjects: You, We, They, or plural nouns.
   - Example 1: "They were in the library two hours ago."
   - Example 2: "We were excited during the school trip."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Rearrange the jumbled words into correct past sentences!
a. yesterday / museum / went / the / they / to / .
b. did / what / last / cook / mother / your / night / ?
c. soccer / didn\'t / in / play / field / we / the / .',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
a. "They went to the museum yesterday."
b. "What did your mother cook last night?"
c. "We didn\'t play soccer in the field."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Write a short recount paragraph (4-5 sentences) describing what you did last Sunday morning, including at least two regular past verbs and two irregular past verbs!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
Sample Paragraph:
"Last Sunday morning, I woke up at six o\'clock and helped my parents at home (regular). First, I cleaned my bedroom and swept the front porch (regular). After that, my father and I went to the traditional market (irregular). We bought fresh fruits and vegetables, and we ate warm banana fritters together happily (irregular)."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Asesmen Sumatif Tengah Semester 1 (ASTS 1) Bahasa Inggris Kelas 6 - Paket B',
                'type' => 'exam',
                'description' => 'Asesmen sumatif tengah semester ganjil (Paket B): Pengujian komprehensif Unit 1 mencakup regular/irregular past verbs, past time expressions, dan nominal sentences.',
                'duration_minutes' => 75,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Visiting a Dairy Farm in Lembang', 'content' => '[Keterangan Gambar: Siswa-siswi kelas 6 sedang mengunjungi peternakan sapi perah di Lembang: mereka belajar memerah susu sapi dan memberi makan sapi dengan rumput gajah.]

Last Saturday, grade 6 students had a field study at a dairy farm in Lembang, West Java. The bus left the school at half past six in the morning. When they arrived, Pak Asep, the farm manager, welcomed them and distributed sterile boots and aprons.

During the tour, the students learned how cows produce fresh milk. First, they fed the dairy cows with fresh elephant grass. Next, Pak Asep demonstrated how to milk a cow safely and hygienically. Siti and Rian tried milking a cow under the farmer\'s guidance. At the end of the visit, the farm provided each student with a bottle of pasteurized strawberry milk. The students drank the milk happily and thanked Pak Asep for the wonderful educational experience.'],
                            ['title' => 'Stimulus 2: Diary Entry - My Unforgettable Sunday', 'content' => '[Keterangan Gambar: Halaman buku harian bersampul cokelat dengan tulisan tangan Rian tentang pengalamannya mengikuti lomba lari maraton anak 5 km.]

Dear Diary,
Sunday, 18 October 2026 was one of the most unforgettable days of my life. I participated in the Junior City Fun Run 5K competition. I woke up at five o\'clock and ate a banana with warm milk. My father drove me to the town square where hundreds of young runners gathered.

When the whistle blew, I started running steadily. At kilometer three, my legs felt very heavy and tired. However, I remembered my coach\'s advice: "Never give up when you are tired; stop only when you finish!" I continued running and crossed the finish line in twenty-eight minutes. I received a shiny finisher medal and a certificate. My parents hugged me warmly and took many photos. I felt exhausted, but I was extremely proud of my determination.'],
                            ['title' => 'Stimulus 3: Rules of the Simple Past Tense', 'content' => '[Keterangan Gambar: Rangkuman tata bahasa Simple Past Tense: Rumus Kalimat Verbal (+) S + V2 + O, (-) S + did not + V1 + O, (?) Did + S + V1 + O? Rumus Kalimat Nominal: (+) S + was/were + Adj/Noun, (-) S + was/were not + Adj/Noun, (?) Was/Were + S + Adj/Noun? Keterangan: was (I, he, she, it), were (you, we, they).]

In the Simple Past Tense, we distinguish between verbal sentences (using action verbs) and nominal sentences (using the linking verb to be: was or were). Regular verbs add -ed, while irregular verbs change irregularly. In negative and interrogative verbal sentences, the auxiliary *did* carries the past tense meaning, so the main verb returns to its base form (V1).'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Based on Stimulus 1, what did the students do first at the dairy farm?',
                                'explanation' => 'They fed the dairy cows with fresh elephant grass.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'They fed the dairy cows with fresh elephant grass.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'They swam in the river.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'They cooked beef steak.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'They rode horses.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What did the farm provide to each student at the end of the visit?',
                                'explanation' => 'A bottle of pasteurized strawberry milk.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'A bottle of pasteurized strawberry milk', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'A bucket of fresh grass', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'A new bicycle', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'A toy cow', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO activities done by the students at the farm!',
                                'explanation' => 'Milking cows and feeding cows with grass.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'They tried milking a cow under the farmer\'s guidance.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'They fed the cows with fresh grass.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'They climbed tall pine trees.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'They painted the farm fence blue.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan aspek kunjungan peternakan sapi dengan keterangannya!',
                                'explanation' => 'Pairs of dairy farm excursion facts.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Location', 'is_correct' => false, 'match_key' => 'Dairy farm in Lembang, West Java', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Guide / Manager', 'is_correct' => false, 'match_key' => 'Pak Asep', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Activity', 'is_correct' => false, 'match_key' => 'Feeding cows and milking demonstrations', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Complimentary gift', 'is_correct' => false, 'match_key' => 'Pasteurized strawberry milk', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Why did Rian participate in the Junior City Fun Run?',
                                'explanation' => 'Rian participated in the Junior City Fun Run 5K competition.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'To run in the 5K competition and test his endurance', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'To sell sports shoes to runners', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'To take pictures of the town square', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'To watch television with his father', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What did Rian receive after crossing the finish line?',
                                'explanation' => 'Rian received a finisher medal and certificate.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'A shiny finisher medal and a certificate', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'A brand new sports car', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'A basket of tropical fruits', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'A ticket to an amusement park', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False based on Rian\'s diary entry!',
                                'explanation' => 'Rian continued running and finished in 28 minutes.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Rian woke up at five o\'clock in the morning on Sunday.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Rian stopped running at kilometer three and gave up.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Rian completed the 5K run in twenty-eight minutes.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'The sentence: "My father drove me to the town square" uses the irregular past verb "drove", which comes from ....',
                                'explanation' => 'Drive -> drove.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Drive', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Drived', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Driven', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Drives', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Which to be is used for the subject pronoun "We" in the past tense?',
                                'explanation' => 'We were.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Were', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Was', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Are', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Is', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'The correct nominal past sentence for "She is happy today" in the past is ....',
                                'explanation' => 'She was happy yesterday.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'She was happy yesterday.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'She were happy yesterday.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'She did happy yesterday.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'She been happy yesterday.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for nominal past sentences!',
                                'explanation' => 'I was sick (use was with I, not were).',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => '"They were at the museum last Sunday" is correct.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => '"I were sick yesterday" is grammatically correct.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => '"Was he at home last night?" is a correct question.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO sentences that correctly use "was" or "were"!',
                                'explanation' => 'Budi was and The students were are grammatically correct.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Budi was absent from school yesterday.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'The students were excited during the trip.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'We was very tired last night.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'She were in the classroom.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Yesterday, my family ... to the zoo by car.',
                                'explanation' => 'Past form of go is went.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'went', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'go', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'goes', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'going', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'She ... a delicious strawberry cake for my birthday party last week.',
                                'explanation' => 'Regular past verb: baked.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'baked', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'bake', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'baking', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'bakes', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'The students ... in the school yard two hours ago.',
                                'explanation' => 'Students (plural) uses were.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'were', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'was', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'are', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'is', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Edo did not ... soccer yesterday because it was raining.',
                                'explanation' => 'After did not, use base verb play.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'play', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'played', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'plays', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'playing', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Did you ... the historical monument yesterday?',
                                'explanation' => 'Did + S + base verb see.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'see', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'saw', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'seen', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'seeing', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Where ... you yesterday afternoon?',
                                'explanation' => 'Where were you yesterday?',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'were', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'was', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'did', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'are', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'My mother ... fresh vegetables at the supermarket this morning.',
                                'explanation' => 'Buy -> bought.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bought', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'buy', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'buyed', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'buying', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'The baby ... loudly because she was hungry last night.',
                                'explanation' => 'Cry -> cried.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'cried', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'cry', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'cryed', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'crying', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'We ... our lunch in the cafeteria yesterday.',
                                'explanation' => 'Eat -> ate.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ate', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'eat', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'eated', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'eating', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What did they ... in the art class yesterday?',
                                'explanation' => 'Base verb: draw.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'draw', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'drew', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'drawn', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'drawing', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO past time signals!',
                                'explanation' => 'Yesterday afternoon and last night indicate past time.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Yesterday afternoon', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Last night', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tomorrow morning', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Every day', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO irregular past verbs!',
                                'explanation' => 'Took and fell are irregular past verbs.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Took (from take)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Fell (from fall)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Helped (from help)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Cooked (from cook)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO grammatically correct negative past sentences!',
                                'explanation' => 'Didn\'t come and didn\'t watch are correct.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'He didn\'t come to my party yesterday.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'We didn\'t watch the football match.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'He didn\'t came yesterday.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'We didn\'t watched the match.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match the present verb with its past form!',
                                'explanation' => 'Pairs of irregular verbs.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Drink', 'is_correct' => false, 'match_key' => 'Drank', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Drive', 'is_correct' => false, 'match_key' => 'Drove', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Sing', 'is_correct' => false, 'match_key' => 'Sang', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Speak', 'is_correct' => false, 'match_key' => 'Spoke', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match the subject with the correct past to be (was/were)!',
                                'explanation' => 'Pairs of subjects and past to be.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'He', 'is_correct' => false, 'match_key' => 'was', 'order' => 1],
                                    ['label' => null, 'option_text' => 'They', 'is_correct' => false, 'match_key' => 'were', 'order' => 2],
                                    ['label' => null, 'option_text' => 'I', 'is_correct' => false, 'match_key' => 'was', 'order' => 3],
                                    ['label' => null, 'option_text' => 'You', 'is_correct' => false, 'match_key' => 'were', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match the question with the appropriate answer!',
                                'explanation' => 'Pairs of questions and answers.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Did you sleep well?', 'is_correct' => false, 'match_key' => 'Yes, I did.', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Where were you yesterday?', 'is_correct' => false, 'match_key' => 'I was at my uncle\'s house.', 'order' => 2],
                                    ['label' => null, 'option_text' => 'What did you eat for breakfast?', 'is_correct' => false, 'match_key' => 'I ate fried rice and eggs.', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Who helped you yesterday?', 'is_correct' => false, 'match_key' => 'My mother helped me.', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for Simple Past Tense!',
                                'explanation' => 'Write -> wrote (not writed).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'The past form of "run" is "ran".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'The past form of "write" is "writed".', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'The past form of "swim" is "swam".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for past negative forms!',
                                'explanation' => 'After didn\'t use base verb go.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => '"She didn\'t go" is correct.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => '"She didn\'t went" is correct.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => '"They weren\'t hungry" is a correct nominal negative sentence.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik pada soal berikut dengan jawaban yang tepat dan ringkas.',
                        'order' => 2,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past tense of "go" is ....',
                                'explanation' => 'Went.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'went', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past tense of "see" is ....',
                                'explanation' => 'Saw.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'saw', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past tense of "buy" is ....',
                                'explanation' => 'Bought.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'bought', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past tense of "eat" is ....',
                                'explanation' => 'Ate.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'ate', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past tense of "drink" is ....',
                                'explanation' => 'Drank.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'drank', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past to be for "I" is ....',
                                'explanation' => 'I was.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'was', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past to be for "They" is ....',
                                'explanation' => 'They were.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'were', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete the negative: "He ... (not finish) his homework yesterday."',
                                'explanation' => 'didn\'t finish.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'didn\'t finish', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete the question: "... you visit your grandmother last weekend?"',
                                'explanation' => 'Did.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Did', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past form of the regular verb "play" is ....',
                                'explanation' => 'Played.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'played', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past form of the regular verb "study" is ....',
                                'explanation' => 'Studied.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'studied', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'A past time marker meaning "tadi malam" is last ....',
                                'explanation' => 'Last night.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'night', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete: "Where ... you yesterday afternoon?" - "I was at home."',
                                'explanation' => 'Were.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'were', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete: "What did you ... (find) in the garden yesterday?"',
                                'explanation' => 'Find (base form).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'find', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past form of "make" is ....',
                                'explanation' => 'Made.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'made', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Soal Uraian Komprehensif',
                        'instructions' => 'Jawablah pertanyaan-pertanyaan berikut dengan menyertakan langkah penyelesaian, rumus, atau argumen logis yang terstruktur.',
                        'order' => 3,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Explain the difference between regular and irregular verbs in the Simple Past Tense, and provide three examples for each category along with their base and past forms!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
1. Regular Verbs: Form their past tense by adding -ed or -d to the base form.
   - wash -> washed
   - clean -> cleaned
   - play -> played
2. Irregular Verbs: Do not add -ed; their past forms change irregularly or stay identical.
   - go -> went
   - eat -> ate
   - buy -> bought',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Change the following present tense sentences into correct Simple Past Tense sentences!
a. (+) Kevin visits his grandparents in Yogyakarta.
b. (-) We do not see any monkeys at the zoo.
c. (?) Do you buy a new drawing book at the shop?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
a. (+) "Kevin visited his grandparents in Yogyakarta yesterday."
b. (-) "We didn\'t see (did not see) any monkeys at the zoo yesterday."
c. (?) "Did you buy a new drawing book at the shop yesterday?"',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Explain when to use "was" and when to use "were" in nominal past sentences, and write two example sentences for each!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
1. "Was" is used with singular subjects: I, He, She, It, or singular nouns.
   - Example 1: "I was at home yesterday evening."
   - Example 2: "She was very happy with her test score."
2. "Were" is used with plural subjects: You, We, They, or plural nouns.
   - Example 1: "They were in the library two hours ago."
   - Example 2: "We were excited during the school trip."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Rearrange the jumbled words into correct past sentences!
a. yesterday / museum / went / the / they / to / .
b. did / what / last / cook / mother / your / night / ?
c. soccer / didn\'t / in / play / field / we / the / .',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
a. "They went to the museum yesterday."
b. "What did your mother cook last night?"
c. "We didn\'t play soccer in the field."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Write a short recount paragraph (4-5 sentences) describing what you did last Sunday morning, including at least two regular past verbs and two irregular past verbs!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
Sample Paragraph:
"Last Sunday morning, I woke up at six o\'clock and helped my parents at home (regular). First, I cleaned my bedroom and swept the front porch (regular). After that, my father and I went to the traditional market (irregular). We bought fresh fruits and vegetables, and we ate warm banana fritters together happily (irregular)."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Asesmen Sumatif Tengah Semester 1 (ASTS 1) Bahasa Inggris Kelas 6 - Paket C',
                'type' => 'exam',
                'description' => 'Asesmen sumatif tengah semester ganjil (Paket C): Evaluasi terpadu Unit 1 mengukur pemahaman teks recount lampau, pemakaian regular/irregular verbs, dan kalimat tanya lampau.',
                'duration_minutes' => 75,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: A Day at the Mangrove Conservation Forest', 'content' => '[Keterangan Gambar: Siswa-siswi menanam bibit pohon mangrove di rawa pesisir pantai berlumpur dengan sepatu bot karet.]

Last month, our school held an environmental camp at the Mangrove Conservation Forest in Kulon Progo. We left at seven o\'clock and arrived after a forty-minute bus ride. The forest ranger, Pak Joko, gave a briefing about the importance of mangrove trees for preventing coastal erosion.

After the briefing, we planted sixty young mangrove seedlings in the muddy tidal zone. My shoes got stuck in the mud, but it was great fun! In the afternoon, we walked along the wooden boardwalk and observed colorful kingfishers and mudskippers. We took many photos for our science scrapbooks. We left the conservation center at four o\'clock feeling proud of our contribution to nature.'],
                            ['title' => 'Stimulus 2: Diary Entry - My Unforgettable Sunday', 'content' => '[Keterangan Gambar: Halaman buku harian bersampul cokelat dengan tulisan tangan Rian tentang pengalamannya mengikuti lomba lari maraton anak 5 km.]

Dear Diary,
Sunday, 18 October 2026 was one of the most unforgettable days of my life. I participated in the Junior City Fun Run 5K competition. I woke up at five o\'clock and ate a banana with warm milk. My father drove me to the town square where hundreds of young runners gathered.

When the whistle blew, I started running steadily. At kilometer three, my legs felt very heavy and tired. However, I remembered my coach\'s advice: "Never give up when you are tired; stop only when you finish!" I continued running and crossed the finish line in twenty-eight minutes. I received a shiny finisher medal and a certificate. My parents hugged me warmly and took many photos. I felt exhausted, but I was extremely proud of my determination.'],
                            ['title' => 'Stimulus 3: Rules of the Simple Past Tense', 'content' => '[Keterangan Gambar: Rangkuman tata bahasa Simple Past Tense: Rumus Kalimat Verbal (+) S + V2 + O, (-) S + did not + V1 + O, (?) Did + S + V1 + O? Rumus Kalimat Nominal: (+) S + was/were + Adj/Noun, (-) S + was/were not + Adj/Noun, (?) Was/Were + S + Adj/Noun? Keterangan: was (I, he, she, it), were (you, we, they).]

In the Simple Past Tense, we distinguish between verbal sentences (using action verbs) and nominal sentences (using the linking verb to be: was or were). Regular verbs add -ed, while irregular verbs change irregularly. In negative and interrogative verbal sentences, the auxiliary *did* carries the past tense meaning, so the main verb returns to its base form (V1).'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Based on Stimulus 1, why are mangrove trees important according to Pak Joko?',
                                'explanation' => 'Mangrove trees prevent coastal erosion.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'To prevent coastal erosion from sea waves', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'To produce sweet fruits for animals', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'To build tall wooden houses in the sea', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'To provide shelter for sharks', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'How many mangrove seedlings did the students plant in the tidal zone?',
                                'explanation' => 'They planted sixty young mangrove seedlings.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Sixty seedlings', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Ten seedlings', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'A hundred seedlings', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Twenty seedlings', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO animals observed by the students from the wooden boardwalk!',
                                'explanation' => 'Kingfishers and mudskippers.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Kingfishers (birds)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Mudskippers (fish)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Lions and tigers', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Polar bears', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan aspek kunjungan hutan mangrove dengan faktanya!',
                                'explanation' => 'Pairs of mangrove conservation facts.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Location', 'is_correct' => false, 'match_key' => 'Mangrove Forest in Kulon Progo', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Forest Ranger', 'is_correct' => false, 'match_key' => 'Pak Joko', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Main Activity', 'is_correct' => false, 'match_key' => 'Planting sixty mangrove seedlings', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Animals Observed', 'is_correct' => false, 'match_key' => 'Kingfishers and mudskippers', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Why did Rian participate in the Junior City Fun Run?',
                                'explanation' => 'Rian participated in the Junior City Fun Run 5K competition.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'To run in the 5K competition and test his endurance', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'To sell sports shoes to runners', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'To take pictures of the town square', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'To watch television with his father', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What did Rian receive after crossing the finish line?',
                                'explanation' => 'Rian received a finisher medal and certificate.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'A shiny finisher medal and a certificate', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'A brand new sports car', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'A basket of tropical fruits', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'A ticket to an amusement park', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False based on Rian\'s diary entry!',
                                'explanation' => 'Rian continued running and finished in 28 minutes.',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Rian woke up at five o\'clock in the morning on Sunday.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Rian stopped running at kilometer three and gave up.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Rian completed the 5K run in twenty-eight minutes.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'The sentence: "My father drove me to the town square" uses the irregular past verb "drove", which comes from ....',
                                'explanation' => 'Drive -> drove.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Drive', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Drived', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Driven', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Drives', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Which to be is used for the subject pronoun "We" in the past tense?',
                                'explanation' => 'We were.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Were', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Was', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Are', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Is', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'The correct nominal past sentence for "She is happy today" in the past is ....',
                                'explanation' => 'She was happy yesterday.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'She was happy yesterday.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'She were happy yesterday.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'She did happy yesterday.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'She been happy yesterday.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for nominal past sentences!',
                                'explanation' => 'I was sick (use was with I, not were).',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => '"They were at the museum last Sunday" is correct.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => '"I were sick yesterday" is grammatically correct.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => '"Was he at home last night?" is a correct question.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO sentences that correctly use "was" or "were"!',
                                'explanation' => 'Budi was and The students were are grammatically correct.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Budi was absent from school yesterday.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'The students were excited during the trip.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'We was very tired last night.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'She were in the classroom.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Yesterday, my family ... to the zoo by car.',
                                'explanation' => 'Past form of go is went.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'went', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'go', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'goes', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'going', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'She ... a delicious strawberry cake for my birthday party last week.',
                                'explanation' => 'Regular past verb: baked.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'baked', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'bake', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'baking', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'bakes', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'The students ... in the school yard two hours ago.',
                                'explanation' => 'Students (plural) uses were.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'were', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'was', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'are', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'is', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 16,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Edo did not ... soccer yesterday because it was raining.',
                                'explanation' => 'After did not, use base verb play.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'play', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'played', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'plays', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'playing', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Did you ... the historical monument yesterday?',
                                'explanation' => 'Did + S + base verb see.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'see', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'saw', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'seen', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'seeing', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Where ... you yesterday afternoon?',
                                'explanation' => 'Where were you yesterday?',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'were', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'was', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'did', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'are', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'My mother ... fresh vegetables at the supermarket this morning.',
                                'explanation' => 'Buy -> bought.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'bought', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'buy', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'buyed', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'buying', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'The baby ... loudly because she was hungry last night.',
                                'explanation' => 'Cry -> cried.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'cried', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'cry', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'cryed', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'crying', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'We ... our lunch in the cafeteria yesterday.',
                                'explanation' => 'Eat -> ate.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'ate', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'eat', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'eated', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'eating', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What did they ... in the art class yesterday?',
                                'explanation' => 'Base verb: draw.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'draw', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'drew', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'drawn', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'drawing', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO past time signals!',
                                'explanation' => 'Yesterday afternoon and last night indicate past time.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Yesterday afternoon', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Last night', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tomorrow morning', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Every day', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO irregular past verbs!',
                                'explanation' => 'Took and fell are irregular past verbs.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Took (from take)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Fell (from fall)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Helped (from help)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Cooked (from cook)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO grammatically correct negative past sentences!',
                                'explanation' => 'Didn\'t come and didn\'t watch are correct.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'He didn\'t come to my party yesterday.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'We didn\'t watch the football match.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'He didn\'t came yesterday.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'We didn\'t watched the match.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match the present verb with its past form!',
                                'explanation' => 'Pairs of irregular verbs.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Drink', 'is_correct' => false, 'match_key' => 'Drank', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Drive', 'is_correct' => false, 'match_key' => 'Drove', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Sing', 'is_correct' => false, 'match_key' => 'Sang', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Speak', 'is_correct' => false, 'match_key' => 'Spoke', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match the subject with the correct past to be (was/were)!',
                                'explanation' => 'Pairs of subjects and past to be.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'He', 'is_correct' => false, 'match_key' => 'was', 'order' => 1],
                                    ['label' => null, 'option_text' => 'They', 'is_correct' => false, 'match_key' => 'were', 'order' => 2],
                                    ['label' => null, 'option_text' => 'I', 'is_correct' => false, 'match_key' => 'was', 'order' => 3],
                                    ['label' => null, 'option_text' => 'You', 'is_correct' => false, 'match_key' => 'were', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Match the question with the appropriate answer!',
                                'explanation' => 'Pairs of questions and answers.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Did you sleep well?', 'is_correct' => false, 'match_key' => 'Yes, I did.', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Where were you yesterday?', 'is_correct' => false, 'match_key' => 'I was at my uncle\'s house.', 'order' => 2],
                                    ['label' => null, 'option_text' => 'What did you eat for breakfast?', 'is_correct' => false, 'match_key' => 'I ate fried rice and eggs.', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Who helped you yesterday?', 'is_correct' => false, 'match_key' => 'My mother helped me.', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for Simple Past Tense!',
                                'explanation' => 'Write -> wrote (not writed).',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'The past form of "run" is "ran".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'The past form of "write" is "writed".', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'The past form of "swim" is "swam".', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for past negative forms!',
                                'explanation' => 'After didn\'t use base verb go.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => '"She didn\'t go" is correct.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => '"She didn\'t went" is correct.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => '"They weren\'t hungry" is a correct nominal negative sentence.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 2: Isian Singkat',
                        'instructions' => 'Isilah titik-titik pada soal berikut dengan jawaban yang tepat dan ringkas.',
                        'order' => 2,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past tense of "go" is ....',
                                'explanation' => 'Went.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'went', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past tense of "see" is ....',
                                'explanation' => 'Saw.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'saw', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past tense of "buy" is ....',
                                'explanation' => 'Bought.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'bought', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past tense of "eat" is ....',
                                'explanation' => 'Ate.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'ate', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past tense of "drink" is ....',
                                'explanation' => 'Drank.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'drank', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past to be for "I" is ....',
                                'explanation' => 'I was.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'was', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past to be for "They" is ....',
                                'explanation' => 'They were.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'were', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete the negative: "He ... (not finish) his homework yesterday."',
                                'explanation' => 'didn\'t finish.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'didn\'t finish', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete the question: "... you visit your grandmother last weekend?"',
                                'explanation' => 'Did.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Did', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past form of the regular verb "play" is ....',
                                'explanation' => 'Played.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'played', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past form of the regular verb "study" is ....',
                                'explanation' => 'Studied.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'studied', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'A past time marker meaning "tadi malam" is last ....',
                                'explanation' => 'Last night.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'night', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete: "Where ... you yesterday afternoon?" - "I was at home."',
                                'explanation' => 'Were.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'were', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'Complete: "What did you ... (find) in the garden yesterday?"',
                                'explanation' => 'Find (base form).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'find', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => 'The past form of "make" is ....',
                                'explanation' => 'Made.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'made', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                        ],
                    ],
                    [
                        'title' => 'Bagian 3: Soal Uraian Komprehensif',
                        'instructions' => 'Jawablah pertanyaan-pertanyaan berikut dengan menyertakan langkah penyelesaian, rumus, atau argumen logis yang terstruktur.',
                        'order' => 3,
                        'question_groups' => [
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Explain the difference between regular and irregular verbs in the Simple Past Tense, and provide three examples for each category along with their base and past forms!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
1. Regular Verbs: Form their past tense by adding -ed or -d to the base form.
   - wash -> washed
   - clean -> cleaned
   - play -> played
2. Irregular Verbs: Do not add -ed; their past forms change irregularly or stay identical.
   - go -> went
   - eat -> ate
   - buy -> bought',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Change the following present tense sentences into correct Simple Past Tense sentences!
a. (+) Kevin visits his grandparents in Yogyakarta.
b. (-) We do not see any monkeys at the zoo.
c. (?) Do you buy a new drawing book at the shop?',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
a. (+) "Kevin visited his grandparents in Yogyakarta yesterday."
b. (-) "We didn\'t see (did not see) any monkeys at the zoo yesterday."
c. (?) "Did you buy a new drawing book at the shop yesterday?"',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Explain when to use "was" and when to use "were" in nominal past sentences, and write two example sentences for each!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
1. "Was" is used with singular subjects: I, He, She, It, or singular nouns.
   - Example 1: "I was at home yesterday evening."
   - Example 2: "She was very happy with her test score."
2. "Were" is used with plural subjects: You, We, They, or plural nouns.
   - Example 1: "They were in the library two hours ago."
   - Example 2: "We were excited during the school trip."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Rearrange the jumbled words into correct past sentences!
a. yesterday / museum / went / the / they / to / .
b. did / what / last / cook / mother / your / night / ?
c. soccer / didn\'t / in / play / field / we / the / .',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
a. "They went to the museum yesterday."
b. "What did your mother cook last night?"
c. "We didn\'t play soccer in the field."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => 'Write a short recount paragraph (4-5 sentences) describing what you did last Sunday morning, including at least two regular past verbs and two irregular past verbs!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
Sample Paragraph:
"Last Sunday morning, I woke up at six o\'clock and helped my parents at home (regular). First, I cleaned my bedroom and swept the front porch (regular). After that, my father and I went to the traditional market (irregular). We bought fresh fruits and vegetables, and we ate warm banana fritters together happily (irregular)."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
