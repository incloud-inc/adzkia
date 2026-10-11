<?php

namespace Database\Seeders\Data;

class BahasaInggrisGrade6ASASSemester1Data
{
    /**
     * Data bundle asesmen Kelas 6 SD Kurikulum Merdeka Fase C.
     */
    public static function getAssessments(): array
    {
        return [
            [
                'title' => 'Asesmen Sumatif Akhir Semester 1 (ASAS 1) Bahasa Inggris Kelas 6 - Paket A',
                'type' => 'exam',
                'description' => 'Ujian akhir semester ganjil (Paket A): Menguji penguasaan komprehensif Unit 1 dan Unit 2 mencakup Simple Past Tense (regular/irregular verbs, nominal past was/were), kalimat tanya/negatif, struktur Recount Text, sequence words, dan kata sifat emosi.',
                'duration_minutes' => 75,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Visiting Raja Ampat with My Family', 'content' => '[Keterangan Gambar: Panorama gugusan pulau karang karst hijau di tengah laut biru toska Raja Ampat, Papua Barat Daya: dua penyelam cilik bersnorkel melihat penyu dan karang.]

Last December holiday, my family and I had an extraordinary vacation in Raja Ampat, Southwest Papua. We flew from Jakarta to Sorong, and then we took a fast ferry to Waisai, the capital of Raja Ampat. The journey was long, but our exhaustion vanished when we saw the turquoise sea and limestone islets.

On the first morning, we went snorkeling at Friwen Beach. The water was crystal clear! I saw colorful clownfish, sea turtles, and healthy coral reefs. In the afternoon, we hiked up to the famous Piaynemo viewpoint. We climbed over three hundred wooden steps under the warm tropical sun. When we reached the top, the panoramic view was breathtaking! On our last day, we visited a local village and learned how to weave mats from pandanus leaves. We felt truly grateful for the unforgettable adventure in the heart of Indonesia\'s marine paradise.'],
                            ['title' => 'Stimulus 2: Diary of a Young Badminton Champion', 'content' => '[Keterangan Gambar: Kevin tersenyum bangga di atas podium juara turnamen bulu tangkis yunior tingkat provinsi memegang piala emas dan raket.]

Saturday, 14 November 2026
Today was a historic day for me. Yesterday afternoon, I competed in the final match of the Junior Provincial Badminton Championship. My opponent was Rian, a skilled player from Bandung.

In the first set, I lost 18-21 because I made several unforced errors. During the break, my coach encouraged me: "Stay focused, Kevin! Move quickly and play with confidence." In the second set, I changed my strategy and won 21-16. In the rubber set, the match was intense. Both of us fought hard for every single point. Finally, with a sharp smash to the back corner, I won the match 21-19! The crowd cheered loudly. My coach and parents hugged me with tears of joy. I felt exhausted, but I was extremely proud of my hard work and perseverance.'],
                            ['title' => 'Stimulus 3: Comprehensive Review of the Simple Past Tense', 'content' => '[Keterangan Gambar: Ringkasan aturan Simple Past Tense: Verbal vs Nominal sentences, regular vs irregular verbs, time signals (yesterday, last week, ago), and question forms (Did + S + V1? / Wh- + did + S + V1?).]

The Simple Past Tense is the foundational tense for narrative and recount writing. It describes events that started and finished in the past. Remember: always use the base verb (V1) after *did* or *didn\'t*. For nominal sentences without action verbs, use *was* for singular subjects (I, he, she, it) and *were* for plural subjects (we, you, they).'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Based on Stimulus 1, how did the writer\'s family travel from Sorong to Waisai?',
                                'explanation' => 'In the text: "we took a fast ferry to Waisai..."',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'They took a fast ferry across the sea.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'They rode a train through the jungle.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'They drove a private car.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'They flew by a helicopter.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What did the writer see while snorkeling at Friwen Beach?',
                                'explanation' => 'The writer saw clownfish, sea turtles, and corals.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Colorful clownfish, sea turtles, and coral reefs', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Sharks and giant blue whales', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Submarines and sunken warships', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Icebergs and polar penguins', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO activities done by the writer\'s family in Raja Ampat!',
                                'explanation' => 'Hiked up to Piaynemo and learned weaving in the village.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Hiked up to the famous Piaynemo viewpoint', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Learned how to weave mats from pandanus leaves', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Skied down snowy mountains', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Went camping in a pine forest', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan lokasi di Raja Ampat dengan kegiatan yang dilakukan!',
                                'explanation' => 'Pairs of Raja Ampat locations and activities.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Sorong to Waisai', 'is_correct' => false, 'match_key' => 'Traveled by fast ferry', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Friwen Beach', 'is_correct' => false, 'match_key' => 'Snorkeling with turtles and clownfish', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Piaynemo viewpoint', 'is_correct' => false, 'match_key' => 'Climbed 300 steps to see breathtaking islets', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Local village', 'is_correct' => false, 'match_key' => 'Learned weaving pandanus mats', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Why did Kevin lose the first set of the badminton final?',
                                'explanation' => 'In the text: "I lost 18-21 because I made several unforced errors."',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Because he made several unforced errors', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Because his racket was broken', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Because he arrived late at the stadium', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Because the referee was unfair', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'How did Kevin feel after winning the intense rubber set?',
                                'explanation' => 'Kevin felt exhausted, but extremely proud.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'He felt exhausted, but extremely proud of his perseverance.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'He felt bored and wanted to go home.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'He felt angry with his opponent.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'He felt scared of the cheering crowd.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False based on the diary entry!',
                                'explanation' => 'Rian was from Bandung (not Surabaya).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kevin won the final match after playing three sets (rubber set).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kevin\'s opponent in the final was from Surabaya.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kevin won the final set with a score of 21-19.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What regular past verb indicates the crowd\'s reaction when Kevin won?',
                                'explanation' => 'The crowd "cheered" loudly.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Cheered', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Lost', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Fought', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Won', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Which auxiliary verb is used for negative and interrogative verbal past sentences?',
                                'explanation' => 'Auxiliary: did / didn\'t.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Did', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Do', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Does', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Have', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Which sentence is grammatically correct in the past tense?',
                                'explanation' => 'Did you watch... (use base verb watch).',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Did you watch the badminton final yesterday?', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Did you watched the badminton final yesterday?', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Were you watch the badminton final yesterday?', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Do you watched the badminton final yesterday?', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for Simple Past Tense grammar rules!',
                                'explanation' => 'Irregular verbs do not follow the -ed rule.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Regular verbs add -ed or -d in the positive past form.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Irregular verbs always follow the -ed rule.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => '"She didn\'t eat breakfast" is grammatically correct.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO correct past nominal sentences!',
                                'explanation' => 'They were happy and He was a champion are correct.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'They were happy during the holiday.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'He was a champion last year.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'They was happy during the holiday.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'He were a champion last year.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 1] Budi ... his bicycle in the front yard yesterday afternoon.',
                                'explanation' => 'Washed.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'washed', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'wash', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'washes', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'washing', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 1] My sister ... an interesting novel last night.',
                                'explanation' => 'Past form of read is read (pronounced /red/).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'read', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'reads', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'reading', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'reader', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 1] They ... at home yesterday because it was a national holiday.',
                                'explanation' => 'They were.',
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
                                'prompt' => '[Unit 1] Where ... you buy that beautiful batik shirt?',
                                'explanation' => 'Where did you buy...?',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'did', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'do', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'does', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'were', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 1] Sinta didn\'t ... to school yesterday because she had a toothache.',
                                'explanation' => 'Didn\'t go.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'go', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'went', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'gone', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'going', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 1] We ... delicious fried rice for dinner yesterday.',
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
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] The first section of a recount text is called ....',
                                'explanation' => 'Orientation.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Orientation', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Events', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Reorientation', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Complication', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] The sequence word used to indicate the final event of a trip is ....',
                                'explanation' => 'Finally.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Finally', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'First', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Next', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Start', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] After hiking the steep mountain path for four hours, the hikers felt ....',
                                'explanation' => 'Exhausted (extremely tired).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'exhausted', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'bored', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'lonely', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'clumsy', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] The view from the top of the cliff was so ... that we took many pictures.',
                                'explanation' => 'Breathtaking and amazing.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'breathtaking and amazing', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'ugly and dirty', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'boring and dull', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'noisy and chaotic', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Unit 1 & 2] Choose TWO irregular past verbs!',
                                'explanation' => 'Flew and swam are irregular.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Flew (from fly)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Swam (from swim)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Walked (from walk)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Cleaned (from clean)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] Choose TWO sequence words used in chronological recounts!',
                                'explanation' => 'Next and After that are sequence words.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Next', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'After that', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Because', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Although', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Unit 1 & 2] Choose TWO past time markers!',
                                'explanation' => 'Last weekend and three days ago are past markers.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Last weekend', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Three days ago', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tomorrow night', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Every morning', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Unit 1 & 2] Match the base verb with its irregular past form!',
                                'explanation' => 'Pairs of irregular verbs ending in -ought/-aught.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Catch', 'is_correct' => false, 'match_key' => 'Caught', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Teach', 'is_correct' => false, 'match_key' => 'Taught', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Bring', 'is_correct' => false, 'match_key' => 'Brought', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Buy', 'is_correct' => false, 'match_key' => 'Bought', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] Match the recount text generic structure with its content!',
                                'explanation' => 'Pairs of recount text structures and contents.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Orientation', 'is_correct' => false, 'match_key' => 'Who was involved, where, and when', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Events', 'is_correct' => false, 'match_key' => 'The sequence of activities in chronological order', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Reorientation', 'is_correct' => false, 'match_key' => 'Personal conclusion and emotional reflection', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Title', 'is_correct' => false, 'match_key' => 'Heading summarizing the recount experience', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Unit 1 & 2] Match the adjective of emotion with its context!',
                                'explanation' => 'Pairs of adjectives and contexts.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Proud', 'is_correct' => false, 'match_key' => 'Winning a gold medal in a tournament', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Exhausted', 'is_correct' => false, 'match_key' => 'Running a 5K marathon under the sun', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Amazed', 'is_correct' => false, 'match_key' => 'Seeing turquoise waters and coral reefs', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Grateful', 'is_correct' => false, 'match_key' => 'Receiving kindness and help from others', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Unit 1 & 2] Determine True or False for past grammar!',
                                'explanation' => 'After did use base verb eat.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Did you eat breakfast? is correct.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Did you ate breakfast? is correct.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'She was absent yesterday is a correct nominal past sentence.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] Determine True or False for recount text characteristics!',
                                'explanation' => 'Recount texts retell real past experiences without magical conflicts.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Recount texts use Simple Past Tense verbs.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Recount texts always have magical fairy tale conflicts.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Time connectives like First and Finally create chronological cohesion.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
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
                                'prompt' => '[Unit 1] The past tense of the verb "fly" is ....',
                                'explanation' => 'Flew.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'flew', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] The past tense of the verb "swim" is ....',
                                'explanation' => 'Swam.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'swam', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] The past tense of the verb "take" is ....',
                                'explanation' => 'Took.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'took', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] The past tense of the verb "give" is ....',
                                'explanation' => 'Gave.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'gave', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] Complete the negative: "She ... (not visit) the museum yesterday."',
                                'explanation' => 'didn\'t visit.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'didn\'t visit', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] Complete the question: "Where ... you go last holiday?"',
                                'explanation' => 'Did.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'did', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] The past to be for "He" is ....',
                                'explanation' => 'Was.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'was', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] The past to be for "We" is ....',
                                'explanation' => 'Were.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'were', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] The text that retells personal past experiences is called a ... text.',
                                'explanation' => 'Recount text.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'recount', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] The introductory stage of a recount text is called ....',
                                'explanation' => 'Orientation.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'orientation', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] The sequence word meaning "pertama-tama" in English is ....',
                                'explanation' => 'First.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'first', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] The sequence word meaning "akhirnya" in English is ....',
                                'explanation' => 'Finally.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'finally', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] The adjective meaning "tak terlupakan" in English is ....',
                                'explanation' => 'Unforgettable.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'unforgettable', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] An adjective meaning "sangat lelah" is ....',
                                'explanation' => 'Exhausted.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'exhausted', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] The adjective meaning "bangga" in English is ....',
                                'explanation' => 'Proud.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'proud', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => '[Unit 1 - Simple Past Tense Verbal & Nominal]
Explain the difference between verbal past sentences (using action verbs) and nominal past sentences (using was/were), and write two example sentences for each category!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
1. Verbal Past Sentences: Use action verbs in their past form (V2) to describe physical or mental actions.
   - Example 1: "We visited the ancient temple in Yogyakarta yesterday."
   - Example 2: "They didn\'t play football because it rained heavily."
2. Nominal Past Sentences: Use the linking verb to be (was/were) followed by an adjective, noun, or adverb of place (no action verb).
   - Example 1: "She was very proud of her exam results yesterday."
   - Example 2: "The students were at the science museum two days ago."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Unit 2 - Recount Text Generic Structure]
Describe the three generic structures of a recount text (Orientation, Events, Reorientation), and write a short sample sentence for each section based on a trip to the zoo!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
1. Orientation: Introduces the participants, place, and time.
   - Sample: "Last Sunday, my family and I went to Ragunan Zoo in Jakarta."
2. Events: Retells the sequence of activities chronologically.
   - Sample: "First, we observed giant elephants, and then we fed carrots to giraffes."
3. Reorientation: Concludes the recount with personal feeling/reflection.
   - Sample: "We felt exhausted after walking all day, but it was a truly joyful family trip."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Unit 1 - Correcting Grammatical Errors]
Correct the grammatical mistakes in the following sentences so that they conform to standard Simple Past Tense rules!
a. Yesterday, my brother swimmed in the hotel pool and drinked fresh juice.
b. Did they went to the botanical garden last Saturday?
c. We was very happy because our school team winned the trophy.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
a. Correction: "Yesterday, my brother swam in the hotel pool and drank fresh juice." (swimmed -> swam, drinked -> drank)
b. Correction: "Did they go to the botanical garden last Saturday?" (went -> go, use base form after Did)
c. Correction: "We were very happy because our school team won the trophy." (was -> were for We, winned -> won)',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Unit 2 - Time Connectives & Cohesion]
Combine the following jumbled points into a cohesive recount paragraph using past tense and time connectives (First, Next, After that, Finally)!
- The students arrived at the camping ground at 9 a.m.
- They set up their tents under the guidance of the scout master.
- They cooked instant noodles and grilled sausages for lunch.
- They sang scout songs around the bright campfire before sleeping.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
Cohesive Recount Paragraph:
"Last weekend, the students had an exciting scout camp in the hills. First, they arrived at the camping ground at 9 a.m. Next, they set up their tents under the guidance of the scout master. After that, they cooked instant noodles and grilled sausages for lunch. Finally, they sang scout songs around the bright campfire before sleeping peacefully."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Unit 2 - Writing a Personal Recount]
Write a complete personal recount paragraph (4-5 sentences) about your most memorable holiday experience. Make sure your paragraph contains an Orientation, chronological Events with at least two irregular verbs, and a Reorientation expressing your feelings!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
Sample Recount Paragraph:
"Last semester holiday, my parents took my brother and me to Bali for four days (Orientation). First, we flew from Jakarta and stayed at a hotel near Kuta Beach. During our stay, we swam in the warm sea, visited the sacred Uluwatu Temple, and ate delicious grilled seafood by the beach (Events with irregular verbs: flew, swam, ate). Finally, we bought traditional batik sarongs as souvenirs before flying home. It was an unforgettable trip, and I felt deeply grateful for the wonderful family experience (Reorientation)."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Asesmen Sumatif Akhir Semester 1 (ASAS 1) Bahasa Inggris Kelas 6 - Paket B',
                'type' => 'exam',
                'description' => 'Ujian akhir semester ganjil (Paket B): Pengujian komprehensif Unit 1 dan Unit 2 mencakup recount text kunjungan edukatif, simple past tense verbal dan nominal, serta penyusunan kalimat kronologis.',
                'duration_minutes' => 75,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: A School Visit to the Aerospace Museum', 'content' => '[Keterangan Gambar: Siswa-siswi kelas 6 sedang mengamati kokpit pesawat tempur dan pesawat terbang buatan dalam negeri N-250 di Museum Dirgantara Yogyakarta.]

Last month, grade 6 students visited the Dirgantara Aerospace Museum in Yogyakarta. They traveled by two chartered buses and arrived at the museum at nine o\'clock. Inside the hangar, they saw dozens of historic aircraft, from propeller airplanes used in the independence war to modern supersonic jet fighters.

A museum guide explained the history of Indonesia\'s aviation industry. The students were amazed to see the famous N-250 Gatotkaca aircraft designed by B.J. Habibie. Budi and Kevin even had the opportunity to enter a flight simulator and pretend to pilot a passenger aircraft. At one o\'clock, they ate packed lunches in the museum courtyard. They felt inspired and proud of Indonesia\'s technological achievements.'],
                            ['title' => 'Stimulus 2: Diary of a Young Badminton Champion', 'content' => '[Keterangan Gambar: Kevin tersenyum bangga di atas podium juara turnamen bulu tangkis yunior tingkat provinsi memegang piala emas dan raket.]

Saturday, 14 November 2026
Today was a historic day for me. Yesterday afternoon, I competed in the final match of the Junior Provincial Badminton Championship. My opponent was Rian, a skilled player from Bandung.

In the first set, I lost 18-21 because I made several unforced errors. During the break, my coach encouraged me: "Stay focused, Kevin! Move quickly and play with confidence." In the second set, I changed my strategy and won 21-16. In the rubber set, the match was intense. Both of us fought hard for every single point. Finally, with a sharp smash to the back corner, I won the match 21-19! The crowd cheered loudly. My coach and parents hugged me with tears of joy. I felt exhausted, but I was extremely proud of my hard work and perseverance.'],
                            ['title' => 'Stimulus 3: Comprehensive Review of the Simple Past Tense', 'content' => '[Keterangan Gambar: Ringkasan aturan Simple Past Tense: Verbal vs Nominal sentences, regular vs irregular verbs, time signals (yesterday, last week, ago), and question forms (Did + S + V1? / Wh- + did + S + V1?).]

The Simple Past Tense is the foundational tense for narrative and recount writing. It describes events that started and finished in the past. Remember: always use the base verb (V1) after *did* or *didn\'t*. For nominal sentences without action verbs, use *was* for singular subjects (I, he, she, it) and *were* for plural subjects (we, you, they).'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Based on Stimulus 1, what famous Indonesian-designed aircraft did the students see?',
                                'explanation' => 'The famous N-250 Gatotkaca designed by B.J. Habibie.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'The N-250 Gatotkaca aircraft designed by B.J. Habibie', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'A supersonic space rocket from NASA', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'A Boeing 747 cargo jet from America', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'A stealth bomber from Germany', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What did Budi and Kevin do in the museum hangar?',
                                'explanation' => 'They entered a flight simulator and piloted an aircraft.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'They entered a flight simulator and pretended to pilot an aircraft.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'They painted the wings of the fighter jet.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'They repaired an airplane engine with tools.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'They slept inside the luggage compartment.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO adjectives describing the students\' feelings at the museum!',
                                'explanation' => 'Inspired and proud.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Inspired', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Proud', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Terrified', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Disgusted', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan aspek kunjungan museum dirgantara dengan faktanya!',
                                'explanation' => 'Pairs of aerospace museum visit facts.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Location', 'is_correct' => false, 'match_key' => 'Dirgantara Aerospace Museum in Yogyakarta', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Historic Aircraft', 'is_correct' => false, 'match_key' => 'N-250 Gatotkaca designed by Habibie', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Interactive Experience', 'is_correct' => false, 'match_key' => 'Piloting a flight simulator', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Students\' Feeling', 'is_correct' => false, 'match_key' => 'Inspired and proud of aerospace achievements', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Why did Kevin lose the first set of the badminton final?',
                                'explanation' => 'In the text: "I lost 18-21 because I made several unforced errors."',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Because he made several unforced errors', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Because his racket was broken', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Because he arrived late at the stadium', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Because the referee was unfair', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'How did Kevin feel after winning the intense rubber set?',
                                'explanation' => 'Kevin felt exhausted, but extremely proud.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'He felt exhausted, but extremely proud of his perseverance.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'He felt bored and wanted to go home.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'He felt angry with his opponent.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'He felt scared of the cheering crowd.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False based on the diary entry!',
                                'explanation' => 'Rian was from Bandung (not Surabaya).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kevin won the final match after playing three sets (rubber set).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kevin\'s opponent in the final was from Surabaya.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kevin won the final set with a score of 21-19.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What regular past verb indicates the crowd\'s reaction when Kevin won?',
                                'explanation' => 'The crowd "cheered" loudly.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Cheered', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Lost', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Fought', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Won', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Which auxiliary verb is used for negative and interrogative verbal past sentences?',
                                'explanation' => 'Auxiliary: did / didn\'t.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Did', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Do', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Does', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Have', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Which sentence is grammatically correct in the past tense?',
                                'explanation' => 'Did you watch... (use base verb watch).',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Did you watch the badminton final yesterday?', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Did you watched the badminton final yesterday?', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Were you watch the badminton final yesterday?', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Do you watched the badminton final yesterday?', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for Simple Past Tense grammar rules!',
                                'explanation' => 'Irregular verbs do not follow the -ed rule.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Regular verbs add -ed or -d in the positive past form.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Irregular verbs always follow the -ed rule.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => '"She didn\'t eat breakfast" is grammatically correct.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO correct past nominal sentences!',
                                'explanation' => 'They were happy and He was a champion are correct.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'They were happy during the holiday.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'He was a champion last year.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'They was happy during the holiday.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'He were a champion last year.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 1] Budi ... his bicycle in the front yard yesterday afternoon.',
                                'explanation' => 'Washed.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'washed', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'wash', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'washes', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'washing', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 1] My sister ... an interesting novel last night.',
                                'explanation' => 'Past form of read is read (pronounced /red/).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'read', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'reads', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'reading', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'reader', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 1] They ... at home yesterday because it was a national holiday.',
                                'explanation' => 'They were.',
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
                                'prompt' => '[Unit 1] Where ... you buy that beautiful batik shirt?',
                                'explanation' => 'Where did you buy...?',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'did', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'do', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'does', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'were', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 1] Sinta didn\'t ... to school yesterday because she had a toothache.',
                                'explanation' => 'Didn\'t go.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'go', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'went', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'gone', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'going', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 1] We ... delicious fried rice for dinner yesterday.',
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
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] The first section of a recount text is called ....',
                                'explanation' => 'Orientation.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Orientation', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Events', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Reorientation', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Complication', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] The sequence word used to indicate the final event of a trip is ....',
                                'explanation' => 'Finally.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Finally', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'First', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Next', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Start', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] After hiking the steep mountain path for four hours, the hikers felt ....',
                                'explanation' => 'Exhausted (extremely tired).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'exhausted', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'bored', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'lonely', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'clumsy', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] The view from the top of the cliff was so ... that we took many pictures.',
                                'explanation' => 'Breathtaking and amazing.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'breathtaking and amazing', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'ugly and dirty', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'boring and dull', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'noisy and chaotic', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Unit 1 & 2] Choose TWO irregular past verbs!',
                                'explanation' => 'Flew and swam are irregular.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Flew (from fly)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Swam (from swim)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Walked (from walk)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Cleaned (from clean)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] Choose TWO sequence words used in chronological recounts!',
                                'explanation' => 'Next and After that are sequence words.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Next', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'After that', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Because', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Although', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Unit 1 & 2] Choose TWO past time markers!',
                                'explanation' => 'Last weekend and three days ago are past markers.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Last weekend', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Three days ago', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tomorrow night', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Every morning', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Unit 1 & 2] Match the base verb with its irregular past form!',
                                'explanation' => 'Pairs of irregular verbs ending in -ought/-aught.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Catch', 'is_correct' => false, 'match_key' => 'Caught', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Teach', 'is_correct' => false, 'match_key' => 'Taught', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Bring', 'is_correct' => false, 'match_key' => 'Brought', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Buy', 'is_correct' => false, 'match_key' => 'Bought', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] Match the recount text generic structure with its content!',
                                'explanation' => 'Pairs of recount text structures and contents.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Orientation', 'is_correct' => false, 'match_key' => 'Who was involved, where, and when', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Events', 'is_correct' => false, 'match_key' => 'The sequence of activities in chronological order', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Reorientation', 'is_correct' => false, 'match_key' => 'Personal conclusion and emotional reflection', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Title', 'is_correct' => false, 'match_key' => 'Heading summarizing the recount experience', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Unit 1 & 2] Match the adjective of emotion with its context!',
                                'explanation' => 'Pairs of adjectives and contexts.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Proud', 'is_correct' => false, 'match_key' => 'Winning a gold medal in a tournament', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Exhausted', 'is_correct' => false, 'match_key' => 'Running a 5K marathon under the sun', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Amazed', 'is_correct' => false, 'match_key' => 'Seeing turquoise waters and coral reefs', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Grateful', 'is_correct' => false, 'match_key' => 'Receiving kindness and help from others', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Unit 1 & 2] Determine True or False for past grammar!',
                                'explanation' => 'After did use base verb eat.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Did you eat breakfast? is correct.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Did you ate breakfast? is correct.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'She was absent yesterday is a correct nominal past sentence.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] Determine True or False for recount text characteristics!',
                                'explanation' => 'Recount texts retell real past experiences without magical conflicts.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Recount texts use Simple Past Tense verbs.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Recount texts always have magical fairy tale conflicts.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Time connectives like First and Finally create chronological cohesion.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
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
                                'prompt' => '[Unit 1] The past tense of the verb "fly" is ....',
                                'explanation' => 'Flew.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'flew', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] The past tense of the verb "swim" is ....',
                                'explanation' => 'Swam.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'swam', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] The past tense of the verb "take" is ....',
                                'explanation' => 'Took.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'took', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] The past tense of the verb "give" is ....',
                                'explanation' => 'Gave.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'gave', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] Complete the negative: "She ... (not visit) the museum yesterday."',
                                'explanation' => 'didn\'t visit.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'didn\'t visit', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] Complete the question: "Where ... you go last holiday?"',
                                'explanation' => 'Did.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'did', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] The past to be for "He" is ....',
                                'explanation' => 'Was.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'was', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] The past to be for "We" is ....',
                                'explanation' => 'Were.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'were', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] The text that retells personal past experiences is called a ... text.',
                                'explanation' => 'Recount text.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'recount', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] The introductory stage of a recount text is called ....',
                                'explanation' => 'Orientation.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'orientation', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] The sequence word meaning "pertama-tama" in English is ....',
                                'explanation' => 'First.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'first', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] The sequence word meaning "akhirnya" in English is ....',
                                'explanation' => 'Finally.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'finally', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] The adjective meaning "tak terlupakan" in English is ....',
                                'explanation' => 'Unforgettable.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'unforgettable', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] An adjective meaning "sangat lelah" is ....',
                                'explanation' => 'Exhausted.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'exhausted', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] The adjective meaning "bangga" in English is ....',
                                'explanation' => 'Proud.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'proud', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => '[Unit 1 - Simple Past Tense Verbal & Nominal]
Explain the difference between verbal past sentences (using action verbs) and nominal past sentences (using was/were), and write two example sentences for each category!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
1. Verbal Past Sentences: Use action verbs in their past form (V2) to describe physical or mental actions.
   - Example 1: "We visited the ancient temple in Yogyakarta yesterday."
   - Example 2: "They didn\'t play football because it rained heavily."
2. Nominal Past Sentences: Use the linking verb to be (was/were) followed by an adjective, noun, or adverb of place (no action verb).
   - Example 1: "She was very proud of her exam results yesterday."
   - Example 2: "The students were at the science museum two days ago."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Unit 2 - Recount Text Generic Structure]
Describe the three generic structures of a recount text (Orientation, Events, Reorientation), and write a short sample sentence for each section based on a trip to the zoo!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
1. Orientation: Introduces the participants, place, and time.
   - Sample: "Last Sunday, my family and I went to Ragunan Zoo in Jakarta."
2. Events: Retells the sequence of activities chronologically.
   - Sample: "First, we observed giant elephants, and then we fed carrots to giraffes."
3. Reorientation: Concludes the recount with personal feeling/reflection.
   - Sample: "We felt exhausted after walking all day, but it was a truly joyful family trip."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Unit 1 - Correcting Grammatical Errors]
Correct the grammatical mistakes in the following sentences so that they conform to standard Simple Past Tense rules!
a. Yesterday, my brother swimmed in the hotel pool and drinked fresh juice.
b. Did they went to the botanical garden last Saturday?
c. We was very happy because our school team winned the trophy.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
a. Correction: "Yesterday, my brother swam in the hotel pool and drank fresh juice." (swimmed -> swam, drinked -> drank)
b. Correction: "Did they go to the botanical garden last Saturday?" (went -> go, use base form after Did)
c. Correction: "We were very happy because our school team won the trophy." (was -> were for We, winned -> won)',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Unit 2 - Time Connectives & Cohesion]
Combine the following jumbled points into a cohesive recount paragraph using past tense and time connectives (First, Next, After that, Finally)!
- The students arrived at the camping ground at 9 a.m.
- They set up their tents under the guidance of the scout master.
- They cooked instant noodles and grilled sausages for lunch.
- They sang scout songs around the bright campfire before sleeping.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
Cohesive Recount Paragraph:
"Last weekend, the students had an exciting scout camp in the hills. First, they arrived at the camping ground at 9 a.m. Next, they set up their tents under the guidance of the scout master. After that, they cooked instant noodles and grilled sausages for lunch. Finally, they sang scout songs around the bright campfire before sleeping peacefully."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Unit 2 - Writing a Personal Recount]
Write a complete personal recount paragraph (4-5 sentences) about your most memorable holiday experience. Make sure your paragraph contains an Orientation, chronological Events with at least two irregular verbs, and a Reorientation expressing your feelings!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
Sample Recount Paragraph:
"Last semester holiday, my parents took my brother and me to Bali for four days (Orientation). First, we flew from Jakarta and stayed at a hotel near Kuta Beach. During our stay, we swam in the warm sea, visited the sacred Uluwatu Temple, and ate delicious grilled seafood by the beach (Events with irregular verbs: flew, swam, ate). Finally, we bought traditional batik sarongs as souvenirs before flying home. It was an unforgettable trip, and I felt deeply grateful for the wonderful family experience (Reorientation)."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Asesmen Sumatif Akhir Semester 1 (ASAS 1) Bahasa Inggris Kelas 6 - Paket C',
                'type' => 'exam',
                'description' => 'Ujian akhir semester ganjil (Paket C): Evaluasi menyeluruh Unit 1 dan Unit 2 mengukur kemahiran membaca teks recount wisata bahari, penguasaan Simple Past Tense, dan penyusunan teks pengalaman berkesan.',
                'duration_minutes' => 75,
                'sections' => [
                    [
                        'title' => 'Bagian 1: Objektif Beragam (Pilihan Ganda, Pilihan Ganda Kompleks, Menjodohkan, Benar-Salah)',
                        'instructions' => 'Pilihlah dan jawablah soal-soal objektif berikut secara cermat dan teliti.',
                        'order' => 1,
                        'question_groups' => [
                            ['title' => 'Stimulus 1: Snorkeling at Karimunjawa Marine Park', 'content' => '[Keterangan Gambar: Wisatawan anak berselam dangkal (snorkeling) di perairan jernih Karimunjawa melihat ikan badut nemo di karang anemon laut.]

Last October, my cousins and I spent a three-day holiday at Karimunjawa National Park in Central Java. We departed from Jepara harbor by express ferry early in the morning. When we arrived at the archipelago, we were stunned by the turquoise water and white sandy beaches.

On Saturday, we rented snorkeling gear and chartered a traditional wooden boat to Menjangan Kecil Island. The underwater marine life was spectacular! We swam alongside schools of colorful damselfish and saw clownfish swimming between sea anemone tentacles. In the afternoon, we visited a shark conservation pool and watched baby blacktip reef sharks swim gracefully. It was a thrilling and educational vacation that we will cherish forever.'],
                            ['title' => 'Stimulus 2: Diary of a Young Badminton Champion', 'content' => '[Keterangan Gambar: Kevin tersenyum bangga di atas podium juara turnamen bulu tangkis yunior tingkat provinsi memegang piala emas dan raket.]

Saturday, 14 November 2026
Today was a historic day for me. Yesterday afternoon, I competed in the final match of the Junior Provincial Badminton Championship. My opponent was Rian, a skilled player from Bandung.

In the first set, I lost 18-21 because I made several unforced errors. During the break, my coach encouraged me: "Stay focused, Kevin! Move quickly and play with confidence." In the second set, I changed my strategy and won 21-16. In the rubber set, the match was intense. Both of us fought hard for every single point. Finally, with a sharp smash to the back corner, I won the match 21-19! The crowd cheered loudly. My coach and parents hugged me with tears of joy. I felt exhausted, but I was extremely proud of my hard work and perseverance.'],
                            ['title' => 'Stimulus 3: Comprehensive Review of the Simple Past Tense', 'content' => '[Keterangan Gambar: Ringkasan aturan Simple Past Tense: Verbal vs Nominal sentences, regular vs irregular verbs, time signals (yesterday, last week, ago), and question forms (Did + S + V1? / Wh- + did + S + V1?).]

The Simple Past Tense is the foundational tense for narrative and recount writing. It describes events that started and finished in the past. Remember: always use the base verb (V1) after *did* or *didn\'t*. For nominal sentences without action verbs, use *was* for singular subjects (I, he, she, it) and *were* for plural subjects (we, you, they).'],
                        ],
                        'questions' => [
                            [
                                'order' => 1,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Based on Stimulus 1, how did the writer\'s group travel from Jepara to Karimunjawa?',
                                'explanation' => 'By express ferry early in the morning.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'By express ferry early in the morning', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'By private airplane', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'By rowing a canoe', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'By taking a submarine', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What special marine animals did they observe in the conservation pool?',
                                'explanation' => 'Baby blacktip reef sharks.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Baby blacktip reef sharks swimming gracefully', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Giant saltwater crocodiles', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Venomous sea snakes', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Penguins and seals', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO activities done by the writer in Karimunjawa!',
                                'explanation' => 'Snorkeling and visiting shark conservation pool.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Snorkeling at Menjangan Kecil Island', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Visiting a shark conservation pool', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Skiing down icy slopes', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Climbing a smoking active volcano', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => 'Jodohkan aspek liburan Karimunjawa dengan faktanya!',
                                'explanation' => 'Pairs of Karimunjawa vacation facts.',
                                'group_index' => 0,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Departure Harbor', 'is_correct' => false, 'match_key' => 'Jepara harbor in Central Java', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Snorkeling Spot', 'is_correct' => false, 'match_key' => 'Menjangan Kecil Island', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Marine Life', 'is_correct' => false, 'match_key' => 'Clownfish, sea anemones, and damselfish', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Overall Impression', 'is_correct' => false, 'match_key' => 'A thrilling and educational vacation', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Why did Kevin lose the first set of the badminton final?',
                                'explanation' => 'In the text: "I lost 18-21 because I made several unforced errors."',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Because he made several unforced errors', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Because his racket was broken', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Because he arrived late at the stadium', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Because the referee was unfair', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'How did Kevin feel after winning the intense rubber set?',
                                'explanation' => 'Kevin felt exhausted, but extremely proud.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'He felt exhausted, but extremely proud of his perseverance.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'He felt bored and wanted to go home.', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'He felt angry with his opponent.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'He felt scared of the cheering crowd.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False based on the diary entry!',
                                'explanation' => 'Rian was from Bandung (not Surabaya).',
                                'group_index' => 1,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Kevin won the final match after playing three sets (rubber set).', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Kevin\'s opponent in the final was from Surabaya.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Kevin won the final set with a score of 21-19.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'What regular past verb indicates the crowd\'s reaction when Kevin won?',
                                'explanation' => 'The crowd "cheered" loudly.',
                                'group_index' => 1,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Cheered', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Lost', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Fought', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Won', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Which auxiliary verb is used for negative and interrogative verbal past sentences?',
                                'explanation' => 'Auxiliary: did / didn\'t.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Did', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Do', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Does', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Have', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => 'Which sentence is grammatically correct in the past tense?',
                                'explanation' => 'Did you watch... (use base verb watch).',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Did you watch the badminton final yesterday?', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Did you watched the badminton final yesterday?', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Were you watch the badminton final yesterday?', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Do you watched the badminton final yesterday?', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => 'Determine True or False for Simple Past Tense grammar rules!',
                                'explanation' => 'Irregular verbs do not follow the -ed rule.',
                                'group_index' => 2,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Regular verbs add -ed or -d in the positive past form.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Irregular verbs always follow the -ed rule.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => '"She didn\'t eat breakfast" is grammatically correct.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => 'Choose TWO correct past nominal sentences!',
                                'explanation' => 'They were happy and He was a champion are correct.',
                                'group_index' => 2,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'They were happy during the holiday.', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'He was a champion last year.', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'They was happy during the holiday.', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'He were a champion last year.', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 1] Budi ... his bicycle in the front yard yesterday afternoon.',
                                'explanation' => 'Washed.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'washed', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'wash', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'washes', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'washing', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 1] My sister ... an interesting novel last night.',
                                'explanation' => 'Past form of read is read (pronounced /red/).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'read', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'reads', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'reading', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'reader', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 1] They ... at home yesterday because it was a national holiday.',
                                'explanation' => 'They were.',
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
                                'prompt' => '[Unit 1] Where ... you buy that beautiful batik shirt?',
                                'explanation' => 'Where did you buy...?',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'did', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'do', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'does', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'were', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 17,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 1] Sinta didn\'t ... to school yesterday because she had a toothache.',
                                'explanation' => 'Didn\'t go.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'go', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'went', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'gone', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'going', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 18,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 1] We ... delicious fried rice for dinner yesterday.',
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
                                'order' => 19,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] The first section of a recount text is called ....',
                                'explanation' => 'Orientation.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Orientation', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Events', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Reorientation', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Complication', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 20,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] The sequence word used to indicate the final event of a trip is ....',
                                'explanation' => 'Finally.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Finally', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'First', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Next', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Start', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 21,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] After hiking the steep mountain path for four hours, the hikers felt ....',
                                'explanation' => 'Exhausted (extremely tired).',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'exhausted', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'bored', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'lonely', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'clumsy', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 22,
                                'type' => 'mcq_single',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] The view from the top of the cliff was so ... that we took many pictures.',
                                'explanation' => 'Breathtaking and amazing.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'breathtaking and amazing', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'ugly and dirty', 'is_correct' => false, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'boring and dull', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'noisy and chaotic', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 23,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Unit 1 & 2] Choose TWO irregular past verbs!',
                                'explanation' => 'Flew and swam are irregular.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Flew (from fly)', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Swam (from swim)', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Walked (from walk)', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Cleaned (from clean)', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 24,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] Choose TWO sequence words used in chronological recounts!',
                                'explanation' => 'Next and After that are sequence words.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Next', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'After that', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Because', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Although', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 25,
                                'type' => 'mcq_multiple',
                                'points' => 1.0,
                                'prompt' => '[Unit 1 & 2] Choose TWO past time markers!',
                                'explanation' => 'Last weekend and three days ago are past markers.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => 'A', 'option_text' => 'Last weekend', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                    ['label' => 'B', 'option_text' => 'Three days ago', 'is_correct' => true, 'match_key' => null, 'order' => 2],
                                    ['label' => 'C', 'option_text' => 'Tomorrow night', 'is_correct' => false, 'match_key' => null, 'order' => 3],
                                    ['label' => 'D', 'option_text' => 'Every morning', 'is_correct' => false, 'match_key' => null, 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 26,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Unit 1 & 2] Match the base verb with its irregular past form!',
                                'explanation' => 'Pairs of irregular verbs ending in -ought/-aught.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Catch', 'is_correct' => false, 'match_key' => 'Caught', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Teach', 'is_correct' => false, 'match_key' => 'Taught', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Bring', 'is_correct' => false, 'match_key' => 'Brought', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Buy', 'is_correct' => false, 'match_key' => 'Bought', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 27,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] Match the recount text generic structure with its content!',
                                'explanation' => 'Pairs of recount text structures and contents.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Orientation', 'is_correct' => false, 'match_key' => 'Who was involved, where, and when', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Events', 'is_correct' => false, 'match_key' => 'The sequence of activities in chronological order', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Reorientation', 'is_correct' => false, 'match_key' => 'Personal conclusion and emotional reflection', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Title', 'is_correct' => false, 'match_key' => 'Heading summarizing the recount experience', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 28,
                                'type' => 'matching',
                                'points' => 1.0,
                                'prompt' => '[Unit 1 & 2] Match the adjective of emotion with its context!',
                                'explanation' => 'Pairs of adjectives and contexts.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'Proud', 'is_correct' => false, 'match_key' => 'Winning a gold medal in a tournament', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Exhausted', 'is_correct' => false, 'match_key' => 'Running a 5K marathon under the sun', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Amazed', 'is_correct' => false, 'match_key' => 'Seeing turquoise waters and coral reefs', 'order' => 3],
                                    ['label' => null, 'option_text' => 'Grateful', 'is_correct' => false, 'match_key' => 'Receiving kindness and help from others', 'order' => 4],
                                ],
                            ],
                            [
                                'order' => 29,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Unit 1 & 2] Determine True or False for past grammar!',
                                'explanation' => 'After did use base verb eat.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Did you eat breakfast? is correct.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Did you ate breakfast? is correct.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'She was absent yesterday is a correct nominal past sentence.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
                                ],
                            ],
                            [
                                'order' => 30,
                                'type' => 'binary_matrix',
                                'points' => 1.0,
                                'prompt' => '[Unit 2] Determine True or False for recount text characteristics!',
                                'explanation' => 'Recount texts retell real past experiences without magical conflicts.',
                                'group_index' => null,
                                'settings' => ['labels' => ['Benar', 'Salah']],
                                'options' => [
                                    ['label' => null, 'option_text' => 'Recount texts use Simple Past Tense verbs.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 1],
                                    ['label' => null, 'option_text' => 'Recount texts always have magical fairy tale conflicts.', 'is_correct' => false, 'match_key' => 'Salah', 'order' => 2],
                                    ['label' => null, 'option_text' => 'Time connectives like First and Finally create chronological cohesion.', 'is_correct' => false, 'match_key' => 'Benar', 'order' => 3],
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
                                'prompt' => '[Unit 1] The past tense of the verb "fly" is ....',
                                'explanation' => 'Flew.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'flew', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 2,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] The past tense of the verb "swim" is ....',
                                'explanation' => 'Swam.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'swam', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 3,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] The past tense of the verb "take" is ....',
                                'explanation' => 'Took.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'took', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 4,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] The past tense of the verb "give" is ....',
                                'explanation' => 'Gave.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'gave', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 5,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] Complete the negative: "She ... (not visit) the museum yesterday."',
                                'explanation' => 'didn\'t visit.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'didn\'t visit', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 6,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] Complete the question: "Where ... you go last holiday?"',
                                'explanation' => 'Did.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'did', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 7,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] The past to be for "He" is ....',
                                'explanation' => 'Was.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'was', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 8,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 1] The past to be for "We" is ....',
                                'explanation' => 'Were.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'were', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 9,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] The text that retells personal past experiences is called a ... text.',
                                'explanation' => 'Recount text.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'recount', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 10,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] The introductory stage of a recount text is called ....',
                                'explanation' => 'Orientation.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'orientation', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 11,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] The sequence word meaning "pertama-tama" in English is ....',
                                'explanation' => 'First.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'first', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 12,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] The sequence word meaning "akhirnya" in English is ....',
                                'explanation' => 'Finally.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'finally', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 13,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] The adjective meaning "tak terlupakan" in English is ....',
                                'explanation' => 'Unforgettable.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'unforgettable', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 14,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] An adjective meaning "sangat lelah" is ....',
                                'explanation' => 'Exhausted.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'exhausted', 'is_correct' => true, 'match_key' => null, 'order' => 1],
                                ],
                            ],
                            [
                                'order' => 15,
                                'type' => 'short_answer',
                                'points' => 2.0,
                                'prompt' => '[Unit 2] The adjective meaning "bangga" in English is ....',
                                'explanation' => 'Proud.',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [
                                    ['label' => null, 'option_text' => 'proud', 'is_correct' => true, 'match_key' => null, 'order' => 1],
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
                                'prompt' => '[Unit 1 - Simple Past Tense Verbal & Nominal]
Explain the difference between verbal past sentences (using action verbs) and nominal past sentences (using was/were), and write two example sentences for each category!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
1. Verbal Past Sentences: Use action verbs in their past form (V2) to describe physical or mental actions.
   - Example 1: "We visited the ancient temple in Yogyakarta yesterday."
   - Example 2: "They didn\'t play football because it rained heavily."
2. Nominal Past Sentences: Use the linking verb to be (was/were) followed by an adjective, noun, or adverb of place (no action verb).
   - Example 1: "She was very proud of her exam results yesterday."
   - Example 2: "The students were at the science museum two days ago."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 2,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Unit 2 - Recount Text Generic Structure]
Describe the three generic structures of a recount text (Orientation, Events, Reorientation), and write a short sample sentence for each section based on a trip to the zoo!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
1. Orientation: Introduces the participants, place, and time.
   - Sample: "Last Sunday, my family and I went to Ragunan Zoo in Jakarta."
2. Events: Retells the sequence of activities chronologically.
   - Sample: "First, we observed giant elephants, and then we fed carrots to giraffes."
3. Reorientation: Concludes the recount with personal feeling/reflection.
   - Sample: "We felt exhausted after walking all day, but it was a truly joyful family trip."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 3,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Unit 1 - Correcting Grammatical Errors]
Correct the grammatical mistakes in the following sentences so that they conform to standard Simple Past Tense rules!
a. Yesterday, my brother swimmed in the hotel pool and drinked fresh juice.
b. Did they went to the botanical garden last Saturday?
c. We was very happy because our school team winned the trophy.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
a. Correction: "Yesterday, my brother swam in the hotel pool and drank fresh juice." (swimmed -> swam, drinked -> drank)
b. Correction: "Did they go to the botanical garden last Saturday?" (went -> go, use base form after Did)
c. Correction: "We were very happy because our school team won the trophy." (was -> were for We, winned -> won)',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 4,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Unit 2 - Time Connectives & Cohesion]
Combine the following jumbled points into a cohesive recount paragraph using past tense and time connectives (First, Next, After that, Finally)!
- The students arrived at the camping ground at 9 a.m.
- They set up their tents under the guidance of the scout master.
- They cooked instant noodles and grilled sausages for lunch.
- They sang scout songs around the bright campfire before sleeping.',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
Cohesive Recount Paragraph:
"Last weekend, the students had an exciting scout camp in the hills. First, they arrived at the camping ground at 9 a.m. Next, they set up their tents under the guidance of the scout master. After that, they cooked instant noodles and grilled sausages for lunch. Finally, they sang scout songs around the bright campfire before sleeping peacefully."',
                                'group_index' => null,
                                'settings' => null,
                                'options' => [],
                            ],
                            [
                                'order' => 5,
                                'type' => 'essay',
                                'points' => 5.0,
                                'prompt' => '[Unit 2 - Writing a Personal Recount]
Write a complete personal recount paragraph (4-5 sentences) about your most memorable holiday experience. Make sure your paragraph contains an Orientation, chronological Events with at least two irregular verbs, and a Reorientation expressing your feelings!',
                                'explanation' => 'Rubrik Penilaian & Kunci Jawaban:
Exemplar Rubric & Answer Key:
Sample Recount Paragraph:
"Last semester holiday, my parents took my brother and me to Bali for four days (Orientation). First, we flew from Jakarta and stayed at a hotel near Kuta Beach. During our stay, we swam in the warm sea, visited the sacred Uluwatu Temple, and ate delicious grilled seafood by the beach (Events with irregular verbs: flew, swam, ate). Finally, we bought traditional batik sarongs as souvenirs before flying home. It was an unforgettable trip, and I felt deeply grateful for the wonderful family experience (Reorientation)."',
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
